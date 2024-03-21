<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\LearnSpace;
use App\Models\Subject;
use App\Models\TeachersSubjects;
use App\Models\TeachersLearnSpaces;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $instituteId = Auth::user()->institute_id;
        $teachers = Teacher::all()->where('institute_id',$instituteId);

        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $instituteId = Auth::user()->institute_id;
        $learnSpaces = LearnSpace::all()->where('institute_id',$instituteId);
        $subjects = Subject::all()->where('institute_id',$instituteId);
        return view('teachers.create',compact('learnSpaces','subjects','instituteId'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // dd($request);
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:teachers,email'],
            'contact' => ['required', 'unique:teachers,contact'],
            'qualification' => ['required'],
            'gender' => ['required'],
            'address' => ['required']
        ]);

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

    
        // Create a new Teacher
        $teacher = Teacher::create([
            'institute_id' => $request->input('institute_id'),
            'name' => $validatedData['name'],
            'contact' => $validatedData['contact'],
            'qualification' => $validatedData['qualification'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
            'active' => $active, // Simplified 'active' field check
            'address' => $validatedData['address'],
        ]);

        // dd($subjects);
        $subjects = $request->has('subjects') ? $request->input('subjects') : '';
        if(!empty($subjects)){
            foreach($subjects as $subject){
                $teacherSubjects = TeachersSubjects::create([
                    'teacher_id'=>$teacher->id,
                    'subject_id'=>$subject,
                ]);
            }
        }

        // For Teacher Class
        $classes = $request->has('learn_spaces') ? $request->input('learn_spaces') : '';
        if(!empty($classes)){
            foreach($classes as $classe){
                $teacherSubjects = TeachersLearnSpaces::create([
                    'teacher_id'=>$teacher->id,
                    'learn_space_id'=>$classe,
                ]);
            }
        }

         // // Upload Profile Image
        if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $folder = 'files/teachers/profile_img/' . $teacher->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $teacher->profile_img = $image->getClientOriginalName();
        }
    
        if ($teacher->save()) {
            return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to save user.');
        }

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
        
        $teacher = Teacher::findOrFail($id);

        $instituteId = Auth::user()->institute_id;
        $learnSpaces = LearnSpace::all()->where('institute_id',$instituteId);
        $subjects = Subject::all()->where('institute_id',$instituteId);

        return view('teachers.edit',compact('learnSpaces','subjects','instituteId','teacher'));

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
