@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<!-- Section: Hero -->
<div class="container-fluid hero-section d-flex align-items-center justify-content-center fade-in">
    <div class="row w-100 align-items-center">
        <div class="col-md-6 hero-content text-center text-md-start mb-4 mb-md-0">
            <h1 class="display-4 mb-3 fw-bold">Selamat Datang di <span style="color:#ffe066;">LanguangeRoom</span></h1>
            <p class="lead mb-4">Belajar Bahasa Inggris jadi lebih mudah, seru, dan menyenangkan! Raih impianmu bersama pengajar profesional dan komunitas belajar yang suportif.</p>
            <a href="{{ url('/register') }}" class="cta-btn">Daftar Sekarang</a>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://wirahadie.com/wp-content/uploads/2021/08/Kids-Learning-English.jpg" alt="Belajar Online" class="hero-illustration">
        </div>
    </div>
</div>

<!-- Section: Pilihan Paket -->
<div class="container mt-5 fade-in" style="animation-delay:0.2s;animation-duration:1.2s;">
    <h2 class="text-center section-title">Pilih Jenis Paket Belajar</h2>
    <div class="row justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="paket-icon mb-2">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h5 class="card-title">Paket Private</h5>
                    <p class="card-text">Belajar langsung di lokasi bersama pengajar berpengalaman.</p>
                    <a href="{{ url('/paket/paket-offline') }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="paket-icon mb-2">
                        <i class="fas fa-laptop-house"></i>
                    </div>
                    <h5 class="card-title">Paket Online</h5>
                    <p class="card-text">Belajar dari rumah dengan kelas live dan materi online interaktif.</p>
                    <a href="{{ url('/paket/paket-online') }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section: Tentang Kami -->
<div class="container about-section fade-in" style="animation-delay:0.4s;animation-duration:1.2s;">
    <div class="row align-items-center">
        <div class="col-md-2 text-center mb-3 mb-md-0">
            <span class="about-icon"><i class="fas fa-users"></i></span>
        </div>
        <div class="col-md-10">
            <h2 class="section-title mb-2">Tentang Kami</h2>
            <p class="mb-0">Kami adalah lembaga bimbel khusus Bahasa Inggris yang telah berdiri sejak 2015, membantu ribuan siswa mencapai prestasi terbaik. Pengajar profesional, komunitas suportif, dan metode belajar inovatif siap mendukung perjalanan belajarmu!</p>
        </div>
    </div>
</div>

<!-- Section: Galeri -->
<div class="container mt-5 mb-5 fade-in" style="animation-delay:0.6s;animation-duration:1.2s;">
    <h2 class="text-center section-title mb-4">Kegiatan Kami</h2>
    <div class="row g-4">
        <div class="col-md-4 mb-3">
            <img src="https://via.placeholder.com/400x240/6f42c1/fff?text=Kegiatan+1" class="img-fluid gallery-img" alt="Kegiatan 1">
        </div>
        <div class="col-md-4 mb-3">
            <img src="https://via.placeholder.com/400x240/007bff/fff?text=Kegiatan+2" class="img-fluid gallery-img" alt="Kegiatan 2">
        </div>
        <div class="col-md-4 mb-3">
            <video class="img-fluid gallery-video" controls>
                <source src="video_kegiatan.mp4" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>
    </div>
</div>

<!-- Section: Keunggulan -->
<div class="container mt-5 fade-in" style="animation-delay:0.1s;animation-duration:1.2s;">
    <h2 class="text-center section-title">Kenapa Memilih Kami?</h2>
    <div class="row text-center g-4">
        <div class="col-md-3 col-6">
            <div class="p-3">
                <i class="fas fa-user-tie fa-2x mb-2 text-primary"></i>
                <h6 class="fw-bold">Pengajar Profesional</h6>
                <p class="small">Semua pengajar berpengalaman & bersertifikat.</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-3">
                <i class="fas fa-clock fa-2x mb-2 text-primary"></i>
                <h6 class="fw-bold">Jadwal Fleksibel</h6>
                <p class="small">Belajar bisa disesuaikan dengan waktu luangmu.</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-3">
                <i class="fas fa-users fa-2x mb-2 text-primary"></i>
                <h6 class="fw-bold">Komunitas Aktif</h6>
                <p class="small">Gabung komunitas belajar yang suportif & aktif.</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-3">
                <i class="fas fa-certificate fa-2x mb-2 text-primary"></i>
                <h6 class="fw-bold">Sertifikat</h6>
                <p class="small">Dapatkan sertifikat resmi setelah lulus.</p>
            </div>
        </div>
    </div>
</div>

<!-- Section: Testimoni -->
<div class="container mt-5 fade-in" style="animation-delay:0.2s;animation-duration:1.2s;">
    <h2 class="text-center section-title">Testimoni Siswa</h2>
    <div class="row justify-content-center g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle me-3" width="48" height="48" alt="Siswa 1">
                        <div>
                            <div class="fw-bold">Ayu Sari</div>
                            <div class="small text-muted">Mahasiswa</div>
                        </div>
                    </div>
                    <p class="mb-0">"Belajar di sini seru banget! Materinya mudah dipahami dan pengajarnya ramah."</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-3" width="48" height="48" alt="Siswa 2">
                        <div>
                            <div class="fw-bold">Budi Santoso</div>
                            <div class="small text-muted">Karyawan</div>
                        </div>
                    </div>
                    <p class="mb-0">"Jadwal fleksibel, cocok buat yang sibuk kerja. Komunitasnya juga asik!"</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" class="rounded-circle me-3" width="48" height="48" alt="Siswa 3">
                        <div>
                            <div class="fw-bold">Citra Dewi</div>
                            <div class="small text-muted">Pelajar</div>
                        </div>
                    </div>
                    <p class="mb-0">"Setelah ikut bimbel, nilai Bahasa Inggrisku naik drastis. Recommended!"</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section: FAQ -->
<div class="container mt-5 fade-in" style="animation-delay:0.25s;animation-duration:1.2s;">
    <h2 class="text-center section-title">FAQ</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Apakah bisa ikut kelas online dan offline sekaligus?
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Bisa! Kamu bisa memilih paket kombinasi sesuai kebutuhan.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    Apakah dapat sertifikat setelah lulus?
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Ya, setiap peserta yang lulus akan mendapatkan sertifikat resmi.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Bagaimana cara pembayaran?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Pembayaran bisa melalui transfer bank, e-wallet, atau langsung di lokasi.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section: CTA Gabung Sekarang -->
<div class="container mt-5 mb-5 fade-in text-center" style="animation-delay:0.3s;animation-duration:1.2s;">
    <div class="p-4 rounded-4 shadow-sm" style="background: linear-gradient(90deg, #6f42c1 60%, #007bff 100%); color: #fff;">
        <h2 class="mb-3">Siap Bergabung dan Tingkatkan Skill Bahasa Inggrismu?</h2>
        <a href="{{ url('/register') }}" class="cta-btn">Gabung Sekarang</a>
    </div>
</div>
@endsection
