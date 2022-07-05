@extends('home.layout')

@section('title')
	Keranjang
@endsection

<!-- Content -->
@section('content')

	<!-- List Nya -->
	<div class="container-fluid mycolor d-inline-flex my-2 box-shadow border-radius-5px">
		<div class="container" style="padding-right: 0.1px;">
			<img class="img-detail" src="{{ asset('images/' . $produk->gambar) }}" alt="" width="200" height="200" class="border-radius-5px">
		</div>

		<div class="container">
			<span class="f-color-white fs-3">{{ $produk->nama_produk }}</span> <br>
			<span class="f-color-white ">{{ $produk->deskripsi }}</span> <br> <br>
			<span class="f-color-white">Harga : Rp. {{ number_format($produk->harga, 0, ',', '.') }}</span> <br> <br>
			<form action="{{ route('doAddCart', ['id' => $produk->id]) }}" method="post">
				@csrf
				<input class="form-control" type="number" name="qty" value="1" style="width:30px"> 	
				@if(session()->has('qtyNull'))
					<span class="f-color-white">{{ session('qtyNull') }}</span> <br>
				@endif	
				 <br> <br>
				<button type="submit" class="btn">Tambah Keranjang</button>
			</form>

		</div>
	</div>

@endsection