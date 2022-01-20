<?php

namespace App\Http\Controllers;

use App\Models\VehicleBooking;
use App\Models\VehicleModel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorevehiclebookingRequest;
use App\Http\Requests\UpdatevehiclebookingRequest;


class VehicleBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('vehiclebooking-view')){
            return abort(401);
        }

        return view('admin.booking_vehicle.index')->with('vehicleModel',VehicleBooking ::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(! Gate::allows('vehiclebooking-add')){
            return abort(401);
        }

        VehicleBooking::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleBooking  $vehicleBooking
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleBooking $vehicleBooking)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleBooking  $vehicleBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleBooking $vehicleBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleBooking  $vehicleBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleBooking $vehicleBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleBooking  $vehicleBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('vehiclebooking-delete')){
            return abort(401);
        }
        VehicleBooking::find($id)->delete();
        return redirect()->route('vehiclebooking.index');
    }
}
