        <form method="POST" action="{{route('time_tables.store')}}" enctype="multipart/form-data"> 
            @csrf
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
                     <?php foreach ($lectureSession as $key1 => $sessionPeriods) { 
                        $lectureDuration = $sessionPeriods['start_time']."-".$sessionPeriods['end_time'];

                    ?>
                        <td>
                        <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][institute_id]" type="hidden" value="{{$instituteId}}">
                        <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][learn_space_id]" type="hidden" value="{{$classId}}">      
                        <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][week_day_id]" type="hidden" value="{{$weekDay->id}}">
                        <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][period_number]" type="hidden" value="{{$sessionPeriods['period_number']}}">  
                        <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][lecture_duration]" type="hidden" value="{{$lectureDuration}}">  
                        
                        <label for="name" class="form-label">Subject</label>    
                        <select class=" form-select me-sm-2" placeholder="Select Subject" name="data[ClassTimeTable][{{$key1}}_{{$key}}][subject_id]">
                        <option value="">Subjects</option>
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="name" class="form-label">Teacher</label>
                    <select class=" form-select me-sm-2" placeholder="Select Subject" name="data[ClassTimeTable][{{$key1}}_{{$key}}][teacher_id]">
                        <option value="">Teachers</option>
                        @foreach ($teachers as $teacher)
                        <option value="{{$teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                        </td>
                    <?php } ?>
                   </tr> 
                   <?php } ?>
                   </tbody>
                </table>
                
            </div>
            <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
                    <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
                </div>
            </div> 
            </form> 