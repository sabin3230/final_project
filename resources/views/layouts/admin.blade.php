<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/admin/css/layout.css') }}">
    <link rel="stylesheet" href="{{ url('/public/layout.js') }}" type="text/Javascript">
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar p-3 text-white bg-dark" style="width: inherit;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4">Dashboard</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class="fas fa-address-card"></i>
                            <span>user profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class="fas fa-users"></i>
                            <span class="pl-4">Employees</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class="fas fa-address-card"></i>
                            <span>Customer</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class="fas fa-building"></i>
                            <span>Company</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class="fas fa-biking"></i>
                            <span> Servicing</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class="fas fa-comments"></i>
                            <span>Feedback</span>
                            </a>
                        </li>
                    </ul>
                    <div class="user-profile">
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="C:\Users\Lenovo\Desktop\user.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                <strong>sabin</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                
        

                

            </div>
            
    </div>
    <div class="col-md-9 container-section"> 
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">RoyalEnfield</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </nav>
        <div class="main-content">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</div>
    
</body>
<script src="https://kit.fontawesome.com/1aea98032a.js" crossorigin="anonymous"></script>
</html>