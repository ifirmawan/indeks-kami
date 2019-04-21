@extends('layouts.dashboard-kami')

@section('content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-8">
        <div class="page-header">
            <h2 class="pageheader-title">Bagian II: Tata Kelola Keamanan Informasi</h2>
            <div class="section-block" id="basicform" tabindex="-1">
                <p>Bagian ini mengevaluasi kesiapan bentuk tata kelola keamanan informasi beserta Instansi/fungsi, tugas
                    dan tanggung jawab pengelola keamanan informasi. <br />
                </p>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4>Skor Tata Kelola</h4>
                    <div class="toolbar ml-auto">

                        <a href="{{ route('tata-kelola.status') }}" class="btn btn-sm btn-primary">
                            Lihat Status
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">

                    <div class="card">
                        <div class="card-body p-0">
                            <ul class="country-sales list-group list-group-flush">

                                <li class="card-footer list-group-item">
                                    <span class="">Total Nilai Evaluasi Tata Kelola</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($total))? $total : 0  }}
                                    </span>
                                </li>

                                <li class="list-group-item">
                                    <span class="">Jumlah pertanyaan Tahap 1</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['tahap_1']))? $indeks_tata_kelola['tahap_1'] : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Jumlah pertanyaan Tahap 2</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['tahap_2']))? $indeks_tata_kelola['tahap_2'] : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Jumlah pertanyaan Tahap 3</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['tahap_3']))? $indeks_tata_kelola['tahap_3'] : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Batas Skor Min untuk Skor Tahap Penerapan 3</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['skor_min_i']))? $indeks_tata_kelola['skor_min_i'] : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Total Skor Tahap Penerapan 1 & 2</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($total_i_ii))? $total_i_ii : 0  }}
                                    </span>
                                </li>
                                <li class="card-footer list-group-item">
                                    <span class="">Status Peniliaian Tahap Penerapan 3</span>
                                    <span class="float-right text-dark">
                                        @if(isset($indeks_tata_kelola['skor_min_i']) && ($total_i_ii >=
                                        $indeks_tata_kelola['skor_min_i']) )
                                        <strong>Valid</strong>
                                        @else
                                        <strong>Tidak Valid</strong>
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Tingkat Kematangan II</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($kematangan_ii))? $kematangan_ii : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Minimum Tingkat Kematangan II</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['skor_min_ii']))? $indeks_tata_kelola['skor_min_ii'] : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Pencapaian Tingkat Kematangan II</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['skor_pencapaian_ii']))? $indeks_tata_kelola['skor_pencapaian_ii'] : 0  }}
                                    </span>
                                </li>
                                <li class="card-footer list-group-item">
                                    <span class="">Status</span>
                                    <span class="float-right text-dark">
                                    @if(
                                            isset($kematangan_ii) &&
                                            isset($indeks_tata_kelola['skor_min_ii']) &&
                                            isset($indeks_tata_kelola['skor_pencapaian_ii']) 
                                        )
                                        @if(
                                            $kematangan_ii >=  $indeks_tata_kelola['skor_min_ii'] && 
                                            $kematangan_ii < $indeks_tata_kelola['skor_pencapaian_ii']
                                        )
                                        I+
                                        @elseif($kematangan_ii >= $indeks_tata_kelola['skor_pencapaian_ii'])
                                        II
                                        @else 
                                        NO
                                        @endif 
                                    @endif
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Tingkat Kematangan III</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($kematangan_iii))? $kematangan_iii : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Validitas Tingkat Kematangan III</span>
                                    <span class="float-right text-dark">
                                    @php 
                                    $validasi_kematangan_iii = 'no';
                                    $validasi_kematangan_iv  = 'no';
                                    @endphp
                                    @if(
                                        isset($kematangan_ii) &&
                                        $kematangan_ii >= floatval(43.2)    
                                    )
                                    YES
                                    $validasi_kematangan_iii = 'yes';
                                    @else 
                                    NO
                                    @endif 
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Minimum Tingkat Kematangan III</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['skor_min_iii']))? $indeks_tata_kelola['skor_min_iii'] : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Pencapaian Tingkat Kematangan III</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['skor_pencapaian_iii']))? $indeks_tata_kelola['skor_pencapaian_iii'] : 0  }}
                                    </span>
                                </li>
                                <li class="card-footer list-group-item">
                                    <span class="">Status</span>
                                    <span class="float-right text-dark">
                                    @if(
                                        $validasi_kematangan_iii == 'yes' &&
                                        isset($kematangan_iii) &&
                                        isset($indeks_tata_kelola['skor_min_iii']) &&
                                        isset($indeks_tata_kelola['skor_pencapaian_iii'])
                                    )
                                        @if(
                                            $kematangan_iii >= $indeks_tata_kelola['skor_min_iii'] &&
                                            $kematangan_iii < $indeks_tata_kelola['skor_pencapaian_iii']
                                        )
                                        II+
                                        @elseif(
                                            $kematangan_iii >= $indeks_tata_kelola['skor_pencapaian_iii']
                                        )
                                        III
                                        @else 
                                        II
                                        @endif
                                    @else 
                                        NO 
                                    @endif  
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Tingkat Kematangan IV</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($kematangan_iv))? $kematangan_iv : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Validitas Tingkat Kematangan IV</span>
                                    <span class="float-right text-dark">
                                    @if(
                                        $validasi_kematangan_iii == 'yes' &&
                                        isset($kematangan_iii) &&
                                        $kematangan_iii >= floatval(16)
                                    )
                                    YES
                                    $validasi_kematangan_iv = 'yes';
                                    @else 
                                    NO
                                    @endif
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Minimum Tingkat Kematangan IV</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['skor_min_iv']))? $indeks_tata_kelola['skor_min_iv'] : 0  }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="">Skor Pencapaian Tingkat Kematangan IV</span>
                                    <span class="float-right text-dark">
                                        {{ (isset($indeks_tata_kelola['skor_pencapaian_iv']))? $indeks_tata_kelola['skor_pencapaian_iv'] : 0  }}
                                    </span>
                                </li>
                                <li class="card-footer list-group-item">
                                    <span class="">Status</span>
                                    <span class="float-right text-dark">
                                    @if(
                                        $validasi_kematangan_iv == 'yes' &&
                                        isset($kematangan_ii) &&
                                        isset($kematangan_iii) &&
                                        isset($indeks_tata_kelola['skor_pencapaian_iv']) &&
                                        isset($kematangan_iv)
                                    )
                                        @if(
                                            $kematangan_ii == 54 &&
                                            $kematangan_iii >= 18 &&
                                            $kematangan_iv >= $indeks_tata_kelola['skor_pencapaian_iv']
                                        )
                                        IV
                                        @elseif($kematangan_iv >= $indeks_tata_kelola['skor_min_iv'])
                                        III+
                                        @else 
                                        III
                                        @endif 
                                    @else 
                                    NO
                                    @endif 
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('tata-kelola.status') }}" class="btn-primary-link">Lihat Detail</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection