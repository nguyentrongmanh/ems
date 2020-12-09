<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Dashboard</title>
	<link href="{{ url('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('css/quill.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<link rel="stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="{{ url('css/admin.css') }}" rel="stylesheet">
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ url('js/quill.js') }}"></script>
	<script src="{{ url('js/sweetalert.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script>
		var baseLaravelUrl = "{{ url('/') }}"
	</script>
	<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>

</head>

<body>
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon">
					@php
					$user = Auth::user()
					@endphp
					<img src="{{ $user->getAvatarUrl() }}" class="admin-small-avatar" />
				</div>
				<div class="sidebar-brand-text mx-3">Admin</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item active">
				<a class="nav-link" href="{{ route('admin-home') }}">
					<i class="fas fa-fw fa-users"></i>
					<span>Người dùng</span></a>
			</li>
			<hr class="sidebar-divider">
			<li class="nav-item active">
				<a class="nav-link" href="{{ route('index-classes') }}">
					<i class="fas fa-fw fa-archway"></i>
					<span>Khí cụ</span></a>
			</li>
			<hr class="sidebar-divider">
			<li class="nav-item active">
				<a class="nav-link" href="{{ route('index-majors') }}">
					<i class="fas fa-fw fa-bookmark"></i>
					<span>Máy biến áp</span></a>
			</li>
			<hr class="sidebar-divider">
			<li class="nav-item active">
				<a class="nav-link" href="{{ url('/logout') }}">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Logout</span></a>
			</li>
			<hr class="sidebar-divider d-none d-md-block">
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0 home" id="sidebarToggle"></button>
			</div>

		</ul>
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<!-- Topbar Search -->
					<form
						class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
				</nav>
				@yield('content')
			</div>
		</div>
</body>
<script language="JavaScript">
		const MqttDataType = {
			circuitBreaker: 1,
			disconnectorSwitch: 2,
			earthBreaker: 3,
			bay: 4,
			mainBusBar: 5,
			busBar: 6,
			transformer: 7
		}
		client = new Paho.MQTT.Client("soldier.cloudmqtt.com", 36094, "xxxxxxx");
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
			console.log("connected")
			message = new Paho.MQTT.Message("xxxx");
			message.destinationName = "cloudmqtt";
			client.send(message);
		}

		function onConnectionLost(responseObject) {
		  if (responseObject.errorCode !== 0) {
			console.log("onConnectionLost:"+responseObject.errorMessage);
		  }
		}

		function onMessageArrived(message) {
			console.log(message)
		}




		let sendMessage = () => {
			var content = {
				sc: "",
				id: "MBA_110",
				type: 7,
				kv1: "2",
				a1: "2",
				mw1: "2",
				mvar1: "2",
				cos1: "2",
				tem1 : "2",
				kv2: "",
			};
			message = new Paho.MQTT.Message(JSON.stringify(content));
			message.destinationName = "Received";
			client.send(message);
		}
		let myVar = setInterval(sendMessage, 4000);
		
	</script>

<script>
	
	$(document).ready(function() {
		$(".home").on("click", function() {
			window.location = baseLaravelUrl + "/home"
		})
	});
</script>

</html>