<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBooking extends Model
{
    use HasFactory;
    protected $fillable =['id', 'first_name', 'last_name','address'.'contact', ' alt_contact','email','mode_name','engine_capacity','color'  'vehicle_model_id'];

}
