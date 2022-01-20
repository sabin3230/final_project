@extends('layouts.admin')
@section('title')
    Create New Role
@endsection
@section('content')
    <!--Role Create Box Starts Here-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Create New Role</h3>
        </div>
        <div class="box-body">
            <!--Form Start-->
            <form action="{{route('role.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" class="form-control">
                </div>
                <!--Show Permissions According to the Permission Component-->
                <div class="row">
                    @foreach ($p_components as $component)
                        <div class="col-md-4">
                            <label for=""><b>{{$component->component}}</b></label>
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
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div><!--Role Create Box Ends Here-->
@endsection