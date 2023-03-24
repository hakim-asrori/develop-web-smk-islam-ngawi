@extends('templates.auth')

@section('auth-content')
    <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <div class="auth-brand text-center text-lg-start">
                        <a href="index.html" class="logo-dark">
                            <span><img src="{{ asset('images/logo.png') }}" alt="" height="80"></span>
                        </a>
                        <a href="index.html" class="logo-light">
                            <span><img src="{{ asset('images/logo.png') }}" alt="" height="80"></span>
                        </a>
                    </div>

                    <h4 class="mt-0">MASUK</h4>
                    <p class="text-muted mb-4">Masukan email dan password anda untuk mengakses halaman selanjutnya.</p>

                    <form action="{{ route('web.auth.login.process') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Alamat Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                id="emailaddress" placeholder="Masukan email anda">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" id="password" placeholder="Masukan password anda">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> MASUK
                            </button>
                        </div>
                    </form>

                    <footer class="footer footer-alt">
                        <p class="text-muted"> &copy; Copyright <strong><span>SMK Al-Islam Ngawi</span></strong>.</p>
                    </footer>

                </div>
            </div>
        </div>

        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">SMK AL-ISLAM</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> Kompetensi Keahlian : FARMASI . <i
                        class="mdi mdi-format-quote-close"></i>
                </p>
            </div>
        </div>
    </div>
@endsection

@push('js')
    @if (session('message'))
        {!! session('message') !!}
    @endif
@endpush
