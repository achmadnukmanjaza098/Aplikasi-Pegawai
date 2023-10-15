<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->name('pegawai')->middleware('auth');
Route::get('/role', [PegawaiController::class, 'role'])->name('role')->middleware('auth');
Route::get('/absensi', [PegawaiController::class, 'absensi'])->name('absensi')->middleware('auth');