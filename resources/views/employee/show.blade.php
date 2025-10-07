@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Detail Pegawai</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama:</strong> {{ $employee->nama_lengkap }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $employee->email }}</li>
        <li class="list-group-item"><strong>Telepon:</strong> {{ $employee->nomor_telepon }}</li>
        <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ $employee->tanggal_lahir }}</li>
        <li class="list-group-item"><strong>Alamat:</strong> {{ $employee->alamat }}</li>
        <li class="list-group-item"><strong>Tanggal Masuk:</strong> {{ $employee->tanggal_masuk }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $employee->status }}</li>
    </ul>
    
</div>
@endsection
