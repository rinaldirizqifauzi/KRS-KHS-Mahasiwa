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
    private $viewCreate  = 'dataKrs_form';

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
            'listProdi' => AdminMasterDataProdi::where('prodi_id' , null)->pluck('nama','id'),
            'bread_title1' => 'Kartu Rencana Studi',
            'bread_title2' => 'Form Kartu Rencana Studi',
            'title' => 'Form Kartu Rencana Studi',
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

        $prodi = AdminMasterDataProdi::find($request->prodi_id);
        $mahasiswa = \App\Models\AdminMasterDataMahasiswa::where('prodi_id', $prodi->id)->get();
        foreach ($mahasiswa as $itemMahasiswa) {
            $requestData['mahasiswa_id'] = $itemMahasiswa->mahasiswa_id;
            $requestData['user_id'] = auth()->user()->id;
            $requestData['tanggal_aktif'] = $request->tanggal_aktif;
            if ($request->input('prodi_id' == $itemMahasiswa)) {
                $requestData['prodi_id'] = $itemMahasiswa->prodi_id;
            }
            Model::create($requestData);
        }
        DB::commit();
        flash()->addSuccess('Data KRS Berhasil Disimpan');
        return redirect()->route($this->routePrefix . '.index');
    }
}
