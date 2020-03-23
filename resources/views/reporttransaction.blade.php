@extends('layouts.admin')
@section('style')
	
	<link rel="stylesheet" href="{{URL::to('/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('script')
	<script src="{{URL::to('js/bootbox.min.js')}}"></script>
	<script src="{{URL::to('moment/moment.js')}}"></script>
	
	<script src="{{URL::to('/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script>
		$(function () {
			$('#incomeSellFish').DataTable();
			$('#incomeLoanPay').DataTable();
			$('#incomeBuyCatch').DataTable();
			$('#incomeLoan').DataTable();			
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
      var url = "{{URL::to('/transaction/report/csv')}}";

      $.getJSON(url,{ 
        _token:"{{ csrf_token() }}",
        sid:idsupplier,
        date:fdate,
        month:fmonth,
        year:fyear
      },function(data) {
        var goodData = mergeData(data.dataLoan,data.dataLoanPay,data.dataCatch,data.dataSellFish);
        downloadCSV('transactionandloan.csv',goodData);
      });
    }

    function mergeData(dataLoan,dataLoanPay,dataCatch,dataSellFish) {
      var obj = {};

      function initObjKey(key) {
        if(!obj[key]) {
          obj[key] = {}
        }
        if(!obj[key].ts) {
          obj[key].ts = moment(key,'YYYY-MM-DD').unix();
        }
        if(!obj[key].dataLoans) {
          obj[key].dataLoans = [];
        }
        if(!obj[key].dataLoanPays) {
          obj[key].dataLoanPays = [];
        }
        if(!obj[key].dataCatches) {
          obj[key].dataCatches = [];
        }
        if(!obj[key].dataSellFishes) {
          obj[key].dataSellFishes = [];
        }
      }

      for(var i=0;i<dataLoan.length;i++) {
        var row = dataLoan[i];
        var rowDate = row.loandate;
        var m = moment(rowDate,'YYYY-MM-DD HH:mm:ss');
        var key = m.format('YYYY-MM-DD');
        initObjKey(key);
        obj[key].dataLoans.push(row);
      }

      for(var i=0;i<dataLoanPay.length;i++) {
        var row = dataLoanPay[i];
        var rowDate = row.paidoffdate;
        var m = moment(rowDate,'YYYY-MM-DD HH:mm:ss');
        var key = m.format('YYYY-MM-DD');
        initObjKey(key);
        obj[key].dataLoanPays.push(row);
      }

      for(var i=0;i<dataCatch.length;i++) {
        var row = dataCatch[i];
        var rowDate = row.purchasedate;
        var m = moment(rowDate,'YYYY-MM-DD HH:mm:ss');
        var key = m.format('YYYY-MM-DD');
        initObjKey(key);
        obj[key].dataCatches.push(row);
      }

      for(var i=0;i<dataSellFish.length;i++) {
        var row = dataSellFish[i];
        var rowDate = row.deliverydate;
        var m = moment(rowDate,'YYYY-MM-DD');
        var key = m.format('YYYY-MM-DD');
        initObjKey(key);
        obj[key].dataSellFishes.push(row);
      }
      
      var ret = [];
      for (var key in obj) {
        if (obj.hasOwnProperty(key)) {
          var val = obj[key];
          var sellFishAmount = 0;
          var sellFishNum = 0;
          var sellFishTotalWeight = 0;
          var buyCatchAmount = 0;
          var buyCatchNum = 0;
          var buyCatchTotalWeight = 0;
          var loanPaidAmount = 0;
          var loanPaidNames = '';
          var loanAmount = 0;
          var loanNames = '';

          for(var i=0;i<val.dataSellFishes.length;i++) {
            var item = val.dataSellFishes[i];
            sellFishAmount += item.totalprice;
            sellFishNum += item.numberoffishorloin;
            sellFishTotalWeight += item.totalweight;
          }

          for(var i=0;i<val.dataCatches.length;i++) {
            var item = val.dataCatches[i];
            buyCatchAmount += item.totalprice;
            buyCatchNum += item.quantity;
            buyCatchTotalWeight += item.weight;
          }
          
          var temp = [];
          for(var i=0;i<val.dataLoanPays.length;i++) {
            var item = val.dataLoanPays[i];
            loanPaidAmount += item.loaninrp;
            var name = item.namepayer;
            if(name && name.length>0 && temp.indexOf(name) == -1) temp.push(name);
          }
          loanPaidNames = temp.join(',');

          temp = [];
          for(var i=0;i<val.dataLoans.length;i++) {
            var item = val.dataLoans[i];
            loanAmount += item.loaninrp;
            var name = item.idfishermanoffline ? item.nameloan : item.nameloanbuyer;
            if(name && name.length>0 && temp.indexOf(name) == -1) temp.push(name);
          }
          loanNames = temp.join(',');

          const row = {
            datetime:key,
            sellFishNum:sellFishNum,
            sellFishTotalWeight:sellFishTotalWeight,
            sellFishAmount:sellFishAmount,
            buyCatchAmount:buyCatchAmount,
            buyCatchNum:buyCatchNum,
            buyCatchTotalWeight:buyCatchTotalWeight,
            loanNames:loanNames,
            loanAmount:loanAmount,
            loanPaidNames:loanPaidNames,
            loanPaidAmount:loanPaidAmount
          }
          ret.push(row);
        }
      }

      ret.sort(function(a, b) {
        return moment(b.datetime,'YYYY-MM-DD').unix() - moment(a.datetime,'YYYY-MM-DD').unix();
      });

      return ret;
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
	        Transaction Report
	        <small>{{ __('menu.management system') }}</small>
	    </h1>
	    <ol class="breadcrumb">
	        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Transaction Report</li>
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
				<form method="POST" enctype="multipart/form-data" action="{{URL::to('/transaction/report/print')}}">
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
					  <h3 class="box-title">Transaction Report List</h3>
					</div>
					
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<h4 class="box-title">Income</h4>
								<h5 class="box-title">Sell Fish</h5>
								<table id="incomeSellFish" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataSellFish as $item)
										<tr>
											<td>{{date_format(date_create($item -> deliverydate),"Y-m-d")}}</td>
											<td>{{$item -> numberoffishorloin}} ({{$item -> totalweight}} Kg)</td>
											<td>Rp. {{ number_format($item -> totalprice, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
                    <td style="text-align: right;">Total</td>
										<td>{{ $totalSellKg }} Kg</td>
										<td>Rp. {{ number_format($totalSellFish, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<h4 class="box-title">Expense</h4>
								<h5 class="box-title">Buy Catch</h5>
								<table id="incomeBuyCatch" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataCatch as $item)
										<tr>
											<td>{{date_format(date_create($item -> purchasedate),"Y-m-d")}}</td>
											<td>{{$item -> quantity}} ({{$item -> weight}} Kg)</td>
											<td>Rp. {{ number_format($item -> totalprice, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
										<td style="text-align: right;">Total</td>
                    <td>{{ $totalCatchKg }} Kg</td>
										<td>Rp. {{ number_format($totalCatch, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<h5 class="box-title">Loan Pay</h5>
								<table id="incomeLoanPay" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataLoanPay as $item)
										<tr>
											<td>{{date_format(date_create($item -> paidoffdate),"Y-m-d")}}</td>
											<td>{{$item -> namepayer}}</td>
											<td>Rp. {{ number_format($item -> loaninrp, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalLoanPay, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>


							<div class="col-md-6">
								<h5 class="box-title">Loan</h5>
								<table id="incomeLoan" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:150px;">Date</th>
											<th>Desc</th>
											<th style="width:150px;">Amount</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataLoan as $item)
										<tr>
											<td>{{date_format(date_create($item -> loandate),"Y-m-d")}}</td>
											<td>{{ $item->idfishermanoffline == null ? $item->nameloanbuyer : $item->nameloan }}</td>
											<td>Rp. {{ number_format($item -> loaninrp, 2, ",", ".")}}</td>
										</tr>
										@endforeach
									</tbody>
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalLoan, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<h4 class="box-title">Total Income = Rp. {{number_format($totalSellFish + $totalLoanPay, 2, ",", ".")}}</h4>
							</div>
							<div class="col-md-6">
								<h4 class="box-title">Total Expense = Rp. {{number_format($totalLoan + $totalCatch, 2, ",", ".")}}</h4>
							</div>
						</div>
					</div>
		  		</div>
			</div>
		</div>
	</section>
@endsection