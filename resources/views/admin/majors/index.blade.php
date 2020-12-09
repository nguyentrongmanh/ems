@extends('layouts.admin')
@php
	use Carbon\Carbon;
@endphp

@section('content')
<a style="margin: 15px;" href="{{ url('/admin/majors/add') }}" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
		<i class="fas fa-plus"></i>
	</span>
	<span class="text">Add new</span>
</a>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Majors list</h6>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<div class="dataTables_length" id="dataTable_length">
					<label style="display: flex">
						<p>Show</p>
						<select name="dataTable_length" aria-controls="dataTable"
							class="table-entries custom-select custom-select-sm form-control form-control-sm">
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
						<p>Entries</p>
					</label>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th style="width: 20px">ID</th>
						<th>Name</th>
						<th>English Name</th>
						<th>Dean</th>
						<th class="w-100">Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th style="width: 20px">ID</th>
						<th>Name</th>
						<th>English Name</th>
						<th>Dean</th>
						<th class="w-100">Created</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($majors as $major)
					<tr style="width: 20px">
						<td>{{ $major->id }}</td>
						<td>{{ $major->name }}</td>
						<td>{{ $major->eng_name }}</td>
						<td>{{ $major->dean }}</td>
						<td class="w-100">
							{{ Carbon::createFromFormat("Y-m-d H:i:s", $major->created_at)->format("Y-m-d") }}
						</td>
						<td style="width: 50px">
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<div class="dropdown-item"><a href="{{ url('admin/majors/delete/' . $major->id) }}"
											class="btn btn-sm btn-circle">
											<i class="fas fa-trash" style="margin-right: 10px;"></i> Delete
										</a></div>
									<div class="dropdown-item"> <a href="{{ url('admin/majors/detail/' . $major->id) }}"
											class="btn btn-sm btn-circle">
											<i class="fas fa-book" style="margin-right: 10px;"></i> Detail
										</a></div>
									<div class="dropdown-item"> <a href="{{ url('admin/majors/edit/' . $major->id) }}"
											class="btn btn-sm btn-circle">
											<i class="fas fa-user-edit" style="margin-right: 10px;"></i> Edit
										</a></div>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		const defaultLimit = "{{$limit}}"
		$("select[name=dataTable_length]").val(defaultLimit);
		$("select[name=dataTable_length]").on("change", function(e) {
			const limit = e.target.value
			window.location = baseLaravelUrl + "/admin/majors?limit=" + limit
		});

		$(".btn-search").on("click", function() {
			const search = $("input[name=search]").val()
			window.location = baseLaravelUrl + "/admin/majors?limit=" + defaultLimit + "&search=" + search
		})
	});
</script>

@if (session('success'))
<script type="text/javascript">
	swal({
		title: "Add new success",
		icon: "success",
		button: "Ok!",
	});
</script>
@endif
@if (session('edit'))
<script type="text/javascript">
	swal({
		title: "Edit success",
		icon: "success",
		button: "Ok!",
	});
</script>
@endif

@if (session('delete'))
<script type="text/javascript">
	swal({
		title: "Delete success",
		icon: "success",
		button: "Ok!",
	});
</script>
@endif

@if (session('error'))
<script type="text/javascript">
	swal({
		title: "An error occurred",
		icon: "error",
		dangerMode: true,
	});
</script>
@endif
@endsection