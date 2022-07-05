<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jurusan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h2>Operator</h2>
		<span>Silahkan input jurusan yang tersedia di sekolah anda</span> <br> <br>

		<form action="{{ route('kuis.operator.jurusan.store') }}" method="post" class="d-inline-flex">
			@csrf
			<input class="form-control" type="text" name="jurusan" style="width:200px">
			<button type="submit" class="btn btn-primary">Tambah</button>
		</form>
		<table class="table" style="width: 250px;">
			<thead>
				<th scope="col">#</th>
				<th scope="col">Jurusan</th>
				<th scope="col">Aksi</th>
			</thead>

			@php
				$id = 1;
			@endphp
			@foreach($jurusan as $item)
				<tbody>
					<td>{{ $id }}</td>
					<td>{{ $item->nama_jurusan }}</td>
					<td>
						<form action="{{ route('kuis.operator.jurusan.destroy', ['id' => $item->id]) }}" method="post">
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