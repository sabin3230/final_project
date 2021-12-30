<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RoyalRide</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('/admin_assets/css/layout.css') }}">
        
    </head>
    <body class="antialiased">
               

            <header class="p-3 bg-white text-black position-fixed">
                <div class="container-fluid">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a class="navbar-brand" >RoyalRide</a>
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="" class="nav-link px-2 text-black">Home</a></li> 
                            <li><a href="" class="nav-link px-2 text-black">Booking</a></li> 
                            <li><a href="#" class="nav-link px-2 text-black">Profile</a></li>
                            <li><a href="#" class="nav-link px-2 text-black">Employee</a></li>
                            <li><a href="#" class="nav-link px-2 text-black">Contact</a></li>
                            <li><a href="#" class="nav-link px-2 text-black">Feedback</a></li> 
                        </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="text-end">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-outline-black me-2">Home</a>
                        @else
                                <a href="{{ route('login') }}" class="btn btn-outline-black me-2">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                    </div>
                </div>
            </header>
            
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" >

            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>

            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
                </a>
                
            </div>

            </section>
        
        

            <section class="">
            <div class="container text-center text-md-start mt-5">
            
                <div class="row mt-3">
        
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            
                    <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>RoyalRide
                    </h6>
                    <p>
                        Drive your dream
                    </p>
                </div>
                
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    <h6 class="text-uppercase fw-bold mb-4">
                    Servicies
                    </h6>
                    <p>
                    <a href="#!" class="text-reset">Customer  Care</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Maintaince</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Sales</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Booking Vehicle</a>
                    </p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                    <h6 class="text-uppercase fw-bold mb-4">
                    Useful links
                    </h6>
                    <p>
                    <a href="#!" class="text-reset">Home</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset"> Booking</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Profile</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Employee</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Contact</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Feedback</a>
                    </p>
                </div>
                
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            
                    <h6 class="text-uppercase fw-bold mb-4">
                    Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Budhanilkantha Kathmandu Nepal</p>
                    <p>
                    <i class="fas fa-envelope me-3"></i>
                    Royalride@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 977 981234578</p>
                    <p><i class="fas fa-print me-3"></i> + 01 4679478</p>
                </div>
                </div>
            </div>
            </section>

            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold">Royalride.com</a>
            </div>

        </footer>
        

    </body>
</html>
