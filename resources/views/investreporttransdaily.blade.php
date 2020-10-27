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
			$('#example1').DataTable({
				"order": [[ 0, "desc" ]]
			});
			$('#example2').DataTable();
		})

		$(document).ready(function(){
			changeMonthDate({{$m1}},false);
			changeMonthDate({{$m2}},true);

			selectItemByValue(document.getElementById("ddldate1"), {{$d1}});
			selectItemByValue(document.getElementById("ddlmonth1"), {{$m1}});
			selectItemByValue(document.getElementById("ddlyear1"), {{$y1}});
			selectItemByValue(document.getElementById("ddldate2"), {{$d2}});
			selectItemByValue(document.getElementById("ddlmonth2"), {{$m2}});
			selectItemByValue(document.getElementById("ddlyear2"), {{$y2}});

			if( '{{$city}}' != '-1' ) {
				document.getElementById("ddlcity").value = '{{$city}}';
			}

			var catFilter = "{{$catFilter}}";
			var catFilterArr = [];
			if(catFilter != "-1") {
				catFilterArr = catFilter.split(',');
			} else {
				document.getElementById("catcball").checked = true;
			}

			var dataCategory = @json($dataCategory);
			for(var i=0;i<dataCategory.length;i++) {
				var id = "catcb"+i;
				var check = dataCategory[i].category;
				if(catFilter == "-1") {
					document.getElementById(id).checked = true;
				} else {
					document.getElementById(id).checked = (catFilterArr.indexOf(check) > -1);
				}
			}

			if({{$authlv}} == -1)
				selectItemByValue(document.getElementById("ddlsupplier"), "{{$id}}");

		});

		function selectItemByValue(elmnt, value){
			//console.log(elmnt);
			for(var i=0; i < elmnt.options.length; i++)
			{
				if(elmnt.options[i].value == value)
					elmnt.selectedIndex = i;
			}
		}

		function changemonthyear()
		{
			var id = "";
			if({{$authlv}} == -1)
				id = document.getElementById("ddlsupplier").value;
			else
				id = "{{$id}}";

			var newurl = window.location.pathname +
						"?id=" + id + 
						"&d1=" + document.getElementById("ddldate1").value + 
						"&m1=" + document.getElementById("ddlmonth1").value + 
						"&y1=" + document.getElementById("ddlyear1").value +
						"&d2=" + document.getElementById("ddldate2").value + 
						"&m2=" + document.getElementById("ddlmonth2").value + 
						"&y2=" + document.getElementById("ddlyear2").value;

			if(document.getElementById("ddlcity") && document.getElementById("ddlcity").value) {
				newurl = newurl + "&city=" + document.getElementById("ddlcity").value;
			}

			var catfilter =  getCatFilter();
			if(catfilter) {
				catfilter = encodeURIComponent(catfilter);
				newurl = newurl + "&catfilter=" + catfilter;
			}

			location.replace(newurl);
		}

		function getCatFilter() {
			var dataCategory = @json($dataCategory);
			var catfilter = [];
			for(var i=0;i<dataCategory.length;i++) {
				var id = "catcb"+i;
				if(document.getElementById(id).checked) {
					var val = document.getElementById(id).value;
					catfilter.push(val);
				}
			}

			if(!document.getElementById('catcball').checked) {
				catfilter = catfilter.join(',');
				return catfilter;
			}
			return false;
		}

		function changesupplier(sup)
		{
			document.getElementById("hiduser").value = sup;
		}

		function changeDayDate(day,two)
		{
			if(two) {
				document.getElementById("hiddate2").value = day;
			} else {
				document.getElementById("hiddate1").value = day;
			}
		}

		function checkAllCategory(ele) {
			var checked = (ele.checked);
			var dataCategory = @json($dataCategory);
			for(var i=0;i<dataCategory.length;i++) {
				var id = "catcb"+i;
				document.getElementById(id).checked = checked;
			}

			$('#categorylist').collapse('toggle');
		}

		function uncheckAllCategory(ele) {
			var checked = (ele.checked);
			if(!checked) document.getElementById("catcball").checked = false;
		}

		function changeMonthDate(month,two)
		{
			var hidmonth = "hidmonth1";
			var ddldate = "ddldate1";
			if(two) {
				hidmonth = "hidmonth2";
				ddldate = "ddldate2";
			}
			document.getElementById(hidmonth).value = month;
			var getDaysInMonth = new Date({{$y1}}, month, 0).getDate();

			var x = document.getElementById(ddldate);
			for(i = x.options.length - 1 ; i >= 0 ; i--)
			{
				x.remove(i);
			}
			var option = document.createElement("option");
			option.text = "All";
			option.value = "-1"
			x.add(option);

			for(var i=1;i<=getDaysInMonth;i++)
			{
				var option = document.createElement("option");
				option.text = i;
				option.value = i;
				x.add(option);
			}
		}

		function changeYearDate(year,two)
		{
			if(two) {
				document.getElementById("hidyear2").value = year;
			} else {
				document.getElementById("hidyear1").value = year;
			}
		}

		function exportToCSV()
		{
			var iduser = document.getElementById("hiduser").value;
			var fdate1 = document.getElementById("hiddate1").value;
			var fmonth1 = document.getElementById("hidmonth1").value;
			var fyear1 = document.getElementById("hidyear1").value;
			var fdate2 = document.getElementById("hiddate2").value;
			var fmonth2 = document.getElementById("hidmonth2").value;
			var fyear2 = document.getElementById("hidyear2").value;
			var url = "{{URL::to('/investreport/csv')}}";
			var params = { 
				_token:"{{ csrf_token() }}",
				uid:iduser,
				d1:fdate1,
				m1:fmonth1,
				y1:fyear1,
				d2:fdate2,
				m2:fmonth2,
				y2:fyear2
			};

			var catfilter = getCatFilter();
			if(catfilter) {
				params.catfilter = catfilter;
			}

			var city = document.getElementById('hidcity').value;
			params.city = city;

			var extendeddata = document.getElementById('extendeddata').checked;
			if(extendeddata) params.extendeddata=extendeddata;
			console.log(params);

			$.getJSON(url,params,function(data) {
				var arr = data.data.slice();
				//console.log(data.data);
				downloadCSV('investreport.csv',arr);
			});
		}
    
    // https://halistechnology.com/2015/05/28/use-javascript-to-export-your-data-as-csv/
    function convertArrayOfObjectsToCSV(args) {
      var result, ctr, keys, columnDelimiter, lineDelimiter, data;

      data = args.data || null;
      if (data == null || !data.length) {
        return null;
      }

      columnDelimiter = args.columnDelimiter || ';';
      lineDelimiter = args.lineDelimiter || '\n';

      keys = Object.keys(data[0]);

      result = '';
      result += keys.join(columnDelimiter);
      result += lineDelimiter;

      data.forEach(function(item) {
        ctr = 0;
        keys.forEach(function(key) {
          if (ctr > 0) result += columnDelimiter;
          var add = item[key] ? item[key] : '';
          if( item[key] === 0 ) add = '0';
          result += add;
          ctr++;
        });
        result += lineDelimiter;
      });

      return result;
    }

    function downloadCSV(fn,arr) {
      var data, filename, link;

      var csv = convertArrayOfObjectsToCSV({
        data: arr
      });
      if (csv == null) return;

      filename = fn;

      if (!csv.match(/^data:text\/csv/i)) {
        csv = 'data:text/csv;charset=utf-8,' + csv;
      }
      data = encodeURI(csv);

      link = document.createElement('a');
      link.setAttribute('href', data);
      link.setAttribute('download', filename);
      link.click();
    }

	</script>
