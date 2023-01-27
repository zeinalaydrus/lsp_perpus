@extends('admin.layouts.master')
@section('content')
    <div class="card shadow px-3 py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <h1>Buku</h1>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary" href="{{ route('user/form_peminjaman') }}">Pinjam</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        <th>Isbn</th>
                        <th>Jumlah Buku Baik</th>
                        <th>Jumlah Buku Rusak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $key => $buku)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->kategori->nama }}</td>
                            <td>{{ $buku->penerbit->nama }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->isbn }}</td>
                            <td>{{ $buku->j_buku_baik }}</td>
                            <td>{{ $buku->j_buku_rusak }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

