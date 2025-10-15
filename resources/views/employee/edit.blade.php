@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Pegawai</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employees.update', $employee->id) }}" method="PUT">
            @csrf
            @method('PUT')
            @include('employee.formedit', ['employee' => $employee])
        </form>
    </div>
@endsection