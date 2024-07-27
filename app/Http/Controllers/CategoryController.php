<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;
use App\Models\Category;
// use Illuminate\Http\Request::all();
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();

        return view('category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addnewcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
{
    // Create a new category instance
    $category = new Category;
    $category->name = $request->name;
    $category->description = $request->description;
    
    // Check if an image file is provided and handle the upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('category', $filename, 'public'); // Store the file in the 'category' directory under the 'public' disk
        $category->image = $filename;
    }
        $category->save();
    
 
        return redirect()->route('category.index')->with('message', 'Category created successfully');
   
 }



    

    /**
     * Display the specified resource.
     */
    public function change_Status(Category $category)
    {
        if ($category->status == 1) {
            $category->update(['status' => 0]);
        } else {
            $category->update(['status' => 1]);
        }
    
        return redirect()->back()->with('message', 'Status Updated');
    }
    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Category $category)
    {
        return view('edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    
     public function update(Request $request, $id)
    {

    $category=Category::find($id);
    $category->name = $request->name;
    $category->description = $request->description;
    $category->image = $request->image;
    $category->save();

    return redirect()->route('category.index')->with('message', 'Category updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect (route('category.index'))->with('success','product deleted successfully');
       }
    }

