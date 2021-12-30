@extends('layouts.admin')
@section('nav-title')
Booking

@endsection

@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create</h3>
        </div>
        <!--form start-->
        <form action="{{route('booking.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="booking_date">Booking Date</label>
                    <input type="date" name="booking_date" id="booking_date"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="booking_time">Booking Time</label>
                    <input type="time" name="booking_time" id="booking_time"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="completed_km">Completed Kilometer</label>
                    <input type="text" name="completed_km" id="completed_km" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <label for="">Your Vehicles</label>
                <select name="customer_vehicle_id" id="">
                    <option value="">-------</option>
                    @foreach($customerVehicles as $customerVehicle)
                        <option value="{{$customerVehicle->id}}">{{$customerVehicle->vehicle_no}}</option>
                    @endforeach
                </select>
                

            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection
