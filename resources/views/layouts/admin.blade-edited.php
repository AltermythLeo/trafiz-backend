<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Trafiz Backend - {{$title}}</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="{{URL::to('/bootstrap-3.1.1-dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{URL::to('/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{URL::to('/Ionicons/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{URL::to('/AdminLTE/css/AdminLTE.min.css')}}">
		<link rel="stylesheet" href="{{URL::to('/AdminLTE/css/skins/_all-skins.min.css')}}">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		@section('style')
		@show
	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<div id="resetModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                            style="text-align:right;" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">Reset Password</h4>
                    </div>
					<form 	id="resetForm"
							class="form-horizontal" method="POST" 
							action="{{URL::to('/user/resetpass')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <div style="text-align: center;">
	                        <input id="oldpassword" type="password" class="form-control"
	                        	name="oldpassword" required placeholder="Old Password">
	                        <input id="newpassword" type="password" class="form-control"
	                        	name="newpassword" required placeholder="New Password">
	                        <input id="retypenewpassword" type="password" class="form-control"
	                        	name="retypenewpassword" required placeholder="Retype Password">
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" onclick="confirmReset(event)"
	                            class="btn btn-primary" data-dismiss="modal">
	                            Submit
	                        </button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>

		<div class="wrapper">
			<header class="main-header">
				<a href="{{URL::to('/index')}}" class="logo">
					<span class="logo-mini"><b>TR</b>B</span>
					<span class="logo-lg"><b>TR</b>afiz Backend</span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="{{URL::to('/img/logoSquare.png')}}" class="user-image" alt="User Image">
									<span>&nbsp; {{Auth::user()->name}}</span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="{{URL::to('/img/logoSquare.png')}}" class="img-circle" alt="User Image">
										<p>
											{{Auth::user()->name}}
											<small>
												{{ Helper::displayauthlv($authlv) }}<br/>
												@if($authlv > 0)
													<a style="color:white;" href="{{URL::to('/supplier/indexedit')}}">
														Edit
													</a>
												@endif
											</small>
										</p>
									</li>
										<li class="user-footer">
										<div class="pull-left">
											<button type="button" class="btn btn-default btn-flat"
													data-toggle="modal" data-target="#resetModal">
												{{ __('menu.resetpassword') }}
											</button>
	                                   	</div>
										<div class="pull-right">
											<a class="btn btn-default btn-flat" href="{{URL::to('/officer/logout')}}"
		                                       onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
		                                        {{ __('menu.signout') }}
		                                    </a>

		                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                    </form>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<section class="sidebar">
					<div class="user-panel">
						<div class="pull-left image">
							<img src="{{URL::to('/img/logoSquare.png')}}" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p>{{Auth::user()->name}}</p>
							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>
					<ul class="sidebar-menu" data-widget="tree">
						<li class="header">{{ __('menu.main navigation') }}</li>

						@if($title == "index")
						<li class="active">
						@else
						<li>
						@endif
							<a href="{{URL::to('/index')}}">
								<i class="fa fa-dashboard"></i> <span>{{ __('menu.dashboard') }}</span>
							</a>
						</li>

						@if($authlv == -1)
							@if($title == "officer")
							<li class="active">
							@else
							<li>
							@endif
								<a href="{{URL::to('/officer')}}">
									<i class="fa fa-user-secret"></i> <span>Officer</span>
								</a>
							</li>
						@endif

						@if($authlv < 2)
							<li class="treeview">
								<a href="#">
									<i class="fa fa-codepen"></i> <span>Supplier</span>
									<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									@if($authlv >= -2 && $authlv < 0)
										@if($title == "supplieraccept")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/supplier/accept')}}">
												<i class="fa fa-user-plus"></i> <span>Accept Supplier</span>
											</a>
										</li>

										@if($title == "supplier")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/supplier')}}">
												<i class="fa fa-user"></i> <span>Supplier</span>
											</a>
										</li>
									@endif
									

									@if($title == "supplierofficer")
									<li class="active">
									@else
									<li>
									@endif
										<a href="{{URL::to('/supplier/officer')}}">
											<i class="fa fa-users"></i> <span>Supplier Helper</span>
										</a>
									</li>
								</ul>
							</li>
						@endif

						@if($authlv <= 1)
							<li class="treeview">
								<a href="#">
									<i class="fa fa-clipboard"></i> <span>DB</span>
									<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									@if($authlv <= 0)
										@if($title == "infotable")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/info')}}">
												<i class="fa fa-info"></i> <span>Info Table</span>
											</a>
										</li>

										@if($title == "shipReport")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/ship/report')}}">
												<i class="fa fa-ship"></i> <span>Ship Report</span>
											</a>
										</li>

										@if($title == "fishermanReport")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/fisherman/report')}}">
												<i class="fa fa-pied-piper-alt"></i> <span>Fisherman Report</span>
											</a>
										</li>

										@if($authlv == -1)
											@if($title == "fishmasterdata")
											<li class="active">
											@else
											<li>
											@endif
												<a href="{{URL::to('/fish/master')}}">
													<i class="fa fa-linux"></i> <span>Fish Master Data</span>
												</a>
											</li>
										@endif

										@if($title == "fishreport")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/fish/report')}}">
												<i class="fa fa-linux"></i> <span>Fish Data</span>
											</a>
										</li>
									@endif
									@if($title == "fishkde")
									<li class="active">
									@else
									<li>
									@endif
										<a href="{{URL::to('/fish/getkde')}}">
											<i class="fa fa-search"></i> <span>Generate Delivery Sheet</span>
										</a>
									</li>
                  @if($title == "fishkdedata")
									<li class="active">
									@else
									<li>
									@endif
										<a href="{{URL::to('/fish/getkdedata')}}">
											<i class="fa fa-search"></i> <span>KDE Data by Fish ID</span>
										</a>
									</li>
								</ul>
							</li>
						@endif

						@if($authlv <= 1)
							<li class="treeview">
								<a href="#">
									<i class="fa fa-clipboard"></i> <span>Report</span>
									<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">

									@if($title == "fishcatchreport")
									<li class="active">
									@else
									<li>
									@endif
										<a href="{{URL::to('/fishcatch/report')}}">
											<i class="fa fa-pied-piper-alt"></i> <span>Fish Catch Report</span>
										</a>
									</li>

									
									@if($title == "reportTransaction")
									<li class="active">
									@else
									<li>
									@endif
										<a href="{{URL::to('/transaction/report')}}">
											<i class="fa fa-shopping-cart"></i> <span>Transaction Report</span>
										</a>
									</li>
									
									
									@if($title == "loanReport")
									<li class="active">
									@else
									<li>
									@endif
										<a href="{{URL::to('/loan/report')}}">
											<i class="fa fa-money"></i> <span>Loan Report</span>
										</a>
									</li>
									<!--
									@if($authlv > 0)
										@if($title == "loanReportSupplier")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/loan/supplier/report')}}">
												<i class="fa fa-money"></i> <span>Loan Report supplier</span>
											</a>
										</li>
									@endif-->

									@if($authlv == -1)
										@if($title == "reportlog")
										<li class="active">
										@else
										<li>
										@endif
											<a href="{{URL::to('/report/log')}}">
												<i class="fa fa-user-secret"></i> <span>Report Log</span>
											</a>
										</li>
									@endif
								</ul>
							</li>
						@endif
						
					</ul>
				</section>
			</aside>
			<div class="content-wrapper">
				@section('content')
				@show
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
				<b>Version</b> 0.0.1
				</div>
				<strong>Copyright &copy; 2017 <a href="https://www.Altermyth.com">Altermyth Studio</a>.</strong> All rights
				reserved.
			</footer>
		</div>
		<script src="{{URL::to('/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{URL::to('/jquery-ui/jquery-ui.min.js')}}"></script>
		<script src="{{URL::to('/bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
		<script src="{{URL::to('/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
		<script src="{{URL::to('/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
		<script src="{{URL::to('/fastclick/lib/fastclick.js')}}"></script>
		<script src="{{URL::to('/AdminLTE/js/adminlte.min.js')}}"></script>
		<script src="{{URL::to('/AdminLTE/js/demo.js')}}"></script>
		<script src="{{URL::to('js/bootbox.min.js')}}"></script>
		<script>
			$.widget.bridge('uibutton', $.ui.button);
			function confirmReset(e)
			{
				$('#resetModal').modal('hide');
				var err = "";

				if(	$("#oldpassword").val() == "" || $("#newpassword").val() == "" || 
					$("#retypenewpassword").val() == "")
				{
					err = "Please Enter Password Field";	
				}
				else if($("#newpassword").val() != $("#retypenewpassword").val())
				{
					err = "New password doesnt match";
				}


				if(err != "")
				{
					bootbox.confirm({
						size: "small",
						message: err,
						buttons: {
							confirm: {
								label: 'Yes',
								className: 'btn-success'
							},
							cancel: {
								label: 'No',
								className: 'btn-danger'
							}
						},
						callback: function (result) {
						}
					});	
				}
				else
				{
					var currentForm = $("#resetForm");
        			e.preventDefault();
					bootbox.confirm({
						size: "small",
						message: "Are you sure want to Reset Password ?? you will be logout if success",
						buttons: {
							confirm: {
								label: 'Yes',
								className: 'btn-success'
							},
							cancel: {
								label: 'No',
								className: 'btn-danger'
							}
						},
						callback: function (result) {
							if (result) {
								currentForm.submit();
							}
						}
					});
				}
			}
		</script>
		@section('script')
		@show
	</body>
</html>
