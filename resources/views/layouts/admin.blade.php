<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | RoyalRide
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/admin_assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ url('/public/layout.js') }}" type="text/Javascript">
    @yield('css')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar p-3 text-white bg-dark" style="width: inherit;">
                        @if (Auth::user()->role_id==1)
                            <a href="{{ route('dash') }}" class="fs-4" style="color: #fff; text-decoration:none; padding-left: 18px;">Dashboard</a>
                            
                        @elseif(Auth::user()->role_id==3)
                            <a href="{{ route('customer-dashboard') }}" class="fs-4" style="color: #fff; text-decoration:none; padding-left: 18px;">Dashboard</a>
                        @else
                            <a href="{{ route('employee.dashboard') }}" class="fs-4" style="color: #fff; text-decoration:none; padding-left: 18px;">Dashboard</a>
                        @endif
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        @can('role-access')
                            <li>
                                <a href="{{route('role.index')}}" class="nav-link text-white">
                                <i class="fas fa-address-card"></i>
                                <span>Role Mgmt</span>
                                </a>
                            </li>
                            
                        @endcan
                        @can('permission-access')
                            <li>
                                <a href="{{route('permission.index')}}" class="nav-link text-white">
                                <i class="fas fa-address-card"></i>
                                <span>Permission Mgmt</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('p_component.index')}}" class="nav-link text-white">
                                <i class="fas fa-address-card"></i>
                                <span>App component Mgmt</span>
                                </a>
                            </li>
                        @endcan
                        @can('employee-view')
                            <li>
                                <a href="{{route('employee.index')}}" class="nav-link text-white">
                                <i class="fas fa-users"></i>
                                <span class="pl-4">Employees</span>
                                </a>
                            </li>
                        @endcan
                        <li>
                            
                        @can('customer-view')
                            
                            <li>
                                <a href="{{route('customer.index')}}" class="nav-link text-white">
                                <i class="fas fa-address-card"></i>
                                <span>Customer</span>
                                </a>
                            </li>
                        @endcan
                        @can('org-view')
                        <li>
                            <a href="{{route('org.index')}}" class="nav-link text-white">
                            <i class="fas fa-building"></i>
                            <span>Organization Info</span>
                            </a>
                        </li>
                        @endcan

                        @can('branch-view')
                        <li>
                            <a href="{{route('branch.index')}}" class="nav-link text-white">
                            <i class="fas fa-building"></i>
                            <span>Branches </span>
                            </a>
                        </li>
                        @endcan

                        @can('department-view')
                        <li>
                            <a href="{{route('department.index')}}" class="nav-link text-white">
                            <i class="fas fa-building"></i>
                            <span>Departments </span>
                            </a>
                        </li>
                        @endcan

                        @can('servicing-view')
                        <li>
                            <a href="{{route('servicing.index')}}" class="nav-link text-white">
                            <i class="fas fa-biking"></i>
                            <span> Servicing</span>
                            </a>
                        </li>
                        @endcan

                        @can('booking-view')
                        <li>
                            <a href="{{route('booking.index')}}" class="nav-link text-white">
                            <i class="fas fa-biking"></i>
                            <span> Bookings</span>
                            </a>
                        </li>
                        @endcan


                        @can('vehicle-model-view')
                        <li>
                            <a href="{{route('vehicle-model.index')}}" class="nav-link text-white">
                            <i class="fas fa-biking"></i>
                            <span> Vehicle Model</span>
                            </a>
                        </li>
                        @endcan

                        @can('issue-view')
                            <li>
                                <a href="{{route('issue.index')}}" class="nav-link text-white">
                                <i class="fas fa-biking"></i>
                                <span> Issues</span>
                                </a>
                            </li>
                        @endcan
                        
                        @can('contact-view')
                        <li>
                            <a href="{{route('contact.index')}}" class="nav-link text-white">
                            <i class="fas fa-comments"></i>
                            <span>Contact</span>
                            </a>
                        </li>
                        @endcan

                        @can('vehiclebooking-view')
                        <li>
                            <a href="{{route('vehiclebooking.index')}}" class="nav-link text-white">
                            <i class="fas fa-comments"></i>
                            <span>Vehicle Booking</span>
                            </a>
                        </li>
                         @endcan

                         @can('attendance-view')
                            <li>
                                <a href="{{route('attendance.index')}}" class="nav-link text-white">
                                <i class="fas fa-comments"></i>
                                <span>Attendance</span>
                                </a>
                            </li>
                         @endcan
                        
                        @can('feedback-view')
                            <li>
                                <a href="{{route('admin.feedback')}}" class="nav-link text-white">
                                <i class="fas fa-comments"></i>
                                <span>Feedback</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    
                
        

                

            </div>
            
    </div>
    <div class="col-md-9 container-section"> 
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" style=" font: 30px Arial, sans-serif; color: green;">RoyalRide</a>
            <div class="user-profile" style="position: initial;">
                <div class="btn-group">
                    <button class="btn btn-light btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong>{{auth()->user()->first_name}}</strong>
                    </button>
                   
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownMenuButton">
                        <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/1aea98032a.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js')
</html>