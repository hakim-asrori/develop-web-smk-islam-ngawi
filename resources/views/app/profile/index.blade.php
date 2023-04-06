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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Perbaharui Data
                        </div>
                        <form action="{{ route('web.profile.update', $user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-sm float-end mb-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Perbaharui Password
                        </div>
                        <form action="{{ route('web.profile.change.password', $user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                @if (session('messagePassword'))
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                        role="alert">
                                        {{ session('messagePassword') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label>Password yang digunakan</label>
                                    <input type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Password baru</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Konfirmasi password baru</label>
                                    <input type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password">
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-success float-end mb-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
