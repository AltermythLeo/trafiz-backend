@extends('layouts.admin')
@section('style')
	
	<link rel="stylesheet" href="{{URL::to('/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('script')
	<script src="{{URL::to('js/bootbox.min.js')}}"></script>
	
	<script src="{{URL::to('/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script>
	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
	        Supplier Edit
	        <small>Management System</small>
	    </h1>
	        <label style="color:red;">{{$err}}</label>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Supplier Edit</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<form method="post" enctype="multipart/form-data" action="{{URL::to('/supplier/edit')}}">
							<input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
							<input name="objIDEdit" id="objIDEdit" type="hidden" value="{{$data->id}}" />
							
							<div class="box-body">
								<div class="form-group">
									<label for="inputNama">Nama *</label>
									<input id="nameedit" type="text" class="form-control" name="nameedit"
										value="{{$data->name}}" required autofocus>
								</div>
								<div class="form-group">
									<label for="inputUserName">Username *</label>
									<div>{{$data->username}}</div>
									<input id="usernameedit" type="hidden" name="usernameedit"
									value="{{$data->username}}">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address *</label>
									<div>{{$data->email}}</div>
									<input id="emailedit" type="hidden" name="emailedit"
									value="{{$data->email}}" required>
								</div>
								<div class="form-group">
									<label for="inputphonenumberedit">Phone Number *</label>
									<div>{{$data->phonenumber}}</div>
									<input id="phonenumberedit" type="hidden" name="phonenumberedit"
									value="{{$data->phonenumber}}" required>
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">Supplier ID</label>
									<input id="supidedit" type="text" class="form-control" name="supidedit"
									value="{{$data->supplierid}}">
								</div>

								<div class="form-group">
									<label for="exampleInputPassword1">Change Password</label> Leave blank if not change
									<input id="passwordedit" type="text" class="form-control" name="passwordedit">
								</div>

								<div class="form-group">
									<label for="exampleInputType1">Nationality</label><br/>
									<select name="natidtypeedit" id="natidtypeedit" style="width:100%;">
										<option value="ID"{{strtolower($data->suppliernatid) == 'id' ? 'selected="selected"' : ""}}>Indonesia</option>
										<option value="SG"{{strtolower($data->suppliernatid) == 'sg' ? 'selected="selected"' : ""}}>Singapore</option>
									</select>
								</div>

								<div class="form-group">
									<label for="exampleInputType1">Default Language</label><br/>
									<select name="langedit" id="langedit" style="width:100%;">
										<option value="EN" {{strtolower($data->defaultlanguage) == 'en' ? 'selected="selected"' : ""}}>English</option>
		                                <option value="ID" {{strtolower($data->defaultlanguage) == 'id' ? 'selected="selected"' : ""}}>Bahasa Indonesia</option>
									</select>
								</div>

								<div class="form-group">
									<label for="exampleInputType1">Genre</label><br/>
									<select name="genreedit" style="width:100%;">
										<option value="0" {{$data->genre == 0 ? 'selected="selected"' : ""}}>Wanita</option>
										<option value="1" {{$data->genre == 1 ? 'selected="selected"' : ""}}>Pria</option>
									</select>
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">Address</label>
									<textarea id="addressedit" name="addressedit" rows="4" class="form-control">{{$data->address}}</textarea>
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">City</label>
									<input id="cityedit" type="text" class="form-control" name="cityedit"
									value="{{$data->city}}">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">District</label>
									<input id="districtedit" type="text" class="form-control" name="districtedit"
									value="{{$data->district}}">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Province</label>
									<input id="provinceedit" type="text" class="form-control" name="provinceedit"
									value="{{$data->province}}">
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">Business License</label>
									<input id="businesslicenseedit" type="text" class="form-control" name="businesslicenseedit"
									value="{{$data->businesslicense}}">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">National Code</label>
									<input id="natcodeedit" type="text" class="form-control" name="natcodeedit"
									value="{{$data->suppliernatcode}}">
								</div>

								<div class="form-group">
									<input type="checkbox" name="activeedit" id="activeedit"
									{{$data->activename == 'Yes' ? 'checked="checked"' : ""}}> Active
								</div>
							</div>						

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	

@endsection