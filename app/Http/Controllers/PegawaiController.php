<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Pegawai::with(['kelurahan.kecamatan.kelurahan', 'provinsi'])->get();
        $provinsi = Provinsi::get();
        $kecamatan = Kecamatan::get();

        return view('pegawai', compact('results', 'provinsi', 'kecamatan'));
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
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required|in:L,P',
            'agama' => 'required',
            'alamat' => 'required',
            'kode_kelurahan' => 'required|exists:T_KELURAHAN,kode',
            'kode_provinsi' => 'required|exists:T_PROVINSI,kode',
        ]);

        Pegawai::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'kode_kelurahan' => $request->kode_kelurahan,
            'kode_provinsi' => $request->kode_provinsi,
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
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required|in:L,P',
            'agama' => 'required',
            'alamat' => 'required',
            'kode_kelurahan' => 'required|exists:T_KELURAHAN,kode',
            'kode_provinsi' => 'required|exists:T_PROVINSI,kode',
        ]);

        Pegawai::findOrFail($id)
            ->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jk' => $request->jk,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'kode_kelurahan' => $request->kode_kelurahan,
                'kode_provinsi' => $request->kode_provinsi,
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
        Pegawai::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Berhasil hapus data');
    }
}
