@extends('user.layouts.master')

@section('content')
    <div class="card shadow px-3 py-4">
        <div class="card">
            <div class="card-head">
                <h1>Update Profile</h1>
            </div>
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('user/profil_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Foto</th>
                        <td>
                            <input class="form-control" type="file" name="foto">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><input type="text" class="form-conteol" name="fullname" value="{{ Auth::user()->fullname }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><input type="text" class="form-conteol" name="username" value="{{ Auth::user()->username }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Nis</th>
                        <td><input type="text" class="form-conteol" name="nis" value="{{ Auth::user()->nis }}"></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td><input type="text" class="form-conteol" name="kelas" value="{{ Auth::user()->kelas }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>
                            <textarea class="form-control" name="alamat">{{ Auth::user()->alamat }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" class="form-conteol" name="password"    placeholder="Ubah Sandi">
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
