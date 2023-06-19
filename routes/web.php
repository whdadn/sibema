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

<<<<<<< HEAD
=======

>>>>>>> trial
// Bagian Mahasiswa
Route::prefix('/dashboardMhs')->group(function () {
    Route::get('/', function () {
        return view('dashboard.menuMhs.dasboardMhs');
    });
    Route::get('/uploadTa', function () {
        return view('dashboard.menuMhs.uploadTa');
    });
    Route::get('/uploadTa/tambahDokTa', function () {
        return view('dashboard.menuMhs.tambahDokTa');
    });
    Route::get('/uploadTa/perbaruiDokTa', function () {
        return view('dashboard.menuMhs.perbaruiDokTa');
    });
    Route::get('/uploadRegis', function () {
        return view('dashboard.menuMhs.uploadRegis');
    });
    Route::get('/uploadRegis/tambahDokRegis', function () {
        return view('dashboard.menuMhs.tambahDokRegis');
    });
    Route::get('/uploadRegis/perbaruiDokRegis', function () {
        return view('dashboard.menuMhs.PerbaruiDokRegis');
    });
    Route::get('/uploadPerpus', function () {
        return view('dashboard.menuMhs.uploadPerpus');
    });
    Route::get('/uploadPerpus/tambahDokPerpus', function () {
        return view('dashboard.menuMhs.tambahDokPerpus');
    });
    Route::get('/uploadPerpus/perbaruiDokPerpus', function () {
        return view('dashboard.menuMhs.perbaruiDokPerpus');
    });
    Route::get('/uploadAkademik', function () {
        return view('dashboard.menuMhs.uploadAkademik');
    });
    Route::get('/uploadAkademik/tambahDokAkademik', function () {
        return view('dashboard.menuMhs.tambahDokAkademik');
    });
    Route::get('/uploadAkademik/perbaruiDokAkademik', function () {
        return view('dashboard.menuMhs.perbaruiDokAkademik');
    });
});
<<<<<<< HEAD
=======

//bagian Admin Prodi
Route::prefix('/dashboardAdmin')->group(function () {
    Route::get('/', function () {
        return view('dashboard.menuAdmin.dashboardAdmin');
    });
    Route::get('/statusAkademik', function () {
        return view('dashboard.menuAdmin.statusAkademik');
    });
    Route::get('/ubahStatusUmum', function () {
        return view('dashboard.menuAdmin.ubahStatusUmum');
    });
    Route::get('/UbahStatusAkademik', function () {
        return view('dashboard.menuAdmin.ubahStatusAkademik');
    });
    Route::get('/akunMahasiswa', function () {
        return view('dashboard.menuAdmin.akunMahasiswa');
    });
    Route::get('/akunMahasiswa/tambahAkunMhs', function () {
        return view('dashboard.menuAdmin.tambahAkunMhs');
    });
    Route::get('/akunMahasiswa/perbaruiAkunMhs', function () {
        return view('dashboard.menuAdmin.perbaruiAkunMhs');
    });
    Route::get('/akunPanitia', function () {
        return view('dashboard.menuAdmin.akunPanitia');
    });
    Route::get('/akunPanitia/tambahAkunPanitia', function () {
        return view('dashboard.menuAdmin.tambahAkunPanitia');
    });
    Route::get('/akunPanitia/perbaruiAkunPanitia', function () {
        return view('dashboard.menuAdmin.perbaruiAkunPanitia');
    });
    Route::get('/beritaUtama', function () {
        return view('dashboard.menuAdmin.beritaUtama');
    });
    Route::get('/beritaUtama/tambahBeritaUtama', function () {
        return view('dashboard.menuAdmin.tambahBeritaUtama');
    });
    Route::get('/beritaUtama/perbaruiBeritaUtama', function () {
        return view('dashboard.menuAdmin.perbaruiBeritaUtama');
    });
});
>>>>>>> trial
