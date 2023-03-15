<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminMasterDataMahasiswa as Model;
use Illuminate\Support\Facades\Auth;

class MahasiswaMasterDataMahasiswaController extends Controller
{
    private $routePrefix = 'mahasiswadata-mahasiswa';
    private $viewIndex  = 'dataMahasiswa_index';

    public function index()
    {
        return view('mahasiswa.' . $this->viewIndex, [
            'models' => Model::where('mahasiswa_id' , auth()->user()->id)->get(),
            'bread_title1' => 'Mahasiswa',
            'bread_title2' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'routePrefix' => $this->routePrefix,
        ]);
    }
}
