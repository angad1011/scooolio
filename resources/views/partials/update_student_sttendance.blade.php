<table class="table table-bordered table-report mt-n2">
<thead>
    <tr>
        <th>Roll No.</th>
        <th>Student Name</th>
        <th>Attendace</th>
        <th>Absent Reason</th>
    </tr>
</thead>
<tbody>
<?php foreach ($attendance as $key => $attendanc) { 
    $attendanceTypeId = $attendanc->attendance_type_id;
    $readonly = ($attendanceTypeId == 2) ? '' : 'readonly' ; 
?>
    <tr>
        <td>
        <input name="data[StudentAttendace][{{$key}}][id]" type="hidden" value="{{$attendanc->id}}">    
        <input name="data[StudentAttendace][{{$key}}][date]" type="hidden" value="{{$attendanc->date}}">  
        <input name="data[StudentAttendace][{{$key}}][institute_id]" type="hidden" value="{{$instituteId}}">
        <input name="data[StudentAttendace][{{$key}}][learn_space_id]" type="hidden" value="{{$classId}}">
        <input name="data[StudentAttendace][{{$key}}][academic_year_id]" type="hidden" value="{{$attendanc->academic_year_id}}">       
        {{$attendanc->students->class_students->role_no}}
        </td>
        <td>
            {{$attendanc->students->name}}
            <input name="data[StudentAttendace][{{$key}}][student_id]" type="hidden" value="{{$attendanc->student_id}}">  
        </td>
        <td>
        <select class=" form-select me-sm-2 attendanceType" placeholder="Attendance Type" name="data[StudentAttendace][{{$key}}][attendance_type_id]">
        <option value="">Select Type</option>
        <?php foreach ($attendanceTypes as $attendanceType) { 
            $selected = ($attendanceTypeId == $attendanceType->id) ? 'selected' : '';        
        ?>
        <option value="{{ $attendanceType->id }}" <?php echo $selected; ?>>{{ $attendanceType->name }}</option>
        <?php } ?>
        </td>
        <td>

        <input name="data[StudentAttendace][{{$key}}][absent_reason]" type="text" class="form-control reason" value="{{$attendanc->absent_reason}}" <?php echo $readonly;?>>
        </td>
    </tr>
<?php } ?>
</tbody>
</table>
<div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
<button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
</div>
        