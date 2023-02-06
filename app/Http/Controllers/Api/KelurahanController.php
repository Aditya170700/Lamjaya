<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;

class KelurahanController extends Controller
{
    public function byKecamatan($id)
    {
        $results = Kelurahan::where('kode_kecamatan', $id)->get();

        return response()->json($results);
    }
}
