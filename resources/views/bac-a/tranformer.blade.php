@extends('layouts.mba')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
<div class="page-wrapper">
	<div class="mba-container">
        <div class="control-page-header">
            <div class="background-white box-wraper">TRANFORMER T2 - 40MVA</div>
        </div>
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
            <div class="col-4 padding-x-5">
                <div class="background-white box-wraper min-height-350">
                    <h5 class="box-title">HIGE VOLTAGE CONDITION</h5>
                    <div class="voltage-condition">
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">MV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">LV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">MV WINDING</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">LV WINDING</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OIL TRANSF</div>
                            <div class="voltage-condition-value">LOW</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OIL OLTC</div>
                            <div class="voltage-condition-value">LOW</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OIL TEMP</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OIL TRANSF</div>
                            <div class="voltage-condition-value">HIGH</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OIL OLTC</div>
                            <div class="voltage-condition-value">HIGH</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OIL TEMP</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">RELAY GAS</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OLTC PRESSURE</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OLTC OIL FOLOW</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">RELAY GAS</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">OLTC PROGRESS</div>
                            <div class="voltage-condition-value">FAILURE</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">VALE PRESSURE</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">FAN SYSTEM</div>
                            <div class="voltage-condition-value">FAILURE</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">FAN SUNPPLY</div>
                            <div class="voltage-condition-value">FAILURE</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">PRESSURE</div>
                            <div class="voltage-condition-value">TRIP</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5">
                <div class="background-black box-wraper min-height-350">
                    <div class="background-black box-wraper">
                        <img class="tranformer-image" src="{{ url('image/tranformer_t1.PNG') }}" />
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5">
                <div class="background-white box-wraper min-height-350">
                    <table class="tranformer-static-table">
                        <thead>
                            <td style="font-size: 16px !important; font-weight: 600">MEASUREMENT</td>
                            <td class="phase-label">PHASE A</td>
                            <td class="phase-label">PHASE B</td>
                            <td class="phase-label">PHASE C</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="unit">Voltage(KV)</td>
                                <td class="value">110.02 KV</td>
                                <td class="value">35.08 KV</td>
                                <td class="value">22.01 KV</td>
                            </tr>
                            <tr>
                                <td class="unit">AMPERAGE</td>
                                <td class="value">99.72 A</td>
                                <td class="value">157.34 A</td>
                                <td class="value">243.42 A</td>
                            </tr>
                            <tr>
                                <td class="unit">ACTIVE POWER</td>
                                <td class="value">17.98 MW</td>
                                <td class="value">9.20 MW</td>
                                <td class="value">8.82 MW</td>
                            </tr>
                            <tr>
                                <td class="unit">REACTIVE POWER</td>
                                <td class="value">5.91 MVAr</td>
                                <td class="value">3.00 MVAr</td>
                                <td class="value">2.94 MVAr</td>
                            </tr>
                            <tr>
                                <td class="unit">POWER</td>
                                <td class="value">18.92 MVA</td>
                                <td class="value">10.00 MVA</td>
                                <td class="value">9.33 MVA</td>
                            </tr>
                            <tr>
                                <td class="unit">FACTOR</td>
                                <td class="value">0.945</td>
                                <td class="value">0.950</td>
                                <td class="value">0.950</td>
                            </tr>
                            <tr>
                                <td class="unit">FREQUENCY</td>
                                <td class="value">49.98</td>
                                <td class="value">49.98</td>
                                <td class="value">49.98</td>
                            </tr>
                            <tr>
                                <td class="unit">TEMPERATURE</td>
                                <td class="value">49.98 &#8451;</td>
                                <td class="value">49.98 &#8451;</td>
                                <td class="value">49.98 &#8451;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
            <div class="col-4 padding-x-5 table-cell">
                <div class="background-white box-wraper">
                    <h5 class="box-title">PROTECTION</h5>
                    <div class="voltage-condition">
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">GENERAL TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">GROUND TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">DIFF TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">PHASE A TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">PHASE B TRIP</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">PHASE C TRIP</div>
                        </div>
                    </div>
                </div>
                <div class="background-white box-wraper">
                    <h5 class="box-title">COMMAND</h5>
                    <div class="voltage-condition">
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">F87T</div>
                            <div class="command-button">
                                <button>RESET</button>
                            </div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">F90</div>
                            <div class="command-button">
                                <button>RESET</button>
                            </div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">ACK</div>
                            <div class="command-button">
                                <button>RESET</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5 table-cell">
                <div class="background-white box-wraper" style="height: calc(100% - 5px);">
                    <h5 class="box-title">FAN GROUP</h5>
                    <div class="status-group-flex">
                        <div class="status-box">
                            <div class="lable">LOCAL/REMOTE</div>
                            <div class="status-text">REMOTE</div>
                        </div>
                        <div class="status-box">
                            <div class="lable">AUTO/MANUAL</div>
                            <div class="status-text">MANUAL</div>
                        </div>
                        <div class="status-box">
                            <div class="lable">FAN GROUP 1</div>
                            <div class="status-text">RUNNING</div>
                        </div>
                        <div class="status-box">
                            <div class="lable">FAN GROUP 2</div>
                            <div class="status-text">RUNNING</div>
                        </div>
                    </div>
                    <div class="fan-control-btn-group">
                        <button>FAN 1 CONTROL</button>
                        <button>FAN 2 CONTROL</button>
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5 table-cell">
                <div class="background-white box-wraper" style="height: calc(100% - 5px);">
                    <h5 class="box-title">TEMPERATURE MEASUREMENT</h5>
                    <div class="row" style="margin: 5px 0px;">
                        <div class="col-3 temp-measure">
                            <div class="label">OIL</div>
                            <div class="value">30.5 &#8451;</div>
                        </div>
                        <div class="col-3 temp-measure">
                            <div class="label">110KV</div>
                            <div class="value">30.5 &#8451;</div>
                        </div>
                        <div class="col-3 temp-measure">
                            <div class="label">35KV</div>
                            <div class="value">30.5 &#8451;</div>
                        </div>
                        <div class="col-3 temp-measure">
                            <div class="label">22KV</div>
                            <div class="value">30.5 &#8451;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('elements.button-group')
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