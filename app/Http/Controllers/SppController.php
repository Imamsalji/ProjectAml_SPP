<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::all();
        return view('spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $request->validate([

            'tahun' => 'required',
            'nominal' => 'required',

        ]);


        Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);
        return redirect('/spp');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp =  Spp::find($id);
        return view('spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $spp = Spp::find($id);
        $spp->update([
 
        
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
            

        ]);
        return redirect('/spp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spp = \App\Spp::find($id);
        $spp->delete($spp);
        return redirect('/spp')->with('delete', 'spp Dihapus!');
    }
}
