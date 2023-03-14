<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaAdminController extends Controller
{
    public function beranda()
    {
        return view('admin.beranda');
    }
}
