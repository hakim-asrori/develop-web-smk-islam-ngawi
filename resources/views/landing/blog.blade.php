@extends('landing.layout')

@section('content')
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li>
                        <a href="https://rtqulilalbab.com">Home</a>
                    </li>
                    <li>Blog</li>
                </ol>
            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="https://rtqulilalbab.com/storage/foto/GusS6ljhsfMffrp2MR2b8gMNU64Nh6Z244pJm8WW.jpg"
                                        class="card-img-top py-2 px-5" alt="Rtq Griya Mucasim UlilAlbab">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase"><b>Rtq Griya Mucasim UlilAlbab</b></h5>
                                        <div class="entry-meta">
                                            <ul>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> &nbsp;
                                                    <a>
                                                        Syekh Luqman Hakim
                                                    </a>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-clock"></i> &nbsp;
                                                    <a>
                                                        Selasa, 25 Oktober 2022
                                                    </a>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-tags"></i> &nbsp;
                                                    <a>
                                                        Diskusi
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="https://rtqulilalbab.com/rtq-griya-mucasim-ulilalbab"
                                            class="btn btn-primary">Selanjutnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Cari</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <h3 class="sidebar-title">Kategori</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li>
                                        <a href="https://rtqulilalbab.com/diskusi"> Diskusi
                                            <span>(2)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="sidebar-title">Post Terbaru</h3>
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="https://rtqulilalbab.com/storage/foto/GusS6ljhsfMffrp2MR2b8gMNU64Nh6Z244pJm8WW.jpg"
                                        alt="Rtq Griya Mucasim UlilAlbab" height="50" width="50">
                                    <h4 class="text-capitalize"><a
                                            href="https://rtqulilalbab.com/rtq-griya-mucasim-ulilalbab">Rtq Griya Mucasim
                                            UlilAlbab</a>
                                    </h4>
                                    <time datetime="2022-10-25 11:48:52">Okt 25, 2022</time>
                                </div>
                                <div class="post-item clearfix">
                                    <img src="https://rtqulilalbab.com/storage/foto/gKgCOMvrzmJK9jBPX43ahhNZMi0IPKIWG4fN5E1p.jpg"
                                        alt="ggg" height="50" width="50">
                                    <h4 class="text-capitalize"><a href="https://rtqulilalbab.com/ggg">ggg</a>
                                    </h4>
                                    <time datetime="2022-09-20 12:35:24">Sep 20, 2022</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
