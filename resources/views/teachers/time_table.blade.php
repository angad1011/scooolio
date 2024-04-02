@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <!-- <h2 class="fs-lg fw-medium me-auto"> {{$teacher->name}} </h2> -->
    <div class="w-12 h-12 image-fit">
    @php
    $firstImage = $teacher->profile_img;
    $id = $teacher->id;
    $imagePath = $firstImage ? asset("files/teachers/profile_img/".$id."/".$firstImage."") : asset('dist/images/admin-pic.jpg');

    @endphp

    @if(!empty($imagePath))
    <img src="{{ $imagePath }}" class="rounded-circle">
    @endif
    <!-- <h2 class="fs-lg fw-medium me-auto"> {{$teacher->name}} </h2> -->
    </div>
    <div class="ms-4 me-auto">
        <div class="fw-medium fs-base">{{ $teacher->name }}</div>
        <div class="text-gray-600">Qualification.{{ $teacher->qualification }}</div>
    </div>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a href="{{ route('teachers.index') }}" class="btn btn-primary shadow-md me-2">Teacher List</a>
    <a href="{{ route('teachers.show',$teacher->id) }}" class="btn btn-primary shadow-md me-2">Teacher Details</a>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="grid columns-12 gap-6">
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-12 g-col-xxl-12">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                {{ $teacher->name }} - Time Table
                </h2>
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
                    @foreach ($weekDays as $weekDay)
                        <tr>
                            <td>{{ $weekDay->day }}</td>
                            @foreach ($lectureSession as $sessionPeriods)
                                <?php $found = false;  ?>
                                @foreach ($timeTables as $timeTable)
                                    @if ($timeTable->week_day_id == $weekDay->id && $timeTable->period_number == $sessionPeriods['period_number'])
                                        <td>
                                            <table class="table-bordered table-report mt-n2">
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $timeTable->subjects->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $timeTable->learn_spaces->class_name }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php $found = true; ?>
                                            @break
                                        </td>
                                    @endif
                                @endforeach
                                @if (!$found)
                                    <td><span style="color:red">Not Yet Scheduled !</span></td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
                </table>    
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
    </div>
</div>
@endsection