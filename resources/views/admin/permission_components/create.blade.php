@extends('layouts.admin')

@section('content')
    <!--Permission Component Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create New Permission Component</h3>
        </div>
        <!--form start-->
        <form action="{{route('p_component.store')}}" method="post" role="form" class="">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="component">Permission Component</label>
                    <input type="text" name="component" id="component" class="form-control">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success" style="margin-top: 20px" >Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection