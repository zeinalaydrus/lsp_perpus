<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        return response()->json([
            'msg' => $user
        ]);
    }

    public function create(Request $request){
        
    }
}
