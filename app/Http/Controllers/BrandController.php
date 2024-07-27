<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

       
        return view ('Brand.brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name= $request->name;
        $brand->description= $request->description;
        $brand->save();
        return redirect()->route('brand.index')->with('message', 'Brand added successfully');
    }

    /**
     * Display the specified resource.
     */
 
    public function brand_Status(Brand $brand)
    {
        if ($brand->status == 1) {
            $brand->update(['status' => 0]);
        } else {
            $brand->update(['status' => 1]);
        }
    
        return redirect()->back()->with('message', 'Status Updated');
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('Brand.edit', compact('brand')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
{
    $brand->name = $request->name;
    $brand->description = $request->description;
    $brand->save();

    return redirect()->route('brand.index')->with('message', 'Category updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect (route('brand.index'))->with('success','product deleted successfully');
    }

}
