@php
    
@endphp

@extends('templates.app')

@section('content-app')
    <link href="{{ asset('assets/css') }}/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css') }}/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
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

            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('web.user.store') }}" class="card" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Isi Konten</label>
                                <div id="snow-editor" style="height: 300px;">
                                    <h3><span class="ql-size-large">Hello World!</span></h3>
                                    <p><br></p>
                                    <h3>This is an simple editable area.</h3>
                                    <p><br></p>
                                    <ul>
                                        <li>
                                            Select a text to reveal the toolbar.
                                        </li>
                                        <li>
                                            Edit rich document on-the-fly, so elastic!
                                        </li>
                                    </ul>
                                    <p><br></p>
                                    <p>
                                        End of simple area
                                    </p>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('web.user.index') }}" class="btn btn-sm btn-danger text-white">Batal</a>
                            <button class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- quill js -->
    <script src="{{ asset('assets') }}/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="{{ asset('assets') }}/js/pages/demo.quilljs.js"></script>
@endpush
