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
                        @if (request()->filled('prodi_id') == null)
                            <h5 class="font-weight-bolder">{{ $title }}</h5>
                        @endif
                        <div class="container my-3">
                            {!! Form::model($models ,['route' => $route, 'method' => $method]) !!}
                                @if (request()->filled('prodi_id'))
                                    <h4>Matakuliah {{ $parentProdi->nama }} Semester {{ request()->input('semester') }}
                                    </h4>
                                    {!! Form::hidden('prodi_id', $parentProdi->id, []) !!}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive p-0">
                                                <table class="table table-sm table-bordered table-striped align-items-center justify-content-center mb-0">
                                                    <thead style="background-color: black; color: white">
                                                        <tr>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="1%">No</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Nama Matakuliah</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3" width="4%">SKS Matakuliah</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3" width="4%">Bobot Matakuliah</th>
                                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7 ps-3">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1 ?>
                                                        @foreach ($parentProdi->childrenProdi as $item)
                                                            @if ($item->semester == request()->input('semester'))
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
                                                                            <h6 class="mb-0 text-center text-xl ps-3">{{ $item->sks }}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="my-auto">
                                                                            <h6 class="mb-0 text-center text-xl ps-3">{{ $item->bobot }}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                    <center>
                                                                        <a href="{{ route('adminedit.matakuliah', [$item->id,  'prodi_id' => $item->id,  'semester' => $item->semester]) }}" class="btn btn-warning btn-md btn-round my-1">
                                                                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                                        </a>
                                                                        <a href="{{ route('admindelete.matakuliah', $item->id) }}" class="btn btn-danger btn-md btn-round my-1" onclick="return confirm('Anda Yakin Menghapus Matakuliah Ini?')">
                                                                            <i class="fa-solid fa-trash-can"></i>
                                                                        </a>
                                                                    </center>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{-- Tombol Semester --}}
                                                <div class="d-flex">
                                                    <a href="{{ route($routePrefix . '.create', [
                                                                    'prodi_id' => $parentProdi->id,
                                                                    'semester' => 1
                                                                ])
                                                            }}"
                                                        class="btn btn-sm btn-round btn-secondary  {{ request()->input('semester') == 1 ? 'btn-success' : '' }} my-3 mx-2">Semester 1
                                                    </a>
                                                    <a href="{{ route($routePrefix . '.create', [
                                                                    'prodi_id' => $parentProdi->id,
                                                                    'semester' => 2
                                                                ])
                                                            }}"
                                                        class="btn btn-sm btn-round btn-secondary  {{ request()->input('semester') == 2 ? 'btn-success' : '' }} my-3 mx-2">Semester 2
                                                    </a>
                                                    <a href="{{ route($routePrefix . '.create', [
                                                                    'prodi_id' => $parentProdi->id,
                                                                    'semester' => 3
                                                                ])
                                                            }}"
                                                        class="btn btn-sm btn-round btn-secondary  {{ request()->input('semester') == 3 ? 'btn-success' : '' }} my-3 mx-2">Semester 3
                                                    </a>
                                                    <a href="{{ route($routePrefix . '.create', [
                                                                    'prodi_id' => $parentProdi->id,
                                                                    'semester' => 4
                                                                ])
                                                            }}"
                                                        class="btn btn-sm btn-round btn-secondary  {{ request()->input('semester') == 4 ? 'btn-success' : '' }} my-3 mx-2">Semester 4
                                                    </a>
                                                    <a href="{{ route($routePrefix . '.create', [
                                                                    'prodi_id' => $parentProdi->id,
                                                                    'semester' => 5
                                                                ])
                                                            }}"
                                                        class="btn btn-sm btn-round btn-secondary  {{ request()->input('semester') == 5 ? 'btn-success' : '' }} my-3 mx-2">Semester 5
                                                    </a>
                                                    <a href="{{ route($routePrefix . '.create', [
                                                                    'prodi_id' => $parentProdi->id,
                                                                    'semester' => 6
                                                                ])
                                                            }}"
                                                        class="btn btn-sm btn-round btn-secondary  {{ request()->input('semester') == 6 ? 'btn-success' : '' }} my-3 mx-2">Semester 6
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                   <div class="row">
                                        @if(request()->filled('prodi_id') == null)
                                        {{-- Nama Prodi --}}
                                        <div class="form-group">
                                                <label for="nama">Nama Prodi</label>
                                                {!! Form::text('nama', null , ['class' => 'form-control']) !!}
                                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                        </div>
                                        @endif
                                        <div class="col-lg-4">
                                            {{-- Nama Prodi --}}
                                            <div class="form-group">
                                                @if(request()->filled('prodi_id') != null)
                                                    <label for="nama">Nama Matakuliah</label>
                                                    {!! Form::text('nama', null , ['class' => 'form-control']) !!}
                                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            {{-- Sks Matakuliah --}}
                                            <div class="form-group">
                                                @if(request()->filled('prodi_id') != null)
                                                    <label for="sks">SKS Matakuliah</label>
                                                    {!! Form::number('sks', null , ['class' => 'form-control']) !!}
                                                    <span class="text-danger">{{ $errors->first('sks') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            {{-- Bobot Matakuliah --}}
                                            <div class="form-group">
                                                @if(request()->filled('prodi_id') != null)
                                                    <label for="bobot">Bobot Matakuliah</label>
                                                    {!! Form::number('bobot', null , ['class' => 'form-control']) !!}
                                                    <span class="text-danger">{{ $errors->first('bobot') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                   </div>

                                    {{-- Semester --}}
                                    @if (request()->input('semester') == 1)
                                        {!! Form::hidden('semester', 1 , ['class' => 'form-control']) !!}
                                    @elseif (request()->input('semester') == 2)
                                        {!! Form::hidden('semester', 2 , ['class' => 'form-control']) !!}
                                    @elseif (request()->input('semester') == 3)
                                        {!! Form::hidden('semester', 3 , ['class' => 'form-control']) !!}
                                    @elseif (request()->input('semester') == 4)
                                        {!! Form::hidden('semester', 4 , ['class' => 'form-control']) !!}
                                    @elseif (request()->input('semester') == 5)
                                        {!! Form::hidden('semester', 5 , ['class' => 'form-control']) !!}
                                    @elseif (request()->input('semester') == 6)
                                        {!! Form::hidden('semester', 6 , ['class' => 'form-control']) !!}
                                    @endif

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

