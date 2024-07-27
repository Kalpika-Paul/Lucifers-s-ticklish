<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CheckoutController extends Controller
{
    public function checkout(){
 
        return view('Frontend.checkout');

    }
    public function logincheck(){
 
        return view('Frontend.pages.logincheck');

    }
  public function save_shipping_details(Request $request){



$data = new Shipping();
$data->name = $request->name;
$data->email = $request->email;
$data->address = $request->address;
$data->city = $request->city;
$data->country = $request->country;
$data->zip_code = $request->zip_code;
$data->phone = $request->phone;

$data->save(); // Save the model to the database

Session::put('id', $data->id); // Store the ID in the session

//    $data = array();
//    $data = new Shipping();
//    $data->name= $request->name;
//    $data->email= $request->email;
//    $data->address= $request->address;
//    $data->city= $request->city;
//    $data->country= $request->country;
//    $data->zip_code= $request->zip_code;
//    $data->phone= $request->phone;
   
//    $s_id = Shipping::insertGetId($data);
//    Session::put('id',$s_id);
//   $data->save();
   return redirect()->route('Frontend.pages.payment');


  }
    
  public function payment(){
 
    $cartCollection = Cart::getContent();
    $cart_array = $cartCollection->toArray();
    return view('Frontend.pages.payment', compact('cart_array'));

}


}
