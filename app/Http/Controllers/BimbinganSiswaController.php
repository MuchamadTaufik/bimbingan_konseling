<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Barryvdh\DomPDF\PDF;
use App\Models\BimbinganSiswa;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBimbinganSiswaRequest;
use App\Http\Requests\UpdateBimbinganSiswaRequest;

class BimbinganSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $siswas = Siswa::with('bimbinganSiswa')->get();
        $user = Auth::user();
        return view('bimbingan_siswa.index', compact('user','siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Siswa $siswa, BimbinganSiswa $bimbinganSiswa)
    {   
        $user = Auth::user();
        return view('bimbingan_siswa.create', compact('user', 'bimbinganSiswa','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBimbinganSiswaRequest $request)
    {
        $validateData = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'semester' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'topik' => 'required',
            'tujuan' => 'required',
            'pemateri' => 'required',
            'tempat_select' => 'required|in:onsite,online',
            'tempat' => 'required'
            
        ]);

        BimbinganSiswa::create($validateData);

        toast()->success('Berhasil', 'Data Bimbingan Berhasil ditambahkan');
        return redirect('/bimbingan')->withInput();
    }

    public function download(BimbinganSiswa $bimbinganSiswa)
    {
        // Logika untuk membuat dan mengunduh laporan (misalnya PDF)
        $pdf = app(PDF::class);
        $pdf->loadView('bimbingan_siswa.surat.index', compact('bimbinganSiswa'));

        return $pdf->download('laporan_bimbingan_siswa_'.$bimbinganSiswa->id.'.pdf');
    }

    public function rekap(Siswa $siswa)
    {   
        $user = Auth::user();
        $bimbinganSiswa = $siswa->bimbinganSiswa;
        return view('bimbingan_siswa.rekap.index',[
            'user' => $user,
            'bimbinganSiswa' => $bimbinganSiswa,
            'siswa' => $siswa
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(BimbinganSiswa $bimbinganSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BimbinganSiswa $bimbinganSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBimbinganSiswaRequest $request, BimbinganSiswa $bimbinganSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BimbinganSiswa $bimbinganSiswa)
    {
        //
    }
}
