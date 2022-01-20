@extends('layouts.admin')
@section('title')
    Contact
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Contact</h3>
    
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Subject</th>
                                <th> Message</th>
                                @can('contact-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($contacts->count() > 0)
                            @php($count  = 1)
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->subject}}</td>
                                        <td>{{$contact->message}}</td>

                                        @can('contact-action')
                                        <td class="action" >
                                            @can('contact-delete')
                                                <form action="{{route('contact.destroy', ['contact' => $contact->id])}}" method="post" >
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