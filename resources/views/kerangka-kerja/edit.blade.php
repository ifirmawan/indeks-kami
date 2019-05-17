@extends('layouts.dashboard-kami')

@section('content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col">
        <div class="page-header">
            <h2 class="pageheader-title">Bagian IV: Kerangka Kerja Pengelolaan Keamanan Informasi</h2>
            <div class="section-block" id="basicform" tabindex="-1">
                <p>Bagian ini mengevaluasi kelengkapan dan kesiapan kerangka kerja (kebijakan & prosedur) pengelolaan keamanan informasi dan strategi penerapannya.<br/>
                    <b>[Penilaian]</b> Tidak Dilakukan; Dalam Perencanaan; Dalam Penerapan atau Diterapkan Sebagian; Diterapkan Secara Menyeluruh
                </p>

            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->

<div class="ecommerce-widget">
    @if(isset($responden->id))
    <form action="{{ route('kerangka-kerja.update',$responden->id) }}" method="post">

        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="identitas_responden_id" value="{{ $responden->id }}" />
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card">
                    <div class="card-header d-flex">

                        <ul class="nav nav-pills card-header-pills" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="card-pills-1" data-toggle="tab" href="#card-pill-1"
                                    role="tab" aria-controls="card-1" aria-selected="true">
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
                            <a href="{{ route('kerangka-kerja.index') }}" class="btn btn-default">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade active show" id="card-pill-1" role="tabpanel"
                                aria-labelledby="card-tab-1">
                                @if(isset($parameter['1']))

                                <div class="list-group list-group-flush">

                                    @foreach($parameter['1'] as $key => $value)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {!! (isset($value->parameter->parameter))? $value->parameter->parameter : $value->parameter !!}
                                                <input type="hidden" name="parameter_id[]" value="{{ (isset($value->parameter->id))?  $value->parameter->id : $value->id }}" />
                                            </div>
                                            <div class="col-md-3">
                                                <select name="skor[]" class="form-control">
                                                    <option value="0">Pilih salah satu</option>
                                                    @if(isset($skor))

                                                    @foreach($skor as $key => $option)
                                                    <option value="{{ $option->skor }}" {{ (isset($value->nomor) && $value->nomor == $option->skor)? 'selected' : '' }} >{{ ucwords($option->status) }}
                                                    </option>
                                                    @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                                @endif
                            </div>
                            <div class="tab-pane fade show" id="card-pill-2" role="tabpanel"
                                aria-labelledby="card-tab-1">
                                @if(isset($parameter['2']))

                                <div class="list-group list-group-flush">

                                    @foreach($parameter['2'] as $key => $value)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {!! (isset($value->parameter->parameter))? $value->parameter->parameter : $value->parameter !!}
                                                <input type="hidden" name="parameter_id[]" value="{{ (isset($value->parameter->id))?  $value->parameter->id : $value->id }}" />
                                            </div>
                                            <div class="col-md-3">
                                                <select name="skor[]" class="form-control">
                                                    <option value="0">Pilih salah satu</option>
                                                    @if(isset($skor))

                                                    @foreach($skor as $key => $option)
                                                    <option value="{{ $option->skor }}"  {{ (isset($value->nomor) && $value->nomor == $option->skor)? 'selected' : '' }} >{{ ucwords($option->status) }}
                                                    </option>
                                                    @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                @endif
                            </div>
                            <div class="tab-pane fade show" id="card-pill-3" role="tabpanel"
                                aria-labelledby="card-tab-1">
                                @if(isset($parameter['3']))

                                <div class="list-group list-group-flush">
                                
                                    @foreach($parameter['3'] as $key => $value)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="row">
                                            <div class="col-md-9">
                                                
                                                {!! (isset($value->parameter->parameter))? $value->parameter->parameter : $value->parameter !!}
                                                
                                                <input type="hidden" name="parameter_id[]" value="{{ (isset($value->parameter->id))?  $value->parameter->id : $value->id }}" />
                                            </div>
                                            <div class="col-md-3">
                                                <select name="skor[]" class="form-control">
                                                    <option value="0">Pilih salah satu</option>
                                                    @if(isset($skor))

                                                    @foreach($skor as $key => $option)
                                                    <option value="{{ $option->skor }}"  {{ (isset($value->nomor) && $value->nomor == $option->skor)? 'selected' : '' }} >{{ ucwords($option->status) }}
                                                    </option>
                                                    @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top user-social-box">
            <div class="float-right">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>
    </form>
    @endif
</div>
@endsection
