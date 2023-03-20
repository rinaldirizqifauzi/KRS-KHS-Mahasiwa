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
                        <div class="container my-3">
                            {!! Form::model($models ,['route' => $route, 'method' => $method]) !!}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        {{-- Nama --}}
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            {!! Form::text('nama', null, ['class' => 'form-control' ]) !!}
                                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                                        </div>
                                        {{-- Mahasiswa Pemimbing --}}
                                        <div class="form-group">
                                            <label for="mahasiswa_id">Mahasiswa Pemimbing</label>
                                            {!! Form::select('mahasiswa_id[]', $listMahasiswa, null, ['class' => 'form-control select2', 'placeholder multiple' => 'Pilih Prodi']) !!}
                                            <span class="text-danger">{{ $errors->first('mahasiswa_id') }}</span>
                                        </div>
                                        @if ($models->user != null)
                                            <div class="form-group">
                                                <a href="{{ route('admindosen.edit', $models->user->id) }}" class="btn btn-sm btn-round btn-primary">Edit Akun {{ $models->nama }}</a>
                                            </div>
                                        @else
                                            {{-- Akun Login --}}
                                            <div class="form-group">
                                                <label for="dosen_id">Pilih Akun (Optional)</label>
                                                {!! Form::select('dosen_id', $listAkun, null, ['class' => 'form-control select2 ', 'placeholder' => 'Pilih Akun']) !!}
                                                <span class="text-danger">{{ $errors->first('dosen_id') }}</span>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        {{-- NIP --}}
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            {!! Form::number('nip', null, ['class' => 'form-control' ]) !!}
                                            <span class="text-danger">{{ $errors->first('nip') }}</span>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::submit($button, ['class' => 'btn btn-sm ml-3 my-1 btn-primary btn-round float-end']) !!}
                                <a href="{{ route($routePrefix . '.index') }}" class="btn btn-sm mx-3 my-1 bg-gradient-secondary  btn-round float-end">Kembali</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

