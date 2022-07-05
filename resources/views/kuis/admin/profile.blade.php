<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container pt-2">

		<h2 class="ms-auto">{{ Auth()->user()->nama_lengkap }}</h2>
		<a href="{{ route('guru.aturDataDiri', ['id' => Auth()->user()->id]) }}" class="btn btn-primary">Atur Data Diri Anda</a>


		@if($page == 2)
		<form class="mt-2" method="post" action="{{ route('guru.myProfile.doSimpan', ['guru_id' => Auth()->user()->id]) }}">
			@csrf  
				<div class="container d-inline-flex">
					<span class="mt-2">Anda mengajar :</span>
					<button class="btn btn-primary ms-auto mb-2">Simpan Perubahan</button>
				</div>
				
			<!-- card -->
				<div class="card mb-1">
					<div class="card-header">
						<div class="form-check ms-1">
						  <input class="form-check-input" type="checkbox" name="kelas10" value="kelas10" id="kelas10">
						  <label class="form-check-label" for="kelas10">
						    Kelas 10
						  </label>
						</div>
					</div>

					<div class="card-body">
						MAPEL :
						@foreach($mapel as $item)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="{{ $item->mata_pelajaran }}10" value="{{ $item->id }}10" id="{{ $item->mata_pelajaran }}10">
						  <label class="form-check-label" for="{{ $item->mata_pelajaran }}10">
						    {{ $item->mata_pelajaran }}
						  </label>
						</div>
						@endforeach

						Di jurusan :
						@foreach($jurusans as $jurusan)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="{{ $jurusan->nama_jurusan }}10" value="{{ $jurusan->nama_jurusan }}10" id="{{ $jurusan->nama_jurusan }}10">
						  <label class="form-check-label" for="{{ $jurusan->nama_jurusan }}10">
						    {{ $jurusan->nama_jurusan }}
						  </label>
						</div>
						@endforeach
					</div>
				</div>

				<div class="card mb-1">
					<div class="card-header">
						<div class="form-check ms-1">
						  <input class="form-check-input" type="checkbox" name="kelas11" value="kelas11" id="kelas11">
						  <label class="form-check-label" for="kelas11">
						    Kelas 11
						  </label>
						</div>
					</div>

					<div class="card-body">
						MAPEL :
						@foreach($mapel as $item)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="{{ $item->mata_pelajaran }}11" value="{{ $item->id }}11" id="{{ $item->mata_pelajaran }}11">
						  <label class="form-check-label" for="{{ $item->mata_pelajaran }}11">
						    {{ $item->mata_pelajaran }}
						  </label>
						</div>
						@endforeach

						Di jurusan :
						@foreach($jurusans as $jurusan)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="{{ $jurusan->nama_jurusan }}11" value="{{ $jurusan->nama_jurusan }}10" id="{{ $jurusan->nama_jurusan }}11">
						  <label class="form-check-label" for="{{ $jurusan->nama_jurusan }}11">
						    {{ $jurusan->nama_jurusan }}
						  </label>
						</div>
						@endforeach
					</div>
				</div>

				<div class="card mb-1">
					<div class="card-header">
						<div class="form-check ms-1">
						  <input class="form-check-input" type="checkbox" name="kelas12" value="kelas12" id="kelas12">
						  <label class="form-check-label" for="kelas12">
						    Kelas 12
						  </label>
						</div>
					</div>

					<div class="card-body">
						MAPEL :
						@foreach($mapel as $item)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="{{ $item->mata_pelajaran }}12" value="{{ $item->id }}12" id="{{ $item->mata_pelajaran }}12">
						  <label class="form-check-label" for="{{ $item->mata_pelajaran }}12">
						    {{ $item->mata_pelajaran }}
						  </label>
						</div>
						@endforeach

						Di jurusan :
						@foreach($jurusans as $jurusan)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="{{ $jurusan->nama_jurusan }}12" value="{{ $jurusan->nama_jurusan }}10" id="{{ $jurusan->nama_jurusan }}12">
						  <label class="form-check-label" for="{{ $jurusan->nama_jurusan }}12">
						    {{ $jurusan->nama_jurusan }}
						  </label>
						</div>
						@endforeach
					</div>
				</div>

				
		</form>
		@endif
	</div>
</body>
</html>