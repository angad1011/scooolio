<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppScreen extends Model
{
    use HasFactory;
    protected $fillable = ['order','title','description','image_file','active','created_at','updated_at'];

    protected $table = 'app_screens';

}
