@extends('layouts.public')
@section('title', 'Materi Edukasi')

@section('content')

@push('styles')
<style>
    .materi-hero {
        background: linear-gradient(135deg, #a7f3d0 0%, #fef08a 100%);
        padding: 80px 0 60px;
        border-bottom: 3px solid #111827;
        margin-top: -50px;
        margin-bottom: 40px;
    }
    .materi-hero-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 54px);
        font-weight: 900;
        color: #111827;
        text-shadow: 2px 2px 0px white;
        margin-bottom: 12px;
    }
    .materi-card {
        background: white;
        border: 4px solid #111827;
        border-radius: 24px;
        padding: 36px;
        display: flex;
        gap: 24px;
        align-items: flex-start;
        box-shadow: 8px 8px 0px #111827;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        color: inherit;
    }
    .materi-card:hover {
        transform: translate(-4px, -4px);
        box-shadow: 12px 12px 0px #4ade80;
    }
    .cta-box {
        background: #111827;
        border-radius: 32px;
        padding: 60px 40px;
        text-align: center;
        margin-top: 60px;
        position: relative;
        overflow: hidden;
    }
    .cta-box::before {
        content: '';
        position: absolute;
        width: 300px; height: 300px;
        background: #fef08a;
        border-radius: 50%;
        filter: blur(80px);
        top: -100px; left: -50px;
        opacity: 0.3;
    }
    .btn-brutal {
        background: #fef08a;
        color: #111827;
        border: 3px solid #111827;
        box-shadow: 6px 6px 0px #111827;
        padding: 16px 32px;
        border-radius: 100px;
        font-weight: 900;
        font-size: 18px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
    }
    .btn-brutal:hover {
        transform: translate(2px, 2px);
        box-shadow: 4px 4px 0px #111827;
        background: #4ade80;
    }
</style>
@endpush

<div class="materi-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:16px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span> <span style="font-weight:800; color:#111827;">Materi Edukasi</span>
        </div>
        <div class="materi-hero-title">Kumpulan Materi Seru 📚</div>
        <p style="color:#374151;font-size:18px;font-weight:700;max-width:600px;">Gak usah pusing baca teks panjang, di sini materinya udah dirangkum jadi asik banget buat dipelajari.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:28px;">

            @php 
                $icons = ['📖', '🗂️', '♻️', '🔄']; 
                $border_colors = ['#fde68a', '#93c5fd', '#c4b5fd', '#86efac']; 
            @endphp
            @foreach($materials as $index => $m)
            <a href="{{ route('materi.show', $m->slug) }}" class="materi-card" onmouseover="this.style.boxShadow='12px 12px 0px {{ $border_colors[$index % count($border_colors)] }}'" onmouseout="this.style.boxShadow='8px 8px 0px #111827'">
                <div style="font-size:56px;flex-shrink:0;">{{ $icons[$index % count($icons)] }}</div>
                <div>
                    <div style="display:inline-block;background:{{ $border_colors[$index % count($border_colors)] }};color:#111827;font-weight:900;padding:4px 12px;border-radius:100px;font-size:12px;margin-bottom:12px;border:2px solid #111827;">BAB {{ $index + 1 }}</div>
                    <h3 style="font-family:'Nunito';font-size:24px;font-weight:900;color:#111827;margin-bottom:8px;">{{ $m->title }}</h3>
                    <p style="font-size:15px;color:#4b5563;line-height:1.6;font-weight:600;">Kepoin materi selengkapnya soal {{ strtolower($m->title) }} di sini yuk!</p>
                    <div style="margin-top:16px;color:#111827;font-size:15px;font-weight:900;text-decoration:underline;text-underline-offset:4px;">Gas Belajar 🚀</div>
                </div>
            </a>
            @endforeach

        </div>

        <!-- CTA -->
        <div class="cta-box">
            <h3 style="font-family:'Nunito';font-size:32px;font-weight:900;color:#fff;margin-bottom:12px;position:relative;z-index:2;">Udah Khatam Semua Materi? 😎</h3>
            <p style="color:#d1fae5;font-size:18px;margin-bottom:30px;position:relative;z-index:2;">Yuk uji skill pemahaman kamu ngerjain quiz interaktif. Santai aja, gak masuk rapor kok!</p>
            <div style="position:relative;z-index:2;">
                <a href="{{ route('evaluasi') }}" class="btn-brutal">📝 Mulai Evaluasi Sekarang</a>
            </div>
        </div>
    </div>
</section>

@endsection
