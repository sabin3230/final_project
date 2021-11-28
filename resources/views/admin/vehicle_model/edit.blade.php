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
            <form action="{{route('vehicle-model.update', ['vehicle-model' => $vehicle-model->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                <div class="form-group">
                    <label for="name">Model Name</label>
                    <input type="text" name="model_name" id="model_name" value="{{$vehicle-model->model_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="engine-capacity">Engine Capacity</label>
                    <input type="text" name="engine_capacity" id="engine_capacity" value="{{$vehicle-model->engine_capacity}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color" value="{{$vehicle-model->color}}" class="form-control">
                </div>
                
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection