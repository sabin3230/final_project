@extends('layouts.admin')
@section('nav-title')
   Department
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Department</h3>
                    <a href="{{route('department.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Department Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>           
                                @can('department-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>

                        <tbody>
                            @if ($departments->count() > 0)
                            @php($count  = 1)
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$department->department_name}}</td>
                                        <td>{{$department->contact_no}}</td>
                                        <td>{{$department->email}}</td>
                                        
                                        @can('department-action')
                                            <td class="action" >
                                                @can('department-edit')
                                                    <a href="{{route('department.edit', $department->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                <!-- <br> -->
                                                @can('vehicle-model-delete')
                                                    <form action="{{route('department.destroy', ['department' => $department->id])}}" method="post" >
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
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