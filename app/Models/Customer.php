<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable =['id', 'user_id'];

    public function customerVehicles(){
        return $this->hasMany(CustomerVehicle::class);
    }
    public function user(){
        // dd($this->belongsTo(User::class, 'user_id'));
        return $this->belongsTo(User::class, 'user_id');
    }
}
