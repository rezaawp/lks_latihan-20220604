@extends('home.layout')

@section('title')
	Checkout
@endsection

@section('content')
	<div class="container-fluid mycolor mb-2 pb-2 border-radius-5px box-shadow-title" style="height: 60px; position: relative;">
		<h1 class="f-color-white mx-2" style="position: absolute; top: 1;">Terimakasih Sudah Order :)</h1>
	</div>

	<div class="container-fluid">
		<div class="container">
			<span>Tanggal : {{ date('Y-m-d') }}</span> <br>
			<span>Kode Transaksi : {{ $kode_transaksi }}</span> <br>
			<span>Total Produk : {{ $totalProduk }} Produk</span> <br>
			<span>Total Belanja : Rp. {{ number_format($totalBelanja,0,',','.') }}</span> <br>
		</div>
	</div>
	<hr>
	<div class="container-fluid d-flex justify-content-center">
		<div class="container">
				<div class="">
					<h2 class="fw-bold">Orderan Kamu :</h2>
				</div>
		</div>
	</div>

	<!-- List orderan -->
	@foreach($list_checkout as $item)
	<div class="container-fluid mycolor d-inline-flex my-2 box-shadow" style="border-radius: 5px;">
		<div class="container" style="padding-right: 0.1px;">
			<img class="border-radius" src="{{ asset('images/' . $item->Produk->gambar) }}" alt="" width="200" height="200">
		</div>

		<div class="container pt-4">
			<span class="f-color-white fs-3">{{ $item->Produk->nama_produk }}</span> <br>
			<span class="f-color-white ">{{ $item->Produk->deskripsi }}</span> <br> <br>
			<span class="f-color-white">Qty : {{ $item->jumlah }}</span> <br> 
			<span class="f-color-white">Harga : Rp. {{ number_format($item->Produk->harga, 0, ',', '.') }}</span> <br> <br>
			<span class="f-color-white fs-2">Total Harga : Rp. {{ number_format($item->Produk->harga * $item->jumlah,0,',','.') }}</span>  <br> <br>
		</div>
	</div>

	@endforeach



@endsection