<nav class="top-bar" data-topbar>
	<ul class="title-area">
		<li class="name">
			@if (Auth::check()) 
				<h1><a href="{{ route('dashboard') }}"><img src="../img/Logo.png" width="50px"> {{{$site_name}}}</a></h1>
			@else
				<h1><a href="{{ route('home') }}"><img src="../img/Logo.png" width="50px"> {{{$site_name}}}</a></h1>
			@endif
		</li>
	</ul>
	<section class="top-bar-section">
		<ul class="right">
			
			@if (Auth::check()) 
				<li class="has-dropdown"><a href="#">Welcome {{{ Auth::user()->first_name }}}</a>
					<ul class="dropdown">
							<li class=""><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
							<li class="divider"></li>
							<li class=""><a href="{{ URL::route('change-password') }}">Change Password</a></li>
							<li class="divider"></li>
							<li class=""><a href="{{ URL::route('logout') }}">Logout</a></li>
					</ul>
				</li>
			
			@else
				<span class="time"><?php echo date("l jS \of F Y"); ?></span>
			@endif
		</ul>
	</section>
</nav>
