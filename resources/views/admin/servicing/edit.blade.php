@extends('layouts.admin')
@section('nav-title')

@endsection

@section('content')

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit</h3>
            </div>
            <!--form start-->
            <form action="{{route('servicing.update', ['servicing' => $servicings->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="assign_to">Assign To</label>
                        <input type="text" name="assign_to" id="assign_to" value="{{servicing->assign_to}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time" name="start_time" id="start_time" value="{{servicing->start_time}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" name="end_time" id="end_time" value="{{servicing->end_time}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="remarks"> Remarks</label>
                        <input type="text" name="remarks" id="remarks" value="{{servicing->remarks}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="next_servicing">Next Servicing</label>
                        <input type="date" name="next_servicing" id="next_servicing"  value="{{servicing->next_servicing}}" class="form-control">
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
                    
                    <div class="form-group">
                        <label for="employee">Employee</label>
                            <select name="employee_id" id="">
                            <option value="{{$servicing->employee_id}}">{{$servicing->employee->name}}</option>
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="booking">Booking</label>
                            <select name="booking_id" id="">
                            <option value="{{$servicing->booking_id}}">{{$servicing->booking->name}}</option>
                            @foreach($bookings as $booking)
                                <option value="{{$booking->id}}">{{$booking->name}}</option>
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