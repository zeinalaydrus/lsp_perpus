<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',);
    }

    public function create(Request $request)
    {
        $count = User::where('role', 'admin')->count();
        $kode = 'ADM00' . ($count + 1);

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'role' => 'admin',
            'kode' => $kode,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->back();
    }

    public function admin()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.admin', compact('admins'));
    }
}
