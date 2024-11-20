@extends('layouts.main')

@section('title', 'User Roles Chart')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description">
                        total user yang terdaftar di aplikasi
                        </p>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = @json($data);

        const chartData = data.map(item => ({
            name: item.role,
            y: item.user_count
        }));

        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'User Roles Distribution',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            exporting: {
                enabled: true  // Pastikan fitur ekspor diaktifkan
            },
            series: [{
                name: 'Users',
                colorByPoint: true,
                data: chartData
            }]
        });
    });
</script>
@endsection
