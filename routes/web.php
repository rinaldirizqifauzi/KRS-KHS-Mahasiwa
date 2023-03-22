<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMasterDataDosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminMasterDataKRSController;
use App\Http\Controllers\AdminMasterDataProdiController;
use App\Http\Controllers\MahasiswaMasterDataKRSController;
use App\Http\Controllers\AdminMasterDataMahasiswaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenProdiController;
use App\Http\Controllers\MahasiswaMasterDataMahasiswaController;
use App\Http\Controllers\StatusController;
use App\Models\MahasiswaMasterDataKRS;

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
    Route::get('beranda', [BerandaController::class, 'berandaAdmin'])->name('admin.beranda');
    Route::resource('user', AdminController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('data-mahasiswa', AdminMasterDataMahasiswaController::class);
    Route::resource('data-dosen', AdminMasterDataDosenController::class);
    Route::resource('prodi', AdminMasterDataProdiController::class);
    Route::resource('krs', AdminMasterDataKRSController::class);
    Route::resource('dosen-prodi', DosenProdiController::class);

    Route::get('index-matakuliah/{dosen_id}', [AdminMasterDataDosenController::class, 'indexMatakuliah'])->name('index.matakuliah');
    Route::post('index-matakuliah/', [AdminMasterDataDosenController::class, 'storeMatakuliah'])->name('store.matakuliah');
    Route::delete('delete-dosen-matakuliah/{dosen_id}', [AdminMasterDataDosenController::class, 'deleteMatakuliah'])->name('delete.dosen.matakuliah');


    Route::get('edit-matakuliah/{id}', [AdminMasterDataProdiController::class, 'editMatakuliah'])->name('edit.matakuliah');
    Route::put('update-matakuliah/{id}', [AdminMasterDataProdiController::class, 'updateMatakuliah'])->name('update.matakuliah');
    Route::get('delete-matakuliah/{id}', [AdminMasterDataProdiController::class, 'deleteMatakuliah'])->name('delete.matakuliah');
    Route::get('/users/update-status', [StatusController::class, 'updateStatus'])->name('users.update-status');
});

Route::prefix('mahasiswa')->middleware(['auth', 'auth.mahasiswa','auth.mahasiswa.delete'])->name('mahasiswa')->group(function() {
    Route::get('beranda', [BerandaController::class, 'berandaMahasiswa'])->name('mahasiswa.beranda');
    Route::resource('data-mahasiswa', MahasiswaMasterDataMahasiswaController::class);
    Route::resource('krs', MahasiswaMasterDataKRSController::class);
});

Route::prefix('dosen')->middleware(['auth', 'auth.mahasiswa','auth.mahasiswa.delete'])->group(function() {
    Route::get('beranda', [BerandaController::class, 'berandaDosen'])->name('dosen.beranda');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/krsmahasiswa', function(Request $request) {
    $nama = $request->input('nama');

    $krsmahasiswa = new MahasiswaMasterDataKRS();
    $krsmahasiswa->nama = $nama;
    $krsmahasiswa->save();

    return response()->json(['message' => 'Data berhasil disimpan.']);
  });
