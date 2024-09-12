@extends('dashboard-admin.layouts.main')

@section('container')
    <form class="user" method="POST" action="{{ route('siswa.update', $siswa->id) }}">
        @method('put')
        @csrf
        <div class="form-group">
            <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name', $siswa->name) }}" required>
        </div>
        <div class="form-group">
            <input class="form-control form-control-user" id="nomor_induk" type="number" name="nomor_induk" value="{{ old('nomor_induk', $siswa->nomor_induk) }}" required>
        </div>
        <div class="form-group">
            <select class="form-select form-control-user" name="kelas_id" required style="width: 100%">
                <option value="" @if(old('kelas_id') === null) selected @endif>-- Pilih Kelas --</option>
                @foreach ($kelas as $kelases)
                    <option value="{{ $kelases->id }}" @if(old('kelas_id', $siswa->kelas_id) == $kelases->id) selected @endif>{{ $kelases->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="form-select form-control-user" name="semester_id" required style="width: 100%">
                <option value="" @if(old('semester_id') === null) selected @endif>-- Pilih Semester --</option>
                @foreach ($semesters as $semester)
                    <option value="{{ $semester->id }}" @if(old('semester_id', $siswa->semester_id) == $semester->id) selected @endif>{{ $semester->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Ubah</button>
        </div>
    </form>
@endsection