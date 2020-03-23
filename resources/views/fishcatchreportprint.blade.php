<html>
	<body>
		<section class="content-header">
		    <h1>
		        Fish Catch
		        <small>{{ __('menu.management system') }}</small>
		    </h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
						  <h3 class="box-title">Catch Fish Report List</h3>
						</div>
						
						<div class="box-body">
							<table id="example1" style="width:100%;border:black 1 solid;" border="1">
								<thead>
								<tr>
									<th>Supplier</th>
									<th>Fisherman</th>
									<th>purchase date</th>
									<th>Desc</th>
									<th>Catch</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>{{$item -> suppliername}}</td>
									<td>{{$item -> fishermanname}}</td>
									<td>{{date_format(date_create($item -> purchasedate),"Y-m-d")}}</td>
									<td>
										Ship Name : {{$item -> shipname}}<br/>
										Fishing Gear : {{$item -> fishinggearindo}} / {{$item -> fishinggearenglish}}<br/>
										Location : {{$item -> portname}}<br/>
										Fish : {{$item -> englishname}}
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
	</body>
</html>
