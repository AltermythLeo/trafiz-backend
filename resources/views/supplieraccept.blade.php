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

		function confirmCallURL(callurl)
		{
			console.log(callurl)
			if(callurl.includes("rej"))
			{
				str = "Reject";
			}
			else
			{
				str = "Accept";
			}

			bootbox.confirm({
				size: "small",
				message: "Are you sure want to "+str+" this ??",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						window.location.replace(callurl);
					}
				}
			});
		}
	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
	        Supplier Accept
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <label style="color:red;">{{$err}}</label>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Supplier Accept</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Supplier Accept List</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Supplier id</th>
									<th>Nat ID</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>{{$item -> name}} / {{$item -> username}}</td>
									<td>{{$item -> email}}</td>
									<td>{{$item -> phonenumber}}</td>
									<td>{{$item -> supplierid}}</td>
									<td>{{$item -> natidtype}}</td>
									<td>
										<button type="button" class="btn btn-box-tool" title="Accept"
											data-toggle="modal" data-target="#myModalEdit" 
											onclick="confirmCallURL('{{URL::to('/supplier/accept/acc/'.$item -> idmssuppliertemp)}}');">
											<i class="fa fa-pencil-square-o"></i>
										</button>

										<a class="btn btn-box-tool" title="Reject"
											href="javascript://"
											onclick="confirmCallURL('{{URL::to('/supplier/accept/rej/'.$item -> idmssuppliertemp)}}');">
											<i class="fa fa-eraser"></i>
										</a>
									</td>
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
