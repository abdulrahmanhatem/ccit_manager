
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>CCIT - Login</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('assets/css/pages/login/login-3.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
		<link href="{{ asset('css/app.css')}}') }}" rel="stylesheet">
		<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="login-box">
			<!--begin::Login-->
			<div id="login-anime">
				<!--begin::Aside-->
				<div class="login-cont row">
					<!--begin: Aside Container-->
					<div class="welcome col-6">
						<!--begin: Aside header-->
						<a href="https://ccit.sa/" target="_blank" class="flex-column-auto mt-5">
							<img src="{{asset('assets/media/logos/logo.png')}}" class="max-h-70px" alt="" />
						</a>
						<!--end: Aside header-->
						<!--begin: Aside content-->
						<div class="flex-column-fluid d-flex flex-column justify-content-center">
							<h3 class="font-size-h1 mb-5 text-white"> Client Area</h3>
							{{-- <p class="font-weight-lighter text-white opacity-80">The ultimate Bootstrap, Angular 8, React &amp; VueJS frameworks for next generation web apps.</p> --}}
						</div>
						<!--end: Aside content-->
						<!--begin: Aside footer for desktop-->
						<div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10 copy-right">
							<div class="opacity-70 font-weight-bold text-white">© 2021 CCIT</div>
							{{--  <div class="d-flex">
								<a href="#" class="text-white">Privacy</a>
								<a href="#" class="text-white ml-10">Legal</a>
								<a href="#" class="text-white ml-10">Contact</a>
							</div>  --}}
						</div>
						<!--end: Aside footer for desktop-->
					</div>
					<!--end: Aside Container-->
					<!--begin::Aside-->
					<!--begin::Content-->
					<div class="login-form col-6" >
						<!--begin::Content body-->
						<div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
							<!--begin::Signin-->
							<div class="w-100">
								<!--begin::Form-->
							
								<form method="POST" action="{{ route('login') }}" class="form" novalidate="novalidate">
									@csrf
									<div class="form-group">
										<input id="email" type="email" class="form-control h-auto py-5 px-6" name="email" required autocomplete="email" autofocus placeholder ="Email">
							
									</div>
									<div class="form-group">
										<input id="password" type="password" class="form-control h-auto py-5 px-6" name="password" required autocomplete="current-password" placeholder="Password">
									</div>
									<!--begin::Action-->
									<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
										{{-- <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Forgot Password ?</a> --}}
										<button type="submit" id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
									</div>
									<!--end::Action-->
								</form> 
								<!--end::Form-->
							</div>
							<!--end::Signin-->
						</div>
						<!--end::Content body-->
						<!--begin::Content footer for mobile-->
						<div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
							<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2021 CCIT</div>
							<div class="d-flex order-1 order-sm-2 my-2">
								<a href="#" class="text-dark-75 text-hover-primary">Privacy</a>
								<a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>
								<a href="#" class="text-dark-75 text-hover-primary ml-4">Contact</a>
							</div>
						</div>
						<!--end::Content footer for mobile-->
					</div>
					<!--end::Content-->
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/js/particles.min.js')}}"></script>
		<script src="{{asset('assets/js/login-particles.js')}}"></script>
		<script src="{{asset('assets/js/stats.js')}}"></script>
		<script src="{{asset('assets/js/custom.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
        <script src="{{asset('assets/js/pages/custom/login/login-general.js')}}"></script>
        <script src="{{ asset('js/app.js')}}') }}" defer></script>
		<!--end::Page Scripts-->
		@include('partials.messeges')
	</body>
	<!--end::Body-->
</html>