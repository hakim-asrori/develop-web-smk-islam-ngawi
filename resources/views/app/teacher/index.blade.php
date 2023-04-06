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
                <h4 class="page-title">{{ $title }} &nbsp;&nbsp; <a href="{{ route('web.teacher.create') }}"
                        class="btn btn-primary btn-sm">Tambah</a>
                </h4>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="userTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('web.teacher.edit', $user->id) }}"
                                                class="btn btn-warning btn-sm text-white me-2">Edit</a>
                                            <button class="btn btn-danger btn-sm" id="hapus"
                                                data-url="{{ route('web.teacher.destroy', $user->id) }}">Hapus</button>
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
        $("#userTable").dataTable()

        $("body").on("click", "#hapus", function() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
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

        $("body").on("click", "#changeRole", function() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "data ini akan diperbaharui!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Simpan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $(this).data('url'),
                        type: "post",
                        data: {
                            _method: "put",
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
                                text: "Data gagal diperbaharui",
                                icon: "error"
                            })
                        }
                    })
                }
            })
        })
    </script>
@endpush
