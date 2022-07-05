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
		<div id="soal">
            <div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
                <h2>Soal : {{ $mapel }}</h2>
            </div>
			@for($x = 1; $x <= $total_soal; $x++)
			<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
				<span>{{ $id . '. ' .$soal[$indexSoal]->soal }}</span> <br> <br>
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
                    <div class="d-flex justify-content-end  ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                          </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('guru.doAmbilSoal') }}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Simpan Untuk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="ambil">Token : </label><input id="ambil" type="text" name="ambil{{ $id }}" class="form-control" style="height: 33px">
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{--  --}}
                    </div>
			</div>
			@php
				$id++;
				$indexSoal++;
			@endphp
			@endfor
		</div>

		@if(session()->has('jawaban'))
		<div class="container mycolor border-radius-5px box-shadow-title border-1px my-4 d-flex justify-content-end" style="width: 270px; background-color: rgb(246, 227, 255); display: block;">
			Jawaban nya adalah : {{ session('jawaban') }}
		</div>
		@endif
	</div>

	<script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>