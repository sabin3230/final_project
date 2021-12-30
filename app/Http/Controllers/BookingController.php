<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CustomerVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('booking-view')){
            return abort(401);
        }
        $user = Auth::user();
        $user_role = $user->role_id;
        if($user_role == 1){
            return view('admin.booking.index')->with('bookings', Booking::all());
        }else if($user_role == 3){
            $customer_id = $user->customer->id;
            $customer_vehicles = CustomerVehicle::select('id')->where('customer_id', $customer_id)->get();
            $bookings = DB::table('bookings')->whereIn('customer_vehicle_id', $customer_vehicles)->get();
            return view('customer.booking.index')->with('bookings', $bookings);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('booking-add')){
            return abort(401);
        }
        $user = Auth::user();
        $customerVehicles = $user->customer->customerVehicles;
        return view('customer.booking.create')->with('bookings', Booking::all())->with('customerVehicles', $customerVehicles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! Gate::allows('booking-add')){
            return abort(401);
        }
        // dd($request->all());
        $booking = Booking::create([
            'customer_vehicle_id'=>request('customer_vehicle_id'),
            'completed_km'=>request('completed_km'),
            'booking_date'=>request('booking_date'),
            'booking_time'=>request('booking_time'),
            'description'=>request('description'),
        ]);
        $booking->issues()->sync($request->issues);
        return redirect()->route('customer-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('booking-delete')){
            return abort(401);
        }
        Booking::find($id)->delete();
        return redirect()->route('booking.index');
    }
}
