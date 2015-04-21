<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>{{{$site_name}}} | Welcome</title>
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
	<script src="https://apis.google.com/js/client:platform.js" async defer></script>
	<script src="{{ asset('js/vendor/modernizr.js') }}"></script>
	<script src="{{ asset('js/vendor/signin-via-google.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp?key=AIzaSyAY1ZH_xaHfe3odWSlex-vfux6lwvs7D5I&sensor=true"></script>
	<script src="{{ asset('js/map.js') }}"></script>
</head>

<body>


<!-- Header and Navigation -->
	
	@include('layouts.nav')

<!-- END Header and Navigation -->
<!-- Content -->

	<div class="row">
		@yield('content')
	</div>


<!-- END Content -->
<!-- Footer -->

	<footer id="footer" class="row">
		<div class="large-12 columns">
			<hr />
			<div class="row">
				<div class="small-8 large-8 columns copyright">
					<p>Commonwealth of the Northern Mariana Islands Public School System</p>
				</div>
			</div>
		</div>
	</footer>

<!-- END Footer -->

	
	{!! HTML::script('js/vendor/jquery.js') !!}
	{!! HTML::script('js/foundation.min.js') !!}
	{!! HTML::script('js/moment.min.js') !!}
	{!! HTML::script('js/underscore.js') !!}
	{!! HTML::script('js/clndr.js') !!}
	{!! HTML::script('js/custom.js') !!}
	<script type="text/javascript">
		$(document).foundation();

	</script>

</body>
</html>
