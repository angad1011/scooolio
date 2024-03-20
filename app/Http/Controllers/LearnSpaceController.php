<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LearnSpace;
use App\Models\Standard;
use App\Models\Division;
use App\Models\ShiftType;

class LearnSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $standards = Standard::all()->where('active',true);
        $divisions = Division::all()->where('active',true);

        return view('learn_spaces.create',compact('shiftTypes','standards','divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'standard_id'=>['required'],
            'division_id'=>['required'],
            // 'teacher_id'=>['required'],
            'shift_type_id'=>['required'],
            'no_of_student'=>['required'],
        ]);

        /* Institude Id */
        $instituteId = Auth::user()->institute_id;  

        $learnSpace = LearnSpace::create([
            'institute_id' => $instituteId,
            'standard_id' => $request->input('standard_id'),
            'division_id' => $request->input('division_id'),
            'teacher_id' => $request->input('teacher_id'),
            'shift_type_id' => $request->input('shift_type_id'),
            'no_of_student' => $request->input('no_of_student'),
        ]);

        return redirect()->route('learn_spaces.index');

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
        $learnSpace = LearnSpace::findOrFail($id);
        
        $shiftTypes = ShiftType::all();
        $standards = Standard::all()->where('active',true);
        $divisions = Division::all()->where('active',true);

        return view('learn_spaces.edit',compact('shiftTypes','standards','divisions','learnSpace'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $learnSpace = LearnSpace::find($id);
        if (!$learnSpace) {
            return redirect()->route('LearnSpace.index')->with('error', 'User not found.');
       }

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
