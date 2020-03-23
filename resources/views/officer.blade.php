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
			//console.log(objid);
			console.log(objArr);

			document.getElementById("inputForm").style.display = "none";
			document.getElementById("editForm").style.display = "";

			
			document.getElementById("objIDEdit").value = objid.substring(7);
			document.getElementById("nameedit").value = objArr[0];
			document.getElementById("usernameedit").value = objArr[1];
			document.getElementById("emailedit").value = objArr[2];
			document.getElementById("phonenumberedit").value = objArr[3];
			
			document.getElementById("activeedit").checked = objArr[5] == "0" ? false : true;

			var e = document.getElementById("admintypeedit");
			selectItemByValue(e, objArr[4]);
			
			var f = document.getElementById("langedit");
			selectItemByValue(f, objArr[6]);

			window.scrollTo(0, 0);
		}

		function cancelEdit()
		{
			document.getElementById("inputForm").style.display = "";
			document.getElementById("editForm").style.display = "none";
		}

		function selectItemByValue(elmnt, value){
			//console.log(elmnt);
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
	        Officer
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	        <label style="color:red;">{{$err}}</label>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Officer</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Officer List</h3>
					</div>
					
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Data</th>
									<th>Create At</th>
									<th>Officer Type</th>
									<th>Active</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>{{$item -> name}} / {{$item -> username}}<br/>
									Email : {{ strpos($item -> email, '@') !== false ? $item -> email : "" }} <br/>
										Phone Number : {{$item -> phonenumber}}</td>
									<td>{{date('Y-m-d H:i',strtotime('+7 hour',strtotime($item->created_at)))}}</td>
									<td>{{$item -> usertypename}}</td>
									<td>{{$item -> activename}}</td>
									<td>
										<button type="button" class="btn btn-box-tool" title="Edit"
											data-toggle="modal" data-target="#myModalEdit" 
											onclick="injectContentEdit('content{{$item -> idmsuser}}');">
											<i class="fa fa-pencil-square-o"></i>
										</button>

										<a class="btn btn-box-tool" title="Delete"
											href="javascript://"
											onclick="confirmCallURL('{{URL::to('/officer/del/'.$item -> idmsuser)}}');">
											<i class="fa fa-eraser"></i>
										</a>
										<span id="content{{$item -> idmsuser}}" style="display:none;">{{$item->name}}~{{$item -> username}}~{{ strpos($item -> email, '@') !== false ? $item -> email : "" }}~{{$item -> phonenumber}}~{{$item->idltusertype}}~{{$item->active}}~{{$item->lang}}</span>
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
					
					
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/officer/regis')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">Nama *</label>
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Username *</label>
								<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>							
							<div class="form-group">
								<label for="exampleInputEmail1">Phone Number *</label>
								<input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" required>

                                @if ($errors->has('phonenumber'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password *</label>
								<input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Type</label><br/>
								<select name="admintype" style="width:100%;">
									<option value="-1">Super Admin</option>
									<option value="-2">Editor Admin</option>
									<option value="-3">Admin</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Default Language</label><br/>
								<select name="lang" id="lang" style="width:100%;">
									<option value="en">English</option>
									<option value="id">Bahasa Indonesia</option>
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
					
					
					<form method="post" enctype="multipart/form-data" action="{{URL::to('/officer/edit')}}">
						<input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
						<input name="objIDEdit" id="objIDEdit" type="hidden" />
						
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">Nama *</label>
								<input id="nameedit" type="text" class="form-control{{ $errors->has('nameedit') ? ' is-invalid' : '' }}" name="nameedit" value="{{ old('nameedit') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nameedit') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="inputUserName">Username *</label>
								<input id="usernameedit" type="text" class="form-control{{ $errors->has('usernameedit') ? ' is-invalid' : '' }}" name="usernameedit" value="{{ old('usernameedit') }}" required autofocus>

                                @if ($errors->has('usernameedit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('usernameedit') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input id="emailedit" type="email" class="form-control{{ $errors->has('emailedit') ? ' is-invalid' : '' }}" name="emailedit" value="{{ old('emailedit') }}" required>

                                @if ($errors->has('emailedit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('emailedit') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="inputphonenumberedit">Phone Number *</label>
								<input id="phonenumberedit" type="text" class="form-control{{ $errors->has('phonenumberedit') ? ' is-invalid' : '' }}" name="phonenumberedit" value="{{ old('phonenumberedit') }}" required autofocus>

                                @if ($errors->has('phonenumberedit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phonenumberedit') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Change Password</label> Leave blank if not change
								<input id="passwordedit" type="text" class="form-control" name="passwordedit">
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Type</label><br/>
								<select name="admintypeedit" id="admintypeedit" style="width:100%;">
									<option value="-1">Super Admin</option>
									<option value="-2">Editor Admin</option>
									<option value="-3">Admin</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Default Language</label><br/>
								<select name="langedit" id="langedit" style="width:100%;">
									<option value="en">English</option>
									<option value="id">Bahasa Indonesia</option>
								</select>
							</div>

							<div class="form-group">
								<input type="checkbox" name="activeedit" id="activeedit"> Active
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