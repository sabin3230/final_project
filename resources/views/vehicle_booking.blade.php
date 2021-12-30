@extends('layouts.nav')
@section('content')
<div class="container w-100%">
    <form class="row g-3">
        <div class="col-md-8">

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="contact" class="form-control">
            </div>

            <div class="form-group">
                <label for="alt_contact">Alternate Contact</label>
                <input type="text" name="alt_contact" id="alt_contact" class="form-control">
            </div>


            <label for="">Model Name</label>
            <select name="" id="">
                <option value="">....</option>
            </select>


            <div class="form-group">
                <label for="engine-capacity">Engine Capacity</label>
                <input type="text" name="engine_capacity" id="engine_capacity"  class="form-control">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="color" id="color"  class="form-control">
            </div>
        </div>

        <div class="col-md-4 bg-light">
            <div id="carouselExampleCaptions" class="carousel slide height-auto" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{'/customer_assets/images/6.jpg'}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{'/customer_assets/images/5.jpg'}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{'/customer_assets/images/7.jpg'}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                        </div>
        </div>
        </div> 

        {{-- <div class="modal-dialog modal-lg">
            <div class="form-check d-flex flex-wrap" style="column-gap: 20px;">
                @foreach ($issues as $issue)
                <div class="">
                  @if ($issue->parent_id == null)
                  <p>{{$issue->issue}}</p>
                  <ul>
                    @foreach($issues as $child)
                      @if($issue->id == $child->parent_id)
                        <label for="" class="d-block">{{$child->issue}}</label>
                      @endif
                    @endforeach
                  </ul>
                  @endif
                </div>
                @endforeach
            </div> --}}

        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
    </form>  

</div>
@endsection