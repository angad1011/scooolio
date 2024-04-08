@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    Student List Of Class ({{$classDetail->class_name}}) For The Year {{$academicYear->year}} 
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('class_students.add',$classId) }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        Students</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Student Name</th>
                    <th class="text-nowrap">Role NO.</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $key => $student) { ?>
                <tr>
                    <td>{{$student->students->name}}</td>
                    <td>{{$student->role_no}}</td>
                    <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('class_students.show',$student->id) }}"> 
                                <i data-feather="eye" class="w-4 h-4 me-1"></i> View 
                            </a>
                            <a class="d-flex align-items-center me-3" href="{{ route('class_students.edit',$student->id) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit 
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
     </div>
</div>
@endsection

