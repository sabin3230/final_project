<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerVehicle extends Model
{
    use HasFactory;
    protected $fillable =['id', 'vehivle_no', 'model_no', 'purchase_date', 'chassis_no', 'engine_no', 'user_id', 'vehicle_model_id'];
}
