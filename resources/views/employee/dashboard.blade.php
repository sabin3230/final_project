@extends('layouts.admin')

@section('content')
{{-- @php(dd($servicings)) --}}
<div class="container">

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Present</div>
                    <div class="number">{{$present}}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                    </div>
                </div>
                <i class='bx bx-cart-alt cart'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Absent</div>
                    <div class="number">{{$absent}}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                    </div>
                </div>
                <i class='bx bx-cart-alt cart'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Servicing Done</div>
                    <div class="number">{{$servicing_count}}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                    </div>
                </div>
                <i class='bx bx-cart-alt cart'></i>
            </div>
        </div>   

    </div>
    
    <div class="container">
        <div class="box-header">
        <h3 class="box-title"> Servicing</h3>
        </div>
    
        <div class="box-body">
            <table action="{{route('servicing.store')}}"  class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Booking</th>
                        <th>Customer</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Customer Advise</th>
                        <th>Next Servicing</th>
                        <th>Status</th>
                        @can('servicing-action')
                        <th>Action</th>
                    @endcan
                    
                    </tr>
                </thead>
                <tbody>
                    @if ($servicings->count() > 0)
                        @php($count = 1)
                        @foreach ($servicings as $servicing)
                            <tr>
                                <td>{{ $count }}</td>

                                <td id="booking">{{ $servicing->bookings->id }}</td>
                                <td id="customer_name">
                                    {{ $servicing->bookings->customerVehicles->customer->user->first_name}} 
                                    {{ $servicing->bookings->customerVehicles->customer->user->last_name }} - 
                                    {{ $servicing->bookings->customerVehicles->Customer->user->contact }}
                                </td>
                               
                            

                                <td id="start_{{ $servicing->id }}">
                                    {{-- needs to refresh when ajax is success --}}
                                    @if ($servicing->start_time == null)
                                        <button class="btn btn-default" type="button"
                                            id="start_task_{{ $servicing->id }}" value="{{ $servicing->id }}"
                                            onclick="getStart(this.value);">
                                            <i class="fa fa-play"></i>
                                        </button>
                                    @else
                                        {{ $servicing->start_time }}
                                    @endif
                                </td>
                                <td id="end_{{ $servicing->id }}">

                                    @if ($servicing->end_time == null)
                                        <button class="btn btn-default" type="button"
                                            id="end_task_{{ $servicing->id }}" value="{{ $servicing->id }}"
                                            data-value="{{ $servicing->start_time }}"
                                            onclick="getEnd(this.value);">
                                            <i class="fa fa-car"></i>
                                        </button>
                                    @else
                                        {{ $servicing->end_time }}
                                    @endif
                                </td>
                                <td class="remarks">{{ $servicing->bookings->description }}</td>
                                <td class="next-servicing">{{ $servicing->next_servicing }}</td>

                                <td id="success_{{ $servicing->id }}">
                                    @if ($servicing->status == 'completed')
                                        Completed
                                    @elseif($servicing->status == 'servicing')
                                        Servicing
                                    @else
                                        Pending
                                    @endif
                                </td>

                                @can('servicing-action')
                                    <td class="action d-flex" style="column-gap:5px">
                                        <button type="button" class="btn btn-primary issue-modal" data-bs-toggle="modal"
                                            data-value="{{ $servicing->id }}" data-bs-target="#issueModal">
                                            Issues
                                        </button>
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
        </div>
    </div>

    <div class="modal fade" id="issueModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check Issue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check" id="inner_modal_body" style="column-gap: 20px;">

                        <p id="demo"></p>


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
                data: {
                    'id': $('.servicing-remark input[type=hidden]').val(),
                    'remarks': $('.servicing-remark textarea').val(),
                    '_token': '{{ csrf_token() }}',
                },
                // data: $(this).find('input').serialize(),
                url: '/admin/servicing/issue/remarks/' + servicing_id.val(),
                dataType: 'json',
                // processData: false,
                success: function(response) {
                    $('#issueModal').modal('hide');
                    alert(response.success.message);
                },
                error: function(error) {
                    alert(error)
                }
            })
        })
    function getStart(data) {
            var selected = data;
            $.ajax({
                type: 'post',
                url: '/admin/servicing/start/' + selected,
                data: {
                    'id': selected,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    $('#success_' + selected).load(" #success_" + selected);
                    $('#start_' + selected).load(" #start_" + selected);
                    $('#end_task_' + selected).data('value', response.success.start_time);
                    console.log(response.success.start_time);
                    alert(response.success.message)
                },
                error: function(response) {
                    alert(response.responseJSON.error.message)
                }
            });
        }

        function getEnd(data) {
            var selected = data;
            let button = $('#end_task_' + selected);
            let start_time = button.data('value');
            if (start_time != '') {
                $.ajax({
                    type: 'post',
                    url: '/admin/servicing/end/' + selected,
                    data: {
                        'id': selected,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        $('#success_' + selected).load(" #success_" + selected);
                        $('#end_' + selected).load(" #end_" + selected);
                        $('#end_' + selected).parent().children('.next-servicing').text((response.success
                            .next_servicing).split('T')[0]);
                        alert(response.success.message)
                    },
                    error: function(response) {
                        alert(response.responseJSON.error.message)
                    }
                });
            } else {
                alert('Task Not Started yet!!!')
            }
        }

        modal.click(function(e) {
            let id = $(this).data('value');
            servicing_id.val(null)
            servicing_id.val(id)
            checkIssue(id);
        });





        function checkIssue(id) {

            let modal_body = $('.modal-body .form-check')
            $.ajax({
                url: '/admin/servicing/issue/' + id,
                type: 'post',
                data: {
                    'id': id,
                    _token: '{{ csrf_token() }}'
                },

                dataType: 'json',
                success: function(response) {
                    

                    modal_body.html('');
                    $('.modal-body .servicing-remark textarea').val(response.remark)
                    count = 0
                    $.each(response.data, function(i, value) {

                        if (value.parent_id == null) {
                            

                            

                            let issue = $('#inner_modal_body')
                            issue.append(
                                $('<h5>', {
                                    html: value.issue
                                }, '</h5>')
                                
                            )

                            $.each(response.data, function(a, b) {
    
                                if (value.id == b.parent_id) {
                                    console.log(b.issue)

                                    issue.append(
                                        $('<ul>').append(
                                            $('<li>', {
                                                html: b.issue
                                            }, '</li>')
                                        )
                                    )
                                }

                            })
                        }


                    });
                },
                error: function(response) {
                    alert(response.responseJSON.error.message)
                }
            })

        }
</script>
@endsection