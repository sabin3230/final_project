<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable =['id','branch_name','addres','email','contact_no','open_date','status','slug','org_id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
