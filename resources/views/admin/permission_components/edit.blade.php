@extends('layouts.admin')

@section('content')
        <!--Permission Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit: {{$p_component->component}}</h3>
            </div>
            <!--form start-->
            <form action="{{route('p_component.update', ['p_component' => $p_component->id])}}" method="post" role="form" class="">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Permission Component</label>
                        <input type="text" name="component" id="component" value="{{$p_component->component}}" class="form-control">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success" style="margin-top: 20px">Update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection