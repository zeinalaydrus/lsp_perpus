<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.user', compact('users'));
    }

    public function create(Request $request)
    {
        $count = User::where('role', 'user')->count();
        $kode = 'AA00' . ($count + 1);

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'role' => 'user',
            'kode' => $kode,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $admin = User::find($id);
        $admin->update($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
