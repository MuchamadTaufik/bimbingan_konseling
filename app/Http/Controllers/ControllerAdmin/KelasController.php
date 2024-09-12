<?php

namespace App\Http\Controllers\ControllerAdmin;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $kelas = Kelas::all();
        $user = Auth::user();
        return view('dashboard-admin.kelas.index', compact('user','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('dashboard-admin.kelas.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:kelas',
        ]);

        Kelas::create($validateData);

        toast()->success('Berhasil', 'Kelas ditambahkan');
        return redirect('/kelas')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {   
        $user = Auth::user();
        return view('dashboard-admin.kelas.edit', [
            'user' => $user,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        try {
            $rules = [
                'name' => 'required',
            ];

            $validateData = $request->validate($rules);

            $kelas->update($validateData);

            alert()->success('Berhasil','Kelas diubah');
            return redirect('/kelas')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);

        // Menampilkan notifikasi sukses dan redirect
        alert()->success('Success', 'Kelas berhasil dihapus');
        return redirect('/kelas')->withInput();
    }
}
