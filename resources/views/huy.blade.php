@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<div id="gmap"></div>
<div class="row">
    <div class="col-6">
        <canvas id="voltage-chart" width="350" height="200"></canvas>
    </div>
    <div class="col-6">
        <canvas id="amperage-chart" width="350" height="200"></canvas>
    </div>
    <div class="col-6">
        <canvas id="voltage-chart" width="350" height="200"></canvas>
    </div>
    <div class="col-6">
        <canvas id="amperage-chart" width="350" height="200"></canvas>
    </div>
</div>
<script>
    var volCtx = document.getElementById('voltage-chart');
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
    var iCharS = new Chart(ampCtx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Pha A',
                fill: false,
                borderColor: "red",
                borderWidth: 3,
                data: [],
            }]
        },
        options: {
            title: {
                display: true,
                text: "Solar charged current",
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
    })

    function updateChart(chart, label, data) {
        chart.data.labels = label;
        chart.data.datasets.forEach((dataset, index) => {
            dataset.data = data;
        });
        chart.update();
    }

    // const axios = require('axios').default;
    axios.defaults.baseURL = 'http://graduation-20201.herokuapp.com/api';

    axios.get('/get5NewestRecord')
    .then(function (response) {
        let labels = []
        let data = response.data.data
        console.log(response);
        console.log(data);

        for (let index = 0; index < data.min.length; index++) {
           let datetime = data.min[index] + ":" + data.hour[index] + " " + data.day[index] + "-" + data.month[index] + "-" + data.year[index]
           labels.push(datetime)
        }
        console.log(labels)
        updateChart(iCharS, labels, data.iCharS)
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })
    
    $(document).ready(function() {
        let center = { lat: 35.652832, lng: 139.839478 }
        let map
        let geocoder
        var marker
        var initLocation = function() {
            map = new google.maps.Map(document.getElementById("gmap"), {
                center: center,
                zoom:10
            });
            geocoder = new google.maps.Geocoder();
            marker = new google.maps.Marker({
                position: center,
                map: map,
                draggable: true
            });
        }
        initLocation()
    });
</script>
@endsection