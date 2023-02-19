@extends('user.layouts.master')
@section('content')
    <div class="modal fade" id="kirim-pesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user/pesan/kirim') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder=""
                            name="pengirim_id" value="{{ Auth::user()->id }}" required>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">penerima</label>
                            <select name="penerima_id" class="form-select">
                                @foreach ($penerimas as $penerima)
                                    <option value="{{ $penerima->id }}">{{ $penerima->fullname }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">judul</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="judul" required>
                        </div>

                        <div class="mb-3">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">isi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kirim-pesan">kirim
                pesan</button>

        </div>

        <div class="card-body">
            <table class="table table">
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $terkirim->penerima->fullname }}</td>
                            <td>{{ $terkirim->judul }}</td>
                            <td>{{ $terkirim->isi }}</td>
                            <td>{{ $terkirim->status }}</td>
                            <td>{{ $terkirim->tanggal_kirim }}</td>
                            <td>
                                <form action="{{ route('user/pesan/delete', $terkirim->id) }}" method="POST">
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
@endsection
