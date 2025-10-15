@extends('layouts.app')

@section('title', 'Datos Hoy')

@section('content')
<!-- Small boxes (compactos) -->
<div class="row no-gutters">
    <div class="col-xl-3 col-lg-3 col-md-3 col-6 pr-1 mb-2">
        <div class="small-box bg-warning" style="min-height: 96px; overflow: hidden;">
            <div class="inner">
                <h4 class="mb-0">29.3<sup style="font-size: 12px">°C</sup></h4>
                <p class="mb-0">Temperatura</p>
            </div>
            <div class="icon" style="top: 8px; right: 8px;"><i class="fas fa-thermometer-half"></i></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-6 px-1 mb-2">
        <div class="small-box bg-info" style="min-height: 96px; overflow: hidden;">
            <div class="inner">
                <h4 class="mb-0">91<sup style="font-size: 12px">%</sup></h4>
                <p class="mb-0">Humedad</p>
            </div>
            <div class="icon" style="top: 8px; right: 8px;"><i class="fas fa-tint"></i></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-6 px-1 mb-2">
        <div class="small-box bg-primary" style="min-height: 96px; overflow: hidden;">
            <div class="inner">
                <h4 class="mb-0">0 <sup style="font-size: 12px">mm</sup></h4>
                <p class="mb-0">Precipitación</p>
            </div>
            <div class="icon" style="top: 8px; right: 8px;"><i class="fas fa-cloud-showers-heavy"></i></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-6 pl-1 mb-2">
        <div class="small-box bg-teal" style="min-height: 96px; overflow: hidden;">
            <div class="inner">
                <h4 class="mb-0">7.6 <sup style="font-size: 12px">km/h</sup></h4>
                <p class="mb-0">Viento</p>
            </div>
            <div class="icon" style="top: 8px; right: 8px;"><i class="fas fa-wind"></i></div>
        </div>
    </div>
</div>

<!-- Gráficos compactos alineados -->
<div class="row align-items-stretch">
    <div class="col-lg-8 col-12 d-flex">
        <div class="card card-outline card-warning mb-3 w-100 h-100">
            <div class="card-header p-2">
                <h3 class="card-title" style="font-size: 1rem">Temperatura (Tiempo real)</h3>
                <div class="card-tools">
                    <span class="badge badge-warning">En vivo</span>
                </div>
            </div>
            <div class="card-body p-2">
                <div id="realtime-chart" style="height: 260px;"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-12 d-flex">
        <div class="card card-outline card-primary mb-3 w-100 h-100">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-pills p-2" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#prec-tab" data-toggle="tab" role="tab">Precipitación</a></li>
                    <li class="nav-item"><a class="nav-link" href="#hum-tab" data-toggle="tab" role="tab">Humedad</a></li>
                </ul>
            </div>
            <div class="card-body p-2">
                <div class="tab-content p-0">
                    <div class="chart tab-pane fade show active" id="prec-tab" role="tabpanel" style="position: relative; height: 240px;">
                        <canvas id="chart-prec" height="240"></canvas>
                    </div>
                    <div class="chart tab-pane fade" id="hum-tab" role="tabpanel" style="position: relative; height: 240px;">
                        <canvas id="chart-hum" height="240"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<!-- Flot para Interactive Area Chart (AdminLTE v3 examples) -->
<script src="https://cdn.jsdelivr.net/npm/flot@4.2.3/dist/es5/jquery.flot.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot@4.2.3/dist/es5/jquery.flot.resize.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot@4.2.3/source/jquery.flot.time.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot@4.2.3/source/jquery.flot.categories.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot@4.2.3/source/jquery.flot.stack.js"></script>
<!-- Chart.js para tarjetas laterales -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var labels = ['00:00','02:00','04:00','06:00','08:00','10:00','12:00','14:00','16:00','18:00','20:00'];

        // Interactive Area Chart (tiempo real) usando Flot
        var data = [], totalPoints = 100;
        function getRandomData() {
            if (data.length > 0) data = data.slice(1);
            while (data.length < totalPoints) {
                var prev = data.length > 0 ? data[data.length - 1] : 25;
                var y = prev + Math.random() * 2 - 1;
                if (y < 18) y = 18; if (y > 34) y = 34;
                data.push(y);
            }
            var res = [];
            for (var i = 0; i < data.length; ++i) res.push([i, data[i]]);
            return res;
        }
        var options = {
            series: { shadowSize: 0, lines: { fill: true, lineWidth: 2, fillColor: 'rgba(245, 158, 11, 0.2)' } },
            yaxis: { min: 18, max: 34, tickColor: '#f4f6f9' },
            xaxis: { show: false },
            colors: ['#f59e0b'],
            grid: { borderColor: '#f4f6f9', borderWidth: 1, tickColor: '#f4f6f9' }
        };
        var plot = $.plot('#realtime-chart', [ getRandomData() ], options);
        function update() {
            plot.setData([ getRandomData() ]);
            plot.draw();
            setTimeout(update, 1000);
        }
        update();

        var precData = {
            labels: labels,
            datasets: [{
                label: 'mm',
                data: [0,0,0,0,0,0,0,0,0,2.5,0.2],
                backgroundColor: '#3b82f6'
            }]
        };
        var precOptions = {
            legend: { display: false },
            scales: { yAxes: [{ ticks: { beginAtZero: true } }] }
        };
        var ctxP = document.getElementById('chart-prec').getContext('2d');
        var chartPrec = new Chart(ctxP, { type: 'bar', data: precData, options: precOptions });

        var humData = {
            labels: labels,
            datasets: [{
                label: '%',
                data: [88,80,72,65,75,68,82,70,78,60,72],
                borderColor: '#06b6d4',
                backgroundColor: 'rgba(6,182,212,0.15)',
                pointRadius: 0,
                lineTension: 0.3,
                borderWidth: 3
            }]
        };
        var humOptions = {
            legend: { display: false },
            scales: { yAxes: [{ ticks: { beginAtZero: true, max: 100 } }] }
        };
        var ctxH = document.getElementById('chart-hum').getContext('2d');
        var chartHum = new Chart(ctxH, { type: 'line', data: humData, options: humOptions });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            chartPrec.resize();
            chartHum.resize();
        });
    });
</script>
@endpush
@endsection


