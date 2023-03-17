@extends('layouts.soft-mahasiswa')

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
                <div class="col-lg-12 col-md-7 col-sm-12">
                    <div class="d-flex flex-column h-100">
                        <h5 class="font-weight-bolder">{{ $title }}   {{ auth()->user()->mahasiswa->first()->prodi->nama }}</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type here...">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="float-end">
                                    <a href="{{ route('mahasiswakrs.show', auth()->user()->mahasiswa->first()->prodi->id) }}" class="btn btn-md btn-round btn-primary">Lihat Matakuliah Yang Diambil</a>
                                </div>
                            </div>
                        </div>
                        <div class="container my-3">
                            <div class="table-responsive p-0">
                                <table  id="tabel-prodi" class="table table-sm table-bordered table-striped align-items-center justify-content-center mb-0">
                                    <thead style="background-color: black; color: white">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="1%">No</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Matakuliah</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7" width="3%">Semester</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7" width="3%">SKS</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7" width="3%">Bobot</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7" width="7%">Status Matakuliah</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7" width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1 ?>
                                        @foreach ($models->first()->prodi->childrenProdi as $item)
                                            <tr>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xl ps-3">{{ $no++ }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xl ps-3">{{ $item->nama }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xl text-center ps-3">{{ $item->semester }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xl text-center ps-3">{{ $item->sks }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xl text-center ps-3">{{ $item->bobot }}</h6>
                                                    </div>
                                                </td>
                                                {!! Form::model($models ,['route' => 'mahasiswakrs.store', 'method' => 'POST']) !!}
                                                @csrf
                                                <td>
                                                    {!! Form::select('matakuliah_status',['baru' => 'Baru', 'mengulang' => 'Ulang' ] , null, ['class' => 'form-control','placeholder' => 'Pilih Status']) !!}
                                                </td>
                                                <td>
                                                   <center>
                                                        <input type="hidden" name="nama" value="{{ $item->nama }}">
                                                        <input type="hidden" name="sks" value="{{ $item->semester }}">
                                                        <input type="hidden" name="semester" value="{{ $item->sks }}">
                                                        <div class="my-auto">
                                                            {!! Form::submit('Ambil', ['class' => 'btn btn-sm ml-3 my-1 btn-primary btn-round float-end']) !!}
                                                        </div>
                                                    </center>
                                                </td>
                                                {!! Form::close() !!}
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

