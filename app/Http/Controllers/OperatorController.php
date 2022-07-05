<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class OperatorController extends Controller
{
    //
    public function index()
    {
        return view('kuis.operator.index');
    }

    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('kuis.operator.jurusan', compact(['jurusan']));
    }

    public function store(Request $request)
    {
        //menghindari data duplikat
        $jurusan = Jurusan::where('nama_jurusan', $request->jurusan)->get();
        if(count($jurusan) > 0)
        {
            return 'tidak boleh ada data yang sama';
        }
        Jurusan::create(['nama_jurusan' => $request->jurusan]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect()->back();
    }
}
