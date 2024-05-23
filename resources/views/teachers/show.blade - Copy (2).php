@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> Teacher Details </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
        <a href="{{ route('teachers.index') }}" class="btn btn-primary shadow-md me-2">Teacher List</a>
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
                    $firstImage = $teacher->profile_img;
                    $id = $teacher->id;
                    $imagePath = $firstImage ? asset("files/teachers/profile_img/".$id."/".$firstImage."") : asset('dist/images/admin-pic.jpg');

                    @endphp

                    @if(!empty($imagePath))
                    <img src="{{ $imagePath }}" class="rounded-circle">
                    @endif
                </div>
                <div class="ms-4 me-auto">
                    <div class="fw-medium fs-base">{{ $teacher->name }}</div>
                    <div class="text-gray-600">{{ $teacher->employee_id }}</div>
                </div>
            </div>
            <div class="p-5 border-top border-gray-200 dark-border-dark-5">
                <a class="d-flex align-items-center text-theme-1 dark-text-theme-10 fw-medium" href=""> <i data-feather="box" class="w-4 h-4 me-2"></i> Teacher Details </a>
                <a class="d-flex align-items-center mt-5" href="{{ route('teachers.edit',$teacher->id) }}"> <i data-feather="settings" class="w-4 h-4 me-2"></i> Update Account </a>
                <a class="d-flex align-items-center mt-5" href="{{ route('teachers.time_table',$teacher->id) }}"> <i data-feather="clock" class="w-4 h-4 me-2"></i> Time Table </a>
                <a class="d-flex align-items-center mt-5" href="{{ route('teachers.activation',$teacher->id) }}"> <i data-feather="lock" class="w-4 h-4 me-2"></i> Activation </a>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-8 g-col-xxl-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                Joining Details
                </h2>
            </div>
            <div class="p-5">
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                <table class="table table-bordered table-report mt-n2">
                     <tbody>
                     <tr>
                        <th class="">Joining Date.</th>
                        <td>{{ $teacher->joining_date }}</td>
                    </tr>
                    <tr>
                        <th class="">Shift</th>
                        <td>{{ $teacher->shift_types->name }}</td>
                    </tr>
                     <tr>
                        <th class="">Teacher Name</th>
                        <td>{{ $teacher->name.' ('.$teacher->employee_id.')' }}</td>
                     </tr>
                    
                    <tr>
                        <th class="">Email | Contact </th>
                        <td>{{ $teacher->email.' | '.$teacher->contact }}</td>
                    </tr>
                    <tr>
                        <th class="">Alternate No. | Whatsapp </th>
                        <td>{{ $teacher->alternate_no.' | '.$teacher->whatsaap }}</td>
                    </tr>
                    <tr>
                        <th class="">Date of Birth | Gender | Martial Status </th>
                        <td>{{ $teacher->date_of_birth.' | '.$teacher->gender.' | '.$teacher->martial_status }}</td>
                    </tr>
                    <tr>
                        <th class="">Nationality | Religion | Category </th>
                        <td>{{ $teacher->nationality.' | '.$teacher->religion.' | '.$teacher->cast_catogory }}</td>
                    </tr>
                    <tr>
                        <th class="">Qualification | Specialization </th>
                        <td>{{ $teacher->qualification.' | '.$teacher->specialization }}</td>
                    </tr>
                    <tr>
                        <th class="">Institute | Passing Year </th>
                        <td>{{ $teacher->institute.' | '.$teacher->passing_year }}</td>
                    </tr>
                    <tr>
                        <th class="">Subjects.</th>
                        <td>
                            @foreach ($subjects as $subject)
                            <label for="">{{ $subject->name }},</label>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- END: Joinning Information -->
        <!-- Start: Address Details -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
               Residential Address
                </h2>
            </div>
            <div class="p-5">
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                <table class="table table-bordered table-report mt-n2">
                     <tbody>
                     <tr>
                        <th class="">Pincode.</th>
                        <td>{{ $teacher->pincode }}</td>
                    </tr>
                    <tr>
                        <th class="">City</th>
                        <td>{{ $teacher->city }}</td>
                    </tr>
                     <tr>
                        <th class="">State</th>
                        <td>{{ $teacher->state }}</td>
                     </tr>
                    
                    <tr>
                        <th class="">Address </th>
                        <td>{{ $teacher->address}}</td>
                    </tr>
                   
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection