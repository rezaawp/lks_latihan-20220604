<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<body>
	<!-- NAVBAR -->
	<nav class="navbar-fixed container-fluid mycolor" style="overflow: hidden;">
		<div class="container-fluid mycolor d-inline-flex">
			<div class="container f-color-white" style="padding-top: 0.4px; padding-bottom: 0.1px; padding-left: 25px">
				<h1>Reza Store</h1>				
			</div>
			<div class="container d-flex justify-content-end ms-auto" style="padding-top: 0.4px; padding-bottom: 0.1px; padding-left: 25px">
				<p><button class="btn"><a href="{{ route('home') }}" class="btn">Home</a></button></p>
				<p><button class="btn mx-2"><a href="{{ route('cart') }}" class="btn">Cart</a></button></p>
				<p><button class="btn"><a href="{{ route('logout') }}" class="btn">Logout</a></button></p>
			</div>
		</div>
	</nav>
	<div class="container pt-5" style="padding-top: 70px">
		<div class="container px-5">
			@yield('content')			
		</div>
	</div>
	<footer>
		<div class="container-fluid mycolor d-flex justify-content-center f-color-white">
			<div class="container">
				<h1>Ini footer </h1>
			</div>
		</div>
	</footer>
</body>
</html>