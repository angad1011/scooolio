<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AcademicYear;


class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
    //$academicYears = AcademicYear::all();   
    $academicYears = AcademicYear::orderByDesc('its_current_year')->orderBy('year')->get();

    return view('academic_years.index',compact('academicYears'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
         /* Institude Id */
         $instituteId = Auth::user()->institute_id;  


        
        return view('academic_years.create',compact('instituteId'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        // dd($request);
      

        /*For Setup Current Year*/
        $itsCurrentYear = $request->has('its_current_year') ? 1 : 0; 

        // Check if $itsCurrentYear is set to 1
        if ($itsCurrentYear == 1) {
            // Update existing records where its_current_year is 1 to 0
            AcademicYear::where('its_current_year', 1)->update(['its_current_year' => 0]);
        }

        $academicYear = AcademicYear::create([
            'institute_id' => $request->input('institute_id'),
            'year' => $request->input('year'),
            'its_current_year' => $itsCurrentYear,
        ]);

        return redirect()->route('academic_years.index');

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
        $academicYear = AcademicYear::findOrFail($id);

        return view('academic_years.edit',compact('academicYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $academicYear = AcademicYear::find($id);
        if (!$academicYear) {
            return redirect()->route('academic_years.index')->with('error', 'Year Not found.');
        }

       /*For Setup Current Year*/
       $itsCurrentYear = $request->has('its_current_year') ? 1 : 0; 

       if ($itsCurrentYear == 1) {
            // Update existing records where its_current_year is 1 to 0
            AcademicYear::where('its_current_year', 1)->update(['its_current_year' => 0]);
        }

        $academicYear->update([
            'year' => $request->input('year'),
            'its_current_year' => $itsCurrentYear,
        ]); 


       return redirect()->route('academic_years.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
