@extends('dashboard-admin.layouts.main')

@section('container')
    <form class="user" method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name') }}" required placeholder="Masukan Nama">
        </div>
        <div class="form-group">
            <input class="form-control form-control-user" id="nomor_induk" type="number" name="nomor_induk" value="{{ old('nomor_induk') }}" required placeholder="Masukan Nomor induk">
        </div>
        <div class="form-group">
            <select class="form-select form-control-user" name="role" required style="width: 100%">
                <option value="" @if(old('role') === null) selected @endif>-- Pilih Role --</option>
                <option value="guru" @if(old('role') == 'guru') selected @endif>Guru</option>
                <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
            </select>
        </div>        
        <div class="form-group">
            <input class="form-control form-control-user" id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Masukan Alamat Email...">
        </div>
        <div class="form-group">
            <input class="form-control form-control-user" id="password" type="password" name="password" placeholder="Masukan Password...">
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Daftar</button>
        </div>
    </form>
@endsection