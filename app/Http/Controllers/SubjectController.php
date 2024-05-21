<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $instituteId = Auth::user()->institute_id;
        $subjects = Subject::all()->where('institute_id',$instituteId);

        return view('subjects.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $instituteId = Auth::user()->institute_id;

        // dd($instituteId);

        $request->validate([
            'name'=>['required'],
        ]);

        /*Active*/
        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

        $subject = Subject::create([
            'institute_id' => $instituteId,
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully.');

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
        $subject = Subject::findOrFail($id);

         return view('subjects.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->route('subjects.index')->with('error', 'Subject not found.');
        }

        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';
        $subject->update([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function subject_listing(){
        
        $instituteId = Auth::user()->institute_id;

        $subjects = Subject::all()->where('institute_id',$instituteId);
        // $subjects = Subject::all();

        return response()->json([
            'status' => true,
            'subjects' => $subjects
        ]);


    }
}
