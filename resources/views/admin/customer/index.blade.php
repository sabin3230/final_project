@extends('layouts.admin')
@section('title')
    Customer
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Customer</h3>

                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Alternate Contact</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @if ($customers->count() > 0)
                            @php($count  = 1)
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$customer->user->first_name}}</td>
                                        <td>{{$customer->user->last_name}}</td>
                                        <td>{{$customer->user->address}}</td>
                                        <td>{{$customer->user->email}}</td>
                                        <td>{{$customer->user->contact}}</td>
                                        <td>{{$customer->user->alt_contact}}</td>
                                        
                                    
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