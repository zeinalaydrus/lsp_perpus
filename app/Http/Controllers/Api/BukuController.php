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
        $buku = Buku::create(
            $request->all()
        );

        if ($request->hasFile('foto')) {
            $destination = 'public/foto';
            $foto = $request->file('foto');
            $foto_name = $foto->getClientOriginalName();
            $path = $request->file('foto')->storeAs($destination, $foto_name);

            $buku->update([
                'foto' => $foto_name
            ]);
        }

        return response()->json([
            'msg' => 'Berhasil Menambah Data',
            'data' => $buku
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
