@extends('admin.layouts.master')
@section('content')
    <div class="card shadow px-3 py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <h1>Kategori</h1>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $key => $kategori)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $kategori->kode }}</td>
                            <td>{{ $kategori->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
