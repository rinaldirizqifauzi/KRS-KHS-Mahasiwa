<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminMasterDataDosen;
use App\Models\AdminMasterDataProdi;
use App\Models\AdminMasterDataMahasiswa;
use App\Models\AdminMasterDataDosen as Model;
use App\Models\DosenProdi;
use App\Models\ProdiDosen;

class AdminMasterDataDosenController extends Controller
{
    private $routePrefix = 'admindata-dosen';
    private $viewIndex = 'dataDosen_index';
    private $viewCreate = 'dataDosen_form';
    private $viewEdit = 'dataDosen_form';
    private $viewShowProdiForm = 'dataDosenProdi_show';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.' . $this->viewIndex, [
            'models' => Model::get(),
            'bread_title1' => 'Dosen',
            'bread_title2' => 'Data Dosen',
            'title' => 'Data Dosen',
            'routePrefix' => $this->routePrefix
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.' . $this->viewCreate, [
            'listAkun' => User::where('akses', 'dosen')->pluck('name', 'id'),
            // 'listProdi' => AdminMasterDataProdi::where('prodi_id',null)->pluck('nama','id'),
            'listProdi' => AdminMasterDataProdi::where('prodi_id', '<>',null)->pluck('nama','id'),
            'listMahasiswa' =>  AdminMasterDataMahasiswa::where('prodi_id' , '<>', null)->pluck('nama', 'id'),
            'bread_title1' => 'Dosen',
            'bread_title2' => 'Data Dosen',
            'title' => 'Data Dosen',
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
            'nama' => 'required',
            'nip' => 'required|unique:admin_master_data_dosens',
            'dosen_id' => 'nullable',
            'mahasiswa_id' => 'nullable'
        ]);
        Model::create($requestData);

        flash()->addSuccess('Data Berhasil Disimpan');
        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'listAkun' => User::where('akses', 'dosen')->pluck('name', 'id'),
            'listMahasiswa' =>  AdminMasterDataMahasiswa::where('prodi_id' , '<>', null)->pluck('nama', 'id'),
            'bread_title1' => 'Dosen',
            'bread_title2' => 'Data Dosen',
            'title' => 'Form Dosen',
            'models' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'routePrefix' => $this->routePrefix,
            'button' => 'Ubah',
        ];

        return view('admin.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:admin_master_data_dosens,nip,' . $id,
            'dosen_id' => 'nullable',
        ]);

        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();

        flash()->addSuccess('Data Berhasil Diubah');
        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $model = Model::findOrFail($id);
        $model->delete();

        flash()->addSuccess('Data Berhasil Hapus');
        return redirect()->route($this->routePrefix . '.index');
    }

    public function indexMatakuliah($id)
    {
        $empty = AdminMasterDataDosen::where('dosen_id', $id)->get();
        if ($empty->first() == null) {
            flash()->addError('Akses dibatasi!', 'Maaf ' .  auth()->user()->name);
            return redirect()->route($this->routePrefix . '.index');
        }
        return view('admin.' . $this->viewShowProdiForm, [
            'listProdi' => AdminMasterDataProdi::where('prodi_id', '<>',null)->pluck('nama','id'),
            'modelDosen' => AdminMasterDataDosen::where('dosen_id', $id)->get(),
            'modelMatakuliah' => DosenProdi::where('dosen_id', $id)->get(),
            'bread_title1' => 'Matakuliah Dosen',
            'bread_title2' => 'Data Matakuliah Dosen',
            'title' => 'Data Matakuliah Dosen',
            'models' => new DosenProdi(),
            'route' => 'admindosen-prodi.store',
            'method' => 'POST',
            'button' => 'Simpan',
        ]);
    }

    public function deleteMatakuliah($id)
    {
        $model = DosenProdi::findOrFail($id);
        $model->delete();

        flash()->addSuccess('Data Berhasil Hapus');
        return back();
    }

}
