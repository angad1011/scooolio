<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = ['institute_id','year','its_current_year','created_at','updated_at'];

    protected $table = 'academic_years';

}
