@extends('layouts.public')

@section('title', 'Tentang Program')
@section('meta-desc', 'Kenali lebih dekat program EduSampah — misi, visi, dan tujuan edukasi pengelolaan sampah.')

@push('styles')
<style>
    /* ── HERO TENTANG ── */
    .hero-tentang {
        background: linear-gradient(135deg, #fbcfe8 0%, #ec4899 100%);
        padding: 120px 0 80px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 3px solid #111827;
    }

    .hero-tentang-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(44px, 6vw, 72px);
        font-weight: 900;
        color: white;
        line-height: 1.1;
        letter-spacing: -1px;
        margin-bottom: 20px;
        text-shadow: 3px 3px 0px #111827;
    }

    .hero-tentang-title span {
        background: #fef08a;
        color: #111827;
        padding: 0 16px;
        border-radius: 20px;
        display: inline-block;
        transform: rotate(-3deg);
        border: 3px solid #111827;
        box-shadow: 4px 4px 0px #111827;
        text-shadow: none;
    }

    .hero-tentang-desc {
        font-size: 20px;
        color: #fdf2f8;
        max-width: 700px;
        margin: 0 auto 40px;
        line-height: 1.6;
        font-weight: 700;
        text-shadow: 1px 1px 0px rgba(0,0,0,0.2);
    }

    /* ── VISI & MISI BENTO GRID ── */
    .vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-bottom: 80px;
    }

    .vm-card {
        background: white;
        border-radius: 32px;
        padding: 40px;
        position: relative;
        overflow: hidden;
        border: 4px solid #111827;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 12px 12px 0px #111827;
    }

    .vm-card:hover {
        transform: translate(-4px, -4px);
        box-shadow: 16px 16px 0px #f472b6;
    }

    .vm-card.dark {
        background: #111827;
        color: white;
    }

    .vm-icon {
        font-size: 48px;
        margin-bottom: 24px;
        display: inline-block;
    }

    .vm-title {
        font-family: 'Nunito', sans-serif;
        font-size: 28px;
        font-weight: 900;
        margin-bottom: 16px;
    }

    .vm-card.dark .vm-title {
        color: white;
    }

    .vm-desc {
        font-size: 16px;
        line-height: 1.7;
        color: #4b5563;
    }

    .vm-card.dark .vm-desc, .vm-card.dark li {
        color: #9ca3af;
    }

    .vm-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .vm-list li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 12px;
        font-size: 16px;
        line-height: 1.5;
        color: #4b5563;
    }

    .vm-list li::before {
        content: '✨';
        position: absolute;
        left: 0;
        top: 0;
        font-size: 14px;
    }

    /* ── TUJUAN SECTION ── */
    .tujuan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .tujuan-card {
        background: white;
        border-radius: 24px;
        padding: 30px;
        border: 3px solid #111827;
        transition: all 0.3s;
        box-shadow: 6px 6px 0px #e5e7eb;
    }

    .tujuan-card:hover {
        border-color: #111827;
        transform: translate(-4px, -4px);
        box-shadow: 10px 10px 0px #fbcfe8;
    }

    .tujuan-icon-box {
        width: 56px; height: 56px;
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-size: 28px;
        margin-bottom: 20px;
    }

    /* ── NEUMORPHIC CTA ── */
    .modern-cta {
        background: #f472b6;
        border-radius: 40px;
        border: 4px solid #111827;
        box-shadow: 12px 12px 0px #111827;
        padding: 80px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-top: 80px;
    }

    .modern-cta::before {
        content: '';
        position: absolute;
        width: 300px; height: 300px;
        background: #10b981;
        border-radius: 50%;
        filter: blur(80px);
        bottom: -150px; right: -50px;
        opacity: 0.8;
    }

    @media (max-width: 768px) {
        .vm-grid { grid-template-columns: 1fr; }
        .hero-tentang { padding: 100px 0 60px; }
    }
</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-tentang">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#fff; color:#db2777; font-weight:900; font-size:15px; padding:8px 24px; border-radius:100px; margin-bottom:24px; border:3px solid #111827; box-shadow:4px 4px 0px #111827;">TENTANG KAMI</div>
        <h1 class="hero-tentang-title">
            Program Edukasi Sampah<br>Untuk <span>Desa Pakuhaji Bersih</span>
        </h1>
        <p class="hero-tentang-desc">
            EduSampah adalah platform edukasi digital generasi muda yang berfokus pada peningkatan kesadaran tentang pentingnya pengelolaan sampah secara bertanggung jawab.
        </p>
    </div>
</section>

