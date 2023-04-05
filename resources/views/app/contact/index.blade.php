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

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="contactTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengirim</th>
                                    <th>Email Pengirim</th>
                                    <th>Subjek Pengirim</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr class="{{ $contact->status ? '' : 'table-success' }}">
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>
                                            <a href="{{ route('web.contact.show', $contact->id) }}"
                                                class="btn btn-sm btn-info">Detail</a>
                                            <button class="btn btn-danger btn-sm" id="hapus"
                                                data-url="{{ route('web.contact.destroy', $contact->id) }}">Hapus</button>
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
    <script>
        $("#contactTable").dataTable()

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
    </script>
@endpush
