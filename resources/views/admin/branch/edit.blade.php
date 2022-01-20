@extends('layouts.admin')
@section('nav-title')
    Branch
@endsection

@section('content')

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit: {{$branchs->branch_name}}</h3>
            </div>
            <!--form start-->
            <form action="{{route('branch.update', ['branch' => $branchs->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                <div class="form-group">
                    <label for="name">Branch Name</label>
                    <input type="text" name="branch_name" id="branch_name" value="{{$branchs->branch_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{$branchs->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input type="text" name="contact_no" id="contact_no" value="{{$branchs->contact_no}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="open_date">Open Date</label>
                    <input type="date" name="open_date" id="open_date" value="{{$branchs->open_date}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="" style="margin-top: 10px">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Organization</label>
                    <select name="organization_id" id="" style="margin-top: 10px">
                    <option value="{{$branchs->organization_id}}">{{$branchs->organization->name}}</option>
                    @foreach($organizations as $organization)
                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                    @endforeach
                </select>
                </div>
                
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success" style="margin-top: 20px">update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection