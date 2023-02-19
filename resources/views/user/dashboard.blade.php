@extends('user.layouts.master')

@section('content')
    {{-- <div class="card px-4 py-3"> --}}
    {{-- <h3>Pemberitahuan</h3>
        @foreach ($pemberitahuan as $p)
            <div class="alert alert-info">{{ $p->isi }}</div>
        @endforeach --}}

    <div class="row">
        @foreach ($kategoris as $kategori)
            <h3>{{ $kategori->nama }}</h3>
            <div class="row  d-flex flex-row flex-nowrap overflow-auto gap-4">
                @foreach ($kategori->bukus as $buku)
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <img style="max-height: 100px" src="{{ '/storage/foto/' . $buku->foto }}" alt="">
                            </div>
                            <div class="card-body">
                                <div class="scrolling-wrapper">

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
        @endforeach
    </div>
    {{-- </div> --}}
@endsection
