@extends('layouts.admin')
@section('nav-title')
    Booking
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Bookings</h3>
    
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>Completed Kilometer</th>
                                <th>Description</th>
                                <th>CustomerVehicle</th>
                                @can('booking-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($bookings->count() > 0)
                            @php($count  = 1)
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$booking->booking_date}}</td>
                                        <td>{{$booking->booking_time}}</td>
                                        <td>{{$booking->completed_km}}</td>
                                        <td>{{$booking->description}}</td>
                                        <td>{{$booking->customerVehicles->vehicle_no}}</td>
                                        @can('booking-action')
                                            <td class="action" >
                                                @if (!$booking->servicings->isEmpty())
                                                    <button class="btn btn-secondary" disabled="disabled">Servicing Started</button>
                                                @else
                                                    <form action="{{route('servicing.store')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                                        <button type='submit' class="btn btn-info">Start Servicing</button>
                                                    </form>
                                                @endif
                                            </td>
                                        @endcan
                                    </tr>
                                    @php($count++)
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="4" class="text-center"><i>No Entries in the table!!!</i></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->




    
@endsection