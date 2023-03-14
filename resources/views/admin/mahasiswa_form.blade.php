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
                                            <label for="name">Nama</label>
                                            {!! Form::text('name', null , ['class' => 'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        {{-- Nomor HP --}}
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            {!! Form::text('nohp', null , ['class' => 'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('nohp') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        {{-- Email --}}
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            {!! Form::text('email', null , ['class' => 'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                        {{-- Password --}}
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            {!! Form::password('password', ['class' => 'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </div>
                                        {{-- Hak Akses --}}
                                        <div class="form-group">
                                                {!! Form::hidden('akses', 'mahasiswa', []) !!}
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

