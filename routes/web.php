<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Mengarahkan rute root ke halaman login */
Route::get('/', function () {
    return redirect('/login');
});
Auth::routes();
// Rute untuk Pelanggan
Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class,'create'])->name('pelanggan.create');
Route::post('/pelanggan/create', [PelangganController::class,'store'])->name('pelanggan.store');
#Route::post('/pelanggan/$id', [PelangganController::class,'show'])->name('pelanggan.show');
Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');

// Rute untuk Kendaraan
Route::resource('kendaraan', KendaraanController::class);
/* Route::get('/kendaraan', [KendaraanController::class, 'index']);
Route::get('/kendaraan/create', [KendaraanController::class,'create'])->name('kendaraan.create');
Route::post('/kendaraan/create', [KendaraanController::class,'store'])->name('kendaraan.store'); */
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::get('/kendaraan/{kendaraan}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
Route::put('/kendaraan/{kendaraan}', [KendaraanController::class, 'update'])->name('kendaraan.update');
Route::get('/kendaraan/{kendaraan}', [KendaraanController::class, 'show'])->name('kendaraan.show');
Route::delete('/kendaraan/{kendaraan}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');
Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');


// Rute untuk Layanan, tinggal buat direct success route
/* Route::resource('layanan', LayananController::class);
Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/layanan/create', [LayananController::class,'create'])->name('layanan.create');
Route::post('/layanan/create', [LayananController::class,'store'])->name('layanan.store'); */
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
Route::get('/layanan/{id}', [LayananController::class, 'show'])->name('layanan.show');
Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

// Rute untuk Transaksi
Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/{id}/edit', [LayananController::class, 'edit'])->name('transaksi.edit');
Route::get('/transaksi/create', [TransaksiController::class,'create'])->name('transaksi.create');
Route::post('/transaksi/create', [TransaksiController::class,'store'])->name('transaksi.store');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
/* Auth::routes(); */

/* Route::get('/home', 'HomeController@index')->name('home'); */
