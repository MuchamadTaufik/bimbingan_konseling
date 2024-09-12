@extends('dashboard-admin.layouts.main')

@section('container')
    <form class="user" method="POST" action="{{ route('semester.store') }}">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name') }}" required placeholder="isi dengan format 2026/2027 Semester 1">
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Tambah</button>
        </div>
    </form>
@endsection