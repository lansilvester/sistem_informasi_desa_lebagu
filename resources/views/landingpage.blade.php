<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Desa Lebagu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h2 class="logo me-auto"><a href="/">Desa Lebagu</a></h2>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" class="active">Beranda</a></li>
          @auth
          <li><a href="{{ route('dashboard') }}" class="getstarted" target="_blank">Dashboard</a></li>
          @endauth
          @guest
          <li><a href="/login" class="getstarted">Login</a></li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url('assets/img/slide/slide a.jpeg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang<br>Sistem Informasi<br>Desa Lebagu</h2>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url('assets/img/slide/slide b.jpeg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang<br>Sistem Informasi<br>Desa Lebagu</h2>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url('assets/img/slide/slide c.jpeg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang<br>Sistem Informasi<br>Desa Lebagu</h2>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row content">
          <a href=""></a>
        </div>
        <div class="row content  mb-5">
          <div class="col-12 pt-4 pt-lg-0">
            <h1 class="fw-bold">Visi dan Misi</h1>
            <h4 class="text-center">Visi</h4>
            <p>Visi adalah suatu persyaratan yang merupakan ungkapan atau artikulasi dari nilai, cita-cita, arah dan tujuan organisasi yang realistis, memberikan kekuatan, semangat, dan komitmen, serta memiliki daya tarik yang dapat dipercaya sebagai pemandu dalam pelaksanaan aktifitas dan pencapaian tujuan organisasi. Adapun rumusan visi Desa Lebagu adalah sebagai berikut:<br>
              <b>"MEWUJUDKAN DESA LEBAGU DESA YANG TERDEPAN DI PARIGI MOUTONG DENGAN ASAS KEJUJURAN DAN TRANSPARASI GUNA MENINGKATKAN SUMBER DAYA MANUSIA "</b></p>
            <h4 class="text-center">Misi</h4>
            <p>Selain penyusunan visi juga telah ditetapkan misi-misi yang memuat sesuatu pernyataan yang harus dilaksanakan oleh Desa agar tercapainya visi Desa tersebut. Visi berada di atas misi. Pernyataan visi kemudian dijabarkan ke dalam misi agar dapat di operasionalkan/dikerjakan. Sebagaimana penyusunan visi, misipun dalam penyusunannya menggunakan pendekatan partisipatif dan pertimbangan potensi dan kebutuhan Desa Lebagu sebagaimana proses yang dilakukan maka misi Desa Lebagu adalah</p>
            
            <ol>
                <li>Mewujudkan pemerintahan yang bersih dan professional serta responsif,</li>
                <li>Menyelenggarakan pelayanan masyarakat yang cepat dan prima;</li>
                <li>Melaksanakan dan memfasilitasi pembangunan yang aspiratif, bermanfaat, terpelihara dan berkelanjutan serta Peningkatan perwujudan pembangunan fisik dan infrastruktur,</li>
                <li>Mengembangkan system informasi Desa dan tata kelola yang dinamis sebagai upaya mempromosikan Desa dan kegiatan pembangunan Desa;</li>
                <li>Melaksanakan pembinaan kehidupan kemasyarakatan dengan pemberdayaan masyarakat melalui pembinaan kehidupan social budaya seperti bidang kesehatan, pendidikan, pemuda dan adat istiadat;</li>
                <li>Menjaga kondisi wilayah yang kondusif,</li>
                <li>Mewujudkan pemerataan pembangunan Desa dan berkeadilan</li>
            </ol>
          </div>
        </div>
        <div class="row content">
          <h1 class="fw-bold mb-3">Struktur Desa</h1>
          <div class="p-2 text-center">
            <img src="assets/img/struktur.jpeg" alt="" class="img-fluid rounded shadow-lg">
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
    
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2023
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }} "></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }} "></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }} "></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }} "></script>

</body>

</html>