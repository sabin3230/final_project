@extends('layouts.admin')
@section('nav-title')
    Department
@endsection

@section('content')
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit</h3>
            </div>
            <!--form start-->
            <form action="{{route('department.update', ['department' => $departments->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" name="department_name" id="dname" value="{{$departments->department_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input type="text" name="contact_no" id="contact_no" value="{{$departments->contact_no}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{$departments->email}}" class="form-control">
                </div>

                
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection