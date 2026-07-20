@extends('layouts.public')
@section('title', 'Kontak Kami')

@push('styles')
<style>
    /* ── HERO KONTAK ── */
    .hero-kontak {
        background: linear-gradient(135deg, #a5b4fc 0%, #4f46e5 100%);
        padding: 120px 0 100px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 2px solid #111827;
    }

    .hero-kontak::before {
        content: "👋";
        font-size: 80px;
        position: absolute;
        top: 20%; left: 10%;
        opacity: 0.5;
        transform: rotate(-15deg);
        animation: floatTilt 5s ease-in-out infinite;
    }
    .hero-kontak::after {
        content: "💬";
        font-size: 80px;
        position: absolute;
        bottom: 25%; right: 12%;
        opacity: 0.4;
        animation: floatTilt 4s ease-in-out infinite reverse;
    }

    @keyframes floatTilt {
        0%, 100% { transform: translateY(0) rotate(-15deg); }
        50% { transform: translateY(-20px) rotate(-5deg); }
    }

    .hero-kontak-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(40px, 6vw, 64px);
        font-weight: 900;
        color: #ffffff;
        margin-bottom: 16px;
        text-shadow: 2px 2px 0px rgba(0,0,0,0.2);
    }

    .hero-kontak-title span {
        color: #ffffff;
        background: #111827;
        padding: 4px 16px;
        border-radius: 16px;
        display: inline-block;
        transform: rotate(-2deg);
        box-shadow: 4px 4px 0px rgba(0,0,0,0.2);
    }

    .hero-kontak-desc {
        font-size: 19px;
        color: #e0e7ff;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 600;
        text-shadow: 1px 1px 0px rgba(0,0,0,0.1);
    }

    /* ── CONTACT SECTION ── */
    .contact-wrapper {
        margin-top: -100px;
        position: relative;
        z-index: 10;
        margin-bottom: 80px;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        background: white;
        border-radius: 32px;
        border: 4px solid #111827;
        box-shadow: 12px 12px 0px #111827;
        overflow: hidden;
    }

    @media (max-width: 800px) {
        .contact-container { grid-template-columns: 1fr; }
    }

    /* Left Side: Info */
    .contact-info {
        background: #111827;
        color: white;
        padding: 48px;
        position: relative;
        overflow: hidden;
    }

    .contact-info::after {
        content: '';
        position: absolute;
        bottom: -50px; right: -50px;
        width: 200px; height: 200px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    .info-title {
        font-family: 'Nunito', sans-serif;
        font-size: 28px;
        font-weight: 900;
        margin-bottom: 16px;
    }

    .info-desc {
        font-size: 15px;
        color: #d1fae5;
        line-height: 1.6;
        margin-bottom: 40px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
        font-size: 15px;
        font-weight: 500;
        color: #ecfdf5;
    }

    .info-icon {
        width: 48px; height: 48px;
        background: rgba(255,255,255,0.15);
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px;
    }

    /* Right Side: Form */
    .contact-form-wrap {
        padding: 48px;
        background: white;
    }

    .form-group { margin-bottom: 24px; }
    
    .form-label {
        display: block; font-weight: 700; color: #374151; margin-bottom: 8px; font-size: 14px;
    }

    .form-input, .form-textarea {
        width: 100%; 
        padding: 16px; 
        background: #f9fafb;
        border: 3px solid #e5e7eb; 
        border-radius: 16px;
        font-family: inherit; font-size: 15px; color: #111827; font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
    }

    .form-input::placeholder, .form-textarea::placeholder {
        color: #9ca3af;
    }

    .form-input:focus, .form-textarea:focus {
        outline: none; 
        background: white;
        border-color: #4f46e5; 
        box-shadow: 4px 4px 0px #c7d2fe;
        transform: translateY(-2px);
    }

    .btn-submit {
        display: inline-flex; 
        align-items: center; justify-content: center; gap: 8px;
        width: 100%; padding: 18px; 
        background: #4f46e5;
        color: white; border: 3px solid #111827; border-radius: 100px; 
        font-size: 18px; font-weight: 900; letter-spacing: 0.5px;
        cursor: pointer; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 6px 6px 0px #111827;
        margin-top: 10px;
    }

    .btn-submit:hover { 
        background: #4338ca; 
        transform: translate(2px, 2px);
        box-shadow: 4px 4px 0px #111827;
    }

    .alert-success {
        background: #ecfdf5; 
        color: #065f46; 
        padding: 16px; 
        border-radius: 16px; 
        margin-bottom: 24px; 
        border: 1px solid #a7f3d0; 
        display: flex; align-items: center; gap: 12px;
        font-weight: 700; font-size: 15px;
    }

</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-kontak">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#fff; color:#4f46e5; font-weight:900; font-size:15px; padding:8px 20px; border-radius:100px; margin-bottom:20px; box-shadow: 2px 2px 0px rgba(0,0,0,0.1);">📱 CONNECT WITH US</div>
        <h1 class="hero-kontak-title">
            Say <span>Hi! 👋</span>
        </h1>
        <p class="hero-kontak-desc">
            Ada ide seru, pertanyaan, atau sekadar pengen kolab bareng? Jangan ragu buat drop pesan kamu di sini, mimin siap bales! 😎
        </p>
    </div>
</section>

<!-- ── CONTACT FORM ─────────────────────────────────────────────── -->
<section class="contact-wrapper">
    <div class="container">
        <div class="contact-container">
            
            <!-- INFO SIDE -->
            <div class="contact-info">
                <h2 class="info-title">Let's Talk! 💬</h2>
                <p class="info-desc">Mimin selalu seneng dapet notif dari kalian. Kuy saling sapa biar makin akrab!</p>
                
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div>
                        <div style="font-size:12px; opacity:0.8; margin-bottom:2px;">Lokasi Kami</div>
                        <div>Cilandesan rt3/rw1, Desa Pakuhaji, Kecamatan Cisalak, Kabupaten Subang Jawa Barat</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div>
                        <div style="font-size:12px; opacity:0.8; margin-bottom:2px;">Email Resmi</div>
                        <div>kknpakuhaji2026@gmail.com</div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </div>
                    <div>
                        <div style="font-size:12px; opacity:0.8; margin-bottom:2px;">Media Sosial</div>
                        <div>kknpakuhaji_2026</div>
                    </div>
                </div>
            </div>

            <!-- FORM SIDE -->
            <div class="contact-form-wrap">
                @if(session('success'))
                    <div class="alert-success">
                        <span style="font-size:20px;">🎉</span>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('kontak.submit') }}" method="POST">
                    @csrf
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-input" value="{{ old('nama') }}" placeholder="" required>
                            @error('nama') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="" required>
                            @error('email') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjek" class="form-label">Subjek Pesan</label>
                        <input type="text" id="subjek" name="subjek" class="form-input" value="{{ old('subjek') }}" placeholder="Apa yang ingin Anda bicarakan?" required>
                        @error('subjek') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="pesan" class="form-label">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" class="form-textarea" rows="6" placeholder="Tuliskan pesan, saran, atau pertanyaan Anda di sini..." required>{{ old('pesan') }}</textarea>
                        @error('pesan') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn-submit">
                        Kirim Pesan Sekarang 
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
