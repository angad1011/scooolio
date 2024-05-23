@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">Attendance  </h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('students.index') }}"> 
        <button class="btn btn-primary shadow-md me-2"> <i data-feather="list"></i> Student List </button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box mt-5">
<form id="filterForm">    
<div class="p-5">
<div class="d-flex flex-column-reverse flex-xl-row flex-column">
<div class="flex-1 mt-xl-0">
<div class="grid columns-12 gap-x-5 gap-y-0">
<div class="g-col-4 g-col-xxl-3">
<div>
<label>Students</label>
<div class="mt-2"> 
<select data-placeholder="Select your favorite actors" id="studentDropdown"
    class="tom-select w-full">
    <option value="0" selected>Select Student</option>
     @foreach ($students as $student)
    <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
    @endforeach
</select>
</div>
</div> <!-- END: Basic Select -->
</div>
<div class="g-col-4 g-col-xxl-2">
<div class="mt-lg-6">
 <a href="{{ route('time_tables.index') }}">    
<button id="tabulator-html-filter-go" type="button"
class="btn btn-primary w-full" style="margin-top: 5px;">Reset</button>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>

<!-- Ajax Value -->
 <!-- BEGIN: Calendar Content -->
<div class="g-col-12 g-col-xl-12 g-col-xxl-12 mt-5">
    <div class="box p-5">
        <div class="full-calendar" id="calendar"></div>
    </div>
</div>
<!-- END: Calendar Content -->

<script type="text/javascript">
    $(document).ready(function() {
         var date = new Date();
     var month = date.getMonth()+1;
     var day = date.getDate();
     var todayDate = date.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' +((''+day).length<2 ? '0' : '') + day;
     var initialLocaleCode = 'en';



      // loadCalendarView();

     $('#filterForm select').change(function() {

        var studentId = $('#studentDropdown').val();

         /*Target Urls*/            
        var filterUrl = "{{ route('student_calender') }}";

         $.ajax({
            url: filterUrl,
            type: 'GET', // or 'POST', depending on your requirement
            data: {studentId: studentId},
            success: function(response) {

                // $('#calendar-container').html(response.html);
           
            },
            error: function(xhr) {
                // Handle any errors that occurred during the request
                console.error(xhr);
                toastr.error('An error occurred while loading data.');
            }
        });

     });
    });
    
     $('#calendar1').fullCalendar({
        header: {
          left: 'prev,next',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listMonth'
        },
        defaultDate: todayDate,
        locale: initialLocaleCode,
        buttonIcons: false,
        weekNumbers: true,
        navLinks: true,
        editable: true,
        eventLimit: true
      });
 
     
</script>
@endsection

