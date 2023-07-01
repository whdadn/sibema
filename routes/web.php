<?php

use App\Http\Controllers\AdminProdiController;
use App\Http\Controllers\AkademikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\RegistrasiController;
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
    Route::delete('/uploadTa{tugas_akhir}', [TugasAkhirController::class, 'destroy']);
    Route::get('/uploadTa/tambahDokTa', [TugasAkhirController::class, 'create']);
    Route::post('/uploadTa/tambahDokTa', [TugasAkhirController::class, 'store']);
    // Route::get('/uploadTa/perbaruiDokTa{tugas_akhir}', [TugasAkhirController::class, 'edit']);
    // Route::post('/uploadTa/perbaruiDokTa{tugas_akhir}', [TugasAkhirController::class, 'update']);


    Route::get('/uploadRegis', function () {
        return view('dashboard.menuMhs.uploadRegis');
    });
    Route::get('/uploadRegis', [RegistrasiController::class, 'showRegis']);
    Route::delete('/uploadRegis{keuangan}', [RegistrasiController::class, 'destroy']);
    Route::get('/uploadRegis/tambahDokRegis', [RegistrasiController::class, 'create']);
    Route::post('/uploadRegis/tambahDokRegis', [RegistrasiController::class, 'store']);

    Route::get('/uploadRegis/tambahDokRegis', function () {
        return view('dashboard.menuMhs.tambahDokRegis');
    });
    Route::get('/uploadRegis/perbaruiDokRegis', function () {
        return view('dashboard.menuMhs.PerbaruiDokRegis');
    });

    Route::get('/uploadPerpus', function () {
        return view('dashboard.menuMhs.uploadPerpus');
    });
    Route::get('/uploadPerpus', [PerpusController::class, 'showPerpus']);
    Route::delete('/uploadPerpus{perpustakaan}', [PerpusController::class, 'destroy']);
    Route::get('uploadPerpus/tambahDokPerpus', [PerpusController::class, 'create']);
    Route::post('uploadPerpus/tambahDokPerpus', [PerpusController::class, 'store']);

    Route::get('/uploadAkademik', function () {
        return view('dashboard.menuMhs.uploadAkademik');
    });
    Route::get('/uploadAkademik', [AkademikController::class, 'showAkademik']);
    Route::delete('/uploadAkademik{akademik}', [AkademikController::class, 'destroy']);
    Route::get('/uploadAkademik/tambahDokAkademik', [AkademikController::class, 'create']);
    Route::post('/uploadAkademik/tambahDokAkademik', [AkademikController::class, 'store']);
});

//bagian Admin Prodi
Route::prefix('/dashboardAdmin')->group(function () {
    Route::get('/statusAkademik', function () {
        return view('dashboard.menuAdmin.statusAkademik');
    });
    Route::get('/', [AdminProdiController::class, 'index']);
    Route::get('/ubahStatusUmum{mahasiswa}', [AdminProdiController::class, 'edit']);
    Route::put('/ubahStatusUmum{mahasiswa}', [AdminProdiController::class, 'update']);
    Route::get('/statusAkademik', [AdminProdiController::class, 'showAkademik']);
    Route::get('/ubahStatusAkademik{akademik}', [AdminProdiController::class, 'editAkademik']);
    Route::put('/ubahStatusAkademik{akademik}', [AdminProdiController::class, 'updateAkademik']);

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
