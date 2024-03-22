<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','learn_space_id','gr_no','roll_no','name','email','contact_no','date_of_birth','gender','blood_group','profile_img','active','created_at','updated_at'];
    protected $table = 'students';

   // Define the belongsTo relationship
   public function institutes(){
    return $this->belongsTo(Institute::class, 'institute_id', 'id');
  }

    public function learn_spaces(){
        return $this->belongsTo(LearnSpace::class, 'learn_space_id', 'id');
    }     
    
}
