<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTimeTable extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','learn_space_id','subject_id','teacher_id','week_day_id','lecture_duration','created_at','updated_at'];
    protected $table = 'class_time_tables';
   
     // Define the belongsTo relationship
     public function institutes(){
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function learn_spaces(){
        return $this->belongsTo(LearnSpace::class, 'learn_space_id', 'id');
    }

    public function teachers(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function subjects(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function week_days(){
        return $this->belongsTo(WeekDay::class, 'week_day_id', 'id');
    }
}
