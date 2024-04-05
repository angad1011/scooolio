<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Students;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $instituteId = Auth::user()->institute_id;
        $students = Students::all()->where('institute_id',$instituteId);

        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        
        $instituteId = Auth::user()->institute_id;
       

        return view('students.create',compact('instituteId'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        // dd($request);

        $validatedData = $request->validate([
            'name' => ['required'],
            'gr_no' => ['required'],
            'email' => ['required', 'email', 'unique:students,email'],
            'contact_no' => ['required', 'unique:students,contact_no'],
            'date_of_birth' => ['required'],
            'gender' => ['required'],
            'father_name' => ['required'],
            'mother_name' => ['required']
        ]);

        // dd($validatedData);

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        // Create a new Teacher
        $student = Students::create([
            'institute_id' => $request->input('institute_id'),
            'gr_no' => $request->input('gr_no'),
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact_no' => $validatedData['contact_no'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'gender' => $validatedData['gender'],
            'blood_group' => $request->input('blood_group'),
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'active' => $active, // Simplified 'active' field check
            'father_qualification' =>$request->input('father_qualification'),
            'mother_qualification' =>$request->input('mother_qualification'),
            'date_of_admission' =>$request->input('date_of_admission'),
            'address' =>$request->input('address'),
        ]);

        // dd($student);

         // // Upload Profile Image
         if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $folder = 'files/students/profile_img/' . $student->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $student->profile_img = $image->getClientOriginalName();
        } 

        if ($student->save()) {
            return redirect()->route('students.index')->with('success', 'Student added successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to save user.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        
        $student = Students::findOrFail($id);
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $student = Students::findOrFail($id);

        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        // dd($request);

        $student = Students::find($id);
       
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        $student->update([
            'gr_no' => $request->input('gr_no'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'blood_group' => $request->input('blood_group'),
            'father_name' => $request->input('father_name'),
            'father_qualification' => $request->input('father_qualification'),
            'mother_name' => $request->input('mother_name'),
            'mother_qualification' => $request->input('mother_qualification'),
            'date_of_admission' => $request->input('date_of_admission'),
            'date_of_leaving' => $request->input('date_of_leaving'),
            'active' => $active, // Simplified 'active' field check
            'address' => $request->input('address'),
        ]);

          // // Upload Profile Image
          if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $folder = 'files/students/profile_img/' . $student->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $student->profile_img = $image->getClientOriginalName();
        }

        if ($student->save()) {
            return redirect()->route('students.index')->with('success', 'Student Update successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to save user.');
        }
    

    }


    public function importStudents(Request $request)
    {

        // dd($request);

        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        // dd($file);

        Excel::import(new StudentsImport, $file);

        // return redirect()->back()->with('success', 'Students imported successfully.');
        return redirect()->route('students.index')->with('success', 'Student imported successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
