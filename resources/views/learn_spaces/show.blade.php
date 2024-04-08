@extends('layouts.app')

@section('content')

<!-- BEGIN: HTML Table Data -->
<div class="grid columns-12 gap-6">
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-12 g-col-xxl-12">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto"> Class : {{$classDetail->class_name}} ({{$classDetail->teachers->name}}) </h2>
                <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
                    <a href="{{ route('time_tables.add',$classDetail->id) }}" class="btn btn-primary shadow-md me-2">Setup Time Table</a> 
                </div>
                <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
                    <a href="{{ route('class_students.index',$classDetail->id) }}" class="btn btn-primary shadow-md me-2">Students</a> 
                </div>
            </div>  
            <div class="p-5">
            <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                <table class="table table-bordered table-report mt-n2">
                    <tbody>
                        <tr>
                            <td>Class</td>
                            <td>{{$classDetail->class_name}}</td>
                        </tr>
                        <tr>
                            <td>Class Teacher</td>
                            <td>{{$classDetail->teachers->name}}</td>
                        </tr>
                        <tr>
                            <td>Class Timing</td>
                            <td>{{$classDetail->shift_types->name}}</td>
                        </tr>
                        <tr>
                            <td>No Of Students</td>
                            <td>{{$classDetail->no_of_student}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div> 
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto"> Time Table </h2>
            </div>   
                <div class="p-5">
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                    <table class="table table-bordered table-report mt-n2">
                    <thead>
                        <tr>
                            <th>WeekDays</th>
                            <?php foreach ($lectureSession as $sessionPeriods) { ?>
                                 <th><?php echo $sessionPeriods['start_time'] . " - " . $sessionPeriods['end_time']; ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($weekDays as $key => $weekDay) { ?>
                        <tr>
                            <td>{{$weekDay->day}}</td>
                            <?php   
                             foreach ($timeTables as $key1 => $timeTable) {
                                if($timeTable->week_day_id == $weekDay->id){
                                 
                                     

                            ?>
                               <td>
                                <table class="table-bordered table-report mt-n2">
                                <tbody>
                                    <tr>
                                        <td> <span>{{$timeTable->subjects->name}} </span></td>
                                    </tr>
                                    <tr>
                                    <td> <span>{{$timeTable->teachers->name}} </span></td>
                                    </tr>
                                </tbody>
                                </table> 
                               </td>
                            <?php }} ?>
                        </tr>
                    <?php } ?>
                </tbody>
                    </table>
                </div>
                </div> 
            </div>    
        </div>
        <!-- END: Display Information -->
      

    </div>
</div>
@endsection