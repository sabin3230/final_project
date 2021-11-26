@extends('layouts.admin')
@section('nav-title')
    Organization
@endsection

@section('content')
        <!--Permission Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit</h3>
            </div>
            <!--form start-->
            <form action="{{route('org.update', ['org' => $org->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                <div class="form-group">
                    <label for="component">Logo</label>
                    <input type="file" name="logo" id="email" value="{{$org->logo}}" class="form-control">
                    <img src="{{url('admin_assets/images/')}}/{{$org->logo}}" alt="" width="100">
                </div>
                <div class="form-group">
                    <label for="name">Organization Name</label>
                    <input type="text" name="name" id="name" value="{{$org->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Address</label>
                    <input type="text" name="address" id="address" value="{{$org->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Contact</label>
                    <input type="text" name="contact" id="contact" value="{{$org->contact}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Alternative Contact</label>
                    <input type="text" name="alt_contact" id="alt_contact" value="{{$org->alt_contact}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Email</label>
                    <input type="email" name="email" id="email" value="{{$org->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Alternative email</label>
                    <input type="email" name="alt_email" id="alt_email" value="{{$org->alt_email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Facebook link</label>
                    <input type="text" name="facebook_link" id="address" value="{{$org->facebook_link}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">instagram link</label>
                    <input type="text" name="instagram_link" id="instagram_link" value="{{$org->instagram_link}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="component">Description</label>
                    <textarea name="description" id="description" value="" class="form-control">{{$org->description}}</textarea>
                </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection