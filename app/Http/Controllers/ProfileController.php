<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use App\Models\MataPelajaran;
use App\Models\Jurusan;

class ProfileController extends Controller
{
    //
    public function doSimpanPerubahan($guru_id,Request $request){
        //Mencari Mapel ID
        

        $mapel_id = array();
        $jurusan_id = array();

        // return $mapel_id;
        // dd($daftar_mapel);
        // return $request->kelas;
        $kelas10 = 0;
        $kelas11 = 0;
        $kelas12 = 0;
        $nama_lengkap = Auth::user()->nama_lengkap;

        // Kelas 10
        if (isset($request->kelas10 )) {
            $mapel = MataPelajaran::get();
            $jurusans = Jurusan::get();
            $kelas10 = 1;
            $x = 0;
            $y = 0;
            $mapel_id = array();
            $jurusan_id = array();

            // Mapel
            foreach($mapel as $item)
            {
                 $mata_pelajaran = $item->mata_pelajaran . '10';
                 if(isset($request->$mata_pelajaran))
                 {
                    $mapel_id[$x] = $item->id;
                 }
                 $x++;
            }

            //Jurusan
            foreach($jurusans as $jurusan)
            {
                 $nama_jurusan = $jurusan->nama_jurusan . '10';
                 if(isset($request->$nama_jurusan))
                 {
                    $jurusan_id[$y] = $jurusan->id;
                 }
                 $y++;
            }
            Guru::create([
                'nama_lengkap' => $nama_lengkap,
                'guru_id' => $guru_id,
                'kelas_10' => $kelas10,
                'kelas_11' => 0,
                'kelas_12' => 0,
                'mapel_id' => implode(",", $mapel_id),
                'jurusan_id' => implode(",", $jurusan_id)
            ]);
        }

        // Kelas 11
        if (isset($request->kelas11 )) {
            $mapel = MataPelajaran::get();
            $jurusans = Jurusan::get();
            $kelas11 = 1;
            $x = 0;
            $y = 0;
            $mapel_id = array(); // kosongkan array terlebih dahulu
            $jurusan_id = array();
            //Mapel
            foreach($mapel as $item)
            {
                 $mata_pelajaran = $item->mata_pelajaran . '11';
                 if(isset($request->$mata_pelajaran))
                 {
                    $mapel_id[$x] = $item->id;
                 }
                 $x++;
            }
            //Jurusan
            foreach($jurusans as $jurusan11)
            {
                 $nama_jurusan = $jurusan11->nama_jurusan . '10';
                 if(isset($request->$nama_jurusan))
                 {
                    $jurusan_id[$y] = $jurusan11->id;
                 }
                 $y++;
            }
            Guru::create([
                'nama_lengkap' => $nama_lengkap,
                'guru_id' => $guru_id,
                'kelas_10' => 0,
                'kelas_11' => $kelas11,
                'kelas_12' => 0,
                'mapel_id' => implode(",", $mapel_id),
                'jurusan_id' => implode(",", $jurusan_id)
            ]);
        }

        // Kelas 12
        if (isset($request->kelas12 )) {
            $kelas12 = 1;
            $x = 0;
            $y = 0;
            $mapel_id = array(); // kosongkan array terlebih dahulu
            $jurusan_id = array();
            //Mapel
            foreach($mapel as $item)
            {
                 $mata_pelajaran = $item->mata_pelajaran . '12';
                 if(isset($request->$mata_pelajaran))
                 {
                    $mapel_id[$x] = $item->id;
                 }
                 $x++;
            }
            //Jurusan
            foreach($jurusans as $jurusan)
            {
                 $nama_jurusan = $jurusan->nama_jurusan . '10';
                 if(isset($request->$nama_jurusan))
                 {
                    $jurusan_id[$y] = $jurusan->id;
                 }
                 $y++;
            }
            Guru::create([
                'nama_lengkap' => $nama_lengkap,
                'guru_id' => $guru_id,
                'kelas_10' => 0,
                'kelas_11' => 0,
                'kelas_12' => $kelas12,
                'mapel_id' => implode(",", $mapel_id),
                'jurusan_id' => implode(",", $jurusan_id)
            ]);
        }
    }
}
