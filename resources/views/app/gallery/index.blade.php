@extends('templates.app')

@section('content-app')
    <link href="http://127.0.0.1:8000/frontend/css/style.css" rel="stylesheet">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        @foreach ($menus as $menu)
                            <li class="breadcrumb-item"><a href="{{ $menu['url'] }}">{{ $menu['title'] }}</a></li>
                        @endforeach
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $title }}
                </h4>
            </div>

            <div class="row portfolio">
                @foreach ($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app mb-3">
                        <div class="portfolio-wrap shadow">
                            <img src="{{ asset('storage/' . $gallery->document_path) }}" class="img-fluid"
                                alt="{{ $gallery->documentable->title }}" style="height: 200px; width: 100%">
                            <div class="portfolio-info">
                                <h4 class="text-capitalize">{{ $gallery->documentable->title }}</h4>
                                <p>{{ $gallery->documentable->slug }}</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('storage/' . $gallery->document_path) }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="{{ $gallery->documentable->title }}" target="_blank"><i
                                            class="uil-folder-plus"></i></a>
                                    <a href="{{ url('blog/' . $gallery->documentable->slug) }}" target="_blank"
                                        title="More Details"><i class="uil-link-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {!! $galleries->links() !!}
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
