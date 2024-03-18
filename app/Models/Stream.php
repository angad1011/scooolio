<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    protected $fillable = ['name','active','created_at','updated_at'];
    
    protected $table = 'streams';

    // Define the hasMany relationship
    public function institutes(){
        return $this->hasMany(Institute::class, 'stream_id', 'id');
    }
}
