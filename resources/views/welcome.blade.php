<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>welcomepage</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="antialiased">
               

            <header class="p-3 bg-dark text-white">
                <div class="container-fluid">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a class="navbar-brand" >RoyalEnfield</a>
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="#" class="nav-link px-2 text-white">Booking</a></li> 
                            <li><a href="#" class="nav-link px-2 text-white">Customer</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">Employee</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                        </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="text-end">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-outline-light me-2">Home</a>
                        @else
                                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                    </div>
                </div>
            </header>
            
            <div class="carousel slide" id="slider" data-ride="caraousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="C:\Users\Lenovo\Desktop" alt="1.jpg">
                    </div>

                    <div class="carousel-item active">
                        <img src="2.jpg" alt="2.jpg">
                    </div>

                    <div class="carousel-item active">
                        <img src="3.jpg" alt="3.jpg">
                    </div>

                </div>

            </div>
    </body>
</html>
