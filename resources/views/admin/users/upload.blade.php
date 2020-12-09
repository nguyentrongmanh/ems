@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Upload students via excel file</h6>
	</div>
	<div class="card-body">
		<form method="POST" id="add-listening-form" enctype='multipart/form-data'
			action="{{ route('user-upload') }}">
			@csrf
			<div class="form-group">
				<label for="exampleFormControlInput1">Pick excel file to upload</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="upload_file" required>
					<label class="custom-file-label" for="upload_file">Choose file...</label>
					<div class="invalid-feedback">Example invalid custom file feedback</div>
				</div>
			</div>
	        <button type="submit" class="btn btn-primary">UPLOAD</button>
	    </form>
    </div>
</div>

<script>
	$(document).ready(function () {
		$("input[name=upload_file]").on("change", function(event) {
			var fReader = new FileReader();
            console.log(event)
			var fileName = event.target.files[0].name
			fReader.readAsDataURL(event.target.files[0]);
			fReader.onloadend = function(event){
				$("label[for=upload_file]").html(fileName)
			}
		});
	})
</script>

@error('email')
	@php
		$email = session()->get('email');
	@endphp
	<script type="text/javascript">
		var email = {!! json_encode($email) !!};
		swal({
			title: email + " has already been taken!",
			icon: "error",
			dangerMode: true,
		});
	</script>
@enderror
@endsection