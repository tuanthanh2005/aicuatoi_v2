<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K1EFHMNDGK"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-K1EFHMNDGK');
    </script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="JXAkwIu8Sp6m3NoBdys1fP9YRH7eeUiiVQ49OEGUSqw" />
    <title>@yield('title', 'Ai Của Tôi | AI | Blog | Khám Phá')</title>
    <meta name="description" content="@yield('meta_description', 'Ai Của Tôi - Nền tảng khám phá AI, Blog công nghệ và sản phẩm số hàng đầu Việt Nam. Trải nghiệm & Mua sắm an toàn, chất lượng.')">
    <meta name="keywords" content="@yield('meta_keywords', 'ai cua toi, aicuatoi, aicuatoi.com, ai cua toi ai, blog cong nghe, mua sam truc tuyen, san pham so, kham pha ai')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:title" content="@yield('title', 'Ai Của Tôi | AI | Blog | Khám Phá')">
    <meta property="og:description" content="@yield('meta_description', 'Ai Của Tôi - Nền tảng khám phá AI, Blog công nghệ và sản phẩm số hàng đầu Việt Nam. Trải nghiệm & Mua sắm an toàn, chất lượng.')">
    <meta property="og:image" content="@yield('og_image', asset('images/aicuatoi-seo.png'))">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="@yield('canonical', url()->current())">
    <meta property="twitter:title" content="@yield('title', 'Ai Của Tôi | AI | Blog | Khám Phá')">
    <meta property="twitter:description" content="@yield('meta_description', 'Ai Của Tôi - Nền tảng khám phá AI, Blog công nghệ và sản phẩm số hàng đầu Việt Nam. Trải nghiệm & Mua sắm an toàn, chất lượng.')">
    <meta property="twitter:image" content="@yield('og_image', asset('images/aicuatoi-seo.png'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/aicuatoi.png') }}">
    @stack('head')
    
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- TechFeed Theme -->
    <link rel="stylesheet" href="{{ asset('css/techfeed.css') }}?v={{ filemtime(\App\Helpers\PathHelper::publicRootPath('css/techfeed.css')) }}">

    <!-- Page-specific CSS -->
    @stack('styles')

    <style>
        /* TechFeed global toast overrides */
        .small-toast { font-size: 13px !important; }
        .small-toast-title { font-size: 15px !important; margin-bottom: 5px !important; }
        .small-toast-text { font-size: 13px !important; }
        .swal2-toast .swal2-icon { width: 2em !important; height: 2em !important; margin: 0.5em 0.8em 0.5em 0 !important; }
        .swal2-toast { flex-direction: row !important; align-items: center !important; }

        /* Fix Mobile Zoom & Overflow */
        html, body {
            max-width: 100%;
            overflow-x: hidden;
            position: relative;
        }
        input, select, textarea {
            font-size: 16px !important; /* Prevents auto-zoom on iOS */
        }

        /* 2:8 Global Layout Grid */
        @media (min-width: 992px) {
            .app-layout {
                display: flex;
                min-height: 100vh;
                width: 100%;
            }
            .app-sidebar-col {
                width: 20%;
                min-width: 260px;
                max-width: 320px;
                flex-shrink: 0;
                background-color: #ffffff;
                border-right: 1px solid #e2e8f0;
                padding: 24px;
                z-index: 1000;
                transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s ease, min-width 0.3s cubic-bezier(0.4, 0, 0.2, 1), max-width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .app-main-col {
                width: 80%;
                flex-grow: 1;
                min-width: 0;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                background-color: #f8fafc;
                transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Collapsed Sidebar CSS */
            .sidebar-collapsed .app-sidebar-col {
                width: 76px !important;
                min-width: 76px !important;
                max-width: 76px !important;
                padding: 24px 12px !important;
            }
            .sidebar-collapsed .app-main-col {
                width: calc(100% - 76px) !important;
            }
            .sidebar-collapsed .sidebar-logo-link,
            .sidebar-collapsed .sidebar-search,
            .sidebar-collapsed .sidebar-nav-menu span,
            .sidebar-collapsed .sidebar-actions-row span,
            .sidebar-collapsed .sidebar-actions-row .dropdown,
            .sidebar-collapsed .sidebar-user-section .min-w-0,
            .sidebar-collapsed .sidebar-user-section .dropdown,
            .sidebar-collapsed .sidebar-widget {
                display: none !important;
            }
            .sidebar-collapsed .sidebar-brand {
                justify-content: center !important;
            }
            .sidebar-collapsed .sidebar-nav-menu .nav-link {
                justify-content: center;
                padding: 10px !important;
                gap: 0 !important;
            }
            .sidebar-collapsed .sidebar-actions-row {
                justify-content: center !important;
            }
            .sidebar-collapsed .sidebar-actions-row a {
                padding: 10px !important;
                justify-content: center !important;
                flex-grow: 0 !important;
                width: 42px !important;
                height: 42px !important;
                border-radius: 50% !important;
            }
            .sidebar-collapsed .sidebar-user-section {
                display: flex;
                justify-content: center;
            }
            .sidebar-collapsed .sidebar-user-section > div {
                padding: 0 !important;
                border: none !important;
                box-shadow: none !important;
                background: transparent !important;
            }
            .app-content-body {
                flex-grow: 1;
                padding: 0;
            }
            
            /* Hide top horizontal navbar on desktop */
            #mainNavbar {
                display: none !important;
            }
            
            /* Simplify page-level grids to 100% width on desktop since the sidebar is now global */
            .homepage-grid {
                grid-template-columns: 1fr !important;
                grid-template-areas: "main" !important;
                max-width: 100% !important;
                padding: 0 24px !important;
                margin: 20px auto 40px !important;
            }
            .homepage-grid > .homepage-sidebar {
                display: none !important;
            }
            
            /* Overrides to make page containers margin-top clean on desktop */
            .emerald-wrapper .container,
            .tech-wrapper .container {
                margin-top: 20px !important;
            }

            /* Seamless and continuous sidebar overrides */
            .app-sidebar-col .homepage-sidebar {
                background: transparent !important;
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .app-sidebar-col .sidebar-widget {
                background: transparent !important;
                border: none !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                padding: 0 0 24px 0 !important;
                margin-bottom: 24px !important;
                border-bottom: 1px solid #e2e8f0 !important;
            }
            .app-sidebar-col .sidebar-widget:last-child {
                border-bottom: none !important;
                padding-bottom: 0 !important;
                margin-bottom: 0 !important;
            }
        }
        
        @media (max-width: 991.98px) {
            .app-layout {
                display: block;
            }
            .app-sidebar-col {
                display: none !important;
            }
            .app-main-col {
                width: 100%;
            }
            .homepage-sidebar {
                display: none !important;
            }
        }
        
        /* Navigation styles in the sidebar */
        .sidebar-nav-menu .nav-link {
            color: #475569 !important;
            font-size: 14.5px;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
        }
        .sidebar-nav-menu .nav-link:hover {
            background-color: #f1f5f9;
            color: var(--brand) !important;
        }
        .sidebar-nav-menu .nav-link.active {
            background-color: rgba(79, 70, 229, 0.08) !important;
            color: var(--brand) !important;
        }
        .sidebar-nav-menu .nav-link i {
            color: #64748b;
            transition: color 0.2s;
        }
        .sidebar-nav-menu .nav-link:hover i,
        .sidebar-nav-menu .nav-link.active i {
            color: var(--brand);
        }

        /* SIDEBAR WIDGETS */
        .sidebar-widget {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.03), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-widget:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            border-color: #cbd5e1;
        }
        .widget-title {
            font-size: 0.92rem;
            font-weight: 800;
            color: #1e293b;
        }

        /* PULSING STATUS */
        .status-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 14px;
            border-radius: 12px;
            margin-bottom: 16px;
        }
        .status-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            color: #0d9488;
        }
        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #0d9488;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.7);
            animation: pulse-dot 1.6s infinite;
        }
        @keyframes pulse-dot {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(13, 148, 136, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 148, 136, 0); }
        }

        /* CONTACT CARDS */
        .contact-card-sidebar {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 12px;
            text-decoration: none !important;
            color: inherit !important;
            transition: all 0.2s;
            margin-bottom: 8px;
        }
        .contact-card-sidebar:last-child {
            margin-bottom: 0;
        }
        .contact-card-sidebar:hover {
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
            border-color: #cbd5e1;
            transform: translateX(4px);
        }
        .contact-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        .contact-info {
            flex: 1;
            min-width: 0;
        }
        .contact-name {
            font-size: 0.8rem;
            font-weight: 700;
            color: #1e293b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .contact-desc {
            font-size: 0.7rem;
            color: #64748b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .contact-arrow {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        /* LIVE ACTIVITY FEED */
        .live-purchases-container {
            height: 240px;
            overflow: hidden;
            position: relative;
        }
        .live-activity-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
        }
        .live-activity-item {
            display: flex;
            gap: 12px;
            padding: 10px 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.78rem;
        }
        .activity-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0ea5e9 0%, #0d9488 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.8rem;
            flex-shrink: 0;
        }
        .activity-details {
            flex: 1;
            min-width: 0;
        }
        .activity-user {
            color: #334155;
            margin-bottom: 2px;
            font-size: 0.76rem;
        }
        .activity-action {
            color: #64748b;
        }
        .activity-product {
            color: #0d9488 !important;
            font-weight: 700;
            text-decoration: none !important;
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 0.78rem;
        }
        .activity-product:hover {
            text-decoration: underline !important;
        }
        .activity-extra {
            font-size: 0.7rem;
            color: #64748b;
            display: block;
            margin-top: 1px;
        }
        .activity-time {
            font-size: 0.68rem;
            color: #94a3b8;
            margin-top: 3px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* BLOG SIDEBAR WIDGET */
        .sidebar-blog-item {
            display: flex !important;
            transition: all 0.2s;
        }
        .sidebar-blog-item:hover {
            transform: translateX(4px);
            color: #0d9488;
        }
        .sidebar-blog-item .blog-thumb {
            width: 60px !important;
            height: 44px !important;
            min-height: 0 !important;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            flex-shrink: 0;
        }
        .blog-info {
            flex: 1;
            min-width: 0;
        }
        .blog-title-text {
            font-size: 0.78rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 3px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.35;
        }
        .blog-date {
            font-size: 0.65rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* COMMITMENTS WIDGET */
        .guarantees-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .guarantee-item-compact {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .guarantee-icon-wrap {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        .gi-shield { background: rgba(16, 185, 129, 0.08); color: #10b981; }
        .gi-flash { background: rgba(245, 158, 11, 0.08); color: #f59e0b; }
        .gi-headset { background: rgba(13, 148, 136, 0.08); color: #0d9488; }
        .gi-rotate { background: rgba(236, 72, 153, 0.08); color: #ec4899; }
        .guarantee-title {
            font-size: 0.78rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1px;
        }
        .guarantee-desc {
            font-size: 0.68rem;
            color: #64748b;
        }

        /* PREMIUM CONTACT BANNER */
        .premium-contact-bar {
            background: linear-gradient(-45deg, #ec4899, #8b5cf6, #3b82f6, #06b6d4, #10b981, #ec4899);
            background-size: 400% 400%;
            animation: premium-gradient-sweep 12s ease infinite;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 13.5px;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            padding: 8px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            position: relative;
            z-index: 1010;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease, margin-top 0.4s ease;
        }

        @keyframes premium-gradient-sweep {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .premium-contact-bar.collapsed {
            transform: translateY(-100%);
            opacity: 0;
            margin-top: -50px;
            pointer-events: none;
        }

        .banner-content {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .banner-text {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #ffffff;
        }

        .pulse-emoji {
            display: inline-block;
            animation: pulse-lightning 1.5s infinite;
            color: #ffeb3b;
        }

        @keyframes pulse-lightning {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2) translateY(-1px); opacity: 0.8; }
        }

        .banner-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .contact-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(4px);
            text-shadow: none;
        }

        .contact-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            background: #ffffff !important;
            color: #0f172a !important;
            border-color: #ffffff;
        }

        .contact-badge i {
            transition: color 0.2s;
        }

        /* Hover icon colors */
        .badge-zalo i { color: #ffffff; }
        .badge-zalo:hover i { color: #0068ff; }

        .badge-group i { color: #ffffff; }
        .badge-group:hover i { color: #10b981; }

        .badge-telegram i { color: #ffffff; }
        .badge-telegram:hover i { color: #0088cc; }

        .badge-facebook i { color: #ffffff; }
        .badge-facebook:hover i { color: #1877f2; }

        .banner-close-btn {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #ffffff !important;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            text-shadow: none;
        }

        .banner-close-btn:hover {
            background: rgba(239, 68, 68, 0.8);
            border-color: rgba(239, 68, 68, 1);
            color: #ffffff !important;
            transform: scale(1.05);
            box-shadow: 0 0 8px rgba(239, 68, 68, 0.5);
        }

        /* Responsive Settings */
        @media (max-width: 768px) {
            .premium-contact-bar {
                padding: 10px 12px;
                font-size: 12.5px;
                justify-content: center;
                text-align: center;
            }
            .banner-content {
                justify-content: center;
                flex-direction: column;
                gap: 8px;
            }
            .banner-links {
                justify-content: center;
            }
            .banner-close-btn {
                position: absolute;
                top: 6px;
                right: 6px;
                padding: 2px 6px;
                font-size: 10px;
                background: rgba(0, 0, 0, 0.2);
            }
        }
    </style>
    <script>
        if (localStorage.getItem('hide_contact_banner') === 'true') {
            document.write('<style>#topContactBanner { display: none !important; }</style>');
        }
    </script>
</head>
<body>
    @yield('seo_h1')

    {{-- Premium Contact Banner (Global Full Width) --}}
    <div class="premium-contact-bar" id="topContactBanner">
        <div class="banner-content">
            <span class="banner-text">
                <span class="pulse-emoji">⚡</span> Quý khách muốn tìm sản phẩm theo yêu cầu? Vui lòng liên hệ Admin:
            </span>
            <div class="banner-links">
                <!-- Zalo Admin Link -->
                <a href="{{ \App\Models\SiteSetting::getValue('contact_zalo', 'https://zalo.me/0772698113') }}" target="_blank" class="contact-badge badge-zalo">
                    <i class="fa-solid fa-comment-dots"></i> Zalo Admin
                </a>
                <!-- Zalo Group Link -->
                <a href="{{ \App\Models\SiteSetting::getValue('zalo_group_link', 'https://zalo.me/g/ptarfhnomeuotiyk7cot') }}" target="_blank" class="contact-badge badge-group">
                    <i class="fa-solid fa-users"></i> Nhóm Zalo
                </a>
                <!-- Telegram Link -->
                <a href="{{ \App\Models\SiteSetting::getValue('contact_telegram', 'https://t.me/specademy') }}" target="_blank" class="contact-badge badge-telegram">
                    <i class="fa-brands fa-telegram"></i> Telegram
                </a>
                <!-- Facebook Page Link -->
                <a href="{{ \App\Models\SiteSetting::getValue('contact_facebook', 'https://www.facebook.com/profile.php?id=61589359706008') }}" target="_blank" class="contact-badge badge-facebook">
                    <i class="fa-brands fa-facebook-f"></i> Facebook
                </a>
            </div>
        </div>
        <button type="button" class="banner-close-btn" onclick="dismissContactBanner()">
            <i class="fa-solid fa-xmark me-1"></i> Bỏ qua
        </button>
    </div>

    <div class="app-layout">
        <script>
            if (localStorage.getItem('sidebar_collapsed') === 'true') {
                document.querySelector('.app-layout').classList.add('sidebar-collapsed');
            }
        </script>
        <!-- Desktop Left Sidebar -->
        <aside class="app-sidebar-col d-none d-lg-block">
            @include('partials.sidebar')
        </aside>

        <!-- Right Content Column -->
        <div class="app-main-col">
            <!-- Navbar (hidden on desktop, active on mobile) -->
            @include('partials.navbar')

            <!-- Main Content Area -->
            <main class="app-content-body">
                @yield('content')
            </main>

            <!-- Footer -->
            @include('partials.footer')
        </div>
    </div>

    <!-- Chat Widget -->
    @include('partials.chat')

    <!-- Scripts -->
    <script>
        function dismissContactBanner() {
            const banner = document.getElementById('topContactBanner');
            if (banner) {
                banner.classList.add('collapsed');
                localStorage.setItem('hide_contact_banner', 'true');
                setTimeout(() => {
                    banner.remove();
                }, 400);
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Admin action PIN: require 3-digit code for /admin POST/PUT/DELETE -->
    <script>
        (function () {
            function isAdminAction(form) {
                try {
                    const action = form.getAttribute('action') || window.location.href;
                    const url = new URL(action, window.location.origin);
                    return url.pathname.startsWith('/admin');
                } catch (e) {
                    return false;
                }
            }

            function getIntendedMethod(form) {
                const method = (form.getAttribute('method') || 'get').toLowerCase();
                const override = form.querySelector('input[name="_method"]');
                return (override ? override.value : method).toUpperCase();
            }

            document.addEventListener('submit', function (e) {
                const form = e.target;
                if (!(form instanceof HTMLFormElement)) return;
                if (!isAdminAction(form)) return;
                if (form.dataset.adminPinSkip === '1') return;

                const intended = getIntendedMethod(form);
                if (['GET', 'HEAD', 'OPTIONS'].includes(intended)) return;
                if (form.dataset.adminPinVerified === '1') return;

                e.preventDefault();

                const pin = window.prompt('Nhập mã xác nhận để thực hiện thao tác');
                if (pin === null) return;
                if (!/^\d{3}$/.test(pin)) {
                    alert('Mã xác nhận phải đúng 3 số.');
                    return;
                }

                let input = form.querySelector('input[name="admin_pin"]');
                if (!input) {
                    input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'admin_pin';
                    form.appendChild(input);
                }
                input.value = pin;

                form.dataset.adminPinVerified = '1';
                form.submit();
            }, true);
        })();
    </script>
    
    <!-- Flash Messages -->
    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session()->pull('success') }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 4000,
            timerProgressBar: true,
            width: '350px',
            padding: '12px',
            customClass: {
                popup: 'small-toast',
                title: 'small-toast-title',
                htmlContainer: 'small-toast-text',
                closeButton: 'small-close-btn'
            },
            didOpen: (toast) => {
                toast.style.cursor = 'default';
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: '{{ session('error') }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 4000,
            timerProgressBar: true,
            width: '350px',
            padding: '12px',
            customClass: {
                popup: 'small-toast',
                title: 'small-toast-title',
                htmlContainer: 'small-toast-text',
                closeButton: 'small-close-btn'
            },
            didOpen: (toast) => {
                toast.style.cursor = 'default';
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    </script>
    @endif
    
    <style>
        .small-toast {
            font-size: 13px !important;
        }
        .small-toast-title {
            font-size: 15px !important;
            margin-bottom: 5px !important;
        }
        .small-toast-text {
            font-size: 13px !important;
        }
        .swal2-toast .swal2-icon {
            width: 2em !important;
            height: 2em !important;
            margin: 0.5em 0.8em 0.5em 0 !important;
            font-size: 1.5em !important;
        }
        .swal2-toast .swal2-icon .swal2-icon-content {
            font-size: 1.5em !important;
        }
        .swal2-toast .swal2-success-ring {
            width: 2em !important;
            height: 2em !important;
        }
        .small-close-btn {
            font-size: 18px !important;
            width: 24px !important;
            height: 24px !important;
        }
        .swal2-toast {
            flex-direction: row !important;
            align-items: center !important;
        }
        .swal2-toast .swal2-content {
            flex-grow: 1 !important;
        }
    </style>
    
    <!-- Sidebar Toggle Event Listener -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const layout = document.querySelector('.app-layout');
            
            if (sidebarToggle && layout) {
                sidebarToggle.addEventListener('click', function () {
                    layout.classList.toggle('sidebar-collapsed');
                    const isCollapsed = layout.classList.contains('sidebar-collapsed');
                    localStorage.setItem('sidebar_collapsed', isCollapsed ? 'true' : 'false');
                });
            }
        });
    </script>

@stack('scripts')
</body>
</html>
