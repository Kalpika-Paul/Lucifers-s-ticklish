<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function allorders()
    {
        $orders = Order::with('customer')->get();
        return view('admin.allorders', compact('orders'));
    }
}
