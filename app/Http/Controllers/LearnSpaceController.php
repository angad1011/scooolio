<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LearnSpace;
use App\Models\ShiftType;
use App\Models\Teacher;
use App\Models\WeekDay;
use App\Models\ClassTimeTable;
use App\Models\InstituteTiming;
use App\Traits\LectureTimingTrait;


class LearnSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use LectureTimingTrait;

    public function index(){
        /* Institude Id */
        $instituteId = Auth::user()->institute_id;  

        $learnSpaces = LearnSpace::all()->where('institute_id',$instituteId);
        return view('learn_spaces.index',compact('learnSpaces'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        $shiftTypes = ShiftType::all();
        $teachers = Teacher::all()->where('active',true);


        return view('learn_spaces.create',compact('shiftTypes','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'class_name'=>['required'],
            'teacher_id'=>['required'],
            'shift_type_id'=>['required'],
            'no_of_student'=>['required'],
        ]);

        /* Institude Id */
        $instituteId = Auth::user()->institute_id;  

        $learnSpace = LearnSpace::create([
            'institute_id' => $instituteId,
            'class_name' => $request->input('class_name'),
            'teacher_id' => $request->input('teacher_id'),
            'shift_type_id' => $request->input('shift_type_id'),
            'no_of_student' => $request->input('no_of_student'),
        ]);

        return redirect()->route('learn_spaces.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $instituteId = Auth::user()->institute_id;  

        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($id);

        $shiftTypeId = $classDetail->shift_type_id;

        $timing = InstituteTiming::where('institute_id', $instituteId)
        ->where('shift_type_id', $shiftTypeId)
        ->first();
         
        $classTiming = $this->lecture_timing($timing);

        $lectureSession = $classTiming['session']; 

        // dd($lectureSession);


        /*WeekDays*/ 
        $weekDays = WeekDay::all()->where('active',true);

        // Selecte Class Existing Schedulud
        $timeTables = ClassTimeTable::where(['institute_id'=>$instituteId,'learn_space_id'=>$id])->get();




        // dd($classDetail);    
        return view('learn_spaces.show',compact('classDetail','weekDays','timeTables','lectureSession'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $learnSpace = LearnSpace::findOrFail($id);
        
        $shiftTypes = ShiftType::all();
        $teachers = Teacher::all()->where('active',true);

        return view('learn_spaces.edit',compact('shiftTypes','learnSpace','teachers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $learnSpace = LearnSpace::find($id);
        if (!$learnSpace) {
            return redirect()->route('LearnSpace.index')->with('error', 'User not found.');
       }

    //    dd($request);

       $learnSpace->update($request->all()); 

       return redirect()->route('learn_spaces.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
