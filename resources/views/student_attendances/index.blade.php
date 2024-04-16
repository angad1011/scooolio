@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    Attendance for Class {{$classDetail->class_name}} on {{$presentDay}} <?php echo date_format(date_create($currentDate),'jS F Y') ?>   
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('learn_spaces.index') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="list"></i> Class Details</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
         <form method="POST" action="{{route('student_attendances.store')}}" enctype="multipart/form-data"> 
         @csrf
        
         <?php if($attendanceCount == 0){ ?>
            @include('partials.add_student_attendance') 
        <?php }else{ ?>
            @include('partials.update_student_sttendance') 
        <?php } ?>  
        
        </form>
     </div>
</div>
<script type="text/javascript">
$('.attendanceType').change(function(){
    var attendanceTypeId = $(this).val();

    var tr = $(this).closest('tr');
    var reasonInput = tr.find('.reason');
    
    if(attendanceTypeId == '2'){
        reasonInput.prop('readonly', false);
    }else {
        // Otherwise, set the readonly attribute to true
        reasonInput.prop('readonly', true);
    }
});
</script>
@endsection

