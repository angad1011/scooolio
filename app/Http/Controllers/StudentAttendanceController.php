<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\StudentAttendace;
use App\Models\LearnSpace;
use App\Models\StudentClass;
use App\Models\Students;
use App\Models\AcademicYear;
use App\Models\AttendanceType;
use DB;


class StudentAttendanceController extends BaseController
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

    /*Attendance Calender*/
    public function attendance_calender(){
        
        $instituteId = Auth::user()->institute_id;

        $students = Students::where('institute_id', $instituteId)
                    ->select('id', 'name')
                    ->get();

    

         return view('student_attendances.attendance_calender',compact('students'));
    }

    /*Student Calender*/
    public function student_calender(Request $request){
        $instituteId = Auth::user()->institute_id;


        // Get the selected class and teacher IDs from the request
        $studentId = $request->input('studentId');
        
        if ($studentId != 0) {
            $request->session()->put('student', $studentId);
        } else {
            $request->session()->forget('student');
        }


        // $attendanceDetails = (!empty($studentId)) ? StudentAttendace::findOrFail($studentId) : null;
        $attendanceDetails = StudentAttendace::where('student_id',$studentId)->get();

        // dd($attendanceDetails);

        $attendanceArr = [];
        if (!empty($attendanceDetails)) {
            foreach ($attendanceDetails as $attendanceDetail) {


                $attendanceArrDetails = [];
                $attendanceArrDetails['title'] = ($attendanceDetail->attendance_type_id == 1) ? 'Present' : 'Absent';
                $attendanceArrDetails['className'] = $attendanceArrDetails['title'];

                 // Parse the existing date string and format it as needed using strtotime()
                $timestamp = strtotime($attendanceDetail->date);
                $formattedDate = date('Y-m-d', $timestamp); // Change 'Y-m-d' to your desired format

                $attendanceArrDetails['start'] = $formattedDate;
                $attendanceArrDetails['end'] = $formattedDate;

                $attendanceArr[] = $attendanceArrDetails;
            }
        }

        // print_r($attendanceArr);exit;

        // $attendanceArr1 =[['title'=>'Vue Vixens Day','start'=>'2024-04-16','end'=>'2024-04-16'],['title'=>'VueConfUS','start'=>'2024-04-17','end'=>'2024-04-17']];

        // print_r($attendanceArr1);exit;

       $finalEncodedCalender = json_encode($attendanceArr); 

      

       $request->session()->put('calendar', $finalEncodedCalender);

      
       

       $html = View::make('partials.student_calender', ['finalEncodedCalender' => $finalEncodedCalender])->render();

       // Return the rendered HTML as a JSON response
        return response()->json(['html' => $html]);

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

    /*Attendace Store From API*/
    public function attendance_store(Request $request){

        // dd();

        // $confirmations = [];

        foreach ($request['attendances'] as $attendanceData) {
            if ($attendanceData['attendance_type_id'] == 1) {
                StudentAttendace::create($attendanceData);
            } elseif ($attendanceData['attendance_type_id'] == 2) {
                $confirmations[] = $attendanceData;
            }
        }

         // Store confirmations in session
        if (!empty($confirmations)) {
            
            $request->session()->put('confirmationData', $confirmations);

            return response()->json(['confirmations' => $confirmations], 202);
        }

        return response()->json(['message' => 'Attendances stored successfully'], 201);

    }

    public function pendingConfirmations(Request $request){

        $pendingConfirmations = $request->session()->get('confirmationData', []);
        Log::info('Retrieved pending confirmations from session: ', $pendingConfirmations);
        return response()->json($pendingConfirmations);
    
    }

    public function confirm(Request $request)
    {
        
         $pendingConfirmations = $request->session()->get('confirmationData', []);

         // dd($request);
        // dd($request['confirmations']);


        foreach ($request['confirmations'] as $confirmationData) {
            // Find the matching pending confirmation
            foreach ($pendingConfirmations as $key => $pendingConfirmation) {
                if ($pendingConfirmation['institute_id'] == $confirmationData['institute_id'] && $pendingConfirmation['learn_space_id'] == $confirmationData['learn_space_id'] && $pendingConfirmation['academic_year_id'] == $confirmationData['academic_year_id'] && $pendingConfirmation['student_id'] == $confirmationData['student_id'] &&
                    $pendingConfirmation['date'] == $confirmationData['date'] &&
                    $pendingConfirmation['attendance_type_id'] == $confirmationData['attendance_type_id']) {
                    // Save the record
                    StudentAttendace::create($pendingConfirmation);
                    // Remove from pending confirmations
                    unset($pendingConfirmations[$key]);
                    break;
                }
            }
        }

        // Update the session
        Session::put('pending_confirmations', array_values($pendingConfirmations));

        return response()->json(['message' => 'Attendances confirmed successfully'], 201);
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
