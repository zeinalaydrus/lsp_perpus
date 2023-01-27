@extends('admin.layouts.master')

@section('content')
    <div class="card shadow px-3 py-4">
        <div class="card">
            <div class="card-head">
                <h1>Identitas Applikasi</h1>
            </div>
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin/identitas_update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-striped table-bordered">
                        @foreach ($identitases as $identitas)
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><input type="text" class="form-conteol" name="nama_app"
                                        value="{{ $identitas->nama_app }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><input type="text" class="form-conteol" name="email_app"
                                        value="{{ $identitas->email_app }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>
                                    <textarea class="form-control" name="alamat_app">{{ $identitas->alamat_app }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><input type="number" class="form-conteol" name="nomor_hp"
                                        value="{{ $identitas->nomor_hp }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
