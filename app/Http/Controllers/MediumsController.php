<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medium;

class MediumsController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pageTitle = "Medium";
        $mediums = Medium::all();
        return view('mediums.index',compact('pageTitle','mediums'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create(){
        $pageTitle = "Add";

        return view('mediums.create',compact('pageTitle'));
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

        $medium = Medium::create([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('mediums.index');

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
    public function edit(string $id){
        $medium = Medium::findOrFail($id);

         return view('mediums.edit',compact('medium'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id){
         $medium = Medium::find($id);

        if (!$medium) {
            return redirect()->route('mediums.index')->with('error', 'Medium not found.');
        }

        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

        $medium->update([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

          return redirect()->route('mediums.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
