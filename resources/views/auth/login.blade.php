<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets2/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets2/img/favicon.png') }}">
  <title>Argon Dashboard 3 - Login</title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets2/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />

  <!-- AOS Library -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body>
  <main class="main-content mt-0" data-aos="fade-up">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{ asset('assets/img/foto-adit/photo-adit.jpg') }}'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome Back!</h1>
            <p class="text-lead text-white">Use your credentials to sign in and continue your BookingSpace</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Sign In</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="">
                @csrf
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required>
                </div>
                <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember">
                  <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                  </label>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign In</button>
                </div>
                <p class="text-sm mt-3 mb-0">Don't have an account? <a href="{{ url('register') }}" class="text-dark font-weight-bolder">Sign Up</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" class="text-secondary me-xl-4 me-4"><span class="text-lg fab fa-dribbble"></span></a>
          <a href="javascript:;" class="text-secondary me-xl-4 me-4"><span class="text-lg fab fa-twitter"></span></a>
          <a href="javascript:;" class="text-secondary me-xl-4 me-4"><span class="text-lg fab fa-instagram"></span></a>
          <a href="javascript:;" class="text-secondary me-xl-4 me-4"><span class="text-lg fab fa-pinterest"></span></a>
          <a href="javascript:;" class="text-secondary me-xl-4 me-4"><span class="text-lg fab fa-github"></span></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- JS Files -->
  <script src="{{ asset('/assets2/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/assets2/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/assets2/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets2/js/plugins/smooth-scrollbar.min.js') }}"></script>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = { damping: '0.5' }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // Initialize AOS animation
    AOS.init();
  </script>

  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ asset('/assets2/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
</body>

</html>
