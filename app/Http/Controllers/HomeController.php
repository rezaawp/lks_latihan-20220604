<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;

class HomeController extends Controller
{
    //
    public function index()
    {
        $produks = Produk::all();
    	return view('home.index', compact(['produks']));
    }

    public function keranjang($id)
    {
        return view('home.cart');
    }

    public function checkout()
    { 
        $list_checkout = Transaksi::where([['user_id','=', 2], ['status', '=', 'keranjang']])->with('Produk')->get();
        $kode_transaksi = 'INV/' . date('Ymd') . '-' . rand(1000,1999);
        $totalProduk = 0;
        $totalBelanja = 0;

        foreach($list_checkout as $item)
        {
            $totalProduk += $item->jumlah;
            $totalBelanja += $item->jumlah * $item->Produk->harga;
        }

        $produks = Transaksi::where([['user_id','=', 2], ['status', '=', 'keranjang']]);
        $produks->update(['kode_transaksi' => $kode_transaksi, 'status' => 'sukses']);

        return view('home.checkout', compact(['kode_transaksi', 'list_checkout', 'totalBelanja', 'totalProduk']));
    }

    public function detail($id)
    {
        $produk = Produk::find($id);
        return view('home.detail', compact(['produk']));
    }

    public function doAddCart($id, Request $request){

        if($request->qty == '' || $request->qty < 1)
        {
        return redirect('/detail/' . $id)->with('qtyNull', '<= Qty harus di isi!');
        }

        Transaksi::create([
            'user_id' => 2,
            'produk_id' => $id,
            'tanggal' => date('Y-m-d'),
            'kode_transaksi' => 'none',
            'jumlah' => $request->qty,
            'status' => 'keranjang'
        ]);

        echo "
        <script>
            alert('berhasil memasukan ke keranjang');
        </script>
        ";

        return redirect('/home');
    }

    public function cart()
    {
        $produks = Transaksi::where([['user_id','=', 2], ['status', '=', 'keranjang']])->with('Produk')->get();
        return view('home.cart', compact(['produks']));
    }

    public function cartDestroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect('/cart');
    }
}

