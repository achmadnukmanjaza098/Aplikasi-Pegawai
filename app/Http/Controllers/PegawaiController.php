<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
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
