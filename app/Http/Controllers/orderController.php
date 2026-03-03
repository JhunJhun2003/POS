<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function Store(Request $request){
        //dd($request);
         $validatedData = $request->validate([
            'itemCode' => 'required|unique:inventory,itemCode',
            'cashierid' => 'required',
            'quantity' => 'required|numeric',
            'orderDate' => 'required',
            'commingDate' => 'required',
        ]);
        $order = new Order;
        $order->itemCode = $validatedData['itemCode'];
        $order->cashierid = $validatedData['cashierid'];
        $order->quantity = $validatedData['quantity'];
        $order->orderDate = $validatedData['orderDate'];
        $order->commingDate = $validatedData['commingDate'];

        $order->save();
        return redirect()->back()->with('success','order successfull!!');
    }

    public function destroy(string $id){
        $order = Order::find($id);
        $order->delete();

        return redirect()->back()->with('success','order delete successfully!!');
    }
}
