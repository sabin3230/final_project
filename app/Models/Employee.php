<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =['id','department_id','user_id','status'];

    public function user(){
        // dd($this->belongsTo(User::class, 'user_id'));
        return $this->belongsTo(User::class, 'user_id');
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function servicings(){
        return $this->hasMany(Servicing::class);
    }
}
