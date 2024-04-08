<div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table id="student-table"  class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Student Name</th>
                    <th class="text-nowrap">Role NO.</th>
                </tr>
            </thead>
            <tbody>
            <?php
                for ($i = 1; $i <= $noOfStudent; $i++) {
            ?>        
                <tr>
                    <td>
                        <input name="data[StudentClass][{{$i}}][institute_id]" type="hidden" value="{{$instituteId}}">
                        <input name="data[StudentClass][{{$i}}][learn_space_id]" type="hidden" value="{{$classId}}">     
                        <input name="data[StudentClass][{{$i}}][academic_year_id]" type="hidden" value="{{$academicYear->id}}">     
                        <select class=" form-select me-sm-2" placeholder="Select Subject" name="data[StudentClass][{{$i}}][student_id]" required>
                            <option value="">Select Student</option>
                            @foreach ($students as $student)
                            <option value="{{$student->id }}">{{ $student->name }} ({{$student->gr_no}}) </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="data[StudentClass][{{$i}}][role_no]" placeholder="Enter Role No." required></td>
                </tr>
              <?php  } ?>
            </tbody>
        </table>
     </div>