@extends('layouts.admin')
@section('nav-title')
    Booking
@endsection

@section('content')

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit</h3>
            </div>
            <!--form start-->
            <form action="{{route('booking.update', ['booking' => $bookings->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                <div class="form-group">
                    <label for="booking_date">Booking Date</label>
                    <input type="date" name="booking_date" id="booking_date" value="{{booking->booking_date}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="booking_time">Booking Time</label>
                    <input type="time" name="booking_time" id="booking_time"  value="{{booking->booking_time}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="completed_km">Completed Kilometer</label>
                    <input type="text" name="completed_km" id="completed_km" value="{{booking->completed_km}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="customer_vehicle">Customer Vehicle</label>
                    <select name="customer_vehicle_id" id="">
                    <option value="{{$bookings->customer_vehicle_id}}">{{$bookings->customer_vehicle->id}}</option>
                    @foreach($customerVehicles as $customerVehicle)
                        <option value="{{$customer_vehicle->id}}">{{$customer_vehicle->name}}</option>
                    @endforeach
                </select>
                </div>
                
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection