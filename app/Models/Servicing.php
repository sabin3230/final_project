<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicing extends Model
{
    use HasFactory;
    protected $fillable =['id','assign_to', 'start_time', 'end_time', 'remarks', 'status', 'next_servicing', 'booking_id', 'employee_id'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function bookings(){
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    public function feedback(){
        return $this->hasOne(Feedback::class, 'feedback_id', 'id');
    }


}
