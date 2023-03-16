<?php

namespace App\Http\Controllers;

use App\Models\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $routePrefix = 'adminuser';
    private $viewIndex = 'user_index';
    private $viewCreate  = 'user_form';
    private $viewEdit  = 'user_form';
     /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.' . $this->viewIndex, [
            'models' => Model::where('akses', 'admin')->get(),
            'bread_title1' => 'Admin',
            'bread_title2' => 'Data Admin',
            'title' => 'Data Admin',
            'routePrefix' => $this->routePrefix
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.' . $this->viewCreate, [
            'bread_title1' => 'Admin',
            'bread_title2' => 'Data Admin',
            'title' => 'Form Admin',
            'models' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'routePrefix' => $this->routePrefix,
            'button' => 'Simpan',
            'buttonColor' => 'btn-success'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'nohp' => 'required|unique:users',
            'akses' => 'required|in:admin,mahasiswa',
            'password' => 'required'
        ]);

        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['email_verified_at'] = now();
        Model::create($requestData);

        flash()->addSuccess('Data berhasil disimpan');
        return redirect()->route($this->routePrefix . '.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'bread_title1' => 'Admin',
            'bread_title2' => 'Data Admin',
            'title' => 'Form Admin',
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

        $model = Model::findOrFail($id);

        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'nohp' => 'required|unique:users,nohp,' . $id,
            'akses' => 'required|in:admin,mahasiswa',
            'password' => 'nullable'
        ]);


        if ($requestData['password'] == '') {
            unset($requestData['password']);
        }else {
            $requestData['password'] = Hash::make($requestData['password']);
        }

        $model->fill($requestData);
        $model->save();
        flash()->addSuccess('Data berhasil diubah');
        return redirect()->route($this->routePrefix . '.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Model::findOrFail($id);

        if ($model->id == 1) {
            flash()->addError('Data Tidak Bisa Dihapus!');
            return back();
        }

        $model->delete();
        flash()->addSuccess('Data berhasil dihapus');
        return redirect()->route('user.index');
    }
}
