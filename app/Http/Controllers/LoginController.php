<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        // Periksa apakah pengguna sudah terotentikasi. Jika iya, arahkan ke halaman "home".
        if (Auth::check()) {
            return redirect('home');
        } else {
            // Jika belum terotentikasi, tampilkan halaman "login".
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        // Ambil alamat email dan kata sandi dari permintaan yang diterima.
        $userPass = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // Coba untuk mengotentikasi pengguna dengan alamat email dan kata sandi yang diberikan.
        if (Auth::attempt($userPass)) {
            // Jika otentikasi berhasil, periksa peran pengguna.
            if (Auth::user()->role_id == 1) {
                // Jika peran pengguna adalah 1, arahkan ke halaman "/pegawai".
                return redirect('/pegawai');
            } else {
                // Jika peran pengguna bukan 1, arahkan ke halaman "/absensi".
                return redirect('/absensi');
            }
        } else {
            // Jika otentikasi gagal, tampilkan pesan kesalahan dan arahkan kembali ke halaman awal.
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        // Logout pengguna dan arahkan kembali ke halaman awal (biasanya halaman login).
        Auth::logout();
        return redirect('/');
    }
}
