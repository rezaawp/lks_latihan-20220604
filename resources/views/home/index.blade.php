@extends('home.layout')

@section('content')
<div class="container d-inline-flex">
	@foreach($produks as $item)
	<table class="mx-2 box-shadow" style="border: 1px solid black; border-radius: 7px; ">
			<div class="container-fluid d-inline-flex">
				<thead>
					<td><a href="{{ route('detail_produk', ['id' => $item->id]) }}"><img class="produk" src="{{ asset('images/' . $item->gambar) }}" alt="" width="120" height="120" style="border-bottom: 1px solid black; padding-bottom: 3px;"></a></td>
				</thead>
				<tbody class="d-flex justify-content-center">
					<td><span class="">{{ $item->nama_produk }}</span></td>
				</tbody>
				<tbody class="d-flex justify-content-center">
					<td>Rp. {{ number_format($item->harga,0,',','.') }}</td>
				</tbody>
				</div>
		</table>
	@endforeach
</div>
@endsection