@extends('layouts.admin')
@php
use Carbon\Carbon;
$class->image = $class->image ?? 'default_class_image.jpg';
@endphp

@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Class infomation</h6>
		</div>
		<div class="card-body">
			<ul class="list-group">
				<li class="list-group-item">
					<p class="label">Class Name</p>
					<p> : {{ $class->name }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Teacher Name</p>
					<p> : {{ $class->teacher->name ?? ""}} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Student Number</p>
					<p> : {{ $class->student_number }} students</p>
				</li>
				<li class="list-group-item">
					<p class="label">Major</p>
					<p> : {{ $class->major->name }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Create At</p>
					<p> : {{ $class->getFormatCreated() }} </p>
				</li>
			</ul>
		</div>
	</div>
	<div class="card shadow mb-4 border-left-success">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Students</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Student Name</th>
							<th>Student Email</th>
							<th>Created at</th>
							<th>Link</th>
						</tr>
					</thead>
					<tbody>
						@php

						@endphp
						@foreach ($class->users as $student)
						<tr style="width: 20px">
							<td>{{ $student->name }}</td>
							<td>{{ $student->email }}</td>
							<td>{{ $student->created_at }}</td>
							<td><a class="btn btn-primary"
									href="{{ url('admin/users/detail/' . $student->id) }}">Link</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection