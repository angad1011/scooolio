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
}
