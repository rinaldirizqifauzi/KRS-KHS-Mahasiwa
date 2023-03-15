<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminMasterDataKRS;
use App\Models\AdminMasterDataProdi;

class MahasiswaMasterDataKRSController extends Controller
{
    private $routePrefix = 'mahasiswakrs';
    private $viewIndex = 'dataKrs_index';
    private $viewCreate  = 'dataKrs_form';
    private $viewEdit  = 'dataKrs_form';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('mahasiswa.' . $this->viewIndex, [
            'models' => AdminMasterDataProdi::where('prodi_id', auth()->user()->mahasiswa->first()->prodi_id)->get(),
            'bread_title1' => 'Kartu Rencana Studi',
            'bread_title2' => 'Data Kartu Rencana Studi',
            'title' => 'Data Kartu Rencana Studi',
            'routePrefix' => $this->routePrefix
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $mahasiswaMasterDataKRS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $mahasiswaMasterDataKRS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $mahasiswaMasterDataKRS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $mahasiswaMasterDataKRS)
    {
        //
    }
}
