@extends('admin.layouts.master')
@section('content')
    <div class="card shadow px-3 py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <h1>Penerbit</h1>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary" href="{{ route('user/form_peminjaman') }}">Pinjam</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Verif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerbits as $key => $penerbit)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $penerbit->kode }}</td>
                            <td>{{ $penerbit->nama }}</td>
                            <td>{{ $penerbit->verif }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
