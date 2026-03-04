<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\SaleReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        $saleReports = SaleReport::with('user')->latest()->get(); 
        
        $totalSales = SaleReport::sum('total_amount');
        $totalItems = Inventory::sum('quantity');
        $totalUsers = User::count();
        $totalTransactions = SaleReport::count();
        $lowStockItems = Inventory::where('quantity', '<', 5)->get(['*']);

        return view('index', compact('saleReports', 'totalSales', 'totalItems', 'totalUsers', 'totalTransactions', 'lowStockItems')); // for dashboard
    }

    public function item()
    {
        $categories = Category::all(); // Fetch all categories to populate the dropdown
        $items = Inventory::with('category')->get(); // Eager load category relationship

        return view('Item.index', compact('categories', 'items')); // for add item
    }

    // for add item
    public function store(Request $request)
    {
        // Handle new category creation if needed
        if ($request->has('new_category') && ! empty($request->new_category)) {
            // Create the new category first
            $category = new Category;
            $category->name = $request->new_category;
            $category->save();

            // Use the new category ID
            $request->merge(['categoryid' => $category->id]);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'itemCode' => 'required|unique:inventory,itemCode',
            'itemName' => 'required',
            'price' => 'required|numeric',
            'categoryid' => 'required|exists:category,id',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
            'exp_Date' => 'required|date',
            'alert_Date' => 'required|date|before_or_equal:exp_Date',
        ]);

        $inventory = new Inventory;
        $inventory->itemCode = $validatedData['itemCode'];
        $inventory->itemName = $validatedData['itemName'];
        $inventory->price = $validatedData['price'];
        $inventory->categoryid = $validatedData['categoryid'];
        $inventory->quantity = $validatedData['quantity'];
        $inventory->cost = $validatedData['cost'];
        $inventory->exp_Date = $validatedData['exp_Date'];
        $inventory->alert_Date = $validatedData['alert_Date'];

        $inventory->save();

        return redirect()->back()->with('success', 'Item added successfully!');
    }

    public function addCategory(Request $request){
        //dd($request);
         $validatedData = $request->validate([
            'CategoryName' => 'required|unique:inventory,itemCode',
            
        ]);
        $category = new Category ;
        $category->name = $validatedData['CategoryName'];
        $category->save();
         return redirect()->back()->with('success', 'Category added successfully!');

    }

    // //
    public function inventory()
    {
        $categories = Category::all(); // Fetch all categories to populate the dropdown

        return view('inventory.index', compact('categories')); // for inventory
    }

    //update item
    public function updateItem(Request $request,string $id){
        $inventory = Inventory::find($id);
        $inventory->update($request->all());

        $inventory->save();

        return redirect()->back()->with('success','item update successfull!!');

    }

    //delete item 
    public function deleteItem(string $id){
        $inventory = inventory::find($id);
        $inventory->delete();

        return redirect()->route('admin.item')->with('success','item delete successfull!!');
    }

    public function bill()
    {
        $cashier = User::where('usertype', 'user')->get(); // Fetch all users with usertype 'cashier'

        return view('bill.index', compact('cashier'));
    }

    public function getItemPrice(Request $request)
    {
        try {
            $itemCode = $request->input('item_code');

            if (empty($itemCode)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item code is required',
                ]);
            }

            // Search for the item
            $item = Inventory::where('itemCode', $itemCode)
                ->orWhere('itemName', 'LIKE', '%'.$itemCode.'%')
                ->first();

            if ($item) {
                return response()->json([
                    'success' => true,
                    'price' => $item->price,
                    'item_name' => $item->itemName,
                    'item_code' => $item->itemCode,
                    'stock' => $item->quantity,
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Item not found',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: '.$e->getMessage(),
            ], 500);
        }
    }

    /**
     * Save bill to database
     */
    public function saveBill(Request $request)
    {
        try {
            $items = $request->input('items');
            $total = $request->input('total');
            $tax = $request->input('tax');
            $grandTotal = $request->input('grand_total');

            // Create bill
            $bill = Bill::create([
                'bill_number' => time(),
                'cashier_id' => Auth::id(),
                'cashier_name' => Auth::user()->name,
                'total_amount' => $total,
                'tax_amount' => $tax,
                'grand_total' => $grandTotal,
                'bill_date' => now(),
            ]);

            // Create bill items
            foreach ($items as $item) {
                // Check stock
                $inventory = Inventory::where('itemCode', $item['item_code'])->first(['*']);
                if (!$inventory || $inventory->quantity < $item['quantity']) {
                    throw new \Exception("Insufficient stock for item: " . ($inventory ? $inventory->itemName : $item['item_code']));
                }

                BillItem::create([
                    'bill_id' => $bill->id,
                    'item_id' => $item['item_code'],
                    'quantity' => $item['quantity'],
                    'amount' => $item['amount'],
                ]);

                // Update stock
                $inventory->decrement('quantity', $item['quantity']);
            }
            $salereport = new SaleReport;
            $salereport->sale_date = $bill->bill_date;
            $salereport->bill_no = $bill->bill_number;
            $salereport->cashier_id = Auth::id();
            $salereport->total_amount = $total;
            $salereport->save();

            return response()->json([
                'success' => true,
                'bill_id' => $bill->id,
                'bill_no' => $bill->bill_no,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: '.$e->getMessage(),
            ], 500);
        }
    }

    public function report(Request $request)
    {
        $reportType = $request->get('type', 'daily');
        $results = collect();
        $cashiers = User::whereIn('usertype', ['admin', 'manager', 'user'])->get();

        if ($reportType == 'daily') {
            $query = SaleReport::with('user');
            if ($request->filled('date')) {
                $query->whereDate('sale_date', $request->date);
            }
            if ($request->filled('cashier_id')) {
                $query->where('cashier_id', $request->cashier_id);
            }
            if ($request->filled('bill_no')) {
                $query->where('bill_no', 'like', '%' . $request->bill_no . '%');
            }
            $results = $query->latest()->get();
        } elseif ($reportType == 'monthly') {
            $query = SaleReport::with('user');
            if ($request->filled('month')) {
                $date = Carbon::parse($request->month);
                $query->whereMonth('sale_date', $date->month)
                      ->whereYear('sale_date', $date->year);
            }
            if ($request->filled('cashier_id')) {
                $query->where('cashier_id', $request->cashier_id);
            }
            $results = $query->latest()->get();
        } elseif ($reportType == 'stocks') {
            $query = Inventory::with('category');
            if ($request->filled('itemCode')) {
                $query->where('itemCode', 'like', '%' . $request->itemCode . '%');
            }
            if ($request->filled('itemName')) {
                $query->where('itemName', 'like', '%' . $request->itemName . '%');
            }
            $results = $query->get();
        }

        if ($request->has('export')) {
            $fileName = $reportType . '_report_' . date('Y-m-d') . '.csv';
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = $reportType == 'stocks' 
                ? ['No', 'Item Code', 'Name', 'Category', 'Quantity', 'Cost', 'Price', 'Exp. Date']
                : ['No', 'Date', 'Voucher No', 'Total Amount', 'Cashier'];

            $callback = function() use($results, $columns, $reportType) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($results as $index => $item) {
                    $row = $reportType == 'stocks'
                        ? [
                            $index + 1,
                            $item->itemCode,
                            $item->itemName,
                            $item->category ? $item->category->name : 'N/A',
                            $item->quantity,
                            $item->cost,
                            $item->price,
                            $item->exp_Date
                          ]
                        : [
                            $index + 1,
                            $item->sale_date,
                            $item->bill_no,
                            $item->total_amount,
                            $item->user ? $item->user->name : 'N/A'
                          ];
                    fputcsv($file, $row);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        return view('report.index', compact('results', 'reportType', 'cashiers'));
    }

    // for add user
    public function userStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required',
            'usertype' => 'required',

        ]);

        if ($validatedData['password'] === $validatedData['confirm_password']) {
            $user = new User;
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = $validatedData['password'];
            $user->usertype = $validatedData['usertype'];

            $user->save();

            return redirect()->back()->with('success', 'user added successfull');
        } else {
            return redirect()->back()->with('error', 'Error');
        }

    }

    public function userMenu()
    {
        return view('user.userMenu');
    }

    public function order()
    {
        $orders = Order::with('user')->latest()->get();

        return view('order.index', compact('orders'));
    }

    public function user()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }
    //edit user
    public function updateUser(Request $request,string $id){
        $user = User::find($id);

        // Restriction: Manager cannot edit Admin
        if (auth()->user()->usertype === 'manager' && $user->usertype === 'admin') {
            return redirect()->back()->with('error', 'Managers cannot edit Admin accounts.');
        }

        $user->update($request->all());

        $user->save();

        return redirect()->back()->with('success','item update successfull!!'); 
    }

    public function deleteUser(string $id){
        $user = User::find($id);
        
        // Restriction: Manager cannot delete Admin
        if (auth()->user()->usertype === 'manager' && $user->usertype === 'admin') {
            return redirect()->back()->with('error', 'Managers cannot delete Admin accounts.');
        }

        $user->delete();

        return redirect()->route('admin.user')->with('success','item delete successfull!!');
    }
}
