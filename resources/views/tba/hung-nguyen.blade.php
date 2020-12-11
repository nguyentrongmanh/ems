@extends('layouts.tba')
@section('content')
<div class="page-wrapper">
	<div class="station-top">
	<div class="main-parameter">
			<div class="main-parameter-header">
				<a href="{{ url('mba/bac-a') }}" class="single-line">
					SEE MORE
				</a>
			</div>
			<table class="main-parameter-content">
				<tr class="main-parameter-item">
					<td class="main-parameter-item-lable is-orange" colspan="2">OIL TEMP</td>
					<td class="main-parameter-item-temp is-orange">49.49</td>
					<td class="main-parameter-item-unit is-white">C</td>
				</tr>
				<tr class="main-parameter-item">
					<td class="main-parameter-item-lable is-red">WINDING TEMP</td>
					<td class="main-parameter-item-vontage is-red">110KV</td>
					<td class="main-parameter-item-temp is-red">49.49</td>
					<td class="main-parameter-item-unit is-white">C</td>
				</tr>
				<tr class="main-parameter-item">
					<td class="main-parameter-item-lable is-yellow">WINDING TEMP</td>
					<td class="main-parameter-item-vontage is-yellow">110KV</td>
					<td class="main-parameter-item-temp is-yellow">49.49</td>
					<td class="main-parameter-item-unit is-white">C</td>
				</tr>
				<tr class="main-parameter-item">
					<td class="main-parameter-item-lable is-aqua">WINDING TEMP</td>
					<td class="main-parameter-item-vontage is-aqua">110KV</td>
					<td class="main-parameter-item-temp is-aqua">49.49</td>
					<td class="main-parameter-item-unit is-white">C</td>
				</tr>
			</table>
		</div>
		<div class="main-station">
			<div class="main-station-content">
				<div class="chart pd-r-35">
					<div class="station-title">TRANFORMER</div>
					<div class="content">
						@include('elements.disconnectors-switches', [ "data" => [
                            'id' => 'ds131-3',
							'label' => "131-3"
						]])
						
						@include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-38',
							'label' => "-38",
							'class' => 'bay-item-third'
						]])

						@include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-35',
							'label' => "-35",
						]])

						@include('elements.circuit-breaker', [ "data" => [
                            'id' => 'cb-131',
							'label' => "131",
						]])
						
						@include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-15',
							'label' => "-15",
						]])

						@include('elements.disconnectors-switches', [ "data" => [
                            'id' => 'ds131-1',
							'label' => "131-1"
						]])

					</div>
				</div>
				<div class="static">
					<table>
						<tr>
							<td class="static-value">116.77</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">Cosϕ</td>
						</tr>
					</table>
				</div>
				<div class="reveal pd-r-35">
					<div class="station-title" style="width:120px;">HUNG DONG</div>
					<div class="content height-100">
						<div class="triangle-up-top"></div>
						@include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-76',
							'label' => "-76",
							'class' => 'bay-item-first'
                        ]])

                        @include('elements.disconnectors-switches', [ "data" => [
                            'id' => 'ds-171-7',
							'label' => "171-7",
							'class' => 'bay-item-second'
                        ]])

                        @include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-75',
							'label' => "-75",
							'class' => 'bay-item-third'
						]])
						
						@include('elements.circuit-breaker', [ "data" => [
                            'id' => 'cb-171',
							'label' => "171",
							'class' => 'bay-item-fourth'
                        ]])

                        @include('elements.earth-breaker', [ "data" => [
                            'id' => 'hd-eb-15',
							'label' => "-15",
							'class' => 'bay-item-fith'
                        ]])

                        @include('elements.disconnectors-switches', [ "data" => [
                            'id' => 'ds-171-1',
							'label' => "171-1",
							'class' => 'bay-item-sixth'
                        ]])

                        @include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-14',
							'label' => "-14",
							'class' => 'bay-item-seven'
                        ]])
					</div>
				</div>
				<div class="static">
					<table>
						<tr>
							<td class="static-value">116.77</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">Cosϕ</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="main-station">
			<div class="main-station-content">
				<div class="chart pd-r-35">
					<div class="station-title">NGANCAU </div>
					<div class="content">
						@include('elements.circuit-breaker', [ "data" => [
                            'id' => 'cb-112',
							'label' => "112",
						]])

						@include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-112-15',
							'label' => "112-15",
						]])

						@include('elements.disconnectors-switches', [ "data" => [
                            'id' => 'ds112-1',
							'label' => "112-1"
						]])

						@include('elements.earth-breaker', [ "data" => [
                            'id' => 'eb-112-25',
							'label' => "112-25",
						]])

						@include('elements.disconnectors-switches', [ "data" => [
                            'id' => 'ds112-2',
							'label' => "112-2"
						]])
						
					</div>
				</div>
				<div class="static">
					<table>
						<tr>
							<td class="static-value">116.77</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">Cosϕ</td>
						</tr>
					</table>
				</div>
				<div class="reveal pd-r-35">
					<div class="station-title" style="width:120px;">CAN LOC</div>
					<div class="content height-100">
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
				<div class="static">
					<table>
						<tr>
							<td class="static-value">116.77</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">Cosϕ</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="station-middle">
		<div class="line">
			<div class="line-lable">C11</div>
			<div class="main-line"></div>
		</div>
		<div class="line">
			<div class="line-lable">C12</div>
			<div class="main-line"></div>
		</div>
	</div>
	<div class="station-bottom">
		<div class="yellow">
			<div class="yellow-left">
				<div class="connect-line-three"></div>
				<div class="tab-change">
					<div class="tab-change-wrapper">
						<div class="tab-change-label">TAB CHANGE</div>
						<div class="tab-change-content">6</div>
					</div>	
				</div>
				<div class="yellow-transformer" style="bottom: 60px !important;">
					<div class="three-phase-transformer">
						<img style="width:65px;" src="{{ url('image/tranformer.PNG') }}" />
					</div>
				</div>
			</div>
			<div class="yellow-middle">
				<div class="yellow-middle-wrapper" style="margin-left: 65px;">
					<div class="yellow-middle-item">
						<div class="connect-line-one"></div>
						<div class="connect-line-two"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '373-76',
							'label' => "373-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '373',
							'label' => "373",
							'class' => 'bay-item-mchb-two',
							'color' => 'yellow'
                        ]])
					</div>
					<div class="yellow-middle-item">
						<div class="triangle-up-bottom-yellow"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '373-76',
							'label' => "373-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '373',
							'label' => "373",
							'class' => 'bay-item-mchb-two',
							'color' => 'yellow'
                        ]])
					</div>
					<div class="yellow-middle-item">
					<div class="triangle-up-bottom-yellow"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '373-76',
							'label' => "373-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '373',
							'label' => "373",
							'class' => 'bay-item-mchb-two',
							'color' => 'yellow'
                        ]])
					</div>
					<div class="yellow-middle-item">
					<div class="triangle-up-bottom-yellow"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '373-76',
							'label' => "373-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '373',
							'label' => "373",
							'class' => 'bay-item-mchb-two',
							'color' => 'yellow'
                        ]])
					</div>
					<div class="yellow-middle-item">
					<div class="triangle-up-bottom-yellow"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '373-76',
							'label' => "373-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '373',
							'label' => "373",
							'class' => 'bay-item-mchb-two',
							'color' => 'yellow'
                        ]])
					</div>
					<div class="yellow-middle-item">
					<div class="triangle-up-bottom-yellow"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '373-76',
							'label' => "373-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '373',
							'label' => "373",
							'class' => 'bay-item-mchb-two',
							'color' => 'yellow'
                        ]])
					</div>
					<div class="yellow-middle-item">
					<div class="triangle-up-bottom-yellow"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '373-76',
							'label' => "373-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '373',
							'label' => "373",
							'class' => 'bay-item-mchb-two',
							'color' => 'yellow'
                        ]])
						<div class="yellow-label">C31</div>
						<div class="yellow-static static">
							<table>
								<tr>
									<td class="static-value">116.77</td>
									<td class="static-label">KV</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">A</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">MW</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">MVAr</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">Cosϕ</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="yellow-right hung-nguyen-static">
				<div class="hung-nguyen-main-static static">
					<table>
						<tr>
							<td class="static-value">116.77</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">MVAr</td>
						</tr>
					</table>
				</div>
				<div class="hung-nguyen-main-static static">
					<table>
						<tr>
							<td class="static-value">116.77</td>
							<td class="static-label">Cosϕ(C11)</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">Cosϕ(C12)</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">TEMP(C11)</td>
						</tr>
						<tr>
							<td class="static-value">0.00</td>
							<td class="static-label">TEMP(C12)</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="blue">
			<div class="blue-left">
				<div class="blue-left-wrapper">
					<div class="blue-left-item first-child">
					</div>
					<div class="blue-left-item">
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
					</div>
					<div class="blue-left-item">
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
					</div>
					<div class="blue-left-item">
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
					</div>
					<div class="blue-left-item">
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
					</div>
					<div class="blue-left-item">
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
					</div>
					<div class="blue-left-item">
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
					</div>
					<div class="blue-left-item">
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
					</div>
					<div class="blue-left-item">
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
						<div class="yellow-label bac-a-blue-busbar-label">C41</div>
						<div class="yellow-static static">
							<table>
								<tr>
									<td class="static-value">116.77</td>
									<td class="static-label">KV</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">A</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">MW</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="blue-right">
				<div class="blue-right-wrapper">
					<div class="blue-right-item">
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
					</div>
					<div class="blue-right-item">
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
					</div>
					<div class="blue-right-item">
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
					</div>
					<div class="blue-right-item">
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
					</div>
					<div class="blue-right-item">
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
					</div>
					<div class="blue-right-item">
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
					</div>
					<div class="blue-right-item">
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
						<div class="yellow-label bac-a-blue-busbar-label">C42</div>
						<div class="yellow-static static">
							<table>
								<tr>
									<td class="static-value">116.77</td>
									<td class="static-label">KV</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">A</td>
								</tr>
								<tr>
									<td class="static-value">0.00</td>
									<td class="static-label">MW</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('elements.hungnguyen-button-group')

@endsection