<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use App\Models\MataPelajaran;
use App\Models\User;
use App\Models\Jurusan;

class AdminController extends Controller
{
    //
	public function index()
	{
		return view('admin.index');
	}

	public function layout()
	{
		return view('sbadmin.layout');
	}

	public function produk()
	{
		$produks = Produk::all();
    	return view('admin.produk', compact(['produks']))->with('active', 'Tes');
	}

	public function addProduk()
	{
		return view('admin.add-produk');
	}

	// Kuis
	public function guru()
	{
		return view('kuis.admin.dashboard');
	}

	public function guru_login()
	{
		return view('kuis.admin.login.login');
	}

	public function guru_auth(Request $request)
	{
		$kredensial = $request->validate([
			'nis' => ['required'],
			'password' => ['required'],
		]);

		if(Auth::attempt($kredensial))
		{
			if (Auth::check()) {
				if(Auth::user()->guru == 1)
				{
					return redirect()->route('guru.index');
				}else{
					return 'anda tidak di izinkan login';
				}
			}
		}

		dd('login gagal');
	}

	public function guru_myProfile($id)
	{
		$page = 1;
		$mapel = MataPelajaran::all();
		if(Auth::user()->id != $id)
		{
			return 'mohon maaf, anda tidak dapat mengakses ke halaman tersebut';
		}

		return view('kuis.admin.profile', compact(['page', 'mapel']));
	}

	public function guru_aturDataDiri($id)
	{
		$page = 2;
		$mapel = MataPelajaran::all();
		$jurusans = Jurusan::all();
		if(Auth::user()->id != $id)
		{
			return 'mohon maaf, anda tidak dapat mengakses ke halaman tersebut';
		}

		return view('kuis.admin.profile', compact(['page', 'mapel', 'jurusans']));
	}

	public function guru_mySoal($id)
	{
		$mapel = MataPelajaran::where('guru_id', $id)->get();
		// dd($mapel);
		return view('kuis.admin.soal', compact('mapel'));
	}

	public function guru_eMonitoring()
	{
		$user = User::where('kuis', 1)->get();
		return view('kuis.admin.e_monitoring', compact(['user']));
	}
}