<!-- ── VISI & MISI ──────────────────────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 80px 0;">
    <div class="container">
        <div class="vm-grid">
            <div class="vm-card dark">
                <div class="vm-icon"></div>
                <h2 class="vm-title">Visi Kami</h2>
                <p class="vm-desc" style="font-size: 18px;">
                    Mewujudkan masyarakat Desa Pakuhaji yang sadar, peduli, dan mampu mengelola sampah secara mandiri demi terciptanya lingkungan yang bersih, sehat, dan masa depan yang berkelanjutan.
                </p>
            </div>
            
            <div class="vm-card">
                <div class="vm-icon"></div>
                <h2 class="vm-title">Misi Kami</h2>
                <ul class="vm-list">
                    <li>Menyediakan edukasi sampah yang mudah diakses, interaktif, dan dipahami oleh anak muda.</li>
                    <li>Mendorong penerapan gaya hidup zero-waste dan prinsip 3R dalam kehidupan sehari-hari.</li>
                    <li>Membangun kesadaran lingkungan yang kritis sejak dini di bangku sekolah.</li>
                    <li>Memfasilitasi evaluasi pemahaman pengelolaan sampah yang asik dan tidak membosankan.</li>
                </ul>
            </div>
        </div>

        <!-- ── TUJUAN ─────────────────────────────────────────────── -->
        <div style="text-align: center; max-width: 600px; margin: 0 auto 40px;">
            <h2 style="font-family:'Nunito'; font-size: 36px; font-weight:900; color:#111827; margin-bottom:16px;">Apa yang Ingin Kami Capai?</h2>
            <p style="font-size: 16px; color:#6b7280;">Dampak nyata yang kami tuju melalui platform EduSampah.</p>
        </div>

        <div class="tujuan-grid">
            @foreach([
                ['🧠', 'Meningkatkan Pengetahuan', 'Memberikan pemahaman mendalam tentang jenis, dampak, dan cara pengelolaan sampah yang tepat.', '#fef3c7'],
                ['💪', 'Mengubah Perilaku', 'Mendorong perubahan kebiasaan nyata dalam pemilahan dan pengurangan sampah di kehidupan sehari-hari.', '#dbeafe'],
                ['🌍', 'Menjaga Lingkungan', 'Berkontribusi pada pengurangan volume sampah dan pencemaran lingkungan secara signifikan.', '#ede9fe'],
                ['👨‍👩‍👧‍👦', 'Melibatkan Komunitas', 'Membangun gerakan bersama dari tingkat individu, keluarga, pelajar, hingga masyarakat luas.', '#fce7f3'],
                ['📊', 'Evaluasi Berkala', 'Memantau pemahaman masyarakat melalui evaluasi interaktif dan memberikan umpan balik.', '#dcfce7'],
                ['🔄', 'Mendukung 3R', 'Mempromosikan dan menerapkan prinsip Reduce, Reuse, Recycle dalam kehidupan sehari-hari.', '#e0e7ff'],
            ] as $t)
            <div class="tujuan-card">
                <div class="tujuan-icon-box" style="background:{{ $t[3] }};">{{ $t[0] }}</div>
                <h4 style="font-family:'Nunito'; font-size:20px; font-weight:800; color:#111827; margin-bottom:10px;">{{ $t[1] }}</h4>
                <p style="font-size:15px; color:#6b7280; line-height:1.6;">{{ $t[2] }}</p>
            </div>
            @endforeach
        </div>

        <!-- ── CTA ────────────────────────────────────────────────── -->
        <div class="modern-cta">
            <h2 style="font-family:'Nunito'; font-size:clamp(36px, 4vw, 48px); font-weight:900; color:#111827; margin-bottom:20px; position:relative; z-index:2;">Ikut Ambil Bagian Sekarang!</h2>
            <p style="font-size:18px; color:#111827; font-weight:700; max-width:600px; margin: 0 auto 40px; position:relative; z-index:2;">Jelajahi seluruh sumber daya yang tersedia di platform kami dan jadilah agen perubahan bagi lingkunganmu.</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                <a href="{{ route('materi.index') }}" class="btn-hero" style="background:#111827; color:white; padding:16px 32px; border-radius:100px; font-weight:900; font-size:18px; text-decoration:none; display:inline-block; border:3px solid #111827; box-shadow:6px 6px 0px #fef08a; transition:all 0.2s;" onmouseover="this.style.transform='translate(2px,2px)'; this.style.boxShadow='4px 4px 0px #fef08a';" onmouseout="this.style.transform='none'; this.style.boxShadow='6px 6px 0px #fef08a';">📚 Mulai Belajar</a>
                <a href="{{ route('evaluasi') }}" class="btn-hero" style="background:white; color:#111827; border:3px solid #111827; box-shadow:6px 6px 0px #111827; padding:16px 32px; border-radius:100px; font-weight:900; font-size:18px; text-decoration:none; display:inline-block; transition:all 0.2s;" onmouseover="this.style.transform='translate(2px,2px)'; this.style.boxShadow='4px 4px 0px #111827';" onmouseout="this.style.transform='none'; this.style.boxShadow='6px 6px 0px #111827';">📝 Cek Skill</a>
            </div>
        </div>

    </div>
</section>

@endsection
