<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;
use App\Models\Organization;
use App\Http\Requests\StoreVehicleModelRequest;
use App\Http\Requests\UpdateVehicleModelRequest;
use Illuminate\Support\Facades\Gate;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('vehicle-model-view')){
            return abort(401);
        }
        return view('admin.vehicle_model.index')->with('vehiclemodels', VehicleModel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('vehicle-model-add')){
            return abort(401);
        }
        return view('admin.vehicle_model.create')->with('organizations', Organization::all());
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleModelRequest $request)
    {
    
        if(! Gate::allows('vehicle-model-add')){
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleModel $vehicleModel)
    {
        if(! Gate::allows('vehicle-model-edit')){
            return abort(401);
        }
        return view('admin.vehicle_model.edit')->with('vehiclemodels', VehicleModel::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleModelRequest  $request
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleModelRequest $request, VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleModel $vehicleModel)
    {
        //
    }
}
