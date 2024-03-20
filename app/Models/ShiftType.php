<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'shift_types';

    
     // Define the hasMany relationship
     public function learn_spaces(){
        return $this->hasMany(LearnSpace::class, 'shift_type_id', 'id');
    }

}
