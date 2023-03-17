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
                        <h5 class="font-weight-bolder">{{ $title }}   {{ auth()->user()->mahasiswa->first()->nama }}</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type here...">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                @if(auth()->user()->mahasiswa->first()->prodi->id != null)
                                    <div class="float-end">
                                        <a href="{{ route($routePrefix . ('.index')) }}" class="btn btn-primary btn-md btn-round">Ambil Matakuliah</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="container my-3">
                            <div class="table-responsive p-0">
                                <table  id="tabel-prodi" class="table table-sm table-bordered table-striped align-items-center justify-content-center mb-0">
                                    <thead style="background-color: black; color: white">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="1%">No</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Matakuliah</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="3%">Semester</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="3%">SKS</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="7%">Status Matakuliah</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7 ps-3" width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1 ?>
                                        @foreach ($model as $item)
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
                                                        <h6 class="mb-0 text-xl text-center">{{ $item->semester }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xl text-center">{{ $item->sks }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <center>
                                                        <div class="my-auto">
                                                            <button class="btn btn-sm btn-round my-1 {{ $item->matakuliah_status == 'baru' ? 'btn-success' : 'btn-warning' }}">{{ ucwords($item->matakuliah_status) }}</button>
                                                        </div>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        {!! Form::open([
                                                            'route' => [$routePrefix . '.destroy', $item->id],
                                                            'method' => 'DELETE',
                                                            'onsubmit' => 'return confirm ("Yakin menghapus data ini?")'
                                                        ]) !!}

                                                        <button type="submit" class="btn btn-danger btn-md btn-round my-1 mx-2"><i class="fa-solid fa-trash-can"></i></button>
                                                        {!! Form::close() !!}
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr colspan="3">
                                            <td></td>
                                            <td>
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-xl ps-3"><i>Total SKS</i></h6>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-xl text-center"><i>{{ $dataSemester }} SKS</i></h6>
                                                </div>
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-end my-2">
                                {{ $model->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection

