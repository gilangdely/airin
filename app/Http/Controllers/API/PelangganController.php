<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function getById(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:pelanggan,id_pelanggan'
        ]);

        $data = Pelanggan::where('id_pelanggan', $request->id)->with(['meterans'])->get();

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    function UpdateData(Request $request)
    {
        $request->validate([
            'no_hp' => 'required',
        ]);

        $pelanggan = Pelanggan::find($request->id_pelanggan);
        if (!$pelanggan) {
            return response()->json(['status' => false, 'message' => 'Pelanggan tidak ditemukan'], 404);
        }

        $pelanggan->update($request->only(['no_hp']));

        return response()->json(['status' => true, 'message' => 'Data pelanggan berhasil diperbarui', 'data' => $pelanggan], 200);
    }
}
