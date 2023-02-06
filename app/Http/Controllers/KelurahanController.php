<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Kelurahan::get();
        $kecamatan = Kecamatan::get();

        return view('kelurahan', compact('results', 'kecamatan'));
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
            'kode' => 'required|unique:T_KELURAHAN,kode',
            'nama' => 'required',
            'kode_kecamatan' => 'required|exists:T_KECAMATAN,kode',
        ]);

        Kelurahan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kode_kecamatan' => $request->kode_kecamatan,
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
            'nama' => 'required',
            'kode_kecamatan' => 'required|exists:T_KECAMATAN,kode',
        ]);

        Kelurahan::findOrFail($id)
            ->update([
                'nama' => $request->nama,
                'kode_kecamatan' => $request->kode_kecamatan,
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
        Kelurahan::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Berhasil hapus data');
    }
}
