<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = ['title','institute_id','message','start_date','end_date','active','created_at','updated_at'];

    protected $table = 'notices';

    // Define the belongsTo relationship
    public function institutes(){
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

}
