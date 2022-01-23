@extends('layouts.app1')
@section('title')
    Booking Vehicle
@endsection
@section('content')
    <div class="box-header">
    <h3 class="box-title"> Servicing</h3>
    </div>

    <div class="box-body">
        <table action="{{route('servicing.store')}}"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>vehicle Number</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Status</th>
                    <th>Assign To</th>
                    <th>Action</th>
                
                </tr>
            </thead>
                <tbody>
                    @if ($servicings->count() > 0)
                        @php($count  = 1)
                            @foreach ($servicings as $servicing)
                                @if ($servicing != null)
                                    <tr> 
                                        <td>{{$count}}</td>       
                                        <td>{{$servicing->bookings->customerVehicles->vehicle_no}}</td>               
                                        <td>{{$servicing->start_time}} </td>
                                        <td>{{$servicing->end_time}} </td>
                                        <td>{{$servicing->status}} </td>
                                        <td>{{$servicing->employee->user->first_name}} 
                                            {{$servicing->employee->user->last_name}} 
                                        </td>
                                
                                        <td>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-primary feedback-modal" data-bs-toggle="modal"  data-bs-target="#exampleModal" data-value="{{$servicing->id}}">
                                                Feedback
                                              </button>
  
                                        </td>
                                    </tr>
                                @endif
                                
                                @php($count++)
                            @endforeach
                        @endif
                </tbody> 
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('feedback.store')}}" method= "POST" class="" >
                  @csrf
                  <input type="hidden" name="servicing_id" id='servicing_id'>
                    <div class="box-body"> 
                        <div class="form-group">
                            <label for="description"> Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            
                        </div> 
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>   
                  </form>

                  
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
    <script>
      let modal = $('.feedback-modal');
      let servicing_id = $('#servicing_id');
      $(modal).click(function(e){
        console.log(servicing_id);
        servicing_id.value = null;
        let value = $(this).data('value');
        console.log(value);
        servicing_id.val(value);
      });
    </script>
@endsection