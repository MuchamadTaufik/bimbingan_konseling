<?php

namespace App\Http\Controllers;

use App\Models\BimbinganSiswa;
use App\Http\Requests\StoreBimbinganSiswaRequest;
use App\Http\Requests\UpdateBimbinganSiswaRequest;
use Illuminate\Support\Facades\Auth;

class BimbinganSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        return view('bimbingan_siswa.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBimbinganSiswaRequest $request)
    {
        //
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
