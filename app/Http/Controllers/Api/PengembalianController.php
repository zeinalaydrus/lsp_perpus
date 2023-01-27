<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index(){
        $peminjaman = Peminjaman::where('tanggal_pengembalian');

        return response()->json([
            'msg' => $peminjaman
        ]);
    }

    public function store(Request $request){
        $peminjaman = Peminjaman::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam,
        ]);

        $buku = Buku::where('id', $request->buku_id)->first();
        if($request->kondisi_buku_saat_dipinjam == 'baik'){
            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik - 1
            ]);
        }
        if($request->kondisi_buku_saat_dipinjam == 'rusak'){
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak - 1
            ]);
        }

        return response()->json(['msg' => $peminjaman]);
    }
}
