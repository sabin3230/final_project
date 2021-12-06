<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'issue', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Issue::class,'parent_id')->where('parent_id',0);
    }

    public function children()
    {
        return $this->hasMany(Issue::class,'parent_id');
    }

}
