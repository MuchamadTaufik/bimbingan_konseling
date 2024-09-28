<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Barryvdh\DomPDF\PDF;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKunjunganRequest;
use App\Http\Requests\UpdateKunjunganRequest;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $kunjungan = Kunjungan::all();
        return view('kunjungan.index', compact('user','kunjungan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kunjungan $kunjungan)
    {   
        $user = Auth::user();
        $siswas = Siswa::all();
        return view('kunjungan.create', compact('user','siswas','kunjungan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKunjunganRequest $request)
    {
        $validateData = $request->validate([
            'siswa_id' => 'required',
            'tanggal' => 'required|date',
            'bidang_layanan' => 'required|max:255',
            'permasalahan' => 'required|max:255',
            'fungsi' => 'required|max:255',
            'tujuan' => 'required|max:255',
            'pihak_terlibat' => 'required|max:255',
            'alamat' => 'required|max:255',
            'anggota_keluarga' => 'required|max:255',
            'ringkasan' => 'required|max:255',
            'evaluasi' => 'required|max:255',
            'rencana_tindak_lanjut' => 'required|max:255',
            'catatan_khusus' => 'required|max:255'
        ]);

        Kunjungan::create($validateData);

        toast()->success('Berhasil', 'Data Kunjungan Berhasil di Tambahkan');
        return redirect('/kunjungan')->withInput();
    }

    public function downloadKunjungan(Kunjungan $kunjungan)
    {
        // Logika untuk membuat dan mengunduh laporan (misalnya PDF)
        $pdf = app(PDF::class);
        $pdf->loadView('kunjungan.surat.index', compact('kunjungan'));

        return $pdf->download('laporan_kunjungan_siswa_'.$kunjungan->id.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {   
        $user = Auth::user();
        $siswas = Siswa::all();
        return view('kunjungan.edit', compact('user', 'kunjungan','siswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKunjunganRequest $request, Kunjungan $kunjungan)
    {
        try {
            $rules = [
                'siswa_id' => 'required',
                'tanggal' => 'required|date',
                'bidang_layanan' => 'required|max:255',
                'permasalahan' => 'required|max:255',
                'fungsi' => 'required|max:255',
                'tujuan' => 'required|max:255',
                'pihak_terlibat' => 'required|max:255',
                'alamat' => 'required|max:255',
                'anggota_keluarga' => 'required|max:255',
                'ringkasan' => 'required|max:255',
                'evaluasi' => 'required|max:255',
                'rencana_tindak_lanjut' => 'required|max:255',
                'catatan_khusus' => 'required|max:255'
            ];

            $validateData = $request->validate($rules);

            $kunjungan->update($validateData);
            alert()->success('Berhasil', 'Data Kunjungan Berhasil diubah');
                return redirect('/kunjungan')->withInput();
            } catch (\Exception $e) {
                dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        Kunjungan::destroy($kunjungan->id);
        // Menampilkan notifikasi sukses dan redirect
        alert()->success('Success', 'Data Kunjungan Berhasil dihapus');
        return redirect('/kunjungan')->withInput();
    }
}
