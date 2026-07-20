@extends('layouts.public')
@section('title', 'Evaluasi Edukasi Sampah')

@push('styles')
<style>
    /* ── HERO EVALUASI ── */
    .hero-evaluasi {
        background: linear-gradient(135deg, #a7f3d0 0%, #34d399 100%);
        padding: 120px 0 160px; /* Extra bottom padding to overlap card */
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    
    .hero-evaluasi::before {
        content: "🌱";
        font-size: 80px;
        position: absolute;
        top: 15%;
        left: 10%;
        opacity: 0.3;
        transform: rotate(-15deg);
        animation: float 6s ease-in-out infinite;
    }
    .hero-evaluasi::after {
        content: "♻️";
        font-size: 100px;
        position: absolute;
        bottom: 25%;
        right: 8%;
        opacity: 0.25;
        transform: rotate(20deg);
        animation: float 8s ease-in-out infinite reverse;
    }
    
    @keyframes float {
        0% { transform: translateY(0) rotate(-15deg); }
        50% { transform: translateY(-20px) rotate(-5deg); }
        100% { transform: translateY(0) rotate(-15deg); }
    }

    .hero-evaluasi-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(40px, 6vw, 64px);
        font-weight: 900;
        color: #064e3b;
        margin-bottom: 16px;
        text-shadow: 2px 2px 0px rgba(255,255,255,0.4);
    }

    .hero-evaluasi-title span {
        color: #fff;
        background: #059669;
        padding: 4px 16px;
        border-radius: 16px;
        display: inline-block;
        transform: rotate(-2deg);
        box-shadow: 4px 4px 0px rgba(0,0,0,0.15);
    }

    .hero-evaluasi-desc {
        font-size: 19px;
        color: #064e3b;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 600;
    }

    /* ── EVALUASI SECTION ── */
    .eval-wrapper {
        margin-top: -100px;
        position: relative;
        z-index: 10;
        margin-bottom: 80px;
    }

    .eval-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border-radius: 40px;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15);
        border: 2px solid #fff;
        padding: 48px;
        max-width: 800px;
        margin: 0 auto;
    }

    @media (max-width: 600px) {
        .eval-card { padding: 32px 24px; border-radius: 32px; }
    }

    .form-group { margin-bottom: 24px; }
    
    .form-label {
        display: block; font-weight: 700; color: #374151; margin-bottom: 10px; font-size: 14px;
    }

    .form-input, .form-select, .form-textarea {
        width: 100%; 
        padding: 16px; 
        background: #f9fafb;
        border: 2px solid transparent; 
        border-radius: 16px;
        font-family: inherit; font-size: 15px; color: #111827; 
        transition: all 0.3s ease;
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23111827%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
        background-repeat: no-repeat;
        background-position: right 16px top 50%;
        background-size: 12px auto;
        cursor: pointer;
    }

    .form-input::placeholder, .form-textarea::placeholder, .form-select::placeholder {
        color: #9ca3af;
    }

    .form-input:focus, .form-textarea:focus, .form-select:focus {
        outline: none; 
        background: white;
        border-color: #34d399; 
        box-shadow: 0 4px 12px rgba(52, 211, 153, 0.1);
    }

    .btn-submit {
        display: inline-flex; 
        align-items: center; justify-content: center; gap: 8px;
        width: 100%; padding: 20px; 
        background: #10b981;
        color: white; border: none; border-radius: 100px; 
        font-size: 20px; font-weight: 900; letter-spacing: 0.5px;
        cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        margin-top: 16px;
        box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.5);
    }

    .btn-submit:hover { 
        background: #059669; 
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 20px 30px -10px rgba(5, 150, 105, 0.6);
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

    .alert-error {
        background: #fef2f2; 
        color: #991b1b; 
        padding: 16px; 
        border-radius: 16px; 
        margin-bottom: 24px; 
        border: 1px solid #fecaca; 
        display: flex; align-items: center; gap: 12px;
        font-weight: 700; font-size: 15px;
    }

    .closed-state {
        text-align: center; padding: 60px 20px;
    }

    .form-grid-3 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .form-grid-3 { grid-template-columns: 1fr; }
    }

    /* ── QUIZ STYLES ── */
    .question-box {
        background: #ffffff;
        border: 3px solid #f3f4f6;
        border-radius: 24px;
        padding: 32px;
        margin-bottom: 32px;
        box-shadow: 4px 4px 0px #e5e7eb;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .question-box:hover {
        border-color: #34d399;
        box-shadow: 6px 6px 0px #a7f3d0;
        transform: translateY(-4px);
    }
    .question-number {
        display: inline-block;
        background: #10b981;
        color: white;
        font-weight: 800;
        font-size: 14px;
        padding: 6px 16px;
        border-radius: 100px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 2px 2px 0px #047857;
    }
    .question-title {
        font-size: 20px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 24px;
        line-height: 1.5;
    }
    .radio-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }
    .radio-option {
        position: relative;
    }
    .radio-option input {
        display: none;
    }
    .radio-label {
        display: flex;
        align-items: center;
        padding: 18px 24px;
        background: #f9fafb;
        border: 2px solid #e5e7eb;
        border-radius: 16px;
        font-weight: 700;
        font-size: 16px;
        color: #4b5563;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .radio-label::before {
        content: '';
        display: inline-block;
        width: 22px;
        height: 22px;
        border: 2px solid #d1d5db;
        border-radius: 50%;
        margin-right: 14px;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }
    .radio-option input:checked + .radio-label {
        background: #f0fdf4;
        border-color: #10b981;
        color: #047857;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
        transform: scale(1.01);
    }
    .radio-option input:checked + .radio-label::before {
        border-color: #10b981;
        background-color: #10b981;
        box-shadow: inset 0 0 0 4px #f0fdf4;
    }
    .radio-option input:hover + .radio-label {
        border-color: #34d399;
    }

