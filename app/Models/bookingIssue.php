<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingIssue extends Model
{
    use HasFactory;
    proteceted $fillable =['id', 'booking_id', 'issue_id'];
}
