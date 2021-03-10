<?php

namespace App\Http\Controllers;

use App\{pembayaran,petugas,siswa,spp};
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = pembayaran::all();
        return view('pembayaran.index',compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(pembayaran $pembayaran)
    {
        $petugas = petugas::all();
        $siswa = siswa::all();
        $spp = spp::all();
        return view('pembayaran.create',compact('pembayaran','petugas','siswa','spp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        pembayaran::create($request->all());
        return redirect('pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(pembayaran $pembayaran)
    {
        return view('pembayaran.show',compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(pembayaran $pembayaran)
    {
        $petugas = petugas::all();
        $siswa = siswa::all();
        $spp = spp::all();
        return view('pembayaran.edit',compact('petugas','siswa','spp','pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembayaran $pembayaran)
    {
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembayaran $pembayaran)
    {
        $pembayaran::delate();
        return redirect()->route('pembayaran.index')
                        ->with('success','Product updated successfully');
    }
}
