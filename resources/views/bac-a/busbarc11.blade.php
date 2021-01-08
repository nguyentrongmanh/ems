@extends('layouts.mba')

@section('content')

<div class="page-wrapper">
	<div class="mba-container">
        <div class="control-page-header">
            <div class="background-white box-wraper">110KV BUSBAR - BAY NGHIA DAN</div>
        </div>
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
            <div class="col-4 padding-x-5">
                <div class="background-white box-wraper">
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
                <div class="background-white box-wraper" style="">
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
                    <div style="padding-left: 150px;">
                        <div class="station-title" style="width:120px;">NGHĨA ĐÀN</div>
                        <div class="detail-bay-c11">
                            <div class="busbar-label">C11</div>
                            <button class="control-cb-button" data-toggle="modal" data-target="#modal-default"><a href="#ex1" rel="modal:open">Control</a></button>
                            <div class="reveal pd-r-35">
                                <div class="content" style="min-height: 250px;">
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
                                        'id' => 'TBABA_171_CB',
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
                            <div style="position: relative">
                                <div class="content connecting-transformer" style="min-height: 250px;">
                                    <div class="fuse-wrapper " id="CS1T1">
                                        <div class="electric-item-label">CS1T1</div>
                                        <div class="fuse-content">
                                            <div class="fuse-top">
                                            </div>	
                                            <div class="fuse-middle"></div>	
                                            <div class="fuse-bottom">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 459.101 459.101" style="enable-background:new 0 0 459.101 459.101;" xml:space="preserve">
                                                    <g id="XMLID_1468_">
                                                        <polygon id="XMLID_1469_" points="244.551,238.037 244.551,27.05 214.551,27.05 214.551,238.037 0,238.037 0,268.037 
                                                            459.101,268.037 459.101,238.037 	"/>
                                                        <rect id="XMLID_1470_" x="49.551" y="320.043" width="360" height="30"/>
                                                        <rect id="XMLID_1471_" x="94.551" y="402.05" width="270" height="30"/>
                                                    </g>
                                                </svg>
                                            </div>	
                                        </div>
                                    </div>
                                    @include('elements.disconnectors-switches', [ "data" => [
                                        'id' => 'TBABA_131_1_DS',
                                        'label' => "131-1",
                                        'class' => 'bay-item-second'
                                    ]])
                                    @include('elements.earth-breaker', [ "data" => [
                                        'id' => 'TBABA_131_15_EB',
                                        'label' => "131-15",
                                        'class' => 'bay-item-third'
                                    ]])
                                    @include('elements.circuit-breaker', [ "data" => [
                                        'id' => 'TBABA_131_CB',
                                        'label' => "131",
                                        'class' => 'bay-item-fourth'
                                    ]])
                                    @include('elements.earth-breaker', [ "data" => [
                                        'id' => 'TBABA_131_35_EB',
                                        'label' => "131-35",
                                        'class' => 'bay-item-fith'
                                    ]])
                                    @include('elements.disconnectors-switches', [ "data" => [
                                        'id' => 'TBABA_131_3_DS',
                                        'label' => "131-3",
                                        'class' => 'bay-item-sixth'
                                    ]])
                                    @include('elements.earth-breaker', [ "data" => [
                                        'id' => 'TBABA_131_38_EB',
                                        'label' => "131-38",
                                        'class' => 'bay-item-seven'
                                    ]])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5">
                <div class="background-white box-wraper">
                    <h5 class="box-title" style="margin: 0px !important;">BAY 171 MEASUREMENT</h5>
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
                    <h5 class="box-title" style="margin: 0px !important;">BAY 131 MEASUREMENT</h5>
                    <table class="tranformer-static-table">
                        <tbody id="TBABA_BAY_131">
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
                    <h5 class="box-title" style="margin: 0px !important;">BUSBAR MEASUREMENT</h5>
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