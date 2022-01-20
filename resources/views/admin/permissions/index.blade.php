@extends('layouts.admin')
@section('title')
    Permission
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header d-flex">
                    <h3 class="box-title">Permissions</h3>
                    <a href="{{route('permission.create')}}" class="btn btn-success pull-right">Create New</a>
                </div>
                <div class="box-body">
                    <div class="row">
                        @foreach ($p_components as $p_component)
                            <div class="col-md-6 col-sm-12">
                                <h4 class="component-title">{{$p_component->component}} Component</h4>
                                <table id="" class="table table-bordered table-hover table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Permission</th>
                                            <th>Create</th>
                                            @can('permission-action')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($permissions->count() > 0)
                                            @php($count = 1)
                                            @foreach ($permissions as $permission)
                                                @if ($p_component->id == $permission->p_component_id)
                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td>{{$permission->permission}}</td>
                                                        <td>{{$permission->created_at}}</td>
                                                        @can('permission-action')
                                                            <td class="action">
                                                                @can('permission-edit')
                                                                    <a href="{{route('permission.edit', ['permission' => $permission->id])}}" data-toggle="tooltip"  class="btn btn-info btn-sm">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('permission-delete')
                                                                    <form action="{{route('permission.destroy', ['permission' => $permission->id])}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" data-toggle="tooltip"  class="btn btn-danger btn-sm">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            </td>
                                                        @endcan
                                                    </tr>
                                                    @php($count++)
                                                @endif
                                                
                                            @endforeach
                                        @else
                                            <tr>
                                                <th colspan="4" class="text-center"><i>No Entries in the table!!!</i></th>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                    {{-- <table id="" class="table table-bordered table-hover table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>@lang('global.permission.title')</th>
                                <th>@lang('permission_component.fields.component')</th>
                                <th>@lang('created')</th>
                                <th>@lang('action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($permissions->count() > 0)
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->permission}}</td>
                                        <td>{{$permission->component->component}}</td>
                                        <td>{{$permission->created_at->toFormattedDateString()}}</td>
                                        <td class="action">
                                            <a href="{{route('permission.edit', ['id' => $permission->id])}}" data-toggle="tooltip" title="@lang('global.app_edit')" class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{route('permission.destroy', ['id' => $permission->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" data-toggle="tooltip" title="@lang('global.app_trash')" class="btn btn-danger btn-sm">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="4" class="text-center"><i>@lang('no_entries_in_table')</i></th>
                                </tr>
                            @endif
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
@endsection