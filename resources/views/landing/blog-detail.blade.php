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
                    <li> <a href="{{ url('/blog') }}">Berita Terkini</a></li>
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
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"
                                            style="cursor: default">{{ $blog->user ? $blog->user->name : 'User Remover' }}</a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"
                                            style="cursor: default"><time
                                                datetime="{{ $blog->created_at }}">{{ Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->isoFormat('dddd, D MMMM Y') }}</time></a>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                            href="#">{{ $blog->counters->count() }}
                                            Pengunjung</a>
                                    </li>
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

                            <h3 class="sidebar-title">Cari</h3>
                            <div class="sidebar-item search-form">
                                <form action="{{ route('web.blog') }}" method="get">
                                    <input type="text" name="search" value="{{ request('search') }}">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <h3 class="sidebar-title">Berita</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($newBlogs as $blog)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('storage/' . $blog->document->document_path) }}"
                                            alt="{{ $blog->title }}" height="50" width="50">
                                        <h4 class="text-capitalize"><a
                                                href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                                        </h4>
                                        <time
                                            datetime="{{ $blog->created_at }}">{{ Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->isoFormat('dddd, D MMMM Y') }}</time>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection
