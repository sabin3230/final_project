@extends('layouts.admin')
@section('nav-title')
Servicing
@endsection

@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create</h3>
        </div>
        <!--form start-->
        <form action="{{route('servicing.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="assign_to">Assign To</label>
                    <input type="text" name="assign_to" id="assign_to"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="time" name="start_time" id="start_time"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="time" name="end_time" id="end_time" class="form-control">
                </div>
                <div class="form-group">
                    <label for="remarks"> Remarks</label>
                    <input type="text" name="remarks" id="remarks" class="form-control">
                </div>
                <div class="form-group">
                    <label for="next_servicing">Next Servicing</label>
                    <input type="date" name="next_servicing" id="next_servicing"  class="form-control">
                </div>
    
                <select name="employee_id" id="">
                    <option value="">-------</option>
                    @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
                
                <select name="booking_id" id="">
                    <option value="">-------</option>
                    @foreach($bookings as $booking)
                        <option value="{{$booking->id}}">{{$booking->name}}</option>
                    @endforeach
                </select>

            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection
