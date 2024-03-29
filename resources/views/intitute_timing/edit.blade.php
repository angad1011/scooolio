@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">Timing Scheduled Update</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('institute_timings.detail',$instituteId) }}" class="btn btn-primary shadow-md me-2">Scheduled Detail</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{route('institute_timings.update',['institute_timing' => $instituteTiming->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <div class="px-5">
      <div class="grid columns-12 gap-4 gap-y-5">
         <div class="intro-y g-col-12 g-col-sm-3">
             <input id="institute_id" type="hidden" name="institute_id" class="form-control" value="{{$instituteId}}">
             <label for="name" class="form-label">Shift Type</label>
             <select class="form-select me-sm-2" placeholder="Select Class" name="shift_type_id">
                 <option value""">Select Shift</option>
                <?php foreach ($shiftTypes as $key => $shiftType) { 
                  $selected = ($shiftType->id == $instituteTiming->shift_type_id) ? 'selected' : '';
                ?>
                
                <option value="{{ $shiftType->id }}" <?php echo $selected;?>>{{ $shiftType->name }}</option>
                <?php } ?>
            </select>     
        </div> 
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="shift_start" class="form-label">Timing Start</label>
            <input id="shift_start" name="shift_start" type="time" class="form-control" placeholder="Timing Start" value="{{$instituteTiming->shift_start}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="shift_end" class="form-label">Timing End</label>
            <input id="shift_end" name="shift_end" type="time" class="form-control" placeholder="Timing End" value="{{$instituteTiming->shift_end}}" required>
        </div>  
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="prayer_time" class="form-label">Prayer Time</label>
            <input id="prayer_time" name="prayer_time" type="text" class="form-control" placeholder="Prayer Time" value="{{$instituteTiming->prayer_time}}" required>
        </div>  
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="break_time_start" class="form-label">Breake Time</label>
            <input id="break_time_start" name="break_time_start" type="time" class="form-control" placeholder="Breake Time" value="{{$instituteTiming->break_time_start}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="break_durations" class="form-label">Breake Duration</label>
            <input id="break_durations" name="break_durations" type="text" class="form-control" placeholder="Breake duration" value="{{$instituteTiming->break_durations}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="time_per_perioud" class="form-label">Period Duration</label>
            <input id="time_per_perioud" name="time_per_perioud" type="text" class="form-control" placeholder="Period Duration" value="{{$instituteTiming->time_per_perioud}}" required>
        </div>
         <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
          <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
      </div>
      </div>
   </div>
   </form>
 </div>
@endsection



