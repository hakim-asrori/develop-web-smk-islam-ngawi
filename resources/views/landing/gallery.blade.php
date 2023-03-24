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
                    <li>Galeri</li>
                </ol>
            </div>
        </section>

        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Galeri</p>
                </header>

                @if ($galleries->count() < 0)
                    <div class="alert alert-info text-center">belum ada data terbaru</div>
                @else
                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($galleries as $gallery)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap shadow">
                                    <img src="{{ asset('storage/' . $gallery->document_path) }}" class="img-fluid"
                                        alt="{{ $gallery->documentable->title }}" style="height: 200px; width: 100%">
                                    <div class="portfolio-info">
                                        <h4 class="text-capitalize">{{ $gallery->documentable->title }}</h4>
                                        <p>{{ $gallery->documentable->slug }}</p>
                                        <div class="portfolio-links">
                                            <a href="{{ asset('storage/' . $gallery->document_path) }}"
                                                data-gallery="portfolioGallery" class="portfokio-lightbox"
                                                title="{{ $gallery->documentable->title }}"><i class="bi bi-plus"></i></a>
                                            <a href="{{ url('blog/' . $gallery->documentable->slug) }}"
                                                title="More Details"><i class="bi bi-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {!! $galleries->links() !!}
                    </div>
                @endif

            </div>

        </section>

    </main>
@endsection
