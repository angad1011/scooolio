<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteType extends Model
{
    use HasFactory;

    protected $fillable = ['name','active','created_at','updated_at'];
    
    protected $table = 'institute_types';

    // Define the hasMany relationship
    public function institutes(){
        return $this->hasMany(Institute::class, 'institute_type_id', 'id');
    }

}
