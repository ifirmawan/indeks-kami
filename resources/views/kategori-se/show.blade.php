@extends('layouts.dashboard-kami')

@section('content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-8">
        <div class="page-header">
            <h2 class="pageheader-title">Bagian I: Kategori Sistem Elektronik</h2>
            <div class="section-block" id="basicform" tabindex="-1">
                <p>Bagian ini mengevaluasi tingkat atau kategori sistem elektronik yang digunakan</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="text-right">
            <label>Tingkat Ketergantungan</label>
            <h1>Tinggi</h1>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->

<div class="ecommerce-widget">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="card-header-title">Karakteristik Instansi</h4>
                    <div class="toolbar ml-auto">
                        <a href="{{ route('kategori-se.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i>&nbsp;
                            Kembali
                        </a>
                    </div>
                </div>
                
                @if(isset($kategori_se))
                @foreach($kategori_se as $key => $value)
                @if($key == 0)
                <div class="card-body">
                    @else
                    <div class="card-body border-top">
                        @endif
                        <div class="row">
                            <div class="col-md-10">
                                {!! $value->parameter->parameter  !!}
                            </div>
                            <div class="col-md-2">
                                <div class="text-center">
                                    <label>Status</label>
                                    <h3>
                                        {{ $value->skor }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endsection
