<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Students;
use App\Models\LearnSpace;
use App\Models\Institute;

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
        $learnSpaces = LearnSpace::where('institute_id', $instituteId)->with('divisions','standards')->get();
        $assignClasses = [];
        if(!empty($learnSpaces)){
            foreach ($learnSpaces as $learnSpace) {
                $standard = $learnSpace->standards->name; // Assuming 'name' is the field for standard's name
                $division = $learnSpace->divisions->name; // Assuming 'name' is the field for division's name

               $calssName = "$standard - $division";  

                $assignClasses[] = ['id' => $learnSpace->id,'name'=>$calssName];
            }
            
        }

        return view('students.create',compact('learnSpaces','instituteId','assignClasses'));

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
