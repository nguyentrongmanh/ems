@extends('layouts.admin')

@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">User infomation</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-3">
					<img class="admin-user-avatar" src="{{ $user->getAvatarUrl() }}" />
				</div>
				<div class="col-sm-9">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10 detail-value">
							{{ $user->email }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10 detail-value">
							{{ $user->name }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10 detail-value">
							{{ $user->address }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Date of birth</label>
						<div class="col-sm-10 detail-value">
							{{ $user->date_of_birth }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-10 detail-value">
							{{ $user->phone }}
						</div>
					</div>
					@if($user->role == 0)
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Student COde</label>
						<div class="col-sm-10 detail-value">
							{{ $user->mssv }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Class</label>
						<div class="col-sm-10 detail-value">
							{{ $user->classes->name }}
						</div>
					</div>
					@endif
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-10 detail-value">
							{{ $user->role == 0 ? 'STUDENT' : 'TEACHER' }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection