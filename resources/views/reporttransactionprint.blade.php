<html>
	<body>
		<section class="content-header">
		    <h1>
		        Transaction Report
		        <small>{{ __('menu.management system') }}</small>
		    </h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
						  <h3 class="box-title">Transaction Report List</h3>
						</div>
						
						<div class="box-body">
							<div class="col-md-6">
								<h4 class="box-title">Income</h4>
								<h5 class="box-title">Sell Fish</h5>
								<table id="incomeSellFish" style="width:100%;border:black 1 solid;" border="1">
									<tr>
										<th style="width:150px;">Date</th>
										<th>Desc</th>
										<th style="width:150px;">Amount</th>
									</tr>
									@foreach ($dataSellFish as $item)
									<tr>
										<td>{{date_format(date_create($item -> deliverydate),"Y-m-d")}}</td>
										<td>{{$item -> numberoffishorloin}} ({{$item -> totalweight}} Kg)</td>
										<td>Rp. {{ number_format($item -> totalprice, 2, ",", ".")}}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalSellFish, 2, ",", ".")}}</td>
									</tr>
								</table>

								<h5 class="box-title">Loan Pay</h5>
								<table id="incomeLoanPay" style="width:100%;border:black 1 solid;" border="1">
									<tr>
										<th style="width:150px;">Date</th>
										<th>Desc</th>
										<th style="width:150px;">Amount</th>
									</tr>
									@foreach ($dataLoanPay as $item)
									<tr>
										<td>{{date_format(date_create($item -> paidoffdate),"Y-m-d")}}</td>
										<td>{{$item -> namepayer}}</td>
										<td>Rp. {{ number_format($item -> loaninrp, 2, ",", ".")}}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalLoanPay, 2, ",", ".")}}</td>
									</tr>
								</table>
							</div>

							<div class="col-md-6">
								<h4 class="box-title">Expense</h4>
								<h5 class="box-title">Buy Catch</h5>
								<table id="incomeBuyCatch" style="width:100%;border:black 1 solid;" border="1">
									<tr>
										<th style="width:150px;">Date</th>
										<th>Desc</th>
										<th style="width:150px;">Amount</th>
									</tr>
									@foreach ($dataCatch as $item)
									<tr>
										<td>{{date_format(date_create($item -> postdate),"Y-m-d")}}</td>
										<td>{{$item -> nameseller}}</td>
										<td>Rp. {{ number_format($item -> totalprice, 2, ",", ".")}}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalCatch, 2, ",", ".")}}</td>
									</tr>
								</table>
								<h5 class="box-title">Loan</h5>
								<table id="incomeLoan" style="width:100%;border:black 1 solid;" border="1">
									<tr>
										<th style="width:150px;">Date</th>
										<th>Desc</th>
										<th style="width:150px;">Amount</th>
									</tr>
									@foreach ($dataLoan as $item)
									<tr>
										<td>{{date_format(date_create($item -> loandate),"Y-m-d")}}</td>
										<td>{{ $item->idfishermanoffline == null ? $item->nameloanbuyer : $item->nameloan }}</td>
										<td>Rp. {{ number_format($item -> loaninrp, 2, ",", ".")}}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="2" style="text-align: right;">Total</td>
										<td>Rp. {{ number_format($totalLoan, 2, ",", ".")}}</td>
									</tr>
								</table>
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
	</body>
</html>
