@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Video Pembelajaran {{ strtoupper($jenjang) }}</h2>

    @forelse($videos as $video)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $video->judul }}</h5>
                <p>{{ $video->deskripsi }}</p>
                <div class="ratio ratio-16x9">
                    @if($video->tipe === 'link')
                        <iframe src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
                    @else
                        <video controls>
                            <source src="{{ asset('storage/' . $video->url) }}" type="video/mp4">
                            Browser Anda tidak mendukung video.
                        </video>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p>Belum ada video untuk jenjang ini.</p>
    @endforelse
</div>
@endsection
