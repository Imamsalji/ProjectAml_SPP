<?php

namespace App\Http\Controllers;

use App\{Siswa,Kelas,spp};
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('Siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $spp = spp::all();
        return view('Siswa.create',compact('siswa','spp','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validasi($request);
        Siswa::create($request->all());
        return redirect('Siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $Siswa)
    {
        $siswa = $Siswa;
        $kelas = Kelas::all();
        $spp = spp::all();
        return view('Siswa.edit',compact('kelas','siswa','spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $Siswa)
    {
        dd($request->all());
        $Siswa->update($request->all());
        return redirect()->route('Siswa.index')
                        ->with('message','Berhasil Mengaupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $Siswa)
    {
        $Siswa->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }

    public function validasi(Request $request)
    {
        $validation = $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_kelas' => 'required',
            'id_spp' => 'required',
        ],
        [
            'nisn.id_petugas' => 'NISN harus ada!',
            'nama.required' => 'Nama harus ada!',
            'alamat.required' => 'Alamat harus ada!',
            'no_telp.required' => 'Nomor telepon  harus ada!',
            'id_kelas.required' => 'Kelas harus ada!',
            'id_spp.required' => 'SPP harus dipilih!',
        ]);
    }
}
