<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    protected $fillable = ['name','active','created_at','updated_at'];
    
    protected $table = 'mediums';

    // Define the hasMany relationship
    public function institutes(){
        return $this->hasMany(Institute::class, 'medium_id', 'id');
    }
}
