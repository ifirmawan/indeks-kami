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
            <h1>{{ (isset($klasifikasi))? $klasifikasi : '' }}</h1>
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
                        @if($responden->id ?? false)
                        <a href="{{ route('kategori-se.edit',$responden->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-pencil-alt"></i>&nbsp;
                            Edit
                        </a>
                        @endif
                    </div>
                </div>
                
                @if(isset($parameter))
                @foreach($parameter as $key => $value)
                @if($key == 0)
                <div class="card-body">
                    @else
                    <div class="card-body border-top">
                        @endif
                        <div class="row">
                            <div class="col-md-10">
                                {!! (isset($value->parameter->parameter))? $value->parameter->parameter : $value->parameter !!}
                            </div>
                            <div class="col-md-2">
                                <div class="text-center">
                                    <label>Status</label>
                                    <h3>
                                        {{ (isset($value->skor))? $value->skor : '-' }}
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
