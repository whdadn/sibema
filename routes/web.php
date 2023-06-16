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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard.menuMhs.dasboardMhs');
});
Route::get('/dashboard/uploadTa', function () {
    return view('dashboard.menuMhs.uploadTa');
});
Route::get('/dashboard/tambahDokTa', function () {
    return view('dashboard.menuMhs.tambahDokTa');
});
Route::get('/dashboard/perbaruiDokTa', function () {
    return view('dashboard.menuMhs.perbaruiDokTa');
});
Route::get('/dashboard/uploadRegis', function () {
    return view('dashboard.menuMhs.uploadRegis');
});
Route::get('/dashboard/tambahDokRegis', function () {
    return view('dashboard.menuMhs.tambahDokRegis');
});
Route::get('/dashboard/perbaruiDokRegis', function () {
    return view('dashboard.menuMhs.PerbaruiDokRegis');
});
Route::get('/dashboard/uploadPerpus', function () {
    return view('dashboard.menuMhs.uploadPerpus');
});
Route::get('/dashboard/tambahDokPerpus', function () {
    return view('dashboard.menuMhs.tambahDokPerpus');
});
Route::get('/dashboard/perbaruiDokPerpus', function () {
    return view('dashboard.menuMhs.perbaruiDokPerpus');
});
Route::get('/dashboard/uploadAkademik', function () {
    return view('dashboard.menuMhs.uploadAkademik');
});
Route::get('/dashboard/tambahDokAkademik', function () {
    return view('dashboard.menuMhs.tambahDokAkademik');
});
Route::get('/dashboard/perbaruiDokAkademik', function () {
    return view('dashboard.menuMhs.perbaruiDokAkademik');
});

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/lupaPassword', function () {
    return view('lupaPassword');
});
Route::get('/ubahPassword', function () {
    return view('ubahPassword');
});

Route::get('/', [BeritaController::class, 'index']);
