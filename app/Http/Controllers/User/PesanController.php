<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::where('pengirim_id', '!=', Auth::user()->id)->where('penerima_id', Auth::user()->id)->get();
        return view('user.pesan.pesan-masuk', compact('pesans'));
    }

    public function terkirim()
    {
        $terkirims = Pesan::where('penerima_id', '!=', Auth::user()->id)->where('pengirim_id', Auth::user()->id)->get();
        $penerimas = User::where('role', 'admin')->get();

        return view('user.pesan.pesan-terkirim', compact('terkirims', 'penerimas'));
    }

    public function store(Request $request)
    {
        $terkirim = Pesan::where('penerima_id', '!=', Auth::user()->id)->where('pengirim_id', Auth::user()->id)->get();
        $penerima = User::where('role', 'admin')->get();
        $terkirim = Pesan::create([
            'penerima_id' => $request->penerima_id,
            'pengirim_id' => $request->pengirim_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'terkirim',
            'tanggal_kirim' => Carbon::now()
        ]);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $status = Pesan::where('id', $request->id)->first();
        $status->update([
            'status' => 'terbaca'
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $pesanTerkirim = Pesan::find($id);
        $pesanTerkirim->delete();

        return redirect()->back();
    }
}
