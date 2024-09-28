@extends('layouts.main')

@section('container')
    <form class="user" method="POST" action="{{ route('kegiatan.store') }}">
        @csrf
        <div class="form-group">
            <input type="hidden" name="jenis_kegiatans_id" value="{{ $jenisKegiatan->id }}">
        </div>        
        <div class="form-group">
            <label for="siswa_id">Nama Siswa</label>
            <input class="form-control form-control-user" id="siswa_id" type="text" name="siswa_id" value="{{ old('siswa_id', $siswa->name) }}" readonly>
            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input class="form-control form-control-user" id="kelas" type="text" name="kelas" value="{{ old('kelas', $siswa->kelas->name) }}" readonly>
            <input type="hidden" name="kelas" value="{{ $siswa->kelas->name }}">
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input class="form-control form-control-user" id="semester" type="text" name="semester" value="{{ old('semester', $siswa->semester->name) }}" readonly>
            <input type="hidden" name="semester" value="{{ $siswa->semester->name }}">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal Konsultasi</label>
            <input class="form-control form-control-user" id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal) }}" required>
        </div>
        <div class="form-group">
            <label for="waktu">Waktu Konsultasi</label>
            <input class="form-control form-control-user" id="waktu" type="time" name="waktu" value="{{ old('waktu', $kegiatan->waktu) }}" required>
        </div>
        <div class="form-group">
            <label for="topik">Topik Konsultasi</label>
            <input class="form-control form-control-user" id="topik" type="text" name="topik" value="{{ old('topik', $kegiatan->topik) }}" required>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan Konsultasi</label>
            <input class="form-control form-control-user" id="tujuan" type="text" name="tujuan" value="{{ old('tujuan', $kegiatan->tujuan) }}" required>
        </div>
        <div class="form-group">
            <label for="rencana_tindak_lanjut">Rencana Tidak Lanjut</label>
            <input class="form-control form-control-user" id="rencana_tindak_lanjut" type="text" name="rencana_tindak_lanjut" value="{{ old('rencana_tindak_lanjut', $kegiatan->rencana_tindak_lanjut) }}" required>
        </div>
        <div class="form-group">
            <label for="tempat_select">Pilih Tempat</label>
            <select class="form-control" id="tempat_select" name="tempat_select">
                <option value="">Pilih</option>
                <option value="onsite">Onsite</option>
                <option value="online">Online</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tempat">Tempat</label>
            <input class="form-control form-control-user" id="tempat" type="text" name="tempat" value="{{ old('tempat', $kegiatan->tempat) }}" required>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Tambah</button>
        </div>
    </form>
@endsection