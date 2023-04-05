@extends('landing.layout')

@section('content')
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang di SMK Al-Islam Ngawi</h1>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>SELENGKAPNYA</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/plang_sekolahan.JPG') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>

    <main id="main">

        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Visi dan Misi</h3>
                            <h4>Visi</h4>
                            <blockquote class="text-capitalize">
                                Sebagai Lembaga Islam yang mencetak kader-kader yang siap bekerja, berwirausaha, berdaya
                                saing dalam maupun lura negeri berdasarkan islam.
                            </blockquote>
                            <h4>Misi</h4>
                            <ol>
                                <li>Mengajarkan ilmu pengetahuan agama dan umum secara seimbang menuju muslim intelek.
                                </li>
                                <li>Menanamkan nilai-nilai luhur budaya bangsa Indonesia ke dalam jiwa peserta didik.
                                </li>
                                <li>Membekali peserta didik pengetahuan yang relevan dengan tuntutan dunia kerja.</li>
                                <li>Mendidik dan mengembangkan generasi muslim berpengetahuan luas dan berkhidmat kepada
                                    masyarakat.</li>
                                <li>Membekali peserta didik dengan keterampilan penunjang yang dapat menopang bidang
                                    keahliannya.</li>
                                <li>Mempersiapkan generasi yang unggul dan berkualitas dengan dwi bahasa yaitu bahasa
                                    Inggris dan bahasa Arab</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('images/plang.JPG') }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section>

        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Ekstrakurikuler</p>
                </header>

                <div class="row">

                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('frontend') }}/img/values-1.png" class="img-fluid" alt="">
                            <h3>Scout Movement</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('frontend') }}/img/values-2.png" class="img-fluid" alt="">
                            <h3>Palang Merah Remaja</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('frontend') }}/img/values-3.png" class="img-fluid" alt="">
                            <h3>Jurnalistik</h3>
                        </div>
                    </div>

                    <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('frontend') }}/img/values-3.png" class="img-fluid" alt="">
                            <h3>English Club</h3>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('frontend') }}/img/values-1.png" class="img-fluid" alt="">
                            <h3>Sport</h3>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('frontend') }}/img/values-2.png" class="img-fluid" alt="">
                            <h3>Bela Diri Keatlitan</h3>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('frontend') }}/img/values-3.png" class="img-fluid" alt="">
                            <h3>Pecinta Alam</h3>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <section id="features" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Fasilitas</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="{{ asset('frontend') }}/img/features.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Ruang Kelas Full AC</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Full Wi-Fi</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Audio Visual</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Lab Farmasi</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Lab Komputer</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Apotek</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Aula Pertemuan</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Asrama Putra dan Putri (bagi yang mondok)</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Masjid yang luas</h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row feature-icons" data-aos="fade-up">
                    <h3>Info Beasiswa</h3>

                    <div class="row">

                        <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('frontend') }}/img/features-3.png" class="img-fluid p-4" alt="">
                        </div>

                        <div class="col-xl-8 d-flex content">
                            <div class="row align-self-center gy-4">

                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    <i class="ri-line-chart-line"></i>
                                    <div>
                                        <h4>Beasiswa Prestasi Akademik</h4>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="ri-stack-line"></i>
                                    <div>
                                        <h4>Beasiswa Prestasi Non Akademik</h4>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="ri-brush-4-line"></i>
                                    <div>
                                        <h4>Beasiswa Bidikmisi</h4>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="ri-magic-line"></i>
                                    <div>
                                        <h4>Beasiswa Bersaudara Kandung</h4>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                    <i class="ri-command-line"></i>
                                    <div>
                                        <h4>Beasiswa Tahfidz Al-Qur'an (Min. Juz 30)</h4>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                    <i class="ri-radar-line"></i>
                                    <div>
                                        <h4>Beasiswa Yatim/Piatu/Yatim & Piatu</h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Info Mitra</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide">Dinas Kesehatan kab. Ngawi</div>
                        <div class="swiper-slide">RSUD dr. Soeroto Ngawi</div>
                        <div class="swiper-slide">RSI Attin Husada Ngawi</div>
                        <div class="swiper-slide">Apotek K-24 Ngawi</div>
                        <div class="swiper-slide">Beberapa Apotek di kab. Ngawi</div>
                        <div class="swiper-slide">Akademik Farmasi Mitra Sehat Sidoarjo</div>
                        <div class="swiper-slide">Universitas Nahdlatul Ulama</div>
                        <div class="swiper-slide">Universitas 17 Agustus 1945 Surabaya</div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section>

        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Kontak Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>Jalan Raya Ngawi-Jogorogo KM.17 Pehnangka Ds. Gentong, Kec. Peron, Kab. Ngawi</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Hubungi Kami</h3>
                                    <p><a href="tel:+6285776390950">+6285776390950</a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Kami</h3>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Jam Buka</h3>
                                    <p>Senin - Jum'at<br>08.00 Pagi - 16:00 Sore</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="{{ route('web.contact.store') }}" method="post" class="php-email-form">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="nama anda"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="email anda"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="subjek"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="pesan" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan anda berhasil terkirim. Terima kasih!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
