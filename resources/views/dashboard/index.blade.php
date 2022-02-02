@extends('layouts.app')
@section('title', 'Dashboard')
@section('styles')
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
	<!-- Styles -->
	<style>
	#chartdiv {
	  width: 100%;
	  height: 500px;
	}
	
	</style>
	
	<!-- Resources -->
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
	<!-- Chart code -->
<script>
	am4core.ready(function() {
	
	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end
	
	var chart = am4core.create("chartdiv", am4charts.PieChart);
	chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

	var projects = @json(Helper::sortedProjects(17));
	var timeDays_array = [];
	var projectsData = [];
	
	for (const key in projects) {
		if (projects.hasOwnProperty(key)) {
			if(projects[key].start_date && projects[key].end_date){
				const start_date = new Date(projects[key].start_date);
				const end_date = new Date(projects[key].end_date);
				const diffTime = Math.abs(end_date - start_date);
				const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
				timeDays_array.push(diffDays);
				projectsData.push({name: projects[key].name, value: diffDays});
			}
		}
	}
	
	chart.data = projectsData;
	
	chart.radius = am4core.percent(70);
	chart.innerRadius = am4core.percent(40);
	chart.startAngle = 180;
	chart.endAngle = 360;  
	
	var series = chart.series.push(new am4charts.PieSeries());
	series.dataFields.value = "value";
	series.dataFields.category = "name";
	
	series.slices.template.cornerRadius = 10;
	series.slices.template.innerCornerRadius = 7;
	series.slices.template.draggable = true;
	series.slices.template.inert = true;
	series.alignLabels = false;
	
	series.hiddenState.properties.startAngle = 90;
	series.hiddenState.properties.endAngle = 90;
	
	chart.legend = new am4charts.Legend();
	
	}); // end am4core.ready()
