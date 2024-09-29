@extends('layouts.main')

@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Bimbingan {{ $siswa->name }}</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('bimbingan.laporan', ['siswa_id' => $siswa->id, 'jenis_kegiatans_id' => 1]) }}" class="btn btn-primary float-right mb-4">Download Laporan</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                            <th>No</th>
                            <th>Tanggal Bimbingan</th>
                            <th>Kelas & Semester</th>
                            <th>Topik</th>
                            <th>Tujuan</th>
                            <th>Pemateri</th>
                            <th>Tempat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($kegiatan as $bimbinganSiswas)
                            @if ($bimbinganSiswas->jenis_kegiatans_id === 1)
                                <tr>
                                    <td>{{ $counter }}.</td>
                                    <td>{{ $bimbinganSiswas->tanggal }}, Pukul : {{ $bimbinganSiswas->waktu }}</td>
                                    <td>{{ $bimbinganSiswas->kelas }}, {{ $bimbinganSiswas->semester}}</td>
                                    <td>{{ $bimbinganSiswas->topik }}</td>
                                    <td>{{ $bimbinganSiswas->tujuan }}</td>
                                    <td>{{ $bimbinganSiswas->pemateri }}</td>
                                    <td>{{ $bimbinganSiswas->tempat_select }} ({{ $bimbinganSiswas->tempat }})</td>
                                    <td>
                                        <a href="{{ route('bimbingan.download', $bimbinganSiswas->id) }}" class="badge bg-success border-0">Download Surat</a>
                                        <a href="{{ route('bimbingan.edit', $bimbinganSiswas->id) }}" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('kegiatan.hapus',$bimbinganSiswas->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection