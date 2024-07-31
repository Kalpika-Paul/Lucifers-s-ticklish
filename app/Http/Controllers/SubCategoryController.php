<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::all(); 
        return view('subcategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();
    return view('addnewsubcategory', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{    //create instances
    $subcategory = new Subcategory;
    $subcategory->cat_id = $request->category;
    $subcategory->name = $request->name;
    $subcategory->description = $request->description;
    $subcategory->save();

    return redirect(route('subcategory.index'))->with('message', 'SubCategory created successfully');
}

    /**
     * Display the specified resource.
     */
    public function change_status(Subcategory $subcategory)
    {
        if ($subcategory->status == 1) {
            $subcategory->update(['status' => 0]);
        } 
        else {
            $subcategory->update(['status' => 1]);
        }
    
        return redirect()->back()->with('message', 'Status Updated');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {    
        //for category instance
        $categories = Category::all();
        return view('editn', compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $id)
    {
    //   return $id;
    $subcategory =  Subcategory::find($id);
    $subcategory->name = $request->name;
    $subcategory->cat_id=$request->category;
    $subcategory->description = $request->description;
    $subcategory->save();
   
    return redirect()->route('subcategory.index')->with('message', 'Subcategory updated successfully.');
 }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $Subcategory )
    {
        $Subcategory->delete();
        return redirect (route('subcategory.index'))->with('success','product deleted successfully');
       }
   
}

