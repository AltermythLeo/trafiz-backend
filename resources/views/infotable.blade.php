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
	        Info Table
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Info Table</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Info Table</h3>
					</div>
					<div class="box-body">
						<form method="POST" enctype="multipart/form-data" action="{{URL::to('/info/post')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="supportinfoparam" value="supportinfo">
							<div class="box-body">
								<div class="form-group">
									<label for="inputNama">info desc param</label>
									<textarea id="infodescparam" type="text"
										class="form-control" name="infodescparam" rows="5">{{$data[0]->infodesc}}</textarea>
								</div>
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
							</div>
						</form>
					</div>
		  		</div>
			</div>
		</div>
	</section>
	

@endsection
