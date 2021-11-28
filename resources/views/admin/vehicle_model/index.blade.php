@extends('layouts.admin')
@section('nav-title')
   Vehicle Model
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Vehicle Model</h3>
                    <a href="{{route('Vehicle-model.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Mode Name</th>
                                <th>Engine Capacity</th>
                                <th>Color</th>            
                                @can('vehicle-model-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orgs->count() > 0)
                            @php($count  = 1)
                                @foreach ($orgs as $org)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td><img src="{{url('admin_assets/images/')}}/{{$org->logo}}" alt="" width="100"></td>
                                        <td>{{$vehicle-model->model_name}}</td>
                                        <td>{{$vehicle-model->engine_capacity}}</td>
                                        <td>{{$vehicle-model->color}}</td>
                                        
                                        @can('vehicle-model-action')
                                            <td class="action" >
                                                @can('vehicle-model-edit')
                                                    <a href="{{route('org.edit', $vehicle-model->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                <!-- <br> -->
                                                @can('org-delete')
                                                    <form action="{{route('vehicle-model.destroy', ['vehicle-model' => $vehcile-model->id])}}" method="post" >
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