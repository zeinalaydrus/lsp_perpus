<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function index()
    {
        $identitas = Identitas::all();

        return response()->json([
            "data" => $identitas,
            "msg" => "Berhasil Mengambil Data"
        ]);
    }

    public function update($id, Request $request)
    {
        $identitas = Identitas::where('id', $id)->first();
        $identitas->update(
            $request->all()
        );

        return response()->json([
            "data" => $identitas,
            "msg" => "Berhasil update data"
        ]);
    }
}
