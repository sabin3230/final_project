<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable =['id','servicing_id','description'];
    public $table = 'feedbacks';

    public function servicing()
    {
        return $this->belongsTo(Servicing::class, 'servicing_id');
    }

}
