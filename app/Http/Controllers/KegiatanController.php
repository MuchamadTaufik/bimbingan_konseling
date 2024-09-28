<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kegiatan;
use Barryvdh\DomPDF\PDF;
use App\Models\BimbinganSiswa;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKegiatanRequest;
use App\Http\Requests\UpdateKegiatanRequest;
use App\Models\JenisKegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBimbingan()
    {
        $siswas = Siswa::with('bimbinganSiswa')->get();
        $user = Auth::user();
        return view('bimbingan_siswa.index', compact('user','siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createBimbingan(Siswa $siswa, Kegiatan $bimbinganSiswa)
    {   
        $jenisKegiatan = JenisKegiatan::find(1);
        $user = Auth::user();
        return view('bimbingan_siswa.create', compact('user', 'bimbinganSiswa','siswa', 'jenisKegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKegiatanRequest $request)
    {
        $validateData = $request->validate([
            'jenis_kegiatans_id' => 'required|exists:jenis_kegiatans,id',
            'siswa_id' => 'required|exists:siswas,id',
            'kelas' => 'required',
            'semester' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'topik' => 'required|max:255',
            'tujuan' => 'required|max:255',
            'pemateri' => 'nullable|max:255',
            'rencana_tindak_lanjut' => 'required|max:255',
            'tempat_select' => 'required|in:onsite,online',
            'tempat' => 'required'
            
        ]);

        Kegiatan::create($validateData);

        toast()->success('Berhasil', 'Data Bimbingan Berhasil ditambahkan');
        return redirect('/bimbingan')->withInput();
    }

    public function downloadBimbingan(Kegiatan $bimbinganSiswa)
    {
        // Logika untuk membuat dan mengunduh laporan (misalnya PDF)
        $pdf = app(PDF::class);
        $pdf->loadView('bimbingan_siswa.surat.index', compact('bimbinganSiswa'));

        return $pdf->download('laporan_bimbingan_siswa_'.$bimbinganSiswa->id.'.pdf');
    }


    public function rekapBimbingan(Siswa $siswa)
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
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKegiatanRequest $request, Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
}
