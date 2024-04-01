<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassTimeTable;
use App\Models\WeekDay;
use App\Models\LearnSpace;
use App\Models\InstituteTiming;
use App\Models\Subject;
use App\Models\Teacher;


class ClassTimeTableController extends Controller
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

    /*Setup Class Wise Time Table Methof */ 
    public function add(string $classId){
        
        $instituteId = Auth::user()->institute_id;

        /*WeekDays*/ 
        $weekDays = WeekDay::all()->where('active',true);

        // dd($weekDays);
        
        /*Selecte Class Details*/ 
        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($classId);

        /*Class Shift Timing*/ 
        $shiftTypeId = $classDetail->shift_type_id;

        $timing = InstituteTiming::where('institute_id', $instituteId)
        ->where('shift_type_id', $shiftTypeId)
        ->first();

        $classTiming = $this->lecture_timing($timing);

        $lectureSession = $classTiming['session']; 
      
        $subjects = Subject::all()->where('institute_id',$instituteId);

        $teachers = Teacher::all()->where('institute_id',$instituteId);

        return view('time_tables.add',compact('classId','instituteId','weekDays','classDetail','lectureSession','subjects','teachers'));

    }

    public function lecture_timing($timing){

        // dd($timing->shift_end);
        $school_start_time = strtotime($timing->shift_start);
        $school_end_time = strtotime($timing->shift_end);
        $break_start_time = strtotime($timing->break_time_start);
        $noOfLecSesionOne = $timing->no_of_lect_fist_session;
        $noOfLecSesionTwo = $timing->no_of_lect_secound_session;
        $break_duration  = $timing->break_durations;
        $prayer_duration = $timing->prayer_time;

        // Calculate the start time for the first session (school start time + prayer duration)
        $first_session_start_time = $school_start_time + ($prayer_duration * 60);

        // Calculate the end time for the first session
        $first_session_end_time = $break_start_time - $break_duration;

         // Calculate the number of periods for the first session
        $first_session_duration = ($first_session_end_time - $first_session_start_time) / 60; // in minutes    

        $period_duration = $first_session_duration / $noOfLecSesionOne;
       
          // Calculate start and end time for each period in the first session
        $periods_first_session = [];
        $current_time = $first_session_start_time;
        for ($i = 1; $i <= $noOfLecSesionOne; $i++) {
            $period_start = date('h:i A', $current_time);
            $current_time += $period_duration * 60;
            $period_end = date('h:i A', $current_time);
            $periods_first_session[] = [
                'period_number' => $i,
                'start_time' => $period_start,
                'end_time' => $period_end
            ];
        }

        $breakDuration =  $break_start_time + $break_duration * 60;
        $breakeEndtime = date('H:i',$breakDuration);
        $breakSetup [] = [
            'Break Start' => $timing->break_time_start,
            'Break Duration' => $break_duration,
            'Breake End' => $breakeEndtime,
        ];


         // Calculate the start time for the second session (end time of first session + break duration)
        $second_session_start_time = $break_start_time + $break_duration;
        
        // Calculate the number of periods for the second session
        
        // dd($school_end_time);

        // $second_session_duration = ($school_end_time - $second_session_start_time) / 60; // in minutes
        $second_session_duration = ($school_end_time - $breakDuration) / 60; // in minutes

        $period_duration1 =  $second_session_duration / $noOfLecSesionTwo;

        // dd($period_duration1);
       

         // Calculate start and end time for each period in the second session
        $periods_second_session = [];
        $current_time = $breakDuration;
        for ($i = 1; $i <= $noOfLecSesionTwo; $i++) {
            $period_start = date('h:i A', $current_time);
            $current_time += $period_duration1 * 60;
            $period_end = date('h:i A', $current_time);
            $periods_second_session[] = [
                'period_number' => $noOfLecSesionOne + $i,
                'start_time' => $period_start,
                'end_time' => $period_end
            ];
        }

        // return [
        //     'first_session' => $periods_first_session,
        //     'Break' => $breakSetup,
        //     'second_session' => $periods_second_session
        // ];

        $session = array_merge($periods_first_session,$periods_second_session);
        $breakModule = $breakSetup;
        
        return ['session'=>$session,'breakModule'=>$breakModule];


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        // dd($request);
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
