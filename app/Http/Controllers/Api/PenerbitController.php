<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index(Request $request){
        $penerbit = Penerbit::all();
        return response()->json([
            'msg' => $penerbit
        ]);
    }

    public function create(Request $request)
    {
        $kode = $request->kode;
        $nama = $request->nama;
        $verif = $request->verif;

        $penerbit = Penerbit::create($request->all());

        return response()->json([
            'msg' => $penerbit
        ]);
    }

    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::where('id', $id)->first();
        $penerbit->update($request->all());

        return response()->json([
            'message' => $penerbit
        ]);
    }

    public function destroy($id)
    {
        Penerbit::find($id)->delete();
        return response()->json([
            'msg' => 'Berhasil Menghapus Penerbit'
        ]);
    }
}
