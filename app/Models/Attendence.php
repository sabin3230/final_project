<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $dates = ['start_date_time','end_date_time'];
    protected $fillable =['id','employee_id','start_date_time', 'end_date_time'];
}
