@extends('layouts.admin')
@section('nav-title')
  Issue
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Issue </h3>
                    <a href="{{route('issue.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Issue</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($issues->count() > 0)
                                
                                    @foreach($issues as $issue)
                                        @if ($issue->parent_id == Null)
                                            <tr>
                                                <td>
                                                
                                                        <h3>
                                                            <div class="parent d-inline-block">
                                                                {{$issue->issue}}
                                                            </div>
                                                            <div class="d-inline-block float-end">
                                                                <div class="action d-flex" style="column-gap:5px">

                                                                    @can('issue-action')
                                                                        @can('issue-edit')
                                                                            <a href="{{route('issue.edit', $issue->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                                                <i class="far fa-edit"></i>
                                                                            </a>
                                                                        @endcan
                                                                        <!-- <br> -->
                                                                        @can('issue-delete')
                                                                            <form action="{{route('issue.destroy', ['issue' => $issue->id])}}" method="post" >
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                                                    <i class="far fa-trash-alt"></i>
                                                                                </button>
                                                                            </form>
                                                                        @endcan
                                                                    @endcan
                                                                </div>
                                                            </div>
                                                        </h3>
                                                        <ul>
                                                            @foreach ($issue->children as $child)
                                                                <li class="" >
                                                                    <div class="child d-inline-block">
                                                                        {{$child->issue}}
                                                                    </div>
                                                                    <div class="d-inline-block float-end">
                                                                        <div class="action d-flex" style="column-gap:5px">

                                                                            @can('issue-action')
                                                                                @can('issue-edit')
                                                                                    <a href="{{route('issue.edit', $child->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                                                        <i class="far fa-edit"></i>
                                                                                    </a>
                                                                                @endcan
                                                                                <!-- <br> -->
                                                                                @can('issue-delete')
                                                                                    <form action="{{route('issue.destroy', ['issue' => $child->id])}}" method="post" >
                                                                                        @csrf
                                                                                        @method('delete')
                                                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                                                            <i class="far fa-trash-alt"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                @endcan
                                                                            @endcan
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <hr style="margin:0.5rem 0">
                                                            @endforeach
                                                        </ul>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                            @else
                                <tr>
                                    <th colspan="4" class="text-center"><i>No Entries in the table!!!</i></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->




    
@endsection