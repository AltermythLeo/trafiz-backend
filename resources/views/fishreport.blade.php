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
			bootbox.confirm({
				size: "small",
				message: "Are you sure want to Delete this ??",
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

		function injectContentEdit(objid)
		{
			obj = document.getElementById(objid);
			var objArr = obj.innerHTML.split('~');

			document.getElementById("inputForm").style.display = "none";
			document.getElementById("editForm").style.display = "";
			
			document.getElementById("objIDEdit").value = objid.substring(7);
			
			var e = document.getElementById("fishidedit");
			selectItemByValue(e, objArr[0]);
			document.getElementById("indnameedit").value = objArr[1];
			document.getElementById("localnameedit").value = objArr[2];
			document.getElementById("priceedit").value = objArr[3];

			var e = document.getElementById("supplieredit");
			selectItemByValue(e, objArr[4]);

			document.getElementById("photonameedit").value = objArr[5];
			
			window.scrollTo(0, 0);
		}

		function cancelEdit()
		{
			document.getElementById("inputForm").style.display = "";
			document.getElementById("editForm").style.display = "none";
		}

		function selectItemByValue(elmnt, value){
			console.log(elmnt);
			for(var i=0; i < elmnt.options.length; i++)
			{
				if(elmnt.options[i].value == value)
					elmnt.selectedIndex = i;
			}
		}
	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
	        Fish Data Report
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Fish Data Report</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Fish Data Report List</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Supplier Name</th>
									<th>Desc</th>
									<th style="width:150px;">Photo</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>
										{{$item -> namesupplier}}
									</td>
									<td>
										Three Code : {{$item -> threea_code}}<br/>
										Scientific name : {{$item -> scientific_name}}<br/>
										English name : {{$item -> english_name}}<br/>
										French name : {{$item -> french_name}}<br/>
										Spanish name : {{$item -> spanish_name}}<br/>
										Local name : {{$item -> localname}}<br/>
										Indonesia name : {{$item -> indname}}<br/>
										Price : Rp. {{ number_format($item -> price, 2, ",", ".")}}<br/>
										<button type="button" class="btn btn-box-tool" title="Edit"
											data-toggle="modal" data-target="#myModalEdit" 
											onclick="injectContentEdit('content{{$item -> idfishoffline}}');">
											<i class="fa fa-pencil-square-o"></i>
										</button>

										<a class="btn btn-box-tool" title="Delete"
											href="javascript://"
											onclick="confirmCallURL('{{URL::to('/fish/del/'.$item -> idfishoffline)}}');">
											<i class="fa fa-eraser"></i>
										</a>
										<span id="content{{$item -> idfishoffline}}" style="display:none;">{{$item->idltfish}}~{{$item -> indname}}~{{$item -> localname}}~{{$item -> price}}~{{$item -> idmssupplier}}~{{$item -> photo}}</span>
									</td>
									<td>
										<img src="{{ ($item -> photo == null || $item -> photo == '') ?
												URL::to('/img/logoSquare.png') : URL::to('/imgupload/'. $item -> photo)}}"
												style="width:100%;">
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
		  		</div>
			</div>
			<div class="col-md-4">
				
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">Input</h3>
					</div>
					
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/fish/regis')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputType1">Fish</label><br/>
								<select name="fishid" style="width:100%;">
								@foreach ($fishdata as $item)
									<option value="{{$item->idltfish}}">{{$item->english_name}} - {{$item->scientific_name}}</option>
								@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="indname">Indonesia Name *</label>
								<input id="indname" type="text" name="indname" class="form-control" required autofocus>
							</div>

							<div class="form-group">
								<label for="localname">Local Name</label>
								<input id="localname" type="text" name="localname" class="form-control">
							</div>

							<div class="form-group">
								<label for="price">Price</label>
								<input id="price" type="text" name="price" class="form-control">
							</div>

							<div class="form-group">
								<label for="photoparam">Photo</label>
								<input type="file" name="photoparam" id="photoparam">
							</div>

							<div class="form-group">
								<label for="supplier">Supplier</label><br/>
								<select name="supplier" style="width:100%;">
								@foreach ($supplierdata as $item)
									<option value="{{$item -> idmssupplier}}">
										{{$item->name}}
									</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>

					</form>
				</div>

				<div class="box box-primary" id="editForm" style="display:none;">
					<div class="box-header with-border">
						<h3 class="box-title">Edit</h3>
					</div>

					<form method="post" enctype="multipart/form-data" action="{{URL::to('/fish/edit')}}">
						<input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
						<input name="objIDEdit" id="objIDEdit" type="hidden" />
						
						<div class="box-body">
							<div class="form-group">
								<label for="fishidedit">Fish</label><br/>
								<select name="fishidedit" id="fishidedit" style="width:100%;">
								@foreach ($fishdata as $item)
									<option value="{{$item->idltfish}}">{{$item->english_name}} - {{$item->scientific_name}}</option>
								@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="indnameedit">Indonesia Name *</label>
								<input id="indnameedit" type="text" name="indnameedit" class="form-control" required autofocus>
							</div>

							<div class="form-group">
								<label for="localnameedit">Local Name</label>
								<input id="localnameedit" type="text" name="localnameedit" class="form-control">
							</div>

							<div class="form-group">
								<label for="priceedit">Price</label>
								<input id="priceedit" type="text" name="priceedit" class="form-control">
							</div>

							<div class="form-group">
								<label for="photoparamedit">Photo (Upload if you want to change photo)</label>
								<input type="file" name="photoparamedit" id="photoparamedit">
								<input name="photonameedit" id="photonameedit" type="hidden" />
							</div>

							<div class="form-group">
								<label for="supplieredit">Supplier</label><br/>
								<select name="supplieredit" id="supplieredit" style="width:100%;">
								@foreach ($supplierdata as $item)
									<option value="{{$item -> idmssupplier}}">
										{{$item->name}}
									</option>
								@endforeach
								</select>
							</div>
						</div>

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="button" onClick="cancelEdit()" class="btn btn-danger">Cancel</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</section>
	

@endsection
