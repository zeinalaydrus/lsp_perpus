<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdentitasController;
use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Pemberitahuan;
use App\Models\User;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/user')->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user/dashboard');

    Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('user/peminjaman');

    Route::get('form_peminjaman', [PeminjamanController::class, 'pinjam'])->name('user/form_pinjam');

    Route::post('form_peminjaman', [PeminjamanController::class, 'form'])->name('user/form_peminjaman');
    Route::post('submit_peminjaman', [PeminjamanController::class, 'submit'])->name('user/submit_peminjaman');

    Route::get('pengembalian', [PengembalianController::class, 'index'])->name('user/pengembalian');
    Route::get('pengembalian_riwayat', [PengembalianController::class, 'riwayat'])->name('user/pengembalian_riwayat');
    Route::post('pengembalian_form', [PengembalianController::class, 'store'])->name('user/pengembalian_form');


    Route::get('/pesan/masuk', [PesanController::class, 'index'])->name('user/pesan/masuk');
    Route::get('/pesan/terkirim', [PesanController::class, 'terkirim'])->name('user/pesan/terkirim');
    Route::post('/pesan/masuk/ubah_status', [PesanController::class, 'update'])->name('user/pesan/masuk/update');
    Route::post('/pesan/kirim', [PesanController::class, 'store'])->name('user/pesan/kirim');
    Route::delete('/pesan/delete/{id}', [PesanController::class, 'destroy'])->name('user/pesan/delete');


    Route::get('profil', [UserController::class, 'profil'])->name('user/profil');
    Route::put('profil/update', [UserController::class, 'update'])->name('user/profil_update');
});

Route::prefix('/admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin/dashboard');

    Route::get('buku', [BukuController::class, 'index'])->name('admin/buku');
    Route::get('buku/create', [BukuController::class, 'stotr'])->name('admin/buku/create');
    Route::get('buku/update/{id}', [BukuController::class, 'update'])->name('admin/buku/update');
    Route::get('buku/delete/{id}', [BukuController::class, 'destroy'])->name('admin/buku/delete');

    Route::get('penerbit', [PenerbitController::class, 'index'])->name('admin/penerbit');

    Route::get('kategori', [KategoriController::class, 'index'])->name('admin/kategori');

    Route::get('identitas',[IdentitasController::class, 'index'])->name('admin/identitas');
    Route::put('identitas/update', [IdentitasController::class, 'update'])->name('admin/identitas_update');

});
