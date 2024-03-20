<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersLearnSpaces extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id','learn_space_id'];
    protected $table = 'teachers_learn_spaces';
}
