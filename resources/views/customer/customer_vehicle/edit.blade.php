@extends('layouts.admin')
@section('nav-title')
    Vehicel Model
@endsection

@section('content')
        <!--Permission Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit</h3>
            </div>
            <!--form start-->
            <form action="{{route('customer-vehicle.update', ['customer_vehicle' => $customerVehicle->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">

                <div class="form-group">
                    <label for="vehicle_no">vehicle Number</label>
                    <input type="text" name="vehicle_no" id="vehicle_no" value="{{$customerVehicle->vehicle_no}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Model Year</label>
                    <input type="text" name="model_year" id="model_yar" value="{{$customerVehicle->model_year}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="purchase_date">Purchase Date</label>
                    <input type="date" disable  name="purchase_date" value="{{$customerVehicle->purchase_date}}" id="purchase_date"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="chassis_no">Chassis Number</label>
                    <input type="text" name="chassis_no" id="chassis_no" value="{{$customerVehicle->chassis_no}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="purchase-date">Engine Capacity</label>
                    <input type="text" name="engine_no" id="engine_no" value="{{$customerVehicle->engine_no}}" class="form-control">
                </div>
                
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection