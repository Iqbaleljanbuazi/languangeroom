@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Formulir Pembayaran</h2>
    
    <form action="{{ route('checkout.bayar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="paket_id" class="form-label">Pilih Paket</label>
            <select name="paket_id" class="form-control" required>
                <option value="">-- Pilih Paket --</option>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->id }}" 
                        {{ isset($paketTerpilih) && $paketTerpilih->id == $paket->id ? 'selected' : '' }}>
                        {{ $paket->tipe }} {{ $paket->kategori }} - Rp {{ number_format($paket->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Bayar Sekarang</button>
    </form>
</div>
@endsection
