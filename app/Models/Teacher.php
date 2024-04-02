<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','shift_type_id','name','email','password','contact','qualification','gender','address','profile_img','active','created_at','updated_at'];
    protected $table = 'teachers';



    // Define the belongsTo relationship
    public function shift_types(){
        return $this->belongsTo(ShiftType::class, 'shift_type_id', 'id');
    }

    
    // hasManyblogs 
    public function learn_spaces()
    {
        return $this->belongsToMany(LearnSpace::class, 'teachers_learn_spaces', 'teacher_id', 'learn_space_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teachers_subjects', 'teacher_id', 'subject_id');
    }
}
