<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();

       
        return view ('unit-module.unit',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Unit-module.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->name= $request->name;
        $unit->description= $request->description;
        $unit->save();
        return redirect()->route('unit.index')->with('message', 'Unit added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function unit_Status(Unit $unit)
    {
        if ($unit->status == 1) {
            
            $unit->update(['status' => 0]);
        } else {
            $unit->update(['status' => 1]);
        }
    
        return redirect()->back()->with('message', 'Status Updated');
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('unit-module.edit', compact('unit')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $unit)
    {
    $unit = Unit::find($unit);
    $unit->name = $request->name;
    $unit->description = $request->description;
    $unit->save();

    return redirect()->route('unit.index')->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect (route('unit.index'))->with('success','product deleted successfully');
    }
}
