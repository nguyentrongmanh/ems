@extends('layouts.mba')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
<div class="page-wrapper">
	<div class="mba-container">
        <div class="control-page-header">
            <div class="background-white box-wraper">C41 BUSBAR 22KV (HUNG NGUYEN SUBSTATION)</div>
        </div>
        <div class="row padding-x-5" style="margin-right: 0px;margin-left: 0px;">
            <div class="col-12  background-black box-wraper min-height-350" style="height: calc(100% - 5px);">
                <div style="padding-left: 0px; padding-top: 10px; display: flex; justify-content: center;">
                    <div class="blue-left">
                        <div class="blue-left-wrapper">
                            <div class="blue-left-item  min-width-90 first-child">
                            </div>
                            <div class="blue-left-item  min-width-90">
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                            </div>
                            <div class="blue-left-item  min-width-90">
                            <div class="triangle-up-bottom-aqua"></div>
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                            </div>
                            <div class="blue-left-item  min-width-90">
                            <div class="triangle-up-bottom-aqua"></div>
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                            </div>
                            <div class="blue-left-item  min-width-90">
                            <div class="triangle-up-bottom-aqua"></div>
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                            </div>
                            <div class="blue-left-item  min-width-90">
                            <div class="triangle-up-bottom-aqua"></div>
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                            </div>
                            <div class="blue-left-item  min-width-90">
                                <div class="triangle-up-bottom-aqua"></div>
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                            </div>
                            <div class="blue-left-item  min-width-90">
                            <div class="triangle-up-bottom-aqua"></div>
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                            </div>
                            <div class="blue-left-item  min-width-90">
                                <div class="connect-line-four"></div>
                                @include('elements.earth-breaker', [ "data" => [
                                    'id' => '373-76',
                                    'label' => "373-76",
                                    'class' => 'bay-item-mchb-one'
                                ]])
                                @include('elements.mchb', [ "data" => [
                                    'id' => '373',
                                    'label' => "373",
                                    'class' => 'bay-item-mchb-two',
                                    'color' => '#3bbdf5'
                                ]])
                                @include('elements.c31-bay-static')
                                <div class="yellow-label bac-a-blue-busbar-label">C41</div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
            <div class="col-6 padding-x-5">
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
            <div class="col-6 padding-x-5">
                <div class="background-white box-wraper">
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