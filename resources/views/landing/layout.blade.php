<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SMK Al-Islam Ngawi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <link href="{{ asset('images/logo.png') }}" rel="apple-touch-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('frontend') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">

</head>

<body>

    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="">
                <span class="text-uppercase">SMK Al-Islam</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/#about">Profil</a></li>
                    <li><a class="nav-link scrollto" href="/#features">Fasilitas</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a class="nav-link scrollto" href="/gallery">Galeri</a></li>
                    <li><a class="nav-link scrollto" href="/#clients">Info Mitra</a></li>
                    <li><a class="nav-link scrollto" href="/#contact">Kontak Kami</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('web.auth.login') }}">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                            <span>SMK AL-ISLAM</span>
                        </a>
                        <div class="social-links mt-3">
                            <a href="https://www.facebook.com/smkalislamngawi/?mibextid=ZbWKwL" target="_blank"
                                class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com/smkalislamngawi?igshid=YmMyMTA2M2Y=" target="_blank"
                                class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="https://youtube.com/@smkalislamngawi4912" target="_blank" class="youtube"><i
                                    class="bi bi-youtube"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Kontak Kami</h4>
                        <p>
                            Jalan Raya Ngawi-Jogorogo KM.17 Pehnangka Ds. Gentong, Kec. Peron, Kab. Ngawi <br><br>
                            <strong>Phone:</strong> <a href="tel:+6285776390950">+6285776390950</a><br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>SMK Al-Islam Ngawi</span></strong>.
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('frontend') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('frontend') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/php-email-form/validate.js"></script>

    <script src="{{ asset('frontend') }}/js/main.js"></script>

</body>

</html>
