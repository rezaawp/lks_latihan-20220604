<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container pt-2">
		<h2><a href="{{ route('guru.myProfile', ['id' => Auth()->user()->id]) }}" style="color: black;" class="text-decoration-none">{{ Auth()->user()->nama_lengkap }}</a></h2> <br>
		<a href="">Dashboard</a> <br>
		<a href="{{ route('guru.mySoal', ['id' => Auth()->user()->id]) }}">Soal</a> <br>
		<a href="{{ route('kuis.buat-soal') }}">Buat Soal</a> <br>
		<a href="{{ route('kuis.e-monitoring') }}">E-Monitoring</a> <br>
		<a href="">Murid</a> <br>
		<a href="{{ route('guru.mapel.index') }}">Mata Pelajaran</a>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

