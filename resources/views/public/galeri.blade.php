@extends('layouts.public')
@section('title', 'Galeri Foto')

@push('styles')
<style>
    /* ── HERO GALERI ── */
    .hero-galeri {
        background: linear-gradient(135deg, #a7f3d0 0%, #3b82f6 100%);
        padding: 120px 0 100px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid #f3f4f6;
    }

    .hero-galeri::before {
        content: "📸";
        font-size: 80px;
        position: absolute;
        top: 20%; left: 8%;
        opacity: 0.4;
        transform: rotate(-20deg);
        animation: bounceFloat 4s ease-in-out infinite;
    }
    .hero-galeri::after {
        content: "✨";
        font-size: 80px;
        position: absolute;
        bottom: 25%; right: 10%;
        opacity: 0.5;
        animation: pulseFade 3s infinite;
    }

    @keyframes bounceFloat {
        0%, 100% { transform: translateY(0) rotate(-20deg); }
        50% { transform: translateY(-20px) rotate(-10deg); }
    }
    @keyframes pulseFade {
        0%, 100% { opacity: 0.3; transform: scale(0.8); }
        50% { opacity: 0.7; transform: scale(1.1); }
    }

    .hero-galeri-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(40px, 6vw, 64px);
        font-weight: 900;
        color: #ffffff;
        margin-bottom: 16px;
        text-shadow: 2px 2px 0px rgba(0,0,0,0.2);
    }

    .hero-galeri-title span {
        color: #ffffff;
        background: #2563eb;
        padding: 4px 16px;
        border-radius: 16px;
        display: inline-block;
        transform: rotate(-2deg);
        box-shadow: 4px 4px 0px rgba(0,0,0,0.15);
    }

    .hero-galeri-desc {
        font-size: 19px;
        color: #ffffff;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 600;
        text-shadow: 1px 1px 0px rgba(0,0,0,0.1);
    }

    /* ── GALLERY GRID ── */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .gallery-card {
        background: white;
        border-radius: 20px;
        padding: 12px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #e5e7eb;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        position: relative;
        cursor: pointer;
        display: flex;
        flex-direction: column;
    }

    .gallery-card:nth-child(even):hover {
        transform: translateY(-8px) rotate(2deg) scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.2);
        border-color: #93c5fd;
    }
    .gallery-card:nth-child(odd):hover {
        transform: translateY(-8px) rotate(-2deg) scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(16, 185, 129, 0.2);
        border-color: #a7f3d0;
    }

    .gallery-img-wrapper {
        position: relative;
        width: 100%;
        padding-top: 100%; /* 1:1 Aspect Ratio / Square */
        overflow: hidden;
        border-radius: 12px;
    }

    .gallery-img {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-img {
        transform: scale(1.08);
    }

    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to top, rgba(17,24,39,0.8) 0%, rgba(17,24,39,0) 50%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: flex-end;
        padding: 24px;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-title-hover {
        color: white;
        font-family: 'Nunito', sans-serif;
        font-weight: 800;
        font-size: 20px;
        transform: translateY(20px);
        transition: transform 0.4s ease;
    }

    .gallery-card:hover .gallery-title-hover {
        transform: translateY(0);
    }

    .gallery-info {
        padding: 16px 12px 8px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .gallery-title {
        font-family: 'Nunito', sans-serif;
        font-size: 16px;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border: 2px dashed #a7f3d0;
        border-radius: 32px;
        color: #059669;
    }

    /* ── BRUTAL CTA ── */
    .modern-cta {
        background: #fca5a5;
        border: 4px solid #111827;
        box-shadow: 10px 10px 0px #111827;
        border-radius: 24px;
        padding: 60px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .modern-cta::before {
        content: '🔥';
        position: absolute;
        font-size: 120px;
        top: -20px; left: -10px;
        opacity: 0.2;
        transform: rotate(-15deg);
    }

    .modern-cta-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(32px, 5vw, 42px);
        font-weight: 900;
        color: #111827;
        margin-bottom: 16px;
        position: relative; z-index: 2;
        text-shadow: 3px 3px 0px white;
    }

</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-galeri">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#fff; color:#2563eb; font-weight:900; font-size:15px; padding:8px 20px; border-radius:100px; margin-bottom:20px; box-shadow: 2px 2px 0px rgba(0,0,0,0.1);">📷 Momen Keseruan Kita!</div>
        <h1 class="hero-galeri-title">
            Potret <span>Aksi Nyata</span> Kita!
        </h1>
        <p class="hero-galeri-desc">
            Liat keseruan aksi nyata temen-temen kita dalam menjaga lingkungan! Siapa tau ada foto kamu atau kelasmu nyempil di sini? 👀✨
        </p>
    </div>
</section>

<!-- ── GALLERY ──────────────────────────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 80px 0;">
    <div class="container">
        @if($galleries->count() > 0)
            <div class="gallery-grid">
                @foreach($galleries as $gallery)
                <div class="gallery-card">
                    <div class="gallery-img-wrapper">
                        <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}" class="gallery-img">
                        <div class="gallery-overlay">
                            <div class="gallery-title-hover">{{ $gallery->title }}</div>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">{{ Str::limit($gallery->title, 25) }}</h3>
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: #ecfdf5; display: flex; align-items: center; justify-content: center; color: #059669;">
                            📸
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:60px; margin-bottom:20px;">🖼️</div>
                <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; margin-bottom:12px; color:#111827;">Belum Ada Dokumentasi</h3>
                <p style="color:#6b7280; font-size:16px;">Koleksi foto galeri aksi lingkungan saat ini masih kosong.</p>
            </div>
        @endif

        <!-- ── BRUTAL CTA ────────────────────────────────────────────── -->
        <div class="modern-cta">
            <h2 class="modern-cta-title">Punya Ide Gila Buat Ngurangin Sampah? 🤯</h2>
            <p style="font-size:18px; color:#111827; font-weight:700; max-width:550px; margin: 0 auto 30px; position:relative; z-index:2; line-height: 1.6;">Yuk ceritain ide atau saran kamu buat edukasi lingkungan yang lebih pecah dan seru buat temen-temen yang lain!</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center;">
                <a href="{{ route('evaluasi') }}" style="background:#fef08a; color:#111827; padding:16px 32px; border-radius:100px; font-weight:900; font-size: 18px; text-decoration:none; display:inline-flex; align-items:center; gap:8px; border: 3px solid #111827; box-shadow: 5px 5px 0px #111827; transition: all 0.2s;" onmouseover="this.style.transform='translate(-2px, -2px)'; this.style.boxShadow='7px 7px 0px #111827';" onmouseout="this.style.transform='translate(0, 0)'; this.style.boxShadow='5px 5px 0px #111827';">
                    📝 Drop Ide Kamu Di Sini!
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
