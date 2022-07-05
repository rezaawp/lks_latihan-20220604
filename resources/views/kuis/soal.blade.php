<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style type="text/css">
		.soal{
			display: none;
		}
	</style>
</head>
<body>
	<div class="container" style="margin: auto; padding-left: 0.1; padding-right: 0.1;">
		@php
			$id = 1;
			$indexSoal = 0;
		@endphp
		<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
			<input type="" name="" id="waktu" value="{{ $waktu }}" style="display: none ;">
			<input type="" name="" id="waktu_terpakai" value="{{ $waktu_terpakai }}" style="display: none ;">
			<h2 id="timer">00:00:00</h2>
		</div>
		<div id="soal">
			@for($x = 1; $x <= $total_soal; $x++)
			<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
				<span>{{ $id . '. ' .$soal[$indexSoal]->soal }}</span> <br> <br>
				<form action="{{ route('kuis.simpanJawaban', ['total_soal' => $total_soal, 'token' => $token, 'time' => $cookie_time_stat]) }}" method="post">
					@csrf
					<!-- A -->
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="ans{{ $id }}" id="a{{ $id }}" value="a">
					  <label class="form-check-label" for="a{{ $id }}">
					    {{ $soal[$indexSoal]->a }}
					  </label>
					</div>

					<!-- B -->
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="ans{{ $id }}" id="b{{ $id }}" value="b">
					  <label class="form-check-label" for="b{{ $id }}">
					    {{ $soal[$indexSoal]->b }}
					  </label>
					</div>
				  	<!-- C -->
				  	<div class="form-check">
					  <input class="form-check-input" type="radio" name="ans{{  $id }}" id="c{{ $id }}" value="c">
					  <label class="form-check-label" for="c{{ $id }}">
					    {{ $soal[$indexSoal]->c }}
					  </label>
					</div>
				  	<!-- D -->
				  	<div class="form-check">
					  <input class="form-check-input" type="radio" name="ans{{ $id }}" id="d{{ $id }}" value="d">
					  <label class="form-check-label" for="d{{ $id }}">
					    {{ $soal[$indexSoal]->d }}
					  </label>
					</div>
			</div>
			@php
				$id++;
				$indexSoal++;
			@endphp
			@endfor
		</div>
				<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4 d-flex justify-content-end" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			

		@if(session()->has('jawaban'))
		<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4 d-flex justify-content-end" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
			Jawaban nya adalah : {{ session('jawaban') }}
		</div>
		@endif
	</div>

	<script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>