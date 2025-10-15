@extends('layouts.app')

@section('content')
    <div class="container">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <h2 class="mb-4">Daftar Pegawai</h2>

        <div class="mb-3 text-end">
            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                + Tambah Pegawai
            </a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->nama_lengkap }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->nomor_telepon }}</td>
                        <td>{{ $employee->tanggal_lahir }}</td>
                        <td>{{ $employee->alamat }}</td>
                        <td>{{ $employee->tanggal_masuk }}</td>
                        <td>{{ $employee->status }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                            <!-- <a href="{{ route('employees.destroy', $employee->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a> -->
                            <!-- <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="confirmAction()">Delete</button>
                                    </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">

        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Anda Yakin Untuk Menghapus Data Ini??`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })

                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });



    </script>
@endsection