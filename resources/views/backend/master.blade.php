<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coaching | Home</title>
    <!--    Font Awesome Stylesheet-->
    <link rel="stylesheet" href="{{ asset('public/backend/fonts/fa/css/all.min.css') }}">
    <!--    Animate CSS-->
    <link rel="stylesheet" href="{{ asset('public/backend/css/animate.css') }}">
    <!--    Owl Carosel Stylesheets-->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/owl-carosel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/owl-carosel/css/owl.theme.default.css') }}">
    <!--    Magnetic Popup-->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/magnific-popup/css/magnific-popup.css') }}">
    <!--    Bootstrap-4.3 Stylesheet-->
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/sub-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/toastr.min.css') }}">
    <!--    Data Table CSS-->

    @yield('header')
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/data-table/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/data-table/css/fixedHeader.bootstrap4.min.css') }}">
    <!--    Theme Stylesheet-->
    <link rel="stylesheet" href="{{ asset('public/backend/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/jquery-ui.css') }}">

    <link rel="stylesheet" href="{{ asset('public/backend/css/style.css') }}">
    <!--    Favicon-->
    <link rel="shortcut icon" href="{{ asset('public/backend/images/favicon.png') }}" type="image/x-icon">
</head>
<body>
<!--Header Start-->
<section>
    <div class="col-sm-12 text-center header pb-1">
        <h2 class="font-weight-bold p-1 m-0">Web Site Title</h2>
        <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">Web Sub Title</h5>
        <p class="font-weight-bold mb-0">215/4/A/3, East-Rampura, Dhaka-1209</p>
        <p class="font-weight-bold mb-0">Mobile: 880-1722454519</p>
    </div>
</section>
<!--Header End-->

<!--User Avatar Start-->
<img class="avatar" src="{{ asset('public/backend/images/avatar.png') }}" alt="Avatar">
<!--User Avatar Start-->

<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="{{ route('StudentPage') }}">Registration</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('running_student') }}">All Runnin Student List</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('BatchWiseStudent') }}">Batch Wise List</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('classWiseStudent') }}">Class Wise List</a></li>
                </ul>
            </li>  


             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Attendance
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="{{ route('StudentAttendance') }}">Add Attendance</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('View_Attendance') }}">View Attendance</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('AttendanceEdite') }}">Edite Attendance</a></li>
                  
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="gallery.html">Gallery</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">School</a>
                        <ul class="dropdown-menu">
                          
                            <li><a href="{{ route('schoolView') }}" class="dropdown-item">School List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Class</a>
                        <ul class="dropdown-menu">
                           
                            <li><a href="{{ route('classList') }}" class="dropdown-item">Class List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                           
                            <li><a href="{{ route('BatchList') }}" class="dropdown-item">Batch List</a></li>
                        </ul>
                    </li> 

                     <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Course Type</a>
                        <ul class="dropdown-menu">
                           
                            <li><a href="{{ route('CourchList') }}" class="dropdown-item">Course List</a></li>
                        </ul>
                    </li> 

                       <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">User</a>
                        <ul class="dropdown-menu">
                    @if(@Auth::user()->role=='admin')
                            <li><a href="{{ route('UserShow') }}" class="dropdown-item">Add User</a></li>
                            <li><a href="{{ route('UserViewlist') }}" class="dropdown-item">User List</a></li>
                    @else
                            <li><a href="{{ route('UserProfile') }}" class="dropdown-item">User Profile</a></li>

                    @endif
                        </ul>
                    </li>

                     <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Date</a>
                        <ul class="dropdown-menu">
                           
                            <li><a href="{{ route('YearSet') }}" class="dropdown-item">Add Year</a></li>
                        </ul>
                    </li> 

                </ul>
            </li>
        </ul>

        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
<!--Main Menu End-->

<div id="overlay">
     <div class="loader">
         
     </div>
</div>

<!--Slider Start-->
<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0">
            @yield('content')
        </div>
    </div>
</section>
<!--Slider End-->

<!--Footer Start-->
<footer class="container-fluid">
    <div class="row footer">
        <div class="col-12">
            <p class="pt-2 mb-2 text-center">Copyright &copy; <a class="footer-link" href="">Owner</a> || Developed  by:
                <a class="footer-link" href="http://www.fzitsolution.net">FZIT Solution</a></p>
        </div>
    </div>
</footer>
<!--Footer End-->

    <!--    jQuery-->
    <script src="{{ asset('public/backend/js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('public/backend/js/jquery.js') }}"></script> --}}
   
    <script src="{{ asset('public/backend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery-ui.min.js') }}"></script>
    <!--    magnific popup-->
    <script src="{{ asset('public/backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
    <!--    Carousel-->
    <script src="{{ asset('public/backend/plugins/owl-carosel/js/owl.carousel.min.js') }}"></script>
    <!--    Bootstrap-4.3-->
    <script src="{{ asset('public/backend/js/toastr.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/sub-dropdown.js') }}"></script>
    <!--Data table-->
    <script src="{{ asset('public/backend/plugins/data-table/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/data-table/js/dataTables.fixedHeader.min.js') }}"></script>
    <!--    Theme Script-->
  
    <script src="{{ asset('public/backend/js/script.js') }}"></script>

    @yield('footer')

    <script type="text/javascript">
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','success') }}";

    switch(type){
        case "success":
        toastr.success("{{ Session::get('message') }}");
        break;

        case "error":
        toastr.error("{{ Session::get('message') }}");
        break;
    }
@endif


  


    </script>
</body>
</html>