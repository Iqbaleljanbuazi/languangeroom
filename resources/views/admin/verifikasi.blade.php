@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Verifikasi Pembayaran</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Paket</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $trx)
            <tr>
                <td>{{ $trx->user->name }}</td>
                <td>{{ $trx->paket->nama ?? '-' }}</td>
                <td>{{ $trx->order_id }}</td>
                <td>{{ $trx->status }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.verifikasi.aksi', $trx->id) }}">
                        @csrf
                        <button class="btn btn-success btn-sm" onclick="return confirm('Verifikasi transaksi ini?')">Verifikasi</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 