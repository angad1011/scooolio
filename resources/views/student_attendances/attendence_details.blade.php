@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    Attendance for Class {{$classDetail->class_name}}   
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a class="d-flex align-items-center me-3" href="{{ route('learn_spaces.index') }}"> 
        <button class="btn btn-primary shadow-md me-2"> <i data-feather="list"></i>  Class Details </button>
    </a>
    <a class="d-flex align-items-center me-3" href="{{ route('student_attendances.index',$classDetail->id) }}"> 
        <button class="btn btn-primary shadow-md me-2"> <i data-feather="plus"></i>  Get Today Attendance </button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Date</th>
                    <th class="text-nowrap">No Of Students</th>
                    <th class="text-nowrap">Attendance</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($attendanceData as $key => $attendance) { 
                    $presentCount = $attendance->present_count;
                    $absentCount = $attendance->absent_count;
                    $totalCount = $attendance->total_count;   

                    $attendancePercentage = number_format(($presentCount / $totalCount) * 100, 2);
                ?>
               <tr>
                   <td>{{$attendance->date}}</td>
                   <td>{{$totalCount}}</td>
                   <td>{{$attendancePercentage.' %'}} <br> Absent : {{$absentCount}}, Present : {{$presentCount}}</td>
                   <td></td>
               </tr>     
               <?php } ?>
            </tbody>
        </table>
     </div>
</div>

@endsection

