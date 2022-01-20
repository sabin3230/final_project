@extends('layouts.admin')
@section('title')
    Create New Organization
@endsection
@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create New Organization</h3>
        </div>
        <!--form start-->
        <form action="{{route('org.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
            <div class="form-group">
                    <label for="component">Logo</label>
                    <input type="file" name="logo" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Organization Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Alternative Contact</label>
                    <input type="text" name="alt_contact" id="alt_contact" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Facebook link</label>
                    <input type="text" name="facebook_link" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">instagram link</label>
                    <input type="text" name="instagram_link" id="instagram_link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection