@extends('layouts.soft-admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Halaman</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $bread_title1 }}</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">{{ $bread_title2 }}</h6>
</nav>
@endsection

@section('content')
<div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-column h-100">
                        <h5 class="font-weight-bolder">{{ $title }}</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type here...">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary btn-sm btn-round my-1 float-end">Tambah</a>
                            </div>
                        </div>
                        <div class="container my-3">
                            <div class="table-responsive p-0">
                                <table class="table table-sm table-bordered table-striped align-items-center justify-content-center mb-0">
                                    <thead style="background-color: black; color: white">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="1%">No</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Nama</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Email</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">NIP</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">No.HP</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Akses</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Status</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7 ps-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($models as $item)
                                        <tr>
                                            <td>
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-xl ps-3">{{ $loop->iteration }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xl font-weight-bold mb-0 ps-2">{{ $item->name }}</p>
                                            </td>
                                            <td>
                                                <span class="text-xl font-weight-bold ps-2">{{ $item->email }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xl font-weight-bold ps-2">{{ $item->mahasiswa->first()?->npm ?? 'Data Dosen Tidak Ada'}}</span>
                                            </td>
                                            <td>
                                                <span class="text-xl font-weight-bold ps-2">{{ $item->nohp }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xl font-weight-bold ps-2">{{ $item->akses }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xl font-weight-bold ps-2">
                                                    <a href="{{ route('adminusers.update-status', [
                                                            'model' => 'user',
                                                            'id' => $item->id,
                                                            'status' => $item->status == 'aktif' ? 'non-aktif' : 'aktif',
                                                        ]) }}" class="btn btn-sm my-2 {{ $item->status == 'aktif' ? 'btn-danger' : 'btn-primary' }}" onclick="return confirm('Anda Yakin?')">
                                                            {{ $item->status == 'aktif' ? 'Non-Aktifkan Siswa Ini' : 'Aktifkan Siswa Ini' }}
                                                    </a>
                                                </span>
                                            </td>
                                            <td>
                                              <center>
                                                 <div class="d-flex">
                                                    <a href="{{ route($routePrefix . '.edit', $item->id) }}" class="btn btn-warning btn-md btn-round my-1">
                                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                    </a>

                                                    {!! Form::open([
                                                        'route' => [$routePrefix . '.destroy', $item->id],
                                                        'method' => 'DELETE',
                                                        'onsubmit' => 'return confirm ("Yakin menghapus data ini?")'
                                                    ]) !!}

                                                    <button type="submit" class="btn btn-danger btn-md btn-round my-1 mx-2"><i class="fa-solid fa-trash-can"></i></button>
                                                    {!! Form::close() !!}
                                                 </div>
                                              </center>
                                            </td>
                                        </tr>
                                        @endforeach
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
@endsection

