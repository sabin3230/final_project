@extends('layouts.admin')
@section('nav-title')
  Customer Vehicle
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Customer Vehicle </h3>
                    <a href="{{route('customer-vehicle.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Vehicle Number</th>
                                <th>Mode Year</th>
                                <th>Purachase Date</th>
                                <th>Chassis Number</th> 
                                <th>Engine Number</th>      
                                <th>Customer</th>  
                                <th>Vehicle Model</th>       
                                @can('customer-vehicle-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($customerVehicles->count() > 0)
                            @php($count  = 1)
                                @foreach ($customerVehicles as $customer_vehicle)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$customer_vehicle->vehicle_no}}</td>
                                        <td>{{$customer_vehicle->model_year}}</td>
                                        <td>{{$customer_vehicle->purchase_date}}</td>
                                        <td>{{$customer_vehicle->chassis_no}}</td>
                                        <td>{{$customer_vehicle->engine_no}}</td>
                                        <td>{{$customer_vehicle->customer->user->first_name}}</td>
                                        <td>{{$customer_vehicle->vehiclemodels->model_name}}</td>

                                        @can('customer-vehicle-action')
                                            <td class="action" >
                                                @can('customer-vehicle-edit')
                                                    <a href="{{route('customer-vehicle.edit', $customer_vehicle->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                <!-- <br> -->
                                                @can('customer-vehicle-delete')
                                                    <form action="{{route('customer-vehicle.destroy', ['customer_vehicle' => $customer_vehicle->id])}}" method="post" >
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