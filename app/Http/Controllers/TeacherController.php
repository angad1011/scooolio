<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\LearnSpace;
use App\Models\Subject;
use App\Models\TeachersSubjects;
use App\Models\TeachersLearnSpaces;
use App\Models\ShiftType;
use App\Models\WeekDay;
use App\Models\ClassTimeTable;
use App\Models\InstituteTiming;
use App\Models\TeacherActivation;
use App\Traits\LectureTimingTrait;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use LectureTimingTrait;

    public function index(){
        $instituteId = Auth::user()->institute_id;
       
        $teacherQuerry = Teacher::where('institute_id', $instituteId)
                    ->with('shift_types');

        $teachers = $teacherQuerry->paginate(10);

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

        $emplyeeId = Teacher::latest()->value('id');
        $emplyeecode = (!empty($emplyeeId)) ? str_pad($emplyeeId + 1, 2, '0', STR_PAD_LEFT) : "01";
        $emplyeecode = 'EMP'.$emplyeecode;
        
        // dd($emplyeecode);

        return view('teachers.create',compact('assignClasses','subjects','instituteId','shiftTypes','emplyeecode'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // dd($request);
        
        // dd($request->all());

        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:teachers,email'],
            'contact' => ['required', 'unique:teachers,contact'],
            'qualification' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'martial_status' => ['required'],
            'nationality' => ['required'],
            'religion' => ['required'],
            'cast_catogory' => ['required'],
            'institute' => ['required'],
            'passing_year' => ['required'],
            'pincode' => ['required'],
            'city' => ['required'],
            'address' => ['required']
        ]);



        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

    
        // Create a new Teacher
        $teacher = Teacher::create([
            'institute_id' => $request->input('institute_id'),
            'shift_type_id' => $request->input('shift_type_id'),
            'employee_id' => $request->input('employee_id'),
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'name' => $validatedData['first_name'].' '.$validatedData['last_name'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'alternate_no' => $request->input('alternate_no'),
            'whatsaap' => $request->input('whatsaap'),
            'gender' => $validatedData['gender'],
            'joining_date' => $validatedData['joining_date'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'martial_status' => $validatedData['martial_status'],
            'nationality' => $validatedData['nationality'],
            'religion' => $validatedData['religion'],
            'cast_catogory' => $validatedData['cast_catogory'],
            'qualification' => $validatedData['qualification'],
            'specialization' => $request->input('specialization'),
            'institute' => $validatedData['institute'],
            'passing_year' => $validatedData['passing_year'],
            'pincode' => $validatedData['pincode'],
            'city' => $validatedData['city'],
            'state' => $request->input('state'),
            'address' => $validatedData['address'],
            'active' => $active, // Simplified 'active' field check
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

        if ($request->hasFile('aadhar_cart')) {
            $image = $request->file('aadhar_cart');
            $folder = 'files/teachers/aadhar_cart/' . $teacher->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $teacher->aadhar_cart = $image->getClientOriginalName();
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

        // dd($teacher);

        $emplyeecode = (!empty($teacher->employee_id)) ? $teacher->employee_id : 'EMP'.$id;

        // Selected Subjec For Teacher
        $selectedSubjectIds = $teacher->subjects;

        // dd($selectedSubjectIds);

        //Assign Class For Teacher
        $selectedClassIds = $teacher->learn_spaces;

        // dd($selectedClassIds);

        $instituteId = Auth::user()->institute_id;
        $subjects = Subject::all()->where('institute_id',$instituteId);

        $assignClasses = LearnSpace::all()->where('institute_id', $instituteId);

        // Shift Types
        $shiftTypes = ShiftType::all();



        return view('teachers.edit',compact('subjects','instituteId','teacher','assignClasses','shiftTypes','selectedSubjectIds','selectedClassIds','emplyeecode'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::find($id);

       // dd($request->all());

        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found.');
        }

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        $name = $request->input('first_name').' '.$request->input('last_name');

        $teacher->update([
            'shift_type_id' => $request->input('shift_type_id'),
            'employee_id' => $request->input('employee_id'),
            'joining_date' => $request->input('joining_date'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'name' => $name,
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'alternate_no' => $request->input('alternate_no'),
            'whatsaap' => $request->input('whatsaap'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'martial_status' => $request->input('martial_status'),
            'nationality' => $request->input('nationality'),
            'religion' => $request->input('religion'),
            'cast_catogory' => $request->input('cast_catogory'),
            'qualification' => $request->input('qualification'),
            'specialization' => $request->input('specialization'),
            'institute' => $request->input('institute'),
            'passing_year' => $request->input('passing_year'),
            'passing_year' => $request->input('passing_year'),
            'active' => $active, // Simplified 'active' field check
            'pincode' => $request->input('pincode'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
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

         if ($request->hasFile('aadhar_cart')) {
            $image = $request->file('aadhar_cart');
            $folder = 'files/teachers/aadhar_cart/' . $teacher->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $teacher->aadhar_cart = $image->getClientOriginalName();
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

        // dd($teacher);

        $shiftTypeId = $teacher->shift_type_id;

        $timing = InstituteTiming::where('institute_id', $instituteId)
        ->where('shift_type_id', $shiftTypeId)
        ->first();

         $classTiming = $this->lecture_timing($timing);

        //  dd($classTiming);

         $lectureSession = $classTiming['session']; 

        //  dd($lectureSession);

        /*WeekDays*/ 
        $weekDays = WeekDay::all()->where('active',true);

    //    dd($weekDays);

        
        // Selecte Class Existing Schedulud
        $timeTables = ClassTimeTable::where(['institute_id'=>$instituteId,'teacher_id'=>$teacherId])->get();

        // dd($timeTables);

       return view('teachers.time_table',compact('teacher','lectureSession','weekDays','timeTables'));

    }


    // 
    public function time_table_api(){
        $instituteId = Auth::user()->institute_id;
        $teacherActivationId = Auth::user()->id;
        $teacher = Teacher::with('learn_spaces','subjects')->findOrFail($teacherActivationId);

        $teacherId = $teacher->id;

        $shiftTypeId = $teacher->shift_type_id;

        $timing = InstituteTiming::where('institute_id', $instituteId)
        ->where('shift_type_id', $shiftTypeId)
        ->first();

         $classTiming = $this->lecture_timing($timing);

        //  dd($classTiming);

        $lectureSession = $classTiming['session']; 

        //  print_r($lectureSession); exit;  


        /*WeekDays*/ 
        $weekDays = WeekDay::all()->where('active',true);

        // echo $weekDays;    

         // Selecte Class Existing Schedulud
         $timeTables = ClassTimeTable::where(['institute_id'=>$instituteId,'teacher_id'=>$teacherId])->with('learn_spaces','subjects','week_days')->get();

        //  dd($timeTables);
        

        // echo $timeTables;
       
        $teacherTimeTableArr = [];
        $count = 0;
        foreach ($weekDays as $key => $weekDay) {
            $teacherTimeTableArr[$weekDay['day']] = [];
            foreach ($lectureSession as $key => $sessionPeriods) {
                $lectureFound = false; // Reset for each session period
                foreach ($timeTables as $key => $teacherTimeTable) {
                    if ($teacherTimeTable->week_day_id == $weekDay->id && $teacherTimeTable->period_number == $sessionPeriods['period_number']) {
                        $teacherTimeTableArr[$weekDay['day']][$count]['teacher_id'] = $teacherId;
                        $teacherTimeTableArr[$weekDay['day']][$count]['week_day_id'] = $teacherTimeTable->week_day_id;
                        $teacherTimeTableArr[$weekDay['day']][$count]['period_number'] = $teacherTimeTable->period_number;
                        $teacherTimeTableArr[$weekDay['day']][$count]['lecture_duration'] = $teacherTimeTable->lecture_duration;
                        $teacherTimeTableArr[$weekDay['day']][$count]['subject'] = $teacherTimeTable->subjects->name;
                        $teacherTimeTableArr[$weekDay['day']][$count]['class'] = $teacherTimeTable->learn_spaces->class_name;
                        $lectureFound = true; // Set the flag to true since a lecture is found
                        break; // No need to continue looping once the lecture is found
                    }
                }
                
                if (!$lectureFound) {
                    // If no matching lecture is found, set 'lecture' to 'not Yet Annoce'
                    $teacherTimeTableArr[$weekDay['day']][$count]['teacher_id'] = $teacherId;
                    $teacherTimeTableArr[$weekDay['day']][$count]['week_day_id'] = $weekDay->id;
                    $teacherTimeTableArr[$weekDay['day']][$count]['period_number'] = $sessionPeriods['period_number'];
                    $teacherTimeTableArr[$weekDay['day']][$count]['lecture_duration'] = $sessionPeriods['start_time'].'-'.$sessionPeriods['end_time'];
                    $teacherTimeTableArr[$weekDay['day']][$count]['lecture'] = 'Not Yet Assign!';
                }
                
                $count++;
            }
        }

        return response()->json([
            'status' => true,
            'teacher_time_table' => $teacherTimeTableArr
         ]);



    }

   /*day wise techer time table*/
   public function teacher_day_time_table(string $weekdayId){

    $instituteId = Auth::user()->institute_id;
    $teacherActivationId = Auth::user()->id;
    $teacher = Teacher::with('learn_spaces','subjects')->findOrFail($teacherActivationId);

    $teacherId = $teacher->id;

    $shiftTypeId = $teacher->shift_type_id;

    $timing = InstituteTiming::where('institute_id', $instituteId)
    ->where('shift_type_id', $shiftTypeId)
    ->first();

     $classTiming = $this->lecture_timing($timing);
    $lectureSession = $classTiming['session']; 

    // $weekDay = weekDay::all()->where('active',true);
    $weekDay = weekDay::findOrFail($weekdayId);

    $selectedDay =  $weekDay->day;

    // echo $selectedDay;

    // Selecte Class Existing Schedulud
    $timeTables = ClassTimeTable::where(['institute_id'=>$instituteId,'teacher_id'=>$teacherId,'week_day_id'=>$weekdayId])->with('learn_spaces','subjects','week_days')->get();


    $teacherDayWiseTimeTableArr = [];
    $count = 0;
    foreach ($lectureSession as $key => $sessionPeriods) {
        $lectureFound = false; // Reset for each session period
        foreach ($timeTables as $key => $teacherTimeTable) {
            if ($teacherTimeTable->week_day_id == $weekDay->id && $teacherTimeTable->period_number == $sessionPeriods['period_number']) {
                $teacherDayWiseTimeTableArr[$selectedDay][$count]['teacher_id'] = $teacherId;
                $teacherDayWiseTimeTableArr[$selectedDay][$count]['week_day_id'] = $teacherTimeTable->week_day_id;
                $teacherDayWiseTimeTableArr[$selectedDay][$count]['period_number'] = $teacherTimeTable->period_number;
                $teacherDayWiseTimeTableArr[$selectedDay][$count]['lecture_duration'] = $teacherTimeTable->lecture_duration;
                $teacherDayWiseTimeTableArr[$selectedDay][$count]['subject'] = $teacherTimeTable->subjects->name;
                $teacherDayWiseTimeTableArr[$selectedDay][$count]['class'] = $teacherTimeTable->learn_spaces->class_name;
                $lectureFound = true; // Set the flag to true since a lecture is found
                break; // No need to continue looping once the lecture is found
            }
        }
        
        if (!$lectureFound) {
            // If no matching lecture is found, set 'lecture' to 'not Yet Annoce'
            $teacherDayWiseTimeTableArr[$selectedDay][$count]['teacher_id'] = $teacherId;
            $teacherDayWiseTimeTableArr[$selectedDay][$count]['week_day_id'] = $weekDay->id;
            $teacherDayWiseTimeTableArr[$selectedDay][$count]['period_number'] = $sessionPeriods['period_number'];
            $teacherDayWiseTimeTableArr[$selectedDay][$count]['lecture_duration'] = $sessionPeriods['start_time'].'-'.$sessionPeriods['end_time'];
            $teacherDayWiseTimeTableArr[$selectedDay][$count]['lecture'] = 'Not Yet Assign!';
        }
        
        $count++;
    }    

    return response()->json([
        'status' => true,
        'teacher_day_wise_time_table' => $teacherDayWiseTimeTableArr
     ]);



   }    



    /*Teacher Activation Details*/ 
    public function activation(string $teacherId){
        $instituteId = Auth::user()->institute_id;
        $teacher = Teacher::find($teacherId);
        
        $teacherActivation = TeacherActivation::where(['teacher_id'=>$teacherId])->first(); 
  
        return view('teachers.activation',compact('teacher','teacherActivation','teacherId'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /*Teache Profile Api*/
    public function teacher_profile(){
         $teacherId = Auth::user()->id;
         $teacher = Teacher::find($teacherId);

         $firstImage = $teacher->profile_img;
         $imagePath = $firstImage ? asset("files/teachers/profile_img/".$teacherId."/".$firstImage."") : asset('dist/images/admin-pic.jpg');

         $teacher->profile_img = $imagePath;

          return response()->json([
            'status' => true,
            'teacher' => $teacher
         ]);
    }

    

}
