<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstituteType;

class InstituteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(){
        $pageTitle = "InstituteType";
        $instituteTypes = InstituteType::all();
        return view('institute_types.index',compact('pageTitle','instituteTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create(){
        $pageTitle = "Add";

        return view('institute_types.create',compact('pageTitle'));
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

        $instituteType = InstituteType::create([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('institute_types.index');
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
         $instituteType = InstituteType::findOrFail($id);

         return view('institute_types.edit',compact('instituteType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
         $instituteType = InstituteType::find($id);

        if (!$instituteType) {
            return redirect()->route('institute_types.index')->with('error', 'InstituteType not found.');
        }

        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

        $instituteType->update([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

          return redirect()->route('institute_types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
