<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets2/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets2/img/favicon.png') }}">
  <title>Argon Dashboard 3 - Register</title>
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
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <!-- End Navbar -->
      </div>
    </div>
  </div>

  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto" data-aos="fade-up">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your details to create your account</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder="Full Name" aria-label="Full Name" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="password" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Confirm Password" name="password_confirmation" required>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="terms" name="terms">
                      <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
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
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Already have an account?
                    <a href="{{ url('login') }}" class="text-primary text-gradient font-weight-bold">Sign In</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column" data-aos="fade-up">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-ill.jpg'); background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Your Future Starts Here"</h4>
                <p class="text-white position-relative">Join us today and start your journey with us.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Core JS Files -->
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
