<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnSpace extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','class_name','teacher_id','shift_type_id','no_of_student','active','created_at','updated_at'];
    protected $table = 'learn_spaces';


    // Define the belongsTo relationship
    public function institutes(){
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

   
    public function shift_types(){
        return $this->belongsTo(ShiftType::class, 'shift_type_id', 'id');
    }

    public function teachers(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

}
