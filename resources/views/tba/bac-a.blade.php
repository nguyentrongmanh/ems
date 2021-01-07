@extends('layouts.mba')

@section('content')

<div class="page-wrapper">
	<div class="station-top station-top-border-bottom">
		<div class="main-parameter">
			<div class="main-parameter-header">
				<div class="single-line">
					SINGLE LINE
				</div>
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
			<div class="main-station-content main-station-content-border-bottom">
				<div class="busbar-label">C11</div>
				<div class="reveal pd-r-35">
					<div class="station-title" style="width:120px;">NGHĨA ĐÀN</div>
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
					<div class="content height-100 connecting-transformer">
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
				<div class="static" id="TBABA_ND">
					<table>
						<tr>
							<td class="kv-value static-value">_._</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="a-value static-value">_._</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="mw-value static-value">_._</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td class="mvar-value static-value">_._</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td class="cos-value static-value">_._</td>
							<td class="static-label">Cosϕ</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="main-station">
			<div class="main-station-content main-station-content-border-bottom">
				<div class="busbar-label">C12</div>
				<div class="connecting-busbar">
					
					@include('elements.disconnectors-switches', [ "data" => [
						'id' => '12-15',
						'label' => "12-15",
						'class' => 'connecting-busbar-item-first'
					]])

					@include('elements.earth-breaker', [ "data" => [
						'id' => '112-1',
						'label' => "112-1",
						'class' => 'connecting-busbar-item-second'
					]])

					@include('elements.earth-breaker', [ "data" => [
						'id' => '112-2',
						'label' => "112-2",
						'class' => 'connecting-busbar-item-third'
					]])

					@include('elements.disconnectors-switches', [ "data" => [
						'id' => '12-25',
						'label' => "12-25",
						'class' => 'connecting-busbar-item-fourth'
					]])	

				</div>
				<div class="reveal pd-r-35">
					<div class="station-title">TRUÔNG BÀNH</div>
					<div class="content height-100">
						<div class="triangle-up-top	"></div>
                    	@include('elements.earth-breaker', [ "data" => [
                            'id' => '172-76',
							'label' => "172-76",
							'class' => 'bay-item-first'
                        ]])

                        @include('elements.disconnectors-switches', [ "data" => [
                            'id' => '172-7',
							'label' => "172-7",
							'class' => 'bay-item-second'
                        ]])

                        @include('elements.earth-breaker', [ "data" => [
                            'id' => '172-75',
							'label' => "172-75",
							'class' => 'bay-item-third'
						]])
						
						@include('elements.circuit-breaker', [ "data" => [
                            'id' => '172',
							'label' => "172",
							'class' => 'bay-item-fourth'
                        ]])

                        @include('elements.earth-breaker', [ "data" => [
                            'id' => '172-25',
							'label' => "172-25",
							'class' => 'bay-item-fith'
                        ]])

                        @include('elements.disconnectors-switches', [ "data" => [
                            'id' => '172-2',
							'label' => "172-2",
							'class' => 'bay-item-sixth'
                        ]])

                        @include('elements.earth-breaker', [ "data" => [
                            'id' => '172-24',
							'label' => "172-24",
							'class' => 'bay-item-seven'
                        ]])
					</div>
				</div>
				<div class="static" id="TBABA_TB">
					<table>
						<tr>
							<td class="kv-value static-value">_._</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="a-value static-value">_._</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="mw-value static-value">_._</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td class="mvar-value static-value">_._</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td class="cos-value static-value">_._</td>
							<td class="static-label">Cosϕ</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="bac-a-bottom">
		<div class="yellow" style="height:54%;">
			<div class="yellow-left bac-a-yellow-left" style="border-right:none !important;">
				<div class="back-button-container" style="align-items: center;">
                    <a href="{{ url('') }}" class="previous"><span>&laquo; Back</span></a>
                </div>
				<div class="yellow-transformer">
					<div class="three-phase-transformer">
						<img style="width:65px;" src="{{ url('image/tranformer.PNG') }}" />
					</div>
				</div>
				<div class="fuse-wrapper " id="CS0T1">
					<div class="electric-item-label">CS0T1</div>
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
			</div>
			<div class="yellow-right yellow-right-connect-transformer bac-a-main-static-group">
				<div class="bac-a-main-static static" id="BB_110_C11">
					<table>
						<tr>
							<td class="kv-value static-value">0.00</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="a-value static-value">0.00</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="mw-value static-value">0.00</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td id="BA-mainBusBarMVAr" class="mvar-value static-value">0.00</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td id="BA-mainBusBarCosC11" class="cos-value static-value">0.00</td>
							<td class="static-label">Cosϕ(C11)</td>
						</tr>
						<tr>
							<td id="BA-mainBusBarTempC11" class="temp-value static-value">0.00</td>
							<td class="static-label">TEMP(C11)</td>
						</tr>
					</table>
				</div>
				<div class="bac-a-main-static static" id="BB_110_C12">
					<table>
						<tr>
							<td class="kv-value static-value">0.00</td>
							<td class="static-label">KV</td>
						</tr>
						<tr>
							<td class="a-value static-value">0.00</td>
							<td class="static-label">A</td>
						</tr>
						<tr>
							<td class="mw-value static-value">0.00</td>
							<td class="static-label">MW</td>
						</tr>
						<tr>
							<td id="BA-mainBusBarMVAr" class="mvar-value static-value">0.00</td>
							<td class="static-label">MVAr</td>
						</tr>
						<tr>
							<td id="BA-mainBusBarCosC11" class="cos-value static-value">0.00</td>
							<td class="static-label">Cosϕ(C11)</td>
						</tr>
						<tr>
							<td id="BA-mainBusBarTempC11" class="temp-value static-value">0.00</td>
							<td class="static-label">TEMP(C11)</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="bac-a-bottom-bay">
			<div class="blue-left" style="padding: 0px 20px 20px 20%;margin-top: 12px;">
				<div class="blue-left-wrapper">
					<div class="blue-left-item first-child">
						<div class="fuse-wrapper " id="CS3T1">
							<div class="electric-item-label">CS3T1</div>
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
						<div class="fuse-wrapper " id="CS4T1">
							<div class="electric-item-label">CS4T1</div>
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
					</div>
					<div class="blue-left-item">
						@include('elements.earth-breaker', [ "data" => [
							'id' => '331-38',
							'label' => "331-38",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '331',
							'label' => "331",
							'class' => 'bay-item-mchb-two',
							'color' => '#3bbdf5'
                        ]])
					</div>
					<div class="blue-left-item">
						<div class="triangle-up-bottom-aqua"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => 'TD31-38',
							'label' => "TD31-38",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => 'CC-TD31',
							'label' => "CC-TD31",
							'class' => 'bay-item-mchb-two',
							'color' => '#3bbdf5'
                        ]])
					</div>
					<div class="blue-left-item">
						<div class="triangle-up-bottom-aqua"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '371-76',
							'label' => "371-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '371',
							'label' => "371",
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
							'id' => '375-76',
							'label' => "375-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '375',
							'label' => "375",
							'class' => 'bay-item-mchb-two',
							'color' => '#3bbdf5'
                        ]])
					</div>
					<div class="blue-left-item">
						<div class="triangle-up-bottom-aqua"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '377-76',
							'label' => "377-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '377',
							'label' => "377",
							'class' => 'bay-item-mchb-two',
							'color' => '#3bbdf5'
                        ]])
					</div>
					<div class="blue-left-item">
						<div class="triangle-up-bottom-aqua"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '379-76',
							'label' => "379-76",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '379',
							'label' => "379",
							'class' => 'bay-item-mchb-two',
							'color' => '#3bbdf5'
                        ]])
					</div>
					<div class="blue-left-item">
						<div class="triangle-up-bottom-aqua"></div>
						<div class="triangle-up-bottom"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => 'TCU31',
							'label' => "TCU31",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => 'TCU31',
							'label' => "TCU31",
							'class' => 'bay-item-mchb-two',
							'color' => '#3bbdf5'
                        ]])
					</div>
					<div class="blue-left-item">
						<div class="triangle-up-bottom-aqua"></div>
						@include('elements.earth-breaker', [ "data" => [
							'id' => '312-15',
							'label' => "312-15",
							'class' => 'bay-item-mchb-one'
						]])
						@include('elements.mchb', [ "data" => [
                            'id' => '312',
							'label' => "312",
							'class' => 'bay-item-mchb-two',
							'color' => '#3bbdf5'
                        ]])
						<div class="yellow-label bac-a-blue-busbar-label">C31</div>
						<div class="yellow-static static bac-a-bay-static" id="BB_35_C31">
							<table>
								<tr>
									<td class="kv-value static-value">_._</td>
									<td class="static-label">KV</td>
								</tr>
								<tr>
									<td class="a-value static-value">_._</td>
									<td class="static-label">A</td>
								</tr>
								<tr>
									<td class="mw-value static-value">_._</td>
									<td class="static-label">MW</td>
								</tr>
								<tr>
									<td class="mvar-value static-value">_._</td>
									<td class="static-label">MVAr</td>
								</tr>
								<tr>
									<td class="cos-value static-value">_._</td>
									<td class="static-label">Cosϕ</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('elements.button-group')

@endsection