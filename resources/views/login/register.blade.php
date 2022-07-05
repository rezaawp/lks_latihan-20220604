<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body class="mycolor">
		<div class="container d-flex justify-content-center">
			<form method="post" action="{{ route('login.store')}}">
				@csrf
				<center><h1 class="f-color-white">REGISTER</h1></center> <br>
				<table>
					<tr>
						<td class="f-color-white">Nama Lengkap</td>
						<td class="f-color-white"> : <input type="text" name="nama_lengkap" class="form-control"> <br></td>				
					</tr>
					<tr>
						<td class="f-color-white">No HP</td>
						<td class="f-color-white"> : <input type="text" name="no_hp" class="form-control"> <br></td>				
					</tr>
					<tr>
						<td class="f-color-white">Alamat Lengkap</td>
						<td class="f-color-white"> : <input type="text" name="alamat_lengkap" class="form-control"> <br></td>				
					</tr>
					<tr>x
						<td class="f-color-white">Email</td>
						<td class="f-color-white"> : <input type="email" name="email" class="form-control"> <br></td>				
					</tr>
					<tr>
						<td class="f-color-white">Password</td>
						<td class="f-color-white"> : <input type="password" name="password" class="form-control"> <br></td>				
					</tr>
					<tr>
						<td class="f-color-white">Konfirmasi Password</td>
						<td class="f-color-white"> : <input type="password" name="password2" class="form-control"> <br></td>				
					</tr>


				</table>

				<div class="container-fluid pt-1 pe-4 d-flex justify-content-end">
					<span class="f-color-white">Already account? </span><a href="{{ route('login') }}" class="f-color-white fw-bold"> Login</a>
				</div>

				<div class="container-fluid d-flex justify-content-end">
					<button type="submit" class="btn text-center my-1">Register</button>		
				</div>
			</form>
		</div>
</body>
</html>