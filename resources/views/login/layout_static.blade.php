<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<body style="background-color: rgb(246, 227, 255);">
	<div class="container d-flex justify-content-center">
		<form action=@yield('action') method="post">
			@csrf
			<center><h1 class="">@yield('title')</h1></center> <br>
			<input type="text" name="nis" class="form-control my-2" placeholder=@yield('email/placeholder')> <br>
			<input type="password" name="password" class="form-control mb-2" placeholder=@yield('password/placeholder')> <br>
			<a href="" class="text-decoration-none">Don't have already account? Register</a> <br>
			<button type="submit" class="btn my-2">Login</button>
		</form>
	</div>
</body>
</html>