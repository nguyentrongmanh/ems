@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Search Panel</h6>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<label style="display: flex">
					<p>Role:</p>
					<select name="role" aria-controls="dataTable"
						class="custom-select search-select custom-select-sm form-control form-control-sm">
						<option value="">ALL</option>
						<option value="0">USER</option>
						<option value="1">ADMIN</option>
						<option value="2">SUPPER ADMIN</option>
					</select>
				</label>
			</div>
			<div class="col-sm-12 col-md-5">
				<label style="display: flex; justify-content: flex-end;">
					Search by email:<input type="search" name="search"
						class="table-search form-control form-control-sm" placeholder="" aria-controls="dataTable">
				</label>
			</div>
			<div class="col-sm-12 col-md-3">
				<button class="btn btn-primary btn-search">Search</button>
			</div>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Members list</h6>
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
			<div class="col-sm-12 col-md-6">
				<div id="dataTable_filter" class="dataTables_filter" style="display: flex; justify-content: flex-end;">
					<a style="margin: 15px;" href="{{ url('/admin/users/create') }}" class="btn btn-success btn-icon-split">
						<span class="icon text-white-50">
							<i class="fas fa-plus"></i>
						</span>
						<span class="text">Thêm mới</span>
					</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th style="width: 20px">ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th class="width-70">Role</th>
						<th>Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th style="width: 20px">ID</th>
						<th >Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th class="width-70">Role</th>
						<th class="">Created</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->phone }}</td>
						<td class="width-70">{{ $user->role == 2  ? __("SUPPER ADMIN") : ($user->role == 1 ? __("ADMIN") : __("USER"))}}</td>
						<th class="">{{ $user->getFormatCreated() }}</td>
						<td style="width: 50px">
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<div class="dropdown-item"><a href="{{ url('admin/users/delete/' . $user->id) }}"
											class="btn btn-sm btn-circle">
											<i class="fas fa-trash" style="margin-right: 10px;"></i> Delete
										</a></div>
									<div class="dropdown-item"> <a href="{{ url('admin/users/detail/' . $user->id) }}"
											class="btn btn-sm btn-circle">
											<i class="fas fa-book" style="margin-right: 10px;"></i> Detail
										</a></div>
									<div class="dropdown-item"> <a href="{{ url('admin/users/edit/' . $user->id) }}"
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
			{{ $users->links() }}
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		const defaultLimit = "{{$limit}}"
		const urlParams = new URLSearchParams(window.location.search);
		console.log(urlParams)
		if (urlParams.get("role") != "") {
			$("select[name=role]").val(urlParams.get("role"));
		}

		if (urlParams.get("class_id") != "") {
			$("select[name=class]").val(urlParams.get("class_id"));
		}

		if (urlParams.get("search") != "") {
			$("input[name=search]").val(urlParams.get("search"));
		}

		$("select[name=dataTable_length]").val(defaultLimit);
		$("select[name=dataTable_length]").on("change", function(e) {
			const limit = e.target.value
			window.location = baseLaravelUrl + "/admin?limit=" + limit
		});

		$(".btn-search").on("click", function() {
			const search = $("input[name=search]").val()
			const role = $("select[name=role] :selected").val()
			const classId = $("select[name=class] :selected").val()
			window.location = baseLaravelUrl + "/admin?limit=" + defaultLimit + "&search=" + search + "&role=" + role + "&class_id=" + classId
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