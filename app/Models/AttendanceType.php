<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceType extends Model
{
    use HasFactory;
    protected $fillable = ['name','created_at','updated_at'];

    protected $table = 'attendance_types';

    // Define the hasMany relationship
    public function student_attendances(){
        return $this->hasMany(StudentAttendace::class, 'attendance_type_id', 'id');
    }

}
