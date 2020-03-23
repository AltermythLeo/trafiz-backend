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
	        Fisherman Report
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Fisherman Report</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Fisherman Report List</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Personal Data</th>
									<th>FishermanData</th>
									<th>Supplier Name</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>
										Name : {{$item -> name}}<br/>
										Birth of Date :{{$item -> bod}}<br/>
										Genre : {{$item -> sex_param}}<br/>
										Nationality : {{$item -> nat_param}}<br/>
										Address :
										{{$item->address_param}}{{$item->address_param == "" ? $item->city : ", " . $item->city}}{{$item->city == "" ? $item->district : ", " . $item->district}}{{$item->district == "" ? $item->province : ", " . $item->province}}
										{{$item->province == "" ? $item->country : ", " . $item->country}}<br/>
										Reg Number : {{$item -> fishermanregnumber}}<br/>
										Phone : {{$item -> phone_param}}
									</td>
									<td>
										fisherman ID : {{$item -> id_param}}<br/>
										job Title : {{$item -> jobtitle_param}}
									</td>									
									<td>{{$item -> suppliername}}</td>
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
