@extends('layouts.admin')
@section('title')
    Create New Department
@endsection
@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create New Department</h3>
        </div>
        <!--form start-->
        <form action="{{route('department.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" name="department_name" id="dname"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Contact Number</label>
                    <input type="text" name="contact_no" id="contact_no"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_no">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
               
                
            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection
