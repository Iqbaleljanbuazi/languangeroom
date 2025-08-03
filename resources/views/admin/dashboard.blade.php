@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Selamat datang, Admin!</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Paket</h5>
                    <p class="card-text">Kelola paket bimbel online dan offline.</p>
                    <a href="{{ route('admin.paket.index') }}" class="btn btn-primary">Kelola Paket</a>
                </div>
            </div>
        </div>

        {{-- Tambah menu lain di sini jika dibutuhkan --}}
        <div class="col-md-6 mt-3 mt-md-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">modul</h5>
                    <p class="card-text">Fitur tambahan bisa ditampilkan di sini.</p>
                    <a href="{{ route('admin.modul.index') }}" class="btn btn-primary">Kelola modul</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 mt-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Video Pembelajaran</h5>
            <p class="card-text">Kelola video pembelajaran untuk semua jenjang.</p>
            <a href="{{ route('admin.video.index') }}" class="btn btn-primary">Kelola video</a>
        </div>
    </div>
</div>

<div class="col-md-6 mt-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">verifikasi pembayaran</h5>
            <p class="card-text">pembayaran.</p>
            <a href="{{ route('admin.verifikasi') }}" class="btn btn-primary">verifikasi</a>
        </div>
    </div>
</div>
@endsection
