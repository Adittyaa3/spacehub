<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Spacehub</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">Spacehub</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/">Tentang</a></li>
          <li><a href="/">Fasilitas</a></li>
          <li><a href="/">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ url('/login') }}">LOGIN </a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">


      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Welcome to <span>SpaceHub</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Booking tempat praktis, nugas jadi lebih fokus. SpaceHub menyediakan ruang ideal untuk belajar, bekerja, dan berkolaborasi!<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Get Started</a>
          </div>
          <img src="{{ asset('assets/img/hero-services-img.webp') }}" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="/" class="stretched-link">Harga Terjangkau</a></h4>
                <p class="description">Tersedia berbagai pilihan ruang dengan harga yang pas di kantong.</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a href="/" class="stretched-link">Fasilitas Lengkap</a></h4>
                <p class="description">Nikmati fasilitas pendukung seperti Wi-Fi cepat, stop kontak lengkap, AC, dan suasana yang tenang.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a href="/" class="stretched-link">Fleksibel</a></h4>
                <p class="description">Pilih ruang sesuai durasi dan kapasitas yang Anda inginkan.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Who We Are</p>
            <h3>Tentang SpaceHub</h3>
            <p class="fst-italic">
              SpaceHub adalah platform inovatif yang dirancang khusus untuk membantu Anda menemukan ruang kerja atau belajar yang nyaman dan kondusif. Kami memahami bahwa produktivitas dimulai dari lingkungan yang tepat. Oleh karena itu, SpaceHub hadir sebagai solusi bagi para pelajar, pekerja, freelancer, dan komunitas yang membutuhkan tempat ideal untuk menyelesaikan tugas, belajar, rapat, atau berkolaborasi.
            </p>
            {{-- <ul>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
            </ul> --}}
            {{-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> --}}
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets/img/studio.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets/img/hall.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets/img/private.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          {{-- <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div><!-- End Client Item --> --}}

          {{-- <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div><!-- End Client Item --> --}}

          {{-- <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div><!-- End Client Item --> --}}

          {{-- <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div><!-- End Client Item --> --}}

          {{-- <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div><!-- End Client Item --> --}}

          {{-- <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div><!-- End Client Item --> --}}

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Fasilitas</h2>
        <p> Berikut ini adalah fasilitas dari Spacehub</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                  <i class="bi bi-binoculars"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Ruang Nyaman & Privat</h4>
                    <p>
                      Ruangan ber-AC dan bersih dengan desain modern, cocok untuk kerja, belajar, atau rapat kecil.
Privasi terjaga untuk fokus maksimal.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                  <i class="bi bi-box-seam"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Tempat ibadah</h4>
                    <p>
                      Tersedia mushola khusus untuk pelanggan yang ingin beribadah dengan tenang dan nyaman.
