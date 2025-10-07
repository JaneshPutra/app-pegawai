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
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('employee.form', ['employee' => $employee])
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection-