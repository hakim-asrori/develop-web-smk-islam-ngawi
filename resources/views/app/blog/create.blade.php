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

            <form action="{{ route('web.blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title">Judul Konten</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Isi Konten</label>
                                    <div id="snow-editor" style="height: 300px;" onkeyup="sendToTextarea()">Konten yang
                                        ingin dibuat</div>
                                    <textarea name="content" hidden></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Upload Thumbnail</label>
                                    <input type="file" name="thumbnail"
                                        class="form-control @error('thumbnail') is-invalid @enderror">
                                    @error('thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Upload Galeri</label>
                                    <input type="file" multiple name="galleries[]" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('web.blog.index') }}" class="btn btn-sm btn-danger text-white">Batal</a>
                                <button class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets') }}/js/vendor/quill.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/dropzone.min.js"></script>
    <script src="{{ asset('assets') }}/js/ui/component.fileupload.js"></script>
    <script>
        var quill = new Quill("#snow-editor", {
            theme: "snow",
            modules: {
                toolbar: [
                    [{
                        font: []
                    }, {
                        size: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                    [{
                        script: "super"
                    }, {
                        script: "sub"
                    }],
                    [{
                        header: [!1, 1, 2, 3, 4, 5, 6]
                    }, "blockquote", "code-block"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }, {
                        indent: "-1"
                    }, {
                        indent: "+1"
                    }],
                    ["direction", {
                        align: []
                    }],
                    ["link", "video"],
                    ["clean"]
                ]
            }
        })
        $("textarea").html(quill.root.innerHTML)

        function sendToTextarea() {
            $("textarea").html(quill.root.innerHTML)
        }
    </script>
@endpush
