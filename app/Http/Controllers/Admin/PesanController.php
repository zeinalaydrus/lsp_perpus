<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesan;
use App\Models\User;

class PesanController extends Controller
{
    public function masuk()
    {
        $pesans = Pesan::where('pengirim_id', '!=', Auth::user()->id)->where('penerima_id', Auth::user()->id)->get();
        return view('admin.pesan.masuk', compact('pesans'));
    }

    public function keluar()
    {
        $terkirims = Pesan::where('penerima_id', '!=', Auth::user()->id)->where('pengirim_id', Auth::user()->id)->get();
        $penerimas = User::where('role', 'user')->get();

        return view('admin.pesan.terkirim', compact('terkirims', 'penerimas'));
    }

    public function kirim(Request $request)
    {
        $pesans = Pesan::where('pengirim_id', '!=', Auth::user()->id)
            ->where('penerima_id', Auth::user()->id)
            ->get();

        $notif = Pesan::where('id', $request->status)->first();
        if ($request->status == 'terkirim') {
            $notif->update([
                'terkirim' => $notif->terkirim + 1
            ]);
        }

        return view('user.pesan.masuk', compact('pesans'));
    }

    public function status(Request $request, $id)
    {
        $pesan = Pesan::find($id);
        $pesan->status = 'terbaca';
        $pesan->save();
        return redirect()->back();
    }

    public function hapus($id)
    {
        $pesan = Pesan::find($id);
        $pesan->delete();

        return redirect()->back();
    }
}
