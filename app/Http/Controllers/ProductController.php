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


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); 
        return view ('Products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('Products.create', compact('categories','subcategories','brands','units','sizes','colors'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    {
    $product = new Product;
    $product->cat_id = $request->category;
    $product->subcat_id = $request->subcategory;
    $product->brand_id = $request->brand;
    $product->unit_id = $request->unit;
    $product->size_id = $request->size;
    $product->color_id = $request->color;
    $product->code = $request->code;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
     

    // Check if an image file is provided and handle the upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('product', $filename, 'public'); // Store the file in the 'category' directory under the 'public' disk
        $product->image = $filename;
    }
      

     $product->save();

    //  $images = array();
    //  if($files = $request->file('file')){
    //     foreach($files as $file){
    //     $name = $file->getClientOriginalName();
    //     $fileNameExtract =explode('.',$name);
    //     $fileName = $fileNameExtract[0];
    //     $fileName.= time();
    //     $fileName.= $i;
    //     $fileName.= '.';
    //     $fileName.= $fileNameExtract[1];
    //     $file->move('image',$fileName);
    //     $image[]=$fileName;
    //     $i++;
 }

    return redirect(route('product.index'))->with('success', 'Product created successfully');
    
}

    /**
     * Display the specified resource.
     */
    public function product_Status(Product $product)
{
    if ($product->status == 1) {
        $product->update(['status' => 0]);
    } else {
        $product->update(['status' => 1]);
    }

    return redirect()->back()->with('message', 'Status Updated');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all(); 
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('Products.edit', compact('product', 'categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product){
    {
    $product = Product::find($product);
    $product->cat_id = $request->category;
    $product->subcat_id = $request->subcategory;
    $product->brand_id = $request->brand;
    $product->unit_id = $request->unit;
    $product->size_id = $request->size;
    $product->color_id = $request->color;
    $product->code = $request->code;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->save();
    }
    return redirect()->route('product.index')->with('message', 'Product  updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
        $product->delete();
        return redirect (route('product.index'))->with('success','product deleted successfully');
    }
}
