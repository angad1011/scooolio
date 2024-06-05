<?php

namespace App\Http\Controllers;

use App\Mail\TeacherActivationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherActivation;
use App\Models\Teacher;

class TeacherActivationController extends BaseController
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

        $teacherId = $request->input('teacher_id');

        $teacher = Teacher::findOrFail($teacherId);


        $password = $request->input('password');

        $teacherActivation = new TeacherActivation(); 

        if(empty($request->input('id'))){
            $teacherActivation->institute_id = $instituteId;
            $teacherActivation->teacher_id = $teacherId;
            $teacherActivation->username = $request->input('username');
            $teacherActivation->password = bcrypt($password);
            $teacherActivation->active = $active;

             // Save the record to the database
             $teacherActivation->save();
        }else{
            TeacherActivation::updateOrCreate(
                ['id' => $request->input('id')], // Search condition
                [
                    'username' => $request->input('username'),
                    'password' => bcrypt($password),
                    'active' => $active
                ]
            );
        }

        $emailData = [];

        $emailData['name'] = $teacher->name;
        $emailData['password'] = $password; 

         // Send the email
        Mail::to('shehzad@puratech.in')->send(new TeacherActivationMail($emailData));


        return redirect()->back()->with('success', 'Teacher Activation Done!');

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
