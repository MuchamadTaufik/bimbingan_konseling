@extends('dashboard-admin.layouts.main')

@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Siswa</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('siswa.create') }}" class="btn btn-dark float-right mb-4">Tambah Siswa</a>
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
                        @foreach ($siswa as $siswas)    
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $siswas->name }}</td>
                            <td>{{ $siswas->nomor_induk }}</td>
                            <td>{{ $siswas->kelas->name }}</td>
                            <td>{{ $siswas->semester->name }}</td>
                            <td>
                                <a href="{{ route('siswa.edit', $siswas->id) }}" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('siswa.delete', $siswas->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection