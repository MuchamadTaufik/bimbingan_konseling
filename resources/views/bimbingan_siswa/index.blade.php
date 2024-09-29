@extends('layouts.main')

@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Bimbingan Siswa</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('laporan.rekapitulasi', ['jenis_kegiatans_id' => 1]) }}" class="btn btn-primary float-right mb-4">Download Laporan</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Induk</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                            <th>Rekap Bimbingan</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach ($siswas as $siswa)    
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $siswa->name }}</td>
                            <td>{{ $siswa->nomor_induk }}</td>
                            <td>{{ $siswa->kelas->name }}</td>
                            <td>{{ $siswa->semester->name }}</td>
                            <td><a href="{{ route('bimbingan.create', $siswa->id) }}" class="btn btn-success" style="text-decoration: none;">Pilih Siswa dan Lanjutkan</a></td>
                            <td><a href="{{ route('bimbingan.rekap', $siswa->id) }}" class="btn btn-primary" style="text-decoration: none;">Rekap Bimbingan</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection