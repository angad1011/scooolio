@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Class List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('learn_spaces.create') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        Class</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Class</th>
                    <th class="text-nowrap">Class Teacher</th>
                    <th class="text-nowrap">Class Shift</th>
                    <th class="text-nowrap">No Of Students</th>
                    <th class="text-nowrap">Time Table</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                 @foreach ($learnSpaces as $learnSpace)   
                  <tr class="intro-x">
                    <td>{{ $learnSpace->class_name }}</td>
                    <td>{{ $learnSpace->teachers->name }}</td>
                    <td>{{$learnSpace->shift_types->name}}</td>
                    <td>{{$learnSpace->no_of_student}}</td>
                    <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('time_tables.add',$learnSpace->id) }}"> <i data-feather="clock" class="w-4 h-4 me-1"></i> Time Table 
                            </a>
                        </div>
                    </td>
                     <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('learn_spaces.edit',$learnSpace->id) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit 
                            </a>
                            <a class="d-flex align-items-center me-3" href="{{ route('learn_spaces.show',$learnSpace->id) }}"> <i data-feather="eye"
                                    class="w-4 h-4 me-1"></i> View 
                            </a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
             </tbody>
        </table>
     </div>
</div>
@endsection

