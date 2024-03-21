@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> {{$instituteName}} Details </h2>
    <?php if (Auth::user()->role_id == 1) { ?>
        <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
            <?php if ($school->its_college == 1) { ?>
                <a href="{{ route('colleges') }}" class="btn btn-primary shadow-md me-2">{{$instituteName}} List</a>
            <?php } else { ?>
                <a href="{{ route('institutes.index') }}" class="btn btn-primary shadow-md me-2">{{$instituteName}} List</a>
            <?php } ?>
            <a href="{{ route('institute_user', $school->id) }}" class="btn btn-primary shadow-md me-2">Add {{$instituteName}} User</a>
        </div>
    <?php } ?>
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
                    $firstImage = $school->image_file;
                    $id = $school->id;
                    $imagePath = $firstImage ? asset("files/school/image_file/{$id}/{$firstImage}") : null;
                    @endphp

                    @if(!empty($imagePath))
                    <img src="{{ $imagePath }}" class="rounded-circle">
                    @endif
                </div>
                <div class="ms-4 me-auto">
                    <div class="fw-medium fs-base">{{ $school->name }}</div>
                    <div class="text-gray-600">Est Since.{{ $school->est_since }}</div>
                </div>
            </div>
            <div class="p-5 border-top border-gray-200 dark-border-dark-5">
                <a class="d-flex align-items-center text-theme-1 dark-text-theme-10 fw-medium" href=""> <i data-feather="box" class="w-4 h-4 me-2"></i> {{$instituteName}} Details </a>
                <a class="d-flex align-items-center mt-5" href="{{ route('institutes.edit',$school->id) }}"> <i data-feather="settings" class="w-4 h-4 me-2"></i> {{$instituteName}} Settings </a>
                <!-- <a class="d-flex align-items-center mt-5" href=""> <i data-feather="users" class="w-4 h-4 me-2"></i> {{$instituteName}} Users </a> -->
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-8 g-col-xxl-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                {{$instituteName}} Details
                </h2>
            </div>
            <div class="p-5">
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                <table class="table table-bordered table-report mt-n2">
                     <tbody>
                     <tr>
                        <th class="">{{$instituteName}} Name</th>
                        <td>{{ $school->name.' ('.$school->code.')' }}</td>
                    </tr>
                    <tr>
                        <th class="">Est Since</th>
                        <td>{{ $school->est_since }}</td>
                    </tr>
                    <tr>
                        <th class="">Principal Name</th>
                        <td>{{ $school->principal_name }}</td>
                    </tr>
                    <tr>
                        <th class="">Email | Contact</th>
                        <td>{{ $school->email }} | {{ $school->contact_no }}</td>
                    </tr>
                    <tr>
                        <th class="">Address.</th>
                        <td>{!! nl2br($school->address.'<br>'.$school->branch.', '.$school->city.','.$school->state.','.$school->pin_code) !!}</td>
                    </tr>
                    <tr>
                        <th class="">Medium | Type | Board</th>
                        <td>{{ $school->mediums->name }} | {{ $school->institute_types->name }} | {{ $school->boards->name }}</td>
                    </tr>
                    <tr>
                        <th class="">Morning Shift | Afternoons Shift</th>
                        <td>{{ $school->morning_shift_start.' to '.$school->morning_shift_end }} | {{ $school->afternoon_shift_start.' to '.$school->afternoon_shift_end }}</td>
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