<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<body style="background-color: rgb(246, 227, 255);">
	<div class="container d-flex justify-content-center">
		<form action="{{ route('kuis.login_auth', ['token' => $token]) }}" method="post">
			@csrf
			<center><h1 class="">LOGIN</h1></center> <br>
			@if(session()->has('register'))
				<h3>Untuk pendaftaran, silahkan hubungi wali kelas.</h3>
			@endif
			<input type="text" name="nis" class="form-control my-2" placeholder="NIS"> <br>
			<input type="password" name="password" class="form-control mb-2" placeholder="Password"> <br>
			<a href="{{ route('kuis.register', ['token' => $token]) }}" class="text-decoration-none">Don't have already account? Register</a> <br>
			<button type="submit" class="btn my-2">Login</button>
		</form>
	</div>
</body>
</html>