@extends('layouts.app')

@section('content')

<!-- BEGIN: HTML Table Data -->
<div class="grid columns-12 gap-6">
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-12 g-col-xxl-12">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto"> Time Table For Class : {{$classDetail->class_name}}</h2>
            </div>  
            <div class="p-5">
            <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                <table class="table table-bordered table-report mt-n2">
                   <thead>
                      <tr>
                         <th>WeekDays</th>
                         <th></th>    
                      </tr> 
                     
                   </thead>
                   <tbody>
                       <?php foreach ($weekDays as $key => $weekDay) {?>
                       <tr>
                         <td>{{$weekDay->day}}</td>   
                       </tr>
                       <?php } ?>
                   </tbody>
                </table>
            </div>
            </div>     
        </div>
        <!-- END: Display Information -->
      

    </div>
</div>
@endsection