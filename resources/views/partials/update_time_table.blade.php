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
                            <?php   
                             foreach ($timeTables as $key1 => $timeTable) {
                                if($timeTable->week_day_id == $weekDay->id){
                                 
                                     

                            ?>
                               <td>
                               <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][id]" type="hidden" value="{{$timeTable->id}}">
                               <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][institute_id]" type="hidden" value="{{$timeTable->institute_id}}">
                               <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][learn_space_id]" type="hidden" value="{{$timeTable->learn_space_id}}">
                               <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][week_day_id]" type="hidden" value="{{$timeTable->week_day_id}}">
                               <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][period_number]" type="hidden" value="{{$timeTable->period_number}}">
                               <input name="data[ClassTimeTable][{{$key1}}_{{$key}}][lecture_duration]" type="hidden" value="{{$timeTable->lecture_duration}}">
                               
                               <label for="name" class="form-label">Subject</label>
                               <select class=" form-select me-sm-2" placeholder="Select Subject" name="data[ClassTimeTable][{{$key1}}_{{$key}}][subject_id]">
                                    <option value="">Subjects</option>
                                    <?php foreach ($subjects as  $subject) {
                                        $selectedSubject = ($subject->id == $timeTable->subject_id) ? 'selected' : '';
                                    ?>
                                    <option value="{{ $subject->id }}" <?php echo $selectedSubject;?>>{{ $subject->name }}</option>
                                    <?php } ?>
                                </select>
                                <br>
                                <label for="name" class="form-label">Teacher</label>
                                <select class=" form-select me-sm-2" placeholder="Select Subject" name="data[ClassTimeTable][{{$key1}}_{{$key}}][teacher_id]">
                                    <option value="">Teachers</option>
                                    <?php foreach ($teachers as  $teacher) {
                                        $selectedTeacher = ($teacher->id == $timeTable->teacher_id) ? 'selected' : '';
                                    ?>
                                    <option value="{{$teacher->id }}" <?php echo $selectedTeacher;?>>{{ $teacher->name }}</option>
                                    <?php } ?>
                                </select>        
                               </td>
                            <?php }} ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
            <button class="btn btn-primary w-24 ms-2" type="submit">Submit</button>
        </div>
    </div>
</form>