@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <!-- <h2 class="fs-lg fw-medium me-auto"> {{$teacher->name}} </h2> -->
    <div class="w-12 h-12 image-fit">
    @php
    $firstImage = $teacher->profile_img;
    $id = $teacher->id;
    $imagePath = $firstImage ? asset("files/teachers/profile_img/".$id."/".$firstImage."") : asset('dist/images/admin-pic.jpg');

    @endphp

    @if(!empty($imagePath))
    <img src="{{ $imagePath }}" class="rounded-circle">
    @endif
    <!-- <h2 class="fs-lg fw-medium me-auto"> {{$teacher->name}} </h2> -->
    </div>
    <div class="ms-4 me-auto">
        <div class="fw-medium fs-base">{{ $teacher->name }}</div>
        <div class="text-gray-600">Qualification.{{ $teacher->qualification }}</div>
    </div>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a href="{{ route('teachers.index') }}" class="btn btn-primary shadow-md me-2">Teacher List</a>
    <a href="{{ route('teachers.show',$teacher->id) }}" class="btn btn-primary shadow-md me-2">Teacher Details</a>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="grid columns-12 gap-6">
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-12 g-col-xxl-12">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                {{ $teacher->name }} - Activation
                </h2>
            </div>
            <form method="POST" action="{{ route('teacher_activations.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <?php if(empty($teacherActivation)){ ?>
            <div class="grid columns-12 gap-4 gap-y-5">
                <div class="intro-y g-col-12 g-col-sm-4">
                    <input name="teacher_id" type="hidden" value="{{$teacherId}}"> 
                    <label for="username" class="form-label">Username</label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="intro-y g-col-12 g-col-sm-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="intro-y g-col-12 g-col-sm-3">
                    <label for="name" class="form-label">Status</label>
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="mt-2">
                            <div class="form-check form-switch">
                                <input id="checkbox-switch-7" class="form-check-input" type="checkbox" name="active" checked>
                                <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                        </div>

                    </div>
                </div>
                    
            </div>
            <?php }else{ ?>
                <div class="grid columns-12 gap-4 gap-y-5">
                <div class="intro-y g-col-12 g-col-sm-4">
                     <input name="id" type="hidden" value="{{$teacherActivation->id}}"> 
                    <label for="username" class="form-label">Username</label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" value="{{$teacherActivation->username}}" required>
                </div>
                <div class="intro-y g-col-12 g-col-sm-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="{{$teacherActivation->password}}" readonly="true" required> 
                </div>
                <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Status</label>
             <div class="d-flex justify-content-start align-items-center">
                <div class="mt-2">
                    <div class="form-check form-switch"> 
                        <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active" <?php echo ($teacherActivation->active == 1) ? 'checked' : ''; ?>> 
                    <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                </div>

            </div>
         </div>
                    
            </div> 
            <?php }?>
            <!-- Submit Form -->
            <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
                <button class="btn btn-primary w-24 ms-2" type="submit">Submit</button>
            </div>   
            </div>
            </form>
        </div>
        <!-- END: Display Information -->
    </div>
</div>
@endsection