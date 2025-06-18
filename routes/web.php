<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\JawabanController;

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\PpksController;
use App\Http\Controllers\SaranaPrasaranaController;

use App\Http\Controllers\AdminDasboardController;
use App\Http\Controllers\DashboardAkademikController;
use App\Http\Controllers\DashboardPpksController;
use App\Http\Controllers\DashboardSarprasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route Laravel frontend
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', fn () => view('welcome'));

// ===============================
// AUTHENTIKASI (Login & Register)
// ===============================
Route::middleware('guest.jwt')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
});
Route::post('/login/proses', [AuthController::class, 'proses'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar');

// Navbar (Mahasiswa saja)
Route::get('/navbar', [NavbarController::class, 'navbar'])->middleware('auth.jwt:mahasiswa')->name('dashboardmahasiswa');
Route::resource('aspirasi', AspirasiController::class)->middleware('auth.jwt:mahasiswa');

// ===============================
// UNIT AKADEMIK
// ===============================
Route::prefix('unit/akademik')->middleware('auth.jwt:akademik')->group(function () {
    Route::get('/aspirasi', [AkademikController::class, 'akademik'])->name('unit.akademik');
    Route::get('/{id}', [AkademikController::class, 'lihat'])->name('unit.akademik.lihat');
    Route::get('/', [DashboardAkademikController::class, 'index'])->name('dashboardakademik');
    Route::resource('jawaban', JawabanController::class)->names('akademik.jawaban');
});

// ===============================
// UNIT PPKS
// ===============================
Route::prefix('unit/ppks')->middleware('auth.jwt:ppks')->group(function () {
    Route::get('/aspirasi', [PpksController::class, 'ppks'])->name('unit.ppks');
    Route::get('/{id}', [PpksController::class, 'lihat'])->name('unit.ppks.lihat');
    Route::get('/', [DashboardPpksController::class, 'index'])->name('dashboardppks');
    Route::resource('jawaban', JawabanController::class)->names('ppks.jawaban');

});

// ===============================
// UNIT SARANA PRASARANA
// ===============================
Route::prefix('unit/sarpras')->middleware('auth.jwt:sarpras')->group(function () {
    Route::get('/aspirasi', [SaranaPrasaranaController::class, 'sarpras'])->name('unit.sarpras');
    Route::get('/{id}', [SaranaPrasaranaController::class, 'lihat'])->name('unit.sarpras.lihat');
    Route::get('/', [DashboardSarprasController::class, 'index'])->name('dashboardsarpras');
    Route::resource('jawaban', JawabanController::class)->names('sarpras.jawaban');

});

// ===============================
// ADMIN - DASHBOARD
// ===============================
// Route::prefix('dashboard')->group(function () {
//     Route::get('/', [AdminDasboardController::class, 'index'])->name('dashboard');
// });

// ===============================
// JAWABAN ASPIRASI
// ===============================
