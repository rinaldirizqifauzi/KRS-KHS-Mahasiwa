<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMasterDataKartuRencanaStudiController;
use App\Http\Controllers\AdminMasterDataKRSController;
use App\Http\Controllers\AdminMasterDataMahasiswaController;
use App\Http\Controllers\AdminMasterDataProdiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\BerandaMahasiswaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaMasterDataMahasiswaController;

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
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('layouts.soft');
// });


Route::prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin')->group(function() {
    Route::get('beranda', [BerandaAdminController::class, 'beranda'])->name('admin.beranda');
    Route::resource('user', AdminController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('data-mahasiswa', AdminMasterDataMahasiswaController::class);
    Route::resource('prodi', AdminMasterDataProdiController::class);
    Route::resource('krs', AdminMasterDataKRSController::class);

    // DeleteMatakuliah
    Route::get('delete-matakuliah/{id}', [AdminMasterDataProdiController::class, 'deleteMatakuliah'])->name('delete.matakuliah');
});

Route::prefix('mahasiswa')->middleware(['auth', 'auth.mahasiswa'])->name('mahasiswa')->group(function() {
    Route::get('beranda', [BerandaMahasiswaController::class, 'beranda'])->name('mahasiswa.beranda');
    Route::resource('data-mahasiswa', MahasiswaMasterDataMahasiswaController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');