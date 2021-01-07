@extends('layouts.admin')
@php
    use Carbon\Carbon;
    use App\Enums\TranformerAlarm;
    use App\Enums\MeasuringUnit;
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
        <form method="GET" action="{{ url("/admin/event") }}">
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
		<h6 class="m-0 font-weight-bold text-primary">Substation Event List</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive report-table">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>
							Time Received
                        </th>
                        <th>
							Alarm Status
                        </th>
                        <th>
							Time Acknowledged
                        </th>
                        <th>
							Time Cleared
                        </th>
						<th>Alarm Group</th>
						<th>Text</th>
						<th>Value</th>
						<th>Unit</th>
						<th>Note</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($alarms as $alarm)
						<tr>
							<td>
								{{ $alarm->time_received }}
							</td>
							<td>{{ $alarm->status }}</td>
							<td>{{ $alarm->time_acknowledged ?? null }}</td>
							<td>{{ $alarm->time_cleared ?? null }}</td>
							<td>{{ $alarm->status }}</td>
                            <td>{{ TranformerAlarm::getDescription($alarm->alarm_code) }}</td>
                            <td>{{ $alarm->value }}</td>
                            <td>{{ __(MeasuringUnit::getDescription($alarm->unit)) }}</td>
                            <td></td>
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