@extends('layouts.public')
@section('title', 'Video Edukasi')

@push('styles')
<style>
    /* ── HERO VIDEO ── */
    .hero-video {
        background: linear-gradient(135deg, #c4b5fd 0%, #7c3aed 100%);
        padding: 120px 0 100px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid #f3f4f6;
    }

    .hero-video::before {
        content: "🎬";
        font-size: 80px;
        position: absolute;
        top: 20%; left: 8%;
        opacity: 0.4;
        transform: rotate(-15deg);
        animation: floatTilt 5s ease-in-out infinite;
    }
    .hero-video::after {
        content: "🍿";
        font-size: 80px;
        position: absolute;
        bottom: 25%; right: 10%;
        opacity: 0.5;
        animation: floatTilt 4s ease-in-out infinite reverse;
    }

    @keyframes floatTilt {
        0%, 100% { transform: translateY(0) rotate(-15deg); }
        50% { transform: translateY(-20px) rotate(-5deg); }
    }

    .hero-video-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(40px, 6vw, 64px);
        font-weight: 900;
        color: #ffffff;
        margin-bottom: 16px;
        text-shadow: 2px 2px 0px rgba(0,0,0,0.2);
    }

    .hero-video-title span {
        color: #ffffff;
        background: #4c1d95;
        padding: 4px 16px;
        border-radius: 16px;
        display: inline-block;
        transform: rotate(2deg);
        box-shadow: 4px 4px 0px rgba(0,0,0,0.15);
    }

    .hero-video-desc {
        font-size: 19px;
        color: #f3f4f6;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 600;
        text-shadow: 1px 1px 0px rgba(0,0,0,0.1);
    }

    /* ── VIDEO GRID ── */
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .video-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 3px solid #f3f4f6;
        box-shadow: 4px 4px 0px #e5e7eb;
        display: flex;
        flex-direction: column;
    }

    .video-card:hover {
        transform: translateY(-6px);
        box-shadow: 8px 8px 0px #c4b5fd;
        border-color: #8b5cf6;
    }

    .video-player-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
        background: #000;
        overflow: hidden;
    }

    .video-player {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        border: none;
    }

    .video-content {
        padding: 24px;
        flex-grow: 1;
        background: white;
        display: flex;
        flex-direction: column;
    }

    .video-title {
        font-family: 'Nunito', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .video-desc {
        font-size: 15px;
        color: #6b7280;
        line-height: 1.6;
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
        background: #fef08a;
        border: 4px solid #111827;
        box-shadow: 10px 10px 0px #111827;
        border-radius: 24px;
        padding: 60px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .modern-cta::before {
        content: '🧠';
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
<section class="hero-video">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#fff; color:#7c3aed; font-weight:900; font-size:15px; padding:8px 20px; border-radius:100px; margin-bottom:20px; box-shadow: 2px 2px 0px rgba(0,0,0,0.1);">🍿 NONTON BARENG</div>
        <h1 class="hero-video-title">
            Nonton <span>Kuy!</span>
        </h1>
        <p class="hero-video-desc">
            Bosan baca teks mulu? Santai, di sini kamu bisa belajar kelola sampah lewat video animasi dan dokumenter pendek yang dijamin asik dan ngga ngebosenin! 🎬✨
        </p>
    </div>
</section>

<!-- ── VIDEO GRID ────────────────────────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 80px 0;">
    <div class="container">
        @if($videos->count() > 0)
            <div class="video-grid">
                @foreach($videos as $video)
                <div class="video-card">
                    <div class="video-player-wrapper">
                        @if(str_starts_with($video->video_url, 'http'))
                            <iframe class="video-player" src="{{ $video->video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <video class="video-player" src="{{ Storage::url($video->video_url) }}" controls controlsList="nodownload"></video>
                        @endif
                    </div>
                    <div class="video-content">
                        <div style="display:inline-block; background:#f3e8ff; color:#7c3aed; font-size:13px; font-weight:900; padding:6px 14px; border-radius:100px; margin-bottom:12px; align-self:flex-start; box-shadow: 2px 2px 0px #e9d5ff;">Edukasi</div>
                        <h3 class="video-title">{{ $video->title }}</h3>
                        @if($video->description)
                            <p class="video-desc">{{ $video->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:60px; margin-bottom:20px;">🎬</div>
                <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; margin-bottom:12px; color:#111827;">Belum Ada Video</h3>
                <p style="color:#6b7280; font-size:16px;">Koleksi video edukasi lingkungan saat ini masih kosong.</p>
            </div>
        @endif

        <!-- ── BRUTAL CTA ────────────────────────────────────────────── -->
        <div class="modern-cta">
            <h2 class="modern-cta-title">Udah Kelar Nontonnya? 🧠✨</h2>
            <p style="font-size:18px; color:#111827; font-weight:700; max-width:550px; margin: 0 auto 30px; position:relative; z-index:2; line-height: 1.6;">Kuy tes otak bentar! Buktikan kalau kamu udah beneran paham sama video-video keren di atas.</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center;">
                <a href="{{ route('evaluasi') }}" style="background:#a7f3d0; color:#111827; padding:16px 32px; border-radius:100px; font-weight:900; font-size: 18px; text-decoration:none; display:inline-flex; align-items:center; gap:8px; border: 3px solid #111827; box-shadow: 5px 5px 0px #111827; transition: all 0.2s;" onmouseover="this.style.transform='translate(-2px, -2px)'; this.style.boxShadow='7px 7px 0px #111827';" onmouseout="this.style.transform='translate(0, 0)'; this.style.boxShadow='5px 5px 0px #111827';">
                    🎮 Gas Kuis Sekarang!
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
