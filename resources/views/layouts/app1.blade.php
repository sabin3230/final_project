<!DOCTYPE html>
<html lang="en">
  <style>
    
  </style>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name', 'Royalride') }}</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <meta content="" name="description">
        <meta content="" name="keywords">
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link href="adminassets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> 
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/style.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/style.css') }}">
    </head>

    <body>
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center">
              <h1 class="logo me-auto"><a href="{{route('landing')}}">RoyalRide</a></h1>
          
                <nav id="navbar" class="navbar">
                    <ul>
                    <li><a class="nav-link scrollto active" href="{{route('landing')}}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{route('landing')}}#about">About</a></li>
                    <li><a class="nav-link scrollto" href="{{route('landing')}}#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="{{route('landing')}}#portfolio">Gallery</a></li>
                    <li><a  class="nav-link scrollto" href="{{route('landing')}}#vhicle_booking">Booking Vehchile</a></li>
                    <li><a class="nav-link scrollto" href="{{route('landing')}}#contact">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
        
                <div class="text-end">
                    @if (Route::has('login'))
                        @auth
                        @if (Auth::user()->role_id==1)
                            <a href="{{ route('dash') }}" class="btn btn-info me-2">Dashboard</a>
                            
                        @elseif(Auth::user()->role_id==3)
                            <a href="{{ route('customer-dashboard') }}" class="btn btn-info me-2">Dashboard</a>
                        @else
                            <a href="{{ route('employee.dashboard') }}" class="btn btn-info me-2">Dashboard</a>
                        @endif
                    @else
                            <a href="{{ route('login') }}" class="btn btn-md btn-success ml-2" style="margin-left: 20px; color: #fff;">Login</a>
            
                        @endauth
                    @endif
                </div>
            </div>
        </header>
        <main id="main">
            @yield('content')
        </main>
        <footer id="footer">
            <div class="container">
                <h3>RoyalRide</h3>
                <p>Royal Enfield was a brand name under which The Enfield Cycle Company Limited of Redditch, Worcestershire sold motorcycles, bicycles, lawnmowers and stationary engines which they had manufactured.</p>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
                <div class="copyright">
                    &copy; Copyright <strong><span>RoyalRide</span></strong>. All Rights Reserved
                </div>
            </div>
        </footer>
        
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
    
        <script src="assets/js/main.js"></script>
    </body>
</html>