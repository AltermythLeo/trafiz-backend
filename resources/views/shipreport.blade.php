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
		})
	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
	        Ship Report
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Ship Report</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Ship Report List</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width:30%;">Ship</th>
									<th>License</th>
									<th>Owner</th>
									<th>Supplier Name</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>
										<b>{{$item -> vesselname_param}}</b><br/>
										size : {{$item -> vesselsize_param}}<br/>
										Flag : {{$item -> vesselflag_param}}<br/>
										Fishing gear :
										{{$item->english_name}}
										{{$item->english_name == null ? $item->indonesian_name : " / " . $item->indonesian_name}}
										{{$item->indonesian_name == null ? $item->abbr : " / " . $item->abbr}}<br/>
										Date made : {{$item -> vesseldatemade_param}}
									</td>
									<td>
										Vessel License : {{$item -> vessellicensenumber_param}}<br/>
										Vessel Exp Date : {{$item -> vessellicenseexpiredate_param}}<br/>
										Fishing License : {{$item -> fishinglicensenumber_param}}<br/>
										Fishing License Exp Date : {{$item -> fishinglicenseexpiredate_param}}
									</td>
									<td>
										Name : {{$item -> vesselownername_param}}<br/>
										ID : {{$item -> vesselownerid_param}}<br/>
										Phone : {{$item -> vesselownerphone_param}}<br/>
										Genre : {{$item -> vesselownersex_param}}<br/>
										DOB : {{$item -> vesselownerdob_param}}<br/>
										Address : {{$item -> vesselowneraddress_param}}
									</td>
									<td>{{$item -> name}}</td>
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
