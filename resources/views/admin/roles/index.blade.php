@extends('layouts.admin')
@section('title')
    Roles
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header d-flex" style="justify-content: space-between; margin-bottom: 10px">
                    <h3 class="box-title">Roles</h3>
                    <a href="{{route('role.create')}}" class="btn btn-success">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Role ID</th>
                                <th>Role</th>
                                <th>Created At</th>
                                @can('role-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($roles->count() > 0)
                            @php($count  = 1)
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$role->role}}</td>
                                        <td>{{$role->created_at->toFormattedDateString()}}
                                        @can('role-action')
                                            <td class="action d-flex">
                                                @can('role-edit')
                                                    <a href="{{route('role.edit', $role->id)}}" data-toggle="tooltip" class="btn btn-info btn-sm pr-2" style>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('role-delete')
                                                    <form action="{{route('role.destroy', ['role' => $role->id])}}" method="post" >
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        @endcan
                                    </tr>
                                    @php($count++)
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