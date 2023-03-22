@php
    use Carbon\Carbon;
@endphp
@extends('landing.layout')

@section('content')
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li> <a href="{{ url('/blog') }}">Blog</a></li>
                    <li>{{ $blog->title }}</li>
                </ol>
            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="{{ asset('storage/' . $blog->document->document_path) }}" alt=""
                                    class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">{{ $blog->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="#"><time
                                                datetime="{{ $blog->created_at }}">{{ Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->isoFormat('dddd, D MMMM Y') }}</time></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                {!! $blog->content !!}
                            </div>


                            <div class="entry-footer">
                                <section id="portfolio" class="portfolio">

                                    <div class="container" data-aos="fade-up">
                                        <h2 class="entry-title">
                                            <p>Galeri</p>
                                        </h2>

                                        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                                            @foreach ($blog->documents as $gallery)
                                                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                                    <div class="portfolio-wrap shadow">
                                                        <img src="{{ asset('storage/' . $gallery->document_path) }}"
                                                            class="img-fluid" alt="{{ $gallery->documentable->title }}"
                                                            style="height: 200px; width: 100%">
                                                        <div class="portfolio-info">
                                                            <h4 class="text-capitalize">{{ $gallery->documentable->title }}
                                                            </h4>
                                                            <p>{{ $gallery->documentable->slug }}</p>
                                                            <div class="portfolio-links">
                                                                <a href="{{ asset('storage/' . $gallery->document_path) }}"
                                                                    data-gallery="portfolioGallery"
                                                                    class="portfokio-lightbox text-white"
                                                                    title="{{ $blog->title }}">Lihat</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>

                                </section>
                            </div>
                        </article>


                    </div>


                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li><a href="#">General <span>(25)</span></a></li>
                                    <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                    <li><a href="#">Travel <span>(5)</span></a></li>
                                    <li><a href="#">Design <span>(22)</span></a></li>
                                    <li><a href="#">Creative <span>(8)</span></a></li>
                                    <li><a href="#">Educaion <span>(14)</span></a></li>
                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                                    <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                                    <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                                    <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                                    <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                                    <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>

                            </div><!-- End sidebar recent posts-->

                            <h3 class="sidebar-title">Tags</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    <li><a href="#">App</a></li>
                                    <li><a href="#">IT</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Mac</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Office</a></li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Studio</a></li>
                                    <li><a href="#">Smart</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div><!-- End sidebar tags-->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section>
    </main>
@endsection
