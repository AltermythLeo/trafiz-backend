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
			$('#example1').DataTable();
			$('#example2').DataTable();
			
		})

		$(document).ready(function(){
			selectItemByValue(document.getElementById("ddlmonth"), {{$month}});
			selectItemByValue(document.getElementById("ddlyear"), {{$year}});
		});

		function selectItemByValue(elmnt, value){
			console.log(elmnt);
			for(var i=0; i < elmnt.options.length; i++)
			{
				if(elmnt.options[i].value == value)
					elmnt.selectedIndex = i;
			}
		}

		function changemonthyear()
		{
			console.log(document.getElementById("ddlmonth").value, document.getElementById("ddlyear").value);
			var test = 	window.location.pathname +
						"?m=" + document.getElementById("ddlmonth").value + 
						"&y=" + document.getElementById("ddlyear").value;
			location.replace(test);
		}
	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
	        Loan Report
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Loan Report</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<select id="ddlmonth">
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
				<select id="ddlyear">
					<option value="{{$yearNow-2}}">{{$yearNow-2}}</option>
					<option value="{{$yearNow-1}}">{{$yearNow-1}}</option>
					<option value="{{$yearNow}}">{{$yearNow}}</option>
				</select>
				<input type="button" onClick="changemonthyear()" value="Change"/>
			</div>
			<div class="col-md-6">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Loan Report List</h3>
					</div>
					
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Desc</th>
									<th>Loan in Rp</th>
									<th>Debtor</th>
									<th>loan date</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>{{$item -> descloan}}</td>
									<td>{{$item -> loaninrp}}</td>
									<td>{{$item -> nameloan}}</td>
									<td>{{$item -> loandate}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
		  		</div>
			</div>

			<div class="col-md-6">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Pay Report List</h3>
					</div>
					
					<div class="box-body">
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Desc</th>
									<th>Loan in Rp</th>
									<th>Debtor</th>
									<th>paid of date</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($datapay as $item)
								<tr>
									<td>{{$item -> descloan}}</td>
									<td>{{$item -> loaninrp}}</td>
									<td>{{$item -> nameloan}}</td>
									<td>{{$item -> paidoffdate}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
		  		</div>
			</div>
		</div>
	</section>
@endsection