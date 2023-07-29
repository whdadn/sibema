<?php

use App\Http\Controllers\AdminProdiController;
use App\Http\Controllers\AkademikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KajurController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PanitiaKeuanganController;
use App\Http\Controllers\PanitiaPerpusController;
use App\Http\Controllers\PanitiaTaController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\TugasAkhirController;


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
    Route::get('/lupaPassword', [LoginController::class, 'showLupaPass']);
    Route::post('/lupaPassword', [LoginController::class, 'lupaPass']);
    Route::get('/ubahPassword{token}', [LoginController::class, 'ubahPass']);
    Route::put('/ubahPassword', [LoginController::class, 'rubahPass']);
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

    Route::middleware(['userAkses:Panitia Tugas Akhir'])->group(function () {
        Route::prefix('/dashboardPanitiaTa')->group(function () {
            Route::get('/', [PanitiaTaController::class, 'index']);
            Route::get('/ubahStatusTa{tugas_akhir}', [PanitiaTaController::class, 'editTa']);
            Route::put('/ubahStatusTa{tugas_akhir}', [PanitiaTaController::class, 'updateTa']);
            Route::get('/statusTa/detail{tugas_akhir}', [PanitiaTaController::class, 'viewTa']);
            Route::get('/profilePanitiaTa', [PanitiaTaController::class, 'edit']);
            Route::put('/profilePanitiaTa{pegawai}', [PanitiaTaController::class, 'update']);
        });
    });

    Route::middleware(['userAkses:Panitia Keuangan'])->group(function () {
        Route::prefix('/dashboardPanitiaKeuangan')->group(function () {
            Route::get('/', [PanitiaKeuanganController::class, 'index']);
            Route::get('/ubahStatusRegistrasi{keuangan}', [PanitiaKeuanganController::class, 'editKeuangan']);
            Route::put('/ubahStatusRegistrasi{keuangan}', [PanitiaKeuanganController::class, 'updateKeuangan']);
            Route::get('/statusRegistrasi/detail{keuangan}', [PanitiaKeuanganController::class, 'viewKeuangan']);
            Route::get('/profilePanitiaKeuangan', [PanitiaKeuanganController::class, 'edit']);
            Route::put('/profilePanitiaKeuangan{pegawai}', [PanitiaKeuanganController::class, 'update']);
        });
    });

    Route::middleware(['userAkses:Panitia Perpustakaan'])->group(function () {
        Route::prefix('/dashboardPanitiaPerpustakaan')->group(function () {
            Route::get('/', [PanitiaPerpusController::class, 'index']);
            Route::get('/ubahStatusPerpustakaan{perpus}', [PanitiaPerpusController::class, 'editPerpus']);
            Route::put('/ubahStatusPerpustakaan{perpus}', [PanitiaPerpusController::class, 'updatePerpus']);
            Route::get('/statusPerpustakaan/detail{perpus}', [PanitiaPerpusController::class, 'viewPerpus']);
            Route::get('/profilePanitiaPerpustakaan', [PanitiaPerpusController::class, 'edit']);
            Route::put('/profilePanitiaPerpustakaan{pegawai}', [PanitiaPerpusController::class, 'update']);
        });
    });

    Route::middleware(['userAkses:Ketua Jurusan'])->group(function () {
        Route::prefix('/dashboardKetuaJurusan')->group(function () {
            Route::get('/', [KajurController::class, 'index']);
            Route::get('/', [KajurController::class, 'filter'])->name('dashboardKajur');
            Route::get('/profileKetuaJurusan', [KajurController::class, 'edit']);
            Route::put('/profileKetuaJurusan{pegawai}', [KajurController::class, 'update']);
        });
    });
});
