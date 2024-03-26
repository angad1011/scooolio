@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> Teacher Details </h2>
    
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
                    <div class="text-gray-600">Qualification.{{ $teacher->qualification }}</div>
                </div>
            </div>
            <div class="p-5 border-top border-gray-200 dark-border-dark-5">
                <a class="d-flex align-items-center text-theme-1 dark-text-theme-10 fw-medium" href=""> <i data-feather="box" class="w-4 h-4 me-2"></i> Teacher Details </a>
                <a class="d-flex align-items-center mt-5" href="{{ route('teachers.edit',$teacher->id) }}"> <i data-feather="settings" class="w-4 h-4 me-2"></i> Update Account </a>
                
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-8 g-col-xxl-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                Teacher Details
                </h2>
            </div>
            <div class="p-5">
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                <table class="table table-bordered table-report mt-n2">
                     <tbody>
                     <tr>
                        <th class="">Teacher Name</th>
                        <td>{{ $teacher->name.' ('.$teacher->qualification.')' }}</td>
                    </tr>
                    
                    <tr>
                        <th class="">Email | Contact </th>
                        <td>{{ $teacher->email.'|'.$teacher->contact }}</td>
                    </tr>
                    <tr>
                        <th class="">Address.</th>
                        <td>{!! nl2br($teacher->address) !!}</td>
                    </tr>
                    <tr>
                        <th class="">Subjects.</th>
                        <td>
                            @foreach ($subjects as $subject)
                            <label for="">{{ $subject->name }},</label>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="">Assigned Class.</th>
                        <td>
                            @foreach ($assignClasses as $assignClass)
                            <label for="">{{ $assignClass->class_name }},</label>
                            @endforeach
                        </td>
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