</script>
@endsection
@section('content')
	<!--begin::Subheader-->
	<div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Details-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Heading-->
				<div class="d-flex flex-column">
					<!--begin::Title-->
					<h2 class="text-white font-weight-bold my-2 mr-5">Dashboard</h2>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<div class="d-flex align-items-center font-weight-bold my-2">
						<!--begin::Item-->
						<a href="#" class="opacity-75 hover-opacity-100">
							<i class="flaticon2-shelter text-white icon-1x"></i>
						</a>
						<!--end::Item-->
						<!--begin::Item-->
						<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
						<a href="{{url('dashboard')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
						<!--end::Item-->
						<!--begin::Item-->
						{{--  <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
						<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Latest Updated</a>
						<!--end::Item-->  --}}
					</div>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Heading-->
			</div>
			<!--end::Details-->
			{{-- <!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Button-->
				<a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>
				<!--end::Button-->
				<!--begin::Dropdown-->
				<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
					<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
					<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
						<!--begin::Navigation-->
						<ul class="navi navi-hover py-5">
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-drop"></i>
									</span>
									<span class="navi-text">New Group</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-list-3"></i>
									</span>
									<span class="navi-text">Contacts</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-rocket-1"></i>
									</span>
									<span class="navi-text">Groups</span>
									<span class="navi-link-badge">
										<span class="label label-light-primary label-inline font-weight-bold">new</span>
									</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-bell-2"></i>
									</span>
									<span class="navi-text">Calls</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-gear"></i>
									</span>
									<span class="navi-text">Settings</span>
								</a>
							</li>
							<li class="navi-separator my-3"></li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-magnifier-tool"></i>
									</span>
									<span class="navi-text">Help</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-bell-2"></i>
									</span>
									<span class="navi-text">Privacy</span>
									<span class="navi-link-badge">
										<span class="label label-light-danger label-rounded font-weight-bold">5</span>
									</span>
								</a>
							</li>
						</ul>
						<!--end::Navigation-->
					</div>
				</div>
				<!--end::Dropdown-->
			</div>
			<!--end::Toolbar--> --}}
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row">
				<div class="col-xl-4">
					<!--begin::Tiles Widget 1-->
					<div class="card card-custom gutter-b card-stretch">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<div class="card-title">
								<div class="card-label">
									<div class="font-weight-bolder">Yearly Profit Stats</div>
									<div class="font-size-sm text-muted mt-2">{{ceil(Helper::totalInvoices())}} SAR</div>
								</div>
							</div>
							{{-- <div class="card-toolbar">
								<div class="dropdown dropdown-inline">
									<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-hor"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover py-5">
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-drop"></i>
													</span>
													<span class="navi-text">New Group</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-list-3"></i>
													</span>
													<span class="navi-text">Contacts</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
													<span class="navi-text">Groups</span>
													<span class="navi-link-badge">
														<span class="label label-light-primary label-inline font-weight-bold">new</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Calls</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-gear"></i>
													</span>
													<span class="navi-text">Settings</span>
												</a>
											</li>
											<li class="navi-separator my-3"></li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-magnifier-tool"></i>
													</span>
													<span class="navi-text">Help</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Privacy</span>
													<span class="navi-link-badge">
														<span class="label label-light-danger label-rounded font-weight-bold">5</span>
													</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
							</div> --}}
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body d-flex flex-column px-0">
							<!--begin::Chart-->
							<div id="yearly_sales" data-color="danger" style="height: 150px"></div>
							<!--end::Chart-->
							<!--begin::Items-->
							<div class="flex-grow-1 card-spacer-x">
								<!--begin::Item-->
								{{-- <div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
											<div class="symbol-label">
												<img src="assets/media/svg/misc/006-plurk.svg" alt="" class="h-50" />
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Authors</a>
											<div class="font-size-sm text-muted font-weight-bold mt-1">Ricky Hunt, Sandra Trepp</div>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+105$</div>
								</div> --}}
								<!--end::Item-->
								<!--begin::Item-->
								@if (Helper::BestSeller())
									@if(count(Helper::BestSeller()))
										@foreach(Helper::BestSeller() as $invoice)
											<div class="d-flex align-items-center justify-content-between mb-10">
												<div class="d-flex align-items-center mr-2">
													<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
														<div class="symbol-label">
															<img src="assets/media/svg/misc/015-telegram.svg" alt="" class="h-50" />
														</div>
													</div>
													<div>
														<a href="{{url('customers/'. $invoice->user->id)}}" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Best Seller</a>
														<a href="{{url('customers/'. $invoice->user->id)}}">
															<div class="font-size-sm text-muted font-weight-bold mt-1">{{ucwords($invoice->user->name)}}
															</div>
														</a>
														
													</div>
												</div>
												<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+{{$invoice->grand_total}}</div>
											</div>
										@endforeach
									@endif
								@endif
								
								
								<!--end::Item-->
								<!--begin::Item-->
								{{-- <div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
											<div class="symbol-label">
												<img src="assets/media/svg/misc/003-puzzle.svg" alt="" class="h-50" />
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Engagement</a>
											<div class="font-size-sm text-muted font-weight-bold mt-1">KT.com solution provider</div>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+75$</div>
								</div> --}}
								<!--end::Item-->
							</div>
							<!--end::Items-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tiles Widget 1-->
				</div>
				<div class="col-xl-8">
					<div class="row">
						<div class="col-xl-3">
							<!--begin::Tiles Widget 3-->
							<div class="card card-custom bgi-no-repeat bgi-no-repeat bgi-size-cover gutter-b" style="height: 150px; background-image: url(assets/media/bg/bg-12.jpg)">
								<!--begin::Body-->
								<div class="card-body d-flex flex-column">
									<!--begin::Title-->
									<a href="{{url('quotations/search?search=&status=1')}}" target="_blank" class="text-white font-weight-bolder font-size-h3">Pending Quotations</a>
									<a href="{{url('quotations/search?search=&status=1')}}" target="_blank" class="text-white font-weight-bolder font-size-h3 mt-3">{{count(Helper::pendingQuotes())}}</a>
									<!--end::Title-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Tiles Widget 3-->
						</div>
						<div class="col-xl-3">
							<!--begin::Tiles Widget 3-->
							<div class="card card-custom bgi-no-repeat bgi-no-repeat bgi-size-cover gutter-b" style="height: 150px; background-image: url(assets/media/bg/bg-13.jpg)">
								<!--begin::Body-->
								<div class="card-body d-flex flex-column">
									<!--begin::Title-->
									<a href="{{url('tickets/search?search=&status=0')}}" target="_blank" class="text-dark-75 font-weight-bolder font-size-h3">Pending Tickets</a>
									<a href="{{url('tickets/search?search=&status=0')}}" target="_blank" class="text-dark-75 font-weight-bolder font-size-h3 mt-3">{{count(Helper::PendingTickets())}}</a>
									<!--end::Title-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Tiles Widget 3-->
						</div>
						<div class="col-xl-6">
							<!--begin::Mixed Widget 10-->
							<div class="card card-custom gutter-b" style="height: 150px">
								<!--begin::Body-->
								<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
									<div class="mr-2">
										<h3 class="font-weight-bolder">Create Quotation</h3>
										<div class="text-dark-50 font-size-lg mt-2">Create Our Creative Quotation</div>
									</div>
									<a href="{{url('quotation')}}" target="_blank"class="btn btn-primary font-weight-bold py-3 px-6">Start Now</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Mixed Widget 10-->
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6">
							<!--begin::Tiles Widget 13-->
							<div class="card card-custom bgi-no-repeat gutter-b" style="height: 175px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(assets/media/svg/patterns/taieri.svg)">
								<!--begin::Body-->
								<div class="card-body d-flex align-items-center">
									<div>
										<h3 class="text-white font-weight-bolder line-height-lg mb-5">Create Invoice
										<br>CCIT Invoices</h3>
										<a data-toggle="modal" data-target ="#new-invoice" class="btn btn-success font-weight-bold px-6 py-3">Create Invoice</a>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Tiles Widget 13-->
							<div class="row">
								<div class="col-xl-6">
									<!--begin::Tiles Widget 11-->
									<div class="card card-custom bg-primary gutter-b" style="height: 150px">
										<div class="card-body">
											<span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
														<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										<div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">{{count(Helper::tasks())}}</div>
											<a href="{{url('tasks')}}" target="_blank" class="text-inverse-primary font-weight-bold font-size-lg mt-1">Total Tasks</a>
										</div>
									</div>
									<!--end::Tiles Widget 11-->
								</div>
								<div class="col-xl-6">
									<!--begin::Tiles Widget 12-->
									<div class="card card-custom gutter-b" style="height: 150px">
										<div class="card-body">
											<span class="svg-icon svg-icon-3x svg-icon-success">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"></polygon>
														<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
														<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<div class="text-dark font-weight-bolder font-size-h2 mt-3">{{count(Helper::team())}}</div>
											<a href="{{url('team')}}" target="_blank" class="text-muted text-hover-success font-weight-bold font-size-lg mt-1">Total Team</a>
										</div>
									</div>
									<!--end::Tiles Widget 12-->
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<!--begin::Mixed Widget 14-->
							<div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b card-stretch" style="background-image: url(assets/media/stock-600x600/img-16.jpg)">
								<!--begin::Body-->
								<div class="card-body d-flex flex-column align-items-start justify-content-start">
									<div class="p-1 flex-grow-1">
										<h3 class="text-white font-weight-bolder line-height-lg mb-5">Create Project
										<br />Create Perfection</h3>
									</div>
									<a data-toggle="modal" data-target="#new-project" class="btn btn-link btn-link-warning font-weight-bold">Create Project
									<span class="svg-icon svg-icon-lg svg-icon-warning">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
												<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span></a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Mixed Widget 14-->
						</div>
					</div>
				</div>
			</div>
			<!--end::Row-->
			<!--begin::Row-->
			<div class="row">
				<div class="col-xl-4">
					<!--begin::Mixed Widget 19-->
					<div class="card card-custom gutter-b" style="height: 150px;">
						<!--begin::Body-->
						{{-- <div class="card-body d-flex flex-column">
							<div class="d-flex align-items-center justify-content-between flex-grow-1">
								<div class="mr-2">
									<h3 class="font-weight-bolder">Sales Progress</h3>
									<div class="text-muted font-size-lg mt-2">Total Sales Progress</div>
								</div>
								<div class="font-weight-boldest font-size-h1 text-warning">{{Helper::totalSales()}} SAR</div>
							</div>
							<div class="pt-8">
								<div class="d-flex align-items-center justify-content-between mb-3">
									<div class="text-muted font-weight-bold mr-2">Sale Progress</div>
									<div class="text-muted font-weight-bold">{{ceil((Helper::totalSales() *100)/ Helper::totalInvoices())}}%</div>
								</div>
								<div class="progress bg-light-warning progress-xs" data-toggle="tooltip" data-placement="right" title="{{Helper::totalInvoices()}} SAR">
									<div class="progress-bar bg-warning" role="progressbar" style="width: {{ceil((Helper::totalSales() *100)/ Helper::totalInvoices())}}%;" aria-valuenow="{{ceil((Helper::totalSales() *100)/ Helper::totalInvoices())}}" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div> --}}
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 19-->
				</div>
				<div class="col-xl-4">
					<!--begin::Tiles Widget 12-->
					<a href="{{url('customers')}}" class="card card-custom bg-white gutter-b" style="height: 150px">
						<div class="card-body">
							<span class="svg-icon svg-icon-3x svg-icon-info">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
										<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						<div class="text-dark font-weight-bolder font-size-h2 mt-3">{{count(Helper::customers())}}</div>
						<span class="text-info">Total Customers</span>
						</div>
					</a>
					<!--end::Tiles Widget 12-->
				</div>
				<div class="col-xl-4">
					<!--begin::Tiles Widget 12-->
					<a href="{{url('contracts')}}" class="card card-custom bg-white gutter-b" style="height: 150px">
						<div class="card-body">
							<span class="svg-icon svg-icon-3x svg-icon-success"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Home\Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
									<path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
								</g>
							</svg><!--end::Svg Icon--></span>
						<div class="text-dark font-weight-bolder font-size-h2 mt-3">{{count(Helper::customers())}}</div>
						<span class="text-success">Total Contracts</span>
						</div>
					</a>
					<!--end::Tiles Widget 12-->
				</div>
			</div>
			<!--end::Row-->
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-12 col-xxl-12">
					<!--begin::Advance Table Widget 1-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Invoice </span>
							<span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{count(Helper::invoices())}}+ Invoices</span>
							</h3>
							<div class="card-toolbar">
								<a  data-toggle="modal" data-target ="#new-invoice"  class="btn btn-success font-weight-bolder font-size-sm">
								<span class="svg-icon svg-icon-md svg-icon-white">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Add New Invoice</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Customer</th>
											<th scope="col">Invoice No.</th>
											<th scope="col">Due Date</th>
											<th scope="col">Total</th>
											<th scope="col">Status</th>
											<th scope="col">File</th>
											<th scope="col">Settings</th>
										</tr>
									</thead>
									<tbody>
										@foreach (Helper::invoices() as $invoice)
											@if ($loop->index < 10)
											<tr>
												<th scope="row">
													<a class="text-dark-75 mt-3 d-block" href="{{url('invoices/'. $invoice->id)}}">
														{{$invoice->id}}
													</a>
												</th>
												<td  class="datatable-cell">
													<a style="width: 200px;" href="{{url('customers/'. $invoice->user->id)}}">
														<div class="d-flex align-items-center">
															@if (Helper::avatarCheck($invoice->user->avatar))
																<div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
																	<img class="" src="{{asset('uploads/images/avatars/'.$invoice->user->avatar)}}" alt="photo" />
																</div>
															@else
																<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
																	<span class="symbol-label font-size-h4">
																		{{$invoice->user->name[0]}}
																	</span>
																</div>
															@endif
														   
															<div class="ml-3">
																<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ucwords($invoice->user->name)}}</div>
																<span  class="text-muted font-weight-bold text-hover-primary">{{$invoice->user->email}}</span>
															</div>
														</div>
													</a>
												</td>
												<td scope="row">
													<a class="text-dark-75 mt-3 d-block cursor-pointer" data-toggle="modal" data-target="#show-{{$invoice->id}}">
														{{$invoice->invoice_no}}
													</a>
												</td>
												<td class="pt-5">{{$invoice->due_date}}</td>
												<td class="pt-5">{{$invoice->grand_total}} SAR</td>
												
												<td class="pt-5">
													@if ($invoice->status == 0)
														<span class="label label-inline label-light-danger font-weight-bold">
															Not Paid
														</span>
													@elseif ($invoice->status == 1)
														<span class="label label-inline label-light-success font-weight-bold">
															Paid
														</span>
													@endif
												</td>
												<td class="pt-5">
													@if (Helper::fileExists($invoice->docs, 'uploads/docs/invoices'))
														<span class="svg-icon svg-icon-primary svg-icon-2x pointer"  data-toggle="modal" data-target="#docs-{{$invoice->id}}" title="Show invoice File"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24"/>
																<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
																<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
															</g>
														</svg><!--end::Svg Icon--></span>
													@endif
												</td>
												<td>
													<a class="btn btn-sm btn-clean btn-icon show-invoice-btn" title="Show"  data-toggle="modal" data-target="#show-{{$invoice->id}}">
														<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Devices\Display1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3"/>
																<path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000"/>
															</g>
														</svg><!--end::Svg Icon--></span>
														</span>
													</a>
												</td>
											</tr>
											@endif
											
										@endforeach 
									</tbody>
								</table>
							</div>
							<!--end::Table-->
							<div class="d-block text-center ">
								<a href="{{url('invoices')}}" class="btn text-primary mb-4">
									More
								</a>
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 1-->
				</div>
				<div class="col-lg-6 col-xxl-6">
					<!--begin::Advance Table Widget 1-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Customers Stats</span>
							<span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{count(Helper::customers())}}+ customers</span>
							</h3>
							<div class="card-toolbar">
								<a  data-toggle= "modal" data-target="#new-customer"class="btn btn-success font-weight-bolder font-size-sm">
								<span class="svg-icon svg-icon-md svg-icon-white">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Add New Customer</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Customer</th>
											<th scope="col">Phone</th>
											<th scope="col">Created At</th>
										</tr>
									</thead>
									<tbody>
										@foreach (Helper::customersLimits(5) as $customer)
											<tr>
												<th scope="row">
													<a class="text-dark-75 mt-3 d-block" href="{{url('customers/'. $customer->id)}}" >
														{{$customer->id}}
													</a>
												</th>
												<td  class="datatable-cell">
													<a style="width: 250px;" href="{{url('customers/'. $customer->id)}}">
														<div class="d-flex align-items-center">
															@if (Helper::avatarCheck($customer->avatar))
																<div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
																	<img class="" src="{{asset('uploads/images/avatars/'.$customer->avatar)}}" alt="photo" />
																</div>
															@else
																<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
																	<span class="symbol-label font-size-h4">
																		{{$customer->name[0]}}
																	</span>
																</div>
															@endif
														   
															<div class="ml-3">
																<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ucwords($customer->name)}}</div>
																<span  class="text-muted font-weight-bold text-hover-primary">{{$customer->email}}</span>
															</div>
														</div>
													</a>
												</td>
												<td>{{$customer->phone}}</td>
												<td>{{$customer->created_at->format('d M h:m')}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!--end::Table-->
							<div class="d-block text-center ">
								<a href="{{url('customers')}}" class="btn text-primary mb-4">
									More
								</a>
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 1-->
				</div>
				<div class="col-lg-6 col-xxl-6">
					<!--begin::Advance Table Widget 1-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Quotations Stats</span>
							<span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{count(Helper::pendingQuotes())}}+ new Quotations</span>
							</h3>
							<div class="card-toolbar">
								<a href="{{url('quotations/create')}}" target="_blank" class="btn btn-success font-weight-bolder font-size-sm">
								<span class="svg-icon svg-icon-md svg-icon-white"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
										<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
									</g>
									</svg><!--end::Svg Icon-->
								</span>Add New Quote</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Customer</th>
											<th scope="col">Status</th>
											<th scope="col">Created Dete</th>
											
										</tr>
									</thead>
									<tbody>
										@if (Helper::PendingQuotes())
											@foreach (Helper::PendingQuotes() as $quote)
											<tr>
												<th scope="row">
													<a class="text-dark-75 mt-3 d-block" href="{{url('quotations/'. $quote->id)}}">
														{{$quote->id}}
													</a>
												</th>
													<td  class="datatable-cell">
														<a style="width: 250px;" href="{{url('quotations/'. $quote->id)}}">
															<div class="d-flex align-items-center">
																@if ($quote->status == 1)
																	<div class="symbol symbol-40 symbol-circle symbol-light-danger"><span class="symbol-label font-size-h4">{{$quote->name[0]}}</span></div>
																@else 
																	<div class="symbol symbol-40 symbol-circle symbol-light-success"><span class="symbol-label font-size-h4">{{$quote->name[0]}}</span></div>
																@endif
																<div class="ml-3">
																	<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ucwords($quote->name)}}</div>
																	<span  class="text-muted font-weight-bold text-hover-primary">{{$quote->email}}</span>
																</div>
															</div>
														</a>
													</td>
													<td>
														@if (!empty($quote->status))
															@if ($quote->status == 1)
																<span class="label label-inline label-light-danger font-weight-bold">
																	Pending
																</span>
															@else 
																<span class="label label-inline label-light-primary font-weight-bold">
																	Closed
																</span>
															@endif
														@endif
													</td>
													<td>{{$quote->created_at->format('d M h:m')}}</td>
											</tr>
											@endforeach
										@endif
										
									</tbody>
								</table>
							</div>
							<!--end::Table-->
							<div class="d-block text-center ">
								<a href="{{url('quotations')}}" class="btn text-primary mb-4">
									More
								</a>
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 1-->
				</div>
				
				<div class="col-lg-6 col-xxl-6">
					<!--begin::Advance Table Widget 1-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Projects Stats</span>
								@if (Helper::sortedProjects())
									<span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{count(Helper::sortedProjects()) > 0 ? count(Helper::sortedProjects()) : 0 }}+ new Projects</span>
								@else
									<span class="text-muted mt-3 font-weight-bold font-size-sm">New Projects</span>
								@endif
							</h3>
							<div class="card-toolbar">
								<a data-toggle= "modal" data-target="#new-project" class="btn btn-success font-weight-bolder font-size-sm">
								
								<span class="svg-icon svg-icon-md svg-icon-white"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\Folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
									</g>
								</svg><!--end::Svg Icon--></span>
								Add New Project</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Project</th>
											{{--  <th scope="col">Customer</th>
											<th scope="col">Start Date</th>  --}}
											<th scope="col">End Date</th>
											<th scope="col">Progress</th>
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										@if (Helper::sortedProjects(10))
											@foreach (Helper::sortedProjects(10) as $project)
												<tr>
													<th scope="row">
														<a class="text-dark-75 mt-3 d-block" href="{{url('projects/'. $project->id)}}">
															{{$project->id}}
														</a>
													</th>
													<td  class="datatable-cell">
														<a style="width: 250px;" href="{{url('projects/'. $project->id)}}">
															<div class="d-flex align-items-center">
																@if (Helper::fileExists($project->avatar, '/uploads/images/logos/projects'))
																	<div class="symbol symbol-40 symbol-sm flex-shrink-0  ">
																		<img src="{{asset('uploads/images/logos/projects/'.$project->avatar)}}" alt="photo" />
																	</div>
																@else
																	<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-success">
																		<span class="symbol-label font-size-h4">
																			{{$project->name[0]}}
																		</span>
																	</div>
																@endif
																<div class="ml-3">
																	<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ucwords($project->name)}}</div>
																	@if (!empty($project->technologies))
																		@if(count(Helper::technologies()) > 0)
																			<span class="text-muted font-weight-bold text-muted d-block">
																				@foreach (Helper::technologies() as $technology)
																					@if(in_array( $technology->name, json_decode($project->technologies)))
																						@if ($loop->last)
																							{{$technology->name}}
																						@else
																							{{$technology->name}},
																						@endif
																					@endif
																				@endforeach
																			</span>
																		@endif           
																	@endif
																</div>
															</div>
														</a>
													</td>
													{{--  <td  class="datatable-cell">
														<a style="width: 250px;" href="{{url('customers/'. $project->user->id)}}">
															<div class="d-flex align-items-center">
																@if (Helper::avatarCheck($project->user->avatar))
																	<div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
																		<img class="" src="{{asset('uploads/images/avatars/'.$project->user->avatar)}}" alt="photo" />
																	</div>
																@else
																	<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
																		<span class="symbol-label font-size-h4">
																			{{$project->user->name[0]}}
																		</span>
																	</div>
																@endif
																<div class="ml-3">
																	<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$project->user->name}}</div>
																	<span  class="text-muted font-weight-bold text-hover-primary">{{$project->user->email}}</span>
																</div>
															</div>
														</a>
													</td>
													<td class="pt-5">{{$project->start_date}}</td>  --}}
													<td class="pt-5">{{ date('d M', strtotime($project->end_date)) }}</td>
													<td class="pt-5">
														@if ($project->progress < 20)
															<div class="d-flex flex-column w-100 mr-2">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
																	<span class="text-muted font-size-sm font-weight-bold">Progress</span>
																</div>
																<div class="progress progress-xs w-100">
																<div class="progress-bar bg-danger" role="progressbar" style="width: 5%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</div>
														@elseif ($project->progress <= 40)
															<div class="d-flex flex-column w-100 mr-2">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
																	<span class="text-muted font-size-sm font-weight-bold">Progress</span>
																</div>
																<div class="progress progress-xs w-100">
																<div class="progress-bar bg-primary" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</div>
														@elseif ($project->progress <= 60)
															<div class="d-flex flex-column w-100 mr-2">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
																	<span class="text-muted font-size-sm font-weight-bold">Progress</span>
																</div>
																<div class="progress progress-xs w-100">
																<div class="progress-bar bg-info" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</div>
														@elseif ($project->progress <= 80)
															<div class="d-flex flex-column w-100 mr-2">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
																	<span class="text-muted font-size-sm font-weight-bold">Progress</span>
																</div>
																<div class="progress progress-xs w-100">
																<div class="progress-bar bg-warning" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</div>
														@elseif ($project->progress <= 100)
															<div class="d-flex flex-column w-100 mr-2">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
																	<span class="text-muted font-size-sm font-weight-bold">Progress</span>
																</div>
																<div class="progress progress-xs w-100">
																<div class="progress-bar bg-success" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</div>
														@endif
														
													</td>
													<td class="pt-5">
														@if ($project->status == 0)
															<span class="label label-inline label-light-danger font-weight-bold">
																Pending
															</span>
														@elseif ($project->status == 1)
															<span class="label label-inline label-light-primary font-weight-bold">
																In Progress
															</span>
														@elseif ($project->status == 2)
															
															<span class="label label-inline label-light-warning font-weight-bold">
																Waiting Customer
															</span>
														@elseif ($project->status == 3)
															<span class="label label-inline label-light-success font-weight-bold">
																Completed
															</span>
														@elseif ($project->status == 4)
															<span class="label label-inline label-dark font-weight-bold">
																Canceled
															</span>
														@endif
													</td>
												</tr>
											@endforeach
										@endif
										
									</tbody>
								</table>
							</div>
							<div class="d-block text-center ">
							<a href="{{url('projects')}}" class="btn text-primary mb-4">
									More
								</a>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 1-->
				</div>

				<div class="col-lg-6 col-xxl-6">
					<!--begin::Advance Table Widget 1-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Last Tasks</span>
							<span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{count(Helper::lastTasks(10))}}+ new tasks</span>
							</h3>
							<div class="card-toolbar">
								<a data-toggle= "modal" data-target="#new-task" class="btn btn-success font-weight-bolder font-size-sm">
								
								<span class="svg-icon svg-icon-md svg-icon-white"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\Folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
									</g>
								</svg><!--end::Svg Icon--></span>
								Add New Task</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-0">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Task</th>
											<th scope="col">Project</th>
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										@if (count(Helper::lastTasks(10)) > 0)
										@foreach (Helper::lastTasks(10) as $task)
											<tr>
												<th scope="row">
													<a class="text-dark-75 mt-3 d-block" href="{{url('tasks/'. $task->id)}}">
														{{$task->id}}
													</a>
												</th>
												<th scope="row">
													<a class="text-dark-75 mt-3 d-block" href="{{url('tasks/'. $task->id)}}">
														{{ucwords($task->name)}}
													</a>
												</th>
												<td  class="datatable-cell">
													<a style="width: 250px;" href="{{url('projects/'. $task->id)}}">
														<div class="d-flex align-items-center">
															@if (Helper::fileExists($task->project->avatar, '/uploads/images/logos/projects'))
																<div class="symbol symbol-40 symbol-sm flex-shrink-0  ">
																	<img src="{{asset('uploads/images/logos/projects/'. $task->project->avatar)}}" alt="photo" />
																</div>
															@else
																<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-success">
																	<span class="symbol-label font-size-h4">
																		{{$task->project->name[0]}}
																	</span>
																</div>
															@endif
															
															<div class="ml-3">
																<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ucwords($task->project->name)}}</div>
																@if (!empty($task->project->technologies))
																	@if(count(Helper::technologies()) > 0)
																		<span class="text-muted font-weight-bold text-muted d-block">
																			@foreach (Helper::technologies() as $technology)
																				@if(in_array( $technology->name, json_decode($task->project->technologies)))
																					@if ($loop->last)
																						{{$technology->name}}
																					@else
																						{{$technology->name}},
																					@endif
																				@endif
																			@endforeach
																		</span>
																	@endif           
																@endif
															</div>
														</div>
													</a>
												</td>
												<td class="pt-5">
													@if ($task->status == 0)
														<span class="label label-inline label-light-danger font-weight-bold">
															Pending
														</span>
													@elseif ($task->status == 1)
														<span class="label label-inline label-light-primary font-weight-bold">
															In Progress
														</span>
													@elseif ($task->status == 2)
														<span class="label label-inline label-light-warning  font-weight-bold">
															Waiting Customer
														</span>
													@elseif ($task->status == 3)
														<span class="label label-inline label-light-success font-weight-bold">
															
															Completed
														</span>
													@endif
												</td>
											</tr>
										@endforeach
										@else 
											<div class="d-block text-center ">
												<a  data-toggle= "modal" data-target="#new-task" class="btn text-primary mb-4">
													Add Task
												</a>
											</div>
										@endif
									</tbody>
								</table>
							</div>
								
							
							<div class="d-block text-center ">
								<a href="{{url('tasks')}}" class="btn text-primary mb-4">
									More
								</a>
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 1-->
				</div>
				<div class="col-lg-12 col-xxl-12">
					<!--begin::Advance Table Widget 1-->
					<div class="card card-custom card-stretch gutter-b" >
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Projects Time Allocation</span>
							<span class="text-muted mt-3 font-weight-bold font-size-sm">Top 6 Projects Estimated Time Allocation</span>
							</h3>
							
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0  pb-3">
							<div id="chartdiv"></div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 1-->
				</div>
				
			</div>
			<!--end::Row-->
			
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
@endsection
@section('modals')
	<!--begin::New customer Modal-->
	<div class="modal fade wide-modal" id="new-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">New Ccustomer</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				@include('customers.create')
			</div>
		</div>
		</div>
	</div>
	<!--end::New customer Modal-->
    <!--begin::New project Modal-->
    <div class="modal fade wide-modal" id="new-project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('projects.create')
            </div>
        </div>
        </div>
    </div>
	<!--end::New project Modal-->
	<!--begin::New invoice Modal-->
    <div class="modal fade widest-modal" id="new-invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Invoice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('invoices.create')
            </div>
        </div>
        </div>
	</div>
	<!--end::New invoice Modal-->
	<!--begin::New task Modal-->
    <div class="modal fade wide-modal" id="new-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('tasks.create')
            </div>
        </div>
        </div>
    </div>
    <!--end::New task Modal-->
