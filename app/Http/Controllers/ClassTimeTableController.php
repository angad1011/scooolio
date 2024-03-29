<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassTimeTable;
use App\Models\WeekDay;
use App\Models\LearnSpace;
use App\Models\InstituteTiming;


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
        
        /*Selecte Class Details*/ 
        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($classId);

        /*Class Shift Timing*/ 
        $shiftTypeId = $classDetail->shift_type_id;

        $timing = InstituteTiming::where('institute_id', $instituteId)
        ->where('shift_type_id', $shiftTypeId)
        ->first();


        $classTiming = $this->lecture_timing($timing);

        dd($classTiming);

        return view('time_tables.add',compact('classId','instituteId','weekDays','classDetail'));

    }

    public function lecture_timing($timing){

        $school_start_time = strtotime($timing->shift_start);
        $school_end_time = strtotime($timing->shift_end);
        $break_start_time = strtotime($timing->break_time_start);
        $period_duration = $timing->time_per_perioud;
        $break_duration  = $timing->break_durations;
        $prayer_duration = $timing->prayer_time;

        // Calculate the start time for the first session (school start time + prayer duration)
    $first_session_start_time = $school_start_time + ($prayer_duration * 60);

    // Calculate the end time for the first session
    $first_session_end_time = $break_start_time - $break_duration;

    // Calculate the number of periods for the first session
    $first_session_duration = ($first_session_end_time - $first_session_start_time) / 60; // in minutes
    $number_of_periods_first_session = floor($first_session_duration / $period_duration);

    // Calculate start and end time for each period in the first session
    $periods_first_session = [];
    $current_time = $first_session_start_time;
    for ($i = 1; $i <= $number_of_periods_first_session; $i++) {
        $period_start = date('h:i A', $current_time);
        $current_time += $period_duration * 60;
        $period_end = date('h:i A', $current_time);
        $periods_first_session[] = [
            'period_number' => $i,
            'start_time' => $period_start,
            'end_time' => $period_end
        ];
    }

    // Calculate the start time for the second session (end time of first session + break duration)
    $second_session_start_time = $break_start_time + $break_duration;

    // Calculate the number of periods for the second session
    $second_session_duration = ($school_end_time - $second_session_start_time) / 60; // in minutes
    $number_of_periods_second_session = floor($second_session_duration / $period_duration);

    // Calculate start and end time for each period in the second session
    $periods_second_session = [];
    $current_time = $second_session_start_time;
    for ($i = 1; $i <= $number_of_periods_second_session; $i++) {
        $period_start = date('h:i A', $current_time);
        $current_time += $period_duration * 60;
        $period_end = date('h:i A', $current_time);
        $periods_second_session[] = [
            'period_number' => $number_of_periods_first_session + $i,
            'start_time' => $period_start,
            'end_time' => $period_end
        ];
    }

    return array_merge($periods_first_session, $periods_second_session);
        
         

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
