@extends('user.layouts.master')

@section('content')
    <div class="card px-4 py-3">
        <h3>Pemberitahuan</h3>
        @foreach ($pemberitahuan as $p)
            <div class="alert alert-info">{{ $p->isi }}</div>
        @endforeach

        <h3>Buku</h3>
        <div class="row">
            @foreach ($bukus as $buku)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <img src="/assets/images/img.jpeg" style="height: 150px;object-fit: cover;" class="card-img"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h4 style="font-size: 24px; font-weight: bold">
                                {{ $buku->judul }}
                            </h4>
                            <span class="badge bg-secondary">{{ $buku->kategori->nama }}</span>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-start">
                                        {{ $buku->pengarang }}
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="text-end">{{ $buku->penerbit->nama }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="{{ route('user/form_peminjaman') }}">
                                @csrf
                                <input type="hidden" value="{{ $buku->id }}" name="buku_id">
                                <button class="btn btn-primary" type="submit">Pinjam</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
