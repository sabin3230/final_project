@extends('layouts.admin')
@section('title')
    Vehicle Booking
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Vehicle Booking</h3>
    
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Alternate Contact</th>
                                <th>Model Name</th>
                                <th>Engine Capacity </th>
                                <th>Color</th>
                                @can('booking-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($vehicleModel->count() > 0)
                            @php($count  = 1)
                                @foreach ($vehicleModel as $vehiclebooking)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$vehiclebooking->first_name}}</td>
                                        <td>{{$vehiclebooking->last_name}}</td>
                                        <td>{{$vehiclebooking->address}}</td>
                                        <td>{{$vehiclebooking->email}}</td>
                                        <td>{{$vehiclebooking->contact}}</td>
                                        <td>{{$vehiclebooking->alt_contact}}</td>
                                        <td>{{$vehiclebooking->vehiclemodel->model_name}}</td>
                                        <td>{{$vehiclebooking->vehiclemodel->engine_capacity}}</td>
                                        <td>{{$vehiclebooking->vehiclemodel->color}}</td>
                                        @can('booking-action')
                                            <td class="action" >
                                                @can('vehicle-model-delete')
                                                    <form action="{{route('vehiclebooking.destroy', ['vehiclebooking' => $vehiclebooking->id])}}" method="post" >
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