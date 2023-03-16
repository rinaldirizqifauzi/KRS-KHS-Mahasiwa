@extends('layouts.soft-admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Halaman</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $bread_title1 }}</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">{{ $bread_title2 }} {{ $model->nama }}</h6>
</nav>
@endsection

@section('content')
<div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-column h-100">
                        <h5 class="font-weight-bolder">{{ $title }} {{ $model->nama }}</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type here...">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="container my-3">
                            {{-- Tombol Semester --}}
                            <div class="d-flex">
                                <a href="{{ route($routePrefix . '.show', [
                                        $model->id,
                                                'semester' => 1
                                            ])
                                        }}"
                                    class="btn btn-sm btn-round btn-secondary {{ request()->input('semester') == 1 ? 'btn-success' : '' }} my-3 mx-2">Semester 1
                                </a>
                                <a href="{{ route($routePrefix . '.show', [
                                        $model->id,
                                                'semester' => 2
                                            ])
                                        }}"
                                    class="btn btn-sm btn-round btn-secondary  {{ request()->input('semester') == 2 ? 'btn-success' : '' }} my-3 mx-2">Semester 2
                                </a>
                                <a href="{{ route($routePrefix . '.show', [
                                    $model->id,
                                                'semester' => 3
                                            ])
                                        }}"
                                    class="btn btn-sm btn-round btn-secondary {{ request()->input('semester') == 3 ? 'btn-success' : '' }} my-3 mx-2">Semester 3
                                </a>
                                <a href="{{ route($routePrefix . '.show', [
                                    $model->id,
                                                'semester' => 4
                                            ])
                                        }}"
                                    class="btn btn-sm btn-round btn-secondary {{ request()->input('semester') == 4 ? 'btn-success' : '' }} my-3 mx-2">Semester 4
                                </a>
                                <a href="{{ route($routePrefix . '.show', [
                                    $model->id,
                                                'semester' => 5
                                            ])
                                        }}"
                                    class="btn btn-sm btn-round btn-secondary {{ request()->input('semester') == 5 ? 'btn-success' : '' }} my-3 mx-2">Semester 5
                                </a>
                                <a href="{{ route($routePrefix . '.show', [
                                    $model->id,
                                                'semester' => 6
                                            ])
                                        }}"
                                    class="btn btn-sm btn-round btn-secondary {{ request()->input('semester') == 6 ? 'btn-success' : '' }} my-3 mx-2">Semester 6
                                </a>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table table-sm table-bordered table-striped align-items-center justify-content-center mb-0">
                                    <thead style="background-color: black; color: white">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="1%">No</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">Nama Matakuliah</th>
                                            <th class="text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7 ps-3" width="6%">SKS</th>
                                            <th class="text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7 ps-3" width="6%">Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no= 1 ?>
                                        @foreach ($modelProdi as $item)
                                            @if ($item->semester == request()->input('semester'))
                                            <tr>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xl ps-3">{{ $no++ }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xl font-weight-bold mb-0 ps-2">{{ $item->nama }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xl text-center font-weight-bold mb-0 ps-2">{{ $item->sks }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xl text-center font-weight-bold mb-0 ps-2">{{ $item->bobot }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="2">  <p class="text-xl font-weight-bold mb-0 ps-2"><i>Total SKS & Jumlah Bobot</i></p></td>
                                            <td><p class="text-xl text-center font-weight-bold mb-0 ps-2"><i>{{ $dataSemester->sksSemester }}</i></p></td>
                                            <td><p class="text-xl text-center font-weight-bold mb-0 ps-2"><i>{{ $dataSemester->bobotSemester  }}</i></p></td>
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
{{-- @if(request()->input('semester') == 1)
    Satu
@endif --}}
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
@endsection
