<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style5.css') }}" rel="stylesheet">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
     <!-- Scripts -->
    <style>
  
.navbar-nav>li>a, .submenu-box ul li a {
    padding: 1rem 1rem!important;
}
 .m-0 {
    margin: 0!important;
    background-color: white;
    border-radius: 6px;
    padding: 1rem 0rem;
   }
   .submenu-box ul li a {
  
    color: #b52d8b  !important;
    font-weight: 700;
    margin: .5rem 1rem;
   }
   .submenu-box ul li a:hover{
    color: linear-gradient(#c20169 ,#800080ab)!important; 
    font-weight: 700;
    background-color: #f7f7f7;
    margin: .5rem 1rem;
    opacity: 1;
    border-radius: 50px;
    text-decoration: none!important;
}
.dropdown-toggle::after {
    display: inline-block;
    margin-left: 0.255em;
    vertical-align: 0.255em;
    content: "";
}
.navbar{
     background: linear-gradient(#c20169 ,#800080ab)!important;
}




  </style>
</head>





<body>


    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
                <a class="sidebar-brand" href="#">
                    <span class="align-middle">Dashboard Design <i class="fa fa-times" aria-hidden="true"
                            onclick="closesidebarmenu()"></i>
                    </span>

                </a>

                <ul class="unorder-list">

                    <li class="list-itmes" onclick="opendash()">
                        <a href="/dashboard" class="nav-link text-left a-href" role="button" aria-haspopup="true" aria-expanded="false">
                        <span>
                         <i class="fa fa-tachometer " aria-hidden="true"></i>
                         Dashboard
                        </span>
                        </a>
                    </li>

                  

                    <li class="list-itmes">
                        <a class="nav-link collapsed dropdown-toggle text-left botton-ahref" href="#collapseExample2" role="button"
                            data-toggle="collapse">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>Customer
                        </a>
                        <div class="collapse menu mega-dropdown" id="collapseExample2">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                <li>  <a href="/addcustomer">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Add Customer</a></li>
                                               
                                                <li><a href="/view_customer"> 
                                                 <i class="fa fa-plus" aria-hidden="true"></i>
                                                Manage Customer</a></li>

                                                <li><a href="/customer_history">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Customer History</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                 
              
                   
                    <li class="list-itmes">
                    <a href="/add_product" class="nav-link text-left  botton-ahref" role="button">
                    <i class="fa fa-object-group" aria-hidden="true"></i>
                    Add Product
                    </a>
                    </li>
                    <li class="list-itmes">
                    <a href="/add_pos" class="nav-link text-left  botton-ahref" role="button">
                    <i class="fa fa-car" aria-hidden="true"></i>
                    Manage Pos</a>
                    </li>
                   
                  

                </ul>


            </div>


        </nav>
        <!-- /#sidebar-wrapper -->


        <!-- Page Content -->
        <div id="page-content-wrapper">


            <div id="content">

                <div class="container-fluid p-0 px-lg-0 px-md-0">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light" style="padding: 0.9rem!important;" id="my-navbar-close">

                        <!-- Sidebar Toggle (Topbar) -->
                        <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed"
                            onclick="opensidebarmenu()" >
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                       
                        <!-- Topbar Search -->
                        <span>
                        <a class="head_title" href="{{ url('/') }}">
                            Pre Billing Software   <!-- {{ config('app.name', 'Laravel') }} -->
                        </a>
                       </span>

                       <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav  ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                      


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-link-style text-dark" style="color:black !important;padding: 0.5rem 1rem!important;"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div  class="  dropdown-menu-right dropdown-menu" aria-labelledby="navbarDropdown" style="margin:0rem 0rem!important;">
                                    <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('update_user_profile') }}">User Profile Update</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                             </li>     

                        @endguest
                    </ul>
                       

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid px-lg-4">
                        <div class="row" id="top-container">
                            <div class="col-md-12 mt-lg-4 mt-4">
                                <!-- Page Heading -->
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>







<!-- 
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row text-muted">
                            <div class="col-6 text-left">
                                <p class="mb-0">
                                    <a href="index.html" class="text-muted"><strong id="footer-style">Dashboard
                                            Vishweb Design
                                        </strong></a> &copy
                                </p>
                            </div>
                            <div class="col-6 text-right">
                                <ul class="list-inline">
                                    <li class="footer-item">
                                        <a class="text-muted" href="#">Support</a>
                                    </li>
                                    <li class="footer-item">
                                        <a class="text-muted" href="#">Help Center</a>
                                    </li>
                                    <li class="footer-item">
                                        <a class="text-muted" href="#">Privacy</a>
                                    </li>
                                    <li class="footer-item">
                                        <a class="text-muted" href="#">Terms</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer> -->

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <script>



        function opendash() {
            location.replace("http://127.0.0.1:5500/dash.html")
        }

        function closesidebarmenu() {
            document.getElementById("sidebar-wrapper").style.width = "0px";
            document.getElementById("my-navbar-close").style.marginLeft = "0rem";
            document.getElementById("top-container").style.marginLeft = "0rem";
            document.getElementById("margin-left-card").style.marginLeft = "0rem";
            document.getElementById("footer-style").style.marginLeft = "0rem";



        }
        function opensidebarmenu() {
            document.getElementById("sidebar-wrapper").style.width = "270px";
            document.getElementById("my-navbar-close").style.marginLeft = "16rem";
            document.getElementById("top-container").style.marginLeft = "15rem";
            document.getElementById("margin-left-card").style.marginLeft = "0rem";
            document.getElementById("footer-style").style.marginLeft = "15rem";


        }





    </script>






</body>

</html>