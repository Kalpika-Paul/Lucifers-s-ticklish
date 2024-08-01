<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use Laravel\Prompts\Prompt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = Product::where('status',1)->latest()->limit(12)->get();

        $top_sales = DB::table('products')
        ->leftJoin('order_details','products.id','=','order_details.product_id')
        ->selectRaw('products.id, SUM(order_details.product_sales_qty) as total')
        ->groupBy('products.id')
        ->orderBy('total','desc')
        ->take(8)
        ->get();
    $topProducts = [];
    foreach ($top_sales as $s){
        $p = Product::findOrFail($s->id);
        $p->totalQty = $s->total;
        $topProducts[] = $p;
    }
        return view('Frontend.welcome', compact('categories','subcategories','brands','units','sizes','colors','products','topProducts'));
     
        
    }

    public function view_details($id){
         

        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all(); 
        $products = Product::findOrFail($id);
        $sizes = Size::find($products->size_id);
        $colors = Color::find($products->color_id);
        $cat_id = $products->cat_id;
        $retaled_products = Product::with('category')->where('cat_id', $cat_id)->limit(4)->get();
        return view('Frontend.pages.view_details', compact('categories','subcategories','brands','units','sizes','colors','products','retaled_products'));
    }

    /**
     * Show the form for creating a new resource.
     */


public function product_by_cat($id){

  
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $brands = Brand::all();
    $products = Product::where('status', 1)->where('cat_id', $id)->limit(12)->get();

  return view('Frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));

}

public function product_by_subcat($id){

  
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $brands = Brand::all();
    $products = Product::where('status', 1)->where('subcat_id', $id)->limit(12)->get();

  return view('Frontend.pages.product_by_subcat',compact('categories','subcategories','brands','products'));

}

public function search(Request $request){


    $products=Product::orderBy('id','desc')->where('name','LIKE','%'.$request->product.'%');
        if($request->category != "ALL") $products->where('cat_id',$request->category);
        $products= $products->get();
        $categories= Category::all();
        $subcategories= SubCategory::all();
        $brands= Brand::all();
        return view('frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
    }

}


