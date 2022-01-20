<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;
    protected $fillable =['id', 'model_name', 'engine_capacity', 'color', 'organization_id'];
   
    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function CustomerVehicle(){
        return $this->hasMany(CustomerVehicle::class);
    }

    public function vehicleBookings(){
        return $this->hasMany(VehicleBooking::class);
    }
}
