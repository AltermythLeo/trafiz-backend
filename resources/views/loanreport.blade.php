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
    
    function exportToCSV(rep)
    {
      if(rep == 'loan') {
        var data = {!! json_encode($data, JSON_HEX_TAG) !!};
        var goodData = [];
        for(var i=0;i<data.length;i++) {
          var row = data[i];
          
          var desc = row.descloan;
          var amount = row.loaninrp;
          var debtor = row.idmsuserloan ? row.nameloan : row.nameloanbuyer;
          var creditor = [];
          if(row.namesupplier) creditor.push(row.namesupplier);
          if(row.nameloanerofficer) creditor.push(row.nameloanerofficer);
          creditor = creditor.join('/');
          var loanDate = row.loandate;
          var paidOffDate = row.paidoffdate;
          var paidOffOfficer = row.namepaidoffofficer;
          if(loanDate) loanDate = loanDate.split(' ')[0];
          if(paidOffDate) paidOffDate = paidOffDate.split(' ')[0];
          goodData.push({
            desc:desc,
            debtor:debtor,
            amount:amount,
            creditor:creditor,
            loanDate:loanDate,
            paidOffDate:paidOffDate,
            paidOffOfficer:paidOffOfficer
          });
        }
        downloadCSV('loan.csv',goodData);
      } else {
        var data = {!! json_encode($datapay, JSON_HEX_TAG) !!};
        var goodData = [];
        for(var i=0;i<data.length;i++) {
          var row = data[i];
          
          var desc = row.descloan;
          var amount = row.loaninrp;
          var debtor = row.idmsuserloan ? row.nameloan : row.nameloanbuyer;
          var creditor = [];
          if(row.namesupplier) creditor.push(row.namesupplier);
          if(row.nameloanerofficer) creditor.push(row.nameloanerofficer);
          creditor = creditor.join('/');
          var paidOffDate = row.paidoffdate;
          var paidOffOfficer = row.namepaidoffofficer;
          if(paidOffDate) paidOffDate = paidOffDate.split(' ')[0];
          goodData.push({
            desc:desc,
            debtor:debtor,
            amount:amount,
            creditor:creditor,
            paidOffDate:paidOffDate,
            paidOffOfficer:paidOffOfficer
          });
        }

        downloadCSV('loanpay.csv',goodData)
      }

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
	        Loan Report
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Loan Report</li>
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
				<form method="POST" enctype="multipart/form-data" action="{{URL::to('/loan/report/print')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="download" value="pdf">
					<input type="hidden" name="date" id="hiddate" value="{{$day}}">
					<input type="hidden" name="month" id="hidmonth" value="{{$month}}">
					<input type="hidden" name="year" id="hidyear" value="{{$year}}">
					<input type="hidden" name="sid" id="hidsupplier" value="{{$id}}">
          <button type="submit" class="btn btn-primary">Print</button>
          <button type="button" class="btn btn-primary" onclick="exportToCSV('loan')">Loan Report To CSV</button>
          <button type="button" class="btn btn-primary" onclick="exportToCSV('payloan')">Pay Loan Report To CSV</button>
				</form>
			</div>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Loan Report List</h3>
					</div>
					
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Desc</th>
									<th style="width:150px;">Debtor</th>
									<th style="width:150px;">Creditor / officer</th>
									<th style="width:100px;">Loan Date</th>
									<th style="width:100px;">Paid off date</th>
									<th style="width:100px;">Paid off Officer</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>
										{{$item -> descloan}}<br/>
										{{ number_format($item -> loaninrp, 2, ",", ".")}}
									</td>
									<td>{{ $item->idmsuserloan == null ? $item->nameloanbuyer : $item->nameloan }}</td>
									<td>{{$item -> namesupplier}} / {{$item -> nameloanerofficer}}</td>
									<td>{{ $item -> loandate == null ? "" : date_format(date_create($item -> loandate),"Y-m-d")}}</td>
									<td>{{ $item -> paidoffdate == null ? "" : date_format(date_create($item -> paidoffdate),"Y-m-d")}}</td>
									<td>{{$item -> namepaidoffofficer}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
		  		</div>
			</div>

			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Payloan Report List</h3>
					</div>
					
					<div class="box-body">
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Desc</th>
									<th style="width:150px;">Debtor</th>
									<th style="width:150px;">Creditor / officer</th>
									<th style="width:100px;">Paid off date</th>
									<th style="width:100px;">Paid off Officer</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($datapay as $item)
								<tr>
									<td>
										{{$item -> descloan}}<br/>
										{{ number_format($item -> loaninrp, 2, ",", ".")}}
									</td>
									<td>{{ $item->idmsuserloan == null ? $item->nameloanbuyer : $item->nameloan }}</td>
									<td>{{$item -> namesupplier}}</td>
									<td>{{date_format(date_create($item -> paidoffdate),"Y-m-d")}}</td>
									<td>{{$item -> namepaidoffofficer}}</td>
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