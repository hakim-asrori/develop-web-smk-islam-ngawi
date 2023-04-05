@php
    use Carbon\Carbon;
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
                <h4 class="page-title">{{ $title }} &nbsp;&nbsp; <a href="{{ route('web.blog.create') }}"
                        class="btn btn-primary btn-sm">Tambah</a>
                </h4>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="blogTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->user->name }}</td>
                                        <td>
                                            @if ($blog->status)
                                                <input type="checkbox" id="status-{{ $blog->id }}"
                                                    data-id="{{ $blog->id }}" checked data-switch="bool" /><label
                                                    for="status-{{ $blog->id }}" data-on-label="On"
                                                    data-off-label="Off"></label>
                                            @else
                                                <input type="checkbox" id="status-{{ $blog->id }}"
                                                    data-id="{{ $blog->id }}" data-switch="bool" /><label
                                                    for="status-{{ $blog->id }}" data-on-label="On"
                                                    data-off-label="Off"></label>
                                            @endif
                                        </td>
                                        <td>
                                            {{ Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->isoFormat('D MMMM Y') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('web.blog.edit', $blog->id) }}"
                                                class="btn btn-warning btn-sm text-white me-2">Edit</a>
                                            <button class="btn btn-danger btn-sm" id="hapus"
                                                data-url="{{ route('web.blog.destroy', $blog->id) }}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    @if (session('message'))
        {!! session('message') !!}
    @endif
    <script>
        $("body").on("click", "input[type='checkbox']", function() {
            $.ajax({
                url: '{{ url('app/blog/update-status') }}/' + $(this).data('id'),
                type: "post",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        title: "Selamat!",
                        text: "Data berhasil diperbaharui",
                        icon: "success"
                    }).then((result) => {
                        window.location.reload()
                    })
                },
                error: function(response) {
                    Swal.fire({
                        title: "Ooops!",
                        text: "Data gagal dihapus",
                        icon: "error"
                    })
                }
            })
        })

        $("body").on("click", "#hapus", function() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $(this).data('url'),
                        type: "post",
                        data: {
                            _method: "delete",
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Selamat!",
                                text: "Data berhasil dihapus",
                                icon: "success"
                            }).then((result) => {
                                window.location.reload()
                            })
                        },
                        error: function(response) {
                            Swal.fire({
                                title: "Ooops!",
                                text: "Data gagal dihapus",
                                icon: "error"
                            })
                        }
                    })
                }
            })
        })
    </script>
@endpush
