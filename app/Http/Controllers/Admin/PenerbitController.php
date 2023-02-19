<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::all();
        return view('admin.penerbit', compact('penerbits'));
    }

    public function create(Request $request)
    {
        $count = Penerbit::count();
        $kode = 'PTM00' . ($count + 1);

        $penerbit = Penerbit::create([
            'nama' => $request->nama,
            'kode' => $kode,
        ]);

        if ($penerbit) {
            return redirect()->route('admin/penerbit')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Data');
        }
        return redirect()->route('admin/penerbit')
            ->with('status', 'danger')
            ->with('message', 'Gagal Menghapus Data');
    }

    public function update(Request $request, $id)
    {
        $penerbits = Penerbit::find($id);
        $penerbits->update(
            $request->all()
        );
        return redirect()->back();
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->delete();

        if ($penerbit) {
            return redirect()->route('user/penerbit')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menghapus Data');
        }
    }
}
