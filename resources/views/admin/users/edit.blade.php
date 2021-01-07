@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit user infomation</h6>
	</div>
	<div class="card-body">
		<form method="POST" id="add-reading-form" enctype='multipart/form-data'
			action="{{ route('user-edit', ['id' => $user->id]) }}">
			@csrf
			<input type="hidden" name="id" value="{{ $user->id }}">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" readonly value="{{ $user->email }}" name="email"
						placeholder="email">
				</div>
				@error('email')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('name') is-invalid @enderror"
						value="{{ $user->name }}" name="name" placeholder="Name">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="{{ $user->address }}" name="address"
						placeholder="Address">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Date of birth</label>
				<div class="col-sm-5">
					<input class="form-control" value="{{ $user->date_of_birth }}" name="date_of_birth"
						placeholder="date_of_birth">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" value="{{ $user->phone }}" name="phone"
						placeholder="Phone">
				</div>
			</div>
			@php
			$imageFileName = $user->avatar ?? "default_avatar.png";
			@endphp
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Avatar
				</label>
				<div class="col-sm-5">
					<input id="main_image" name="image" type="file" />
					<div class="drop-container">
						<img id="drop" src="{{ url('images/' . $imageFileName) }}"
							class="{{$imageFileName == null ? 'hidden' : null }}" />
					</div>
				</div>
			</div>
			
			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Role</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="role" id="user" value="0"
								{{ $user->role == 0 ? __("checked") : null }}>
							<label class="form-check-label" for="user">
								USER
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="role" id="admin" value="1"
								{{ $user->role == 1 ? __("checked") : null }}>
							<label class="form-check-label" for="admin">
								ADMIN
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="role" id="admin" value="2"
								{{ $user->role == 2 ? __("checked") : null }}>
							<label class="form-check-label" for="admin">
								SUPER ADMIN
							</label>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="add-btn">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function () {
		$("input[name=date_of_birth]").datepicker({
			format: "yyyy-mm-dd"
		});
		$("input[type=file]").on("change", function(event) {
			var fReader = new FileReader();
			fReader.readAsDataURL(event.target.files[0]);
			fReader.onloadend = function(event){
				var img = document.getElementById("drop");
				$("#drop").removeClass("hidden") 
				$("#drop").attr("src", event.target.result)
			}
		});

		const STUDENT = 0;
		const TEACHER = 1;
		console.log($("input[type=radio][name=role]:checked").val())

		if (parseInt($("input[type=radio][name=role]:checked").val()) == TEACHER) {
			$(".is-student").hide(500)
		}

		$("input[type=radio][name=role]").change(function() {
			if (this.value == STUDENT) {
				$(".is-student").show(500)
			} else {
				$(".is-student").hide(500)
			}
		});
	})
</script>
@endsection