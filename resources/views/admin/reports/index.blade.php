@extends('layouts.admin')
@php
	use Carbon\Carbon;
@endphp

@section('content')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<script>
    $(document).ready(function(){
        $('#reservationtime').daterangepicker({
            maxDate: moment().subtract(1, 'day'),
            locale: {
                format: 'YYYY-MM-DD'
            }
        })
    })
</script>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Search Panel</h6>
	</div>
	<div class="card-body">
        <form method="GET" action="{{ url("/admin/report") }}">
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
                <div class="col-sm-12 col-md-6">
                    <label style="display: flex; justify-content: flex-end;">
                        <p>Datetime range:</p>
                        <input id="reservationtime" type="search" name="date_range" class="table-search form-control  datepicker form-control-sm" placeholder="" aria-controls="dataTable">
                    </label>
                </div>
                <div class="col-sm-12 col-md-2">
                    <label style="display: flex; justify-content: flex-end;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </label>
                </div>
            </div>
        </form>
	</div>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Substation Data</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive report-table">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th rowspan="2">
							<div style="width: 140px !important; text-align:center; margin-bottom:24px;">
								Date time
							</div>
                        </th>
                        @foreach ($tableHeader as $headerText)
                            <th colspan="4" class="text-center">{{ strtoupper($headerText) }}</th>
                        @endforeach
					</tr>
					<tr>
                        @foreach ($tableHeader as $headerText)
                            <th class="width-70 text-center">I</th>
                            <th class="width-70 text-center">P</th>
                            <th class="width-70 text-center">Q</th>
                            <th class="width-70 text-center">Temp</th>
                        @endforeach
					</tr>
				</thead>
				<tbody>
					@foreach ($renderData as $datetime => $data)
						<tr>
							<td>
								<div style="width: 140px !important;">
									{{ $datetime }}
								</div>
                            </td>
                            @foreach ($data as $key => $value)
							<td class="width-70">{{ $value['amperage'] }}</td>
							<td class="width-70">{{ $value['active_power'] }}</td>
							<td class="width-70">{{ $value['reactive_power'] }}</td>
							<td class="width-70">{{ $value['temp'] }}</td>
                            @endforeach
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		const urlParams = new URLSearchParams(window.location.search);
		if (urlParams.get("substation") != "") {
			$("select[name=substation]").val(urlParams.get("substation"));
		}

        if (urlParams.get("date_range") != "") {
			$("input[name=date_range]").val(urlParams.get("date_range"));
		}

	});
</script>
@endsection