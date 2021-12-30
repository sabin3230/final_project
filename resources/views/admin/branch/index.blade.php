@extends('layouts.admin')
@section('nav-title')
    Branch
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Branchs</h3>
                    <a href="{{route('branch.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Branch Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Open Date</th>
                                <th>Status</th>
                            
                                <th>Organization</th>
                                @can('branch-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($branchs->count() > 0)
                            @php($count  = 1)
                                @foreach ($branchs as $branch)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$branch->branch_name}}</td>
                                        <td>{{$branch->address}}</td>
                                        <td>{{$branch->contact_no}}</td>
                                        <td>{{$branch->email}}</td>
                                        <td>{{$branch->open_date}}</td>
                                        <td>{{$branch->status}}</td>
                                        <td>{{$branch->organization->name}}</td>
                                        @can('branch-action')
                                            <td class="action" >
                                                @can('branch-edit')
                                                    <a href="{{route('branch.edit', $branch->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                <!-- <br> -->
                                                @can('branch-delete')
                                                    <form action="{{route('branch.destroy', ['branch' => $branch->id])}}" method="post" >
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