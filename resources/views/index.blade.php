<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Landing Page</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logo bisik tangan.png') }}">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicon -->
<link href="{{ asset('assets/images/favicon.png') }}" rel="icon">
<link href="{{ asset('assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Vendor CSS Files -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Main CSS -->
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset('assets/img/logo bisik tangan.png') }}" alt="">
        <h1 class="sitename">BisikTangan</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#team">Team</a></li>     
        </ul>
      </nav>
      
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Belajar Bahasa Isyarat kini lebih mudah dan cepat!</h1>
            <p data-aos="fade-up" data-aos-delay="100">Bisik Tangan atau BiTa hadir untuk membantu kamu belajar bahasa isyarat melalui aplikasi interaktif. Bergabunglah dengan komunitas kami yang ramah dan dukung satu sama lain dalam belajar bahasa isyarat!</p>
            <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
              <a href="#about" class="btn-get-started">Mulai Belajar <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="{{asset('assets/img/women gestur.png') }}" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->

    <section id="about" class="about section">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center gx-0">
      <div class="col-lg-8 d-flex flex-column justify-content-center mx-auto text-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h2 class="mb-4">Tahukah kamu apa saja Bahasa Isyarat di Indonesia?</h2>
          <p>
            Di Indonesia, terdapat dua jenis bahasa isyarat yang umum digunakan yaitu Bahasa Isyarat Indonesia (BISINDO) dan Sistem Isyarat Bahasa Indonesia (SIBI). Perbedaan paling jelas antar keduanya adalah pada gerakan tangan, dimana BISINDO memakai dua tangan sedangkan SIBI menggunakan satu tangan.
          </p>
          <h2 class="mt-5 mb-3">Apa itu BISINDO?</h2>
          <p>
            BISINDO merupakan bahasa isyarat yang biasa digunakan oleh kalangan difabel dalam berkomunikasi sehari-hari. BISINDO tumbuh secara alami sebagai bahasa ibu bagi penyandang tunarungu dan mudah digunakan sehari-hari.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- /About Section -->

    <!-- Values Section -->
    <section id="values" class="values section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Manfaat Bahasa Isyarat</h2>
        <p>Belajar Bahasa Isyarat banyak manfaatnya loh!<br></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="{{asset('assets/img/isyarat6.png') }}" class="img-fluid" alt="">
              <h3>Mudah Berkomunikasi</h3>
              <p>Menambah kenalan dan mengajak orang lain untuk belajar bahasa isyarat</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="{{asset('assets/img/isyarat5.png') }}" class="img-fluid" alt="">
              <h3>Mengasah Kerja Otak</h3>
              <p>Motorik tangan dan kerja otak menjadi lebih seimbang dan optimal</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="{{asset('assets/img/isyarat4.png') }}" class="img-fluid" alt="">
              <h3>Menambah Kepedulian</h3>
              <p>Berkontribusi menghargai keberagaman dalam membangun indonesia yang inklusif</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="{{asset('assets/img/isyarat3.png') }}" class="img-fluid" alt="">
              <h3>Meningkatkan Toleransi</h3>
              <p>Memahami cara mereka berkomunikasi, individu menjadi lebih  menghargai perbedaan</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="{{asset('assets/img/isyarat2.png') }}" class="img-fluid" alt="">
              <h3>Menjadi Pekerjaan</h3>
              <p>Lebih mudah untuk melamar jadi penerjemah atau bidang lainnya</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="{{asset('assets/img/isyarat1.png') }}" class="img-fluid" alt="">
              <h3>Sumber Nafkah</h3>
              <p>Misalnya dengan menjadi penerjemah atau pengajar</p>
            </div>
          </div><!-- End Card Item -->

        </div>


    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title text-center mb-4" data-aos="fade-up">
        <h2 class="fw-bold">Team BisikTangan</h2>
        <p class="text-muted">Tentang Kami</p>
        <hr style="width: 60px; margin: auto; border: 2px solid #0d6efd; border-radius: 5px;">
    </div>

      <!-- End Section Title -->

<div class="container team-description mt-4 p-4 rounded shadow-sm" style="background-color: #f4f7ff;" data-aos="fade-up" data-aos-delay="100">
  <p>
    BisikTangan dibuat sebagai tugas akhir kuliah semester 4 kami di Politeknik Negeri Jember.
    Projek ini dibuat oleh Amalia Putri Nastiti, Safina Adelia Putri, Beniqno Andi P.K., Bayu Johanda, dan Dicky Aries Setiawan.
  </p>
  <p>
    Kami melihat kurangnya kesadaran masyarakat dalam mempelajari Bahasa Isyarat Indonesia, sehingga mayoritas sulit untuk berkomunikasi dengan penyandang disabilitas.
    Dengan adanya BisikTangan, kami berharap masyarakat lebih tertarik mempelajari bahasa isyarat dan membangun hubungan yang saling mendukung.
  </p>
</div>
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/tim2.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amalia Putri Nastiti</h4>
                <span>Web Developer</span>
                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/tim1.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Safina Adelia Putri</h4>
                <span>UI/UX Designer</span>
                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/tim3.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Beniqno Andi Priambudi Kusuma</h4>
                <span>Web Developer</span>
                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/tim4.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Bayu Johanda</h4>
                <span>Mobile Developer</span>
                <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid doloremque ut possimus ipsum officia.</p>
              </div>
            </div>
          </div><!-- End Team Member -->

        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/tim5.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dicky Aries Setiawan</h4>
                <span>Mobile Developer</span>
                <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid doloremque ut possimus ipsum officia.</p>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->

  </main>

  <footer id="footer" class="footer py-4" style="background-color: #1d1b2f; color: #fff;">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    
    <!-- Logo -->
    <div class="footer-logo mb-2 mb-md-0">
      <img src="assets/img/logo bisik tangan.png" alt="Bisik Tangan Logo" style="height: 200px;">
    </div>

    <!-- Links -->
    <div class="footer-links d-flex gap-4">
      <a href="#" class="text-white text-decoration-none">Syarat dan Ketentuan</a>
      <a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a>
    </div>
  </div>

  <!-- Garis & Copyright -->
  <hr class="my-3" style="border-color: #aaa;">
  <div class="text-center text-white small">
    Projek ini dibuat sebagai tugas akhir semester 4 kami di Politeknik Negeri Jember
  </div>
</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{asset('assets/js/main.js') }}"></script>

</body>

</html>