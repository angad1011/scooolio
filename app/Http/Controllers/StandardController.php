<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standard;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pageTitle = "Standard";
        $standards = Standard::all();

        // dd($divisions);

       return view('standards.index',compact('pageTitle','standards'));

   }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $pageTitle = "Add";
        return view('standards.create',compact('pageTitle'));
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

        $standard = Standard::create([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('standards.index');
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
        $standard = Standard::findOrFail($id);

        return view('standards.edit',compact('standard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $standard = Standard::find($id);

       if (!$standard) {
           return redirect()->route('standards.index')->with('error', 'Standard not found.');
       }

       $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

       $standard->update([
           'name' => $request->input('name'),
           'active' => (!empty($active)) ? 1 : 0,
       ]);

         return redirect()->route('standards.index');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
