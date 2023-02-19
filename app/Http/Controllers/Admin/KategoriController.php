<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori', compact('kategoris'));
    }

    public function create(Request $request)
    {
        $kategoris = Kategori::create($request->all());
        if ($kategoris) {
            return redirect()->route('admin/kategori')
                ->with('status', 'success')
                ->with('message', 'Berhasil Mengubah Data');
        }
        return redirect()->route('admin/kategori')
            ->with('status', 'danger')
            ->with('message', 'Gagal Mengubah Data');
    }


    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        if ($kategori) {
            return redirect()->route('admin/kategori')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menghapus Data');
        }
    }
}
