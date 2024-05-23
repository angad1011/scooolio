<!-- BEGIN: Calendar Content -->
            <div class="g-col-12 g-col-xl-12 g-col-xxl-12 mt-5">
                <div class="box p-5">
                    <h2 class="fw-medium fs-base me-auto"> Time Table of {{$teacher->name}} for class {{$classDetail->class_name}} </h2>
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-nowrap disabled">Days</th>
                                     <?php 
                                     $count = 0;
                                     foreach ($lectureSession as $sessionPeriods) { $count++; ?>
                                        <th class="text-nowrap">{{$count}}<br><span><?php echo $sessionPeriods['start_time'] . " - " . $sessionPeriods['end_time']; ?></span></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($weekDays as $weekDay)
                                <tr>
                                    <td class="text-nowrap">{{ $weekDay->day }}</td>
                                    @foreach ($lectureSession as $sessionPeriods)
                                    <?php $found = false;  ?>
                                     @foreach ($timeTables as $timeTable)
                                     @if ($timeTable->week_day_id == $weekDay->id && $timeTable->period_number == $sessionPeriods['period_number'])
                                       <td class="text-nowrap">
                                            <div class="mt-2">{{ $timeTable->subjects->name }}</div>
                                            <?php $found = true; ?>
                                            @break
                                       </td>
                                     @endif
                                    @endforeach
                                     @if (!$found)
                                        <td class="text-nowrap"><span style="color:red">Not Yet Scheduled !</span></td>
                                    @endif
                                    @endforeach
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END: Calendar Content -->