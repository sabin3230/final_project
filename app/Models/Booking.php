<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable =['id', 'booking_date', 'booking_time', 'completed_km', 'customer_vehicle'];

    public function servicings(){
        return $this->hasMany(Servicing::class);
    }
}
