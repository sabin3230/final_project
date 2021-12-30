@extends('layouts.admin')
@section('nav-title')
    Organization
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Organizations</h3>
                    <a href="{{route('org.create')}}" class="btn btn-success mb-4 float-end">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Logo</th>
                                <th>Org Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Alt Contact</th>
                                <th>Email</th>
                                <th>Alt Email</th>
                                <th>FB Link</th>
                                <th>Insta Link</th>
                                <th>Description</th>
                                @can('org-action')
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
                                        <td>{{$org->name}}</td>
                                        <td>{{$org->address}}</td>
                                        <td>{{$org->contact}}</td>
                                        <td>{{$org->alt_contact}}</td>
                                        <td>{{$org->email}}</td>
                                        <td>{{$org->alt_email}}</td>
                                        <td>{{$org->facebook_link}}</td>
                                        <td>{{$org->instagram_link}}</td>
                                        <td>{{$org->description}}</td>
                                        
                                        @can('org-action')
                                            <td class="action" >
                                                @can('org-edit')
                                                    <a href="{{route('org.edit', $org->id)}}" data-toggle="tooltip" title="edit" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                           
                                                @can('org-delete')
                                                    <form action="{{route('org.destroy', ['org' => $org->id])}}" method="post" >
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