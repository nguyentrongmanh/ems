 function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset, index) => {
        dataset.data.push(data[index]);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.shift();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
    chart.update();
}

const updateTransformersStatic = (data) => {
    let staticTableId = "#" + data.id
    $(staticTableId).find(".pha-a .kv-value").html(data.kv1);
    $(staticTableId).find(".pha-a .a-value").html(data.a1);
    $(staticTableId).find(".pha-a .mw-value").html(data.mw1);
    $(staticTableId).find(".pha-a .mvar-value").html(data.mvar1);
    $(staticTableId).find(".pha-a .cos-value").html(data.cos1);
    $(staticTableId).find(".pha-a .temp-value").html(data.tem1);

    $(staticTableId).find(".pha-b .kv-value").html(data.kv2);
    $(staticTableId).find(".pha-b .a-value").html(data.a2);
    $(staticTableId).find(".pha-b .mw-value").html(data.mw2);
    $(staticTableId).find(".pha-b .mvar-value").html(data.mvar2);
    $(staticTableId).find(".pha-b .cos-value").html(data.cos2);
    $(staticTableId).find(".pha-b .temp-value").html(data.tem2);

    $(staticTableId).find(".pha-c .kv-value").html(data.kv3);
    $(staticTableId).find(".pha-c .a-value").html(data.a3);
    $(staticTableId).find(".pha-c .mw-value").html(data.mw3);
    $(staticTableId).find(".pha-c .mvar-value").html(data.mvar3);
    $(staticTableId).find(".pha-c .cos-value").html(data.cos3);
    $(staticTableId).find(".pha-c .temp-value").html(data.tem3);

    if (voltageChart.data.labels.length > 9) {
        removeData(voltageChart)
    }
    let label = moment().format("hh:mm:ss");
    let volData = [data.kv1, data.kv2, data.kv3]
    addData(voltageChart, label, volData)
    if (ampChart.data.labels.length > 9) {
        removeData(ampChart)
    }
    let ampeData = [data.a1, data.a2, data.a3]
    addData(ampChart, label, ampeData)
}