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
                    <li>Kurikulum dan Kesiswaan</li>
                </ol>
            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Kurikulum dan Kesiswaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($curricula->count() < 1)
                                        <tr>
                                            <td colspan="2">Data belum tersedia</td>
                                        </tr>
                                    @else
                                        @foreach ($curricula as $curriculum)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('web.curriculum.show', $curriculum->id) }}"
                                                        target="_blank">{{ $curriculum->title }}</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
