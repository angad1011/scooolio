@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> {{$instituteName}} Scheduled </h2>
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
                    $firstImage = $instituteDetail->image_file;
                    $id = $instituteDetail->id;
                    $imagePath = $firstImage ? asset("files/school/image_file/{$id}/{$firstImage}") : null;
                    @endphp

                    @if(!empty($imagePath))
                    <img src="{{ $imagePath }}" class="rounded-circle">
                    @endif
                </div>
                <div class="ms-4 me-auto">
                    <div class="fw-medium fs-base">{{ $instituteDetail->name }}</div>
                    <div class="text-gray-600">Est Since.{{ $instituteDetail->est_since }}</div>
                </div>
            </div>
            <div class="p-5 border-top border-gray-200 dark-border-dark-5">
                <a class="d-flex align-items-center mt-5" href="{{ route('institutes.show',$instituteDetail->id) }}"> <i data-feather="box" class="w-4 h-4 me-2"></i> {{$instituteName}} Details </a>
                <a class="d-flex align-items-center mt-5" href="{{ route('institutes.edit',$instituteDetail->id) }}"> <i data-feather="settings" class="w-4 h-4 me-2"></i> {{$instituteName}} Settings </a>
                <a class="d-flex align-items-center text-theme-1 dark-text-theme-10 fw-medium mt-5" href=""> <i data-feather="clock" class="w-4 h-4 me-2"></i> {{$instituteName}} Scheduled </a>
                <!-- <a class="d-flex align-items-center mt-5" href=""> <i data-feather="users" class="w-4 h-4 me-2"></i> {{$instituteName}} Users </a> -->
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-8 g-col-xxl-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto"> Time Scheduled </h2>
                <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
                    <a href="{{ route('institute_timings.create') }}" class="btn btn-primary shadow-md me-2">{{$instituteName}} Scheduled</a> 
                </div>
            </div>  
            @foreach ($scheduleds as $scheduled)   
                <div class="p-5">
                <strong>{{$scheduled->shift_types->name}}</strong>  
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                    
                    <table class="table table-bordered table-report mt-n2">
                    <tbody>
                        <tr>
                            <td class="">Start Time</td>
                            <td>{{ $scheduled->shift_start}}</td>
                            <td class="">End Time</td>
                            <td>{{ $scheduled->shift_end}}</td>
                        </tr>
                        <tr>
                            <td class="">Break Time Start</td>
                            <td>{{ $scheduled->break_time_start}}</td>
                            <td class="">Break Duration</td>
                            <td>{{ $scheduled->break_durations}} Minuts</td>
                        </tr>
                        <tr>
                            <td class="">Prayer Time</td>
                            <td>{{ $scheduled->prayer_time}} Minuts</td>
                            <td class="">Priods Duration</td>
                            <td>{{ $scheduled->time_per_perioud}} Minuts</td>
                        </tr>
                    </tbody>
                    </table>
                  </div>
                </div>
                @endforeach      
        </div>
        <!-- END: Display Information -->
      

    </div>
</div>
@endsection