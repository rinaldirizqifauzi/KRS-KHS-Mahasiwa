<?php

namespace App\Http\Controllers;

use App\Models\DosenProdi;
use Illuminate\Http\Request;

class DosenProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        foreach ($request->prodi_id as $item) {
            $dataProdiDosen = [
                'dosen_id' => $request->dosen_id,
                'prodi_id' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DosenProdi::create($dataProdiDosen);
        };

        flash()->addSuccess('Data Berhasil Disimpan');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(DosenProdi $dosenProdi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DosenProdi $dosenProdi)
    {
        dd($dosenProdi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DosenProdi $dosenProdi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DosenProdi $dosenProdi)
    {
        //
    }
}
