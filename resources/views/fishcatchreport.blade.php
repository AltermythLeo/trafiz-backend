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
			$('#example2').DataTable();
		})

		$(document).ready(function(){
			changeMonthDate({{$month}});

			selectItemByValue(document.getElementById("ddldate"), {{$day}});
			selectItemByValue(document.getElementById("ddlmonth"), {{$month}});
			selectItemByValue(document.getElementById("ddlyear"), {{$year}});
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

			var test = 	window.location.pathname +
						"?id=" + id + 
						"&d=" + document.getElementById("ddldate").value + 
						"&m=" + document.getElementById("ddlmonth").value + 
						"&y=" + document.getElementById("ddlyear").value;
			//console.log(test);
			location.replace(test);
		}

		function changesupplier(sup)
		{
			document.getElementById("hidsupplier").value = sup;
		}

		function changeDayDate(day)
		{
			document.getElementById("hiddate").value = day;
		}

		function changeMonthDate(month)
		{
			document.getElementById("hidmonth").value = month;
			var getDaysInMonth = new Date({{$year}}, month, 0).getDate();

			var x = document.getElementById("ddldate");
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

		function changeYearDate(year)
		{
			document.getElementById("hidyear").value = year;
		}

    function exportToCSV()
    {
      var idsupplier = document.getElementById("hidsupplier").value;
      var fdate = document.getElementById("hiddate").value;
      var fmonth = document.getElementById("hidmonth").value;
      var fyear = document.getElementById("hidyear").value;
      var url = "{{URL::to('/fishcatch/report/csv')}}";

      $.getJSON(url,{ 
        _token:"{{ csrf_token() }}",
        sid:idsupplier,
        date:fdate,
        month:fmonth,
        year:fyear
      },function(data) {
        var arr = data.data.slice();
        downloadCSV('fishcatch.csv',arr);
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
	        Fish Catch
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Fish Catch Report</li>
	    </ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				@if($authlv == -1)
					<select id="ddlsupplier" name="ddlsupplier" style="width:100%;" onchange="changesupplier(value);">
						<option value="-1">-- All --</option>
					@foreach ($dataSupplier as $item)
						<option value="{{$item -> idmssupplier}}">
							{{$item->name}}
						</option>
					@endforeach
					</select>
				@endif
				<select id="ddldate" onchange="changeDayDate(value);">
					<option value="-1">All</option>
				</select>
				<select id="ddlmonth" onchange="changeMonthDate(value);">
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
				<select id="ddlyear" onchange="changeYearDate(value);">
					<option value="{{$yearNow-2}}">{{$yearNow-2}}</option>
					<option value="{{$yearNow-1}}">{{$yearNow-1}}</option>
					<option value="{{$yearNow}}">{{$yearNow}}</option>
				</select>
				<input type="button" onClick="changemonthyear()" value="Submit"/>
				<form method="POST" enctype="multipart/form-data" action="{{URL::to('/fishcatch/report/print')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="download" value="pdf">
					<input type="hidden" name="date" id="hiddate" value="{{$day}}">
					<input type="hidden" name="month" id="hidmonth" value="{{$month}}">
					<input type="hidden" name="year" id="hidyear" value="{{$year}}">
					<input type="hidden" name="sid" id="hidsupplier" value="{{$id}}">
					<button type="submit" class="btn btn-primary">Print</button>
					<button type="button" class="btn btn-primary" onclick="exportToCSV()">Export To CSV</button>
				</form>
			</div>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Catch Fish Report List</h3>
					</div>
					
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width:100px;">Supplier</th>
									<th style="width:100px;">Fisherman / Buyer</th>
									<th style="width:100px;">purchase Date</th>
									<th style="width:250px;">Desc</th>
									<th style="width:150px;">Catch</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>{{$item -> suppliername}}</td>
									<td>{{$item -> fishermanname}} {{$item -> buyersuppliername == null ? "" : ($item -> buyersuppliername . "(Buyer)")}}</td>
									<td>{{date_format(date_create($item -> purchasedate),"Y-m-d")}}</td>
									<td>
										Ship Name : {{$item -> shipname}}<br/>
										Fishing Gear : {{$item -> fishinggearindo}} / {{$item -> fishinggearenglish}}<br/>
										Location : {{$item -> portname}}<br/>
										Fish : {{$item -> englishname}}<br/>

										Qty : {{$item -> quantity}}<br/>
										Total Weight : {{$item -> weight}}<br/>
										Price per Kg : {{$item -> priceperkg}}<br/>
										total Price : {{$item -> totalprice}}<br/>
										Loan Expense : {{$item -> loanexpense}}<br/>
										Other Expense : {{$item -> otherexpense}}<br/>
									</td>
									<td>
										@foreach ($item->fish as $itemfish)
											{{$itemfish -> amount}} {{$itemfish -> grade}} <br/>
										@endforeach
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
