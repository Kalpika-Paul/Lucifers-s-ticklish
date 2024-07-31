<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function allorders()
    {
        $orders = Order::with('customer')->get();
        return view('admin.allorders', compact('orders'));
    }

    public function change_status($id)
    {
        $order = Order::find($id);

        if ($order->status == 'pending') {
            $order->status = 'Cash Paid';
        } else {
            $order->status = 'pending';
        }
    
        $order->save();
    
        return redirect()->back()->with('message', 'Order status updated successfully!');
    }


    public function view_order($id){
        $orders = Order::where('orders.id',$id )->first();
        $order_by_id = OrderDetails::where('order_id',$id)->get();

        return view('admin.view_order',compact('orders','order_by_id'));
    }
}
