@extends('layouts.admin')

@section('content')
        <!--Permission Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">@lang('edit') {{$p_component->component}}:</h3>
            </div>
            <!--form start-->
            <form action="{{route('p_component.update', ['p_component' => $p_component->id])}}" method="post" role="form" class="">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">@lang('permission_component')</label>
                        <input type="text" name="component" id="component" value="{{$p_component->component}}" class="form-control">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">@lang('update')</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection