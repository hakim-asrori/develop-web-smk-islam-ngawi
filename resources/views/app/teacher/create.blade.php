@php
    
@endphp

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

            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('web.teacher.store') }}" class="card" method="post">
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
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('web.teacher.index') }}" class="btn btn-sm btn-danger text-white">Batal</a>
                            <button class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
