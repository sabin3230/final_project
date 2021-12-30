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
                    <a href="{{route('booking.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
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
                                        
                                        @can('booking-action')
                                            <td class="action" >
                            
                                                @can('booking-delete')
                                                    <form action="{{route('booking.destroy', ['booking' => $booking->id])}}" method="post" >
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
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