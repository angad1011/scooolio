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
<?php foreach ($students as $key => $student) { ?>
    <tr>
        <td>
        <input name="data[StudentAttendace][{{$key}}][date]" type="hidden" value="{{$currentDate}}">  
        <input name="data[StudentAttendace][{{$key}}][institute_id]" type="hidden" value="{{$instituteId}}">
        <input name="data[StudentAttendace][{{$key}}][learn_space_id]" type="hidden" value="{{$classId}}">
        <input name="data[StudentAttendace][{{$key}}][academic_year_id]" type="hidden" value="{{$academicYear->id}}">       
        {{$student->role_no}}
        </td>
        <td>
            {{$student->students->name}}
            <input name="data[StudentAttendace][{{$key}}][student_id]" type="hidden" value="{{$student->students->id}}">  
        </td>
        <td>
        <select class=" form-select me-sm-2 attendanceType" placeholder="Attendance Type" name="data[StudentAttendace][{{$key}}][attendance_type_id]">
        <option value="">Select Type</option>
        @foreach ($attendanceTypes as $attendanceType)
        <option value="{{ $attendanceType->id }}">{{ $attendanceType->name }}</option>
        @endforeach
        </td>
        <td>
        <input name="data[StudentAttendace][{{$key}}][absent_reason]" type="text" class="form-control reason" readonly="true">
        </td>
    </tr>
<?php } ?>
</tbody>
</table>
<div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
<button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
</div>