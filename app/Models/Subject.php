<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name','active','created_at','updated_at','institute_id'];
    protected $table = 'subjects';

    public function institutes()
    {
        return $this->belongsTo(Institute::class,'institute_id', 'id');
    }

    // Define the hasMany relationship
    public function class_time_tables()
    {
        return $this->hasMany(ClassTimeTable::class, 'subject_id', 'id');
    }
}
