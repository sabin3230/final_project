@extends('layouts.admin')
@section('nav-title')
    Create Issue
@endsection

@section('content')
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create</h3>
        </div>
        <!--form start-->
        <form action="{{route('issue.store')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="issue">Issue</label>
                    <input type="text" name="issue" id="issue"  class="form-control">
                </div>
       

                <select name="parent_id" id="">
                    <option value="">-------</option>
                    @foreach($issues as $issue)
                        <option value="{{$issue->id}}">{{$issue->issue}}</option>
                    @endforeach
                </select>
            <div class="box-footer">
                <button type="submit" class="btn btn-success mt-4">Submit</button>
            </div>
        </form>
    </div>
@endsection
