<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAttendace;
use App\Models\LearnSpace;
use App\Models\StudentClass;
use App\Models\AcademicYear;
use App\Models\AttendanceType;
use DB;


class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $classId, $date){

        // Current Date
        $currentDate = $date;
        $presentDay = Date('l');
        
        $instituteId = Auth::user()->institute_id;
        
        /*Academic Year*/ 
        $academicYear = AcademicYear::where('its_current_year', true)->first();

        // dd($academicYear);

        /*Attandace Type*/ 
        $attendanceTypes = AttendanceType::all();

        // dd($attendanceTypes);
        
        $students = StudentClass::with('students')
        ->where('institute_id', $instituteId)
        ->where('learn_space_id', $classId)
        ->get();

        // dd($students);

        /*Class Details*/ 
        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($classId);

        /*Student Attendance Details*/
        $attendance = StudentAttendace::with('students.class_students')->where(['institute_id'=>$instituteId,'learn_space_id'=>$classId,'date'=>$currentDate])->get();
        $attendanceCount = count($attendance);

        // dd($attendance);

        return view('student_attendances.index',compact('attendanceCount','attendance','instituteId','classId','academicYear','classDetail','students','attendanceTypes','currentDate','presentDay'));

    }

    /*Class Wise Student Attendance Details*/
    public function attendence_details(string $classId){
        
        $instituteId = Auth::user()->institute_id;

        /*Class Details*/ 
        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($classId);


        $attendanceData = StudentAttendace::selectRaw('date, 
                        SUM(CASE WHEN attendance_type_id = 1 THEN 1 ELSE 0 END) as present_count,
                        SUM(CASE WHEN attendance_type_id != 1 THEN 1 ELSE 0 END) as absent_count,
                        COUNT(*) as total_count')
                    ->where('learn_space_id', $classId)
                    ->groupBy('date')
                    ->get();

        $currentDate = Date('d-m-Y');             

        return view('student_attendances.attendence_details',compact('instituteId','classId','classDetail','attendanceData','currentDate'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        $requestData = $request['data']['StudentAttendace'];
       
        // dd($requestData);

         // Add Data As per Class
       foreach ($requestData as $key => $data) {
            $studentAttendance = new StudentAttendace();
            if(empty($data['id'])){
                $studentAttendance->institute_id = $data['institute_id'];
                $studentAttendance->learn_space_id = $data['learn_space_id'];
                $studentAttendance->academic_year_id = $data['academic_year_id'];
                $studentAttendance->student_id = $data['student_id'];
                $studentAttendance->attendance_type_id = $data['attendance_type_id'];
                $studentAttendance->date = $data['date'];
                $studentAttendance->absent_reason = $data['absent_reason'];

                // Save the record to the database
                $studentAttendance->save();
            }else{
                StudentAttendace::updateOrCreate(
                    ['id' => $data['id']], // Search condition
                    [
                        'institute_id' => $data['institute_id'],
                        'learn_space_id' => $data['learn_space_id'],
                        'academic_year_id' => $data['academic_year_id'],
                        'student_id' => $data['student_id'],
                        'attendance_type_id' => $data['attendance_type_id'],
                        'date' => $data['date'],
                        'absent_reason' => $data['absent_reason'],
                    ]
                );
            }
       }

       return redirect()->back()->with('success', 'Attendance Done!');


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
    public function editAttendance($classId, $date) {

        /*Class Details*/ 
        $classDetail = LearnSpace::with('shift_types','teachers')->findOrFail($classId);

        $presentDay = $currentDate =  $date;

        $attendance = StudentAttendace::with('students.class_students')->where(['learn_space_id'=>$classId,'date'=>$currentDate])->get();
        $attendanceCount = count($attendance);

        /*Attandace Type*/ 
        $attendanceTypes = AttendanceType::all();

        // dd($attendanceData);

        return view('student_attendances.edit', compact('attendanceCount','attendance','classId','classDetail','attendanceTypes','presentDay','currentDate'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAttendance(Request $request, $classId, $date) {
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
