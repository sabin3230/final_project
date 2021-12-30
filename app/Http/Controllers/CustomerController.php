<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Issue;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        if(! Gate::allows('customer-view')){
            return abort(401);
        }
        return view('admin.customer.index')->with('customers', Customer::all());
    }

    public function customerDashboard()
    {
        return view('customer.dashboard');
    }

    public function customerProfile()
    {
        $customer=Auth::user()->customer;
        $customerVehicle = $customer->customerVehicles;
        // dd($customerVehicle);
        return view('customer.customer_profile')->with('customer', $customer)
                                                ->with('customerVehicles', $customerVehicle)
                                                ->with('issues',Issue::all());
    }
}
