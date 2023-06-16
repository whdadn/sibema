<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\UbahPasswordController;

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

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/lupaPassword', function () {
    return view('lupaPassword');
});
Route::get('/ubahPassword', function () {
    return view('ubahPassword');
});

Route::get('/', [BeritaController::class, 'index']);
