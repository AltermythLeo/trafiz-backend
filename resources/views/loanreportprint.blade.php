<html>
	<body>
		<section class="content-header">
		    <h1>
		        Loan Report
		        <small>{{ __('menu.management system') }}</small>
		    </h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
						  <h3 class="box-title">Loan Report List</h3>
						</div>
						
						<div class="box-body">
							<table id="example1" border="1">
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
										<td>{{date_format(date_create($item -> loandate),"Y-m-d")}}</td>
										<td>{{date_format(date_create($item -> paidoffdate),"Y-m-d")}}</td>
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
							<table id="example2" border="1">
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
	</body>
</html>
