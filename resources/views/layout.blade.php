<!DOCTYPE html>
<html>
	<head>
		<title>PokeMart</title>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- bootstrap-css -->
		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
		<!--// bootstrap-css -->
		<!-- css -->
		<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
		<link rel="stylesheet" href="{{asset('css/windS.css')}}" type="text/css" media="all" />
		<!--// css -->
		<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css" media="all">
		<link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="{{asset('css/cm-overlay.css')}}" />
		<link href="{{asset('css/imagehover.css')}}" rel="stylesheet" media="all">
		<link rel="stylesheet" href="{{asset('css/percircle.css')}}">
		<!-- font-awesome icons -->
		<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 
		<!-- //font-awesome icons -->
		<!-- font -->
		<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
		<!-- //font -->
		<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.js')}}"></script>
		<!-- menu -->
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
		<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
		<!-- //menu -->
		<script src="{{asset('js/owl.carousel.js')}}"></script>

		<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
		<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
		
		<link href="{{asset('css/dataTables.css')}}" rel="stylesheet"> 
		<script src="{{asset('js/jquery.datatables.js')}}"></script>
	</head>

	<nav class="navbar navbar-default fixed">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="{{url('/')}}" class="title"><img src="{{asset('img/logo.png')}}" class="logo">PokeMart</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					@if(isset(Auth::user()->email))
						@if(Auth::user()->role_id == 1)
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pokemon<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{url('/InsertPokemon')}}">Insert Pokemon</a></li>
									<li><a href="{{url('/PokemonList')}}">Pokemon List</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Element<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{url('/InsertElement')}}">Insert Element</a></li>
									<li><a href="{{url('/UpdateElement')}}">Update Element</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{url('/UpdateUser')}}">Update User</a></li>
									<li><a href="{{url('/DeleteUser')}}">Delete User</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaction<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{url('/UpdateTransaction')}}">Update Transaction</a></li>
									<li><a href="{{url('/DeleteTransaction')}}">Delete Transaction</a></li>
								</ul>
							</li>
						@else
							<li><a href="{{url('/Profile')}}">Profile</a></li>
							<li><a href="{{url('/PokemonList')}}">Pokemon</a></li>
							<li><a href="{{url('/Cart')}}">Your Cart</a></li>
						@endif
					@else
						<li><a href="{{url('/Login')}}">Login</a></li>
						<li><a href="{{url('/Register')}}">Register</a></li>
					@endif
				</ul>
				@if(isset(Auth::user()->email))
					<ul class="nav navbar-nav navbar-right">
						<li><a>Hi, {{Auth::user()->email}}</a></li>
						<li><a href="{{url('/Logout')}}">Logout</a></li>
					</ul>
				@endif
			</div>
		</div>
	</nav>


	<body>

		<div class="mascot">
			<img src="{{asset('img/pikachu.png')}}">
		</div>
		<div class="content-box">
			<div class="content">
				@yield('content')
			</div>
		</div>

		<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/restaurantDetail.js')}}"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
	</body>


	<footer>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p>Copyright © 2017 SS. All Rights reserved.</p>
		</div>
	</footer>
</html>