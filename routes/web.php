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

Route::middleware(['guest'])->group(function () {
    Route::get('/home', function () {
        return redirect('/');
    });
    Route::get('/', function () {
        return view('index');
    });
    //Bagian Login, Lupa Passowrd, dan Ubah Password
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('/lupaPassword', function () {
        return view('lupaPassword');
    });
    Route::get('/ubahPassword', function () {
        return view('ubahPassword');
    });
});

Route::get('/', [BeritaController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware(['userAkses:Mahasiswa'])->group(function () {
        // Bagian Mahasiswa
        Route::prefix('/dashboardMhs')->group(function () {
            Route::get('/', [MahasiswaController::class, 'index']);
            Route::get('/', [MahasiswaController::class, 'show']);
            Route::get('/uploadTa', function () {
                return view('dashboard.menuMhs.uploadTa');
            });
            Route::get('/uploadTa', [TugasAkhirController::class, 'showTa']);
            Route::get('/uploadTa{tugas_akhir}', [TugasAkhirController::class, 'viewTa']);
            Route::delete('/uploadTa{tugas_akhir}', [TugasAkhirController::class, 'destroy']);
            Route::get('/uploadTa/tambahDokTa', [TugasAkhirController::class, 'create']);
            Route::post('/uploadTa/tambahDokTa', [TugasAkhirController::class, 'store']);
            Route::get('/cetakStatus', [MahasiswaController::class, 'cetakStatus']);
            Route::get('/profileMhs', [MahasiswaController::class, 'edit']);
            Route::put('/profileMhs{mahasiswa}', [MahasiswaController::class, 'update']);
            // Route::get('/uploadTa/perbaruiDokTa{tugas_akhir}', [TugasAkhirController::class, 'edit']);
            // Route::post('/uploadTa/perbaruiDokTa{tugas_akhir}', [TugasAkhirController::class, 'update']);


            Route::get('/uploadRegis', function () {
                return view('dashboard.menuMhs.uploadRegis');
            });
            Route::get('/uploadRegis', [RegistrasiController::class, 'showRegis']);
            Route::get('/uploadRegis{regis}', [RegistrasiController::class, 'viewRegis']);
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
            Route::get('/uploadPerpus{perpus}', [PerpusController::class, 'viewPerpus']);
            Route::delete('/uploadPerpus{perpustakaan}', [PerpusController::class, 'destroy']);
            Route::get('uploadPerpus/tambahDokPerpus', [PerpusController::class, 'create']);
            Route::post('uploadPerpus/tambahDokPerpus', [PerpusController::class, 'store']);

            Route::get('/uploadAkademik', function () {
                return view('dashboard.menuMhs.uploadAkademik');
            });
            Route::get('/uploadAkademik', [AkademikController::class, 'showAkademik']);
            Route::get('/uploadAkademik{akademik}', [AkademikController::class, 'viewAkademik']);
            Route::delete('/uploadAkademik{akademik}', [AkademikController::class, 'destroy']);
            Route::get('/uploadAkademik/tambahDokAkademik', [AkademikController::class, 'create']);
            Route::post('/uploadAkademik/tambahDokAkademik', [AkademikController::class, 'store']);
        });
    });

    Route::middleware(['userAkses:Admin Prodi'])->group(function () {
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
            Route::get('/statusAkademik/detail{akademik}', [AdminProdiController::class, 'viewAkademik']);
            Route::get('/profileAdmin', [AdminProdiController::class, 'editProfile']);
            Route::put('/profileAdmin{pegawai}', [AdminProdiController::class, 'updateProfile']);
            Route::get('/', [AdminProdiController::class, 'filter'])->name('dashboardAdmin');

            Route::get('/akunMahasiswa', [AdminProdiController::class, 'showAkunMhs']);
            Route::get('/akunMahasiswa/tambahAkunMhs', [AdminProdiController::class, 'createAkunMhs']);
            Route::post('/akunMahasiswa/tambahAkunMhs', [AdminProdiController::class, 'storeAkunMhs']);
            Route::get('/akunMahasiswa/perbaruiAkunMhs{akunMhs}', [AdminProdiController::class, 'editAkunMhs']);
            Route::delete('/akunMahasiswa{akunMhs}', [AdminProdiController::class, 'destroyAkunMhs']);
            Route::put('/akunMahasiswa/perbaruiAkunMhs{akunMhs}', [AdminProdiController::class, 'updateAkunMhs']);

            Route::get('/akunPanitia', [AdminProdiController::class, 'showAkunPanitia']);
            Route::get('/akunPanitia/tambahAkunPanitia', [AdminProdiController::class, 'createAkunPanitia']);
            Route::post('/akunPanitia/tambahAkunPanitia', [AdminProdiController::class, 'storeAkunPanitia']);
            Route::get('/akunPanitia/perbaruiAkunPanitia{pegawai}', [AdminProdiController::class, 'editAkunPanitia']);
            Route::put('/akunPanitia/perbaruiAkunPanitia{pegawai}', [AdminProdiController::class, 'updateAkunPanitia']);
            Route::delete('/akunPanitia{pegawai}', [AdminProdiController::class, 'destroyAkunPanitia']);

            Route::get('/beritaUtama', [BeritaController::class, 'show']);
            Route::get('/beritaUtama/tambahBeritaUtama', [BeritaController::class, 'create']);
            Route::post('/beritaUtama/tambahBeritaUtama', [BeritaController::class, 'store']);
            Route::get('/beritaUtama/perbaruiBeritaUtama{berita}', [BeritaController::class, 'edit']);
            Route::put('/beritaUtama/perbaruiBeritaUtama{berita}', [BeritaController::class, 'update']);
            Route::delete('/beritaUtama{berita}', [BeritaController::class, 'destroy']);
        });
    });
});
