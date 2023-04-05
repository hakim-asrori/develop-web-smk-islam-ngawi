@extends('templates.app')

@section('content-app')
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

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('web.contact.index') }}" class="btn btn-sm btn-warning text-white">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Pengirim</label>
                        <input type="text" disabled class="form-control" value="{{ $contact->name }}">
                    </div>
                    <div class="mb-3">
                        <label>Email Pengirim</label>
                        <input type="text" disabled class="form-control" value="{{ $contact->email }}">
                    </div>
                    <div class="mb-3">
                        <label>Subjek Pengirim</label>
                        <input type="text" disabled class="form-control" value="{{ $contact->subject }}">
                    </div>
                    <div class="mb-3">
                        <label>Pesan Pengirim</label>
                        <textarea class="form-control" disabled>{{ $contact->message }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
