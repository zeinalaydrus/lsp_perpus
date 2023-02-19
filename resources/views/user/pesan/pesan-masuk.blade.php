@extends('user.layouts.master')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h3>Pesan Masuk</h3>
        </div>
        <section class="section">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>pengirim</th>
                            <th>Judul pesan</th>
                            <th>isi pesan </th>
                            <th>status pesan</th>
                            <th>tanggal kirim</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesans as $pesan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesan->pengirim->fullname }}</td>
                                <td>{{ $pesan->judul }}</td>
                                <td>{{ $pesan->isi }}</td>
                                <td>{{ $pesan->status == 'terkirim' ? 'belum dibaca' : 'terbaca' }}</td>
                                <td>{{ $pesan->tanggal_kirim }}</td>
                                <td>
                                    @if ($pesan->status == 'terkirim')
                                        <form action="{{ route('user/pesan/masuk/update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $pesan->id }}">
                                            <button type="submit" class="btn btn-success"><i class="bi bi-check"></i>
                                            </button>

                                        </form>
                                    @else
                                        <button type="button" class="btn btn-primary"><i class="bi bi-check-all"></i>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    </section>
    </div>
    </div>
@endsection
