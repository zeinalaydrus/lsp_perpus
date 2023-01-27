<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index() {
        $penerbits = Penerbit::all();
        return view('admin.penerbit', compact('penerbits'));
    }
}
