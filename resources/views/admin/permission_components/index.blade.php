@extends('layouts.admin')
@section('title')
    App Component
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header  d-flex" style="justify-content: space-between; margin-bottom: 10px">
                    <h3 class="box-title">Permission Component</h3>
                    <a href="{{route('p_component.create')}}" class="btn btn-success pull-right">Create New</a>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Permission Component</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($components->count() > 0)
                                @php ($count = 1)
                                @foreach ($components as $component)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$component->component}}</td>
                                        <td class="action">
                                            <a href="{{route('p_component.edit', ['p_component' => $component->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{route('p_component.destroy', ['p_component' => $component->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php ($count++)
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="3" class="text-center font-italic" ><i>No Entries in the table!!!</i></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection