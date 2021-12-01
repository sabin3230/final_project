<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicing extends Model
{
    use HasFactory;
    protected $fillable =['id', 'assign_to', 'start_time', 'end_time', 'remarks', 'next_servicing', 'booking_id', 'employee_id'];
}
