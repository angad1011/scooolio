<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','academic_year_id','learn_space_id','student_id','role_no','created_at','updated_at'];
    protected $table = 'class_students';

    // Define the belongsTo relationship
    public function institutes(){
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function academic_years(){
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }

    public function learn_spaces(){
        return $this->belongsTo(LearnSpace::class, 'learn_space_id', 'id');
    }

    public function students(){
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }

}
