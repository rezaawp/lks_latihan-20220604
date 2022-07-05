<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mata Pelajaran</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h2>{{ Auth()->user()->nama_lengkap }}</h2>
		<span>Silahkan input pelajaran yang anda ajarkan kepada murid</span> <br> <br>

		<form action="{{ route('guru.mapel.store') }}" method="post" class="d-inline-flex">
			@csrf
			<input class="form-control" type="text" name="mapel" style="width:200px">
			<button type="submit" class="btn btn-primary">Tambah</button>
		</form>
		<table class="table" style="width: 250px;">
			<thead>
				<th scope="col">#</th>
				<th scope="col">Mata Pelajaran</th>
				<th scope="col">Aksi</th>
			</thead>

			@php
				$id = 1;
			@endphp
			@foreach($mapel as $item)
				<tbody>
					<td>{{ $id }}</td>
					<td>{{ $item->mata_pelajaran }}</td>
					<td>
						<form action="{{ route('guru.mapel.destroy', ['id' => $item->id]) }}" method="post">
							@csrf
							@method('delete')
							<button class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tbody>
				@php
					$id++;
				@endphp
			@endforeach
		</table>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>