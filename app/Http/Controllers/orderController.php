<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Store multiple orders from a session
     */
    public function Store(Request $request)
    {
        try {
            $items = $request->input('items');
            
            if (empty($items) || !is_array($items)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No items provided'
                ], 400);
            }

            foreach ($items as $item) {
                // Validation of each item
                if (empty($item['itemCode']) || empty($item['quantity'])) {
                    continue;
                }

                $order = new Order;
                $order->itemCode = $item['itemCode'];
                $order->cashierid = Auth::id(); // Use current logged in user
                $order->quantity = $item['quantity'];
                $order->orderDate = $item['orderDate'] ?? now()->toDateString();
                $order->commingDate = $item['commingDate'] ?? now()->addDays(7)->toDateString();
                $order->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Orders saved successfully!!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return redirect()->back()->with('success', 'Order deleted successfully!!');
        }
        return redirect()->back()->with('error', 'Order not found!!');
    }
}
