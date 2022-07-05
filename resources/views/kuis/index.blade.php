<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin: auto; padding-left: 0.1; padding-right: 0.1;">
		<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
			<span>1. Kucing adalah salah satu makhluk hidup yang mempunyai ...</span> <br>
			<form action="{{ route('simpanJawaban') }}" method="post">
				@csrf
				<!-- A -->
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="ans" id="a" value="a">
				  <label class="form-check-label" for="a">
				    Baju
				  </label>
				</div>
				<!-- B -->
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="ans" id="b" value="b">
				  <label class="form-check-label" for="b">
				    Kacamata
				  </label>
				</div>
			  	<!-- C -->
			  	<div class="form-check">
				  <input class="form-check-input" type="radio" name="ans" id="c" value="c">
				  <label class="form-check-label" for="c">
				    Sepatu
				  </label>
				</div>
			  	<!-- D -->
			  	<div class="form-check">
				  <input class="form-check-input" type="radio" name="ans" id="d" value="d">
				  <label class="form-check-label" for="d">
				    Bulu
				  </label>
				</div>
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


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>