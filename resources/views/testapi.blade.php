@extends('layouts.admin')
@section('style')
@endsection

@section('script')

@endsection

@section('content')
	<section class="content-header">
	    <h1> 
	        Test API
	        <small>Management System</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Test API</li>
	    </ol>
	</section>


	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">upload file</h3>
					</div>

					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/img/upload')}}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">identity</label>
								<input type="file" name="photoparam" id="photoparam">
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">test api sync post</h3>
					</div>

					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/syncdatav2')}}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">Sender</label>
								<input type="text" id="senderParam" name="senderParam" required/><br/>
								<label for="inputNama">API JSON</label>
								<textarea id="jsonParam" type="" name="jsonParam" required></textarea>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">loginsupplier</h3>
					</div>

					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/sup/login')}}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">identity</label>
								<input id="identity" type="text" name="identity" required>
							</div>
							<div class="form-group">
								<label for="inputNama">password</label>
								<input id="password" type="text" name="password" required>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- fisherman -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">addnewfisherman</h3>
					</div>
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/fisherman/add')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">nameparam</label>
								<input id="nameparam" type="text" name="nameparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">bodparam</label>
								<input id="bodparam" type="text" name="bodparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">photoparam</label>
								<input id="photoparam" type="text" name="photoparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">fishermannatidparam</label>
								<input id="fishermannatidparam" type="text" name="fishermannatidparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">groupfishingparam</label>
								<input id="groupfishingparam" type="text" name="groupfishingparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">positioninshipparam</label>
								<input id="positioninshipparam" type="text" name="positioninshipparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">idmssupplierparam</label>
								<input id="idmssupplierparam" type="text" name="idmssupplierparam" required>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">updatefisherman</h3>
					</div>
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/fisherman/edit')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">idmsuserparam</label>
								<input id="idmsuserparam" type="text" name="idmsuserparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">nameparam</label>
								<input id="nameparam" type="text" name="nameparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">bodparam</label>
								<input id="bodparam" type="text" name="bodparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">photoparam</label>
								<input id="photoparam" type="text" name="photoparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">fishermannatidparam</label>
								<input id="fishermannatidparam" type="text" name="fishermannatidparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">groupfishingparam</label>
								<input id="groupfishingparam" type="text" name="groupfishingparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">positioninshipparam</label>
								<input id="positioninshipparam" type="text" name="positioninshipparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">idmssupplierparam</label>
								<input id="idmssupplierparam" type="text" name="idmssupplierparam" required>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">deletefisherman</h3>
					</div>
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/fisherman/del')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">idmsuserparam</label>
								<input id="idmsuserparam" type="text" name="idmsuserparam" required>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- ship -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">addnewship</h3>
					</div>
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/ship/add')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">shipnameparam</label>
								<input id="shipnameparam" type="text" name="shipnameparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">catchmethodparam</label>
								<input id="catchmethodparam" type="text" name="catchmethodparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">gtparam</label>
								<input id="gtparam" type="text" name="gtparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">shipnatidparam</label>
								<input id="shipnatidparam" type="text" name="shipnatidparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">flagparam</label>
								<input id="flagparam" type="text" name="flagparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">uviparam</label>
								<input id="uviparam" type="text" name="uviparam" required>
							</div>
							<div class="form-group">
								<label for="inputNama">idmsuserparam</label>
								<input id="idmsuserparam" type="text" name="idmsuserparam" required>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">addnewfish</h3>
					</div>
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/fish/add')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">idltfish</label>
								<input id="idltfish" type="text" name="idltfish" required>
							</div>
							<div class="form-group">
								<label for="inputNama">indname</label>
								<input id="indname" type="text" name="indname" required>
							</div>
							<div class="form-group">
								<label for="inputNama">photo</label>
								<input type="file" name="photoparam" id="photoparam">
							</div>
							<div class="form-group">
								<label for="inputNama">localname</label>
								<input id="localname" type="text" name="localname" required>
							</div>
							<div class="form-group">
								<label for="inputNama">idmssupplier</label>
								<input id="idmssupplier" type="text" name="idmssupplier" required>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">regis supplier</h3>
					</div>
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/sup/regis')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">name</label>
								<input id="name" type="text" name="name" required>
							</div>
							<div class="form-group">
								<label for="inputNama">username</label>
								<input id="username" type="text" name="username">
							</div>
							<div class="form-group">
								<label for="inputNama">email</label>
								<input id="email" type="text" name="email">
							</div>
							<div class="form-group">
								<label for="inputNama">phonenumber</label>
								<input id="phonenumber" type="text" name="phonenumber" required>
							</div>
							<div class="form-group">
								<label for="inputNama">supplierid</label>
								<input id="supplierid" type="text" name="supplierid">
							</div>
							<div class="form-group">
								<label for="inputNama">password</label>
								<input id="password" type="text" name="password" required>
							</div>
							<div class="form-group">
								<label for="inputNama">natidtype</label>
								<input id="natidtype" type="text" name="natidtype">
							</div>
							<div class="form-group">
								<label for="inputNama">lang</label>
								<input id="lang" type="text" name="lang">
							</div>
							<div class="form-group">
								<label for="inputNama">genre</label>
								<input id="genre" type="text" name="genre">
							</div>
							<div class="form-group">
								<label for="inputNama">address</label>
								<input id="address" type="text" name="address">
							</div>
							<div class="form-group">
								<label for="inputNama">city</label>
								<input id="city" type="text" name="city">
							</div>
							<div class="form-group">
								<label for="inputNama">district</label>
								<input id="district" type="text" name="district">
							</div>
							<div class="form-group">
								<label for="inputNama">province</label>
								<input id="province" type="text" name="province">
							</div>
							<div class="form-group">
								<label for="inputNama">businesslicense</label>
								<input id="businesslicense" type="text" name="businesslicense">
							</div>
							<div class="form-group">
								<label for="inputNama">natidcode</label>
								<input id="natidcode" type="text" name="natidcode">
							</div>

						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" id="inputForm">
					<div class="box-header with-border">
						<h3 class="box-title">resetpassword</h3>
					</div>
					<form method="POST" enctype="multipart/form-data" action="{{URL::to('/_api/sup/resetpass')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="box-body">
							<div class="form-group">
								<label for="inputNama">ID</label>
								<input id="id" type="text" name="id" required>
							</div>
							<div class="form-group">
								<label for="inputNama">oldpassword</label>
								<input id="oldpassword" type="text" name="oldpassword">
							</div>
							<div class="form-group">
								<label for="inputNama">newpassword</label>
								<input id="newpassword" type="text" name="newpassword">
							</div>
							<div class="form-group">
								<label for="inputNama">retypenewpassword</label>
								<input id="retypenewpassword" type="text" name="retypenewpassword" required>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</section>
	

@endsection