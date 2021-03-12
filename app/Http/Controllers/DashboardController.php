<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Kelas,Siswa,spp,pembayaran};

class DashboardController extends Controller
{
    public function index()
    {
        

        $jumlah_user = User::all()->count();
        $kelas = kelas::all()->count();
        $siswa = Siswa::all()->count();
        $spp = spp::all()->count();
        $pembayaran = pembayaran::all()->count();
        $petugas = User::where('level','like',"%".'petugas'."%")->count();
        $sudah = pembayaran::where('status','like',"%".'SudahBayar'."%")->count();
        $belum = pembayaran::where('status','like',"%".'BelumBayar'."%")->count();
        return view('dashboard', compact('pembayaran','petugas','spp','siswa','kelas','sudah','belum'));
    }

}
