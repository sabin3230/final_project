@extends('layouts.admin')
@section('nav-title')
    Booking
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"> Create</h3>
    </div>
    
    <form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data"></form>
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
            <label for="complete_date">Completed Date</label>
            <input type="date" name="complete_date" id="complete_date"  class="form-control">
        </div>

        <select name="customer_vehicle_id" id="">
            <option value="">-------</option>
            @foreach($vehicle_models as $vehiclemodel)
                <option value="{{$vehiclemodel->id}}">{{$vehiclemodel->model_name}}</option>
            @endforeach
        </select>

        <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>

    </div>
</div>