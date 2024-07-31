<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;




class CustomerController extends Controller
{

    
    public function customer_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
    
        // Note: It's recommended to hash passwords securely instead of plain comparison.
        $result = Customer::where('email', $email)->where('password', $password)->first();
    
        if ($result) {

            Session::put('id',$result->id);
            return redirect()->route('Frontend.checkout');
        } else {
            return redirect()->route('Frontend.pages.logincheck');
        }
    }
    public function customer_register(Request $request){
        
       $data = array();
       $data['id'] = $request->id;
       $data['name'] = $request->name;
       $data['email'] = $request->email;
       $data['password'] =$request->password;
       $data['phone'] = $request->phone;
       $id = Customer::insertGetId($data);
       Session::put('id',$id);
       Session::put('name',$request->name);
     
       return redirect()->route('Frontend.checkout');
}

public function customer_logout(){
    Session::flush();
    return redirect()->route('home');
}

}
