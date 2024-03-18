<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pageTitle = "Roles";
        $roles = Role::all();

        return view('roles.index',compact('pageTitle','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Add";

        return view('roles.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        // dd($request);

        $request->validate([
             'name' => ['required']
        ]);   

        $role = Role::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
          $role = Role::findOrFail($id);

         return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
      
       $role = Role::find($id);

       // dd($request);

       if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
       }

        $role->update([
            'name' => $request->input('name'),
            'active' => $request->input('active')
        ]);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
