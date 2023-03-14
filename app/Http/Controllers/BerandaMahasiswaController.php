<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaMahasiswaController extends Controller
{
    public function beranda()
    {
        return view('mahasiswa.beranda');
    }
}
