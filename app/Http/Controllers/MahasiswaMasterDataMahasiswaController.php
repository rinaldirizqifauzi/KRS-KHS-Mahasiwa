<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminMasterDataMahasiswa as Model;

class MahasiswaMasterDataMahasiswaController extends Controller
{
    private $routePrefix = 'mahasiswadata-mahasiswa';
    private $viewIndex  = 'dataMahasiswa_index';

    public function index()
    {
        return view('mahasiswa.' . $this->viewIndex, [
            'models' => Model::with('mahasiswa', 'user')->where('mahasiswa_id' , auth()->user()->id)->get(),
            'bread_title1' => 'Mahasiswa',
            'bread_title2' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'routePrefix' => $this->routePrefix,
        ]);
    }
}
