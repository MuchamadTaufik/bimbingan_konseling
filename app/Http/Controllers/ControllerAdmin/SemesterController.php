<?php

namespace App\Http\Controllers\ControllerAdmin;

use App\Models\Semester;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        $semester = Semester::all();
        return view('dashboard-admin.semester.index', compact('user','semester'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('dashboard-admin.semester.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSemesterRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:semesters'
        ]);

        Semester::create($validateData);

        toast()->success('Berhasil', 'Semester ditambahkan');
        return redirect('/semester')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {   
        $user = Auth::user();
        return view('dashboard-admin.semester.edit', [
            'user' => $user,
            'semester' => $semester
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        try {
            $rules = [
                'name' => 'required',
            ];

            $validateData = $request->validate($rules);

            $semester->update($validateData);

            alert()->success('Berhasil', 'Data Semester diubah');
            return redirect('/semester')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        Semester::destroy($semester->id);

        // Menampilkan notifikasi sukses dan redirect
        alert()->success('Success', 'Semester berhasil dihapus');
        return redirect('/semester')->withInput();
    }
}
