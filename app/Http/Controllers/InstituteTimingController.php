<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShiftType;
use App\Models\Institute;
use App\Models\InstituteTiming;


class InstituteTimingController extends BaseController
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
    public function create(){
        $instituteId = Auth::user()->institute_id;
         
        /* Shift Type */ 
         $shiftTypes = ShiftType::all();


         return view('intitute_timing.create',compact('instituteId','shiftTypes'));

    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $instituteId = Auth::user()->institute_id;
       
        $request->validate([
            'shift_type_id'=>['required'],
            'shift_start'=>['required'],
            'shift_end'=>['required'],
            'break_time_start'=>['required'],
            'break_durations'=>['required'],
            'prayer_time'=>['required'],
            'time_per_perioud'=>['required'],
        ]);

        // dd($request);

         InstituteTiming::create([
            'institute_id' => $request->input('institute_id'),
            'shift_type_id' => $request->input('shift_type_id'),
            'shift_start' => $request->input('shift_start'),
            'shift_end' => $request->input('shift_end'),
            'prayer_time' => $request->input('prayer_time'),
            'break_time_start' => $request->input('break_time_start'),
            'break_durations' => $request->input('break_durations'),
            'no_of_lect_fist_session' => $request->input('no_of_lect_fist_session'),
            'no_of_lect_secound_session' => $request->input('no_of_lect_secound_session'),
        ]);

        return redirect()->route('institute_timings.detail',$instituteId);     

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
        
        $instituteId = Auth::user()->institute_id;
        $instituteTiming = InstituteTiming::findOrFail($id);
 
        /* Shift Type */ 
        $shiftTypes = ShiftType::all();


        return view('intitute_timing.edit',compact('shiftTypes','instituteTiming','instituteId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $instituteId = Auth::user()->institute_id;
        $instituteTiming = InstituteTiming::find($id);
        
        if (!$instituteTiming) {
             return redirect()->route('institute_timings.detail',$instituteId)->with('error', 'Schedulude not found.');
        }

        // dd($request);

        $instituteTiming->update($request->all());

        return redirect()->route('institute_timings.detail',$instituteId);
    }

     /* Add Scheduled as per Institute Id*/ 
     public function add(string $instituteId){
        
        /*Scheduled */ 
        $scheduleds = InstituteTiming::where('institute_id', $instituteId)->with('shift_types')->get();

        // dd($scheduleds);

        /*Institute DEtails */ 
        $instituteDetail = Institute::findOrFail($instituteId);  
        $instituteName = ($instituteDetail->its_college == 1) ? 'College' : 'School';

        /* Shift Type */ 
        $shiftTypes = ShiftType::all();

        return view('intitute_timing.detail',compact('instituteId','scheduleds','instituteName','instituteDetail','shiftTypes'));
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
}
