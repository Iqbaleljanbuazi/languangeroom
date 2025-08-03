@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Paket</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.paket.create') }}" class="btn btn-primary mb-3">Tambah Paket</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pakets as $index => $paket)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $paket->nama }}</td>
                    <td>{{ ucfirst($paket->tipe) }}</td>
                    <td>Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                    <td>{{ $paket->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.paket.edit', $paket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada paket.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
