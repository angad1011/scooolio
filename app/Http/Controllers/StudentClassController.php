<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\StudentClass;
use App\Models\LearnSpace;
use App\Models\Students;
use App\Models\AcademicYear;



class StudentClassController extends BaseController
{
     /**
     * Display a listing of the resource.
     */
    public function index(string $classId){
        
        $instituteId = Auth::user()->institute_id;
        


        // dd($classId);

        /*Academic Year*/ 
        $academicYear = AcademicYear::where(['its_current_year'=>true,'institute_id'=>$instituteId])->first();
        $academicYearId = $academicYear->id;

        // dd($academicYear);

        $students = StudentClass::where(['institute_id'=>$instituteId,'learn_space_id'=>$classId,'academic_year_id'=>$academicYearId])->get();

        // dd($students);

        /*Class Details*/ 
        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($classId);

        // dd($students);


        return view('class_students.index',compact('students','classId','classDetail','academicYear'));

    }

    /* Add Studnet In the Class As Per Academic Year*/
    public function add(string $classId){
        $instituteId = Auth::user()->institute_id;
       
        /*Academic Year*/ 
        $academicYear = AcademicYear::where(['its_current_year'=>true,'institute_id'=>$instituteId])->first();
        $academicYearId = $academicYear->id;

        /*Class Details*/ 
        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($classId);
        $noOfStudent = $classDetail->no_of_student;

        
        /*Student List*/
        $students = Students::where('institute_id',$instituteId)->get();

        $studentDetails = StudentClass::where(['institute_id'=>$instituteId,'learn_space_id'=>$classId])->get();

        $studentDetailCount = count($studentDetails);




         return view('class_students.add',compact('instituteId','classId','classDetail','academicYear','students','noOfStudent','studentDetailCount','studentDetails'));
    }


 /*Add Stududent In Class*/
 public function store(Request $request){
    
  

    $requestData = $request['data']['StudentClass'];

    // dd($requestData);

       // Add Data As per Class
       foreach ($requestData as $key => $data) {
    
            $studentClass = new StudentClass();
            if(empty($data['id'])){
                $studentClass->institute_id = $data['institute_id'];
                $studentClass->learn_space_id = $data['learn_space_id'];
                $studentClass->academic_year_id = $data['academic_year_id'];
                $studentClass->student_id = $data['student_id'];
                $studentClass->role_no = $data['role_no'];

                // Save the record to the database
                $studentClass->save();
            }else{
                StudentClass::updateOrCreate(
                    ['id' => $data['id']], // Search condition
                    [
                        'institute_id' => $data['institute_id'],
                        'learn_space_id' => $data['learn_space_id'],
                        'academic_year_id' => $data['academic_year_id'],
                        'student_id' => $data['student_id'],
                        'role_no' => $data['role_no'],
                    ]
                );
            }

    }

    return redirect()->back()->with('success', 'Time Table Sceduled !');

 } 

    

}
