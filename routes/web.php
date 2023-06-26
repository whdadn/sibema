<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TugasAkhirController;
use App\Models\mahasiswa;

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

// Bagian Mahasiswa
Route::prefix('/dashboardMhs')->group(function () {

    Route::get('/', [MahasiswaController::class, 'index']);
    Route::get('/', [MahasiswaController::class, 'show']);
    Route::get('/uploadTa', function () {
        return view('dashboard.menuMhs.uploadTa');
    });
    Route::get('/uploadTa', [TugasAkhirController::class, 'showTa']);
    Route::delete('/uploadTa{mahasiswa}', [MahasiswaController::class, 'destroy']);
    Route::get('/uploadTa/tambahDokTa', [TugasAkhirController::class, 'create']);
    Route::post('/uploadTa/tambahDokTa', [TugasAkhirController::class, 'store']);
    Route::get('/uploadTa/perbaruiDokTa', [MahasiswaController::class, 'edit']);
    Route::post('/uploadTa/perbaruiDokTa{id_mahasiswa}', [MahasiswaController::class, 'update']);


    Route::delete('/uploadRegis{mahasiswa}', [MahasiswaController::class, 'destroyRegis']);
    Route::get('/uploadRegis', function () {
        return view('dashboard.menuMhs.uploadRegis');
    });
    Route::get('/uploadRegis', [MahasiswaController::class, 'showRegis']);

    Route::get('/uploadRegis/tambahDokRegis', function () {
        return view('dashboard.menuMhs.tambahDokRegis');
    });
    Route::get('/uploadRegis/perbaruiDokRegis', function () {
        return view('dashboard.menuMhs.PerbaruiDokRegis');
    });

    Route::delete('/uploadPerpus{mahasiswa}', [MahasiswaController::class, 'destroyPerpus']);
    Route::get('/uploadPerpus', function () {
        return view('dashboard.menuMhs.uploadPerpus');
    });
    Route::get('/uploadPerpus', [MahasiswaController::class, 'showPerpus']);
    Route::get('/uploadPerpus/tambahDokPerpus', function () {
        return view('dashboard.menuMhs.tambahDokPerpus');
    });
    Route::get('/uploadPerpus/perbaruiDokPerpus', function () {
        return view('dashboard.menuMhs.perbaruiDokPerpus');
    });

    Route::delete('/uploadAkademik{mahasiswa}', [MahasiswaController::class, 'destroyAkademik']);
    Route::get('/uploadAkademik', function () {
        return view('dashboard.menuMhs.uploadAkademik');
    });
    Route::get('/uploadAkademik', [MahasiswaController::class, 'showAkademik']);
    Route::get('/uploadAkademik/tambahDokAkademik', function () {
        return view('dashboard.menuMhs.tambahDokAkademik');
    });
    Route::get('/uploadAkademik/perbaruiDokAkademik', function () {
        return view('dashboard.menuMhs.perbaruiDokAkademik');
    });
});

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
