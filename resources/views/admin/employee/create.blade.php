@extends('layouts.admin')

@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create</h3>
        </div>
        <!--form start-->
        <form action="{{route('employee.store')}}" method="post" role="form" class="">
            @csrf
            <div class="box-body">
            <div class="form-group">
                    <label for="role">Role</label>
                    <input type="hidden" name="role_id" id="role" value="{{$role->id}}">
                    <input type="text" name="" id="role" value="{{$role->role}}" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control">
                </div>

                <div class="form-group">
                    <label for="alt_contact">Alternate Contact</label>
                    <input type="text" name="alt_contact" id="alt_contact" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                <label for="department">Department</label>
                    <select name="department_id" id="" class="form-control">
                        <option value="" disabled>-------------</option>
                    
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                       
                    </select>
                </div>

                
               
            </div>
            <div class="box-footer mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection