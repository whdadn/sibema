<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;

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

//Halaman Utama
Route::get('/', function () {
    return view('index');
});


// Bagian Mahasiswa
Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.menuMhs.dasboardMhs');
    });
    Route::get('/uploadTa', function () {
        return view('dashboard.menuMhs.uploadTa');
    });
    Route::get('/tambahDokTa', function () {
        return view('dashboard.menuMhs.tambahDokTa');
    });
    Route::get('/perbaruiDokTa', function () {
        return view('dashboard.menuMhs.perbaruiDokTa');
    });
    Route::get('/uploadRegis', function () {
        return view('dashboard.menuMhs.uploadRegis');
    });
    Route::get('/tambahDokRegis', function () {
        return view('dashboard.menuMhs.tambahDokRegis');
    });
    Route::get('/perbaruiDokRegis', function () {
        return view('dashboard.menuMhs.PerbaruiDokRegis');
    });
    Route::get('/uploadPerpus', function () {
        return view('dashboard.menuMhs.uploadPerpus');
    });
    Route::get('/tambahDokPerpus', function () {
        return view('dashboard.menuMhs.tambahDokPerpus');
    });
    Route::get('/perbaruiDokPerpus', function () {
        return view('dashboard.menuMhs.perbaruiDokPerpus');
    });
    Route::get('/uploadAkademik', function () {
        return view('dashboard.menuMhs.uploadAkademik');
    });
    Route::get('/tambahDokAkademik', function () {
        return view('dashboard.menuMhs.tambahDokAkademik');
    });
    Route::get('/perbaruiDokAkademik', function () {
        return view('dashboard.menuMhs.perbaruiDokAkademik');
    });
});


Route::middleware(['guest'])->group(function () {
    //Bagian Login, Lupa Passowrd, dan Ubah Password
    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('/lupaPassword', function () {
        return view('lupaPassword');
    });
    Route::get('/ubahPassword', function () {
        return view('ubahPassword');
    });
    Route::post('/logout', [LoginController::class, 'logout']);
    //Bagian Berita
    Route::get('/', [BeritaController::class, 'index']);
});
