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
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
    protected $fillable = ['role'];
}
