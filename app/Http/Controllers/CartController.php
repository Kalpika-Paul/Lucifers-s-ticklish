<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $quantity = $request->quantity;
        $id = $request->id;
        
        $product = Product::find($id);

        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity
        ];

        Cart::add($data);

        return redirect()->back();
    }

    public function delete_cart($id){
       
      Cart::remove($id);
      return redirect()->back();
      
    }


}