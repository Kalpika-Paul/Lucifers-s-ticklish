<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function checkout()
    {
       
      $customer_id = Customer::where('id', Session::get('id'))->first();
      return view('Frontend.checkout', compact('customer_id'));

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

      $data->save(); 

Session::put('sid', $data->id);  


   return redirect()->route('Frontend.pages.payment');


  }
    
  public function payment(){
 
    $cartCollection = Cart::getContent();
    $cart_array = $cartCollection->toArray();
    return view('Frontend.pages.payment', compact('cart_array'));

}


public function order_place(Request $request){

    // Validate payment method
    $validatedData = $request->validate([
        'payment_method' => 'required|string',
    ]);

    // Create new payment record
    $p_data = new Payment;
    $p_data->payment_method = $request->payment_method;
    $p_data->status = 'pending';
    $p_data->save(); 

    // Get the payment ID directly from the saved instance
    $payment_Id = $p_data->id;

    // Ensure customer ID is stored in the session during login or registration
    $customerId = Session::get('id');
    
    if (!$customerId) {
        return redirect()->route('Frontend.pages.logincheck')->withErrors('Customer not logged in.');
    }

    // Prepare order data
    $odata = array();
    $odata['cus_id'] = $customerId;
    $odata['ship_id'] = Session::get('sid');
    $odata['pay_id'] = $payment_Id;
    $odata['total'] = Cart::getTotal();
    $odata['status'] = 'pending';
    
    // Insert order and get the order ID
    $order_id = Order::insertGetId($odata);



   $cartcollection = Cart::getContent();
   $oddata = array();

  
   Foreach($cartcollection as $cartContent){

    $oddata['order_id'] = $order_id;
    $oddata['product_id'] = $cartContent->id;
    $oddata['product_name'] = $cartContent->name;
    $oddata['product_price'] = $cartContent->price;
    $oddata['product_sales_qty'] = $cartContent->quantity;
    
    DB::table('order_details')->insert($oddata);
}


if ($validatedData['payment_method'] == 'cash') {
    Cart::clear();
    return view('Frontend.pages.payment_method');
}

elseif($validatedData['payment_method'] == 'BKash'){
Cart::clear();
    return view('Frontend.pages.payment_method');
}

elseif($validatedData['payment_method'] == 'Nagad')
Cart::clear();
    return view('Frontend.pages.payment_method');
}
}




 




