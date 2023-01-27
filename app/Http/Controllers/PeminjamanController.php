<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index() {
        $peminjamans = Peminjaman::where('user_id', Auth::user()->id)->get();
        return view('user.peminjaman', compact('peminjamans'));
    }

    public function pinjam(Request $request)
    {
        $buku_id = $request->buku_id;
        $bukus = Buku::all();

        return view('user.form_peminjaman', compact('bukus', 'buku_id'));
    }

    public function form(Request $request) {
        $buku_id = $request->buku_id;
        $bukus = Buku::all();

        return view('user.form_peminjaman', compact('bukus', 'buku_id'));
    }

    public function submit(Request $request) {
        $peminjaman = Peminjaman::create($request->all());
    
            if ($peminjaman) {
                return redirect()->route('user/peminjaman')
                    ->with('status', 'success')
                    ->with('message', 'Berhasil Menambah Data');
            }
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Gagal Menambah Data');
        }
}
