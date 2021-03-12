<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;

class LaporanController extends Controller
{
    public function index()
    {
        $pembayaran = pembayaran::all();
        return view('laporan.index',compact('pembayaran'));
    }

    public function cari(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';

        $pembayaran  = pembayaran::whereBetween('created_at', [$startDate,$endDate])->latest()->paginate(5);
        
        return view('laporan.index', compact('pembayaran', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function print(Request $request)
    {

       
        $laporanpinjams = $request->transaction;
        $from = $request->startDate;
        $to = $request->endDate;

        $title ="Laporan Peminjaman From: ".$from."To:".$to;
        $redirect = route('laporanprint');   
        if(isset($from) && isset($to)){
            $startDate = $from;
            $endDate = $to;

            $pembayaran = pembayaran::whereBetween('created_at', [$startDate,$endDate])->latest()->paginate(5);
            $startDate = explode(' ', $startDate)[0];
            $endDate = explode(' ', $endDate)[0];

            return view('laporan.print', compact('pembayaran', 'startDate', 'endDate', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            $pembayaran = pembayaran::latest()->paginate(5);

            return view('laporan.print', compact('pembayaran', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
  
    }
}
