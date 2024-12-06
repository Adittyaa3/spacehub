@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Admin Dashboard</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div id="userRolesContainer"></div>
                </div>
                <div class="col-md-6">
                    <div id="paymentTypesContainer"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="bookingStatusContainer"></div>
                </div>
                <div class="col-md-6">
                    <div id="roomStatusContainer"></div>
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
    const userRolesData = @json($userRolesData);
    const paymentData = @json($paymentData);
    const bookingData = @json($bookingData);
    const roomData = @json($roomData);

    Highcharts.chart('userRolesContainer', {
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
        colors: ['#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1'],
        series: [{
            name: 'Users',
            colorByPoint: true,
            data: userRolesData
        }]
    });

    Highcharts.chart('paymentTypesContainer', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Payment Types Distribution',
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
        colors: ['#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0', '#ffb3e6', '#c4e17f', '#76d7c4', '#f7b7a3', '#d4a5a5'],
        series: [{
            name: 'Payments',
            colorByPoint: true,
            data: paymentData
        }]
    });

    Highcharts.chart('bookingStatusContainer', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Booking Status Distribution',
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
        colors: ['#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0', '#ffb3e6', '#c4e17f', '#76d7c4', '#f7b7a3', '#d4a5a5'],
        series: [{
            name: 'Bookings',
            colorByPoint: true,
            data: bookingData
        }]
    });

    Highcharts.chart('roomStatusContainer', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Room Status Distribution',
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
        colors: ['#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1'],
        series: [{
            name: 'Rooms',
            colorByPoint: true,
            data: roomData
        }]
    });
});
</script>
@endsection
