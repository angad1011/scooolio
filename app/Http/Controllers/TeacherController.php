<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\LearnSpace;
use App\Models\Subject;
use App\Models\TeachersSubjects;
use App\Models\TeachersLearnSpaces;
use App\Models\ShiftType;
use App\Models\WeekDay;
use App\Models\ClassTimeTable;
use App\Models\InstituteTiming;
use App\Traits\LectureTimingTrait;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use LectureTimingTrait;

    public function index(){
        $instituteId = Auth::user()->institute_id;
        $teachers = Teacher::where('institute_id', $instituteId)->with('shift_types')->get();

        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $instituteId = Auth::user()->institute_id;
        $subjects = Subject::all()->where('institute_id',$instituteId);
        
        // $learnSpaces = LearnSpace::all()->where('institute_id',$instituteId)->with('Division');
        $assignClasses = LearnSpace::all()->where('institute_id', $instituteId);


        // Shift Types
        $shiftTypes = ShiftType::all();

        // dd($shiftTypes);

        return view('teachers.create',compact('assignClasses','subjects','instituteId','shiftTypes'));

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
            'shift_type_id' => $request->input('shift_type_id'),
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
    public function show(string $id){
        $teacher = Teacher::with('learn_spaces','subjects')->findOrFail($id);

        // Subjects 
        $subjects = $teacher->subjects;
       
        // Assignd Class
        $assignClasses = $teacher->learn_spaces;

        return view('teachers.show',compact('teacher','subjects','assignClasses'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        
        $teacher = Teacher::findOrFail($id);

        // Selected Subjec For Teacher
        $selectedSubjectIds = $teacher->subjects;

        //Assign Class For Teacher
        $selectedClassIds = $teacher->learn_spaces;

        // dd($selectedClassIds);

        $instituteId = Auth::user()->institute_id;
        $subjects = Subject::all()->where('institute_id',$instituteId);

        $assignClasses = LearnSpace::all()->where('institute_id', $instituteId);

        // Shift Types
        $shiftTypes = ShiftType::all();

        return view('teachers.edit',compact('subjects','instituteId','teacher','assignClasses','shiftTypes','selectedSubjectIds','selectedClassIds'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::find($id);

       // dd($teacher);

        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found.');
        }

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        $teacher->update([
            'shift_type_id' => $request->input('shift_type_id'),
            'name' => $request->input('name'),
            'contact' => $request->input('contact'),
            'qualification' => $request->input('qualification'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'active' => $active, // Simplified 'active' field check
            'address' => $request->input('address'),
        ]);

        
        $subjects = $request->has('subjects') ? $request->input('subjects') : '';
        if (!empty($subjects)) {
            // Get existing associations for this teacher
            $existingSubjects = TeachersSubjects::where('teacher_id', $teacher->id)->pluck('subject_id')->toArray();
        
            foreach ($subjects as $subject) {
                // Check if the subject already exists in the existing associations
                if (!in_array($subject, $existingSubjects)) {
                    // If not, create a new association
                    $teacherSubjects = TeachersSubjects::create([
                        'teacher_id' => $teacher->id,
                        'subject_id' => $subject,
                    ]);
                }
            }
        }    
        
        // For Teacher Class
        $classes = $request->has('learn_spaces') ? $request->input('learn_spaces') : '';

        if(!empty($classes)){

             // Get existing associations for this teacher
             $existingClasses = TeachersLearnSpaces::where('teacher_id', $teacher->id)->pluck('learn_space_id')->toArray();

            foreach($classes as $classe){
                if (!in_array($classe, $existingClasses)) {
                    TeachersLearnSpaces::create([
                        'teacher_id'=>$teacher->id,
                        'learn_space_id'=>$classe,
                    ]);
                }
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

    /*Teachers Time Table*/    
    public function timeTable(string $teacherId){
        $instituteId = Auth::user()->institute_id;
       
        $teacher = Teacher::with('learn_spaces','subjects')->findOrFail($teacherId);

        $shiftTypeId = $teacher->shift_type_id;

        $timing = InstituteTiming::where('institute_id', $instituteId)
        ->where('shift_type_id', $shiftTypeId)
        ->first();

         $classTiming = $this->lecture_timing($timing);

         $lectureSession = $classTiming['session']; 

        //  dd($lectureSession);

        /*WeekDays*/ 
        $weekDays = WeekDay::all()->where('active',true);

        
        // Selecte Class Existing Schedulud
        $timeTables = ClassTimeTable::where(['institute_id'=>$instituteId,'teacher_id'=>$teacherId])->get();

    //    dd($timeTables);    

       return view('teachers.time_table',compact('teacher','lectureSession','lectureSession','weekDays','timeTables'));

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
