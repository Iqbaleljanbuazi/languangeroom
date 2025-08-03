@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Paket Belajar - Online</h2>

    <div class="text-center mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">← Kembali</a>
    </div>

    <div class="row">
        @forelse($pakets as $paket)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $paket->nama }}</h5>
                        <p>{{ $paket->deskripsi }}</p>
                        <p><strong>Rp {{ number_format($paket->harga, 0, ',', '.') }}</strong></p>
                        <p><span class="badge bg-info">{{ $paket->kategori }}</span></p>
                        <a href="{{ route('checkout.form', ['paket_id' => $paket->id]) }}" class="btn btn-primary mt-3 w-100">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada paket online tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
