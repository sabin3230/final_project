@extends('layouts.app1')
@section('title')
    RoyalRide
@endsection
@section('content')
<div class="container">
  <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title"> My profile</h3>
      </div>

      <form action="{{route('customer.index')}}" method="post" role="form" class="">
          @csrf
          <div class="box-body">
                  <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" id="first_name"  value="{{$customer->user->first_name}}" placeholder=" eg.: Sabin" class="form-control" disabled >
                      
                  </div>

                  <div class="form-group">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name" id="last_name"  value="{{$customer->user->last_name}}" placeholder="eg.: Maharjan" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" id="address"  value="{{$customer->user->address}}" placeholder="eg.: Hattigauda" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email"  value="{{$customer->user->email}}" placeholder="eg.: john@admin.com" class="form-control" disabled>
                  </div>
                  
                  <div class="form-group">
                      <label for="contact">Contact</label>
                      <input type="text" name="contact" id="contact"  value="{{$customer->user->contact}}" placeholder="eg.: +97815" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                      <label for="alt_contact">Alternate Contact</label>
                      <input type="text" name="alt_contact" id="alt_contact"  value="{{$customer->user->alt_contact}}" placeholder="eg.: +97815" class="form-control" disabled>
                  </div>
              </div>

      
      </form>
      <div class="box-header d-flex">
          <h3 class="box-title"> Vehicle details</h3>
          <button type="button" class="btn btn-success vehicle-add-modal" data-bs-toggle="modal" data-value="{{$customer->id}}" data-bs-target="#vehicleModal">
            Add New Vehicle
          </button>
          <a href="/customer/customer-booking">
          <button type="button" class="btn btn-success" style="margin-left: 50px;" > 
            Servicing View
          </button>
          </a>
      </div>
  
      <div class="box-body">
        <table id="dataList" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Model Name</th>
                    <th>Engine Capacity</th>
                    <th>Vehicle Number</th>
                    <th>Engine Number</th>
                    <th>Chassis Number</th>
                    <th>Model Year</th>
                    <th>Purchase Date</th>

                    <th>Action</th>
                  
                </tr>
            </thead>
            <tbody>
              @if ($customerVehicles->count() > 0)
                @php($count  = 1)
                    @foreach ($customerVehicles as $customer_vehicle)
                        <tr> 
                            <td>{{$count}}</td>                       
                            <td>{{$customer_vehicle->vehiclemodels->model_name}} </td>
                            <td>{{$customer_vehicle->vehiclemodels->engine_capacity}}</td>
                            <td>{{$customer_vehicle->vehicle_no}}</td>
                            <td>{{$customer_vehicle->engine_no}}</td>
                            <td>{{$customer_vehicle->chassis_no}}</td>
                            <td>{{$customer_vehicle->model_year}}</td>
                            <td>{{$customer_vehicle->purchase_date}}</td>
                            <td>
                              <button type="button" class="btn btn-primary booking-modal" data-bs-toggle="modal" data-value="{{$customer_vehicle}}" data-bs-target="#exampleModal">
                                Booking
                              </button>
                          </td>
                        </tr>
                  @php($count++)
                  @endforeach
                  @endif
            </tbody>
        </table>
      </div><!-- /.box-body -->
  </div>
</div>
      
<!-- New Vehicle Add Modal -->
<div class="modal fade" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vehicleModalLabel">Add new vehicle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('customer-vehicle.store')}}" method="POST" class="" >
            @csrf
            <div class="box-body">

                <div class="form-group">
                  <label for="model_name">Model Name</label>
                  <select name="vehicle_model_id" id="" class="form-control">
                    <option value="" disabled selected>---------</option>
                  
                    @foreach ($models as $model)
                        <option value="{{$model->id}}">{{$model->model_name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="engine_capacity">Engine Capacity</label>
                  <input type="text" value="" class="form-control vehicle_no" name="engine_capacity">
                </div>

                <div class="form-group">
                    <label for="vehicle_no">Vehicle Number</label>
                    <input type="text" value="" class="form-control vehicle_no" name='vehicle_no'>
                </div>
                <div class="form-group">
                    <label for="completed_km">Model Year</label>
                    <input type="year" name="model_year" id="modelYear"  class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="purchase_date">Purchase Date</label>
                    <input type="text" name="purchase_date" id=""  class="form-control datepicker" autocomplete="off">
                </div>
                 <div class="form-group">
                    <label for="chassis_no">Chassis Number</label>
                    <input type="text" value="" class="form-control chassis_no" name='chassis_no'>
                </div>

                <div class="form-group">
                  <label for="engine_no">Engine Number</label>
                  <input type="text" value="" class="form-control engine_no" name='engine_no'>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div> 
            </div>  
          </form>
      </div>
    </div>
  </div>
</div>


<!-- Booking Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('customer.booking')}}" method="POST" class="" >
            @csrf
              <div class="box-body">
                  <div class="form-group">
                      <label for="vehicle_no">vehicle Number</label>
                      <input type="text" name="customer_vehicle_id" id="vehicle_no_id" hidden>
                      <input type="text" value="" class="form-control vehicle_no" disabled>
                  </div>
              <div class="box-body">
                  <div class="form-group">
                      <label for="completed_km">Completed Kilometer</label>
                      <input type="number" name="completed_km" id="completed_km"  class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="booking_date"> Booking date</label>
                      <input type="text" name="booking_date" id=""  class="form-control datepicker" autocomplete="off">
                  </div>
                  <div class="form-group">
                      <label for="input-limited-range">Booking Time</label>
                      <input type="time" name="booking_time" placeholder="Select time" class="form-control" min="09:00" max="18:00">
                  </div>
                  
                  <div class="form-check d-flex flex-wrap" style="column-gap: 20px;">
                      @foreach ($issues as $issue)
                      <div class="">
                        @if ($issue->parent_id == null)
                        <p>{{$issue->issue}}</p>
                        <ul>
                          @foreach($issues as $child)
                            @if($issue->id == $child->parent_id)
                              <label for="" class="d-block"><input type='checkbox' name="issues[]" value="{{$child->id}}">{{$child->issue}}</label>
                            @endif
                          @endforeach
                        </ul>
                        @endif
                      </div>
                      @endforeach
                  </div>
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



@endsection
@section('js')
  <script>
    let modal = $('.booking-modal');
    let vehicle_no_id = $('#vehicle_no_id');
    let vehicle_no = $('.vehicle_no');
    $(modal).click(function(e){
      vehicle_no.value = null
      vehicle_no.val(null)
      let value = $(this).data('value');
      let vehicle = value.vehicle_no;
      vehicle_no.val(vehicle);
      vehicle_no_id.val(value.id);
    });
    $("#modelYear").datepicker({
      format: "yyyy",
      endDate: new Date(),
      viewMode: "years", 
      minViewMode: "years",
      autoclose:true //to close picker once year is selected
    });
   
    $('.datepicker').datepicker({ 
        startDate: new Date(),
        format: 'yyyy-mm-dd'
    });
  </script>

@endsection