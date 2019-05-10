@extends('layouts.dashboard-kami')

@section('content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col">
        <div class="page-header">
            <h2 class="pageheader-title">Bagian II: Tata Kelola Keamanan Informasi</h2>
            <div class="section-block" id="basicform" tabindex="-1">
                <p>Bagian ini mengevaluasi kesiapan bentuk tata kelola keamanan informasi beserta Instansi/fungsi, tugas
                    dan tanggung jawab pengelola keamanan informasi. <br />
                </p>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->

<div class="ecommerce-widget">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <ul class="nav nav-pills card-header-pills" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="card-pills-1" data-toggle="tab" href="#card-pill-0"
                                role="tab" aria-controls="card-0" aria-selected="true">
                                Hasil Evaluasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="card-pills-1" data-toggle="tab" href="#card-pill-1" role="tab"
                                aria-controls="card-1" aria-selected="true">
                                Penerapan 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="card-pills-2" data-toggle="tab" href="#card-pill-2" role="tab"
                                aria-controls="card-2" aria-selected="false">
                                Penerapan 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="card-pills-3" data-toggle="tab" href="#card-pill-3" role="tab"
                                aria-controls="card-3" aria-selected="false">
                                Penerapan 3
                            </a>
                        </li>
                    </ul>
                    <div class="toolbar ml-auto">
                        @if(isset($responden->id))
                        <a href="{{ route('tata-kelola.edit',$responden->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-pencil-alt"></i>&nbsp;
                            Edit
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade active show" id="card-pill-0" role="tabpanel"
                            aria-labelledby="card-tab-0">
                            <div class="row">
                                <div class="col">
                                    <ul class="country-sales list-group list-group-flush">
                                        <li class=" list-group-item">Batas Skor Min untuk Skor Tahap Penerapan  3
                                            <strong
                                                class="float-right">{{ config('skor.kematangan.tata_kelola.batas') }}</strong>
                                        </li>
                                        <li class=" list-group-item">Total Skor Tahap Penerapan  1 & 2
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['n_batas'] }}
                                            </strong>
                                        </li>
                                        <li class=" list-group-item">Status Peniliaian Tahap Penerapan  3
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['status_batas'] }}
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col">
                                    <ul class="country-sales list-group list-group-flush">
                                        <li class=" list-group-item">Skor Tingkat Kematangan II
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['n_ii'] }}
                                            </strong>
                                        </li>
                                        <li class=" list-group-item">Skor Minimum Tingkat Kematangan II
                                            <strong
                                                class="float-right">{{ config('skor.kematangan.tata_kelola.ii.min') }}</strong>
                                        </li>
                                        <li class=" list-group-item">Skor Pencapaian Tingkat Kematangan II
                                            <strong
                                                class="float-right">{{ config('skor.kematangan.tata_kelola.ii.target') }}</strong>
                                        </li>
                                        <li class=" list-group-item">Status
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['status_ii'] }}
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col">
                                    <ul class="country-sales list-group list-group-flush">
                                        <li class=" list-group-item">Skor Tingkat Kematangan III
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['n_iii'] }}
                                            </strong>
                                        </li>
                                        <li class=" list-group-item">Skor Minimum Tingkat Kematangan III
                                            <strong
                                                class="float-right">{{ config('skor.kematangan.tata_kelola.iii.min') }}</strong>
                                        </li>
                                        <li class=" list-group-item">Skor Pencapaian Tingkat Kematangan III
                                            <strong
                                                class="float-right">{{ config('skor.kematangan.tata_kelola.ii.target') }}</strong>
                                        </li>
                                        <li class=" list-group-item">Status
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['status_iii'] }}
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="country-sales list-group list-group-flush">
                                        <li class=" list-group-item">Skor Tingkat Kematangan IV
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['n_iv'] }}
                                            </strong>
                                        </li>
                                        <li class=" list-group-item">Skor Minimum Tingkat Kematangan IV
                                            <strong
                                                class="float-right">{{ config('skor.kematangan.tata_kelola.iv.min') }}</strong>
                                        </li>
                                        <li class=" list-group-item">Skor Pencapaian Tingkat Kematangan IV
                                            <strong
                                                class="float-right">{{ config('skor.kematangan.tata_kelola.iv.target') }}</strong>
                                        </li>
                                        <li class=" list-group-item">Status
                                            <strong class="float-right">
                                            {{ $hasil_evaluasi['status_iv'] }}
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="card-pill-1" role="tabpanel" aria-labelledby="card-tab-1">
                            @if(isset($parameter['1']))
                            <ul class="country-sales list-group list-group-flush">
                                @foreach($parameter['1'] as $key => $value)
                                <li class="country-sales-content list-group-item">
                                    <span class="">
                                        {!! (isset($value->parameter->parameter))? $value->parameter->parameter :
                                        $value->parameter !!}
                                    </span>
                                </li>
                                <div class="card-footer text-right">
                                    @if(isset($value->skor))
                                    @php
                                    switch($value->nomor)
                                    {
                                    case '0':
                                    echo '<span class="alert alert-danger">Tidak Dilakukan</span>';
                                    break;
                                    case '1':
                                    echo '<span class="alert alert-warning">Dalam
                                        Perencanaan</span>';
                                    break;
                                    case '2':
                                    echo '<span class="alert alert-info">Dalam Penerapan / Diterapkan
                                        Sebagian</span>';
                                    break;
                                    case '3':
                                    echo '<span class="alert alert-success">Diterapkan Secara
                                        Menyeluruh</span>';
                                    break;
                                    }
                                    @endphp
                                    @else
                                    <span class="alert alert-danger">Tidak Dilakukan</span>
                                    @endif
                                </div>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                        <!-- tab 2-->
                        <div class="tab-pane fade show" id="card-pill-2" role="tabpanel" aria-labelledby="card-tab-2">
                            @if(isset($parameter['2']))
                            <ul class="country-sales list-group list-group-flush">
                                @foreach($parameter['2'] as $key => $value)
                                <li class="country-sales-content list-group-item">
                                    <span class="">
                                        {!! (isset($value->parameter->parameter))? $value->parameter->parameter :
                                        $value->parameter !!}
                                    </span>
                                </li>
                                <div class="card-footer text-right">
                                    @if(isset($value->skor))
                                    @php
                                    switch($value->nomor)
                                    {
                                    case '0':
                                    echo '<span class="alert alert-danger">Tidak Dilakukan</span>';
                                    break;
                                    case '1':
                                    echo '<span class="alert alert-warning">Dalam
                                        Perencanaan</span>';
                                    break;
                                    case '2':
                                    echo '<span class="alert alert-info">Dalam Penerapan / Diterapkan
                                        Sebagian</span>';
                                    break;
                                    case '3':
                                    echo '<span class="alert alert-success">Diterapkan Secara
                                        Menyeluruh</span>';
                                    break;
                                    }
                                    @endphp
                                    @else
                                    <span class="alert alert-danger">Tidak Dilakukan</span>
                                    @endif
                                </div>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <!-- /tab 2 -->

                        <div class="tab-pane fade show" id="card-pill-3" role="tabpanel" aria-labelledby="card-tab-3">
                            @if(isset($parameter['3']))
                            <ul class="country-sales list-group list-group-flush">
                                @foreach($parameter['3'] as $key => $value)
                                <li class="country-sales-content list-group-item">
                                    <span class="">
                                        {!! (isset($value->parameter->parameter))? $value->parameter->parameter :
                                        $value->parameter !!}
                                    </span>
                                </li>
                                <div class="card-footer text-right">
                                    @if(isset($value->skor))
                                    @php
                                    switch($value->nomor)
                                    {
                                    case '0':
                                    echo '<span class="alert alert-danger">Tidak Dilakukan</span>';
                                    break;
                                    case '1':
                                    echo '<span class="alert alert-warning">Dalam
                                        Perencanaan</span>';
                                    break;
                                    case '2':
                                    echo '<span class="alert alert-info">Dalam Penerapan / Diterapkan
                                        Sebagian</span>';
                                    break;
                                    case '3':
                                    echo '<span class="alert alert-success">Diterapkan Secara
                                        Menyeluruh</span>';
                                    break;
                                    }
                                    @endphp
                                    @else
                                    <span class="alert alert-danger">Tidak Dilakukan</span>
                                    @endif
                                </div>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection