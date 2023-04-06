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

            <form action="{{ route('web.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title">Judul Konten</label>
                                    <input type="text" id="title" name="title"
                                        value="{{ old('title') ? old('title') : $blog->title }}"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Isi Konten</label>
                                    <div id="snow-editor" style="height: 300px;" onkeyup="sendToTextarea()">
                                        {!! $blog->content !!}</div>
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
                                    @if ($blog->document)
                                        <div class="card mt-1 mb-0 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <img data-dz-thumbnail
                                                            src="{{ url('storage/' . $blog->document->document_path) }}"
                                                            class="avatar-sm rounded bg-light" alt="">
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);" class="text-muted fw-bold"
                                                            data-dz-name>{{ $blog->document->document_name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label>Upload Galeri</label>
                                    <input type="file" multiple name="galleries[]" class="form-control">
                                    @if ($blog->documents)
                                        @foreach ($blog->documents as $document)
                                            @if (!$document->is_thumbnail)
                                                <div class="card mt-1 mb-0 shadow-none border">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <img data-dz-thumbnail
                                                                    src="{{ url('storage/' . $document->document_path) }}"
                                                                    class="avatar-sm rounded bg-light" alt="">
                                                            </div>
                                                            <div class="col ps-0">
                                                                <a href="javascript:void(0);" class="text-muted fw-bold"
                                                                    data-dz-name>{{ $document->document_name }}</a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="{{ route('web.blog.delete.document', [$document->id, $blog->id]) }}"
                                                                    class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                                    &times;
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
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
    @if (session('message'))
        {!! session('message') !!}
    @endif
@endpush
