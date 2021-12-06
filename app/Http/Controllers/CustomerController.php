<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        if(! Gate::allows('customer-view')){
            return abort(401);
        }
        return view('admin.customer.index')->with('customers', Customer::all());
    }

    
}
