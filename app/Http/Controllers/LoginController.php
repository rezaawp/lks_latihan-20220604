<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('login.login');
    }

    public function register()
    {
    	return view('login.register');
    }

    public function auth(Request $request)
    {
        $kredensial = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($kredensial)) {
            if (Auth::user()-> level == 2) {
                return redirect()->route('home');
            }else
            {
                return 'berhasil login sebagai admin';
            }
        }else
        {
            dd('login gagal');
        }
    }

    public function store(Request $request)
    {
        $user = new User();

        if($request->password == $request->password2)
        {
            $user->nama_lengkap = $request->nama_lengkap;
            $user->no_hp = $request->no_hp;
            $user->alamat_lengkap = $request->alamat_lengkap;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->level = 2; 
            $user->save();

            return view('login.login');
        }else
        {
            dd('password yang anda masukan tidak samas');
        }

    }

    public function logout()
    {
        $user = Auth::user();
        Auth::logout();
        

        if($user->kuis == 1)
        {
            return redirect('/kuis/login');
        }else{
            return redirect('/login');    
        }
        
    }

}
