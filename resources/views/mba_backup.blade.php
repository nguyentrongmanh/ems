@extends('layouts.mba')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
<div class="page-wrapper">
	<div class="mba-container">
        <div class="row" style="height: 100%;margin-right: 0px;margin-left: 0px;">
            <div class="col-3">
                <div class="mba-photo-container">
                    <img style="width: 100%;" src="{{ url('/images/mba-baca.jpg') }}" />
                </div>
                <div class="back-button-container">
                    <a href="{{ url('tba/bac-a') }}" class="previous"><span>&laquo; Back</span></a>
                </div>
            </div>
            <div class="col-9">
                <div class="main-parameter" style="padding-left:50px;">
                    <div class="main-parameter-header">
                        <div class="single-line" tab-index="1" style="width: 200px;">
                            Chart
                        </div>
                    </div>
                    <table class="main-parameter-content tab-1" id="MBA_110">
                        <tr class="main-parameter-item mba-static-group">
                            <td class="main-parameter-item-lable is-white mba-td">PHA</td>
                            <td class="main-parameter-item-lable is-white mba-td">VOLTAGE</td>
                            <td class="main-parameter-item-lable is-white mba-td">AMPERAGE</td>
                            <td class="main-parameter-item-unit is-white mba-td">MW-POWER</td>
                            <td class="main-parameter-item-unit is-white mba-td">MVAR-POWER</td>
                            <td class="main-parameter-item-unit is-white mba-td">COS</td>
                            <td class="main-parameter-item-unit is-white mba-td">TEMP</td>
                        </tr>
                        <tr class="main-parameter-item mba-static-group pha-a">
                            <td class="main-parameter-item-lable  mba-td ">A</td>
                            <td class="main-parameter-item-lable is-red mba-td  kv-value">--</td>
                            <td class="main-parameter-item-lable is-red mba-td  a-value">--</td>
                            <td class="main-parameter-item-lable is-red mba-td  mw-value">--</td>
                            <td class="main-parameter-item-vontage is-red mba-td  mvar-value">--</td>
                            <td class="main-parameter-item-temp is-red mba-td  cos-value">--</td>
                            <td class="main-parameter-item-temp is-red mba-td  temp-value">--</td>
                        </tr>
                        <tr class="main-parameter-item mba-static-group pha-b">
                            <td class="main-parameter-item-lable  mba-td">B</td>
                            <td class="main-parameter-item-lable is-yellow mba-td kv-value">--</td>
                            <td class="main-parameter-item-lable is-yellow mba-td a-value">--</td>
                            <td class="main-parameter-item-lable is-yellow mba-td mw-value">--</td>
                            <td class="main-parameter-item-vontage is-yellow mba-td mvar-value">--</td>
                            <td class="main-parameter-item-temp is-yellow mba-td cos-value">--</td>
                            <td class="main-parameter-item-temp is-yellow mba-td temp-value">--</td>
                        </tr>
                        <tr class="main-parameter-item mba-static-group pha-c" >
                            <td class="main-parameter-item-lable ">C</td>
                            <td class="main-parameter-item-lable is-aqua kv-value">--</td>
                            <td class="main-parameter-item-lable is-aqua a-value">--</td>
                            <td class="main-parameter-item-lable is-aqua mw-value">--</td>
                            <td class="main-parameter-item-vontage is-aqua mvar-value">--</td>
                            <td class="main-parameter-item-temp is-aqua cos-value">--</td>
                            <td class="main-parameter-item-temp is-aqua temp-value">--</td>
                        </tr>
                    </table>
                    <div class="chart-container tab-2">
                        <div class="row">
                            <div class="col-12 chart-content">
                                <canvas class="static-chart" id="voltage-chart" style="background: white;"></canvas>
                            </div>
                            <div class="col-12 chart-content">
                                <canvas class="static-chart" id="amperage-chart" style="background: white;"></canvas>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-6 chart-content">
                                <canvas class="static-chart" id="cos-chart" style="background: white;"></canvas>
                            </div>
                            <div class="col-6 chart-content">
                                <canvas class="static-chart" id="temp-chart" style="background: white;"></canvas>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript">
    $(document).ready(function() {
        $(".single-line").on("click", function () {
            let tabIndex = $(this).attr("tab-index")
            if (tabIndex == 1) {
                $(this).attr("tab-index", 2);
                $(".tab-1").hide(500);
                $(".tab-2").show(500);
                $(this).html("Table");
            }
            if (tabIndex == 2) {
                $(this).attr("tab-index", 1);
                $(".tab-2").hide(500);
                $(".tab-1").show(500);
                $(this).html("Chart");
            }
        })
    })
    var volCtx = document.getElementById('voltage-chart');
    var ampCtx = document.getElementById('amperage-chart');
    var ampCtx = document.getElementById('amperage-chart');
    var voltageChart = new Chart(volCtx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Pha A',
                fill: false,
                borderColor: "red",
                borderWidth: 3,
                data: [],
            }, {
                label: 'Pha B',
                borderColor: "yellow",
                fill: false,
                borderWidth: 3,
                backgroundColor: '#9fa19f',
                data: [],
            }, {
                label: 'Pha C',
                borderColor: "aqua",
                backgroundColor: '#9fa19f',
                fill: false,
                borderWidth: 3,
                data: [],
            }]
        },
        options: {
            title: {
                display: true,
                text: "Voltage",
                fontSize: 16,
                fontColor: 'rgb(181, 178, 170)'
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: "right",
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            },
            tooltips: {
                enabled: true,
            }
        }
    });
    var ampChart = new Chart(ampCtx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Pha A',
                fill: false,
                borderColor: "red",
                borderWidth: 3,
                data: [],
            }, {
                label: 'Pha B',
                borderColor: "yellow",
                fill: false,
                borderWidth: 3,
                backgroundColor: '#9fa19f',
                data: [],
            }, {
                label: 'Pha C',
                borderColor: "aqua",
                backgroundColor: '#9fa19f',
                fill: false,
                borderWidth: 3,
                data: [],
            }]
        },
        options: {
            title: {
                display: true,
                text: "Amperage",
                fontSize: 16,
                fontColor: 'rgb(181, 178, 170)'
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: "right",
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            },
            tooltips: {
                enabled: true,
            }
        }
    });

</script>

@endsection