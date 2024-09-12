<?php

namespace App\Http\Controllers\ControllerAdmin;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Kelas;
use App\Models\Semester;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        $kelas = Kelas::all();
        $semester = Semester::all();
        $siswa = Siswa::all();
        return view('dashboard-admin.siswa.index', compact('user','kelas','siswa','semester'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $user = Auth::user();
        $kelas = Kelas::all();
        $semesters = Semester::all();
        return view('dashboard-admin.siswa.create', compact('user','kelas','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'nomor_induk' => 'required|unique:siswas',
            'semester_id' => 'required',
            'kelas_id' => 'required'
        ]);

        Siswa::create($validateData);

        toast()->success('Berhasil', 'Siswa ditambahkan');
        return redirect('/siswa')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {   
        $user = Auth::user();
        return view('dashboard-admin.siswa.edit',[
            'siswa' => $siswa,
            'user' => $user,
            'kelas' => Kelas::all(),
            'semesters' => Semester::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        try {
            $rules = [
                'name' => 'required|max:50',
                'nomor_induk' => 'required|unique:siswas',
                'semester_id' => 'required',
                'kelas_id' => 'required'
            ];

            $validateData = $request->validate($rules);

            $siswa->update($validateData);

            alert()->success('Berhasil', 'Siswa diubah');
            return redirect('/siswa')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);

        // Menampilkan notifikasi sukses dan redirect
        alert()->success('Success', 'Siswa berhasil dihapus');
        return redirect('/siswa')->withInput();
    }
}
