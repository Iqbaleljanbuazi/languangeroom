@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/media-pembelajaran.css">
@php
    $paket = null;
    $trx = \App\Models\Transaction::where('user_id', auth()->id())
        ->where('status', 'success')
        ->latest()
        ->first();
    if ($trx && $trx->paket) {
        $paket = strtolower($trx->paket->kategori); // sd, smp, sma
    }
@endphp
<style>
    .badge-jenjang {
        display: inline-block;
        background: linear-gradient(90deg, #2563eb 60%, #38bdf8 100%);
        color: #fff;
        font-size: 0.85rem;
        font-weight: 600;
        border-radius: 12px;
        padding: 0.2rem 0.9rem;
        margin-bottom: 0.7rem;
        letter-spacing: 1px;
        box-shadow: 0 2px 8px rgba(56,189,248,0.08);
        transition: background 0.2s;
    }
    .media-card:hover .badge-jenjang {
        background: linear-gradient(90deg, #38bdf8 60%, #2563eb 100%);
    }
    .media-card {
        border: 2px solid #f3f4f6;
    }
    .media-card:hover {
        border-color: #2563eb;
        box-shadow: 0 8px 32px rgba(37,99,235,0.13);
    }
</style>
<div class="container mt-5 mb-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold" style="font-size:2.3rem; color:#2563eb;">Media Pembelajaran Interaktif</h1>
        <p class="lead" style="color:#555;">Ayo, tingkatkan kemampuan Bahasa Inggrismu dengan berbagai fitur menarik di bawah ini!</p>
    </div>

    <!-- Modul Pembelajaran Section -->
    <div class="mb-5">
        <h2 class="fw-bold mb-3" style="color:#22c55e;">Modul Pembelajaran</h2>
        <div class="media-grid">
            @if($paket === 'sd')
                <div class="media-card">
                    <span class="badge-jenjang">SD</span>
                    <div class="media-icon">📗</div>
                    <div class="media-title">Modul SD</div>
                    <div class="media-desc">Materi lengkap Bahasa Inggris untuk SD. Cocok untuk pemula.</div>
                    <a href="/modul/sd" class="media-btn modul">Lihat Semua PDF</a>
                </div>
            @elseif($paket === 'smp')
                <div class="media-card">
                    <span class="badge-jenjang">SMP</span>
                    <div class="media-icon">📘</div>
                    <div class="media-title">Modul SMP</div>
                    <div class="media-desc">Bahasa Inggris tingkat SMP, latihan soal dan pembahasan.</div>
                    <a href="/modul/smp" class="media-btn modul">Lihat Semua PDF</a>
                </div>
            @elseif($paket === 'sma')
                <div class="media-card">
                    <span class="badge-jenjang">SMA</span>
                    <div class="media-icon">📙</div>
                    <div class="media-title">Modul SMA</div>
                    <div class="media-desc">Persiapan ujian dan materi Bahasa Inggris SMA.</div>
                    <a href="/modul/sma" class="media-btn modul">Lihat Semua PDF</a>
                </div>
            @else
                <div class="media-card">
                    <div class="media-title">Belum ada paket aktif</div>
                    <div class="media-desc">Silakan hubungi admin jika Anda sudah membayar namun belum bisa mengakses modul.</div>
                </div>
            @endif
        </div>
    </div>

    <!-- Video Pembelajaran Section -->
    <div class="mb-5">
        <h2 class="fw-bold mb-3" style="color:#f59e42;">Video Pembelajaran</h2>
        <div class="media-grid">
            @if($paket === 'sd')
                <div class="media-card">
                    <span class="badge-jenjang">SD</span>
                    <div class="media-icon">🎬</div>
                    <div class="media-title">Pengenalan Bahasa Inggris SD</div>
                    <div class="media-desc">Video dasar-dasar Bahasa Inggris untuk SD.</div>
                    <a href="/video/sd" class="media-btn video">Lihat Semua Video</a>
                </div>
            @elseif($paket === 'smp')
                <div class="media-card">
                    <span class="badge-jenjang">SMP</span>
                    <div class="media-icon">🎬</div>
                    <div class="media-title">Percakapan Sehari-hari SMP</div>
                    <div class="media-desc">Belajar percakapan praktis untuk SMP.</div>
                    <a href="/video/smp" class="media-btn video">Lihat Semua Video</a>
                </div>
            @elseif($paket === 'sma')
                <div class="media-card">
                    <span class="badge-jenjang">SMA</span>
                    <div class="media-icon">🎬</div>
                    <div class="media-title">Tips Grammar Mudah SMA</div>
                    <div class="media-desc">Penjelasan grammar untuk SMA.</div>
                    <a href="/video/sma" class="media-btn video">Lihat Semua Video</a>
                </div>
            @else
                <div class="media-card">
                    <div class="media-title">Belum ada paket aktif</div>
                    <div class="media-desc">Silakan hubungi admin jika Anda sudah membayar namun belum bisa mengakses video.</div>
                </div>
            @endif
        </div>
    </div>
      <!-- Chatbot -->
    <div class="media-card">
        <div class="media-icon">🤖</div>
        <div class="media-title">Chatbot Bahasa Inggris</div>
        <div class="media-desc">Latih speaking dan writing dengan chatbot AI yang siap menemani belajar kapan saja.</div>
        <iframe src="/chatbot" width="100%" height="120" style="border-radius:8px; border:1px solid #eee;"></iframe>
        <a href="/chatbot" class="media-btn chatbot mt-2">Coba Chatbot</a>
    </div>

@endsection