@endsection
@section('scripts')
	<!--begin::Page Vendors(used by this page)-->
	<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
	<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
	<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('assets/js/add/add-invoice.js')}}"></script>

	<script>
        $(document).ready(function(){
			
            // New Project Scripts
            $('.daterangepicke').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary'
            }, function(start, end, label) {
                $('.daterangepicke .form-control').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
            }); 
            $('.kt-selectpicker').selectpicker();
			
			// New Invoice Scripts
            window.setInterval(function(){
                var qty1 = $('input[name="order[0][qty]"]');
                var price1 = $('input[name="order[0][price]"]');
                var total_all= qty1.val() * price1.val();

                var qty2 = $('input[name="order[1][qty]"]');
                var price2 = $('input[name="order[1][price]"]');

                var qty3 = $('input[name="order[2][qty]"]');
                var price3 = $('input[name="order[2][price]"]');

                var qty4 = $('input[name="order[3][qty]"]');
                var price4 = $('input[name="order[3][price]"]');

                var qty5 = $('input[name="order[4][qty]"]');
                var price5 = $('input[name="order[4][price]"]');
                
                if (qty2.length && price2.length) {
                    var total_2 = qty2.val() * price2.val();
                    var total_all = total_all + total_2 ;
                }

                if (qty3.length && price3.length) {
                    var total_3 = qty3.val() * price3.val();
                    var total_all = total_all + total_3 ;
                }

                if (qty4.length && price4.length) {
                    var total_4= qty4.val() * price4.val();
                    var total_all = total_all + total_4 ;
                }

                if (qty5.length && price5.length) {
                    var total_5 = qty5.val() * price5.val();
                    var total_all = total_all + total_5 ;
                }
                var sub_total = total_all;
                var grand_total= total_all + ($('#vat').val()/100 * total_all );
                $('#sub').text(sub_total + ' SAR');
                $('#sub_input').attr('value', sub_total);
                
                $('#grand').text(grand_total + ' SAR');
                $('#grand_input').attr('value', grand_total);
			}, 1000);

			$('.basic-datapicker').datepicker({
				rtl: KTUtil.isRTL(),
				orientation: "bottom left",
				todayHighlight: true
			});

			// Profit Charts Scripts
			var profit_chart = function() {
				var element = document.getElementById("yearly_sales");
				var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'primary';
				var height = parseInt(KTUtil.css(element, 'height'));
				var year = {!! json_encode(Helper::yearlyProfit())!!};

				if (!element) {
					return;
				}

				var options = {
					series: [{
						name: 'Net Profit',
						data: year
					}],
					chart: {
						type: 'area',
						height: height,
						toolbar: {
							show: false
						},
						zoom: {
							enabled: false
						},
						sparkline: {
							enabled: true
						}
					},
					plotOptions: {},
					legend: {
						show: false
					},
					dataLabels: {
						enabled: false
					},
					fill: {
						type: 'gradient',
						opacity: 1,
						gradient: {

							type: "vertical",
							shadeIntensity: 0.55,
							gradientToColors: undefined,
							inverseColors: true,
							opacityFrom: 1,
							opacityTo: 0.2,
							stops: [25, 50, 100],
							colorStops: []
						}
					},
					stroke: {
						curve: 'smooth',
						show: true,
						width: 3,
						colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
					},
					xaxis: {
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						axisBorder: {
							show: false,
						},
						axisTicks: {
							show: false
						},
						labels: {
							show: false,
							style: {
								colors: KTApp.getSettings()['colors']['gray']['gray-500'],
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							}
						},
						crosshairs: {
							show: false,
							position: 'front',
							stroke: {
								color: KTApp.getSettings()['colors']['gray']['gray-300'],
								width: 1,
								dashArray: 3
							}
						},
						tooltip: {
							enabled: true,
							formatter: undefined,
							offsetY: 0,
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							}
						}
					},
					yaxis: {
						min: -10000,
						max: 50000,
						labels: {
							show: false,
							style: {
								colors: KTApp.getSettings()['colors']['gray']['gray-500'],
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							}
						}
					},
					states: {
						normal: {
							filter: {
								type: 'none',
								value: 0
							}
						},
						hover: {
							filter: {
								type: 'none',
								value: 0
							}
						},
						active: {
							allowMultipleDataPointsSelection: false,
							filter: {
								type: 'none',
								value: 0
							}
						}
					},
					tooltip: {
						style: {
							fontSize: '12px',
							fontFamily: KTApp.getSettings()['font-family']
						},
						y: {
							formatter: function(val) {
								return  + val + " SAR"
							}
						}
					},
					colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
					markers: {
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
						strokeWidth: 3
					},
					padding: {
						top: 0,
						bottom: 0
					}
				};

				var chart = new ApexCharts(element, options);
				chart.render();
			}

			profit_chart();
			// $('.change-task-status').click(function(){
			// 	var id = $(this).attr('id').replace( /^\D+/g, '');
			// 	$(this).parent('form').submit();
			// 	console.log(id);
			// });
            
        });
       
    </script>
@endsection
