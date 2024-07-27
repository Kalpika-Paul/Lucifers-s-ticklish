<?php

namespace App\Http\Controllers;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
   
    public function index()
    {
        $sizes = Size::all();
        return view ('Size.size',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $size = new Size();
        $size->size = $request->size;
        $size->save();
        return redirect()->route('size.index')->with('message', ' added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function size_Status(Size $size)
    {
        if ($size->status == 1) {
            
            $size->update(['status' => 0]);
        } else {
            $size->update(['status' => 1]);
        }
    
        return redirect()->back()->with('message', 'Status Updated');
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('Size.edit', compact('size')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $size)
    {

    $size = Size::find($size);
    $size->size = $request->size;
    $size->save();

    return redirect()->route('size.index')->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect (route('size.index'))->with('success','product deleted successfully');
    }
}
