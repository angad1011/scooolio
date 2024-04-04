@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> Student Details </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('students.index') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="list"></i> Student List</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="grid columns-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="g-col-12 g-col-lg-4 g-col-xxl-3 d-flex d-lg-block flex-column-reverse">
        <div class="intro-y box mt-5">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="position-relative d-flex align-items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <!-- <img alt=" " class="rounded-circle" src="dist/images/admin-pic.jpg"> -->
                    @php
                    $firstImage = $student->profile_img;
                    $id = $student->id;
                    $imagePath = $firstImage ? asset("files/students/profile_img/".$id."/".$firstImage."") : asset('dist/images/admin-pic.jpg');

                    @endphp

                    @if(!empty($imagePath))
                    <img src="{{ $imagePath }}" class="rounded-circle">
                    @endif
                </div>
                <div class="ms-4 me-auto">
                    <div class="fw-medium fs-base">{{ $student->name }}</div>
                    <div class="text-gray-600">GR NO. {{ $student->gr_no }}</div>
                </div>
            </div>
            <div class="p-5 border-top border-gray-200 dark-border-dark-5">
                <a class="d-flex align-items-center text-theme-1 dark-text-theme-10 fw-medium" href=""> <i data-feather="box" class="w-4 h-4 me-2"></i> Student Details </a>
                <!-- <a class="d-flex align-items-center mt-5" href="{{ route('students.edit',$student->id) }}"> <i data-feather="settings" class="w-4 h-4 me-2"></i> Update Account </a> -->
                
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-8 g-col-xxl-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                Student Details
                </h2>
            </div>
            <div class="p-5">
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                <table class="table table-bordered table-report mt-n2">
                     <tbody>
                     <tr>
                        <th class="">Student Name</th>
                        <td>{{ $student->name.' ('.$student->gr_no.')' }}</td>
                    </tr>
                    
                    <tr>
                        <th class="">Email | Contact </th>
                        <td>{{ $student->email.' | '.$student->contact_no }}</td>
                    </tr>
                    <tr>
                        <th class="">DOB | Blood Group </th>
                        <td>{{ $student->date_of_birth.' | '.$student->blood_group }}</td>
                    </tr>
                    <tr>
                        <th class="">Father Name.</th>
                        <td>{{ $student->father_name }}</td>
                    </tr>
                    <tr>
                        <th class="">Father Qualification.</th>
                        <td>{{ $student->father_qualification }}</td>
                    </tr>
                    <tr>
                        <th class="">Mother Name.</th>
                        <td>{{ $student->mother_name }}</td>
                    </tr>
                    <tr>
                        <th class="">Mother Qualification.</th>
                        <td>{{ $student->mother_qualification }}</td>
                    </tr>
                    <tr>
                        <th class="">Date Of Admission.</th>
                        <td>{{ $student->date_of_admission }}</td>
                    </tr>   
                    <tr>
                        <th class="">Date Of Living.</th>
                        <td>{{ $student->date_of_leaving }}</td>
                    </tr>  
                    <tr>
                        <th class="">Address.</th>
                        <td>{!! nl2br($student->address) !!}</td>
                    </tr>               
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
    </div>
</div>
@endsection