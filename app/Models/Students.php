<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','gr_no','name','email','contact_no','date_of_birth','gender','blood_group','profile_img','father_name','mother_name','father_qualification','mother_qualification','address','date_of_admission','date_of_leaving','current_class_id','last_class_id','active','created_at','updated_at'];
    protected $table = 'students';

   // Define the belongsTo relationship
   public function institutes(){
      return $this->belongsTo(Institute::class, 'institute_id', 'id');
   }

    // Define the hasMany relationship
    public function student_attendances(){
        return $this->hasMany(StudentAttendace::class, 'student_id', 'id');
    }

    public function class_students(){
        return $this->hasOne(StudentClass::class, 'student_id', 'id');
    }

      
    
}
