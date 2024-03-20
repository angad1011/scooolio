<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','name','email','password','contact','qualification','gender','address','profile_img','active','created_at','updated_at'];
    protected $table = 'teachers';


    // hasManyblogs 
    public function learn_spaces()
    {
        return $this->belongsToMany(LearnSpace::class, 'teachers_learn_spaces', 'teacher_id', 'learn_space_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teachers_students', 'subject_id', 'learn_space_id');
    }
}
