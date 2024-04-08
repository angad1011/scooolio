<div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table id="student-table"  class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Student Name</th>
                    <th class="text-nowrap">Role NO.</th>
                </tr>
            </thead>
            <tbody>
            <?php for ($i = 1; $i <= $noOfStudent; $i++) { ?>
        <tr>
            <td>
                <input name="data[StudentClass][{{$i}}][id]" type="hidden" value="<?php echo isset($studentDetails[$i - 1]) ? $studentDetails[$i - 1]->id : ''; ?>">
                <input name="data[StudentClass][{{$i}}][institute_id]" type="hidden" value="<?php echo isset($studentDetails[$i - 1]) ? $studentDetails[$i - 1]->institute_id : $instituteId; ?>">
                <input name="data[StudentClass][{{$i}}][learn_space_id]" type="hidden" value="<?php echo isset($studentDetails[$i - 1]) ? $studentDetails[$i - 1]->learn_space_id : $classId; ?>">
                <input name="data[StudentClass][{{$i}}][academic_year_id]" type="hidden" value="<?php echo isset($studentDetails[$i - 1]) ? $studentDetails[$i - 1]->academic_year_id : $academicYear->id; ?>">
                <select class="form-select me-sm-2" placeholder="Select Subject" name="data[StudentClass][{{$i}}][student_id]" required>
                    <option value="">Select Student</option>
                    <?php foreach($students as $student){ 
                        $selected = isset($studentDetails[$i - 1]) && $student->id == $studentDetails[$i - 1]->student_id ? 'selected' : '';    
                    ?>
                    <option value="<?php echo $student->id ?>" <?php echo $selected; ?>><?php echo $student->name ?> (<?php echo $student->gr_no ?>)</option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="data[StudentClass][{{$i}}][role_no]" value="<?php echo isset($studentDetails[$i - 1]) ? $studentDetails[$i - 1]->role_no : ''; ?>" placeholder="Enter Role No." required>
            </td>
        </tr>
    <?php } ?>
            </tbody>
        </table>
     </div>