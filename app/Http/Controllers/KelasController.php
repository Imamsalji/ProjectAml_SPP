<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([

            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',

        ]);


        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,


        ]);
        return redirect('/kelas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas =  Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->update([
 
        
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
            
        ]);
        return redirect('/kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = \App\Kelas::find($id);
        $kelas->delete($kelas);
        return redirect('/kelas')->with('delete', 'kelas Dihapus!');
    }
}
