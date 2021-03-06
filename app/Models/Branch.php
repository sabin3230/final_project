<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable =['id','branch_name','address','email','contact_no','open_date','status','slug','org_id'];

    public function organization(){
        return $this->belongsTo(Organization::class, 'org_id');
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'branch_department');
    }
}
