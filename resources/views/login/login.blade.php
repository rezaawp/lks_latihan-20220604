<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<body class="mycolor">
	<div class="container d-flex justify-content-center">
		<form action="{{ route('login.auth') }}" method="post">
			@csrf
			<center><h1 class="f-color-white">LOGIN</h1></center> <br>
			<input type="email" name="email" class="form-control my-2" placeholder="Email"> <br>
			<input type="password" name="password" class="form-control mb-2" placeholder="Password"> <br>
			<a href="{{ route('register') }}" class="f-color-white text-decoration-none">Don't have already account? Register</a> <br>
			<button type="submit" class="btn my-2">Login</button>
		</form>
	</div>
</body>
</html>