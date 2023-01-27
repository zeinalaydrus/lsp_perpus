<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriControlller extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return response()->json([
            'msg' => $kategori
        ]);
    }

    public function create(Request $request)
    {


        $kategori = Kategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return response()->json([
            'msg' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::where('id', $id)->first();
        $kategori->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return response()->json([
            'msg'  => $kategori
        ]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return response()->json([
            'msg' => 'Berhasil Menghapus Data'
        ]);
    }
}
