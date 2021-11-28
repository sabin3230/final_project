@extends('layouts.admin')
@section('nav-title')
    Vehicle Models
@endsection
@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create</h3>
        </div>
        <!--form start-->
        <form action="{{route('vehicle-model.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Model Name</label>
                    <input type="text" name="model_name" id="model_name"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="engine-capacity">Engine Capacity</label>
                    <input type="text" name="engine_capacity" id="engine_capacity"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color"  class="form-control">
                </div>
                <select name="organization_id" id="">
                    <option value="">-------</option>
                    @foreach($organizations as $organization)
                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                    @endforeach
                </select>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection