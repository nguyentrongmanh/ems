@extends('layouts.admin')
@php
	use Carbon\Carbon;
@endphp

@section('content')

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Search Panel</h6>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<label style="display: flex">
					<p>Substation:</p>
					<select name="substation" aria-controls="dataTable"
						class="custom-select search-select custom-select-sm form-control form-control-sm">
						<option value="1">BAC A</option>
						<option value="2">HUNG NGUYEN</option>
					</select>
				</label>
			</div>
			<div class="col-sm-12 col-md-4">
				<label style="display: flex; justify-content: flex-end;">
					<p>Start time:</p>
					<input type="search" name="search" class="table-search form-control datepicker form-control-sm" placeholder="" aria-controls="dataTable">
				</label>
			</div>
			<div class="col-sm-12 col-md-4">
				<label style="display: flex; justify-content: flex-end;">
					<p>End time:</p>
					<input type="search" name="search" class="table-search form-control  datepicker form-control-sm" placeholder="" aria-controls="dataTable">
				</label>
			</div>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Classes list</h6>
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
						<th rowspan="2">
							<div style="width: 140px !important; text-align:center; margin-bottom:24px;">
								Date time
							</div>
						</th>
						<th colspan="3" class="text-center">Voltage</th>
						<th colspan="3" class="text-center">Amperage</th>
						<th colspan="3" class="text-center">Active Power</th>
						<th colspan="3" class="text-center">Reactive Power</th>
						<th colspan="3" class="text-center">Factor</th>
						<th colspan="3" class="text-center">Frequency</th>
						<th colspan="3" class="text-center">Temp</th>
					</tr>
					<tr>
						<th class="width-70 text-center">A</th>
						<th class="width-70 text-center">B</th>
						<th class="width-70 text-center">C</th>
						<th class="width-70 text-center">A</th>
						<th class="width-70 text-center">B</th>
						<th class="width-70 text-center">C</th>
						<th class="width-70 text-center">A</th>
						<th class="width-70 text-center">B</th>
						<th class="width-70 text-center">C</th>
						<th class="width-70 text-center">A</th>
						<th class="width-70 text-center">B</th>
						<th class="width-70 text-center">C</th>
						<th class="width-70 text-center">A</th>
						<th class="width-70 text-center">B</th>
						<th class="width-70 text-center">C</th>
						<th class="width-70 text-center">A</th>
						<th class="width-70 text-center">B</th>
						<th class="width-70 text-center">C</th>
						<th class="width-70 text-center">A</th>
						<th class="width-70 text-center">B</th>
						<th class="width-70 text-center">C</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tranformerStatics as $static)
						<tr>
							<td>
								<div style="width: 140px !important;">
									{{ $static->created_at }}
								</div>
							</td>
							<td class="width-70">{{ $static->phase_a_voltage }}</td>
							<td class="width-70">{{ $static->phase_b_voltage }}</td>
							<td class="width-70">{{ $static->phase_c_voltage }}</td>
							<td class="width-70">{{ $static->phase_a_amperage }}</td>
							<td class="width-70">{{ $static->phase_b_amperage }}</td>
							<td class="width-70">{{ $static->phase_c_amperage }}</td>
							<td class="width-70">{{ $static->phase_a_active_power }}</td>
							<td class="width-70">{{ $static->phase_b_active_power }}</td>
							<td class="width-70">{{ $static->phase_c_active_power }}</td>
							<td class="width-70">{{ $static->phase_a_reactive_power }}</td>
							<td class="width-70">{{ $static->phase_b_reactive_power }}</td>
							<td class="width-70">{{ $static->phase_c_reactive_power }}</td>
							<td class="width-70">{{ $static->phase_a_factor }}</td>
							<td class="width-70">{{ $static->phase_b_factor }}</td>
							<td class="width-70">{{ $static->phase_c_factor }}</td>
							<td class="width-70">{{ $static->phase_a_frequency }}</td>
							<td class="width-70">{{ $static->phase_b_frequency }}</td>
							<td class="width-70">{{ $static->phase_c_frequency }}</td>
							<td class="width-70">{{ $static->phase_a_temp }}</td>
							<td class="width-70">{{ $static->phase_b_temp }}</td>
							<td class="width-70">{{ $static->phase_c_temp }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.datepicker').datepicker();
	})
</script>
@endsection