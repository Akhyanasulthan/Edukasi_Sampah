@extends('layouts.public')

@section('title', 'Beranda')
@section('meta-desc', 'EduSampah — Platform edukasi pengelolaan sampah untuk generasi muda yang peduli lingkungan sehat.')

@push('styles')
<style>
    /* ── HERO ── */
    .hero {
        background: linear-gradient(135deg, #dcfce7 0%, #fef08a 100%);
        padding: 100px 0 120px;
        position: relative;
        overflow: hidden;
        border-bottom: 3px solid #111827;
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0; height: 150px;
        background: linear-gradient(to top, rgba(255,255,255,1), transparent);
        z-index: 1;
    }

    .hero-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        align-items: center;
        gap: 60px;
        position: relative;
        z-index: 2;
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #111827;
        color: white;
        border-radius: 100px;
        padding: 8px 20px;
        font-size: 14px;
        font-weight: 900;
        margin-bottom: 24px;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 4px 4px 0px rgba(0,0,0,0.3);
    }

    .hero-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(40px, 6vw, 72px);
        font-weight: 900;
        color: #111827;
        line-height: 1.1;
        margin-bottom: 24px;
        letter-spacing: -1px;
        text-shadow: 3px 3px 0px white;
    }

    .hero-title span {
        color: white;
        background: #16a34a;
        padding: 0 16px;
        border-radius: 16px;
        display: inline-block;
        transform: rotate(-2deg);
        box-shadow: 4px 4px 0px #111827;
    }

    .hero-desc {
        font-size: 18px;
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 40px;
        max-width: 500px;
    }

    .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }

    .btn-hero {
        font-family: 'Nunito', sans-serif;
        font-size: 18px;
        font-weight: 900;
        padding: 16px 36px;
        border-radius: 100px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        border: 3px solid #111827;
        box-shadow: 6px 6px 0px #111827;
    }

    .btn-hero-primary {
        background: #4ade80;
        color: #111827;
    }
    .btn-hero-primary:hover {
        background: #fef08a;
        transform: translate(2px, 2px);
        box-shadow: 4px 4px 0px #111827;
    }

    .btn-hero-outline {
        background: white;
        color: #111827;
    }
    .btn-hero-outline:hover {
        background: #e5e7eb;
        transform: translate(2px, 2px);
        box-shadow: 4px 4px 0px #111827;
    }

    /* Visuals */
    .hero-visual {
        position: relative;
        height: 400px;
    }

    .glass-card {
        position: absolute;
        background: white;
        border: 4px solid #111827;
        border-radius: 32px;
        box-shadow: 12px 12px 0px #111827;
        padding: 30px;
        text-align: center;
        animation: floatY 6s ease-in-out infinite;
    }

    .glass-main {
        top: 20px; left: 0; right: 0;
        z-index: 2;
        background: #fef08a;
    }

    .glass-float-1 {
        top: -30px; right: -30px;
        padding: 16px 24px;
        z-index: 3;
        animation-delay: 1s;
        display: flex; align-items: center; gap: 12px;
        font-weight: 900;
        color: #111827;
        background: #a7f3d0;
        border-radius: 100px;
        border: 3px solid #111827;
        box-shadow: 6px 6px 0px #111827;
    }

    .glass-float-2 {
        bottom: -20px; left: -20px;
        padding: 16px 24px;
        z-index: 3;
        animation-delay: 2.5s;
        display: flex; align-items: center; gap: 12px;
        font-weight: 900;
        color: white;
        background: #4f46e5;
        border-radius: 100px;
        border: 3px solid #111827;
        box-shadow: 6px 6px 0px #111827;
    }

    @keyframes floatY {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    /* ── BENTO GRID FEATURES ── */
    .bento-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 220px);
        gap: 24px;
        margin-top: 40px;
    }

    .bento-card {
        background: white;
        border-radius: 32px;
        padding: 36px;
        position: relative;
        overflow: hidden;
        border: 4px solid #111827;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        box-shadow: 8px 8px 0px #111827;
    }

    .bento-card:hover {
        transform: translate(-4px, -4px);
        box-shadow: 12px 12px 0px #fef08a;
        border-color: #111827;
    }

    .bento-card-large {
        grid-column: span 2;
        background: #10b981;
        color: white;
    }

    .bento-icon {
        position: absolute;
        top: 30px; right: 30px;
        font-size: 40px;
        opacity: 0.8;
        transition: all 0.3s;
    }
    
    .bento-card:hover .bento-icon {
        transform: scale(1.1) rotate(5deg);
        opacity: 1;
    }

    .bento-title {
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 8px;
    }
    
    .bento-card-large .bento-title {
        font-size: 32px;
        margin-bottom: 12px;
    }

    .bento-desc {
        font-size: 15px;
        opacity: 0.7;
        line-height: 1.6;
    }
    .bento-card-large .bento-desc {
        opacity: 0.9;
        font-size: 18px;
        max-width: 400px;
    }

    /* ── MATERI SECTION ── */
    .materi-preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .materi-preview-card {
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 3px solid #111827;
        box-shadow: 6px 6px 0px #e5e7eb;
        transition: all 0.3s;
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .materi-preview-card:hover {
        border-color: #111827;
        box-shadow: 8px 8px 0px #4ade80;
        transform: translate(-2px, -2px);
    }

    .materi-icon-box {
        width: 50px; height: 50px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    /* ── MODERN TIPS SECTION ── */
    .tips-container {
        display: flex;
        gap: 60px;
        align-items: center;
    }

    .tips-content { flex: 1; }
    
    .tips-cards {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .modern-tip-card {
        background: white;
        border: 3px solid #111827;
        border-radius: 24px;
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 6px 6px 0px #e5e7eb;
        transition: all 0.3s;
    }

    .modern-tip-card:hover {
        transform: translateX(10px) translateY(-2px);
        border-color: #111827;
        box-shadow: 8px 8px 0px #fef08a;
    }

    .tip-emoji-box {
        width: 48px; height: 48px;
        border-radius: 14px;
        background: #ecfdf5;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    /* ── BRUTAL CTA ── */
    .modern-cta {
        background: #c4b5fd;
        border: 4px solid #111827;
        box-shadow: 12px 12px 0px #111827;
        border-radius: 32px;
        padding: 80px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .modern-cta::before {
        content: '❓';
        position: absolute;
        font-size: 150px;
        top: -20px; left: -20px;
        opacity: 0.2;
        transform: rotate(-15deg);
    }
    
    .modern-cta::after {
        content: '💡';
        position: absolute;
        font-size: 150px;
        bottom: -20px; right: -20px;
        opacity: 0.2;
        transform: rotate(15deg);
    }

    .modern-cta-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: #111827;
        margin-bottom: 20px;
        position: relative; z-index: 2;
        text-shadow: 3px 3px 0px white;
    }

    @media (max-width: 900px) {
        .hero-inner { grid-template-columns: 1fr; text-align: center; }
        .hero-desc { margin: 0 auto 40px; }
        .hero-actions { justify-content: center; }
        .hero-visual { display: none; }
        .bento-grid { grid-template-columns: 1fr; grid-template-rows: auto; }
        .bento-card-large { grid-column: span 1; }
        .tips-container { flex-direction: column; }
    }
</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero">
    <div class="hero-inner">
        <div>
            <div class="hero-tag">🌟 GENERASI HIJAU</div>
            <h1 class="hero-title">
                Bumi Cuma Satu! Yuk Mulai <span>Peduli</span> Sekarang.
            </h1>
            <p class="hero-desc">
                Pelajari gaya hidup ramah lingkungan, cara memilah sampah dengan benar, dan jadilah bagian dari perubahan positif untuk masa depan.
            </p>
            <div class="hero-actions">
                <a href="{{ route('materi.index') }}" class="btn-hero btn-hero-primary">
                    Mulai Belajar 
                </a>
                <a href="{{ route('tentang') }}" class="btn-hero btn-hero-outline">
                    Tentang Program
                </a>
            </div>
        </div>

        <div class="hero-visual">
            <div class="glass-card glass-float-1">
                <span style="font-size:24px;">♻️</span> Prinsip 3R
            </div>
            
            <div class="glass-card glass-main">
                <div style="font-size: 80px; line-height:1; margin-bottom: 20px;">🌍</div>
                <h3 style="font-family:'Nunito'; font-size: 24px; font-weight:900; color:#111827; margin-bottom:8px;">Peduli Sampah</h3>
                <p style="font-size: 15px; color:#4b5563;">Satu langkah kecil hari ini, untuk bumi yang lebih bersih esok hari.</p>
                
                <div style="margin-top: 24px; display:flex; gap:10px; justify-content:center;">
                    <span style="background:white; color:#111827; padding:8px 16px; border-radius:100px; font-size:13px; font-weight:900; border:2px solid #111827;">Organik</span>
                    <span style="background:white; color:#111827; padding:8px 16px; border-radius:100px; font-size:13px; font-weight:900; border:2px solid #111827;">Anorganik</span>
                    <span style="background:#fee2e2; color:#b91c1c; padding:8px 16px; border-radius:100px; font-size:13px; font-weight:900; border:2px solid #111827;">B3</span>
                </div>
            </div>

            <div class="glass-card glass-float-2">
                <span style="font-size:24px;">⚡</span> Ayo Mulai!
            </div>
        </div>
    </div>
</section>

<!-- ── MATERI EDUKASI PREVIEW ──────────────────────────────────── -->
<section class="section" style="background:white; padding: 80px 0;">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:20px;">
            <div>
                <h2 style="font-family:'Nunito'; font-size: 32px; font-weight:900; color:#111827; margin-bottom:8px;">Topik Materi Edukasi</h2>
                <p style="font-size: 16px; color:#6b7280;">Pahami konsep pengelolaan sampah secara menyeluruh.</p>
            </div>
            <a href="{{ route('materi.index') }}" style="color:#059669; font-weight:700; text-decoration:none;">Lihat Semua Topik →</a>
        </div>

        <div class="materi-preview-grid">
            @php 
                $icons = ['📖', '🗂️', '♻️', '🔄', '🌿']; 
                $colors = ['#fef3c7', '#dbeafe', '#ede9fe', '#fce7f3', '#dcfce7']; 
            @endphp
            @foreach($materials as $index => $m)
            <a href="{{ route('materi.show', $m->slug) }}" class="materi-preview-card">
                <div class="materi-icon-box" style="background:{{ $colors[$index % count($colors)] }};">
                    {{ $icons[$index % count($icons)] }}
                </div>
                <div>
                    <h4 style="font-family:'Nunito'; font-size:18px; font-weight:800; color:#1f2937;">{{ $m->title }}</h4>
                    <div style="font-size:13px; color:#059669; font-weight:700; margin-top:4px;">Pelajari Sekarang</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ── BENTO GRID (FITUR WEBSITE) ──────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 100px 0;">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto 40px;">
            <h2 style="font-family:'Nunito'; font-size: 36px; font-weight:900; color:#111827; margin-bottom:16px;">Jelajahi Fitur EduSampah</h2>
            <p style="font-size: 16px; color:#6b7280;">Semua sumber daya yang kamu butuhkan untuk memahami pengelolaan sampah ada di sini.</p>
        </div>

        <div class="bento-grid">
            <div class="bento-card bento-card-large" style="text-decoration:none;" onclick="window.location='{{ route('materi.index') }}'; cursor:pointer;">
                <div class="bento-icon">📚</div>
                <h3 class="bento-title">Materi Edukasi</h3>
                <p class="bento-desc">Pelajari materi komprehensif mulai dari pengertian, pemilahan, hingga prinsip 3R.</p>
            </div>
            <div class="bento-card" style="text-decoration:none;" onclick="window.location='{{ route('evaluasi') }}'; cursor:pointer;">
                <div class="bento-icon">📝</div>
                <h3 class="bento-title">Formulir Evaluasi</h3>
                <p class="bento-desc" style="color:#6b7280;">Uji seberapa jauh pemahamanmu tentang materi yang telah dipelajari.</p>
            </div>
            <div class="bento-card" onclick="window.location='{{ route('tips') }}'; cursor:pointer;">
                <div class="bento-icon">💡</div>
                <h3 class="bento-title">Tips Pengelolaan</h3>
                <p class="bento-desc" style="color:#6b7280;">Panduan dan tips praktis pengelolaan sampah untuk anak muda.</p>
            </div>
            <div class="bento-card" onclick="window.location='{{ route('video') }}'; cursor:pointer;">
                <div class="bento-icon">🎥</div>
                <h3 class="bento-title">Video Edukasi</h3>
                <p class="bento-desc" style="color:#6b7280;">Tonton video menarik seputar panduan dan aksi nyata lingkungan.</p>
            </div>
            <div class="bento-card" style="background:#111827; color:white;" onclick="window.location='{{ route('galeri') }}'; cursor:pointer;">
                <div class="bento-icon">🖼️</div>
                <h3 class="bento-title" style="color:white;">Galeri Foto</h3>
                <p class="bento-desc" style="color:#9ca3af;">Kumpulan potret aksi nyata peduli lingkungan dari berbagai daerah.</p>
            </div>
        </div>
    </div>
</section>

<!-- ── TIPS SECTION ────────────────────────────────────────────── -->
<section class="section">
    <div class="container">
        <div class="tips-container">
            <div class="tips-content">
                <div style="display:inline-block; background:#ecfdf5; color:#059669; font-weight:800; font-size:13px; padding:6px 16px; border-radius:20px; margin-bottom:20px;">TIPS PENGELOLAAN</div>
                <h2 style="font-family:'Nunito'; font-size:40px; font-weight:900; color:#111827; line-height:1.2; margin-bottom:24px;">Gak Susah Buat<br>Mulai Peduli.</h2>
                <p style="font-size:18px; color:#4b5563; line-height:1.7; margin-bottom:32px;">Langkah-langkah kecil yang bisa kamu lakuin setiap hari buat nyelamatin lingkungan kita.</p>
                <a href="{{ route('tips') }}" class="btn-hero btn-hero-outline" style="border-radius:12px; padding: 12px 24px; font-size:14px;">Lihat Semua Tips</a>
            </div>
            
            <div class="tips-cards">
                @foreach([
                    ['Pisahkan Sampah Rumah', 'Siapkan tempat sampah berbeda untuk sampah organik dan sampah plastik/kertas.', '🗑️'],
                    ['Bawa Wadah Sendiri', 'Kurangi sampah plastik dengan membawa botol minum dan tas belanja sendiri.', '🛍️'],
                    ['Terapkan Prinsip Reuse', 'Gunakan kembali barang-barang bekas yang masih layak pakai.', '♻️'],
                    ['Kompos Organik', 'Olah sisa makanan dan dedaunan menjadi pupuk kompos untuk tanaman.', '🌱']
                ] as $tip)
                <div class="modern-tip-card">
                    <div class="tip-emoji-box">{{ $tip[2] }}</div>
                    <div>
                        <h4 style="font-family:'Nunito'; font-size:18px; font-weight:800; color:#111827; margin-bottom:4px;">{{ $tip[0] }}</h4>
                        <p style="font-size:14px; color:#6b7280; line-height:1.5;">{{ $tip[1] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ── BRUTAL CTA ─────────────────────────────────────────────── -->
<section class="section" style="padding-bottom:100px;">
    <div class="container">
        <div class="modern-cta">
            <h2 class="modern-cta-title">Berani Uji Nyali Lingkunganmu? 🤨</h2>
            <p style="font-size:20px; color:#111827; font-weight:700; max-width:600px; margin: 0 auto 40px; position:relative; z-index:2; line-height: 1.6;">Coba tes seberapa paham kamu soal persampahan. Tenang, ini bukan ujian sekolah, dan gak ngaruh ke nilai kok!</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                <a href="{{ route('evaluasi') }}" class="btn-hero" style="background:#fef08a; color:#111827; font-size:18px;">📝 Mulai Tes Sekarang</a>
                <a href="{{ route('kontak') }}" class="btn-hero" style="background:white; color:#111827; font-size:18px;">Tanya Mimin Dulu</a>
            </div>
        </div>
    </div>
</section>

@endsection
