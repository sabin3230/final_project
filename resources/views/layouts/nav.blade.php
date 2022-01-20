<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>nav</title>

        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/admin_assets/css/layout.css') }}">
        <link rel="stylesheet" href="{{ url('/public/layout.js') }}" type="text/Javascript">

        @yield('css')
    </head>
    <body class="antialiased">
               

        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center">
              <h1 class="logo me-auto"><a href="index.html">RoyalRide</a></h1>
          
              <nav id="navbar" class="navbar">
                <ul>
                  <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                  <li><a class="nav-link scrollto" href="#">Profile </a></li>
                  <li><a class="nav-link scrollto" href="#">Employee </a></li>
                  <li><a class="nav-link scrollto" href="#about">About</a></li>
                  <li><a class="nav-link scrollto" href="#services">Services</a></li>
                  <li><a class="nav-link scrollto " href="#portfolio">Gallery</a></li>
                  <li><a  class="nav-link scrollto" href="#vhicle_booking">Booking Vehchile</a></li>
                  <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
              </nav>
        
        
                <div class="text-end">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-outline-black me-2">Home</a>
                    @else
                            <a href="{{ route('login') }}" class="btn btn-outline-black me-2">Login</a>
            
                        @endauth
                    @endif
                </div>
            </div>
        </header>


            <div class="main-content">
                <div class="content">
                    @yield('content')
                </div>
            </div>


            
        </body>
</html>