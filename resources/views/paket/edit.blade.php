@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Paket</h1>

    <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Paket</label>
            <input type="text" name="nama" class="form-control" value="{{ $paket->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="online" {{ $paket->tipe == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ $paket->tipe == 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $paket->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="SD" {{ $paket->kategori == 'SD' ? 'selected' : '' }}>SD</option>
                <option value="SMP" {{ $paket->kategori == 'SMP' ? 'selected' : '' }}>SMP</option>
                <option value="SMA" {{ $paket->kategori == 'SMA' ? 'selected' : '' }}>SMA</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
