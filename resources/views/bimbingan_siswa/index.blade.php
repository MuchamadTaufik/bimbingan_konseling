@extends('layouts.main')

@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Bimbingan Siswa</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Pilih Tahun :</div>
                </div>
            </div>
        </div>
        <div class="card-body">
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
                            <td>
                                <a href="" class="btn btn-success" style="text-decoration: none;">Pilih Siswa dan Lanjutkan</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection