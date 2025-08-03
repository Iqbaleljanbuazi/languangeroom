
@extends('layouts.app') {{-- Sesuaikan dengan layout admin Anda --}}

@section('content')
<div class="container">
    <h1>Manajemen Kuis</h1>
    <a href="{{ route('quiz.create') }}" class="btn btn-primary mb-3">Tambah Kuis Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Jenjang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->title }}</td>
                <td>{{ strtoupper($quiz->jenjang) }}</td>
                <td>
                    <a href="{{ route('quiz.edit', $quiz) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('quiz.destroy', $quiz) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection