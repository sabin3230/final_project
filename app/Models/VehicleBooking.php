<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBooking extends Model
{
    use HasFactory;
    protected $fillable =['id', 'first_name', 'last_name','address','contact', 'alt_contact','email','vehicle_model_id'];

    public function vehiclemodel(){
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

}
