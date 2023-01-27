<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $pesan = Pesan::all();
        return response()->json([
            'msg' => $pesan
        ]);
    }

    public function update(Request $request, $id)
    {
        $penerima_id = $request->penerima_id;
        $pengirim_id = $request->pengirim_id;
        $judul_pesan = $request->judul_pesan;
        $isi = $request->isi;
        $status = $request->status;
        $tanggal_kirim = $request->tanngal_kirim;

        $pesan = Pesan::where('id', $id)->first();
        $pesan->update();

        return response()->json([
            'msg' => $pesan
        ]);
    }

    public function create(Request $request)
    {
        $penerima_id = $request->penerima_id;
        $pengirim_id = $request->pengirim_id;
        $judul_pesan = $request->judul_pesan;
        $isi = $request->isi;
        $status = $request->status;
        $tanggal_kirim = $request->tanngal_kirim;

        $pesan = Pesan::create($request->all());

        return response()->json([
            'msg' => $pesan
        ]);
    }

    public function destroy($id)
    {
        Pesan::find($id)->delete();
        return response()->json([
            'msg' => 'Berhasil menghapus Pesan'
        ]);
    }
}
