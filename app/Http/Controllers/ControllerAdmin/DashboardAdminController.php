<?php

namespace App\Http\Controllers\ControllerAdmin;

use App\Models\User;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        return view('dashboard-admin.index', compact('user'));
    }

    public function guru()
    {   
        $user = Auth::user();
        $users = User::where('role', 'guru')->get();
        return view('dashboard-admin.guru.index', compact('user','users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users)
    {   
        $user = Auth::user();
        return view('dashboard-admin.guru.edit', [
            'user' => $user,
            'users' => $users,
            'semesters' => Semester::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $rules = [
                'name' => 'required|max:50',
                'nomor_induk' => 'required|max:50',
                'semester_id' => 'required'
            ];

            $validateData = $request->validate($rules);

            $user->update($validateData);

            alert()->success('Berhasil', 'Data Guru Berhasil diubah');
            return redirect('/guru-bk')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        
        alert()->success('Success', 'Akun dan Guru berhasil dihapus');
        return redirect('/guru-bk')->withInput();
    }
}
