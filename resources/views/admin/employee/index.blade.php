@extends('layouts.admin')
@section('nav-title')
    Employee
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Employees</h3>
                    <a href="{{route('employee.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Department_id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Alternate Contact</th>
                                @can('employee-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($employees->count() > 0)
                            @php($count  = 1)
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$employee->department_id}}</td>
                                        <td>{{$employee->user->first_name}}</td>
                                        <td>{{$employee->user->last_name}}</td>
                                        <td>{{$employee->user->address}}</td>
                                        <td>{{$employee->user->email}}</td>
                                        <td>{{$employee->user->contact}}</td>
                                        <td>{{$employee->user->alt_contact}}</td>
                                        
                                        @can('employee-action')
                                            <td class="action" >
                                                @can('employee-edit')
                                                    <a href="{{route('employee.edit', $employee->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                <!-- <br> -->
                                                @can('employee-delete')
                                                    <form action="{{route('employee.destroy', ['employee' => $employee->id])}}" method="post" >
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