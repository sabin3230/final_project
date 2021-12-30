@extends('layouts.admin')
@section('nav-title')
  RoyalRide
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title mb-3">Servicing</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Booking</th>
                                <th>Start Time</th>
                                <th>End Time</th> 
                                <th>Customer Advise</th> 
                                <th>Next Servicing</th> 
                                <th>Status</th> 
                                <th>Assign To</th>   
     
                                @can('servicing-action')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($servicings->count() > 0)
                            @php($count  = 1)
                                @foreach ($servicings as $servicing)
                                    <tr>
                                        <td>{{$count}}</td>
                            
                                        <td id="start_{{$servicing->id}}">
                                            {{--needs to refresh when ajax is success--}}
                                            @if($servicing->start_time == null)
                                                <button class="btn btn-default" type="button" id="start_task_{{$servicing->id}}" value="{{$servicing->id}}" onclick="getStart(this.value);">
                                                    <i class="fa fa-play"></i>
                                                </button>
                                            @else
                                                {{ ($servicing->start_time) }}
                                            @endif
                                        </td>
                                        <td id="end_{{$servicing->id}}">
                                                
                                            @if($servicing->end_time == null)
                                                <button class="btn btn-default" type="button" id="end_task_{{$servicing->id}}" value="{{$servicing->id}}" data-value="{{$servicing->start_time}}" onclick="getEnd(this.value);">
                                                    <i class="fa fa-car"></i>
                                                </button>
                                            @else
                                                {{ ($servicing->end_time) }}
                                            @endif
                                        </td>
                                        <td class="remarks">{{$servicing->bookings->description}}</td>
                                        <td class="next-servicing">{{$servicing->next_servicing}}</td>
                                        
                                        <td id="success_{{$servicing->id}}">
                                            @if($servicing->status == 'completed')
                                                Completed
                                            @elseif($servicing->status == 'servicing')
                                                Servicing
                                            @else 
                                                Pending
                                            @endif
                                        </td>
                                        <td id="assigned_{{$servicing->id}}">
                                            <select name="assign_to" id="assign_to_{{$servicing->id}}" class="form-control" onchange="getAssign(this.id)">
                                                <option selected disabled> Select One </option>
                                                @foreach($employees as $employee)
                                                    <option id="{{$employee->id}}" value="{{$employee->id}}" {{($employee->id == $servicing->employee_id)?'selected':''}}>{{$employee->user->first_name}} {{$employee->user->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </td> 

                                        

                                        @can('servicing-action')
                                            <td class="action d-flex" style="column-gap:5px" >
                                                <button type="button" class="btn btn-primary issue-modal"  data-bs-toggle="modal" data-value="{{$servicing->id}}" data-bs-target="#issueModal" >
                                                    Issues
                                                  </button>
                                                @can('servicing-delete')
                                                    <form action="{{route('servicing.destroy', ['servicing' => $servicing->id])}}" method="post" >
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                         Delete
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

    <div class="modal fade" id="issueModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check Issue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check d-flex flex-wrap" style="column-gap: 20px;">
                        
                    </div>
                    
                    <form action="" method='post' class='servicing-remark'>
                        <input type="hidden" name="id" value='' id='servicing_id'>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" data-toggle="tooltip" title="delete">
                            Submit
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>


    
@endsection

@section('js')
    <script>
        let modal = $('.issue-modal');
        let servicing_id = $('#servicing_id');

        $('.servicing-remark').on('submit', (e) => {
            e.preventDefault();
            // console.log( $($(this)+' input[type=hidden]').val())
            $.ajax({
                type: 'post',
                data: {'id':  $('.servicing-remark input[type=hidden]').val(),  
                        'remarks':  $('.servicing-remark textarea').val(),
                        '_token': '{{ csrf_token()}}',
                        },
                // data: $(this).find('input').serialize(),
                url: 'servicing/issue/remarks/'+servicing_id.val(),
                dataType: 'json',
                // processData: false,
                success: function(response){
                    $('#issueModal').modal('hide');
                    alert(response.success.message);
                }, error: function(error){
                    alert(error)
                }
            })
        })
        
        function getAssign(id) {
            var actual  = id.slice(10, );
            var selectedValue = $('#'+id).children("option:selected").val();
            $.ajax({
                type: 'post',
                url: 'servicing/assign/'+actual,
                data: {'id' : actual, 'value':selectedValue ,_token: '{{csrf_token()}}'},
                dataType: 'json',
                success: function(response){
                    alert(response.success.message)
                    $('#assign_to'+id).load(" #assign_to"+id);
                },
                error: function (data) {
                    alert('Something went wrong')
                    console.log(data);
                }
            });

        }

        function getStart(data) {
            var selected = data;
            $.ajax({
                type: 'post',
                url: 'servicing/start/'+selected,
                data: {'id' : selected, _token: '{{csrf_token()}}'},
                dataType: 'json',
                success: function(response){
                    $('#success_'+selected).load(" #success_"+selected);
                    $('#start_'+selected).load(" #start_"+selected);
                    $('#end_task_'+selected).data('value',response.success.start_time);
                    console.log(response.success.start_time);
                    alert(response.success.message)
                },
                error: function (response) {
                    alert(response.responseJSON.error.message)
                }
            });
        }
        function getEnd(data) {
            var selected = data;
            let button = $('#end_task_'+selected);
            let start_time = button.data('value');
            if(start_time != ''){
                $.ajax({
                    type: 'post',
                    url: 'servicing/end/'+selected,
                    data: {'id' : selected, _token: '{{csrf_token()}}'},
                    dataType: 'json',
                    success: function(response){
                        console.log(response)
                        $('#success_'+selected).load(" #success_"+selected);
                        $('#end_'+selected).load(" #end_"+selected);
                        $('#end_'+selected).parent().children('.next-servicing').text((response.success.next_servicing).split('T')[0]);
                        alert(response.success.message)
                    },
                    error: function (response) {
                        alert(response.responseJSON.error.message)
                    }
                });
            }else{
                alert('Task Not Started yet!!!')
            }
        }
            
        modal.click(function(e){
            let id = $(this).data('value');
            servicing_id.val(null)
            servicing_id.val(id)
            checkIssue(id);
        });
        function checkIssue(id){
            let modal_body = $('.modal-body .d-flex')
            $.ajax({
                url:'servicing/issue/'+id,
                type:'post',
                data: {'id' : id, _token: '{{csrf_token()}}'},
                dataType: 'json',
                success: function(response){
                    // console.log(modal_body)
                    modal_body.html('');
                    $('.modal-body .servicing-remark textarea').val(response.remark)
                    $.each(response.data, function(i, value){
                        
                        if(value.parent_id == null){
                            modal_body.append(
                                $('<div>', {class: 'issue'})
                            )
                            let issue = $('.issue')
                            issue.append(
                                $('<p>', {text: value.issue})
                            )
                            $.each(response.data, function(a,b){
                                
                                if(value.id == b.parent_id){
                                    // console.log('hello')
                                    issue.append(
                                        $('<ul>').append(
                                            $('<li>',{class: 'd-block', text: b.issue})
                                        )

                                    )
                                }
                            })
                        }
                    });
                },
                error: function (response) {
                    alert(response.responseJSON.error.message)
                }
            })
            
        }

            
    </script>
@endsection