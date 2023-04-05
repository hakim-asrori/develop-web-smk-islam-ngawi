@extends('templates.app')

@section('content-app')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $title }}</h4>
            </div>

            <div class="alert alert-success">
                Selamat Datang <b>{{ auth()->user()->name }}</b>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <a href="{{ route('web.user.index') }}" class="card tilebox-one">
                        <div class="card-body">
                            <i class='uil uil-users-alt float-end'></i>
                            <h6 class="text-uppercase mt-0">Jumlah Pengguna</h6>
                            <h2 class="my-2" id="active-users-count">{{ $users->count() }}</h2>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ route('web.blog.index') }}" class="card tilebox-one">
                        <div class="card-body">
                            <i class='uil uil-package float-end'></i>
                            <h6 class="text-uppercase mt-0">Jumlah Blog</h6>
                            <h2 class="my-2" id="active-users-count">{{ $blogs->count() }}</h2>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ route('web.gallery.index') }}" class="card tilebox-one">
                        <div class="card-body">
                            <i class='uil uil-comment-alt-image float-end'></i>
                            <h6 class="text-uppercase mt-0">Jumlah Galeri</h6>
                            <h2 class="my-2" id="active-users-count">{{ $galleries->count() }}</h2>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ route('web.contact.index') }}" class="card tilebox-one">
                        <div class="card-body">
                            <i class='mdi mdi-contacts float-end'></i>
                            <h6 class="text-uppercase mt-0">Jumlah Kontak</h6>
                            <h2 class="my-2" id="active-users-count">{{ $contacts->count() }}</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
