<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();

        return response()->json([
            'msg' => $buku
        ]);
    }

    public function create(Request $request)
    {
        $judul = $request->judul;
        $kategori_id = $request->kategori_id;
        $penerbit_id = $request->penerbit_id;
        $pengarang = $request->pengarang;
        $tahun_terbit = $request->tahun_terbit;
        $isbn = $request->isbn;
        $j_buku_baik = $request->j_buku_baik;
        $j_buku_rusak = $request->j_buku_rusak;

        $buku = Buku::create(
            $request->all()
        );

        return response()->json([
            'msg' => $buku
        ]);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::where('id', $id)->first();
        $buku->update($request->all());

        return response()->json([
            'msg' => $buku
        ]);
    }

    public function destroy($id)
    {
        Buku::find($id)->delete();

        return response()->json([
            'msg' => 'Berhasil Menghapus Buku'
        ]);
    }
}
