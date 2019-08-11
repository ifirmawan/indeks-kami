@extends('layouts.dashboard-kami')

@push('css')
<style>
    .dot-kepatuhan {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
        background-color: #00802b;
    }

    .dot-penerapan {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
        background-color: #ff6600;
    }

    .dot-kerangka-kerja {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
        background-color: #0000ff;
    }

    .dot-responden {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
        background-color: #b30000;
    }
</style>
@endpush

@section('content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
<div class="col-8">
    <div class="row">
        <div class="col-5">
        <b>
            Tingkat kelengkapan penerapan <br />
            Standar ISO27001 sesuai Kategori SE
        </b>
    </div>
    <div class="col-5">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a  class="nav-link active"
                id="pills-ii-tab" data-toggle="pill"
                href="#pills-ii" role="tab"
                aria-controls="pills-ii"
                aria-selected="true">
                II
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link"
                id="pills-iii-tab" data-toggle="pill"
                href="#pills-iii" role="tab"
                aria-controls="pills-iii"
                aria-selected="true">
                III
            </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link"
                id="pills-iv-tab" data-toggle="pill"
                href="#pills-iv" role="tab"
                aria-controls="pills-iv"
                aria-selected="true">
                IV
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link"
                id="pills-v-tab" data-toggle="pill"
                href="#pills-v" role="tab"
                aria-controls="pills-v"
                aria-selected="true">
                V
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link"
                id="pills-vi-tab" data-toggle="pill"
                href="#pills-vi" role="tab"
                aria-controls="pills-vi"
                aria-selected="true">
                VI
                </a>
            </li>
    </ul>
</div>
<div class="col-2">
    <h3>
        {{ (isset($hasil_evaluasi_all))? ucwords($hasil_evaluasi_all) : '' }}
    </h3>
</div>
    </div>
    <div class="row">
        <div class="col">
            <div class="tab-content" id="pills-tabContent">
        <div
        class="tab-pane fade show active"
        id="pills-ii" role="tabpanel"
        aria-labelledby="pills-ii-tab">
        @include('tata-kelola.hasil-evaluasi',['hasil_evaluasi'=> $hasil_tata_kelola])
        </div>
        <div
        class="tab-pane fade"
        id="pills-iii" role="tabpanel"
        aria-labelledby="pills-iii-tab">
        @include('risiko.hasil-evaluasi',['hasil_evaluasi'=> $hasil_risiko])     
        </div>
        <div
        class="tab-pane fade"
        id="pills-iv" role="tabpanel"
        aria-labelledby="pills-iv-tab">
        @include('kerangka-kerja.hasil-evaluasi',['hasil_evaluasi'=> $hasil_kerangka_kerja])
        </div>
        <div
        class="tab-pane fade"
        id="pills-v" role="tabpanel"
        aria-labelledby="pills-v-tab">
        @include('pengeloaan-aset.hasil-evaluasi',['hasil_evaluasi'=> $hasil_pengelolaan_aset])
        </div>
        <div
        class="tab-pane fade"
        id="pills-vi" role="tabpanel"
        aria-labelledby="pills-vi-tab">
        @include('teknologi.hasil-evaluasi',['hasil_evaluasi'=> $hasil_teknologi])
        </div>
    </div>
        </div>
    </div>
</div>
<div class="col-4">
    <ul class="country-sales list-group list-group-flush">
        <li class=" list-group-item">
            <span>Evaluasi</span>
            <span class="float-right">
                Skor
            </span>
        </li>
        <li class=" list-group-item">
            <strong>I. Kategori SE</strong>
            <span class="float-right">
                {{ (isset($skor_kategori_se))? $skor_kategori_se : '' }}
            </span>
        </li>
        <li class=" list-group-item">
            <strong>II. Tata Kelola</strong>
            <span class="float-right">
                {{ (isset($skor_tata_kelola))? $skor_tata_kelola : '' }}
            </span>
        </li>
        <li class=" list-group-item">
            <strong>III. Pengelolaan Risiko</strong>
            <span class="float-right">
                {{ (isset($skor_risiko))? $skor_risiko : '' }}
            </span>
        </li>
        <li class=" list-group-item">
            <strong>IV. Kerangka Kerja Keamanan Informasi</strong>
            <span class="float-right">
                {{ (isset($skor_kerangka_kerja))? $skor_kerangka_kerja : '' }}
            </span>
        </li>
        <li class=" list-group-item">
            <strong>V. Pengelolaan Aset</strong>
            <span class="float-right">
                {{ (isset($skor_pengelolaan_aset))? $skor_pengelolaan_aset : '' }}
            </span>
        </li>
        <li class=" list-group-item">
            <strong>VI. Teknologi dan Keamanan Informasi</strong>
            <span class="float-right">
                {{ (isset($skor_teknologi))? $skor_teknologi : '' }}
            </span>
        </li>
        <li class="card-footer list-group-item">
            <strong>Total Skor</strong>
            <div class="float-right">
                {{ (isset($total))? $total : '' }}
            </div>
        </li>
    </ul>
</div>
    <!--<div class="col">
        <ul class="country-sales list-group list-group-flush">
            <li class=" list-group-item">
                Kategori SE
                <span class="float-right">
                    <b>Rendah</b>
                </span>
            </li>
            <li class=" list-group-item">
                Tingkat Kematangan
            </li>
            <li class=" list-group-item">
                Tingkat Kematangan
                <span class="float-right">
                    <b>I</b>
                </span>
            </li>
            <li class=" list-group-item">
                Tingkat Kematangan
                <span class="float-right">
                    <b>S/D</b>
                </span>
            </li>
            <li class=" list-group-item">
                Tingkat Kematangan
                <span class="float-right">
                    <b>III</b>
                </span>
            </li>
            <li class=" list-group-item">
                Tingkat Kematangan
            </li>
        </ul>
    </div>-->
</div>
<hr>
<div class="row">
    <div class="col-md-8">
        <canvas id="myChart" width="562" height="562" style="width: 562px; height: 562px;"></canvas>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-0">
                <ul class="country-sales list-group list-group-flush">
                    <li class="country-sales-content list-group-item">
                        <span class="mr-2">
                            <span class="dot-kepatuhan"></span>
                        </span>
                        <strong>Kepatuhan ISO 27001/SNI</strong>
                    </li>
                    <li class="country-sales-content list-group-item">
                        <span class="mr-2">
                            <span class="dot-penerapan"></span>
                        </span>
                        <strong>Proses Penerapan</strong>
                    </li>
                    <li class="country-sales-content list-group-item">
                        <span class="mr-2">
                            <span class="dot-kerangka-kerja"></span>
                        </span>
                        <strong>Kerangka Kerja Dasar</strong>
                    </li>
                    <li class="country-sales-content list-group-item">
                        <span class="mr-2">
                            <span class="dot-responden"></span>
                        </span>
                        <strong>Responden</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection
@push('js')
<script src="{{ asset('vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('libs/js/main-js.js') }}"></script>
<!-- chart chartist js -->
<script src="{{ asset('vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
<!-- sparkline js -->
<script src="{{ asset('vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
<!-- morris js -->
<script src="{{ asset('vendor/charts/morris-bundle/raphael.min.js') }}"></script>
<script src="{{ asset('vendor/charts/morris-bundle/morris.js') }}"></script>
<!-- chart c3 js -->
<script src="{{ asset('vendor/charts/c3charts/c3.min.js') }}"></script>
<script src="{{ asset('vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
<script src="{{ asset('vendor/charts/c3charts/C3chartjs.js') }}"></script>
<script src="{{ asset('libs/js/dashboard-ecommerce.js') }}"></script>
<script src="{{ asset('js/Chart.js') }}"></script>
<script>
    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: "{{ route('json-radar') }}",
            dataType: "json",
            cache: false,
            success: function (data) {
                radarChart(data);
            }
        });

    });

    function radarChart(datasets) {
        var data = {
            labels: ["Tata Kelola", "Pengelolaan Risiko", "Kerangka Kerja", "Pengelolaan Aset", "Aspek Teknologi"],
            datasets: datasets
        };
        var ctx = document.getElementById("myChart");
        var options = {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                        return tooltipItem.yLabel;
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };
        var myRadarChart = new Chart(ctx, {
            type: 'radar',
            data: data,
            options: options
        });
        Chart.helpers.bindEvents(myRadarChart, ['mousedown'], function (evt) {
            var lastMousePosition = [evt.x, evt.y];
            console.log('mousedown');
            var lastActive = myRadarChart.lastActive;
            if (Array.isArray(lastActive) && lastActive.length) {
                lastActive = lastActive[0];
                console.log(lastActive);
                var moveHandler = function (evt) {
                    var index = lastActive._index;
                    var dataset = lastActive._datasetIndex;
                    console.log('mouse move');
                    if (evt.y < lastMousePosition[1]) {
                        myRadarChart.data.datasets[dataset].data[index] = myRadarChart.data.datasets[dataset].data[index] + 1;
                        myRadarChart.update(1, false);
                    } else if (evt.y > lastMousePosition[1]) {
                        myRadarChart.data.datasets[dataset].data[index] = myRadarChart.data.datasets[dataset].data[index] - 1;
                        myRadarChart.update(1, false);
                    }
                    lastMousePosition = [evt.x, evt.y];
                };
                var outHandler = function () {
                    console.log('unbinding');
                    Chart.helpers.unbindEvents(myRadarChart, { 'mousemove': moveHandler });
                    Chart.helpers.unbindEvents(myRadarChart, { 'mouseup': outHandler });
                    Chart.helpers.unbindEvents(myRadarChart, { 'mouseout': outHandler });
                }
                Chart.helpers.bindEvents(myRadarChart, ['mousemove'], moveHandler);
                Chart.helpers.bindEvents(myRadarChart, ['mouseup'], outHandler);
                Chart.helpers.bindEvents(myRadarChart, ['mouseout'], outHandler);
            }
        });
    }
</script>
@endpush