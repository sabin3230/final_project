@extends('layouts.admin')

@section('content')
    <!--Permission Component Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@lang('create')</h3>
        </div>
        <!--form start-->
        <form action="{{route('p_component.store')}}" method="post" role="form" class="">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="component">@lang('permission_component')</label>
                    <input type="text" name="component" id="component" class="form-control">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success">@lang('submit')</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection