@extends('home.layout')

@section('title')
	Keranjang
@endsection

<!-- Content -->
@section('content')
	<div class="container-fluid mycolor mb-2 pb-2 pt-1 box-shadow-title" style="height: 60px; border-radius: 5px;">
		<p class="mt-1"><h1 class="f-color-white mx-2">Keranjang Kamu</h1></p>
	</div>

	@foreach($produks as $item)
	<!-- List Nya -->
	<div class="container-fluid mycolor d-inline-flex my-2 border-radius-5px box-shadow">
		<div class="container" style="padding-right: 0.1px;">
			<img class="border-radius-5px" src="{{ asset('images/' . $item->Produk->gambar) }}" alt="" width="200" height="200">
		</div>

		<div class="container">
			<span class="f-color-white fs-3">{{ $item->Produk->nama_produk }}</span> <br>
			<span class="f-color-white ">{{ $item->Produk->deskripsi }}</span> <br> <br>
			<span class="f-color-white">Qty : {{ $item->jumlah }}</span> <br> 
			<span class="f-color-white">Harga : Rp. {{ number_format($item->Produk->harga, 0, ',', '.') }}</span> <br> <br>
			<span class="f-color-white fs-2">Total Harga : Rp. {{ number_format($item->Produk->harga * $item->jumlah,0,',','.') }}</span>  <br> <br>

			<form action="{{ route('cart.cancel', ['id' => $item->id]) }}" method="post">
				@csrf
				<button href="" class="btn">Cancel</button>
			</form>
		</div>
	</div>
	@endforeach
	<form action="{{ route('checkout') }}" method="post">
		@csrf
		<button class="btn box-shadow-title">Checkout</button>		
	</form>

@endsection