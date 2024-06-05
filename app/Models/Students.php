<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','learn_space_id','gr_no','udise_no','first_name','last_name','name','email','username','password','contact_no','alternate_no','whatsapp','gender','date_of_birth','profile_img','aadhar_cart','date_of_admission','date_of_leaving','year','nationality','religion','cast_catogory','blood_group','father_name','mother_name','qualification','father_occupation','mother_occupation','parent_income','parent_email','parent_contact_no','parent_alternat_no','parent_whatsapp','pincode','city','state','address','active','created_at','updated_at'];

    protected $table = 'students';

   // Define the belongsTo relationship
   public function institutes(){
      return $this->belongsTo(Institute::class, 'institute_id', 'id');
   }

   public function learn_spaces(){
      return $this->belongsTo(LearnSpace::class, 'learn_space_id', 'id');
   }


    // Define the hasMany relationship
    public function student_attendances(){
        return $this->hasMany(StudentAttendace::class, 'student_id', 'id');
    }

    public function class_students(){
        return $this->hasOne(StudentClass::class, 'student_id', 'id');
    }

      
    
}
