<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Servicing;
use App\Models\Customer;
use App\Models\VehicleBooking;
use App\Models\Employee;

class AdminController extends Controller
{
    public function index()
    {
        $Customer=Customer::all()->count();
        $Servicing=Servicing::all()->count();
        $VehicleBooking=VehicleBooking::all()->count();
        $Employee=Employee::all()->count();
        return view('admin.home')->with ('Customer', $Customer )->with('Servicing', $Servicing)->with('VehicleBooking',$VehicleBooking)->with('Employee',$Employee);
    }
}

