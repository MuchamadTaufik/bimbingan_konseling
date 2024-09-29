<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kegiatan;
use Barryvdh\DomPDF\PDF;
use App\Models\JenisKegiatan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKegiatanRequest;
use App\Http\Requests\UpdateKegiatanRequest;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBimbingan()
    {
        $siswas = Siswa::with('kegiatan')->get();
        $user = Auth::user();
        return view('bimbingan_siswa.index', compact('user','siswas'));
    }

    public function indexKonsultasi()
    {   
        $siswas = Siswa::with('kegiatan')->get();
        $user = Auth::user();
        return view('konsultasi_siswa.index', compact('user','siswas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createBimbingan(Siswa $siswa, Kegiatan $kegiatan)
    {   
        $jenisKegiatan = JenisKegiatan::find(1);
        $user = Auth::user();
        return view('bimbingan_siswa.create', compact('user', 'kegiatan','siswa', 'jenisKegiatan'));
    }

    public function createKonsultasi(Siswa $siswa, Kegiatan $kegiatan)
    {   
        $jenisKegiatan = JenisKegiatan::find(2);
        $user = Auth::user();
        return view('konsultasi_siswa.create', compact('user', 'kegiatan','siswa', 'jenisKegiatan'));
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

        toast()->success('Berhasil', 'Data Kegiatan Berhasil ditambahkan');
        return redirect('/')->withInput();
    }

    public function downloadBimbingan(Kegiatan $kegiatan)
    {
        // Logika untuk membuat dan mengunduh laporan (misalnya PDF)
        $pdf = app(PDF::class);
        $pdf->loadView('bimbingan_siswa.surat.index', compact('kegiatan'));

        return $pdf->download('laporan_bimbingan_siswa_'.$kegiatan->id.'.pdf');
    }

    public function downloadKonsultasi(Kegiatan $kegiatan)
    {
        // Logika untuk membuat dan mengunduh laporan (misalnya PDF)
        $pdf = app(PDF::class);
        $pdf->loadView('konsultasi_siswa.surat.index', compact('kegiatan'));

        return $pdf->download('laporan_konsultasi_siswa_'.$kegiatan->id.'.pdf');
    }


    public function rekapBimbingan(Siswa $siswa)
    {   
        $user = Auth::user();
        $kegiatan = $siswa->kegiatan;
        return view('bimbingan_siswa.rekap.index',[
            'user' => $user,
            'kegiatan' => $kegiatan,
            'siswa' => $siswa
        ]);
    }

    public function rekapKonsultasi(Siswa $siswa)
    {   
        $user = Auth::user();
        $kegiatan = $siswa->kegiatan;
        return view('konsultasi_siswa.rekap.index',[
            'user' => $user,
            'kegiatan' => $kegiatan,
            'siswa' => $siswa
        ]);
    }
    
    public function downloadLaporanBimbingan($siswa_id, $jenis_kegiatans_id)
    {
        // Mengambil kegiatan dengan eager loading siswa
        $kegiatan = Kegiatan::with('siswa')
            ->where('siswa_id', $siswa_id)
            ->where('jenis_kegiatans_id', $jenis_kegiatans_id)
            ->get();

        $pdf = app(PDF::class);
        $pdf->loadView('bimbingan_siswa.rekap.surat', compact('kegiatan'));

        return $pdf->download('rekapan_bimbingan_siswa.pdf');
    }

    public function downloadLaporanBimbinganRekapitulasi($jenis_kegiatans_id)
    {
        // Mengambil kegiatan dengan eager loading siswa
        $kegiatan = Kegiatan::with('siswa') // Pastikan untuk menghubungkan dengan model Siswa
            ->where('jenis_kegiatans_id', $jenis_kegiatans_id)
            ->get();

        // Menyiapkan PDF
        $pdf = app(PDF::class);
        $pdf->loadView('bimbingan_siswa.laporan', compact('kegiatan'));

        // Mengunduh file PDF
        return $pdf->download('rekapitulasi_bimbingan.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editBimbingan( Kegiatan $kegiatan)
    {   
        $user = Auth::user();
        $kegiatan->waktu = Carbon::parse($kegiatan->waktu)->format('H:i');
        return view('bimbingan_siswa.edit',compact('user', 'kegiatan'));
    }

    public function editKonsultasi(Kegiatan $kegiatan)
    {
        $user = Auth::user();
        $kegiatan->waktu = Carbon::parse($kegiatan->waktu)->format('H:i');
        return view('konsultasi_siswa.edit', compact('user','kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKegiatanRequest $request, Kegiatan $kegiatan)
    {   
        try {
            $rules = [
                'jenis_kegiatans_id' => 'required|exists:jenis_kegiatans,id',
                'siswa_id' => 'required',
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
            ];
            $validateData = $request->validate($rules);

            // Update the rest of the data
            $kegiatan->update($validateData);

            alert()->success('Berhasil', 'Data Kegiatan Berhasil diubah');
                return redirect('/')->withInput();
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->id);
        // Menampilkan notifikasi sukses dan redirect
        alert()->success('Success', 'Data Kegiatan Berhasil dihapus');
        return redirect('/')->withInput();
    }
}
