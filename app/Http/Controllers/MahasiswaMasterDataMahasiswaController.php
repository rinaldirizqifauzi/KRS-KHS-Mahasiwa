<?php

namespace App\Http\Controllers;

use App\Models\AdminMasterDataMahasiswa as Model;
use App\Models\MahasiswaMasterDataKRS;

class MahasiswaMasterDataMahasiswaController extends Controller
{
    private $routePrefix = 'mahasiswadata-mahasiswa';
    private $viewIndex  = 'dataMahasiswa_index';

    public function index()
    {
        if (auth()->user()->mahasiswa->first()->prodi_id == null) {
            // jika status matakuliah tidak dipilih, tampilkan pesan error
            flash()->addError('Akses dibatasi!', 'Maaf ' .  auth()->user()->mahasiswa->first()->nama);
            return redirect()->back();
       }
        return view('mahasiswa.' . $this->viewIndex, [
            'models' => Model::where('mahasiswa_id' , auth()->user()->id)->get(),
            'matakuliahBerjalan' =>  MahasiswaMasterDataKRS::where('user_id', auth()->user()->id)->get(),
            'bread_title1' => 'Mahasiswa',
            'bread_title2' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'routePrefix' => $this->routePrefix,
        ]);
    }
}
