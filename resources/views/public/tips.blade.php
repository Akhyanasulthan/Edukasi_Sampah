@extends('layouts.public')
@section('title', 'Tips Pengelolaan')

@push('styles')
<style>
    /* ── HERO TIPS ── */
    .hero-tips {
        background: linear-gradient(135deg, #fef08a 0%, #f59e0b 100%);
        padding: 120px 0 100px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid #f3f4f6;
    }

    .hero-tips::before {
        content: "💡";
        font-size: 80px;
        position: absolute;
        top: 20%; left: 8%;
        opacity: 0.5;
        transform: rotate(-15deg);
        animation: floatTilt 5s ease-in-out infinite;
    }
    .hero-tips::after {
        content: "🌿";
        font-size: 80px;
        position: absolute;
        bottom: 25%; right: 10%;
        opacity: 0.4;
        animation: floatTilt 4s ease-in-out infinite reverse;
    }

    @keyframes floatTilt {
        0%, 100% { transform: translateY(0) rotate(-15deg); }
        50% { transform: translateY(-20px) rotate(-5deg); }
    }

    .hero-tips-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(40px, 6vw, 64px);
        font-weight: 900;
        color: #78350f;
        margin-bottom: 16px;
        text-shadow: 2px 2px 0px rgba(255,255,255,0.4);
    }

    .hero-tips-title span {
        color: #ffffff;
        background: #d97706;
        padding: 4px 16px;
        border-radius: 16px;
        display: inline-block;
        transform: rotate(2deg);
        box-shadow: 4px 4px 0px rgba(0,0,0,0.15);
    }

    .hero-tips-desc {
        font-size: 19px;
        color: #78350f;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 600;
    }

    /* ── TIPS GRID ── */
    .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .tip-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 3px solid #f3f4f6;
        box-shadow: 4px 4px 0px #e5e7eb;
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }

    .tip-card:hover {
        transform: translateY(-6px);
        box-shadow: 8px 8px 0px #fde68a;
        border-color: #fbbf24;
    }

    .tip-img-wrapper {
        position: relative;
        width: 100%;
        height: 220px;
        overflow: hidden;
    }

    .tip-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .tip-card:hover .tip-img {
        transform: scale(1.08);
    }

    .tip-badge {
        position: absolute;
        top: 16px; left: 16px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        color: #059669;
        font-weight: 800;
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .tip-content {
        padding: 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .tip-title {
        font-family: 'Nunito', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
        line-height: 1.3;
        transition: color 0.3s;
    }

    .tip-card:hover .tip-title {
        color: #d97706;
    }

    .tip-body {
        font-size: 15px;
        color: #6b7280;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .read-more-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #d97706;
        font-weight: 800;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: #fef3c7;
        padding: 10px 16px;
        border-radius: 12px;
        width: fit-content;
        transition: all 0.3s;
    }

    .tip-card:hover .read-more-wrapper {
        background: #f59e0b;
        color: #fff;
    }
    .read-more-wrapper span {
        transition: transform 0.3s;
    }

    .tip-card:hover .read-more-wrapper span {
        transform: translateX(4px);
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
        background: #93c5fd;
        border: 4px solid #111827;
        box-shadow: 10px 10px 0px #111827;
        border-radius: 24px;
        padding: 60px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .modern-cta::before {
        content: '🤫';
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
<section class="hero-tips">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#fff; color:#d97706; font-weight:900; font-size:15px; padding:8px 20px; border-radius:100px; margin-bottom:20px; box-shadow: 2px 2px 0px rgba(0,0,0,0.1);">💡 HACKS SEHARI-HARI</div>
        <h1 class="hero-tips-title">
            Tips & Trik <span>Zero-Waste</span>
        </h1>
        <p class="hero-tips-desc">
            Mau bantu bumi tapi males ribet? Santai, di sini banyak contekan life hacks kece buat ngurangin sampah tanpa pusing. Coba cek yang mana yang paling pas buat lu! 🌿✨
        </p>
    </div>
</section>

<!-- ── TIPS GRID ────────────────────────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 80px 0;">
    <div class="container">
        @if($tips->count() > 0)
            <div class="tips-grid">
                @foreach($tips as $tip)
                <a href="{{ route('tips.show', $tip->slug) }}" class="tip-card" style="text-decoration: none; color: inherit;">
                    <div class="tip-img-wrapper">
                        <div class="tip-badge">{{ $tip->created_at->format('d M Y') }}</div>
                        @if($tip->image_path)
                            <img src="{{ Storage::url($tip->image_path) }}" alt="{{ $tip->title }}" class="tip-img">
                        @else
                            <div class="tip-img" style="background:linear-gradient(135deg, #dcfce7, #a7f3d0); display:flex; align-items:center; justify-content:center; font-size:60px;">💡</div>
                        @endif
                    </div>
                    <div class="tip-content">
                        <h3 class="tip-title">{{ $tip->title }}</h3>
                        <div class="tip-body">
                            {!! strip_tags($tip->content) !!}
                        </div>
                        <div class="read-more-wrapper">
                            Baca Selengkapnya <span></span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:60px; margin-bottom:20px;">💡</div>
                <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; margin-bottom:12px; color:#111827;">Belum Ada Tips</h3>
                <p style="color:#6b7280; font-size:16px;">Tips dan life hacks harian belum ditambahkan oleh admin saat ini.</p>
            </div>
        @endif

        <!-- ── BRUTAL CTA ────────────────────────────────────────────── -->
        <div class="modern-cta">
            <h2 class="modern-cta-title">Punya Life Hacks Sendiri? 🤫</h2>
            <p style="font-size:18px; color:#111827; font-weight:700; max-width:550px; margin: 0 auto 30px; position:relative; z-index:2; line-height: 1.6;">Jangan pelit ilmu dong! Spill trik rahasia kamu buat ngolah sampah ke mimin, biar bisa dicoba temen-temen lain.</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center;">
                <a href="{{ route('kontak') }}" style="background:#fef08a; color:#111827; padding:16px 32px; border-radius:100px; font-weight:900; font-size: 18px; text-decoration:none; display:inline-flex; align-items:center; gap:8px; border: 3px solid #111827; box-shadow: 5px 5px 0px #111827; transition: all 0.2s;" onmouseover="this.style.transform='translate(-2px, -2px)'; this.style.boxShadow='7px 7px 0px #111827';" onmouseout="this.style.transform='translate(0, 0)'; this.style.boxShadow='5px 5px 0px #111827';">
                    📩 Spill Trik Kamu!
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
