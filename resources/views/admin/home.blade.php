@extends('layouts.admin')
@section('title')
   Dashboard
@endsection
@section('content')
<div class="container">

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Customer</div>
                <div class="number">{{$Customer}}</div>
                <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
                </div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
            </div>
            <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Servicing</div>
                <div class="number">{{$Servicing}}</div>
                <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
                </div>
            </div>
            <i class='bx bxs-cart-add cart two' ></i>
            </div>
            <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Vehicle Booked</div>
                <div class="number">{{$VehicleBooking}}</div>
                <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
                </div>
            </div>
            <i class='bx bx-cart cart three' ></i>
            </div>
            <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Employee</div>
                <div class="number">{{$Employee}}</div>
                <div class="indicator">
                <i class='bx bx-down-arrow-alt down'></i>
                <span class="text">up from yesterday </span>
                </div>
            </div>
            <i class='bx bxs-cart-download cart four' ></i>
            </div>
        </div>

            <div class="bar-box">  
                <div class="col-md-8">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        let url = "{{route('chart.servicing')}}";4
        data = {};
        
        const randomColorGenerator = (n) => {
            let backgroundColor = new Array();
            for(let i=0; i<n; i++){
                backgroundColor.push('#'+ ('000000' + Math.floor(Math.random()*16777215).toString(16)).slice(-6));
            }
            return backgroundColor;
        }
        $(document).ready(function(){
            $.get(url, (response) => {
                $.each(response.dates, function(index, date){
                    $.each(response.servicing, function(b, service){
                        if (date == service.created_date){
                            data[date] = service.count;
                            return false;
                        }else{
                            data[date] = 0;
                        }
                    });
                });
                let ctx = $('#canvas')[0].getContext('2d');
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(data),
                        datasets: [{
                            data: data,
                            // borderWidth: 1
                            backgroundColor: randomColorGenerator(20),
                            legend: false,
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: "No. of Servicing in past 30 days",
                            },
                            legend: {
                                display: false
                            },

                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 20,
                                ticks: {
                                    stepSize: 1,
                                }
                            },
                        }
                    }
                });
            })
        });
    </script>
@endsection
