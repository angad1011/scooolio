<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Students;
use App\Models\StudentAttendace;
use App\Models\AcademicYear;



class DashboardsController extends BaseController
{
    public function index(){
       
        $currentDate = date('d-m-Y');
        $instituteId = Auth::user()->institute_id;
        $roleId = Auth::user()->role_id;


        /*Defaul Year*/
        $academicYear = ($roleId == 2) ? AcademicYear::where(['its_current_year'=>true,'institute_id'=>$instituteId])->first() : AcademicYear::where(['its_current_year'=>true])->first() ;
        $academicYearId = (isset($academicYear->id)) ? $academicYear->id : '';



        $parentMenu = '';
        $pageTitle = 'Dashboard';

        /*Teacher Count*/
        $teachers = Teacher::all()->where('institute_id', $instituteId);

        /*Student Count*/
        $Students =  Students::all()->where('institute_id', $instituteId);

        /*Student Attendace Percentage*/
        $studentAttendances = StudentAttendace::where(['academic_year_id'=>$academicYearId,'institute_id'=>$instituteId,'date'=>$currentDate])->get();


         $presentDays = $apsentDay =  $precentPercentage = $absentPercentage = 0;;
       if(!empty($studentAttendances)){
            $totalDays = count($studentAttendances);
           
            foreach ($studentAttendances as $key => $attendance) {
                
                if ($attendance->attendance_type_id == 1) {
                    $presentDays++;
                }

                if ($attendance->attendance_type_id == 2) {
                    $apsentDay++;
                }

            }

            if($totalDays > 0){
                $precentPercentage = ($presentDays / $totalDays) * 100;
                $precentPercentage = number_format($precentPercentage,2);
                $absentPercentage = ($apsentDay / $totalDays) * 100;    
                $absentPercentage = number_format($absentPercentage,2);
            }
        }


        return view('dashboards.index',compact('parentMenu','pageTitle','teachers','Students','precentPercentage','absentPercentage','roleId'));
    }
}
