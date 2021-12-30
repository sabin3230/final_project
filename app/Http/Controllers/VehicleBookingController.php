<?php

namespace App\Http\Controllers;

use App\Models\VehicleBooking;
use Illuminate\Http\Request;

class VehicleBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehicle_booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleBooking  $vehicleBooking
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleBooking $vehicleBooking)
    {
        //
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
    public function destroy(VehicleBooking $vehicleBooking)
    {
        //
    }
}
