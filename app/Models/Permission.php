<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['permission', 'p_component_id'];
    public $dates = ['deleted_at'];
    public function component()
    {
        return $this->belongsTo(PermissionComponent::class, 'p_component_id');
    }
}
