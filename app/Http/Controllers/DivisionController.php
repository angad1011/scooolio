<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pageTitle = "Division";
        $divisions = Division::all();

        // dd($divisions);

       return view('divisions.index',compact('pageTitle','divisions'));

   }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $pageTitle = "Add";
        return view('divisions.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // dd($request);

        $request->validate([
             'name' => ['required']
        ]); 

        /*Active*/
        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

        $division = Division::create([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('divisions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $division = Division::findOrFail($id);

        return view('divisions.edit',compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $division = Division::find($id);

       if (!$division) {
           return redirect()->route('divisions.index')->with('error', 'Division not found.');
       }

       $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

       $division->update([
           'name' => $request->input('name'),
           'active' => (!empty($active)) ? 1 : 0,
       ]);

         return redirect()->route('divisions.index');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
