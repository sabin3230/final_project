<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = ['id' , 'name', 'logo', 'address', 'contact', 'alt_contact', 'email', 'alt_email', 'facebook_link', 'instagram_link', 'description'];
    public function branches(){
        return $this->hasMany(Branch::class);
    }
    public function vehicleModels(){
        return $this->hasMany(VehicleModel::class);
    }
}
