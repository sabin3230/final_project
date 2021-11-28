@extends('layouts.admin')

@section('content')
    <!--Permission Edit Box Starts Here-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('edit') @lang('permission'): {{$permission->permission}}</h3>
        </div>
        <!--Box Body-->
        <div class="box-body">
            <!--Form Starts-->
            <form action="{{route('permission.update', ['permission' => $permission->id])}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="permission">Permission</label>
                    <input type="text" id="permission" name="permission" value="{{$permission->permission}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Permission Component</label>
                    <select name="component" id="component" class="form-control">
                        <option value="{{$permission->p_component_id}}">{{$permission->component->component}}</option>
                        @foreach ($p_components as $component)
                            @if ($component->id != $permission->p_component_id)
                                <option value="{{$component->id}}">{{$component->component}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!--Permission Edit Box Ends Here-->
@endsection