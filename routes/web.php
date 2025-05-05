<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PpksController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LihatPpksController;
use App\Http\Controllers\AdminDasboardController;
use App\Http\Controllers\LihatAkademikController;
use App\Http\Controllers\SaranaPrasaranaController;
use App\Http\Controllers\LihatSaranaPrasaranaController;

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


// ROUTE MAHASISWA
// login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Navbar
Route::get('/navbar', [NavbarController::class, 'navbar'])->name('navbar.form');

// Menampilkan form register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

// Form Aspirasi
Route::get('/aspirasi', [AspirasiController::class, 'aspirasi'])->name('aspirasi');
Route::get('/tambah', [AspirasiController::class, 'tambah'])->name('tambah');
Route::post('/aspirasi', [AspirasiController::class, 'tambahAspirasi'])->name('tambahAspirasi');


// ROUTE ADMIN
Route::get('/dashboard', [AdminDasboardController::class, 'index'])->name('dashboard');

//aspirasi akademik
Route::get('/aspirasi/akademik', [AkademikController::class, 'akademik']);
Route::get('/aspirasi/lihatakademik', [LihatAkademikController::class, 'lihatakademik']);

//aspirasi ppks
Route::get('/aspirasi/ppks', [PpksController::class, 'ppks']);
//lihat aspirasi ppks
Route::get('/aspirasi/lihatppks', [LihatPpksController::class, 'lihatppks']);

//aspirasi sarana prasarana
Route::get('/aspirasi/sarpras', [SaranaPrasaranaController::class, 'Sarpras']);
//lihat sarpras
Route::get('/aspirasi/lihatsarpras', [LihatSaranaPrasaranaController::class, 'lihatsarpras']);