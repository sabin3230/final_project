@extends('layouts.admin')
@section('title')
    Create New Branch
@endsection

@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create New Branch</h3>
        </div>
        <!--form start-->
        <form action="{{route('branch.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Branch Name</label>
                    <input type="text" name="branch_name" id="branch_name"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input type="text" name="contact_no" id="contact_no" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email"> Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="open_date">Open Date</label>
                    <input type="date" name="open_date" id="open_date"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="" style="margin-top: 10px">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                
                <label for="">Organization</label>
                <select name="org_id" id="" style="margin-top: 10px">
                    <option value="">-------</option>
                    @foreach($organizations as $organization)
                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                    @endforeach
                </select>
            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection
