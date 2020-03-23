@extends('layouts.admin')
@section('style')
	<link rel="stylesheet" href="{{URL::to('/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('script')
	<script src="{{URL::to('js/bootbox.min.js')}}"></script>
	
	<script src="{{URL::to('/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script>

    var data = {!! json_encode($data, JSON_HEX_TAG) !!};

    $(document).ready(function(){
      console.log(data);
		});

		function changeidfish()
		{
			//console.log(document.getElementById("ddlmonth").value, document.getElementById("ddlyear").value);
			var test = 	window.location.pathname +
						"?idfish=" + document.getElementById("idfish").value;
			location.replace(test);
    }
    
    function callUpline(idfish) {
      var test = 	window.location.pathname +
						"?idfish=" + idfish;
			location.replace(test);
    }

	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
          KDE Data by Fish ID
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">KDE Data by Fish ID</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">KDE Data by Fish ID</h3>
					</div>
					<div class="box-body">
						<input id="idfish" class="form-control" name="idfish" placeholder="Insert id fish Here">
						<input type="button" onClick="changeidfish()" value="Submit" class="form-control btn btn-primary"/>
					</div>
		  		</div>
			</div>
		</div>
    @if (count($data) > 0)
		<div class="row">
			
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">KDE Data Table</h3>
					</div>
					<div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Parameter</th>
									<th>Value</th>
								</tr>
							</thead>
							<tbody>
                <tr><td>Fish ID</td><td>{{$data[0]->idfish}}</td></tr>
                <tr><td>Weight (KG)</td><td>{{$data[0]->amount}}</td></tr>
                <tr><td>Grade</td><td>{{$data[0]->grade}}</td></tr>
                <tr><td>Notes</td><td>{{$data[0]->description}}</td></tr>
                <tr><td>Upline</td><td>
                  @if ($data[0]->upline)
                  <a href="javascript:void(0);" onclick="callUpline('{{$data[0]->upline}}');">
                  {{$data[0]->upline}}
                  </a>
                  @endif
                </td></tr>
                <tr><td>Supplier name</td><td>{{$data[0]->suppliername}}</td></tr>
                <tr><td>Source fisherman name</td><td>{{$data[0]->fishermanname}}</td></tr>
                <tr><td>Source supplier name</td><td>{{$data[0]->buyersuppliername}}</td></tr>
                <tr><td>Vessel name</td><td>{{$data[0]->shipname}}</td></tr>
                <tr><td>Species name (Indonesia)</td><td>{{$data[0]->speciesindname}}</td></tr>
                <tr><td>Species name (English)</td><td>{{$data[0]->speciesengname}}</td></tr>
                <tr><td>Species code (Three A)</td><td>{{$data[0]->threea_code}}</td></tr>
                <tr><td>Purchase Date</td><td>{{$data[0]->purchasedate}}</td></tr>
                <tr><td>Catch or Farmed</td><td>
                @if ($data[0]->catchorfarmed == '1')
                  Wild Catch
                @else
                  Aqua Culture
                @endif
                </td></tr>
                <tr><td>By Catch</td><td>
                @if ($data[0]->bycatch == '1')
                  Yes
                @else
                  No
                @endif
                </td></tr>
                <tr><td>FAD Use</td><td>
                @if ($data[0]->fadused == '1')
                  Yes
                @else
                  No
                @endif
                </td></tr>
                <tr><td>Purchase unique no.</td><td>{{$data[0]->purchaseuniqueno}}</td></tr>
                <tr><td>Product Form At Landing</td><td>
                @if ($data[0]->productformatlanding == '1')
                  Loin
                @else
                  Whole
                @endif
                </td></tr>
                <tr><td>Unit Measurement</td><td>
                @if ($data[0]->unitmeasurement == '1')
                  Individual
                @else
                  Basket
                @endif
                </td></tr>
                <tr><td>Fishing Ground Area</td><td>{{$data[0]->fishinggroundarea}}</td></tr>

                <tr><td>Purchase Location</td><td>{{$data[0]->purchaselocation}}</td></tr>
                <tr><td>Date of Vessel Departure</td><td>{{$data[0]->datetimevesseldeparture}}</td></tr>
                <tr><td>Date of Vessel Return</td><td>{{$data[0]->datetimevesselreturn}}</td></tr>
                <tr><td>Port Name/Landing Site</td><td>{{$data[0]->portname}}</td></tr>

                <tr><td>Fisherman name</td><td>{{$data[0]->fishermanname2}}</td></tr>
                <tr><td>Fisherman ID</td><td>{{$data[0]->fishermanid2}}</td></tr>
                <tr><td>Fisherman reg. number</td><td>{{$data[0]->fishermanregnumber2}}</td></tr>

                <tr><td>Vessel size (GT)</td><td>{{$data[0]->vesselsize_param}}</td></tr>
                <tr><td>Vessel license number</td><td>{{$data[0]->vessellicensenumber_param}}</td></tr>
                <tr><td>Vessel license expired</td><td>{{$data[0]->fishinglicenseexpiredate_param}}</td></tr>
                <tr><td>Vessel flag</td><td>{{$data[0]->vesselflag_param}}</td></tr>
                <tr><td>Vessel gear type (Indonesia)</td><td>{{$data[0]->gearIndo}}</td></tr>
                <tr><td>Vessel gear type (English)</td><td>{{$data[0]->gearEnglish}}</td></tr>
							</tbody>
						</table>


					</div>
		  		</div>
			</div>
		</div>
    @endif
	</section>
@endsection
