@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">Timing Scheduled</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('institute_timings.detail',$instituteId) }}" class="btn btn-primary shadow-md me-2">Scheduled Detail</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{route('institute_timings.store')}}" enctype="multipart/form-data">
    @csrf
   <div class="px-5">
      <div class="grid columns-12 gap-4 gap-y-5">
         <div class="intro-y g-col-12 g-col-sm-3">
             <input id="institute_id" type="hidden" name="institute_id" class="form-control" value="{{$instituteId}}">
             <label for="name" class="form-label">Shift Type</label>
             <select class="form-select me-sm-2" placeholder="Select Class" name="shift_type_id">
                 <option value="">Select Shift</option>
                @foreach ($shiftTypes as $shiftType)
                <option value="{{ $shiftType['id'] }}">{{ $shiftType['name'] }}</option>
                @endforeach
            </select>     
        </div> 
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="shift_start" class="form-label">Timing Start</label>
            <input id="shift_start" name="shift_start" type="time" class="form-control" placeholder="Timing Start" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="shift_end" class="form-label">Timing End</label>
            <input id="shift_end" name="shift_end" type="time" class="form-control" placeholder="Timing End" required>
        </div>  
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="prayer_time" class="form-label">Assembly</label>
            <input id="prayer_time" name="prayer_time" type="text" class="form-control" placeholder="Assembly" required>
        </div>  
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="break_time_start" class="form-label">Breake Time</label>
            <input id="break_time_start" name="break_time_start" type="time" class="form-control" placeholder="Breake Time" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="break_durations" class="form-label">Breake Duration</label>
            <input id="break_durations" name="break_durations" type="text" class="form-control" placeholder="Breake duration" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="no_of_lect_fist_session" class="form-label">No. Of Lecture In First Session</label>
            <input id="no_of_lect_fist_session" name="no_of_lect_fist_session" type="number" class="form-control" placeholder="No. Of Lecture" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="no_of_lect_secound_session" class="form-label">No. Of Lecture In Secound Session</label>
            <input id="no_of_lect_secound_session" name="no_of_lect_secound_session" type="number" class="form-control" placeholder="No. Of Lecture" required>
        </div>
         <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
          <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
      </div>
      </div>
   </div>
   </form>
 </div>
@endsection



