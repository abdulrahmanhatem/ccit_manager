<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CCIT Survey, Quotation, Review and Register form CCIT">
    <meta name="author" content="CCIT">
    <title>CCIT</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('quotes/img/favicon.ico')}}" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('quotes/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
	<link href="{{asset('quotes/css/menu.css')}}" rel="stylesheet">
    <link href="{{asset('quotes/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('quotes/css/vendors.css')}}" rel="stylesheet">

	<!-- EXTRA CSS RTL STYLES ONLY -->
    <link href="{{asset('quotes/css/extra_rtl_styles.css')}}" rel="stylesheet">

    <!-- OUR CUSTOM CSS -->
    <link href="{{asset('quotes/css/custom.css')}}" rel="stylesheet">
	
	<!-- MODERNIZR MENU -->
	<script src="{{asset('quotes/js/modernizr.js')}}"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	

</head>

<body class="ltr">
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
	
	<nav>
		<ul class="cd-primary-nav">
			<li><a href="https://CCIT.sa" class="animated_link">Home</a></li>
			<li><a href="https://ccit.sa/about-us" class="animated_link">About US</a></li>
			<li><a href="https://ccit.sa/portfolio" class="animated_link">Portfolio</a></li>
			<li><a href="https://ccit.sa/fullpage/our-products" class="animated_link">Our Products</a></li>
			<li><a href="{{ url('quotation') }}" class="animated_link">Get Quote</a></li>
			<li><a href="https://clientarea.ccit.sa/" class="animated_link">Client Area</a></li>
			<li><a href="https://ccit.sa/contact/" class="animated_link">Contact Us</a></li>
		</ul>
	</nav>
	<!-- /menu -->
	
	<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-6 content-left">
				<div class="content-left-wrapper">
					<a href="https://CCIT.sa" id="logo"><img src="{{asset('quotes/img/logo.png')}}" alt="" width="100" height="35"></a>
					<div>
						<figure><img src="{{asset('quotes/img/info_graphic_3.svg')}}" alt="" class="img-fluid"></figure>
						<h2>Quotation CCIT</h2>
						<p>You will be answered within 48 hrs maximum.</p>
						<!--<a href="#0" class="btn_1 rounded">Purchase this template</a>
						<a href="#start" class="btn_1 rounded mobile_btn">Start Now!</a>-->
					</div>
					<div class="copy">© 2021 CCIT</div>
				</div>
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						{!! Form::open(['action'=>'QuoteController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data'])!!}
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div class="step" id="features_list">
									<h3 class="main_question"><strong>1/5</strong>What are the services you need?</h3>
									@foreach (Helper::projectFeatures() as $key => $feature)
										<div class="form-group" >
											<label class="container_check version_2">{{$feature}}
												<input type="checkbox" name="features[]" value="{{$key}}" class="required checkbox" data="{{ $feature }}">
												<span class="checkmark"></span>
											</label>
										</div>
									@endforeach
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>2/5</strong>What are the services/products your project will provide?*</h3>
									<div class="form-group add_top_30">
										<label>Services/Products </label>
										<textarea name="services" class="form-control required" style="height:150px;" placeholder="Services/Products ..." onkeyup="getVals(this, 'additional_message');"></textarea>
									</div>
									<div class="form-group add_top_30">
										<label>Is your project active now? (write You prject link below)</label>
										<input name="project_link" class="form-control" placeholder="Your Project Link" onkeyup="getVals(this, 'project_link');">
									</div>
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>3/5</strong>What is the Budget estimation For This Project? *</h3>
									
									
									<label for="budget">Price range:</label>
									<input type="text" name="budget" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;" value="30000 - 50000">
									 
									  <div id="slider-range"></div>
									
									{{-- <div class="budget_slider">
										<span>SAR</span>
										<input type="range" name="budget" min="10000" max="200000" step="15000" value="10000" data-orientation="horizontal" onchange="getVals(this, 'budget');">
										
									</div> --}}
									<!--<p>Lorem ipsum dolor sit amet, esse mazim disputando vix in. Quem reprimique eum ea, vim cu <strong>partem persius</strong> efficiantur.</p>
									<p>Ex has option delectus. Duo ex iuvaret delicata pertinacia, no nam tale summo euismod.</p>--></p>
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>4/5</strong>Personal Info: </h3>
									<div class="form-group">
										<input type="text" name="name" class="form-control required" placeholder="Client Name">
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control required" placeholder="Email">
									</div>
									<div class="form-group">
										<input type="text" name="phone" class="form-control" placeholder="Phone">
									</div>
									<div class="form-group">
										<input type="text" name="city" class="form-control required" placeholder="City">
									</div>
								</div>
								<!-- /step-->
								<div class="submit step">
									<h3 class="main_question"><strong>5/5</strong>Summary</h3>
									<div class="summary">
										<ul>
											<li><strong>1</strong>
												<h5> Services you need</h5>
												<p id="features"></p>
											</li>
											<li><strong>2</strong>
												<h5>Services your projct will provide</h5>
												<p id="additional_message"></p>
												<h5>Your Project Link</h5>
												<p id="project_link"></p>
											</li>
											<li><strong>3</strong>
												<h5>Budget estimation for your project </h5>
												<p><span id="budget"></span></p>
											</li>
										</ul>
									</div>
								</div>
								<!-- /step-->
							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard">
								<button type="button" name="backward" class="backward">Previos</button>
								<button type="button" name="forward" class="forward">Next</button>
								<button type="submit" name="process" class="submit">Send</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /menu button -->
	
	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!-- COMMON SCRIPTS -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
		$( "#slider-range" ).slider({
		range: true,
		min: 10000,
		max: 100000,
		values: [ 25000, 50000 ],
		step:  10000,
		slide: function( event, ui ) {
			var range_amount = ui.values[ 0 ] + " - " + ui.values[ 1 ] + '  SAR';
			$( "#amount" ).val(range_amount);
			$( "#amount" ).attr('value', ui.values[ 0 ] + " - " + ui.values[ 1 ] );
		}
		});
		$( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
		" - " + $( "#slider-range" ).slider( "values", 1 ));
	} );
	</script>

	{{-- <script src="{{asset('quotes/js/jquery-3.5.1.min.js')}}"></script> --}}
    <script src="{{asset('quotes/js/common_scripts_rtl.min.js')}}"></script>
	<script src="{{asset('quotes/js/velocity.min.js')}}"></script>
	<script src="{{asset('quotes/js/functions.js')}}"></script>
	<script src="{{asset('quotes/js/file-validator.js')}}"></script>

	<!-- Wizard script -->
	<script src="{{asset('quotes/js/quotation_func.js')}}"></script>


</body>
</html>