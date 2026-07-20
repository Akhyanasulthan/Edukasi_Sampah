<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EduSampah') — Edukasi Pengelolaan Sampah</title>
    <meta name="description" content="@yield('meta-desc', 'Website edukasi pengelolaan sampah untuk lingkungan yang bersih dan sehat.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ======================================================
           DESIGN SYSTEM — EduSampah (Hijau Muda & Putih)
        ====================================================== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green-50:   #f0fdf4;
            --green-100:  #dcfce7;
            --green-200:  #bbf7d0;
            --green-300:  #86efac;
            --green-400:  #4ade80;
            --green-500:  #22c55e;
            --green-600:  #16a34a;
            --green-700:  #15803d;
            --green-800:  #166534;
            --green-900:  #14532d;

            --white:      #ffffff;
            --gray-50:    #f9fafb;
            --gray-100:   #f3f4f6;
            --gray-200:   #e5e7eb;
            --gray-400:   #9ca3af;
            --gray-600:   #4b5563;
            --gray-700:   #374151;
            --gray-800:   #1f2937;
            --gray-900:   #111827;

            --text-dark:  #1a3c1a;
            --text-body:  #374151;
            --text-muted: #6b7280;

            --shadow-sm:  0 1px 3px rgba(0,0,0,0.08);
            --shadow-md:  0 4px 16px rgba(0,0,0,0.08);
            --shadow-lg:  0 10px 40px rgba(0,0,0,0.1);
            --shadow-green: 0 4px 20px rgba(34,197,94,0.25);

            --radius-sm:  8px;
            --radius:     12px;
            --radius-lg:  18px;
            --radius-xl:  24px;

            --navbar-h:   70px;
            --transition: 0.22s cubic-bezier(0.4,0,0.2,1);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--white);
            color: var(--text-body);
            line-height: 1.6;
        }

        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        /* ── NAVBAR ─────────────────────────────────────────── */
        .navbar {
            position: fixed;
            top: 20px; 
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 40px);
            max-width: 1200px;
            height: 76px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            border: 3px solid #111827;
            border-radius: 100px;
            z-index: 200;
            box-shadow: 6px 6px 0px #111827;
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        }

        .navbar.scrolled {
            top: 10px;
            box-shadow: 4px 4px 0px #111827;
            background: rgba(255,255,255,0.98);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            height: 100%;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-brand-icon {
            width: 48px; height: 48px;
            border-radius: 11px;
            background: #ffffff;
            display: flex; align-items: center; justify-content: center;
            border: 2px solid #111827;
            box-shadow: 3px 3px 0px #111827;
            flex-shrink: 0;
            transition: all 0.2s;
            overflow: hidden;
        }
        .nav-brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .nav-brand:hover .nav-brand-icon {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0px #4ade80;
        }

        .nav-brand-text {
            font-family: 'Nunito', sans-serif;
            font-size: 20px;
            font-weight: 900;
            color: var(--green-700);
            letter-spacing: -0.3px;
        }

        .nav-brand-sub {
            font-size: 10px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }

        .nav-item { position: relative; }

        .nav-link-item {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 8px 18px;
            border-radius: 100px;
            font-size: 15px;
            font-weight: 800;
            color: #111827;
            transition: all var(--transition);
            cursor: pointer;
            white-space: nowrap;
            border: 2px solid transparent;
        }

        .nav-link-item:hover,
        .nav-link-item.active {
            background: #fef08a;
            border-color: #111827;
            color: #111827;
            box-shadow: 3px 3px 0px #111827;
            transform: translateY(-2px);
        }

        /* Dropdown */
        .nav-dropdown {
            position: absolute;
            top: calc(100% + 12px);
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: white;
            border: 3px solid #111827;
            border-radius: 20px;
            box-shadow: 6px 6px 0px #111827;
            min-width: 240px;
            padding: 12px;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-item:hover .nav-dropdown,
        .nav-item:focus-within .nav-dropdown {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(-50%) translateY(0);
        }

        .dropdown-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 800;
            color: #111827;
            transition: all 0.2s;
            border: 2px solid transparent;
            margin-bottom: 4px;
        }

        .dropdown-link:hover {
            background: #a7f3d0;
            border-color: #111827;
            transform: translateX(4px);
            box-shadow: 3px 3px 0px #111827;
        }

        .dropdown-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            border: 2px solid #111827;
        }

        .nav-cta {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            background: #a7f3d0;
            color: #111827;
            border: 3px solid #111827;
            border-radius: 100px;
            font-size: 15px;
            font-weight: 900;
            transition: all var(--transition);
            box-shadow: 4px 4px 0px #111827;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-cta:hover {
            background: #fef08a;
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0px #111827;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 8px;
            border-radius: var(--radius-sm);
            background: var(--green-50);
            border: 1px solid var(--green-200);
        }

        .hamburger span {
            display: block;
            width: 22px; height: 2px;
            background: var(--green-700);
            border-radius: 2px;
            transition: all var(--transition);
        }

        /* ── MAIN CONTENT ───────────────────────────────────── */
        .main-wrap {
            padding-top: 130px;
            min-height: 100vh;
        }

        /* ── FOOTER ─────────────────────────────────────────── */
        .footer {
            background: #111827;
            color: white;
            padding: 80px 0 0;
            position: relative;
            border-top: 6px solid #111827;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: -6px; left: 0; right: 0; height: 6px;
            background: repeating-linear-gradient(45deg, #fef08a, #fef08a 10px, #111827 10px, #111827 20px);
            z-index: 10;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 48px;
        }

        .footer-brand-icon {
            width: 60px; height: 60px;
            border-radius: 14px;
            background: #ffffff;
            border: 2px solid white;
            box-shadow: 4px 4px 0px #a7f3d0;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 24px;
            overflow: hidden;
        }
        .footer-brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .footer-brand-name {
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
            font-weight: 900;
            color: var(--white);
            margin-bottom: 12px;
            text-shadow: 2px 2px 0px #000;
        }

        .footer-desc {
            font-size: 15px;
            font-weight: 600;
            line-height: 1.7;
            color: #e5e7eb;
            margin-bottom: 24px;
        }

        .footer-socials {
            display: flex;
            gap: 12px;
        }

        .social-btn {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: white;
            border: 2px solid #111827;
            box-shadow: 4px 4px 0px #fef08a;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            transition: all 0.2s;
            text-decoration: none;
        }

        .social-btn:hover {
            background: #a7f3d0;
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px #f472b6;
        }

        .footer-heading {
            font-size: 15px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #fef08a;
            margin-bottom: 20px;
            text-shadow: 2px 2px 0px #000;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-links a {
            font-size: 15px;
            font-weight: 700;
            color: white;
            transition: all 0.2s;
            display: inline-block;
        }

        .footer-links a:hover {
            color: #a7f3d0;
            transform: translateX(6px);
            text-shadow: 2px 2px 0px #000;
        }

        .footer-bottom {
            border-top: 2px dashed rgba(255,255,255,0.2);
            padding: 24px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;
            font-weight: 600;
            color: #9ca3af;
        }

        /* ── MOBILE NAV ─────────────────────────────────────── */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 100px;
            left: 20px; right: 20px;
            background: var(--white);
            border: 3px solid #111827;
            border-radius: 24px;
            box-shadow: 8px 8px 0px #111827;
            z-index: 190;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
            padding: 20px;
        }

        .mobile-nav.open { display: block; }

        .mobile-nav-link {
            display: block;
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 800;
            color: #111827;
            transition: all var(--transition);
            margin-bottom: 6px;
            border: 2px solid transparent;
        }

        .mobile-nav-link:hover {
            background: #fef08a;
            border-color: #111827;
            box-shadow: 3px 3px 0px #111827;
            transform: translateY(-2px);
        }

        .mobile-section-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-muted);
            padding: 10px 14px 4px;
        }

        /* ── UTILITIES ──────────────────────────────────────── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .section {
            padding: 80px 0;
        }

        .section-sm {
            padding: 50px 0;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--green-100);
            color: var(--green-700);
            border-radius: 20px;
            padding: 5px 14px;
            font-size: 12.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Nunito', sans-serif;
            font-size: clamp(26px, 4vw, 38px);
            font-weight: 900;
            color: var(--text-dark);
            line-height: 1.25;
            margin-bottom: 14px;
        }

        .section-desc {
            font-size: 16px;
            color: var(--text-muted);
            max-width: 600px;
            line-height: 1.7;
        }

        .section-header { margin-bottom: 48px; }
        .section-header.center { text-align: center; }
        .section-header.center .section-desc { margin: 0 auto; }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all var(--transition);
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--green-500), var(--green-600));
            color: var(--white);
            box-shadow: var(--shadow-green);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--green-600), var(--green-700));
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(34,197,94,0.35);
        }

        .btn-outline {
            background: transparent;
            color: var(--green-700);
            border: 2px solid var(--green-400);
        }

        .btn-outline:hover {
            background: var(--green-50);
            border-color: var(--green-600);
        }

        .btn-white {
            background: var(--white);
            color: var(--green-700);
        }

        .btn-white:hover {
            background: var(--green-50);
        }

        .card {
            background: var(--white);
            border: 1px solid var(--green-100);
            border-radius: var(--radius-lg);
            padding: 28px;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
            border-color: var(--green-300);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-green  { background: var(--green-100); color: var(--green-700); }
        .badge-blue   { background: #dbeafe; color: #1d4ed8; }
        .badge-red    { background: #fee2e2; color: #dc2626; }
        .badge-amber  { background: #fef3c7; color: #d97706; }
        .badge-purple { background: #ede9fe; color: #7c3aed; }

        /* ── PAGE HERO INNER ────────────────────────────────── */
        .page-hero {
            background: linear-gradient(135deg, var(--green-50) 0%, var(--white) 100%);
            border-bottom: 1px solid var(--green-100);
            padding: 48px 0 40px;
        }

        .page-hero-title {
            font-family: 'Nunito', sans-serif;
            font-size: clamp(24px, 4vw, 36px);
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .breadcrumb a { color: var(--green-600); }
        .breadcrumb a:hover { text-decoration: underline; }

        @media (max-width: 900px) {
            .nav-menu, .nav-right { display: none; }
            .hamburger { display: flex; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
        }

        @media (max-width: 600px) {
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; gap: 8px; text-align: center; }
            .section { padding: 56px 0; }
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <!-- Brand -->
            <a href="{{ route('beranda') }}" class="nav-brand">
                <div class="nav-brand-icon">
                    <img src="{{ asset('images/logo_edusampah.png') }}" alt="Logo EduSampah">
                </div>
                <div>
                    <div class="nav-brand-text">EduSampah</div>
                    <div class="nav-brand-sub">Edukasi Lingkungan</div>
                </div>
            </a>

            <!-- Desktop Menu -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('beranda') }}" class="nav-link-item {{ request()->routeIs('beranda') ? 'active' : '' }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tentang') }}" class="nav-link-item {{ request()->routeIs('tentang') ? 'active' : '' }}">
                        Tentang
                    </a>
                </li>
                <li class="nav-item">
                    <span class="nav-link-item {{ request()->routeIs('materi.*') ? 'active' : '' }}">
                        Materi Edukasi ▾
                    </span>
                    <div class="nav-dropdown">
                        <a href="{{ route('materi.index') }}" class="dropdown-link">
                            <div class="dropdown-icon" style="background:#dcfce7;">📚</div>
                            <div>
                                <div style="font-weight:600;font-size:13px;">Semua Materi</div>
                                <div style="font-size:11px;color:#9ca3af;">Lihat semua konten edukasi</div>
                            </div>
                        </a>
                        @foreach($globalMaterials as $m)
                        <a href="{{ route('materi.show', $m->slug) }}" class="dropdown-link">
                            <div class="dropdown-icon" style="background:#fef3c7;">📖</div>
                            <div>
                                <div style="font-weight:600;font-size:13px;">{{ $m->title }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('galeri') }}" class="nav-link-item {{ request()->routeIs('galeri') ? 'active' : '' }}">
                        Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('video') }}" class="nav-link-item {{ request()->routeIs('video') ? 'active' : '' }}">
                        Video
                    </a>
                </li>
                @if($hasTips ?? false)
                <li class="nav-item">
                    <a href="{{ route('tips') }}" class="nav-link-item {{ request()->routeIs('tips') ? 'active' : '' }}">
                        Tips
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('kontak') }}" class="nav-link-item {{ request()->routeIs('kontak') ? 'active' : '' }}">
                        Kontak
                    </a>
                </li>
            </ul>

            <!-- Right Actions -->
            <div class="nav-right" style="display:flex;align-items:center;gap:8px;">
                <a href="{{ route('evaluasi') }}" class="nav-cta">
                    📝 Cek Skill
                </a>
            </div>

            <!-- Hamburger -->
            <button class="hamburger" id="hamburger" onclick="toggleMobileNav()" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- MOBILE NAV -->
    <div class="mobile-nav" id="mobileNav">
        <a href="{{ route('beranda') }}" class="mobile-nav-link">🏠 Beranda</a>
        <a href="{{ route('tentang') }}" class="mobile-nav-link">ℹ️ Tentang Program</a>
        <div class="mobile-section-label">Materi Edukasi</div>
        <a href="{{ route('materi.index') }}" class="mobile-nav-link">📚 Semua Materi</a>
        @foreach($globalMaterials as $m)
        <a href="{{ route('materi.show', $m->slug) }}" class="mobile-nav-link">📖 {{ $m->title }}</a>
        @endforeach
        <div class="mobile-section-label">Lainnya</div>
        <a href="{{ route('galeri') }}" class="mobile-nav-link">🖼️ Galeri Foto</a>
        <a href="{{ route('video') }}" class="mobile-nav-link">🎬 Video Edukasi</a>
        @if($hasTips ?? false)
        <a href="{{ route('tips') }}" class="mobile-nav-link">💡 Tips Pengelolaan</a>
        @endif
        <a href="{{ route('evaluasi') }}" class="mobile-nav-link" style="color:var(--green-700);font-weight:700;">✏️ Formulir Evaluasi</a>
        <a href="{{ route('kontak') }}" class="mobile-nav-link">📞 Kontak</a>
    </div>

    <!-- MAIN -->
    <main class="main-wrap">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div>
                    <div class="footer-brand-icon">
                        <img src="{{ asset('images/logo_edusampah.png') }}" alt="Logo EduSampah">
                    </div>
                    <div class="footer-brand-name">EduSampah</div>
                    <p class="footer-desc">
                        Platform edukasi pengelolaan sampah untuk mewujudkan lingkungan yang bersih, sehat, dan berkelanjutan bagi generasi mendatang.
                    </p>
                    <div class="footer-socials">
                        <a href="#" class="social-btn">📘</a>
                        <a href="#" class="social-btn">📸</a>
                        <a href="#" class="social-btn">🐦</a>
                        <a href="#" class="social-btn">▶️</a>
                    </div>
                </div>
                <div>
                    <div class="footer-heading">Navigasi</div>
                    <ul class="footer-links">
                        <li><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li><a href="{{ route('tentang') }}">Tentang Program</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri Foto</a></li>
                        <li><a href="{{ route('video') }}">Video Edukasi</a></li>
                        <li><a href="{{ route('kontak') }}">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <div class="footer-heading">Materi</div>
                    <ul class="footer-links">
                        <li><a href="{{ route('materi.index') }}">Semua Materi</a></li>
                        @foreach($globalMaterials as $m)
                        <li><a href="{{ route('materi.show', $m->slug) }}">{{ $m->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <div class="footer-heading">Lainnya</div>
                    <ul class="footer-links">
                        @if($hasTips ?? false)
                        <li><a href="{{ route('tips') }}">Tips Pengelolaan</a></li>
                        @endif
                        <li><a href="{{ route('evaluasi') }}">Formulir Evaluasi</a></li>
                        <li><a href="{{ route('kontak') }}">Hubungi Kami</a></li>
                        <li><a href="/admin/login">Admin Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>© {{ date('Y') }} EduSampah — Edukasi Pengelolaan Sampah. Hak cipta dilindungi.</span>
                <span>🌱 Bersama menjaga bumi lebih bersih</span>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 20);
        });

        // Mobile nav toggle
        function toggleMobileNav() {
            document.getElementById('mobileNav').classList.toggle('open');
        }

        // Close mobile nav on link click
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobileNav').classList.remove('open');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
