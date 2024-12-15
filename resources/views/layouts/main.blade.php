<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets2/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ '/assets2/img/favicon.png' }}">
    <title>@yield('tittle')</title>
    @yield('styles')
    <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets2/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
</head>
    <body class="g-sidenav-show bg-gray-100">
        <div class="min-height-300 bg-dark position-absolute w-100"></div>

        <!-- Sidebar -->
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
            @include('layouts.sidebar') <!-- Include sidebar -->
        </aside>

        <main class="main-content position-relative border-radius-lg">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
                @include('layouts.navbar') <!-- Include navbar -->
            </nav>

            <div class="container-fluid py-4">
                @yield('content') <!-- Main content will be injected here -->

                <!-- Include footer -->
            </div>
        </main>





    @yield('scripts')

    <script src="{{ asset('/assets2/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets2/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets2/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets2/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets2/js/plugins/chartjs.min.js') }}"></script>
     <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets2/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
</body>
</html>
