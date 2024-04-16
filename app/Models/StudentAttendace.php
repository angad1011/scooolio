<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendace extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','academic_year_id','learn_space_id','student_id','attendance_type_id','date','created_at','updated_at'];

    protected $table = 'student_attendances';

    // Define the belongsTo relationship
    public function institutes(){
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function learn_spaces(){
        return $this->belongsTo(LearnSpace::class, 'learn_space_id', 'id');
    }

    public function students(){
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }

    public function academic_years(){
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }

    public function attendance_types(){
        return $this->belongsTo(AttendanceType::class, 'attendance_type_id', 'id');
    }

}
