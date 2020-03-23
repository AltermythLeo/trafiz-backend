@extends('layouts.admin')
@section('style')
	
	<link rel="stylesheet" href="{{URL::to('/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('script')
	<script src="{{URL::to('js/bootbox.min.js')}}"></script>
	
	<script src="{{URL::to('/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script>
		$(function () {
			$('#incomeSellFish').DataTable();
			$('#incomeLoanPay').DataTable();
			$('#incomeBuyCatch').DataTable();
			$('#incomeLoan').DataTable();			
		})

		$(document).ready(function(){
			changeMonthDate({{$month}});

			selectItemByValue(document.getElementById("ddldate"), {{$day}});
			selectItemByValue(document.getElementById("ddlmonth"), {{$month}});
			selectItemByValue(document.getElementById("ddlyear"), {{$year}});
			if({{$authlv}} == -1)
				selectItemByValue(document.getElementById("ddlsupplier"), "{{$id}}");
		});

		function selectItemByValue(elmnt, value){
			//console.log(elmnt);
			for(var i=0; i < elmnt.options.length; i++)
			{
				if(elmnt.options[i].value == value)
					elmnt.selectedIndex = i;
			}
		}

		function changemonthyear()
		{
			var id = "";
			if({{$authlv}} == -1)
				id = document.getElementById("ddlsupplier").value;
			else
				id = "{{$id}}";

			var test = 	window.location.pathname +
						"?id=" + id + 
						"&d=" + document.getElementById("ddldate").value + 
						"&m=" + document.getElementById("ddlmonth").value + 
						"&y=" + document.getElementById("ddlyear").value;
			//console.log(test);
			location.replace(test);
		}

		function changesupplier(sup)
		{
			document.getElementById("hidsupplier").value = sup;
		}

		function changeDayDate(day)
		{
			document.getElementById("hiddate").value = day;
		}

		function changeMonthDate(month)
		{
			document.getElementById("hidmonth").value = month;
			var getDaysInMonth = new Date({{$year}}, month, 0).getDate();

			var x = document.getElementById("ddldate");
			for(i = x.options.length - 1 ; i >= 0 ; i--)
			{
				x.remove(i);
			}
			var option = document.createElement("option");
			option.text = "All";
			option.value = "-1"
			x.add(option);

			for(var i=1;i<=getDaysInMonth;i++)
			{
				var option = document.createElement("option");
				option.text = i;
				option.value = i;
				x.add(option);
			}
		}

		function changeYearDate(year)
		{
			document.getElementById("hidyear").value = year;
		}
	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
	        Transaction Report
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Transaction Report</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				@if($authlv == -1)
					<select id="ddlsupplier" name="ddlsupplier" style="width:100%;" onchange="changesupplier(value);">
						<option value="-1">-- All --</option>
					@foreach ($dataSupplier as $item)
						<option value="{{$item -> idmssupplier}}">
							{{$item->name}}
						</option>
					@endforeach
					</select>
				@endif
				<select id="ddldate" onchange="changeDayDate(value);">
					<option value="-1">All</option>
				</select>
				<select id="ddlmonth" onchange="changeMonthDate(value);">
					<option value="-1">All</option>
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				<select id="ddlyear" onchange="changeYearDate(value);">
					<option value="{{$yearNow-2}}">{{$yearNow-2}}</option>
					<option value="{{$yearNow-1}}">{{$yearNow-1}}</option>
					<option value="{{$yearNow}}">{{$yearNow}}</option>
				</select>
				<input type="button" onClick="changemonthyear()" value="Submit"/>
				<form method="POST" enctype="multipart/form-data" action="{{URL::to('/transaction/report/print')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="download" value="pdf">
					<input type="hidden" name="date" id="hiddate" value="{{$day}}">
					<input type="hidden" name="month" id="hidmonth" value="{{$month}}">
					<input type="hidden" name="year" id="hidyear" value="{{$year}}">
					<input type="hidden" name="sid" id="hidsupplier" value="{{$id}}">
					<button type="submit" class="btn btn-primary">Print</button>
				</form>
			</div>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Transaction Report List</h3>
					</div>
					
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<h4 class="box-title">Income</h4>
								<h5 class="box-title">Sell Fish</h5>
								<table id="incomeSellFish" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataSellFish as $item)
										<tr>
											<td>{{date_format(date_create($item -> deliverydate),"Y-m-d")}}</td>
											<td>{{$item -> numberoffishorloin}} ({{$item -> totalweight}} Kg)</td>
											<td>Rp. {{ number_format($item -> totalprice, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalSellFish, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<h4 class="box-title">Expense</h4>
								<h5 class="box-title">Buy Catch</h5>
								<table id="incomeBuyCatch" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataCatch as $item)
										<tr>
											<td>{{date_format(date_create($item -> postdate),"Y-m-d")}}</td>
											<td>{{$item -> nameseller}}</td>
											<td>Rp. {{ number_format($item -> totalprice, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalCatch, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<h5 class="box-title">Loan Pay</h5>
								<table id="incomeLoanPay" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataLoanPay as $item)
										<tr>
											<td>{{date_format(date_create($item -> paidoffdate),"Y-m-d")}}</td>
											<td>{{$item -> namepayer}}</td>
											<td>Rp. {{ number_format($item -> loaninrp, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalLoanPay, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>


							<div class="col-md-6">
								<h5 class="box-title">Loan</h5>
								<table id="incomeLoan" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataLoan as $item)
										<tr>
											<td>{{date_format(date_create($item -> loandate),"Y-m-d")}}</td>
											<td>{{ $item->idfishermanoffline == null ? $item->nameloanbuyer : $item->nameloan }}</td>
											<td>Rp. {{ number_format($item -> loaninrp, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalLoan, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<h4 class="box-title">Total Income = Rp. {{number_format($totalSellFish + $totalLoanPay, 2, ",", ".")}}</h4>
							</div>
							<div class="col-md-6">
								<h4 class="box-title">Total Expense = Rp. {{number_format($totalLoan + $totalCatch, 2, ",", ".")}}</h4>
							</div>
						</div>
					</div>
		  		</div>
			</div>
		</div>
	</section>
@endsection