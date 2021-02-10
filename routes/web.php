<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KepalabagianController;
use App\Http\Controllers\LamapelayananController;
use App\Http\Controllers\LoketPelayananController;

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
    return view('auth.login1');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/kelola_petugas_loket', [PetugasController::class, 'index']);


// Nanti
// Route::group(['middleware' => ['auth', 'checkRole:Super Admin']], function () {
Route::get('/kelola_data_admin', [AdminController::class, 'index']);
Route::post('/admin/input', [AdminController::class, 'store']);
Route::get('/admin/hapus/{id}', [AdminController::class, 'destroy']);
Route::get('/resetpassword/admin/{id}', [AdminController::class, 'resetpasswordadmin']);
Route::get('/kelola_data_kepala_bagian', [KepalabagianController::class, 'index']);
Route::post('/kepala_bagian/input', [KepalabagianController::class, 'store']);
Route::get('/kepala_bagian/hapus/{id}', [KepalabagianController::class, 'destroy']);
Route::get('/resetpassword/kepalabagian/{id}', [KepalabagianController::class, 'resetpasswordkepalabagian']);
Route::get('/kelola_loket_pelayanan', [LoketPelayananController::class, 'index']);
Route::post('/loket_pelayanan/input', [LoketPelayananController::class, 'store']);
Route::get('/loket_pelayanan/hapus/{id}', [LoketPelayananController::class, 'destroy']);
// });

// Route::group(['middleware' => ['auth', 'checkRole:Admin']], function () {
Route::get('/kelola_data_petugas', [PetugasController::class, 'index']);
Route::post('/petugas/input', [PetugasController::class, 'store']);
Route::get('/petugas/hapus/{id}', [PetugasController::class, 'destroy']);
Route::get('/resetpassword/petugas/{id}', [PetugasController::class, 'resetpasswordpetugas']);
Route::get('/kelola_lama_pelayanan', [LamapelayananController::class, 'index']);
Route::post('/lama_pelayanan/input', [LamapelayananController::class, 'store']);
Route::post('/lama_pelayanan/update', [LamapelayananController::class, 'update']);
Route::get('/lama_pelayanan/hapus/{id}', [LamapelayananController::class, 'destroy']);
Route::get('/getdata_lamapelayanan/{id}', [LamapelayananController::class, 'getdata']);
// });

// Route::group(['middleware' => ['auth', 'checkRole:Petugas']], function () {
Route::get('/antrian_a', [AntrianController::class, 'antrian_a']);
Route::post('/antrian/lanjut', [AntrianController::class, 'store']);
Route::get('/antrian/reset', [AntrianController::class, 'reset_antrian_a']);
Route::get('/antrian_b', [AntrianController::class, 'antrian_b']);
Route::get('/antrian_c', [AntrianController::class, 'antrian_c']);
Route::get('/antrian_d', [AntrianController::class, 'antrian_d']);
Route::get('/pelayanan_a', [AntrianController::class, 'pelayanan_a']);
Route::get('/pelayanan_b', [AntrianController::class, 'pelayanan_b']);
Route::get('/pelayanan_c', [AntrianController::class, 'pelayanan_c']);
Route::get('/pelayanan_d', [AntrianController::class, 'pelayanan_d']);
Route::get('/getdata', [AntrianController::class, 'getdata'])->name('get.data.antrian');
// });

// Route::group(['middleware' => ['auth', 'checkRole:Kepala Bagian']], function () {

// });
// Route::get('/belajarjs', []);
