<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function dashboard()
    {
        // Ambil peran pengguna yang terautentikasi
        $role = User::join('roles', 'roles.id', '=', 'users.role_id')
                    ->where('users.id', Auth::user()->id)
                    ->first(['name', 'nama_role']);

        if (Auth::user()->role_id == 1) {
            // Jika peran adalah "admin," hitung statistik untuk semua pengguna
            $totalPegawai = User::get()->count();
            $totalRole = Role::get()->count();
            $totalMasuk = Absensi::where('keterangan', 'Masuk')->get()->count();
            $totalMangkir = Absensi::where('keterangan', 'Mangkir')->get()->count();
            $totalSakit = Absensi::where('keterangan', 'Sakit')->get()->count();
            $totalMendesak = Absensi::where('keterangan', 'Mendesak')->get()->count();
            
            return view('dashboard')
                    ->with('role', $role)
                    ->with('totalPegawai', $totalPegawai)
                    ->with('totalRole', $totalRole)
                    ->with('totalMasuk', $totalMasuk)
                    ->with('totalMangkir', $totalMangkir)
                    ->with('totalSakit', $totalSakit)
                    ->with('totalMendesak', $totalMendesak);
        }else{
            // Jika peran bukan "admin," hitung statistik hanya untuk pengguna yang terautentikasi
            $totalMasuk = Absensi::where('keterangan', 'Masuk')->where('user_id', Auth::user()->id)->get()->count();
            $totalMangkir = Absensi::where('keterangan', 'Mangkir')->where('user_id', Auth::user()->id)->get()->count();
            $totalSakit = Absensi::where('keterangan', 'Sakit')->where('user_id', Auth::user()->id)->get()->count();
            $totalMendesak = Absensi::where('keterangan', 'Mendesak')->where('user_id', Auth::user()->id)->get()->count();

            return view('dashboard')
                    ->with('role', $role)
                    ->with('totalMasuk', $totalMasuk)
                    ->with('totalMangkir', $totalMangkir)
                    ->with('totalSakit', $totalSakit)
                    ->with('totalMendesak', $totalMendesak);
        }
    }

    public function pegawai()
    {
        // Mengambil data pegawai dan peran terkait
        $data = User::join('roles', 'roles.id', '=', 'users.role_id')
                    ->get(['users.name as nama_pegawai', 'users.email as email_pegawai', 'roles.nama_role as role']);
        return view('pegawai')->with('data', $data);
    }

    public function role()
    {
        // Mengambil semua data peran
        $data = Role::get();
        return view('role')->with('data', $data);
    }

    public function absensi()
    {
        if (Auth::user()->role_id == 1) {
            // Jika pengguna memiliki peran dengan ID 1 (misalnya, peran admin), ambil semua data absensi pegawai
            $data = Absensi::join('users', 'users.id', '=', 'absensis.user_id')
                        ->get(['users.name as nama_pegawai', 'absensis.absen_masuk as absen_masuk', 'absensis.absen_keluar as absen_keluar', 'absensis.keterangan as keterangan_absen']);
        } else {
            // Jika pengguna tidak memiliki peran dengan ID 1, ambil hanya data absensi pengguna saat ini
            $data = Absensi::join('users', 'users.id', '=', 'absensis.user_id')
                        ->where('absensis.user_id', Auth::user()->id)
                        ->get(['users.name as nama_pegawai', 'absensis.absen_masuk as absen_masuk', 'absensis.absen_keluar as absen_keluar', 'absensis.keterangan as keterangan_absen']);
        }
        
        return view('absensi')->with('data', $data);
    }
}
