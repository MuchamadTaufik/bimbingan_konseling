<?php

use App\Http\Controllers\BimbinganSiswaController;
use App\Http\Controllers\ControllerAdmin\DashboardAdminController;
use App\Http\Controllers\ControllerAdmin\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ControllerAdmin\SemesterController;
use App\Http\Controllers\ControllerAdmin\KelasController;
use App\Http\Controllers\ControllerAdmin\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout',[LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware'=> ['auth', 'role:guru']], function(){
    Route::get('/',[DashboardController::class, 'index'])->name('/');

    Route::get('/bimbingan', [BimbinganSiswaController::class, 'index'])->name('bimbingan');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard-admin');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{users}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/semester', [SemesterController::class, 'index'])->name('semester');
    Route::get('/semester/create', [SemesterController::class, 'create'])->name('semester.create');
    Route::post('/semester/store', [SemesterController::class, 'store'])->name('semester.store');
    Route::get('/semester/edit/{semester}', [SemesterController::class, 'edit'])->name('semester.edit');
    Route::put('/semester/update/{semester}', [SemesterController::class, 'update'])->name('semester.update');
    Route::delete('/semester/delete/{semester}', [SemesterController::class, 'destroy'])->name('semester.delete');

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/edit/{kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/update/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');

    Route::get('/guru-bk', [DashboardAdminController::class, 'guru'])->name('guru_bk');
    Route::get('/guru-bk/edit/{users}', [DashboardAdminController::class, 'edit'])->name('guru-bk.edit');
    Route::put('/guru-bk/update/{user}', [DashboardAdminController::class, 'update'])->name('guru-bk.update');
    Route::delete('/guru-bk/delete/{user}', [DashboardAdminController::class, 'destroy'])->name('guru-bk.delete');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/edit/{siswa}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/delete/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.delete');
});
