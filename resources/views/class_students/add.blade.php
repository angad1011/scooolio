@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    Student List Of Class ({{$classDetail->class_name}}) For The Year {{$academicYear->year}} 
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('class_students.index',$classId) }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="list"></i>
        Students List</button>
    </a>
    <a class="d-flex align-items-center me-3" href="{{ route('learn_spaces.show',$classId) }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="list"></i>Class Details</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
<form method="POST" action="{{route('class_students.store')}}" enctype="multipart/form-data">
@csrf
<?php if($studentDetailCount == 0){ ?>
@include('partials.add_class_student') 
<?php }else{ ?>
@include('partials.update_class_student') 
<?php } ?>       
<div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
<button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
</div>
</form>    
</div>
<script type="text/javascript">
</script>
@endsection

