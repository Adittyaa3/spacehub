@extends('layouts.main')

@section('title', 'SpaceHub Admin Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 bg-primary">
                    <h6 class="text-white">Admin Dashboard</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div id="userRolesContainer" class="chart-container"></div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div id="paymentTypesContainer" class="chart-container"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div id="bookingStatusContainer" class="chart-container"></div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div id="roomStatusContainer" class="chart-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
    :root {
        --primary: #ff6b6b;
        --primary-dark: #ff5252;
        --secondary: #4ecdc4;
        --background: #ffffff;
        --text: #333333;
        --text-light: #6c757d;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .chart-container {
        height: 400px;
    }

    .bg-primary {
        background-color: var(--primary) !important;
    }

    .text-white {
        color: var(--background) !important;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const userRolesData = @json($userRolesData);
    const paymentData = @json($paymentData);
    const bookingData = @json($bookingData);
    const roomData = @json($roomData);

    const chartColors = ['#ff6b6b', '#4ecdc4', '#feca57', '#ff9ff3', '#54a0ff', '#5f27cd'];

    const defaultChartOptions = {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            align: 'left',
            style: {
                color: '#ff6b6b',
                fontSize: '18px',
                fontWeight: 'bold'
            }
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
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: '#333333'
                    }
                },
                showInLegend: true
            }
        },
        colors: chartColors,
        credits: {
            enabled: false
        },
        exporting: {
            enabled: true
        }
    };

    function createChart(containerId, title, data) {
        Highcharts.chart(containerId, {
            ...defaultChartOptions,
            title: {
                ...defaultChartOptions.title,
                text: title
            },
            series: [{
                name: 'Percentage',
                colorByPoint: true,
                data: data
            }]
        });
    }

    createChart('userRolesContainer', 'User Roles Distribution', userRolesData);
    createChart('paymentTypesContainer', 'Payment Types Distribution', paymentData);
    createChart('bookingStatusContainer', 'Booking Status Distribution', bookingData);
    createChart('roomStatusContainer', 'Room Status Distribution', roomData);
});
</script>
@endsection
