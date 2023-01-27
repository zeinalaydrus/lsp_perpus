<?php

use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\IdentitasController;
use App\Http\Controllers\API\KategoriControlller;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\PenerbitController;
use App\Http\Controllers\API\PesanController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Penerbit
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::post('/penerbit/create', [PenerbitController::class, 'create']);
Route::post('/penerbit/edit/{id}', [PenerbitController::class, 'update']);
Route::delete('/penerbit/delete/{id}', [PenerbitController::class, 'destroy']);

//Buku
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku/create', [BukuController::class, 'create']);
Route::post('buku/edit/{id}', [BukuController::class, 'update']);
Route::delete('/buku/delete/{id}', [BukuController::class, 'destroy']);

//Pesan
Route::get('/pesan', [PesanController::class, 'index']);
Route::post('/pesan/create', [PesanController::class, 'create']);
Route::delete('/pesan/delete/{id}', [PesanController::class, 'destroy']);

//Identitas
Route::get('/identitas', [IdentitasController::class, 'index']);
Route::post('/identitas/edit/{id}', [IdentitasController::class, 'update']);

//Profil
Route::get('/profil', [UserController::class, 'index']);
Route::get('/profil/create', [UserController::class, 'create']);
Route::get('/profil/edit/{id}', [UserController::class, 'update']);
Route::get('/profil/delete/{id}', [UserController::class, 'destroy']);

//Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/peminjaman/create', [PeminjamanController::class, 'store']);

//kategori
Route::get('/kategori', [KategoriControlller::class, 'index']);
Route::post('/kategori/create', [KategoriControlller::class, 'create']);
Route::post('/kategori/edit/{id}', [KategoriControlller::class, 'update']);
Route::delete('/kategori/delete/{id}', [KategoriControlller::class, 'destroy']);
