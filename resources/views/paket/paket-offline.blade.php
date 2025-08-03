@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Paket Belajar - Offline</h2>

    <!-- Tombol Kembali -->
    <div class="text-center mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="row">
        @forelse ($pakets as $paket)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $paket->nama }}</h5>
                        <p class="card-text">{{ $paket->deskripsi }}</p>
                        <p class="mb-2"><strong>Rp {{ number_format($paket->harga, 0, ',', '.') }}</strong></p>
                        <span class="badge bg-info text-dark">{{ ucfirst($paket->kategori) }}</span>
                        <a href="{{ route('checkout.form', ['paket_id' => $paket->id]) }}" class="btn btn-primary mt-3 w-100">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Belum ada paket offline yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
