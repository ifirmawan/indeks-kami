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
        background-color: #00e64d;
    }

    .dot-kerangka-kerja {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
        background-color: #b3ffcc;
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
    <div class="col">
        <h3>Hasil Evaluasi</h3>
    </div>
    <div class="col">
        <div class="text-right">
            <h2>{{ ucwords($hasil_evaluasi_all) }}</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <b>
            Tingkat kelengkapan penerapan <br />
            Standar ISO27001 sesuai Kategori SE
        </b>
    </div>
    <div class="col-md-8">
        <div>
            <div class="progress" style="height:25px;">
                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0"
                    aria-valuemax="100"></div>
                <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30"
                    aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        <ul class="country-sales list-group list-group-flush">
            <li class=" list-group-item">
                <strong>Skor Kategori SE</strong>
                <span class="float-right">
                    {{ $skor_kategori_se }}
                </span>
            </li>
            <li class=" list-group-item">
                <strong>Tata Kelola</strong>
                <span class="float-right">
                    {{ $skor_tata_kelola }}
                </span>
            </li>
            <li class=" list-group-item">
                <strong>Pengelolaan Risiko</strong>
                <span class="float-right">
                    {{ $skor_risiko }}
                </span>
            </li>
            <li class=" list-group-item">
                <strong>Kerangka Kerja Keamanan Informasi</strong>
                <span class="float-right">
                    {{ $skor_kerangka_kerja }}
                </span>
            </li>
            <li class=" list-group-item">
                <strong>Pengelolaan Aset</strong>
                <span class="float-right">
                    {{ $skor_pengelolaan_aset }}
                </span>
            </li>
            <li class=" list-group-item">
                <strong>Teknologi dan Keamanan Informasi</strong>
                <span class="float-right">
                    {{ $skor_teknologi }}
                </span>
            </li>
            <li class="card-footer list-group-item">
                    <strong>Total Skor</strong>
                <div class="float-right">
                    {{ $total }}
                </div>
            </li>
        </ul>
    </div>
    <div class="col-md-6">
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
    </div>
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