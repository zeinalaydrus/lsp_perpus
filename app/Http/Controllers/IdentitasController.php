<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IdentitasController extends Controller
{
    public function index() {
        $identitases = Identitas::all();
        return view('admin.identitas', compact('identitases'));
    }

    public function update(Request $request, $id) {
        $identitas = Identitas::where('id', $id)->first();
        $identitas->update(
            $request->all()
        );

        return redirect()->back();
    }
}
