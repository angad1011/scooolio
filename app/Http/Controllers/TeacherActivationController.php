<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherActivation;

class TeacherActivationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $validatedData = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        $instituteId = Auth::user()->institute_id;

        $teacherActivation = new TeacherActivation(); 

        if(empty($request->input('id'))){
            $teacherActivation->institute_id = $instituteId;
            $teacherActivation->teacher_id = $request->input('teacher_id');
            $teacherActivation->username = $request->input('username');
            $teacherActivation->password = bcrypt($request->input('password'));
            $teacherActivation->active = $active;

             // Save the record to the database
             $teacherActivation->save();
        }else{
            TeacherActivation::updateOrCreate(
                ['id' => $request->input('id')], // Search condition
                [
                    'username' => $request->input('username'),
                    'password' => bcrypt($request->input('password')),
                    'active' => $active
                ]
            );
        }

        return redirect()->back()->with('success', 'Activation Done!');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
