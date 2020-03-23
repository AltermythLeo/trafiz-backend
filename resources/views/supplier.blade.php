@extends('layouts.admin')
@section('style')
	<link rel="stylesheet" href="{{URL::to('/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::to('/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('script')
	<script src="{{URL::to('/js/bootbox.min.js')}}"></script>
	<script src="{{URL::to('/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>	
	<script src="{{URL::to('/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script>
		$(function () {
			$('#example1').DataTable();
			$('#supidexpireddate').datepicker({
				autoclose: true
			})
			$('#supidexpireddateedit').datepicker({
				autoclose: true
			})
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
			//console.log(objArr);

			document.getElementById("inputForm").style.display = "none";
			document.getElementById("editForm").style.display = "";

			
			document.getElementById("objIDEdit").value = objid.substring(7);
			document.getElementById("nameedit").value = objArr[0];
			document.getElementById("usernameedit").value = objArr[1];
			document.getElementById("emailedit").value = objArr[2];
			document.getElementById("phonenumberedit").value = objArr[3];
			
			document.getElementById("activeedit").checked = objArr[5] == "0" ? false : true;
			/*
			var e = document.getElementById("admintypeedit");
			console.log("4")
			selectItemByValue(e, objArr[4]);*/

			var f = document.getElementById("natidtypeedit");
			selectItemByValue(f, objArr[6]);

			var g = document.getElementById("langedit");
			selectItemByValue(g, objArr[7]);

			document.getElementById("supidedit").value = objArr[8];

			var h = document.getElementById("genreedit");
			selectItemByValue(h, objArr[9]);
			
			document.getElementById("addressedit").value = objArr[10];
			document.getElementById("businesslicenseedit").value = objArr[11];
			document.getElementById("natcodeedit").value = objArr[12];
			document.getElementById("provinceedit").value = objArr[13];
			document.getElementById("cityedit").value = objArr[14];
			document.getElementById("districtedit").value = objArr[15];
			//document.getElementById("natcodeedit").value = objArr[16];

			var d = new Date(objArr[16].trim());
			//$('input[name="supidexpireddateedit"]').val(d.toLocaleDateString());
			$('input[name="supidexpireddateedit"]').datepicker('update', d);
			
			window.scrollTo(0, 0);
		}

		function cancelEdit()
		{
			document.getElementById("inputForm").style.display = "";
			document.getElementById("editForm").style.display = "none";
		}

		function selectItemByValue(elmnt, value){
			//console.log(elmnt, value);
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
	        Supplier
	        <small>Management System</small>
	    </h1>
	        <label style="color:red;">{{$err}}</label>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Supplier</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Supplier List</h3>
					</div>
					
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Data</th>
									<th>Create At</th>
									<th>Active</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>
										<img src="{{URL::to('/img/flag/'. strtolower($item->suppliernatid).'.png')}}" class="user-image" alt="User Image">&nbsp;
										{{$item -> name}} / {{$item -> username}}<br/>
										Genre : {{$item->genre}}<br/>
										Email : {{ strpos($item -> email, '@') !== false ? $item -> email : "" }} <br/>
										Phone Number : {{$item -> phonenumber}}<br/>
										Supplier ID : {{$item -> supplierid}}<br/>
										Expired Date : {{$item->supplieridexpiredlicensedate}}<br/>
										Address : 
										{{$item->address}}{{$item->address == "" ? $item->city : ", " . $item->city}}{{$item->city == "" ? $item->district : ", " . $item->district}}{{$item->district == "" ? $item->province : ", " . $item->province}}
										<br/>
										Business License: {{$item->businesslicense}}<br/>
										Business License Expired Date: {{$item->supplieridexpiredlicensedate}}<br/>

										KTP : {{$item->personalidcard}}<br/>
									</td>
									<td>{{date('Y-m-d H:i',strtotime('+7 hour',strtotime($item->created_at)))}}</td>
									<td>{{$item -> activename}}</td>
									<td>
										<button type="button" class="btn btn-box-tool" title="Edit"
											data-toggle="modal" data-target="#myModalEdit" 
											onclick="injectContentEdit('content{{$item -> id}}');">
											<i class="fa fa-pencil-square-o"></i>
										</button>

										<a class="btn btn-box-tool" title="Delete"
											href="javascript://"
											onclick="confirmCallURL('{{URL::to('/supplier/del/'.$item -> id)}}');">
											<i class="fa fa-eraser"></i>
										</a>
										<span id="content{{$item -> id}}" style="display:none;">{{$item->name}}~{{$item -> username}}~{{ strpos($item -> email, '@') !== false ? $item -> email : "" }}~{{$item -> phonenumber}}~{{$item->idltusertype}}~{{$item->active}}~{{$item->suppliernatid}}~{{$item->lang}}~{{$item->supplierid}}~{{$item->genre}}~{{$item->address}}~{{$item->businesslicense}}~{{$item->personalidcard}}~{{$item->province}}~{{$item->city}}~{{$item->district}}~{{$item->supplieridexpiredlicensedate}}
										</span>
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
					
					
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/supplier/regis')}}">
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
								<label for="exampleInputEmail1">Supplier ID</label>
								<input id="supid" type="text" class="form-control{{ $errors->has('supid') ? ' is-invalid' : '' }}" name="supid" value="{{ old('supid') }}">

                                @if ($errors->has('supid'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('supid') }}</strong>
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
								<label for="exampleInputType1">Nationality</label><br/>
								<select name="natidtype" style="width:100%;">
									<option value="ID">Indonesia</option>
									<option value="SG">Singapore</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Default Language</label><br/>
								<select name="lang" id="lang" style="width:100%;">
									<option value="EN">English</option>
                                    <option value="ID">Bahasa Indonesia</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Genre</label><br/>
								<select name="genre" style="width:100%;">
									<option value="0">Wanita</option>
									<option value="1">Pria</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Address</label><br/>
								<textarea id="address" name="address" rows="4" class="form-control"></textarea>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">City</label>
								<input id="city" type="text" class="form-control" name="city">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">District</label>
								<input id="district" type="text" class="form-control" name="district">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Province</label>
								<input id="province" type="text" class="form-control" name="province">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Business License</label>
								<input id="businesslicense" type="text" class="form-control" name="businesslicense">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">National Code</label>
								<input id="natcode" type="text" class="form-control" name="natcode">
							</div>

							<div class="form-group">
								<label>Expired Licensed Date :</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="supidexpireddate" name="supidexpireddate">
								</div>
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
					
					
					<form method="post" enctype="multipart/form-data" action="{{URL::to('/supplier/edit')}}">
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
								<input id="usernameedit" type="hidden" class="form-control{{ $errors->has('usernameedit') ? ' is-invalid' : '' }}" name="usernameedit" value="{{ old('usernameedit') }}" required>

                                @if ($errors->has('usernameedit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('usernameedit') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address *</label>
								<input id="emailedit" type="email" class="form-control{{ $errors->has('emailedit') ? ' is-invalid' : '' }}" name="emailedit" value="{{ old('emailedit') }}" required>

                                @if ($errors->has('emailedit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('emailedit') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="inputphonenumberedit">Phone Number *</label>
								<input id="phonenumberedit" type="text" class="form-control{{ $errors->has('phonenumberedit') ? ' is-invalid' : '' }}" name="phonenumberedit" value="{{ old('phonenumberedit') }}" required>

                                @if ($errors->has('phonenumberedit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phonenumberedit') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Supplier ID</label>
								<input id="supidedit" type="text" class="form-control{{ $errors->has('supidedit') ? ' is-invalid' : '' }}" name="supidedit" value="{{ old('supidedit') }}">

                                @if ($errors->has('supidedit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('supidedit') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Change Password</label> Leave blank if not change
								<input id="passwordedit" type="text" class="form-control" name="passwordedit">
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Nationality</label><br/>
								<select name="natidtypeedit" id="natidtypeedit" style="width:100%;">
									<option value="ID">Indonesia</option>
									<option value="SG">Singapore</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Default Language</label><br/>
								<select name="langedit" id="langedit" style="width:100%;">
									<option value="EN">English</option>
                                    <option value="ID">Bahasa Indonesia</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputType1">Genre</label><br/>
								<select name="genreedit" id="genreedit" style="width:100%;">
									<option value="0">Wanita</option>
									<option value="1">Pria</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Address</label>
								<textarea id="addressedit" name="addressedit" rows="4" class="form-control"></textarea>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">City</label>
								<input id="cityedit" type="text" class="form-control" name="cityedit">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">District</label>
								<input id="districtedit" type="text" class="form-control" name="districtedit">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Province</label>
								<input id="provinceedit" type="text" class="form-control" name="provinceedit">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Business License</label>
								<input id="businesslicenseedit" type="text" class="form-control" name="businesslicenseedit">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">National Code</label>
								<input id="natcodeedit" type="text" class="form-control" name="natcodeedit">
							</div>

							<div class="form-group">
								<label>Expired Licensed Date :</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="supidexpireddateedit" name="supidexpireddateedit">
								</div>
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