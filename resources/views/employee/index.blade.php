@extends('layouts.app')

@section('content')
    <div class="container">
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
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection