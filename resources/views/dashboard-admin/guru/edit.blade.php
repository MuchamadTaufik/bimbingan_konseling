@extends('dashboard-admin.layouts.main')

@section('container')
    <form class="user" method="POST" action="{{ route('guru-bk.update', $users->id) }}">
        @method('put')
        @csrf
        <div class="form-group">
            <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name', $users->name) }}" required>
        </div>
        <div class="form-group">
            <input class="form-control form-control-user" id="nomor_induk" type="number" name="nomor_induk" value="{{ old('nomor_induk', $users->nomor_induk) }}" required>
        </div>
        <div class="form-group">
            <select class="form-select form-control-user" name="semester_id" required style="width: 100%">
                <option value="" @if(old('semester_id') === null) selected @endif>-- Pilih Semester --</option>
                @foreach ($semesters as $semester)
                    <option value="{{ $semester->id }}" @if(old('semester_id', $users->semester_id) == $semester->id) selected @endif>{{ $semester->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Ubah</button>
        </div>
    </form>
@endsection