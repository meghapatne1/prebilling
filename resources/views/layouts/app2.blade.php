<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- font icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm navbar-style">
            <div class="container-fluid">
                <a class="head_title" href="{{ url('/') }}">
                Pre Billing Software   <!-- {{ config('app.name', 'Laravel') }} -->
                </a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-link-style" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                </div>
            </div>
        </nav>

       
<!-- Sidebar -->
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="/dashboard" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="/add_product" class="list-group-item list-group-item-action bg-light">Add Product</a>
        <a href="/add_pos" class="list-group-item list-group-item-action bg-light">Add Delivery Boy</a>
        <a href="/importExportView" class="list-group-item list-group-item-action bg-light">Excel</a>
        <a style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);" href="#" class="list-group-item list-group-item-action bg-light  dropdown-toggle" data-toggle="dropdown">
        Manage Customer Data  <span class="caret"></span>
        <ul style="min-width:15rem;padding:0.0rem 0;" class="dropdown-menu">
        <!-- <a href="/add_customer" class="list-group-item list-group-item-action bg-light">Add Customer</a> -->
        <li>  <a href="/addcustomer" class="list-group-item list-group-item-action bg-light">Add Customer</a></li>
        <li><a href="/view_customer" class="list-group-item list-group-item-action bg-light">Manage Customer</a></li>
        <li><a href="/customer_history" class="list-group-item list-group-item-action bg-light">Customer History</a></li>
        </ul>
        </a>
      </div>
    </div>
<!-- Page Content -->
<div id="page-content-wrapper">
<main class="py-4">
   @yield('content')
</main>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- /#sidebar-wrapper -->
</div>
</body>
</html>
