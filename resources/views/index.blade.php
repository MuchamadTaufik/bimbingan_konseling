@extends('layouts.main')
    @section('container')

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 mb-0" style="font-weight: 600; color : black;">SMA PASUNDAN BANJARAN</h1>
            <span class="p-0 m-0" style="font-size: 1rem; color:black;">Bimbingan dan Konseling Online</span>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Laporan Bimbingan (2024)</h6>
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
                <a href="#" class="btn btn-dark float-right mb-4"><span data-feather="download"></span> Unduh Laporan</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nomor Induk</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Topik</th>
                                <th>Tujuan</th>
                                <th>Pemateri</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>23 Mei 2024</td>
                                <td>203040142</td>
                                <td>Muchamad Taufik Mulyadi</td>
                                <td>12 MIPA 1</td>
                                <td>Beasiswa</td>
                                <td>Pemberian Beasiswa</td>
                                <td>Fikri</td>
                                <td>
                                    <a href="" class="badge bg-success border-0"><i class="bi bi-eye-fill"></i></a>
                                    <a href="" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                                    <form action="" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Laporan Konsultasi (2024)</h6>
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
                <a href="#" class="btn btn-dark float-right mb-4"><span data-feather="download"></span> Unduh Laporan</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nomor Induk</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tempat</th>
                                <th>Topik</th>
                                <th>Hasil</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1 Juli 2024</td>
                                <td>203040142</td>
                                <td>Muchamad Taufik Mulyadi</td>
                                <td>12 MIPA 1</td>
                                <td>Ruang BK</td>
                                <td>Ekstrakulikuler</td>
                                <td>Ekstrakulikuler Baru di ACC</td>
                                <td>
                                    <a href="" class="badge bg-success border-0"><i class="bi bi-eye-fill"></i></a>
                                    <a href="" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                                    <form action="" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Laporan Konsultasi (2024)</h6>
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
                <a href="#" class="btn btn-dark float-right mb-4"><span data-feather="download"></span> Unduh Laporan</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nomor Induk</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Bidang</th>
                                <th>Topik</th>
                                <th>Tujuan</th>
                                <th>Pihak yang Terlibat</th>
                                <th>Alamat</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1 Juli 2024</td>
                                <td>203040142</td>
                                <td>Muchamad Taufik Mulyadi</td>
                                <td>12 MIPA 1</td>
                                <td>Contoh Bidang</td>
                                <td>Bantuan</td>
                                <td>Memberikan bantuan kepada siswa</td>
                                <td>Siswa dan Sekolah</td>
                                <th>Jl. Cibubur Berem</th>
                                <td>
                                    <a href="" class="badge bg-success border-0"><i class="bi bi-eye-fill"></i></a>
                                    <a href="" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                                    <form action="" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection