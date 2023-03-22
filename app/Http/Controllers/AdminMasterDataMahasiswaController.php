<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminMasterDataProdi;
use App\Models\AdminMasterDataMahasiswa;
use App\Models\AdminMasterDataMahasiswa as Model;

class AdminMasterDataMahasiswaController extends Controller
{
    private $routePrefix = 'admindata-mahasiswa';
    private $viewIndex = 'dataMahasiswa_index';
    private $viewCreate = 'dataMahasiswa_form';
    private $viewEdit = 'dataMahasiswa_form';
    private $viewShow = 'dataMahasiswa_show';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.' . $this->viewIndex, [
            'models' => Model::get(),
            'bread_title1' => 'Mahasiswa',
            'bread_title2' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'routePrefix' => $this->routePrefix
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.' . $this->viewCreate, [
            'listAkun' => User::whereNotIn('id', AdminMasterDataMahasiswa::pluck('mahasiswa_id')->toArray())->where('akses', 'mahasiswa')->pluck('name', 'id'),
            'listProdi' => AdminMasterDataProdi::where('prodi_id' , null)->pluck('nama','id'),
            'bread_title1' => 'Mahasiswa',
            'bread_title2' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
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
            'mahasiswa_id' => 'nullable',
            'nama' => 'required',
            'npm' => 'required|unique:admin_master_data_mahasiswas',
            'kelas' => 'required',
            'prodi_id' => 'nullable',
        ]);


        $prodi = AdminMasterDataProdi::find($request->prodi_id);
        if ($prodi != null) {
            $requestData['prodi_id'] = $prodi->id;
        }

        Model::create($requestData);
        flash()->addSuccess('Data Berhasil Disimpan');
        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $model = Model::findOrFail($id);
        if ($model->prodi_id == null) {
            flash()->addError('Matakuliah ' . $model->nama . ' Belum Ada! ','Data Matakuliah');
            return back();
        }

        return view('admin.' . $this->viewShow, [
            'dataSemester' => AdminMasterDataProdi::selectRaw('sum(sks) as sksSemester, sum(bobot) as bobotSemester')
                                                ->where('semester', '=', request()->input('semester'))
                                                ->first(),
            'modelProdi' => $model->prodi->childrenProdi,
            'model' => $model,
            'bread_title1' => 'Matakuliah',
            'bread_title2' => 'Data Matakuliah',
            'title' => 'Data Matakuliah',
            'routePrefix' => $this->routePrefix ,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'listAkun' =>  User::whereNotIn('id', AdminMasterDataMahasiswa::pluck('mahasiswa_id')->toArray())->where('akses', 'mahasiswa')->pluck('name', 'id'),
            'listProdi' => AdminMasterDataProdi::where('prodi_id' , null)->pluck('nama','id'),
            'bread_title1' => 'Mahasiswa',
            'bread_title2' => 'Data Mahasiswa',
            'title' => 'Form Mahasiswa',
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
            'mahasiswa_id' => 'nullable|unique:admin_master_data_mahasiswas,mahasiswa_id,' . $id,
            'nama' => 'required',
            'npm' => 'required|unique:admin_master_data_mahasiswas,npm,' . $id,
            'kelas' => 'required',
            'prodi_id' => 'nullable',
        ]);

        $prodi = AdminMasterDataProdi::find($request?->prodi_id);
        $requestData['prodi_id'] = $prodi?->id;

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
}
