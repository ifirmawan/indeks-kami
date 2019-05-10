@extends('layouts.dashboard-kami')

@section('content')
@push('css')
<style>
    input[type=radio] {
        display: block;
    }
</style>
@endpush
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col">
        <div class="page-header">
            <h2 class="pageheader-title">Bagian I: Kategori Sistem Elektronik</h2>
            <div class="section-block" id="basicform" tabindex="-1">
                <p>Bagian ini mengevaluasi tingkat atau kategori sistem elektronik yang digunakan</p>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->
<form action="{{ route('kategori-se.update',$responden->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="ecommerce-widget">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-header-title">Karakteristik Instansi</h4>
                        <div class="toolbar ml-auto">
                            <a href="{{ route('kategori-se.index') }}" class="btn btn-default">
                                Kembali
                            </a>
                        </div>
                    </div>
                    @if(isset($parameter))
                    @php
                        $x = 0;
                    @endphp
                    @foreach($parameter as $key => $value)
                    @if($key == 0)
                    <div class="card-body">
                        @else
                        <div class="card-body border-top">
                            @endif
                            <div class="row">
                                <div class="col-md-9">
                                    <label for="{{ 'p-'.$value->id }}">{!! $value->parameter !!}</label>
                                </div>
                                <input type="hidden" value="{{ $value->id }}" name="parameter_id[]" />
                                @if(isset($skor))
                                @foreach($skor as $k => $option)
                                <div class="col-md-1">
                                    {{ ucfirst($option) }}
                                    <input type="radio" name="skor[{{ $x }}]" value="{{ $option }}" id="{{ 'p-'.$value->id }}" />&nbsp;
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @php
                        $x++;
                        @endphp
                        @endforeach
                        @endif

                    </div>
                    <div class="border-top user-social-box">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</form>

@endsection