<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/admin/css/layout.css') }}">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
         <div class="container">
           <a class="navbar-brand">RoyalEnfield</a>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid">
          <div class="sidebar p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">Employee</span>
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
                <i class="fas fa-address-card"></i>
                <span>Attendence</span>
                </a>
            </li>

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
                <script src="https://kit.fontawesome.com/1aea98032a.js" crossorigin="anonymous"></script>
            
        </div>
</body>
</html>