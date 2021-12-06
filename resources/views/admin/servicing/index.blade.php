@extends('layouts.admin')
@section('nav-title')
  Servicing
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Servicing</h3>
                    <a href="{{route('servicing.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Assign_to</th>
                                <th>Start Time</th>
                                <th>End Time</th> 
                                <th>Remarks</th> 
                                <th>Next Servicing</th> 
                                <th>Employee</th>   
                                <th>Booking</th>         
                                @can('servicing-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($servcings->count() > 0)
                            @php($count  = 1)
                                @foreach ($servicings as $servicing)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$servicing->assign_to}}</td>
                                        <td>{{$servicing->start_time}}</td>
                                        <td>{{$servicing->end_time}}</td>
                                        <td>{{$servicing->remarks}}</td>
                                        <td>{{$servicing->next_servicing}}</td>
                                        <td>{{$servicing->employee->name}}</td>
                                        <td>{{$servicing->booking->name}}</td>
                                        
                                        @can('servicing-action')
                                            <td class="action" >
                                                @can('servicing-edit')
                                                    <a href="{{route('servicing.edit', $servicing->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                <!-- <br> -->
                                                @can('servicing-delete')
                                                    <form action="{{route('servicing.destroy', ['servicing' => $servicing->id])}}" method="post" >
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