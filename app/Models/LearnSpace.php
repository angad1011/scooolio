<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnSpace extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','standard_id','division_id','teacher_id','shift_type_id','no_of_student','active','created_at','updated_at'];
    protected $table = 'learn_spaces';


    // Define the belongsTo relationship
    public function institutes(){
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function standards(){
        return $this->belongsTo(Standard::class, 'standard_id', 'id');
    }

    public function divisions(){
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function shift_types(){
        return $this->belongsTo(ShiftType::class, 'shift_type_id', 'id');
    }

}
