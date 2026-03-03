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

class AdminController extends Controller
{
    public function index()
    {
        $saleReports = SaleReport::all(); 
        // $saleReports = SaleReport::with('user')->get(); 
        
        return view('index', compact('saleReports')); // for dashboard
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

    // //
    public function inventory()
    {
        $categories = Category::all(); // Fetch all categories to populate the dropdown

        return view('inventory.index', compact('categories')); // for inventory
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
                BillItem::create([
                    'bill_id' => $bill->id,
                    'item_id' => $item['item_code'],
                    'quantity' => $item['quantity'],
                    'amount' => $item['amount'],
                ]);

                // Update stock
                Inventory::where('itemCode', $item['item_code'])
                    ->decrement('quantity', $item['quantity']);
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

    public function report()
    {
        return view('report.index');
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
        return view('order.index');
    }

    public function user()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }
}
