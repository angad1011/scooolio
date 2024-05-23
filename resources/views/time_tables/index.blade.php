@extends('layouts.app')

@section('content')

<!-- BEGIN: HTML Table Data -->
 <!-- BEGIN: Top Bar -->
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto">
        Time Table
    </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('learn_spaces.index') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Scheduled Time Table</button>
    </a>
</div>
</div>
<div class="intro-y box mt-5">
<form id="filterForm">    
<div class="p-5">
<div class="d-flex flex-column-reverse flex-xl-row flex-column">
<div class="flex-1 mt-xl-0">
<div class="grid columns-12 gap-x-5 gap-y-0">
<div class="g-col-4 g-col-xxl-2">
<div>
<label>Select Class</label>
<div class="mt-2"> 
<select data-placeholder="Select your favorite actors" id="classDropdown"
    class="tom-select w-full">
    <option value="0" selected>Select Class</option>
    @foreach ($assignClasses as $assignClass)
    <option value="{{ $assignClass['id'] }}">{{ $assignClass['class_name'] }}</option>
    @endforeach

</select>
</div>
</div> <!-- END: Basic Select -->
</div>

<div class="g-col-4 g-col-xxl-3">
<div>
<label>Class Teacher</label>
<div class="mt-2"> 
<select data-placeholder="Select your favorite actors" id="teacherDropdown"
    class="tom-select w-full">
    <option value="0" selected>Class Teacher</option>
     @foreach ($teachers as $teacher)
    <option value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
    @endforeach
</select>
</div>
</div> <!-- END: Basic Select -->
</div>
<div class="g-col-4 g-col-xxl-2">
<div class="mt-lg-6">
 <a href="{{ route('time_tables.index') }}">    
<button id="tabulator-html-filter-go" type="button"
class="btn btn-primary w-full">Reset</button>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
<div class="FetchData"></div>
<script type="text/javascript">
     var selectedValues = [];

      $('#filterForm select').change(function() {
        
        /*Target Urls*/            
        var filterUrl = "{{ route('filter') }}";


        var classId = $('#classDropdown').val();
        var teacherId = $('#teacherDropdown').val();

        // Store the values in the array
        selectedValues = [classId, teacherId];
         $.ajax({
            url: filterUrl,
            type: 'GET', // or 'POST', depending on your requirement
            data: {
                class_id: classId,
                teacher_id: teacherId
            },
            success: function(response) {
                // Handle the response from the server
                // console.log(response);
                // toastr.success('Data loaded successfully!');
                $('.FetchData').html(response.html);
            },
            error: function(xhr) {
                // Handle any errors that occurred during the request
                console.error(xhr);
                toastr.error('An error occurred while loading data.');
            }
        });



     });
</script>
@endsection