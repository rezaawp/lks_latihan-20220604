<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\ListSoal;
use Illuminate\Support\Facades\Auth;
use App\Models\Soal;

class MataPelajaranController extends Controller
{
    //
    public function index()
    {
        $mapel = MataPelajaran::all();
        return view('kuis.admin.mapel', compact(['mapel']));
    }

    public function store(Request $request)
    {
        $guru_id = Auth::user()->id;
        MataPelajaran::create([
            'mata_pelajaran' => $request->mapel,
            'guru_id' => $guru_id
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $mapel = MataPelajaran::find($id);
        $mapel->delete();
        return redirect()->back();
    }

    public function soal($id, $mapels){
        $mapel = ListSoal::where([['guru_id', '=', $id], ['mapel', '=', $mapels]])->get();
        return view('kuis.admin.daftar_soal', compact(['mapel', 'mapels']));
    }

    public function setWaktu($token, Request $request)
    {
        $soal = ListSoal::where('token', $token);
        $soal->update(['waktu_menit' => $request->waktu]);
        return redirect()->back();
    }

    public function previewSoal($token, $guru_id)
    {
        $auth_guru_id = Auth::user()->id;

        if ($auth_guru_id == $guru_id)
        {
            $total_soal = Soal::where('token', $token)->get();
            $total_soal = count($total_soal);
            $soal = Soal::where('token', $token)->get();
            $mapel = ListSoal::where('token', $token)->get()->first()->mapel;
            return view('kuis.admin.preview.soal', compact(['total_soal', 'soal', 'token', 'mapel']));
        }else
        {
            return 'anda p  erlu izin untuk mengambil soal ini';  
        }
    }
}
