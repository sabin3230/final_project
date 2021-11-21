<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    // public functtion permissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'role_permissions');
    // }
    public function employees()
    {
        return $this->hasMany(User::class);
    }
    protected $fillable = ['role'];
}
