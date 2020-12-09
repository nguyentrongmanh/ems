<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Test english online</title>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
</head>

<body>
{{-- <div id="js-preloader" class="js-preloader">
	<div class="preloader-inner">
		<span class="dot"></span>
		<div class="dots">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div> --}}
<script language="JavaScript">
	const updateMainBusBarStatic = (data) => {
		if (data.sc == "TBAHN") {
			$("#BA-mainBusBarKV").html(data.kv)
			$("#BA-mainBusBarA").html(data.a)
			$("#BA-mainBusBarMW").html(data.mw)
			$("#BA-mainBusBarMVAr").html(data.mwar)
			$("#BA-mainBusBarCosC11").html(data.cosc11)
			$("#BA-mainBusBarCosC12").html(data.cosc12)
			$("#BA-mainBusBarTempC11").html(data.temc11)
			$("#BA-mainBusBarTempC12").html(data.temc12)
		}

		if (data.sc == "HN") {
			$("#HN-mainBusBarKV").html(data.kv)
			$("#HN-mainBusBarA").html(data.a)
			$("#HN-mainBusBarMW").html(data.mw)
			$("#HN-mainBusBarMVAr").html(data.mwar)
			$("#HN-mainBusBarCosC11").html(data.cosc11)
			$("#HN-mainBusBarCosC12").html(data.cosc12)
			$("#HN-mainBusBarTempC11").html(data.temc11)
			$("#HN-mainBusBarTempC12").html(data.temc12)
		}
	}

	const updateBayStatic = (data) => {
		let staticTableId = "#" + data.id
		$(staticTableId).find("kv-value").html(data.kv);
		$(staticTableId).find("a-value").html(data.a);
		$(staticTableId).find("mw-value").html(data.mw);
		$(staticTableId).find("mvar-value").html(data.mvar);
		$(staticTableId).find("cos-value").html(data.cos);
	}

	const updateBusBarStatic = (data) => {
		let staticTableId = "#" + data.id
		$(staticTableId).find(".kv-value").html(data.kv);
		$(staticTableId).find(".a-value").html(data.a);
		$(staticTableId).find(".mw-value").html(data.mw);
		$(staticTableId).find(".mvar-value").html(data.mvar);
		$(staticTableId).find(".cos-value").html(data.cos);
		$(staticTableId).find(".temp-value").html(data.tem);
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
	}


	const circuitBreakerUpdate = (data) => {
		let circuitBreakerId = "#" + data.id
		// $(circuitBreakerId).find(".cutting-content").css("background-color")
	}

	const MqttDataType = {
		circuitBreaker: 1,
		disconnectorSwitch: 2,
		earthBreaker: 3,
		bay: 4,
		mainBusBar: 5,
		busBar: 6,
		transformer: 7
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
	function onMessageArrived(message) {
		let data = JSON.parse(message.payloadString)
		switch (parseInt(data.type)) {
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
				updateBayStatic(data)
				break;
			case MqttDataType.transformer:
				console.log(data)
				updateTransformersStatic(data)
				break;
			default:
				break;
		}
	}
</script>
	@yield('content')
</body>

<script>
	$(document).ready(function() {
		
		$(".circuit-breaker-element").on("click", function() {
            let eleId = $(this).attr('id');
            console.log(eleId);
			swal(`Xác nhận đóng máy cắt ${eleId} !!!`, {
				buttons: {
					catch: {
						text: "Xác nhận",
						value: "catch",
					},
					cancel: "Cancel",
				},
			}).then((value) => {
				switch (value) {
					case "cancel":
						break;
					case "catch":
						message = new Paho.MQTT.Message("1");
						message.destinationName = "circuit-breaker";
						client.send(message);
						swal({
							title: "Đã truyền lệnh!",
							icon: "success",
						});
					break;
				
					default:
					break;
				}
			});
		})

		$(".disconnectors-switches-element").on("click", function() {
            let eleId = $(this).attr('id');
			swal(`Xác nhận mở dao cách lý ${eleId} !!!`, {
				buttons: {
					catch: {
						text: "Xác nhận",
						value: "catch",
					},
					cancel: "Cancel",
				},
			}).then((value) => {
				switch (value) {
					case "cancel":
						break;
					case "catch":
						message = new Paho.MQTT.Message("1");
						message.destinationName = "disconnectors-switches";
						client.send(message);
						swal({
							title: "Đã truyền lệnh!",
							icon: "success",
						});
					break;
				
					default:
					break;
				}
			});
		})

		$(".disconnectors-switches-element").on("click", function() {
            let eleId = $(this).attr('id');
			swal(`Xác nhận mở dao cách lý ${eleId} !!!`, {
				buttons: {
					catch: {
						text: "Xác nhận",
						value: "catch",
					},
					cancel: "Cancel",
				},
			}).then((value) => {
				switch (value) {
					case "cancel":
						break;
					case "catch":
						message = new Paho.MQTT.Message("1");
						message.destinationName = "disconnectors-switches";
						client.send(message);
						swal({
							title: "Đã truyền lệnh!",
							icon: "success",
						});
					break;
				
					default:
					break;
				}
			});
		})
		$(".earth-breaker-element").on("click", function() {
            let eleId = $(this).attr('id');
			swal(`Xác nhận đóng dao tiếp địa ${eleId} !!!`, {
				buttons: {
					catch: {
						text: "Xác nhận",
						value: "catch",
					},
					cancel: "Cancel",
				},
			}).then((value) => {
				switch (value) {
					case "cancel":
						break;
					case "catch":
						message = new Paho.MQTT.Message("1");
						message.destinationName = "disconnectors-switches";
						client.send(message);
						swal({
							title: "Đã truyền lệnh!",
							icon: "success",
						});
					break;
				
					default:
					break;
				}
			});
		})
	});
</script>

</html>