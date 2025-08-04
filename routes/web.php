<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/home', function () {
    return view('welcome');
})->name('welcome');

Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('admin.login');

Route::post('/login-mahasiswa', [AuthController::class, 'loginMahasiswa'])->name('mahasiswa.login');
Route::post('/registrasi-mahasiswa', [AuthController::class, 'registrasiMahasiswa'])->name('mahasiswa.register');

Route::get('/sppsiswa', [SppSiswaController::class, 'index'])->name('sppsiswa.index');
Route::POST('/sppsiswa/store', [SppSiswaController::class, 'store'])->name('sppsiswa.store');
Route::post('/sppsiswa/update/{id}', [SppSiswaController::class, 'update'])->name('sppsiswa.update');
Route::get('/sppsiswa/{id}', [SppSiswaController::class, 'destroy'])->name('sppsiswa.destroy');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::POST('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::POST('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
Route::post('/prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update');
Route::get('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::POST('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
Route::post('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
Route::get('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

// Registrasi Mahasiswa
