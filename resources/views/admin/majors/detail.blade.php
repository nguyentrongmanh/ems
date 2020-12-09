@extends('layouts.admin')
@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Major infomation</h6>
		</div>
		<div class="card-body">
			<div class="major-image-container">
				<img class="major-image" src="{{ url('images/' . $majorDetail->banner) }}" />
			</div>
			<ul class="list-group">
				<li class="list-group-item">
					<p class="label">Name</p>
					<p> : {{ $majorDetail->name }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">English Name</p>
					<p> : {{ $majorDetail->eng_name }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Dean</p>
					<p> : {{ $majorDetail->dean }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Phone</p>
					<p> : {{ $majorDetail->phone }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Email</p>
					<p> : {{ $majorDetail->email }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Intro</p>
					<p> : {{ $majorDetail->introduction }} </p>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection