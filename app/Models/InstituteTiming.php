<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteTiming extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id','shift_type_id','shift_start','shift_end','break_time','prayer_time','time_per_perioud','break_time_start','break_durations','created_at','updated_at'];
    protected $table = 'institute_timings';

    
    // Define the belongsTo relationship
     public function shift_types(){
        return $this->belongsTo(ShiftType::class, 'shift_type_id', 'id');
    }

     // Define the belongsTo relationship
     public function institutes(){
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

   

}
