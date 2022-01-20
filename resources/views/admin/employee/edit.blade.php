@extends('layouts.admin')
@section('title')
    Edit {{$employee->user->first_name}}
@endsection
@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit: {{$employee->user->first_name}}</h3>
        </div>
        <!--form start-->
        <form action="{{route('employee.update',['employee' => $employee->id])}}" method="post" role="form" class="">
            @csrf
            @method('put')
            <div class="box-body">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{$employee->user->first_name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name"  value="{{$employee->user->last_name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{$employee->user->address}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{$employee->user->email}}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" id="contact" value="{{$employee->user->contact}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="alt_contact">Alternate Contact</label>
                    <input type="text" name="alt_contact" id="alt_contact" value="{{$employee->user->alt_contact}}" class="form-control">
                </div>

                
                <label for="">Department</label>
                <select name="department_id" id="" class="form-control">
                    <option value="{{$employee->department->id}}">{{$employee->department->department_name}}</option>
                    @foreach($departments as $department)
                        @if($employee->department->id != $department->id)
                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                        @endif
                    @endforeach
                </select>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="hidden" name="role_id" id="role" value="{{$employee->user->role->id}}">
                    <input type="text" name="" id="role" value="{{$employee->user->role->role}}" class="form-control" disabled>
                </div>
               
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success" style="margin-top: 20px">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection