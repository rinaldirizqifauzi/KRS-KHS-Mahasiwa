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
{{-- <div class="table-responsive p-0">
    <table class="table table-sm table-bordered table-striped align-items-center justify-content-center mb-0">
        <thead style="background-color: black; color: white">
            <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="1%">No</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Nama</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">NPM</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Kelas</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Semester</th>
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
                    <p class="text-xl font-weight-bold mb-0 ps-2">{{ $item->nama }}</p>
                </td>
                <td>
                    <span class="text-xl font-weight-bold ps-2">{{ $item->npm }}</span>
                </td>
                <td>
                    <span class="text-xl font-weight-bold ps-2">{{ $item->kelas }}</span>
                </td>
                <td>
                    <span class="text-xl font-weight-bold ps-2">{{ $item->semester }}</span>
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
</div> --}}
<div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('soft-ui-dashboard') }}/assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1"> {{ $modelDosen->first()->nama }} </h5>
                            <p class="mb-0 font-weight-bold text-sm">{{ $modelDosen->first()->nip }}  </i></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-lg-12 mb-lg-0 mb-4 my-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row gx-4">
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">Matakuliah Dosen </h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="container">
                                <div class="table-responsive p-0">
                                    <table class="table table-sm table-bordered table-striped align-items-center justify-content-center mb-0">
                                        <thead style="background-color: black; color: white">
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="1%">No</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Matakuliah</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3" width="4%">Semester</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3" width="2%">SKS</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3" width="2%">Bobot</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3" width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($modelMatakuliah as $item)
                                                <tr>
                                                    <td>
                                                        <span class="text-xl font-weight-bold ps-2">{{ $loop->iteration }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-xl font-weight-bold ps-2">{{ $item->prodi->nama }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-xl font-weight-bold ps-2">{{ $item->prodi->semester }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-xl font-weight-bold ps-2">{{ $item->prodi->sks }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-xl font-weight-bold ps-2">{{ $item->prodi->bobot }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            {!! Form::open([
                                                                'route' => ['admindosen-prodi.destroy', $item->id],
                                                                'method' => 'DELETE',
                                                                'onsubmit' => 'return confirm ("Yakin menghapus data ini?")'
                                                            ]) !!}
                                                                <a href="{{ route('adminedit.matakuliah', $item->id) }}" class="btn btn-warning btn-md btn-round my-1">
                                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                                </a>
                                                                <button type="submit" class="btn btn-danger btn-md btn-round my-1 mx-2"><i class="fa-solid fa-trash-can"></i></button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{ auth()->user()->mahasiswa->first()->prodi->childrenProdi->pluck('nama') }} --}}
                                </div>
                            </div>
                            <div class="container my-4">
                                {!! Form::model($models ,['route' => $route, 'method' => $method]) !!}
                                    {{-- Prodi --}}
                                    <div class="form-group">
                                        <label for="prodi_id">Matakuliah</label>
                                        {!! Form::select('prodi_id[]', $listProdi, null, ['class' => 'form-control select2', 'placeholder multiple' => 'Pilih Prodi']) !!}
                                        <span class="text-danger">{{ $errors->first('prodi_id') }}</span>
                                    </div>
                                    {{-- Dosen --}}
                                    <div class="form-group">
                                        {!! Form::hidden('dosen_id', $modelDosen->first()->dosen_id, []) !!}
                                    </div>
                                    {!! Form::submit($button, ['class' => 'btn btn-sm ml-3 my-1 btn-primary btn-round float-end']) !!}
                                    <a href="{{ route('admindata-dosen.index') }}" class="btn btn-sm mx-3 my-1 bg-gradient-secondary  btn-round float-end">Kembali</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
