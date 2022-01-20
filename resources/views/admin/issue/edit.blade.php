@extends('layouts.admin')
@section('title')
    Edit {{$issue->parent->issue}}
@endsection

@section('content')
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit: {{$issue->parent->issue}}</h3>
            </div>
            <!--form start-->
            <form action="{{route('issue.update', ['issue' => $issue->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="issue">Issue</label>
                        <input type="text" name="issue" id="issue"  value="{{"$issue->issue"}}"  class="form-control">
                    </div>
           
                
                    <label for="">Parent Issue</label>
                    <select name="parent_id" class ='form-control'id="">
                        <option value="{{$issue->parent_id}}">{{$issue->parent->issue}}</option>
                        @if ($issues->count() > 0)
                            @foreach($issues as $parent_issue)
                                @if ($parent_issue->id != $issue->parent_id)
                                    <option value="{{$parent_issue->id}}">{{$parent_issue->issue}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-success" style="margin-top: 20px">update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection