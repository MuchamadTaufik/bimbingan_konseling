@extends('layouts.main')

@section('container')
    <form class="user" method="POST" action="{{ route('kunjungan.update', $kunjungan->id) }}">
        @method('put')
        @csrf    
        <div class="form-group">
            <label for="siswa_id">Nama Siswa</label>
            <select class="form-control" id="siswa_id" name="siswa_id" required autofocus>
                <option value="" disabled selected>Pilih Siswa</option>
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ (old('siswa_id', $kunjungan->siswa_id) == $siswa->id) ? 'selected' : '' }}>
                        {{ $siswa->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="tanggal">Tanggal Kunjungan</label>
            <input class="form-control form-control-user" id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $kunjungan->tanggal) }}" required>
        </div>
        <div class="form-group">
            <label for="bidang_layanan">Bidang Layanan</label>
            <input class="form-control form-control-user" id="bidang_layanan" type="text" name="bidang_layanan" value="{{ old('bidang_layanan', $kunjungan->bidang_layanan) }}" required>
        </div>
        <div class="form-group">
            <label for="permasalahan">Permasalahan</label>
            <input class="form-control form-control-user" id="permasalahan" type="text" name="permasalahan" value="{{ old('permasalahan', $kunjungan->permasalahan) }}" required>
        </div>
        <div class="form-group">
            <label for="fungsi">Fungsi Kunjungan</label>
            <input class="form-control form-control-user" id="fungsi" type="text" name="fungsi" value="{{ old('fungsi', $kunjungan->fungsi) }}" required>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan Kunjungan</label>
            <input class="form-control form-control-user" id="tujuan" type="text" name="tujuan" value="{{ old('tujuan', $kunjungan->tujuan) }}" required>
        </div>
        <div class="form-group">
            <label for="pihak_terlibat">Pihak Yang Terlibat</label>
            <input class="form-control form-control-user" id="pihak_terlibat" type="text" name="pihak_terlibat" value="{{ old('pihak_terlibat', $kunjungan->pihak_terlibat) }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control form-control-user" id="alamat" type="text" name="alamat" value="{{ old('alamat', $kunjungan->alamat) }}" required>
        </div>
        <div class="form-group">
            <label for="anggota_keluarga">Anggota Keluarga Yang di Kunjungi</label>
            <input class="form-control form-control-user" id="anggota_keluarga" type="text" name="anggota_keluarga" value="{{ old('anggota_keluarga', $kunjungan->anggota_keluarga) }}" required>
        </div>
        <div class="form-group">
            <label for="ringkasan">Gambar Ringkas Masalah</label>
            <input class="form-control form-control-user" id="ringkasan" type="text" name="ringkasan" value="{{ old('ringkasan', $kunjungan->ringkasan) }}" required>
        </div>
        <div class="form-group">
            <label for="evaluasi">Evaluasi</label>
            <input class="form-control form-control-user" id="evaluasi" type="text" name="evaluasi" value="{{ old('evaluasi', $kunjungan->evaluasi) }}" required>
        </div>
        <div class="form-group">
            <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut</label>
            <input class="form-control form-control-user" id="rencana_tindak_lanjut" type="text" name="rencana_tindak_lanjut" value="{{ old('rencana_tindak_lanjut', $kunjungan->rencana_tindak_lanjut) }}" required>
        </div>
        <div class="form-group">
            <label for="catatan_khusus">Catatan Khusus</label>
            <input class="form-control form-control-user" id="catatan_khusus" type="text" name="catatan_khusus" value="{{ old('catatan_khusus', $kunjungan->catatan_khusus) }}" required>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Edit</button>
        </div>
    </form>
@endsection