</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-evaluasi">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#fff; color:#059669; font-weight:900; font-size:15px; padding:8px 20px; border-radius:100px; margin-bottom:20px; box-shadow: 2px 2px 0px rgba(0,0,0,0.1);">🔥 KUIS & CHALLENGE</div>
        <h1 class="hero-evaluasi-title">
            Uji <span>Skil Memilahmu!</span>
        </h1>
        <p class="hero-evaluasi-desc">
            Udah sejauh mana nih ilmu kamu soal kelola sampah? Yuk buktikan pemahamanmu di kuis ini dan bantu kami bikin materi yang lebih seru lagi! 🚀
        </p>
    </div>
</section>

<!-- ── EVALUASI FORM ────────────────────────────────────────────── -->
<section class="eval-wrapper">
    <div class="container">
        <div class="eval-card">
            
            @if(session('success'))
                <div class="alert-success">
                    <span style="font-size:20px;">🎉</span>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    <span style="font-size:20px;">⚠️</span>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @if(!$isOpen)
                <div class="closed-state">
                    <div style="font-size:60px; margin-bottom:20px;">🔒</div>
                    <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; color:#111827; margin-bottom:12px;">Form Evaluasi Ditutup</h3>
                    <p style="color:#6b7280; font-size:16px;">Mohon maaf, saat ini kami sedang tidak menerima masukan evaluasi. Silakan kembali lagi di lain waktu.</p>
                </div>
            @else
                <form action="{{ route('evaluasi.submit') }}" method="POST">
                    @csrf
                    
                    @if($questions->isEmpty())
                        <div class="closed-state">
                            <div style="font-size:60px; margin-bottom:20px;">📝</div>
                            <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; color:#111827; margin-bottom:12px;">Belum Ada Soal</h3>
                            <p style="color:#6b7280; font-size:16px;">Admin belum menambahkan soal evaluasi. Silakan kembali lagi nanti.</p>
                        </div>
                    @else
                        @foreach($questions as $index => $q)
                            <div class="question-box">
                                <div class="question-number">Soal {{ $index + 1 }}</div>
                                <div class="question-title">{{ $q->question }}</div>
                                
                                @if($q->type == 'text')
                                    <input type="text" id="question_{{ $q->id }}" name="answers[{{ $q->id }}]" class="form-input" placeholder="Ketik jawabanmu di sini..." value="{{ old('answers.'.$q->id) }}" required>
                                
                                @elseif($q->type == 'number')
                                    <input type="number" id="question_{{ $q->id }}" name="answers[{{ $q->id }}]" class="form-input" placeholder="Masukkan angka..." value="{{ old('answers.'.$q->id) }}" required>
                                
                                @elseif($q->type == 'radio')
                                    <div class="radio-grid">
                                        @if($q->options)
                                            @foreach($q->options as $optIndex => $option)
                                                <label class="radio-option">
                                                    <input type="radio" name="answers[{{ $q->id }}]" value="{{ $option }}" {{ old('answers.'.$q->id) == $option ? 'checked' : '' }} required>
                                                    <span class="radio-label">{{ $option }}</span>
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                
                                @elseif($q->type == 'textarea')
                                    <textarea id="question_{{ $q->id }}" name="answers[{{ $q->id }}]" class="form-textarea" rows="4" placeholder="Ketik jawaban panjangmu di sini..." required>{{ old('answers.'.$q->id) }}</textarea>
                                @endif
                                
                                @error('answers.'.$q->id) 
                                    <div style="color:#ef4444; font-size:13px; margin-top:12px; font-weight:600;">{{ $message }}</div> 
                                @enderror
                            </div>
                        @endforeach
                        
                        <button type="submit" class="btn-submit" style="margin-top:20px; padding:20px; font-size:18px;">Submit Jawaban </button>
                    @endif
                </form>
            @endif
        </div>
    </div>
</section>

@endsection
