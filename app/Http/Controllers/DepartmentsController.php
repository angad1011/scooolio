<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
         $pageTitle = "Department";
         $departments = Department::all();

        return view('departments.index',compact('pageTitle','departments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $pageTitle = "Add";
        return view('departments.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
       $request->validate([
             'name' => ['required']
       ]);   

       $role = Department::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

       return redirect()->route('departments.index');

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
        $department = Department::findOrFail($id);

        return view('departments.edit',compact('department'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
         $department = Department::find($id);

       if (!$department) {
            return redirect()->route('departments.index')->with('error', 'Department not found.');
        }

        $department->update([
            'name' => $request->input('name'),
            'active' => $request->input('active')
        ]);

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
