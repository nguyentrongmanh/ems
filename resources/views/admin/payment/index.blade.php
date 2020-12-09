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
					<p>Class:</p>
					<select name="class" aria-controls="dataTable"
						class="custom-select search-select custom-select-sm form-control form-control-sm">
                        @foreach ($classes as $class)
						<option value="{{ $class->id }}">
							{{ $class->name  }}
						</option>
						@endforeach
					</select>
				</label>
			</div class="col-sm-12 col-md-4">
                <label style="display: flex; justify-content: flex-end;">
					<button class="btn btn-primary btn-search">Search</button>
				</label>
			</div>
		</div>
		
	</div>
</div>

<div class="row payment-detail">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						Tổng đã thu</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800" id="total_amount">{{ $total }} VNĐ</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Đơn giá</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">200000 VNĐ</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số sinh viên đã đóng
						</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="total_student_paid">{{ $totalPay }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
						Số sinh viên chưa đóng</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800" id="total_student_not_paid">{{ $totalDontPay }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Student list</h6>
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
						<th style="width: 20px">ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Payment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th style="width: 20px">ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Payment</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($users as $user)
                    @php
                        $cardClass = "bg-success";
                        $cardText = "Paid";
                        $actionBtn = "disabled";
                        if (!$user->paid_flg) {
                            $cardText = "Not Paid";
                            $cardClass = "bg-danger";
                            $actionBtn = "";
                        }
                        
                    @endphp
					<tr style="width: 20px">
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
                            <div class="card {{$cardClass}} text-white shadow" id="card_{{$user->id}}">
                                <div class="card-body">
                                {{ $cardText }}
                                </div>
                            </div>
                        </td>
						<td style="width: 50px">
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<div class="dropdown-item">
                                        <button class="payment-page-action send-remid-mail" {{$actionBtn}} data-id="{{ $user->id }}">
										    <i class="fas fa-envelope" style="margin-right: 10px;"></i> Send Mail
                                        </button>
								    </div>
									<div class="dropdown-item"> 
                                        <button class="payment-page-action confirm-pay-btn" {{$actionBtn}} data-id="{{ $user->id }}">
                                            <i class="fas fa-money-bill-wave" style="margin-right: 10px;"></i> Confirm Paid
                                        </button>
									</div>
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
		const defaultSelectedClass = "{{$classId}}"
		$("select[name=class]").val(defaultSelectedClass)
		const defaultLimit = "{{$limit}}"
		let total =  parseInt("{{$total}}")
		let totalStudentPaid =  parseInt("{{$totalPay}}")
		let totalStudentNotPaid =  parseInt("{{$totalDontPay}}")
		$("select[name=dataTable_length]").val(defaultLimit);
		$("select[name=dataTable_length]").on("change", function(e) {
			const limit = e.target.value
			window.location = baseLaravelUrl + "/admin/payments?limit=" + limit
		});

		$(".btn-search").on("click", function() {
			const classId = $("select[name=class] :selected").val()
			window.location = baseLaravelUrl + "/admin/payments?limit=" + defaultLimit + "&class=" + classId
		})

		$('.confirm-pay-btn').click(function(e) {
            e.preventDefault();
			let userId = $(this).attr("data-id");
            $.ajax({
                url: baseLaravelUrl + '/api/v1/payment/change-status',
                type: 'POST',
                dataType: 'json',
                data: {
                    user_id: userId,
                }
            }).done(function(res) {
				console.log(res)
				if (res.status == 200) {
					total = total + 200000
					totalStudentPaid += 1
					totalStudentNotPaid -= 1
					$("#total_amount").html(total + " VNĐ")
					$("#total_student_paid").html(totalStudentPaid)
					$("#total_student_not_paid").html(totalStudentNotPaid)
					$("#card_" + userId).removeClass("bg-danger");
					$("#card_" + userId).addClass("bg-success")
					$("button[data-id=" + userId + "]").attr("disabled", "disabled");
				}
            });
        });

		$('.send-remid-mail').click(function(e) {
            e.preventDefault();
			let userId = $(this).attr("data-id");
            $.ajax({
                url: baseLaravelUrl + '/api/v1/payment/sent-mail',
                type: 'POST',
                dataType: 'json',
                data: {
                    user_id: userId,
                }
            }).done(function(res) {
				if (res.status == 200) {
					swal({
						title: "Send Mail success!",
						icon: "success",
						button: "Ok!",
					});
				} else {
					swal({
						title: "An error occurred",
						icon: "error",
						dangerMode: true,
					});
				}
            });
            
        });
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