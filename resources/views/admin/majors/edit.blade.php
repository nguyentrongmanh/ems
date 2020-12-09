@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			Edit class
		</h6>
	</div>
	<div class="card-body">
		<form action="{{ route('major-edit', ['id' => $major->id]) }} " enctype="multipart/form-data"
			id="edit-class-form" method="POST" class="needs-validation" novalidate>
			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Name
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
						required="" type="text" value="{{ $major->name }}" />
					@error('name')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					English Name
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('eng_name') is-invalid @enderror" name="eng_name" placeholder="English Name"
						type="text" required value="{{ $major->eng_name }}" />
					@error('eng_name')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Dean
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('dean') is-invalid @enderror" name="dean" placeholder="Dean"
						type="text" value="{{ $major->dean }}" />
					@error('dean')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Email
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Mail"
						type="text" required value="{{ $major->email }}" />
					@error('email')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Phone
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone"
						type="text" value="{{ $major->phone }}" />
					@error('phone')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Introduce
				</label>
				<div class="col-sm-10">
					<textarea style="height:200px;" class="form-control" name="introduction" >{{ $major->introduction }}</textarea>
				</div>
			</div>
			@php
			$imageFileName = $major->banner ?? null;
			@endphp
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Banner
				</label>
				<div class="col-sm-5">
					<input id="main_image" name="banner" type="file" />
					<div class="drop-container">
						<img id="drop" src="{{ url('images/' . $imageFileName) }}"
							class="{{$imageFileName == null ? 'hidden' : null }}" />
					</div>
				</div>
			</div>
			<div class="add-btn">
				<button class="btn btn-primary" type="submit">
					Edit
				</button>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("input[type=file]").on("change", function(event) {
			var fReader = new FileReader();
			fReader.readAsDataURL(event.target.files[0]);
			fReader.onloadend = function(event){
				var img = document.getElementById("drop");
				$("#drop").removeClass("hidden") 
				$("#drop").attr("src", event.target.result)
			}
		});
	})
</script>
@endsection