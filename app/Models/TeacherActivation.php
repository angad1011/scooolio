<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class TeacherActivation extends Authenticatable
{
    use HasFactory,  HasApiTokens;

    protected $fillable = ['teacher_id','username','password','active','created_at','updated_at'];
    protected $table = 'teacher_activations';

     // Define the belongsTo relationship
    public function teachers(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

}
