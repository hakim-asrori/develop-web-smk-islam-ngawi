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
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @if (session('message'))
        {!! session('message') !!}
    @endif
    <script>
        $("body").on('click', "#status", function() {
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
