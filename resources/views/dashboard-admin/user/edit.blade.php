@extends('dashboard-admin.layouts.main')

@section('container')
    <form class="user" method="POST" action="{{ route('user.update', $users->id) }}">
        @method('put')
        @csrf
        <div class="form-group">
            <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name', $users->name) }}" required>
        </div>
        <div class="form-group">
            <select class="form-select form-control-user" name="role" required style="width: 100%">
                <option value="" @if(old('role', $users->role) === null) selected @endif>-- Pilih Role --</option>
                <option value="guru" @if(old('role', $users->role) == 'guru') selected @endif>Guru</option>
                <option value="admin" @if(old('role', $users->role) == 'admin') selected @endif>Admin</option>
            </select>
        </div>            
        <div class="form-group">
            <input class="form-control form-control-user" id="email" type="email" name="email" value="{{ old('email', $users->email) }}" required>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Ubah</button>
        </div>
    </form>
@endsection