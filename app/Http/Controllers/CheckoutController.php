<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('Frontend.checkout');
    }
    public function logincheck(){
        return view('Frontend.pages.logincheck');
    }

    public function shiping_details(Request $request){
       

        // dd($request->all());

        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['zip'] = $request->zip;
        $s_id = Shipping::insertGetId($data);
        Session::put('id',$s_id);
       
        return redirect()->route('Frontend.payment');
       
       
}

// public function payment()
// {
//     return view('Frontend.pages.payment');
// }
}
