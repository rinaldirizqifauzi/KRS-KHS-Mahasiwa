<?php

namespace App\Http\Controllers;

use App\Models\AdminMasterDataProdi as Model;
use App\Models\AdminMasterDataProdi ;
use Illuminate\Http\Request;

class AdminMasterDataProdiController extends Controller
{
    private $routePrefix = 'adminprodi';
    private $routePrefixMTK = 'matakuliah';
    private $viewIndex  = 'dataProdi_index';
    private $viewCreate  = 'dataProdi_form';
    private $viewShow  = 'dataProdi_show';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.' . $this->viewIndex, [
            'models' => Model::whereNull('prodi_id')->get(),
            'bread_title1' => 'Prodi',
            'bread_title2' => 'Data Prodi',
            'title' => 'Data Prodi',
            'routePrefix' => $this->routePrefix
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $parentProdi = new Model();
        if ($request->filled('prodi_id')) {
            $parentProdi = Model::with('childrenProdi')->findOrFail($request->prodi_id);
        }

        // Semester
        return view('admin.' . $this->viewCreate, [
            'semester' => Model::with('childrenProdi')->whereNotNull('semester')->pluck('semester'),
            'parentProdi' => $parentProdi,
            'bread_title1' => 'Prodi',
            'bread_title2' => 'Data Prodi',
            'title' => 'Data Prodi',
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
            'nama' => 'required|unique:admin_master_data_prodis',
            'prodi_id' => 'nullable|exists:admin_master_data_prodis,id',
            'semester' => 'nullable',
            'sks' => 'required',
            'bobot' => 'required'
        ]);


        Model::create($requestData);
        if ($request->prodi_id != null) {
            flash()->addSuccess('Data Matakuliah Berhasil Disimpan');
            return back();
        }
        flash()->addSuccess('Data Prodi Berhasil Disimpan');
        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.' . $this->viewShow, [
            'model' => Model::with('childrenProdi')->findOrFail($id),
            'bread_title1' => 'Mahasiswa',
            'bread_title2' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'routePrefix' => $this->routePrefix ,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminMasterDataProdi $adminMasterDataProdi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminMasterDataProdi $adminMasterDataProdi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Model::findOrFail($id);
        // Validasi relasi ke table children
          if ($model->childrenProdi->count() >= 1) {
            flash()->addError('Karena Masih Memiliki Matakuliah. Hapus Matakuliah Terlebih Dahulu!','Data Prodi Gagal Dihapus');
            return redirect()->back();
        }

        $model->delete();
        flash()->addSuccess('Data Berhasil Dihapus!');
        return redirect()->route($this->routePrefix . '.index');
    }

    public function editMatakuliah($id)
    {
        $model = Model::findOrFail($id);
        $parentProdi = new Model();
        if (request()->filled('prodi_id')) {
            $parentProdi = Model::with('childrenProdi')->findOrFail(request()->prodi_id);
        }

        return view('admin.dataMatakuliah_form',[
            'semester' => Model::with('childrenProdi')->whereNotNull('semester')->pluck('semester'),
            'parentProdi' => $parentProdi,
            'bread_title1' => 'Prodi',
            'bread_title2' => 'Data Prodi',
            'title' => 'Data Prodi',
            'models' => $model,
            'routePrefix' => $this->routePrefix ,
            'route' => ['adminupdate.matakuliah', $id],
            'method' => 'PUT',
            'button' => 'Ubah',

        ]);
        // flash()->addSuccess('Data berhasil dihapus');
        // return redirect()->back();
    }

    public function updateMatakuliah(Request $request, $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|unique:admin_master_data_prodis,nama,' . $id,
            'semester' => 'required',
            'sks' => 'required',
            'bobot' => 'required',
        ]);

        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();

        flash()->addSuccess('Data Berhasil Diubah');
        return redirect()->route('adminprodi.create', ['prodi_id' => $model->prodi_id, 'semester' => $model->semester]);
    }

    public function deleteMatakuliah($id)
    {
        $model = Model::findOrFail($id);
        $model->delete();
        flash()->addSuccess('Data berhasil dihapus');
        return redirect()->back();
    }
}
