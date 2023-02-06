<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Provinsi::get();

        return view('provinsi', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:T_PROVINSI,kode',
            'nama' => 'required'
        ]);

        Provinsi::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success', 'Berhasil tambah data');
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
        $request->validate([
            'nama' => 'required'
        ]);

        Provinsi::findOrFail($id)
            ->update([
                'nama' => $request->nama,
            ]);

        return redirect()->back()->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provinsi::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Berhasil hapus data');
    }
}
