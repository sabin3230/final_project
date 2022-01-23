@extends('layouts.admin')
@section('title')
    Attendance
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title mb-3">Attendance</h3>
            </div>
            <div class="box-body">
                <table id="dataList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($count  = 1)
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$employee->department->department_name}}</td>
                                <td>{{$employee->user->first_name}} {{$employee->user->last_name}}</td>
                                <td>{{$employee->user->address}}</td>
                                <td>{{$employee->user->contact}}</td>
                            <td>
                                @foreach ($attendances as $attendance)
                                    @if ($attendance->employee_id == $employee->id)
                                        <b style="color:#00FF00">Present</b>
                                       @break
                                    @endif
                                @endforeach
                            </td>
                            
                        </tr>
                        @php($count++)
                        @endforeach
                        
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->



@endsection