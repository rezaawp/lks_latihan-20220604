<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Soal;
use App\Models\Penjawab;
use App\Models\CountDown;
use App\Models\ListSoal;
use App\Models\JawabanUser;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    //
    private $jawaban = 1;

    public function index()
    {
        return view('kuis.index');
    }

    public function simpanJawaban($total_soal, $token, $time, Request $request){
        // return $time;
        // if(!isset($_COOKIE[$time]))
        // {
        //     return 'mohon maaf, waktu sudah habis. tandai bahwa sudah mengerjakan';
        // }
        $penjawab = Penjawab::where([['token', '=', $token], ['user_id', '=', Auth::user()->id]])->get();
        if(count($penjawab) > 0)
        {
            //jika sudah mengerjakan
            return 'anda sudah mengerjakan';
        }
        $indexSoal = 0;
        $soal = Soal::where('token', $token)->get();
        $countBenar = 0;
        $jawaban_user = array();
        $user_id = Auth::user()->id;
        $ket = 0;
        $y = 0;
        // dd($soal[0]);
       for ($i=1; $i <= $total_soal ; $i++) { 
            if($indexSoal == $total_soal )
            {
                break;
            }
            $ans =  'ans' . $i;
            // echo $ans;
            // echo $soal[$indexSoal]->benar;
            $jawaban = $request->$ans;

            if($request->$ans == $soal[$indexSoal]->benar) // jika jawaban benar
            {
                $ket = 1;
                $countBenar++;
            }else{
                $ket = 0;
            }

            switch($jawaban)
            {
                case 'a':
                    $jawaban_user[$indexSoal] = 'a';
                    break;

                case 'b':
                    $jawaban_user[$indexSoal] = 'b';
                    break;

                case 'c':
                    $jawaban_user[$indexSoal] = 'c';
                    break;

                case 'c':
                    $jawaban_user[$indexSoal] = 'd';
                    break;
                default:
                    $jawaban_user[$indexSoal] = 'null';
            }

            JawabanUser::create([
                'user_id' => $user_id,
                'soal_index' => $y,
                'token' => $token,
                'jawaban' => $jawaban_user[$y],
                'keterangan' => $ket
            ]);
            $y++;
           // Untuk mengambil soal dan jawabannya berdasarkan index
           $indexSoal++;
       }

       // input hasil
       $penjawab = new Penjawab();
       $penjawab->user_id = Auth::user()->id;
       $penjawab->token = $token;
       $penjawab->benar = $countBenar;
       $penjawab->nilai_persentase = floor(($countBenar / $total_soal) * 100);
       $penjawab->total_soal = $total_soal;

       $penjawab->save();

       echo 'Selamat, anda benar : ' . $countBenar . ' dari ' . $total_soal . ' soal <br>';
       echo 'Maka nilai pemahaman anda : ' . floor(($countBenar / $total_soal) * 100) . '%' ;
       
    }

    public function addCardSoal(Request $request)
    {
        $total_soal = 0;
        $guru_id = Auth::user()->id;
        $mapel = MataPelajaran::where('guru_id', $guru_id)->get();
        if(isset($_COOKIE['soal']))
        {
            $total_soal = $_COOKIE['soal'];            
        }
        $cookie_soal = $request->cookie('soal');
        return view('kuis.buat_soal', compact(['total_soal', 'mapel']));
    }

    public function doSimpanSoal(Request $request)
    {
        // return 'tes';
        $total_soal = $_COOKIE['soal'];
        $guru_id = Auth::user()->id;
        $token = bin2hex(random_bytes(5)); //random token
        $token_stat = $token; 

        for($x = 1; $x <= $total_soal; $x++)
        {
        $soal = 'soal' . $x;
            $a = 'a' . $x;
            $b = 'b' . $x;
            $c = 'c' . $x;
            $d = 'd' . $x;
            $benar = 'benar' . $x;
            $addSoal = new Soal();
            $addSoal->token = $token;
            $addSoal->guru_id = $guru_id;
            $addSoal->soal = $request->$soal;
            $addSoal->a = $request->$a;
            $addSoal->b = $request->$b;
            $addSoal->c = $request->$c;
            $addSoal->d = $request->$d;
            $addSoal->benar = $request->$benar;

            $addSoal->save();
        }

        //input ListSoal
        ListSoal::create([
            'guru_id' => $guru_id,
            'token' => $token,
            'waktu_menit' => 0,
            'mapel' => $request->mapel,
            'status' => 1
        ]);
        setcookie('soal', '', time() - (86400 * 30), "/");
        return redirect('kuis/buat-soal')->with('sukses', 'Soal yang anda buat sudah siap dipakai. Token soal : ' . $token);
    }

    public function countSoal(Request $request)
    {
        $total_soal = $request->total_soal;
        $guru_id = Auth::user()->id;
        $mapel = MataPelajaran::where('guru_id', $guru_id)->get();
        $cookie_name = "soal";
        $cookie_value = $total_soal;
        setcookie($cookie_name, str($cookie_value), time() + (86400 * 30), "/"); // 86400 = 1 day
        return view('kuis.buat_soal', compact(['total_soal', 'mapel']));
    }

    public function kerjakanSoal($token)
    {
        //cek apakah sudah login
        if(Auth::check())
        {
            $penjawab = Penjawab::where([['token', '=', $token], ['user_id', '=', Auth::user()->id]])->get();
            $cookie_name = strval(bin2hex(random_bytes(5)));
            $cookie_value = bin2hex(random_bytes(5));
            $cookie_time_stat = strval($cookie_name); // cookie waktu
            $cookie_value_stat = strval($cookie_value);
            $waktu = ListSoal::where('token', $token)->get()->first();
            $waktu = $waktu->waktu_menit; //menit
            $user_id = Auth::user()->id;


            if(count($penjawab) > 0)
            {
                //jika sudah mengerjakan
                return 'anda sudah mengerjakan';
            }

            $countdown = CountDown::where([['user_id', '=', $user_id], ['token', '=', $token]])->get();
            
            $total_soal = Soal::where('token', $token)->get();
            $soal = Soal::where('token', $token)->get();
            $total_soal = count($total_soal);
            $waktu_terpakai = 0; 
            // return $total_soal;
            if ($total_soal > 0) {
                // jika ada soal
                // Menampilkan soal
                // return count($countdown);
                if(count($countdown) == 0)
                {
                //jika array tidak ada data
                    setcookie($cookie_name,$cookie_value, time() + (60 * $waktu), "/kuis/submit-soal/" . $total_soal . "/" . $token . "/" . $cookie_time_stat);
                    setcookie(bin2hex(random_bytes(5)),hash('adler32', 20), time() + (60 * 3));
                    setcookie(bin2hex(random_bytes(5)),hash('adler32', 12), time() + (60 * 3));
                    setcookie(bin2hex(random_bytes(5)),hash('adler32', 30), time() + (60 * 3));
                    setcookie(bin2hex(random_bytes(5)),hash('adler32', 12), time() + (60 * 3));

                    CountDown::create([
                        'user_id' => $user_id,
                        'token' => $token,
                        'cookie_time' => $cookie_time_stat
                    ]);
                    // $countdown = $countdown->first();
                    // $waktu_terpakai = number_format($countdown->created_at->diffInSeconds() / 60, 1); // output float
                }else{
                    $countdown = $countdown->first();
                    $waktu_terpakai = number_format($countdown->created_at->diffInSeconds() / 60, 1);
                }
                

                return view('kuis.soal', compact(['total_soal', 'soal', 'token', 'cookie_time_stat', 'waktu_terpakai', 'waktu']));
    
            }else
            {
                return 'kuiz tidak ditemukan';
            }
        }else{
            return view('kuis.login.login', compact(['token']));
        }
    }

    public function register($token)
    {
        return redirect()->back()->with('register', 'Untuk melakukan register, silahkan hubungi wali kelas anda');
    }

    public function login()
    {
        $token = 0;
        return view('kuis.login.login', compact(['token']));
    }

    public function auth ($token,Request $request)
    {
        $kredensial = $request->validate([
            'nis' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($kredensial))
        {
            if(Auth::user()->kuis == 1) // artinya adalah jika terdaftar sebagai users kuis
            {
                return redirect('/kuis/task/' . $token);
            }else{
                Auth::logout();
                return "anda tidak di izinkan login di website ini";
            }
        }

        dd('login gagal');
    }
}
