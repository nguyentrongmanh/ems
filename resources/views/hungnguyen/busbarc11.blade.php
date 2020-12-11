@extends('layouts.mba')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
<div class="page-wrapper">
	<div class="mba-container">
        <div class="control-page-header">
            <div class="background-white box-wraper">110KV BUSBAR - BAY NGHIA DAN (HUNG NGUYEN SUBSTATION)</div>
        </div>
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
            <div class="col-4 padding-x-5">
                <div class="background-white box-wraper min-height-350">
                    <h5 class="box-title">BAY ALARM</h5>
                    <div class="voltage-condition">
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                    </div>
                </div>
                <div class="background-white box-wraper">
                    <h5 class="box-title">BUSBAR ALARM</h5>
                    <div class="voltage-condition">
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                        <div class="voltage-condition-item">
                            <div class="voltage-condition-lable">HV WINDING</div>
                            <div class="voltage-condition-value">ALARM</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 padding-x-5">
                <div class="background-black box-wraper" style="height: calc(100% - 5px);">
                    <div style="padding-left: 150px; padding-top: 50px;">
                        <div class="station-title" style="width:120px;">HƯNG ĐÔNG</div>
                        <div class="detail-bay">
                            <div class="busbar-label">C11</div>
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
                        <tbody>
                            <tr>
                                <td class="unit">Voltage(KV)</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">AMPERAGE</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">ACTIVE POWER</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">REACTIVE POWER</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">POWER</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">FACTOR</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">FREQUENCY</td>
                                <td class="value">110</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="background-white box-wraper ">
                    <h5 class="box-title">BUSBAR MEASUREMENT</h5>
                    <table class="tranformer-static-table">
                        <tbody>
                            <tr>
                                <td class="unit">Voltage(KV)</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">AMPERAGE</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">ACTIVE POWER</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">REACTIVE POWER</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">POWER</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">FACTOR</td>
                                <td class="value">110</td>
                            </tr>
                            <tr>
                                <td class="unit">FREQUENCY</td>
                                <td class="value">110</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('elements.hungnguyen-button-group')
@endsection