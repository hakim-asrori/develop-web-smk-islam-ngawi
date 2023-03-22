@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
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
                    <li>Blog</li>
                </ol>
            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($blogs as $blog)
                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ asset('storage/' . $blog->document->document_path) }}"
                                        alt="{{ $blog->title }}" class="img-fluid">
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
                                    <p>
                                        {{ Str::limit(strip_tags($blog->content), 200, '...') }}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ url('blog/' . $blog->slug) }}">Selengkapnya</a>
                                    </div>
                                </div>

                            </article>
                        @endforeach
                        {{ $blogs->links() }}
                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Cari</h3>
                            <div class="sidebar-item search-form">
                                <form action="" method="get">
                                    <input type="text" name="search" value="{{ request('search') }}">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <h3 class="sidebar-title">Post Terbaru</h3>
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
