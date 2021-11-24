@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('Add users')</h3>
                    <a href="{{route('role.create')}}" class="btn btn-success pull-right">@lang('new')</a>
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
                                            <td class="action">
                                                @can('role-edit')
                                                    <a href="{{route('role.edit', $role->id)}}" data-toggle="tooltip" title="@lang('global.app_edit')" class="btn btn-info btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('role-delete')
                                                    <form action="{{route('role.destroy', ['role' => $role->id])}}" method="post" >
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="@lang('global.app_delete')">
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
                                    <th colspan="4" class="text-center"><i>@lang('global.app_no_entries_in_table')</i></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->




    
@endsection