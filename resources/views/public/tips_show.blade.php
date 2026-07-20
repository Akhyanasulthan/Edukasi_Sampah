@extends('layouts.public')
@section('title', $tip->title)

@push('styles')
<style>
    /* Hero Section */
    .tip-detail-hero {
        background: linear-gradient(135deg, #fef08a 0%, #f59e0b 100%);
        padding: 100px 20px 120px;
        text-align: center;
        position: relative;
        border-bottom: 2px solid #111827;
        overflow: hidden;
    }

    .tip-detail-hero::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 100%;
        height: 100px;
        background: #f8fafc;
        transform: skewY(-4deg);
        border-top: 2px solid #111827;
        z-index: 1;
    }

    .tip-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #111827;
        color: white;
        padding: 8px 20px;
        border-radius: 100px;
        font-weight: 900;
        font-size: 14px;
        margin-bottom: 24px;
        box-shadow: 4px 4px 0px rgba(0,0,0,0.3);
        position: relative;
        z-index: 2;
    }

    .tip-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 54px);
        font-weight: 900;
        color: #78350f;
        margin-bottom: 20px;
        line-height: 1.2;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        text-shadow: 2px 2px 0px rgba(255,255,255,0.4);
        position: relative;
        z-index: 2;
    }

    /* Content Wrapper */
    .tip-content-wrapper {
        max-width: 800px;
        margin: -60px auto 60px;
        background: white;
        border-radius: 32px;
        border: 4px solid #111827;
        padding: 48px;
        box-shadow: 12px 12px 0px #111827;
        position: relative;
        z-index: 2;
    }

    .tip-image {
        width: 100%;
        height: auto;
        border-radius: 20px;
        border: 3px solid #111827;
        margin-bottom: 40px;
        box-shadow: 6px 6px 0px #f59e0b;
    }

    /* Typography inside content */
    .tip-body {
        font-size: 18px;
        line-height: 1.8;
        color: #4b5563;
    }

    /* Memaksa teks hasil copas dari editor agar mengikuti warna yang benar */
    .tip-body * {
        color: inherit !important;
        background-color: transparent !important;
        font-family: inherit !important;
    }

    .tip-body h2, .tip-body h3 {
        font-family: 'Nunito', sans-serif !important;
        color: #111827 !important;
        font-weight: 800 !important;
        margin-top: 40px;
        margin-bottom: 16px;
    }

    .tip-body p {
        margin-bottom: 20px;
    }

    .tip-body ul, .tip-body ol {
        margin-bottom: 24px;
        padding-left: 20px;
    }

    .tip-body li {
        margin-bottom: 12px;
    }

    .tip-body strong {
        color: #d97706;
        font-weight: 900;
        background: #fef08a;
        padding: 0 4px;
        border-radius: 4px;
    }

    /* Navigation */
    .back-nav {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 2px dashed #e5e7eb;
        display: flex;
        justify-content: center;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: white;
        color: #111827;
        padding: 16px 32px;
        border-radius: 100px;
        font-weight: 900;
        font-size: 18px;
        text-decoration: none;
        border: 3px solid #111827;
        box-shadow: 6px 6px 0px #111827;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-back:hover {
        background: #fef08a;
        transform: translate(2px, 2px);
        box-shadow: 4px 4px 0px #111827;
    }

</style>
@endpush

@section('content')
<section class="tip-detail-hero">
    <div class="container">
        <div class="tip-badge">
            📅 {{ $tip->created_at->format('d F Y') }}
        </div>
        <h1 class="tip-title">{{ $tip->title }}</h1>
    </div>
</section>

<section style="background: #f8fafc; padding: 0 20px 40px;">
    <div class="tip-content-wrapper">
        
        @if($tip->image_path)
            <img src="{{ Storage::url($tip->image_path) }}" alt="{{ $tip->title }}" class="tip-image">
        @endif

        <div class="tip-body">
            {!! $tip->content !!}
        </div>

        <div class="back-nav">
            <a href="{{ route('tips') }}" class="btn-back">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Tips
            </a>
        </div>
    </div>
</section>
@endsection
