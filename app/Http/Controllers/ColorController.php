<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('Colorsx.color', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    

        return view('Colorsx.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $color = new Color;
        $color->color = $request->color;
        $color->save();
        return redirect()->route('color.index')->with('message', 'Color Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function color_status(Color $color)
    {
        if($color->status==1){
          $color->update(['status'=>0]);
        }
        else{
            $color->update(['status'=>1]);
        }
        return redirect()->back()->with('message', 'Status Updated');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
       
       {
         
        return view ('Colorsx.edit',compact('color'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $color)
    {
        $color = Color::find($color);
        $color->color = $request->color;
        $color->save();
        return redirect()->route('color.index')->with('message', 'Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect (route('color.index'))->with('success','product deleted successfully');
    }
}