@endsection

@section('content')
	<section class="content-header">
	    <h1>
			{{$title}}
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">{{$title}}</li>
	    </ol>
	</section>

	<section class="content">
		
		<div class="row">
			<div class="col-md-12">
				<form class="form">
					@if($authlv == -1)
					<div class="form-group">
						<label>Name</label>
						<select class="form-control" id="ddlsupplier" name="ddlsupplier" onchange="changesupplier(value);">
							<option value="-1">All</option>
							@foreach ($dataSupplier as $item)
								<option value="{{$item -> idmsuser}}">
									{{$item->name}}
								</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" id="ddlcity" placeholder="Enter city filter">
					</div>
					@endif
					<div class="form-group">
						<label>Category</label>
						<div class="row">
							<div class="col-md-12">
								<div class="checkbox">
									<label ><input type="checkbox" id="catcball" value="-1" onchange="checkAllCategory(this)">All</label>
								</div>
							</div>
							<div id="categorylist" class="collapse">
								@foreach ($dataCategory as $item)
								<div class="col-md-3">
									<div class="checkbox">
										<label><input type="checkbox" id="catcb{{$loop->index}}" value="{{$item->category}}" onchange="uncheckAllCategory(this)" >{{$item->category}}</label>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Period</label>
						<div class="form-inline">
						<select class="form-control" id="ddlmonth1" onchange="changeMonthDate(value,false);">
							<option value="-1">All</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select class="form-control" id="ddldate1" onchange="changeDayDate(value,false);">
							<option value="-1">All</option>
						</select>
						<select class="form-control" id="ddlyear1" onchange="changeYearDate(value,false);">
							<option value="{{$yearNow-2}}">{{$yearNow-2}}</option>
							<option value="{{$yearNow-1}}">{{$yearNow-1}}</option>
							<option value="{{$yearNow}}">{{$yearNow}}</option>
						</select>
						&nbsp;-&nbsp;
						<select class="form-control" id="ddlmonth2" onchange="changeMonthDate(value,true);">
							<option value="-1">All</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select class="form-control" id="ddldate2" onchange="changeDayDate(value,true);">
							<option value="-1">All</option>
						</select>
						<select class="form-control" id="ddlyear2" onchange="changeYearDate(value,true);">
							<option value="{{$yearNow-2}}">{{$yearNow-2}}</option>
							<option value="{{$yearNow-1}}">{{$yearNow-1}}</option>
							<option value="{{$yearNow}}">{{$yearNow}}</option>
						</select>
						</div>
					</div>
					
					<div class="form-group">
						<button type="button" class="btn btn-default" onclick="changemonthyear()">Submit</button>
					</div>

				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<form class="form" method="POST" enctype="multipart/form-data" action="{{URL::to('/fishcatch/report/print')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="download" value="pdf">
					<input type="hidden" name="date" id="hiddate1" value="{{$d1}}">
					<input type="hidden" name="month" id="hidmonth1" value="{{$m1}}">
					<input type="hidden" name="year" id="hidyear1" value="{{$y1}}">
					<input type="hidden" name="date" id="hiddate2" value="{{$d2}}">
					<input type="hidden" name="month" id="hidmonth2" value="{{$m2}}">
					<input type="hidden" name="year" id="hidyear2" value="{{$y2}}">
					<input type="hidden" name="year" id="hidcity" value="{{$city}}">
					<input type="hidden" name="sid" id="hiduser" value="{{$id}}">
					
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Transaction List</h3>
					</div>
					
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width:100px;">Date</th>
									<th style="width:150px;">Name</th>
									<th style="width:100px;">City</th>
									<th style="width:100px;">Category</th>
									<th style="width:100px;">Income</th>
									<th style="width:100px;">Expense</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>{{date_format(date_create($item -> date),"Y-m-d")}}</td>
									<td>{{$item -> name}}</td>
									<td>{{$item -> city}}</td>
									<td>{{$item -> category}}</td>
									<td class="text-right">{{number_format($item -> income,0,",",".")}}</td>
									<td class="text-right">{{number_format($item -> expense,0,",",".")}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
		  		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Summary</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-4">Total Income</div>
							<div class="col-md-8 text-right">{{number_format($totalincome,0,",",".")}}</div>
						</div>
						<div class="row">
							<div class="col-md-4">Total Expense</div>
							<div class="col-md-8 text-right">{{number_format($totalexpense,0,",",".")}}</div>
						</div>
						<div class="row">
							<div class="col-md-4">Profit/Loss</div>
							<div class="col-md-8 text-right">{{number_format($pl,0,",",".")}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form class="form-inline">
					
					
						<button type="button" class="btn btn-primary" onclick="exportToCSV()">Export To CSV</button>
					

					<div class="checkbox">
						<label ><input type="checkbox" id="extendeddata" checked>Extended export data</label>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection
