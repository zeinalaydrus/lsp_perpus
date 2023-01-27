<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategoris = Kategori::all();
        return view('admin.kategori', compact('kategoris'));
    }
}
