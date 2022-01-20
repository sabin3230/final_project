<?php

namespace App\Http\Controllers;

use App\Models\CustomerVehicle;
use App\Models\VehicleModel;
use App\Models\Customer;

use App\Http\Requests\StoreCustomer_vehicleRequest;
use App\Http\Requests\UpdateCustomer_vehicleRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CustomerVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('customer-vehicle-view')){
            return abort(401);
        }
        return view('customer.customer_vehicle.index')->with('customerVehicles', CustomerVehicle::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('customer-vehicle-add')){
            return abort(401);
        }
        
        return view('customer.customer_vehicle.create')->with('vehicle_models', VehicleModel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomer_vehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer_vehicleRequest $request)
    {
        
        if(! Gate::allows('customer-vehicle-add')){
            return abort(401);
        }
        // dd(Auth::user()->customer->id);
        $request["customer_id"]=Auth::user()->customer->id;
        CustomerVehicle::create($request->all());

        return redirect()->route('customer-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer_vehicle  $customer_vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_vehicle $customer_vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer_vehicle  $customer_vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerVehicle $customerVehicle)
    {
        if(! Gate::allows('customer-vehicle-edit')){
            return abort(401);
        }
        return view('customer.customer_vehicle.edit',compact('customerVehicle'))
                                                ->with('Customers',Customer::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomer_vehicleRequest  $request
     * @param  \App\Models\Customer_vehicle  $customer_vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomer_vehicleRequest $request, $id)
    {
        if(! Gate::allows('customer-vehicle-edit')){
            return abort(401);
        }
        $customerVehcile = CustomerVehicle::findOrFail($id);
        $customerVehcile->update($request->all());
        return redirect()->route('customer_vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer_vehicle  $customer_vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerVehicle $customerVehicle)
    {
        if(! Gate::allows('customer-vehicle-delete')){
            return abort(401);
        }
        $customerVehicle->delete();
        return redirect()->route('customer_vehicle.index');
    }
}
