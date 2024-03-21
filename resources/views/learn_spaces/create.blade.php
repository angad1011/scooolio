@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Add New Class
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('learn_spaces.index') }}" class="btn btn-primary shadow-md me-2">Class List</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{route('learn_spaces.store')}}" enctype="multipart/form-data">
    @csrf
   <div class="px-5">
      <div class="grid columns-12 gap-4 gap-y-5">
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="board" class="form-label">Standard</label>
            <select class="form-select me-sm-2" aria-label="Default select example" name="standard_id">
            
            <option>Select Standard</option>
            @foreach ($standards as $standard)
            <option value="{{ $standard->id }}">{{ $standard->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="board" class="form-label">Division</label>
            <select class="form-select me-sm-2" aria-label="Default select example" name="division_id">
            
            <option>Select Division</option>
            @foreach ($divisions as $division)
            <option value="{{ $division->id }}">{{ $division->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="board" class="form-label">Class Teacher</label>
            <select class="form-select me-sm-2" aria-label="Default select example" name="teacher_id">
            
            <option value="">Select Teacher</option>
            @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach

            </select>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="board" class="form-label">Shift Timing</label>
            <select class="form-select me-sm-2" aria-label="Default select example" name="shift_type_id">
            
            <option>Select Shift</option>
            @foreach ($shiftTypes as $shiftType)
            <option value="{{ $shiftType->id }}">{{ $shiftType->name }}</option>
            @endforeach

            </select>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="pincode" class="form-label">No Of Students</label>
        <input id="pincode" name="no_of_student" type="number" class="form-control" placeholder="No. Of Students">
        </div>
         </div>   
         <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
          <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
      </div>
      </div>
   </div>
   </form>
 </div>
@endsection



