<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PpksController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\JawabanController;
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
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');


Route::get('/unit/akademik', [AkademikController::class, 'akademik'])->name('unit.akademik');
Route::get('/unit/akademik/{id}', [AkademikController::class, 'lihat'])->name('unit.akademik.lihat');

Route::get('/unit/ppks', [PpksController::class, 'ppks'])->name('unit.ppks');
Route::get('/unit/ppks/{id}', [PpksController::class, 'lihat'])->name('unit.ppks.lihat');


Route::resource('jawaban', JawabanController::class);




// ROUTE ADMIN
Route::get('/dashboard', [AdminDasboardController::class, 'index'])->name('dashboard');

//aspirasi akademik


//aspirasi ppks
Route::get('/aspirasi/ppks', [PpksController::class, 'ppks']);
//lihat aspirasi ppks
Route::get('/aspirasi/lihatppks', [PpksController::class, 'lihatppks']);

//aspirasi sarana prasarana
Route::get('/aspirasi/sarpras', [SaranaPrasaranaController::class, 'Sarpras']);
//lihat sarpras
Route::get('/aspirasi/lihatsarpras', [SaranaPrasaranaController::class, 'lihatsarpras']);

// Aspirasi
Route::resource('aspirasi', AspirasiController::class);