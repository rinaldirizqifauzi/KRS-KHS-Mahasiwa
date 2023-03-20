<?php

namespace App\Http\Controllers;

use App\Models\AdminMasterDataDosen;
use App\Models\Dosen;
use App\Models\DosenProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function berandaMahasiswa()
    {
        return view('mahasiswa.beranda');
    }

    public function berandaAdmin()
    {

        return view('admin.beranda', [
            'models' => AdminMasterDataDosen::get(),
            'prodi' => DosenProdi::get()
        ]);
    }

    public function berandaDosen()
    {
        return view('admin.beranda');
    }
}
