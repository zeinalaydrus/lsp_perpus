@extends('user.layouts.master')
@section('content')
<div class="card shadow">
    <div class="card-header">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kirim-pesan">kirim pesan</button>

    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>penerima</th>
                    <th>Judul pesan</th>
                    <th>isi pesan </th>
                    <th>status pesan</th>
                    <th>tanggal kirim</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($terkirims as $terkirim)
                    <tr>
                        <td>{{  $loop->iteration }}</td>
                        <td>{{ $terkirim->penerima->fullname }}</td>
                        <td>{{ $terkirim->judul }}</td>
                        <td>{{ $terkirim->isi }}</td>
                        <td>{{ $terkirim->status }}</td>
                        <td>{{ $terkirim->tanggal_kirim }}</td>
                        <td>
                            <form action="{{ route('user.pesan.delete' , $terkirim->id)  }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('user.pesan.form')
@endsection