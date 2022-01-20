@extends('layouts.admin')
@section('title')
   Feedback
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Feedback</h3>
    
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th> Description</th>
                                <th>Servicing ID</th>
                                @can('feedback-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($feedbacks->count() > 0)
                            @php($count  = 1)
                                @foreach ($feedbacks as $feedback)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$feedback->description}}</td>
                                        <td>{{$feedback->servicing->id}}</td>

                                        @can('feedback-delete')
                                        <td class="action" >
                                            <form action="{{route('feedback.destroy', ['feedback' => $feedback->id])}}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
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