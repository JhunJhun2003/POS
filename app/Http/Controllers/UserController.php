<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\SaleReport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
    {
       return view('userbill.index'); 
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

}
