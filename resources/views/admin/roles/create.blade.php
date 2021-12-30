@extends('layouts.admin')

@section('content')
    <!--Role Create Box Starts Here-->
    <div class="box">
        <div class="box-header">
            @lang('create')
        </div>
        <div class="box-body">
            <!--Form Start-->
            <form action="{{route('role.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="role">@lang('Users')</label>
                    <input type="text" name="role" id="role" class="form-control">
                </div>
                <!--Show Permissions According to the Permission Component-->
                <div class="row">
                    @foreach ($p_components as $component)
                        <div class="col-md-4">
                            <label for="">{{$component->component}}</label>
                            @foreach ($permissions as $permission)
                                @if ($permission->p_component_id == $component->id)
                                    <div class='checkbox'>
                                        <label for=""><input type='checkbox' name="permission[]" value="{{$permission->id}}">{{$permission->permission}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">@lang('submit')</button>
                </div>
            </form>
        </div>
    </div><!--Role Create Box Ends Here-->
@endsection