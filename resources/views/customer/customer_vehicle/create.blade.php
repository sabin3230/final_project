@extends('layouts.admin')
@section('nav-title')
    Customer Vehicle
@endsection

@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create</h3>
        </div>
        <!--form start-->
        <form action="{{route('customer-vehicle.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="vehicle_no">vehicle Number</label>
                    <input type="text" name="vehicle_no" id="vehicle_no"  class="form-control">
                </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="model_year">Model Year</label>
                    <input type="text" name="model_year" id="model_year"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="purchase_date">Purchase Date</label>
                    <input type="date" name="purchase_date" id="purchase_date"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="chassis_no">Chassis Number</label>
                    <input type="text" name="chassis_no" id="chassis_no" class="form-control">
                </div>
                <div class="form-group">
                    <label for="engine_no"> Engine Number</label>
                    <input type="text" name="engine_no" id="engine_no" class="form-control">
                </div>

                <select name="vehicle_model_id" id="">
                    <option value="">-------</option>
                    @foreach($vehicle_models as $vehiclemodel)
                        <option value="{{$vehiclemodel->id}}">{{$vehiclemodel->model_name}}</option>
                    @endforeach
                </select>
            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div>
@endsection
