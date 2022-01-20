@extends('layouts.admin')

@section('content')

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
</div>
@endsection