<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Soal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		{{ $mapels }}
	
		<table class="table">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Token</th>
				<th scope="col">Waktu</th>
				<th scope="col">Aksi</th>
				<th scope="col">Status</th>
			</tr>
			@php
				$id = 1;
			@endphp

			@foreach($mapel as $item)
				<tr>
					<td>{{ $id }}</td>
					<td>{{ $item->token }}</td>
					<td>
						<form method="post" action="{{ route('guru.mapel.setWaktu', ['token' => $item->token]) }}" class="d-inline-flex">
						@csrf
						<input type="" name="waktu" value="{{$item->waktu_menit}}" class="form-control">
						<button type="submit" class="btn btn-primary">Set</button>
						</form>
					</td>
					<td><a href="" class="btn btn-success">Lihat Soal</a></td>
					<td>
						<a id="status_online" href="{{ route('guru.listSoal.status', ['id' => $item->id, 'bool' => 1]) }}" style="color: black; display: none;">Online</a>

						<a id="status_offline" href="{{ route('guru.listSoal.status', ['id' => $item->id, 'bool' => 0]) }}" style="color: black; display: none;">Offline</a>
						<div class="form-check">
						  <input id="online" value="{{ $item->id }}" class="form-check-input" type="radio" name="status{{ $id }}" id="online" {{ $item->status == 1 ? "checked" : ""}}>
						  <label class="form-check-label" for="online">
						    Online
						  </label>
						</div>
						<div class="form-check">
						  <input id="offline" class="form-check-input" type="radio" name="status{{ $id }}" id="offline" {{ $item->status == 1 ? "" : "checked" }}>
						  <label class="form-check-label" for="offline">
						    Offline
						  </label></a>
						</div>
					</td>
				</tr>
				@php
					$id++;
				@endphp
			@endforeach
		</table>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script type="text/javascript">
		const online = document.getElementById('online');
		const offline = document.getElementById('offline');
		const status_online = document.getElementById('status_online');
		const status_offline = document.getElementById('status_offline');
		online.addEventListener("click", () => {
			status_online.click();		
		});
		offline.addEventListener("click", () => {
			status_offline.click();
		});	
	</script>
</body>
</html>