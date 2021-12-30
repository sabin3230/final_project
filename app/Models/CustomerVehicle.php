<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerVehicle extends Model
{
    use HasFactory;
    protected $fillable =['id', 'vehicle_no','model_year', 'purchase_date', 'chassis_no', 'engine_no', 'customer_id', 'vehicle_model_id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function vehiclemodels(){
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
