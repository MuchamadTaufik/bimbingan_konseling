@extends('layouts.main')

@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Konsultasi {{ $siswa->name }}</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('konsultasi.laporan', ['siswa_id' => $siswa->id, 'jenis_kegiatans_id' => 2]) }}" class="btn btn-primary float-right mb-4">Download Laporan</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                            <th>No</th>
                            <th>Tanggal Konsultasi</th>
                            <th>Kelas & Semester</th>
                            <th>Topik</th>
                            <th>Tujuan</th>
                            <th>Tempat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($kegiatan as $konsultasiSiswas)
                            @if ($konsultasiSiswas->jenis_kegiatans_id === 2)
                                <tr>
                                    <td>{{ $counter }}.</td>
                                    <td>{{ $konsultasiSiswas->tanggal }}, Pukul : {{ $konsultasiSiswas->waktu }}</td>
                                    <td>{{ $konsultasiSiswas->kelas }}, {{ $konsultasiSiswas->semester}}</td>
                                    <td>{{ $konsultasiSiswas->topik }}</td>
                                    <td>{{ $konsultasiSiswas->tujuan }}</td>
                                    <td>{{ $konsultasiSiswas->tempat_select }} ({{ $konsultasiSiswas->tempat }})</td>
                                    <td>
                                        <a href="{{ route('konsultasi.download', $konsultasiSiswas->id) }}" class="badge bg-success border-0">Download Surat</a>
                                        <a href="{{ route('konsultasi.edit', $konsultasiSiswas->id) }}" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('kegiatan.hapus', $konsultasiSiswas->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection