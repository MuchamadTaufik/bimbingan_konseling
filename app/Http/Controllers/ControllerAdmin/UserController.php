<?php

namespace App\Http\Controllers\ControllerAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        $users = User::all();
        return view('dashboard-admin.user.index', compact('user','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $user = Auth::user();
        $users = User::all();
        return view('dashboard-admin.user.create', compact('user','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = request()->validate([
            'semester_id' => 'nullable',
            'name' => 'required|max:50',
            'nomor_induk' => 'nullable|max:50',
            'role' => 'required|in:guru,admin',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
        ]);

        try {
            $validateData['password'] = Hash::make($validateData['password']);

            User::create($validateData);

            toast()->success('Berhasil', 'Akun berhasil di daftarkan');
            return redirect('/user')->withInput();
        } catch (\Exception $e) {
            toast()->error('Register Gagal', 'Email Telah digunakan.');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
