@extends('layouts.soft-admin')

@section('content')
<div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-column h-100">
                        <p class="mb-1 pt-2 text-bold">Built by developers</p>
                        <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Projects table</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="container">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Dosen</th>
                                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIP Dosen</th>
                                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Matakuliah</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @foreach ($models as $item)
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">{{ $item->nama }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">{{ $item->nip }}</p>
                                                            </td>
                                                            <td>
                                                                @foreach ($prodi as $item)
                                                                    <p class="text-xs text-secondary mb-0">{{ $item->prodi->nama }}</p>
                                                                @endforeach
                                                            </td>
                                                            @endforeach
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

