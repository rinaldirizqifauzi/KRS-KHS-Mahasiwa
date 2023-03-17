<?php

namespace App\Http\Controllers;

use App\Models\AdminMasterDataKRS;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\AdminMasterDataProdi;
use App\Models\MahasiswaMasterDataKRS;
use App\Models\AdminMasterDataMahasiswa;
use Illuminate\Support\Facades\Validator;

class MahasiswaMasterDataKRSController extends Controller
{

    private $routePrefix = 'mahasiswakrs';
    private $viewIndex = 'dataKrs_index';
    private $viewCreate  = 'dataKrs_form';
    private $viewEdit  = 'dataKrs_form';
    private $viewShow  = 'dataKrs_show';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->user()->mahasiswa->first()->prodi_id == null) {
            // jika status matakuliah tidak dipilih, tampilkan pesan error
            flash()->addError('Akses dibatasi!', 'Maaf ' .  auth()->user()->mahasiswa->first()->nama);
            return redirect()->back();
       }

        $model = AdminMasterDataKRS::get();

        if ($model->count() <= 0) {
            flash()->addError('Maaf '. auth()->user()->mahasiswa->first()->nama .' Matakuliah untuk sementara belum ada!, dikarenakan KRS belum diupdate','Kartu Rencana Studi');
            return redirect()-> route('mahasiswamahasiswa.beranda');
        }else {
            return view('mahasiswa.' . $this->viewIndex, [
                'models' => AdminMasterDataKRS::where('prodi_id', auth()->user()->mahasiswa->first()->prodi_id)->get(),
                'ambilMatakuliah' => MahasiswaMasterDataKRS::paginate(1),
                'bread_title1' => 'Kartu Rencana Studi',
                'bread_title2' => 'Data Kartu Rencana Studi',
                'title' => 'Data Kartu Rencana Studi',
                'routePrefix' => $this->routePrefix
            ]);
        }
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
        $userId = auth()->user()->id;
        $nama = $request->input('nama');
        $matakuliah_status = $request->input('matakuliah_status');

        if ($matakuliah_status == null) {
            // jika status matakuliah tidak dipilih, tampilkan pesan error
            flash()->addError('Sebelum ambil matakuliah harap pilih status matakuliah terlebih dahulu!', 'Maaf ' .  auth()->user()->mahasiswa->first()->nama);
            return redirect()->back()->withInput();
        }

        $result = DB::table('mahasiswa_master_data_k_r_s')
                    ->where('user_id', $userId)
                    ->where('nama', $nama)
                    ->exists();

        if ($result == true) {
            // jika data sudah ada di database, tampilkan pesan error
            flash()->addError('Matakuliah sudah diambil sebelumnya!', 'Maaf ' .  auth()->user()->mahasiswa->first()->nama);
            return redirect()->back()->withInput();
        }

        MahasiswaMasterDataKRS::create([
            'user_id' => auth()->user()->id,
            'nama' => $request->input('nama'),
            'sks' => $request->input('sks'),
            'semester' => $request->input('semester'),
            'matakuliah_status' => $request->input('matakuliah_status')
        ]);
        flash()->addSuccess('Data Krs Berhasil diambil');
        return redirect()->route($this->routePrefix . '.show', auth()->user()->mahasiswa->first()->prodi->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (auth()->user()->mahasiswa->first()->prodi_id == null) {
             // jika status matakuliah tidak dipilih, tampilkan pesan error
             flash()->addError('Akses dibatasi!', 'Maaf ' .  auth()->user()->mahasiswa->first()->nama);
             return redirect()->back();
        }
        return view('mahasiswa.' . $this->viewShow,[
            'model' => MahasiswaMasterDataKRS::where('user_id', auth()->user()->mahasiswa->first()->mahasiswa_id)->paginate(5),
            'dataSemester' => MahasiswaMasterDataKRS::sum('sks'),
            'bread_title1' => 'Kartu Rencana Studi',
            'bread_title2' => 'Data Kartu Rencana Studi',
            'title' => 'Data Kartu Rencana Studi',
            'routePrefix' => $this->routePrefix
        ]);
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
    public function destroy($id)
    {
        $model = MahasiswaMasterDataKRS::findOrfail($id);
        $model->delete();

        flash()->addSuccess('Data krs berhasil dihapus');
        return redirect()->back();
    }
}
