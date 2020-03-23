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
			document.getElementById("iscaapedit").value = objArr[0];
			document.getElementById("taxocodeedit").value = objArr[1];
			document.getElementById("threea_codeedit").value = objArr[2];
			document.getElementById("scientific_nameedit").value = objArr[3];
			document.getElementById("english_nameedit").value = objArr[4];
			document.getElementById("french_nameedit").value = objArr[5];
			document.getElementById("spanish_nameedit").value = objArr[6];
			document.getElementById("author_nameedit").value = objArr[7];
			document.getElementById("familyedit").value = objArr[8];
			document.getElementById("bio_orderedit").value = objArr[9];
			document.getElementById("stats_dataedit").value = objArr[10];
			
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
	        Fish Maste Data
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Fish Master Data</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Fish Master Data List</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Desc</th>
									<th style="width:50px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>
										{{$item -> idltfish}}
									</td>
									<td>
										Is Caap : {{$item -> isscaap}}<br/>
										Taxo Code: {{$item -> taxocode}}<br/>
										Three A Code : {{$item -> threea_code}}<br/>
										Scientific Name : {{$item -> scientific_name}}<br/>
										English Name : {{$item -> english_name}}<br/>
										French Name : {{$item -> french_name}}<br/>
										Spanish Name : {{$item -> spanish_name}}<br/>
										Author : {{$item -> author}}<br/>
										Family : {{$item -> family}}<br/>
										Bio Order : {{$item -> bio_order}}<br/>
										Stats Data : {{$item -> stats_data}}<br/>
									</td>
									<td>	
										<button type="button" class="btn btn-box-tool" title="Edit"
											data-toggle="modal" data-target="#myModalEdit" 
											onclick="injectContentEdit('content{{$item -> idltfish}}');">
											<i class="fa fa-pencil-square-o"></i>
										</button>

										<a class="btn btn-box-tool" title="Delete"
											href="javascript://"
											onclick="confirmCallURL('{{URL::to('/fish/master/del/'.$item -> idltfish) }}');">
											<i class="fa fa-eraser"></i>
										</a>

										<span id="content{{$item -> idltfish}}" style="display:none;">{{$item -> isscaap}}~{{$item -> taxocode}}~{{$item -> threea_code}}~{{$item -> scientific_name}}~{{$item -> english_name}}~{{$item -> french_name}}~{{$item -> spanish_name}}~{{$item -> author}}~{{$item -> family}}~{{$item -> bio_order}}~{{$item -> stats_data}}</span>

										<span id="content{{$item -> idltfish}}" style="display:none;">{{$item->idltfish}}</span>
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
					
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/fish/master/regis')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="iscaap">is caap</label>
								<input id="iscaap" type="text" name="iscaap" class="form-control" required autofocus>
							</div>

							<div class="form-group">
								<label for="taxocode">Taxocode</label>
								<input id="taxocode" type="text" name="taxocode" class="form-control" maxlength="13">
							</div>

							<div class="form-group">
								<label for="threea_code">Three A Code</label>
								<input id="threea_code" type="text" name="threea_code" class="form-control" maxlength="3">
							</div>

							<div class="form-group">
								<label for="scientific_name">Scientific Name</label>
								<input id="scientific_name" type="text" name="scientific_name" class="form-control" maxlength="38">
							</div>

							<div class="form-group">
								<label for="english_name">English Name</label>
								<input id="english_name" type="text" name="english_name" class="form-control" maxlength="30">
							</div>

							<div class="form-group">
								<label for="french_name">French Name</label>
								<input id="french_name" type="text" name="french_name" class="form-control" maxlength="38">
							</div>

							<div class="form-group">
								<label for="spanish_name">Spanish Name</label>
								<input id="spanish_name" type="text" name="spanish_name" class="form-control" maxlength="38">
							</div>

							<div class="form-group">
								<label for="author_name">Author Name</label>
								<input id="author_name" type="text" name="author_name" class="form-control" maxlength="55">
							</div>

							<div class="form-group">
								<label for="family">Family</label>
								<input id="family" type="text" name="family" class="form-control" maxlength="20">
							</div>

							<div class="form-group">
								<label for="bio_order">Bio Order</label>
								<input id="bio_order" type="text" name="bio_order" class="form-control" maxlength="30">
							</div>

							<div class="form-group">
								<label for="stats_data">Stats Data</label>
								<input id="stats_data" type="text" name="stats_data" class="form-control">
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

					<form method="post" enctype="multipart/form-data" action="{{URL::to('/fish/master/edit')}}">
						<input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
						<input name="objIDEdit" id="objIDEdit" type="hidden" />
						
						<div class="box-body">
							<div class="form-group">
								<label for="iscaap">is caap</label>
								<input id="iscaapedit" type="text" name="iscaapedit" class="form-control" required autofocus>
							</div>

							<div class="form-group">
								<label for="taxocode">Taxocode</label>
								<input id="taxocodeedit" type="text" name="taxocodeedit" class="form-control" maxlength="13">
							</div>

							<div class="form-group">
								<label for="threea_code">Three A Code</label>
								<input id="threea_codeedit" type="text" name="threea_codeedit" class="form-control" maxlength="3">
							</div>

							<div class="form-group">
								<label for="scientific_name">Scientific Name</label>
								<input id="scientific_nameedit" type="text" name="scientific_nameedit" class="form-control" maxlength="38">
							</div>

							<div class="form-group">
								<label for="english_name">English Name</label>
								<input id="english_nameedit" type="text" name="english_nameedit" class="form-control" maxlength="30">
							</div>

							<div class="form-group">
								<label for="french_name">French Name</label>
								<input id="french_nameedit" type="text" name="french_nameedit" class="form-control" maxlength="38">
							</div>

							<div class="form-group">
								<label for="spanish_name">Spanish Name</label>
								<input id="spanish_nameedit" type="text" name="spanish_nameedit" class="form-control" maxlength="38">
							</div>

							<div class="form-group">
								<label for="author_name">Author Name</label>
								<input id="author_nameedit" type="text" name="author_nameedit" class="form-control" maxlength="55">
							</div>

							<div class="form-group">
								<label for="family">Family</label>
								<input id="familyedit" type="text" name="familyedit" class="form-control" maxlength="20">
							</div>

							<div class="form-group">
								<label for="bio_order">Bio Order</label>
								<input id="bio_orderedit" type="text" name="bio_orderedit" class="form-control" maxlength="30">
							</div>

							<div class="form-group">
								<label for="stats_data">Stats Data</label>
								<input id="stats_dataedit" type="text" name="stats_dataedit" class="form-control">
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
