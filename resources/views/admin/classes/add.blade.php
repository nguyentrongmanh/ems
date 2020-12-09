@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			Add new class
		</h6>
	</div>
	<div class="card-body">
		<form action="{{ route('class-add') }}" enctype="multipart/form-data" id="add-class-form" method="POST"
			class="needs-validation" novalidate>
			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Name
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
						type="text" required />
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
					<select class="form-control" name="teacher_id">
						@foreach ($teachers as $teacher)
						<option value="{{ $teacher->id }}">
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
					<select class="form-control" name="major_id">
						@foreach ($majors as $major)
						<option value="{{ $major->id }}">
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
						type="number"/>
				</div>
			</div>
			<div class="add-btn">
				<button class="btn btn-primary" type="submit">
					Add
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
