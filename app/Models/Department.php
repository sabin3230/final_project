<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable =['id','department_name','contact_no','email','slug','manager_id'];

    public function employees(){
        return $this->hasMany(EmployeeModel::class);
    }
    public function branchs()
    {
        return $this->belongsToMany(Branch::class, 'branch_department');
    }
}
