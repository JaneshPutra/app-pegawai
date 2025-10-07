@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tambah Pegawai</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employee.form')
    </form>
</div>

@endsection
