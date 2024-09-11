<?php

use App\Http\Controllers\BimbinganSiswaController;
use App\Http\Controllers\ControllerAdmin\DashboardAdminController;
use App\Http\Controllers\ControllerAdmin\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::group(['middleware'=>'auth'], function(){
    Route::get('/',[DashboardController::class, 'index'])->name('/');
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

    Route::get('/bimbingan', [BimbinganSiswaController::class, 'index'])->name('bimbingan');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard-admin');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
});
