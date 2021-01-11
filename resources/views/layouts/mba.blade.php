<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>MANDEVICE SCADA/EMS</title>
	<!-- Scripts -->
	{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/home.css') }}" rel="stylesheet">
	<link href="{{ url('css/sweetalert.min.css') }}" rel="stylesheet">
	<link href="{{ url('css/quill.css') }}" rel="stylesheet">
	<link href="{{ url('css/common.css') }}" rel="stylesheet">
	<link href="{{ url('css/bottom.css') }}" rel="stylesheet">
	<link href="{{ url('css/station.css') }}" rel="stylesheet">
	<link href="{{ url('css/bac-a.css') }}" rel="stylesheet">
	<link href="{{ url('css/hung-nguyen.css') }}" rel="stylesheet">
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/home.js') }}"></script>
	<script src="{{ url('js/sweetalert.min.js') }}"></script>
	<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>

<body>
<div id="js-preloader" class="js-preloader">
	<div class="preloader-inner">
		<span class="dot"></span>
		<div class="dots">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
	<script language="JavaScript">
		const CLOSE = 1;
		const OPEN = 0;

		let TBABA_131_BAY_STATUS = {
			"TBABA_131_CB" : CLOSE,
			"TBABA_131_1_DS" : CLOSE,
			"TBABA_131_3_DS": CLOSE,
			"TBABA_131_15_EB": OPEN,
			"TBABA_131_35_EB": OPEN,
			"TBABA_131_38_EB": OPEN,
		}

		
		const MqttDataType = {
			circuitBreaker: 1,
			disconnectorSwitch: 2,
			earthBreaker: 3,
			bay: 4,
			mainBusBar: 5,
			busBar: 6,
			transformer: 7,
			alarm: 8,
			protection: 9,
		}
		
        var clientID = "web" + new Date().getTime();
	    client = new Paho.MQTT.Client("soldier.cloudmqtt.com", 36094, clientID);
		client.onConnectionLost = onConnectionLost;
		client.onMessageArrived = onMessageArrived;

		client.connect({
			useSSL: true,
			userName : "adessils",
			password : "7CSAYPN6-BsG",
			onFailure:doFail,
			onSuccess:onConnect,
			mqttVersion: 3
		});
		function doFail(e){
			console.log(e);
		}

		function onConnect() {
			client.subscribe("Received");
			console.log("connected")
            $('#js-preloader').addClass('loaded');
		}

		function onConnectionLost(responseObject) {
		  if (responseObject.errorCode !== 0) {
			console.log("onConnectionLost:"+responseObject.errorMessage);
		  }
		}

		const updateBusBarStatic = (daota) => {
			let staticTableId = "#" + data.id
			$(staticTableId).find(".kv-value").html(data.kv);
			$(staticTableId).find(".a-value").html(data.a);
			$(staticTableId).find(".mw-value").html(data.mw);
			$(staticTableId).find(".mvar-value").html(data.mvar);
			$(staticTableId).find(".mva-value").html(data.mva);
			$(staticTableId).find(".cos-value").html(data.cos);
			$(staticTableId).find(".temp-value").html(data.tem);
			$(staticTableId).find(".freq-value").html(data.freq);
		}

		const updateBayStatic = (data) => {
			let staticTableId = "#" + data.id
			$(staticTableId).find(".kv-value").html(data.kv);
			$(staticTableId).find(".a-value").html(data.a);
			$(staticTableId).find(".mw-value").html(data.mw);
			$(staticTableId).find(".mvar-value").html(data.mvar);
			$(staticTableId).find(".cos-value").html(data.cos);
			$(staticTableId).find(".freq-value").html(data.freq);
		}

		const updateBayStatus = (data) => {
			switch (data.bay) {
				case 131:
					TBABA_131_BAY_STATUS[data.id] = data.status
					break;
				case 171:
					
					break;
			
				default:
					break;
			}
		}

		const circuitBreakerUpdate = (data) => {
			let circuitBreakerId = "#" + data.id
			updateBayStatus(data)
			if (data.status == CLOSE) {
				$(circuitBreakerId).find(".cutting-content").css("background-color", "black")
			} else {
				$(circuitBreakerId).find(".cutting-content").css("background-color", "#d4d6d4")
			}
		}

		const disconnectorSwitchUpdate = (data) => {
			updateBayStatus(data)
			let disconnectorSwitchId = "#" + data.id
			if (data.status == CLOSE) {
				$(disconnectorSwitchId).find(".rhombus-content").css("background-color", "black")
			} else {
				$(disconnectorSwitchId).find(".rhombus-content").css("background-color", "#d4d6d4")
			}
		}

		const earthBreakerUpdate = (data) => {
			updateBayStatus(data)
			let earthBreakerId = "#" + data.id
			if (data.status == CLOSE) {
				$(earthBreakerId).find(".grounding-middle").css("background-color", "black")
			} else {
				$(earthBreakerId).find(".grounding-middle").css("background-color", "#d4d6d4")
			}
		}

		// var x = document.getElementById("myAudio"); 

		var x = document.createElement('audio');
		x.setAttribute('src', 'http://ems.local/audio/warning.mp3');
		function playAudio() { 
			x.play().catch(function(e) {
				console.log(e)
				console.log("play")
				// do something
			});
		} 

		x.addEventListener("canplay",function(){
			console.log("ready")
		});

		function pauseAudio() { 
		x.pause(); 
		} 
		const protectionProcess = (data) => {
			let protectionGroupId = ""
			switch (data.bay) {
				case 131:
					protectionGroupId = "BAY_131_ALARM"
					break;
				default:
					break;
			}
			$("#" + protectionGroupId).find("." + data.id).find("div").css("color", "red")
			


			$('#protection-warning-modal').modal({});
			playAudio()
			// // audioElement.setAttribute('src', 'http://localhost/ems/public/audio/warning.mp3');
			// let audioElement = document.createElement('audio');
			// audioElement.setAttribute('src', 'http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3');
			
			// audioElement.addEventListener('ended', function() {
			// 	this.play();
			// }, false);
			
			// audioElement.addEventListener("canplay",function(){
			// 	$("#length").text("Duration:" + audioElement.duration + " seconds");
			// 	$("#source").text("Source:" + audioElement.src);
			// 	$("#status").text("Status: Ready to play").css("color","green");
			// });
			
			// audioElement.addEventListener("timeupdate",function(){
			// 	$("#currentTime").text("Current second:" + audioElement.currentTime);
			// });
			// audioElement.play()
		}

		function onMessageArrived(message) {
			let data = JSON.parse(message.payloadString)
			switch (parseInt(data.type)) {
				case MqttDataType.disconnectorSwitch:
					disconnectorSwitchUpdate(data)
					break;
				case MqttDataType.earthBreaker:
					earthBreakerUpdate(data)
					break;
				case MqttDataType.mainBusBar:
					updateMainBusBarStatic(data)
					break;
				case MqttDataType.busBar:
					updateBusBarStatic(data)
					break;
				case MqttDataType.bay:
					updateBayStatic(data)
					break;
				case MqttDataType.circuitBreaker:
					circuitBreakerUpdate(data)
					break;
				case MqttDataType.transformer:
					updateTransformersStatic(data)
					break;
				case MqttDataType.protection:
					protectionProcess(data)
					break;
				default:
					break;
			}
		}

		// kiểm tra điều kiện liên động máy cắt 131
		const check131CircuitBreakerCondition = () => {
			// đóng máy cắt
			let enableClose = (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_3_DS == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_15_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_35_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_38_EB == OPEN)
			if (enableClose) {
				$(".close-CB-button").prop("disabled", false)
			} else {
				$(".close-CB-button").prop("disabled", true)
			}

			// mở máy cắt
			let enableOpen = (TBABA_131_BAY_STATUS.TBABA_131_CB == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_3_DS == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_15_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_35_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_38_EB == OPEN)
			if (enableOpen) {
				$(".open-CB-button").prop("disabled", false)
			} else {
				$(".open-CB-button").prop("disabled", true)
			}

			let status =  TBABA_131_BAY_STATUS.TBABA_131_CB == CLOSE ? "CLOSE" : "OPEN"
			$("#circuit-breaker-modal").find(".current-status").html("131: CIRCUIT BREAKER IS " + status)
		}

		// kiểm tra điều kiện liên động dao cách ly 131-3
		const check131_3DisconnectorSwitchCondition = () => {
			// đóng máy cắt
			let enableClose = (TBABA_131_BAY_STATUS.TBABA_131_3_DS == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_35_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_38_EB == OPEN)
			console.log(enableClose)
			if (enableClose) {
				$(".close-DS-button").prop("disabled", false)
			} else {
				$(".close-DS-button").prop("disabled", true)
			}
			// mở máy cắt
			let enableOpen = (TBABA_131_BAY_STATUS.TBABA_131_3_DS == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_35_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_38_EB == OPEN)
			if (enableOpen) {
				$(".open-DS-button").prop("disabled", false)
			} else {
				$(".open-DS-button").prop("disabled", true)
			}
			let status =  TBABA_131_BAY_STATUS.TBABA_131_3_DS == CLOSE ? "CLOSE" : "OPEN"
			$("#disconnector-switch-modal").find(".current-status").html("131-3: DISCONNECTOR SWITCH IS " + status)
		}

		// kiểm tra điều kiện liên động dao cách ly 131-1
		const check131_1DisconnectorSwitchCondition = () => {
			// đóng máy cắt
			let enableClose = (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_15_EB == OPEN)
			if (enableClose) {
				$(".close-DS-button").prop("disabled", false)
			} else {
				$(".close-DS-button").prop("disabled", true)
			}
			// mở máy cắt
			let enableOpen = (TBABA_131_BAY_STATUS.TBABA_131_1_DS == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_15_EB == OPEN)
			if (enableOpen) {
				$(".open-DS-button").prop("disabled", false)
			} else {
				$(".open-DS-button").prop("disabled", true)
			}
			let status =  TBABA_131_BAY_STATUS.TBABA_131_3_DS == CLOSE ? "CLOSE" : "OPEN"
			$("#disconnector-switch-modal").find(".current-status").html("131-1: DISCONNECTOR SWITCH IS " + status)
		}

		// kiểm tra điều kiện liên động dao tiếp địa 131-15
		const check131_15EarthBreakerCondition = () => {
			// điều khiển dao tiếp địa
			let enableClose = (TBABA_131_BAY_STATUS.TBABA_131_15_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN)
			if (enableClose) {
				$(".close-EB-button").prop("disabled", false)
			} else {
				$(".close-EB-button").prop("disabled", true)
			}
			// mở dao tiếp địa
			let enableOpen = (TBABA_131_BAY_STATUS.TBABA_131_15_EB == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN)
			if (enableOpen) {
				$(".open-EB-button").prop("disabled", false)
			} else {
				$(".open-EB-button").prop("disabled", true)
			}
			let status =  TBABA_131_BAY_STATUS.TBABA_131_15_EB == CLOSE ? "CLOSE" : "OPEN"
			$("#earth-breaker-modal").find(".current-status").html("131-15: DISCONNECTOR SWITCH IS " + status)
		}

		// kiểm tra điều kiện liên động dao tiếp địa 131-35
		const check131_35EarthBreakerCondition = () => {
			// điều khiển dao tiếp địa
			let enableClose = (TBABA_131_BAY_STATUS.TBABA_131_15_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN)
			if (enableClose) {
				$(".close-EB-button").prop("disabled", false)
			} else {
				$(".close-EB-button").prop("disabled", true)
			}
			// mở dao tiếp địa
			let enableOpen = (TBABA_131_BAY_STATUS.TBABA_131_15_EB == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN)
			if (enableOpen) {
				$(".open-EB-button").prop("disabled", false)
			} else {
				$(".open-EB-button").prop("disabled", true)
			}
			let status =  TBABA_131_BAY_STATUS.TBABA_131_35_EB == CLOSE ? "CLOSE" : "OPEN"
			$("#earth-breaker-modal").find(".current-status").html("131-35: DISCONNECTOR SWITCH IS " + status)
		}

		// kiểm tra điều kiện liên động dao tiếp địa 131-15
		const check131_38EarthBreakerCondition = () => {
			// điều khiển dao tiếp địa
			let enableClose = (TBABA_131_BAY_STATUS.TBABA_131_15_EB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN)
			if (enableClose) {
				$(".close-EB-button").prop("disabled", false)
			} else {
				$(".close-EB-button").prop("disabled", true)
			}
			// mở dao tiếp địa
			let enableOpen = (TBABA_131_BAY_STATUS.TBABA_131_15_EB == CLOSE) && (TBABA_131_BAY_STATUS.TBABA_131_CB == OPEN) && (TBABA_131_BAY_STATUS.TBABA_131_1_DS == OPEN)
			if (enableOpen) {
				$(".open-EB-button").prop("disabled", false)
			} else {
				$(".open-EB-button").prop("disabled", true)
			}
			let status =  TBABA_131_BAY_STATUS.TBABA_131_38_EB == CLOSE ? "CLOSE" : "OPEN"
			$("#earth-breaker-modal").find(".current-status").html("131-38: DISCONNECTOR SWITCH IS " + status)
		}
	</script>
	@yield('content')
	<div id="circuit-breaker-modal" class="modal ems-modal">
		<div class="cb-control-panel">
			<div class="current-status">131: CIRCUIT BREAKER IS OPEN</div>
			<div class="cb-control-btn">
				<button class="close-CB-button" id="CB-171-OFF">CLOSE</button>
				<button class="open-CB-button">OPEN</button>
			</div>
		</div>
	</div>
	<div id="disconnector-switch-modal" class="modal ems-modal">
		<div class="cb-control-panel">
			<div class="current-status">131-3: DISCONNECTOR SWITCH IS CLOSE</div>
			<div class="cb-control-btn">
				<button class="close-DS-button">CLOSE</button>
				<button class="open-DS-button">OPEN</button>
			</div>
		</div>
	</div>
	<div id="earth-breaker-modal" class="modal ems-modal">
		<div class="cb-control-panel">
			<div class="current-status">131-3: DISCONNECTOR SWITCH IS CLOSE</div>
			<div class="cb-control-btn">
				<button class="close-EB-button">CLOSE</button>
				<button class="open-EB-button">OPEN</button>
			</div>
		</div>
	</div>
	<div id="protection-warning-modal" class="modal" style="max-height: 300px;">
		<div class="cb-control-panel">
			<h4>Alarm protection 87T bay 131</h4>
			<div class="warning-image">
				<img src="{{ url('image/warning-icon.png') }}" style="width: 80px; height:80px;" />
			</div>
			{{-- <iframe src="{{ url('audio/warning.mp3') }}" allow="autoplay" style="display:none" id="iframeAudio"> --}}
			{{-- </iframe> --}}
			<audio id="myAudio">
				<source src="{{ url('audio/warning.mp3') }}" type="audio/mpeg">
			</audio>
			<div class="cb-control-btn warning-button">
				<button class="confirm-protection-btn btn btn-danger">CONFIRM</button>
			</div>
		</div>
	</div>
</body>

<script>
	$(document).ready(function() {
		// đóng máy cắt
		$(".close-CB-button").on("click", function() {
			let CBcode = $('#circuit-breaker-modal').attr("data-CB-code")
			let data = {
				status: 0,
				code: CBcode
			};
			message = new Paho.MQTT.Message(JSON.stringify(data));
			message.destinationName = "Received";
			client.send(message);
		})
		//mở máy cắt
		$(".open-CB-button").on("click", function() {
			let CBcode = $('#circuit-breaker-modal').attr("data-CB-code")
			let data = {
				status: 1,
				code: CBcode
			};
			message = new Paho.MQTT.Message(JSON.stringify(data));
			message.destinationName = "Received";
			client.send(message);
		})
		// đóng dao cách ly
		$(".close-DS-button").on("click", function() {
			let DScode = $('#disconnector-switch-modal').attr("data-DS-code")
			let data = {
				status: CLOSE,
				code: DScode
			};
			message = new Paho.MQTT.Message(JSON.stringify(data));
			message.destinationName = "Received";
			client.send(message);
		})
		//mở dao cách ly
		$(".open-DS-button").on("click", function() {
			let DScode = $('#disconnector-switch-modal').attr("data-DS-code")
			let data = {
				status: OPEN,
				code: DScode
			};
			message = new Paho.MQTT.Message(JSON.stringify(data));
			message.destinationName = "Received";
			client.send(message);
		})



		$('.confirm-protection-btn').on('click', function() {
			pauseAudio();
			$.modal.close();
		})

		$(".circuit-breaker-element").on("click", function() {
			let circuitBreakerId = $(this).attr("id")
			switch (circuitBreakerId) {
				case "TBABA_131_CB":
					check131CircuitBreakerCondition()
					break;
				default:
					break;
			}
			$('#circuit-breaker-modal').attr("data-CB-code", circuitBreakerId)
			$('#circuit-breaker-modal').modal({});
		});

		$(".disconnectors-switches-element").on("click", function() {
			let disconnectorSwitchId = $(this).attr("id")
			switch (disconnectorSwitchId) {
				case "TBABA_131_3_DS":
					check131_3DisconnectorSwitchCondition()
					break;
				case "TBABA_131_1_DS":
					check131_1DisconnectorSwitchCondition()
					break;
				default:
					break;
			}
			$('#disconnector-switch-modal').attr("data-DS-code", disconnectorSwitchId)
			$('#disconnector-switch-modal').modal({});
		});

		$(".earth-breaker-element").on("click", function() {
			let disconnectorSwitchId = $(this).attr("id")
			switch (disconnectorSwitchId) {
				case "TBABA_131_15_EB":
					check131_15EarthBreakerCondition()
					break;
				case "TBABA_131_35_EB":
					check131_35EarthBreakerCondition()
					break;
				case "TBABA_131_38_EB":
					check131_38EarthBreakerCondition()
					break;
				default:
					break;
			}
			$('#earth-breaker-modal').attr("data-EB-code", disconnectorSwitchId)
			$('#earth-breaker-modal').modal({});
		});
	})
</script>

</html>