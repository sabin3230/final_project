<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable =['id', 'booking_date', 'booking_time', 'completed_km',  'description', 'customer_vehicle_id'];

    public function servicings(){
        return $this->hasMany(Servicing::class);
    }

     public function issues()
    {
        return $this->belongsToMany(Issue::class, 'booking_issues');
    }

    
    public function customerVehicles(){
        return $this->belongsTo(CustomerVehicle::class,'customer_vehicle_id');
    }

  
}
