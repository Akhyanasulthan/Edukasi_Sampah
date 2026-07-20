@extends('layouts.public')
@section('title', $materi->title)

@section('content')

@push('styles')
<style>
    .materi-show-hero {
        background: linear-gradient(135deg, #c4b5fd 0%, #93c5fd 100%);
        padding: 60px 0;
        border-bottom: 3px solid #111827;
        margin-top: -50px;
        margin-bottom: 40px;
    }
    .materi-show-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(32px, 4vw, 48px);
        font-weight: 900;
        color: #111827;
        text-shadow: 2px 2px 0px white;
    }
    .brutal-box {
        background: white;
        border: 4px solid #111827;
        border-radius: 24px;
        box-shadow: 8px 8px 0px #111827;
        padding: 40px;
    }
    .brutal-sidebar {
        background: white;
        border: 4px solid #111827;
        border-radius: 24px;
        box-shadow: 8px 8px 0px #111827;
        padding: 24px;
    }
    .brutal-btn {
        font-weight: 900;
        border: 3px solid #111827;
        box-shadow: 4px 4px 0px #111827;
        padding: 12px 24px;
        border-radius: 100px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
    }
    .brutal-btn:hover {
        transform: translate(2px, 2px);
        box-shadow: 2px 2px 0px #111827;
    }
    .brutal-btn-primary { background: #fef08a; color: #111827; }
    .brutal-btn-outline { background: white; color: #111827; }
</style>
@endpush

<!-- HEADER MATERI -->
<div class="materi-show-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:12px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span> 
            <a href="{{ route('materi.index') }}">Materi Edukasi</a> <span>›</span> 
            <span style="font-weight:800; color:#111827;">{{ $materi->title }}</span>
        </div>
        <h1 class="materi-show-title">{{ $materi->title }}</h1>
    </div>
</div>

<!-- KONTEN MATERI -->
<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 300px;gap:40px;align-items:start;">
            
            <!-- MAIN CONTENT -->
            <div class="brutal-box">
                
                @if($materi->image_path)
                <img src="{{ Storage::url($materi->image_path) }}" alt="{{ $materi->title }}" style="width:100%; border-radius:var(--radius-md); margin-bottom: 30px;">
                @endif

                <div class="article-content" style="line-height: 1.8; color: var(--text-body);">
                    {!! $materi->content !!}
                </div>

                <hr style="border:none;border-top:1px solid var(--border);margin:40px 0;">

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <a href="{{ route('materi.index') }}" class="brutal-btn brutal-btn-outline">← Balik ke Daftar</a>
                    <a href="{{ route('evaluasi') }}" class="brutal-btn brutal-btn-primary">Uji Nyali (Evaluasi) →</a>
                </div>
            </div>

            <!-- SIDEBAR MATERI -->
            <div style="position:sticky;top:100px;">
                <div class="brutal-sidebar" style="margin-bottom:24px;">
                    <h3 style="font-family:'Nunito';font-weight:800;font-size:18px;margin-bottom:16px;color:var(--text-dark);">Daftar Materi Edukasi</h3>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:8px;">
                        @foreach($globalMaterials as $navMateri)
                        <li>
                            <a href="{{ route('materi.show', $navMateri->slug) }}" style="display:block;padding:12px 16px;background:{{ request()->segment(2) == $navMateri->slug ? '#fef08a' : 'white' }};border:2px solid #111827;border-radius:12px;font-size:14px;font-weight:800;color:#111827;text-decoration:none;transition:all 0.2s;{{ request()->segment(2) == $navMateri->slug ? 'box-shadow:4px 4px 0px #111827; transform:translate(-2px, -2px);' : '' }}" onmouseover="if('{{ request()->segment(2) }}' != '{{ $navMateri->slug }}') { this.style.background='#a7f3d0'; this.style.transform='translate(-2px, -2px)'; this.style.boxShadow='4px 4px 0px #111827'; }" onmouseout="if('{{ request()->segment(2) }}' != '{{ $navMateri->slug }}') { this.style.background='white'; this.style.transform='none'; this.style.boxShadow='none'; }">
                                {{ request()->segment(2) == $navMateri->slug ? '📍' : '📖' }} {{ $navMateri->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .article-content h2 { font-family: 'Nunito'; font-size: 24px; font-weight: 800; color: var(--text-dark); margin: 30px 0 15px; }
    .article-content h3 { font-family: 'Nunito'; font-size: 20px; font-weight: 700; color: var(--text-dark); margin: 25px 0 10px; }
    .article-content p { margin-bottom: 16px; }
    .article-content ul, .article-content ol { margin-bottom: 20px; padding-left: 20px; }
    .article-content li { margin-bottom: 8px; }
    .article-content strong { color: var(--text-dark); }
</style>

@endsection
