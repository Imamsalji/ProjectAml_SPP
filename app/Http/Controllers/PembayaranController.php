<?php

namespace App\Http\Controllers;

use App\{pembayaran,User,siswa,spp};
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
        $petugas = User::where('level','like',"%".'petugas'."%")->get();
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
        $this->_validasi($request);
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
        
        $petugas = User::where('level','like',"%".'petugas'."%")->get();
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
        $this->_validasi($request);
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')
                        ->with('success','Product updated successfully');
    }

    public function statusupdate(Request $request, pembayaran $pembayaran)
    {
        $pembayaran->update([
            'status' => $request->status,
        ]);
        return redirect()->route('pembayaran.index')
                        ->with('message','Status Telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }

    public function _validasi(Request $request)
    {
        $validation = $request->validate([
            'id_petugas' => 'required',
            'nisn' => 'required',
            'tgl_bayar' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_pembayaran' => 'required',
            'status' => 'required',
        ],
        [
            'name.id_petugas' => 'Petugas harus ada!',
            'nisn.required' => 'Nisn harus ada!',
            'tgl_bayar.required' => 'tanggal bayar harus ada!',
            'bulan_dibayar.required' => 'bulan bayar harus ada!',
            'tahun_dibayar.required' => 'tahun bayar harus ada!',
            'id_spp.required' => 'spp harus dipilih!',
            'jumlah_pembayaran.required' => 'jumlah pembayaran harus ada!',
            'status.required' => 'status harus ada!',
        ]);
    }
}
