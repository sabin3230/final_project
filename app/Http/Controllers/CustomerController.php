<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Issue;
use App\Models\VehicleModel;
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

    

    public function dashboard()
    {
        if(! Gate::allows('customer-dashboard')){
            return abort(401);
        }
        $customer=Auth::user()->customer;
        $customerVehicle = $customer->customerVehicles;
        $bookings = collect();
        foreach($customerVehicle as $vehicle){
            $bookings->push($vehicle);
        }
        return view('customer.customer_profile')->with('customer', $customer)
                                                ->with('customerVehicles', $customerVehicle)
                                                ->with('issues',Issue::all())
                                                ->with('bookings', $bookings)
                                                ->with('models', VehicleModel::all());
    }

    public function customerBooking(){
        $customer=Auth::user()->customer;
        $customerVehicles = $customer->customerVehicles;
        $servicings = collect();
        foreach($customerVehicles as $v){
            // echo($v);
            foreach ($v->bookings as $b) {
                $servicings->push($b->servicings);
                // echo($b->servicings);
                // echo("<br>");
            }
        }
        // dd($servicings);
        
        return view('customer.customer_booking')->with('servicings', $servicings);
    }

    public function customerView(){

    }
}