Lengkap dengan sajadah, mukena, sarung, dan Al-Qur'an.
Lokasi mudah dijangkau di dalam area Spacehub.
Tempat wudhu bersih dengan aliran air yang lancar.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                  <i class="bi bi-brightness-high"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Sistem Reservasi Mudah</h4>
                    <p>
                      Pemesanan ruang di Spacehub dapat dilakukan dengan mudah dan cepat melalui website atau aplikasi resmi kami. Dengan antarmuka yang ramah pengguna, Anda dapat memilih ruangan sesuai kebutuhan, mengecek ketersediaan waktu, dan melakukan pembayaran secara online.
                    </p>
                  </div>
                </a>
              </li>
            </ul><!-- End Tab Nav -->

          </div>

          <div class="col-lg-6">

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

              <div class="tab-pane fade active show" id="features-tab-1">
                <img src="assets/img/mushola1.jpg" alt="" class="img-fluid"" width="480">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-2">
                <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-3">
                <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Features Details Section -->
    <section id="features-details" class="features-details section">

      <div class="container">

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/meetingroom1.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Meeting Room</h3>
              <p>
                Spacehub menyediakan ruangan khusus yang dirancang untuk mendukung rapat bisnis dan presentasi profesional. Ruangan ini dilengkapi dengan berbagai fasilitas modern seperti proyektor berkualitas tinggi, layar lebar, papan tulis, serta sistem audio yang jernih untuk memastikan komunikasi yang efektif.
                Setiap ruangan memiliki desain yang nyaman dan profesional, menciptakan suasana kondusif untuk berdiskusi, membuat keputusan, atau mempresentasikan ide penting kepada klien maupun tim. Ruangannya juga dapat disesuaikan dengan jumlah peserta, baik untuk rapat kecil maupun pertemuan skala lebih besar.
              </p>
              {{-- <a href="#" class="btn more-btn">Learn More</a> --}}
            </div>
          </div>

        </div><!-- Features Item -->

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

            <div class="content">
              <h3>Conference Hall</h3>
              <p>
                Spacehub menyediakan Conference Hall yang luas dan nyaman, ideal untuk acara besar seperti seminar, workshop, konferensi, atau gathering perusahaan. Ruangan ini dilengkapi dengan fasilitas modern, seperti proyektor dan layar besar, sistem audio berkualitas tinggi, pencahayaan optimal, serta kursi dan meja ergonomis yang dapat disesuaikan dengan kapasitas peserta. Selain itu, tersedia juga area registrasi dan penerimaan tamu untuk menyambut peserta dengan profesional. Dengan kapasitas fleksibel dan suasana yang mendukung, **Conference Hall** di Spacehub menjadi pilihan tepat untuk menyelenggarakan acara berskala besar dengan hasil maksimal.
              </p>
              <ul>
                {{-- <li><i class="bi bi-easel flex-shrink-0"></i> Et corporis ea eveniet ducimus.</li>
                <li><i class="bi bi-patch-check flex-shrink-0"></i> Exercitationem dolorem sapiente.</li>
                <li><i class="bi bi-brightness-high flex-shrink-0"></i> Veniam quia modi magnam.</li> --}}
              </ul>
              <p></p>
              {{-- <a href="#" class="btn more-btn">Learn More</a> --}}
            </div>

          </div>

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/hall.jpg" class="img-fluid" alt="">
          </div>

        </div><!-- Features Item -->

      </div>
      <section id="features-details" class="features-details section">
      <div class="container">

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/training1.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Training Room</h3>
              <p>
                Spacehub menyediakan Training Room yang dirancang khusus untuk pelatihan, kursus, atau kegiatan edukasi lainnya. Ruangan ini dilengkapi dengan fasilitas modern seperti proyektor, papan tulis, dan sistem audio yang mendukung presentasi dan diskusi efektif. Dengan desain yang nyaman dan profesional, Training Room dapat menampung berbagai kelompok peserta, baik untuk sesi pelatihan kecil maupun besar. Selain itu, ruang ini juga dilengkapi dengan meja dan kursi ergonomis yang dapat disusun sesuai kebutuhan. Training Room di Spacehub menawarkan lingkungan yang kondusif untuk belajar dan berbagi pengetahuan, menjadikannya pilihan ideal untuk penyelenggaraan program pelatihan dan pengembangan.
              </p>
              {{-- <a href="#" class="btn more-btn">Learn More</a> --}}
            </div>
          </div>

        </div><!-- Features Item -->

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

            <div class="content">
              <h3>Studio</h3>
              <p>
                Spacehub menyediakan Studio yang dirancang untuk berbagai kegiatan kreatif, seperti produksi video, fotografi, podcast, dan streaming. Ruangan ini dilengkapi dengan fasilitas profesional seperti peralatan pencahayaan, kamera, dan latihan audio, serta area yang luas dan fleksibel untuk mendukung berbagai kebutuhan produksi. Studio di Spacehub juga menawarkan latar belakang yang bisa disesuaikan untuk berbagai tema, memastikan hasil yang maksimal untuk proyek kreatif Anda. Dengan desain yang modern dan nyaman, studio ini menjadi tempat ideal bagi individu atau tim yang ingin menghasilkan konten berkualitas tinggi.
              </p>
              <ul>
                {{-- <li><i class="bi bi-easel flex-shrink-0"></i> Et corporis ea eveniet ducimus.</li>
                <li><i class="bi bi-patch-check flex-shrink-0"></i> Exercitationem dolorem sapiente.</li>
                <li><i class="bi bi-brightness-high flex-shrink-0"></i> Veniam quia modi magnam.</li> --}}
              </ul>
              <p></p>
              {{-- <a href="#" class="btn more-btn">Learn More</a> --}}
            </div>

          </div>

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <<img src="assets/img/studio.jpg" class="img-fluid" alt="" width="450">

          </div>

        </div><
    </section><!-- /Features Details Section -->



    <!-- More Features Section -->
    <section id="more-features" class="more-features section">

      

    </section><!-- /More Features Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Berikut Testimoni dari pelanggan</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Spacehub telah menjadi tempat yang sangat membantu bagi tim kami dikala meeting atau pertemuan penting lainnya"
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/user.jpg" class="testimonial-img" alt="">
                  <h3>Rina</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Sebagai seorang freelancer yang membutuhkan ruang untuk bekerja dan berkolaborasi, Spacehub memberikan pilihan tempat yang sangat ideal. Training Room yang lengkap dengan fasilitas modern dan suasana yang tenang membantu saya lebih fokus dalam sesi pelatihan."
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/user.jpg" class="testimonial-img" alt="">
                  <h3>Sarah</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Spacehub sangat memudahkan kami dalam menyelenggarakan acara pelatihan internal. Ruangannya fleksibel dan dapat disesuaikan dengan jumlah peserta, serta didukung oleh fasilitas yang memadai. Kami sangat puas dengan layanan dan kenyamanan yang diberikan."
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/user.jpg" class="testimonial-img" alt="">
                  <h3>Jeni romansa</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Saya sudah beberapa kali memesan ruang untuk meeting di Spacehub, dan setiap kali merasa puas dengan kualitas layanan dan fasilitasnya. Proyektor dan sistem audio yang disediakan membuat presentasi saya lebih profesional dan berjalan lancar. Proses pemesanan sangat mudah, dan konfirmasi instan membuat saya tidak perlu khawatir."
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/user.jpg" class="testimonial-img" alt="">
                  <h3>Diana</h3>
                  <h4> CEO di Solusi Kreatif</h4>

                </div>
              </div>
            </div><!-- End testimonial item -->


                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#spaces">Spaces</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <p>
                  "Sebagai seorang pengusaha kecil, saya membutuhkan tempat yang nyaman dan efisien untuk melakukan rapat dengan tim. Spacehub menyediakan ruang yang sangat ideal dengan suasana yang tenang, lengkap dengan perlengkapan yang mendukung. Selain itu, harga yang terjangkau membuatnya menjadi pilihan terbaik untuk bisnis saya."
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/user.jpg" class="testimonial-img" alt="">
                  <h3>Yusuf</h3>
                  <h4>Pemilik usaha</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        {{-- <p>Spacehub@gmail.com</p> --}}
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60115</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>087781160585</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>Spacehub@gmail.com</p>

            </div>
          </div><!-- End Info Item -->



            </div>
        </div>
    </footer>

    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Book Your Space</h2>
            <form id="bookingForm" class="booking-form">
                <label for="spaceName">Space:</label>
                <input type="text" id="spaceName" readonly>
                <label for="date">Date:</label>
                <input type="date" id="date" required>
                <label for="time">Time:</label>
                <input type="time" id="time" required>
                <label for="duration">Duration (hours):</label>
                <select id="duration" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <button type="submit">Confirm Booking</button>
            </form>
        </div>


      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Spacehub</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60115</p>
            <p class="mt-3"><strong>Phone:</strong> <span>87781160585</span></p>
            <p><strong>Email:</strong> <span>Spacehub@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Spacehub</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Dist<a href="https://themewagon.com">ThemeWagon
      </div>
    </div>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        // JavaScript for mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelector('.nav-links');
            const menuToggle = document.querySelector('.menu-toggle');

            menuToggle.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Booking modal functionality
        const modal = document.getElementById('bookingModal');
        const bookBtns = document.querySelectorAll('.book-btn');
        const closeBtn = document.querySelector('.close');
        const bookingForm = document.getElementById('bookingForm');
        const spaceNameInput = document.getElementById('spaceName');

        bookBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                modal.style.display = 'block';
                spaceNameInput.value = btn.getAttribute('data-space');
            });
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        bookingForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const space = spaceNameInput.value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const duration = document.getElementById('duration').value;

            alert(`Booking confirmed for ${space} on ${date} at ${time} for ${duration} hour(s).`);
            modal.style.display = 'none';
            bookingForm.reset();
        });
    </script>
</body>
</html>
