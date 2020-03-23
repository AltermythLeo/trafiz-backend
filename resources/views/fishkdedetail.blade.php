@extends('layouts.admin')
@section('style')
	<link rel="stylesheet" href="{{URL::to('/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('script')
	<script src="{{URL::to('js/bootbox.min.js')}}"></script>
	
	<script src="{{URL::to('/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script>
		function changeidfish()
		{
			//console.log(document.getElementById("ddlmonth").value, document.getElementById("ddlyear").value);
			var test = 	window.location.pathname +
						"?id=" + document.getElementById("idfish").value;
			location.replace(test);
		}
	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
	        Generate Delivery Sheet Code
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Generate Delivery Sheet Code</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Generate Delivery Sheet Code</h3>
					</div>
					<div class="box-body">
						<input id="idfish" class="form-control" name="idfish" placeholder="Insert deliverysheetno Here">
						<input type="button" onClick="changeidfish()" value="Submit" class="form-control btn btn-primary"/>
						<span>{!! $data !!}</span>

					</div>
		  		</div>
			</div>
		</div>
	</section>
@endsection
