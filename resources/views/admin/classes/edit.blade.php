@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			Edit class
		</h6>
	</div>
	<div class="card-body">
		<form action="{{ route('class-edit', ['id' => $class->id]) }} " enctype="multipart/form-data"
			id="edit-class-form" method="POST" class="needs-validation" novalidate>
			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Name
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
						required="" type="text" value="{{ $class->name }}" />
					@error('name')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Teacher
				</label>
				<div class="col-sm-10">
					<select class="form-control" name="teacher_id" value="{{ $class->teacher->id }}">
						@foreach ($teachers as $teacher)
						@php
							$selected = '';
							if($teacher->id == $class->teacher_id) // Any Id
							{
							$selected = 'selected';
							}
						@endphp
						<option value="{{ $teacher->id }}" {{$selected}}>
							{{ $teacher->name  }} - {{ $teacher->email }}
						</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Major
				</label>
				<div class="col-sm-10">
					<select class="form-control" name="major_id" value="{{ $class->major_id }}"> 
						@foreach ($majors as $major)
						@php
							$selected = '';
							if($major->id == $class->major_id) // Any Id
							{
							$selected = 'selected';
							}
						@endphp
						<option value="{{ $major->id }}" {{$selected}}>
							{{ $major->name  }} - {{ $major->eng_name }}
						</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Acadermic Year
				</label>
				<div class="col-sm-5">
					<input class="form-control" name="academic_year" placeholder="Acadermic Year"
						type="number" value="{{ $class->academic_year }}"/>
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
<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>