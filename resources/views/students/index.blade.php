@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Student List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('students.create') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        Student</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Profile Pic</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Contact</th>
                    <th class="text-nowrap">Email</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                 <?php //dd($teachers); ?>
                 @foreach ($students as $student)   
                  <tr class="intro-x">
                   <td class="w-20">
                   <div class="d-flex">
                        <div class="w-10 h-10 image-fit zoom-in">
                             <?php
                                $firstImage = $student->profile_img;
                                $id = $student->id;
                                $imagePath = $firstImage ? asset("files/students/profile_img/".$id."/".$firstImage."") : null;
                                // echo $imagePath;
                            ?>
                            <img class="tooltip rounded-circle" src="{{$imagePath }}">
                        </div>
                    </div>
                    </td>  
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @php 
                        $active = ($student->active == 1) ? 'checked' : '';
                        @endphp
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="mt-2">
                                <div class="form-check form-switch"> 
                                    <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active" {{$active}}> 
                                <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                            </div>
                        </div>
                    </td>
                     <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('students.edit',$student->id) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit 
                            </a>
                            <a class="d-flex align-items-center me-3" href="{{ route('students.show',$student->id) }}"> <i data-feather="eye"
                                    class="w-4 h-4 me-1"></i> View </a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
             </tbody>
        </table>
     </div>
</div>
@endsection

