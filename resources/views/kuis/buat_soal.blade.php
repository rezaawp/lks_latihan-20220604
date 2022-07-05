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
			<h3>Membuat Soal</h3>
		</div>

		@if(session()->has('sukses'))
		<script type="text/javascript">
			alert({{ session('sukses') }});
		</script>
		@endif

		<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
			<form class="d-inline-flex" action="{{ route('kuis.CountSoal') }}" method="post">
				@csrf
				<span class="mt-1">Total Soal :</span> <input type="number" name="total_soal" class="form-control ms-2" style="width: 30%; height: 35px;" value="{{ $total_soal }}"> <br>

				<button href="" class="btn btn-success ms-2" style="height: 35px;">Set</button>
			</form>
		</div>
		

		<!-- Start session -->
		@php
			$id = 1;
		@endphp


		@if ($total_soal > 0)
			<form action="{{ route('kuis.doBuatSoal') }}" method="post">
				@csrf
				<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
					<span class="mt-1">Tema :</span> 
					<select name="mapel" class="form-control mb-2" style="height: 35px;">
						@foreach($mapel as $item)
							<option value="{{ $item->mata_pelajaran }}">{{ $item->mata_pelajaran }}</option>	
						@endforeach
					</select>
				</div>
			@for($i = 1; $i <= $total_soal; $i++)
				<!-- Star card soal -->
					<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
						<div class="row mb-3">
							<div class="col-2 pt-1">
								{{ $id }} .
							</div>

							<div class="col-10">
								<textarea class="form-control" id="" rows="50" name="soal{{ $id }}"></textarea>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-2 pt-1">
								<span class="text-center">A . </span>
							</div>

							<div class="col-10">
								<textarea class="form-control" id="" rows="10" name="a{{ $id }}"></textarea>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-2 pt-1">
								<span class="text-center">B . </span>
							</div>

							<div class="col-10">
								<textarea class="form-control" id="" rows="10" name="b{{ $id }}"></textarea>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-2 pt-1">
								<span class="text-center">C . </span>
							</div>

							<div class="col-10">
								<textarea class="form-control" id="" rows="10" name="c{{ $id }}"></textarea>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-2 pt-1">
								<span class="text-center">D . </span>
							</div>

							<div class="col-10">
								<textarea class="form-control" id="" rows="10" name="d{{ $id }}"></textarea>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-7 pt-1">
								<span class="text-center"><strong>Jawaban Benar : </strong></span>
							</div>

							<div class="col-5">
								<textarea class="form-control" id="" rows="10" name="benar{{ $id }}"></textarea>
							</div>
						</div>
						
					</div>
					<!-- End card soal -->
					@php
						$id++;
					@endphp
			@endfor
			<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
				<button type="submit" class="btn btn-primary">Buat</button>
			</div>
		@endif
		<!-- End session -->
			</form>




	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>