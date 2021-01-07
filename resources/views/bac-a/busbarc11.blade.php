@extends('layouts.mba')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<div class="page-wrapper">
	<div class="mba-container">
        <div class="control-page-header">
            <div class="background-white box-wraper">110KV BUSBAR - BAY NGHIA DAN</div>
        </div>
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
            <div class="col-4 padding-x-5">
                <div class="background-white box-wraper min-height-350">
                    <h5 class="box-title">BAY ALARM</h5>
                    <div class="voltage-condition">
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">OVER CURRENT</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">OVER VOLTAGE</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNDER CURRENT</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNDER VOLTAGE</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">BAY TEMP</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNBALANCE VOLTAGE</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">OVER FREQUENCY</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNDER FREQUENCY</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                    </div>
                </div>
                <div class="background-white box-wraper" style="min-height: 270px;">
                    <h5 class="box-title">BUSBAR ALARM</h5>
                    <div class="voltage-condition">
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">OVER CURRENT</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">OVER VOLTAGE</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNDER CURRENT</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNDER VOLTAGE</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">BUSBAR TEMP</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNBALANCE VOLTAGE</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">OVER FREQUENCY</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item width-48-percent">
                            <div class="voltage-condition-lable">UNDER FREQUENCY</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5">
                <div class="background-black box-wraper" style="height: calc(100% - 5px);">
                    <div style="padding-left: 150px; padding-top: 50px;">
                        <div class="station-title" style="width:120px;">NGHĨA ĐÀN</div>
                        <div class="detail-bay">
                            <div class="busbar-label">C11</div>
                            <button class="control-cb-button" data-toggle="modal" data-target="#modal-default"><a href="#ex1" rel="modal:open">Control</a></button>
                            <div class="reveal pd-r-35">
                                <div class="content min-height-350">
                                    <div class="triangle-up-top"></div>
                                    @include('elements.earth-breaker', [ "data" => [
                                        'id' => '171-76',
                                        'label' => "171-76",
                                        'class' => 'bay-item-first'
                                    ]])
            
                                    @include('elements.disconnectors-switches', [ "data" => [
                                        'id' => '171-7',
                                        'label' => "171-7",
                                        'class' => 'bay-item-second'
                                    ]])
            
                                    @include('elements.earth-breaker', [ "data" => [
                                        'id' => '171-75',
                                        'label' => "171-75",
                                        'class' => 'bay-item-third'
                                    ]])
                                    
                                    @include('elements.circuit-breaker', [ "data" => [
                                        'id' => '171',
                                        'label' => "171",
                                        'class' => 'bay-item-fourth'
                                    ]])
            
                                    @include('elements.earth-breaker', [ "data" => [
                                        'id' => '171-15',
                                        'label' => "171-15",
                                        'class' => 'bay-item-fith'
                                    ]])
            
                                    @include('elements.disconnectors-switches', [ "data" => [
                                        'id' => '171-1',
                                        'label' => "171-1",
                                        'class' => 'bay-item-sixth'
                                    ]])
            
                                    @include('elements.earth-breaker', [ "data" => [
                                        'id' => '171-14',
                                        'label' => "171-14",
                                        'class' => 'bay-item-seven'
                                    ]])
                                </div>
                            </div>
                            <div class="busbar-110"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5">
                <div class="background-white box-wraper min-height-350">
                    <h5 class="box-title">BAY MEASUREMENT</h5>
                    <table class="tranformer-static-table">
                        <tbody id="TBABA_BAY_171">
                            <tr>
                                <td class="unit width-50-percent">Voltage(KV)</td>
                                <td class="value kv-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">AMPERAGE(A)</td>
                                <td class="value a-value"></td>
                            </tr>
                            <tr> 
                                <td class="unit width-50-percent">ACTIVE POWER(MW)</td>
                                <td class="value mw-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">REACTIVE POWER(MVAR)</td>
                                <td class="value mvar-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">FACTOR</td>
                                <td class="value cos-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">FREQUENCY</td>
                                <td class="value freq-value"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="background-white box-wraper ">
                    <h5 class="box-title">BUSBAR MEASUREMENT</h5>
                    <table class="tranformer-static-table">
                        <tbody id="TBABA_110_C11">
                            <tr>
                                <td class="unit width-50-percent">Voltage(KV)</td>
                                <td class="value kv-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">AMPERAGE(A)</td>
                                <td class="value a-value"></td>
                            </tr>
                            <tr> 
                                <td class="unit width-50-percent">ACTIVE POWER(MW)</td>
                                <td class="value mw-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">REACTIVE POWER(MVAR)</td>
                                <td class="value mvar-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">TEMP</td>
                                <td class="value temp-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">FACTOR</td>
                                <td class="value cos-value"></td>
                            </tr>
                            <tr>
                                <td class="unit width-50-percent">FREQUENCY</td>
                                <td class="value freq-value"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ex1" class="modal">
    <div class="cb-control-panel">
        <div class="current-status">171: CIRCUIT BREAKER IS CLOSE</div>
        <div class="cb-control-btn">
            <button id="CB-171-OFF">CLOSE</button>
            <button >OPEN</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#CB-171-OFF").on("click", function() {
            message = new Paho.MQTT.Message("Hello CloudMQTT");
            message.destinationName = "/cloudmqtt";
            client.send(message);
        });
    });
</script>
@include('elements.button-group')
@endsection