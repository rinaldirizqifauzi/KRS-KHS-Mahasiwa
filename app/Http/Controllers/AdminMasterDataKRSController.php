<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AdminMasterDataKRS;
use Illuminate\Support\Facades\DB;
use App\Models\AdminMasterDataProdi;
use App\Models\AdminMasterDataKRS as Model;

class AdminMasterDataKRSController extends Controller
{

    private $routePrefix = 'adminkrs';
    private $viewIndex = 'dataKrs_index';
    private $viewCreate  = 'dataKrs_form';
    private $viewEdit  = 'dataKrs_form';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dataKRS_index', [
            'models' => Model::get(),
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
        return view('admin.' . $this->viewCreate, [
            'listProdi' => AdminMasterDataProdi::where('prodi_id' , null)->pluck('nama'),
            'bread_title1' => 'Kartu Rencana Studi',
            'bread_title2' => 'Data Kartu Rencana Studi',
            'title' => 'Data Kartu Rencana Studi',
            'models' => new Model(),
            'route' => $this->routePrefix . '.store',
            'method' => 'POST',
            'button' => 'Simpan',
            'routePrefix' => $this->routePrefix,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_aktif' => 'required',
            'prodi_id' => 'required'
        ]);

        DB::beginTransaction();

        $prodiId = \App\Models\AdminMasterDataProdi::get();
        $mahasiswa = \App\Models\AdminMasterDataMahasiswa::get();
        foreach ($mahasiswa as $itemMahasiswa) {
            // $requestData['mahasiswa_id'] = $itemMahasiswa->id;
            $requestData['mahasiswa_id'] = $itemMahasiswa->pluck('id');
            $requestData['user_id'] = auth()->user()->id;
            $requestData['tanggal_aktif'] = $request->tanggal_aktif;
            $requestData['prodi_id'] = AdminMasterDataProdi::where('prodi_id' , 17)->pluck('id');;
            dd($requestData);
        }
        DB::commit();
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminMasterDataKRS $adminMasterDataKRS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminMasterDataKRS $adminMasterDataKRS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminMasterDataKRS $adminMasterDataKRS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminMasterDataKRS $adminMasterDataKRS)
    {
        //
    }
}
