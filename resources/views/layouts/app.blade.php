<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
html, body {


                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                background-position: center center;
                margin: 0;

                 /* Background image doesn't tile */
                background-repeat: no-repeat;

  /* Background image is fixed in the viewport so that it doesn't move when
     the content's height is greater than the image's height */
                 background-attachment: fixed;

  /* This is what makes the background image rescale based
     on the container's size */
                  background-size: cover;

  /* Set a background color that will be displayed
     while the background image is loading */
                    background-color: #464646;


            }
</style>
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
      <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/lay.css') }}"rel="stylesheet">

</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        Fredkam Enterprises
                    </a>

                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>




                    <!-- Navbar -->
                    <ul class="navbar-nav ml-auto ml-md-0">


                      @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else

                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <img src {{ asset('login.png') }}= height="25px"/>{{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                    </ul>

                  </nav>

                  <div id="wrapper">

                    <!-- Sidebar -->
                    <ul class="sidebar navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/home') }}">
                          <i class="fas fa-fw fa-tachometer-alt"></i>
                          <span>Home</span>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link"  href="{{ url('/Product') }}"> Stock</a>

                      </li>
                      <li class="nav-item">
                          <a class="nav-link"  href="{{ url('/Category') }}">category</a>

                        </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Sales') }}">Sales<a>

                      </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/Purchases') }}">Purchases<a>

                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/Payments') }}">Payment Types<a>

                      </li>
                    </ul>




      <div id="content-wrapper">

        <div class="container-fluid">

        <main class="py-4">
          @include('inlcudes.messages')
            @yield('content')
        </main>
    </div>
      <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
</body>
</html>
