@extends('sbadmin.layout')

@section('content-title')
	Produks
@endsection

@section('title')
	Admin - Produk
@endsection

@section('directory-active')
	Produk
@endsection

@section('content')

<a href="{{ route('addProduk') }}" class="btn btn-success my-3 fw-bold">Tambah Barang</a>
<div class="card" style="border: 1px solid black;">
	<table class="table">
		<tr class="bg-success" style="color: white; border-bottom: 1px solid black;">
			<th>Nama Produk</th>
			<th>Kategori Barang</th>
			<th>Deskripsi</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th>Aksi</th>
		</tr>

		@foreach($produks as $item)
		<tr>
			<td>{{ $item->nama_produk }}</td>
			<td>{{ $item->kategori_id }}</td>
			<td>{{ $item->deskripsi }}</td>
			<td>{{ $item->harga }}</td>
			<td><img src="{{ asset('images/' . $item->gambar ) }}" alt="" width="90" height="90" style="border-radius: 5px"></td>
			<td><a href="" class="btn btn-warning">Edit</a>
				<form action="" method="post">
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-danger">Hapus</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection
