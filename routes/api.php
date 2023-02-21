<?php

use App\Http\Controllers\API\APIBukuController;
use App\Http\Controllers\API\APIIdentitasController;
use App\Http\Controllers\API\APIKategoriController;
use App\Http\Controllers\API\APILaporanController;
use App\Http\Controllers\API\APIPemberitahuanController;
use App\Http\Controllers\API\APIPeminjamanController;
use App\Http\Controllers\API\APIPenerbitController;
use App\Http\Controllers\API\APIPengembalianController;
use App\Http\Controllers\API\APIPesanController;
use App\Http\Controllers\API\APIUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Log Out
Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::post('logout', [APIUserController::class, 'logout']);
    }
);

// User
Route::controller(APIUserController::class)->group(
    function () {
        Route::post('login', 'login');
        Route::get('user', 'get');
        Route::get('user/{id}', 'get');
        Route::post('user', 'store_user');
        Route::post('admin', 'store_admin');
        Route::post('user/{id}', 'update'); // contains images
        Route::delete('user/{id}', 'destroy');
        Route::delete('admin/{id}', 'destroy');
    }
);

// Kategori
Route::controller(APIKategoriController::class)->group(
    function () {
        Route::get('kategori', 'get');
        Route::get('kategori/{id}', 'get');
        Route::post('kategori', 'store');
        Route::put('kategori/{id}', 'update');
        Route::delete('kategori/{id}', 'destroy');
    }
);

// Buku
Route::controller(APIBukuController::class)->group(
    function () {
        Route::get('buku', 'get');
        Route::get('buku/{id}', 'get');
        Route::post('buku', 'store');
        Route::post('buku/{id}', 'update'); // contains images
        Route::delete('buku/{id}', 'destroy');
    }
);

// Peminjaman
Route::controller(APIPeminjamanController::class)->group(
    function () {
        Route::get('peminjaman', 'get');
        Route::get('peminjaman/{id}', 'get');
        Route::post('peminjaman', 'store');
        Route::put('peminjaman/{id}', 'update');
        Route::delete('peminjaman/{id}', 'destroy');
    }
);

// Pengembalian
Route::controller(APIPengembalianController::class)->group(
    function () {
        Route::get('pengembalian', 'get');
        Route::get('pengembalian/{id}', 'get');
        Route::put('pengembalian', 'store');
    }
);

// Laporan
Route::controller(APILaporanController::class)->group(
    function () {
        // Anggota
        Route::post('laporan/anggota', 'anggota');

        // Peminjaman
        Route::post('laporan/peminjaman', 'peminjaman');

        // Pengembalian
        Route::post('laporan/pengembalian', 'pengembalian');
    }
);

// Penerbit
Route::controller(APIPenerbitController::class)->group(
    function () {
        Route::get('penerbit',  'get');
        Route::get('penerbit/{id}',  'get');
        Route::post('penerbit',  'store');
        Route::put('penerbit/{id}',  'update');
        Route::delete('penerbit/{id}',  'destroy');
    }
);

// Pesan
Route::controller(APIPesanController::class)->group(
    function () {
        Route::get('pesan', 'get');
        Route::get('pesan/{id}', 'get');
        Route::post('pesan', 'store');
        Route::put('pesan/{id}', 'update');
        Route::delete('pesan/{id}', 'destroy');
    }
);

// Pemberitahuan
Route::controller(APIPemberitahuanController::class)->group(
    function () {
        Route::get('pemberitahuan', 'get');
        Route::get('pemberitahuan/{id}', 'get');
        Route::post('pemberitahuan', 'store');
        Route::put('pemberitahuan/{id}', 'update');
        Route::delete('pemberitahuan/{id}', 'destroy');
    }
);

// Identitas
Route::controller(APIIdentitasController::class)->group(
    function () {
        Route::get('identitas',  'get');
        Route::get('identitas/{id}',  'get');
        Route::post('identitas',  'store');
        Route::post('identitas/{id}',  'update'); // contains images
        Route::delete('identitas/{id}',  'destroy');
    }
);
