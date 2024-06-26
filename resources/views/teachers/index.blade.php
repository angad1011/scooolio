@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Teacher List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('teachers.create') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        Teacher</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Profile Photo</th>
                    <th class="text-nowrap">EMP ID</th>
                    <th class="text-nowrap">Shift</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Contact</th>
                    <th class="text-nowrap">Email</th>
                    <th class="text-nowrap">Statuc</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                 <?php //dd($teachers); ?>
                 @foreach ($teachers as $teacher)   
                  <tr class="intro-x">
                   <td class="w-20">
                   <div class="d-flex">
                        <div class="w-10 h-10 image-fit zoom-in">
                             <?php
                                $firstImage = $teacher->profile_img;
                                $id = $teacher->id;
                                $imagePath = $firstImage ? asset("files/teachers/profile_img/".$id."/".$firstImage."") : null;
                                // echo $imagePath;
                            ?>
                            <img class="tooltip rounded-circle" src="{{$imagePath }}">
                        </div>
                    </div>
                    </td>  
                    <td>{{ $teacher->employee_id}}</td>
                    <td>{{ $teacher->shift_types->name}}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->contact }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>
                        @php 
                        $active = ($teacher->active == 1) ? 'checked' : '';
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
                            <a class="d-flex align-items-center me-3" href="{{ route('teachers.edit',$teacher->id) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit 
                            </a>
                            <a class="d-flex align-items-center me-3" href="{{ route('teachers.show',$teacher->id) }}"> <i data-feather="eye"
                                    class="w-4 h-4 me-1"></i> View </a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
             </tbody>
        </table>
     </div>
     <!-- Pagunation Start Here -->
     @include('partials.pagination', ['items' => $teachers])
</div>
@endsection

