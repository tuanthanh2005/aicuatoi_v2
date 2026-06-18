@extends('layouts.app')

@section('title', 'Ai Của Tôi | AI | Blog | Khám Phá')

@section('seo_h1')
    <h1 style="display:none;">Ai Của Tôi | AI | Blog | Khám Phá</h1>
@endsection

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc !important;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #1e293b;
        }

        /* MARQUEE WARNING */
        .marquee-alert-bar {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #fff;
            overflow: hidden;
            display: flex;
            align-items: center;
            font-size: 12.5px;
            font-weight: 500;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            z-index: 10;
        }
        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee-loop 60s linear infinite;
        }
        .marquee-track:hover { animation-play-state: paused; }
        .marquee-item {
            padding: 0 3rem;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .marquee-icon-warning {
            color: #f59e0b;
            font-size: 14px;
            animation: pulse-icon 2s infinite;
        }
        @keyframes pulse-icon {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.92); }
        }
        @keyframes marquee-loop {
            0% { transform: translate3d(0, 0, 0); }
            100% { transform: translate3d(-50%, 0, 0); }
        }

        /* MAIN HOMEPAGE GRID */
        .homepage-grid {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-areas: 
                "main"
                "sidebar";
            gap: 30px;
            max-width: 1300px;
            margin: 30px auto 60px;
            padding: 0 20px;
        }
        @media (min-width: 992px) {
            .homepage-grid {
                grid-template-columns: 320px 1fr;
                grid-template-areas: "sidebar main";
            }
        }
        .homepage-sidebar {
            grid-area: sidebar;
        }
        .homepage-main {
            grid-area: main;
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
            transition: all 0.2s;
        }
        .sidebar-blog-item:hover {
            transform: translateX(4px);
            color: #0d9488;
        }
        .blog-thumb {
            width: 60px;
            height: 44px;
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

        /* DASHBOARD HERO BANNER */
        .dashboard-hero {
            background: linear-gradient(135deg, #e0f2fe 0%, #e0f7fa 100%);
            border: 1px solid #b2ebf2;
            border-radius: 20px;
            padding: 35px 30px;
            color: #0f172a;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(13, 148, 136, 0.06);
        }
        .dashboard-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(13, 148, 136, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(13, 148, 136, 0.12);
            border: 1px solid rgba(13, 148, 136, 0.25);
            color: #0d9488;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 700;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .hero-title-main {
            font-size: 1.8rem;
            font-weight: 900;
            line-height: 1.25;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
            color: #0f172a;
        }
        .hero-subtitle {
            font-size: 0.88rem;
            color: #334155;
            margin-bottom: 24px;
            max-width: 550px;
            line-height: 1.5;
        }
        .hero-search-wrapper {
            max-width: 480px;
        }
        .hero-search-form {
            display: flex;
            align-items: center;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 4px 6px 4px 14px;
            transition: all 0.2s;
        }
        .hero-search-form:focus-within {
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.15);
        }
        .search-icon {
            color: #64748b;
            margin-right: 10px;
        }
        .search-input {
            background: transparent;
            border: none;
            outline: none;
            color: #1e293b;
            width: 100%;
            font-size: 0.85rem;
        }
        .search-input::placeholder {
            color: #94a3b8;
        }
        .search-submit-btn {
            background: linear-gradient(135deg, #0ea5e9, #0d9488);
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .search-submit-btn:hover {
            background: linear-gradient(135deg, #0284c7, #0f766e);
            opacity: 0.95;
        }

        /* BENTO GRID */
        .bento-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }
        @media (min-width: 576px) {
            .bento-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .bento-item {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
        }
        .bento-gpt { border-left: 4px solid #10b981; }
        .bento-gpt:hover { border-color: #10b981; box-shadow: 0 12px 20px -5px rgba(16, 185, 129, 0.12); transform: translateY(-3px); }
        .bento-gpt .bento-icon { background: rgba(16, 185, 129, 0.08); color: #10b981; }

        .bento-claude { border-left: 4px solid #f97316; }
        .bento-claude:hover { border-color: #f97316; box-shadow: 0 12px 20px -5px rgba(249, 115, 22, 0.12); transform: translateY(-3px); }
        .bento-claude .bento-icon { background: rgba(249, 115, 22, 0.08); color: #f97316; }

        .bento-cursor { border-left: 4px solid #0ea5e9; }
        .bento-cursor:hover { border-color: #0ea5e9; box-shadow: 0 12px 20px -5px rgba(14, 165, 233, 0.12); transform: translateY(-3px); }
        .bento-cursor .bento-icon { background: rgba(14, 165, 233, 0.08); color: #0ea5e9; }

        .bento-icon {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            flex-shrink: 0;
        }
        .bento-info {
            flex: 1;
            min-width: 0;
        }
        .bento-info h3 {
            font-size: 0.84rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 2px;
        }
        .bento-info p {
            font-size: 0.68rem;
            color: #64748b;
            margin-bottom: 6px;
            line-height: 1.3;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .bento-price {
            font-size: 0.68rem;
            font-weight: 800;
            color: #0f766e;
            background: #ccfbf1;
            padding: 2px 6px;
            border-radius: 4px;
            display: inline-block;
        }

        /* DYNAMIC TABS BAR */
        .store-tabs-container {
            position: sticky;
            top: 0;
            background: #f8fafc;
            padding: 10px 0;
            z-index: 100;
            margin-bottom: 24px;
        }
        .store-tabs {
            display: flex;
            gap: 8px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 6px;
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .store-tabs::-webkit-scrollbar {
            display: none;
        }
        .tab-btn {
            background: transparent;
            border: none;
            padding: 10px 18px;
            font-size: 0.86rem;
            font-weight: 700;
            color: #64748b;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .tab-btn:hover {
            background: #f1f5f9;
            color: #1e293b;
        }
        .tab-btn.active {
            background: linear-gradient(135deg, #0ea5e9, #0d9488);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.2);
        }

        /* TAB PANELS */
        .tab-panel {
            display: none;
            animation: fadeIn 0.4s ease-out;
        }
        .tab-panel.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .panel-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.02em;
        }
        .panel-desc {
            font-size: 0.78rem;
            color: #64748b;
        }
        .sec-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #0d9488;
            font-weight: 700;
            font-size: 0.82rem;
            text-decoration: none !important;
            transition: all 0.2s;
        }
        .sec-link:hover {
            color: #0f766e;
            gap: 8px;
        }

        /* FLASH SALE TIMER */
        .flash-timer {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #0f172a;
            color: #fff;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 800;
            font-variant-numeric: tabular-nums;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .flash-timer .timer-label {
            font-weight: 600;
            font-size: 0.7rem;
            color: #94a3b8;
            margin-right: 4px;
        }
        .timer-value {
            background: rgba(255,255,255,0.1);
            padding: 2px 5px;
            border-radius: 4px;
            min-width: 22px;
            text-align: center;
            display: inline-block;
        }

        /* PRODUCT GRID */
        .pgrid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }
        @media (min-width: 640px) { .pgrid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 1200px) { .pgrid { grid-template-columns: repeat(4, 1fr); } }

        /* PRODUCT CARD */
        .pcard {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            text-decoration: none !important;
            color: inherit !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
        }
        .pcard:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
            border-color: #99f6e4;
        }
        .pcard .pc-img {
            position: relative;
            overflow: hidden;
            background: #f8fafc;
            aspect-ratio: 1/1;
        }
        .pcard .pc-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s;
        }
        .pcard:hover .pc-img img {
            transform: scale(1.08);
        }
        
        .pcard .badge-l {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 0.63rem;
            font-weight: 800;
            text-transform: uppercase;
            color: #fff;
            z-index: 2;
        }
        .badge-l.hot { background: linear-gradient(135deg, #ef4444, #ec4899); }
        .badge-l.vip { background: linear-gradient(135deg, #8b5cf6, #6366f1); }
        .badge-l.sale { background: linear-gradient(135deg, #f59e0b, #d97706); }
        
        .pcard .badge-d {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #ef4444;
            color: #fff;
            font-size: 0.63rem;
            font-weight: 800;
            padding: 4px 8px;
            border-radius: 8px;
            z-index: 2;
        }
        .pcard .badge-out {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(15, 23, 42, 0.85);
            color: #fff;
            font-size: 0.6rem;
            font-weight: 800;
            padding: 4px 8px;
            border-radius: 8px;
            z-index: 2;
        }
        .pcard .pc-body {
            padding: 14px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .pcard .pc-name {
            font-size: 0.82rem;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 6px;
            flex: 1;
        }
        .pcard .pc-stock {
            font-size: 0.72rem;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .pcard .pc-price {
            display: flex;
            align-items: baseline;
            gap: 6px;
            margin-bottom: 12px;
        }
        .pcard .pr-cur {
            font-size: 1rem;
            font-weight: 800;
            color: #ef4444;
        }
        .pcard .pr-old {
            font-size: 0.74rem;
            color: #94a3b8;
            text-decoration: line-through;
        }
        .pcard .btn-cart {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 9px;
            font-size: 0.78rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.2s;
            color: #fff;
            text-decoration: none;
        }
        .btn-cart.c-hot { background: linear-gradient(135deg, #ef4444, #f59e0b); }
        .btn-cart.c-vip { background: linear-gradient(135deg, #8b5cf6, #0ea5e9); }
        .btn-cart.c-def { background: linear-gradient(135deg, #0ea5e9, #0d9488); }
        .btn-cart:hover {
            opacity: 0.9;
            transform: scale(1.02);
        }
        .pcard.oos { opacity: 0.75; }
        .pcard.oos .pc-img::after {
            content: 'HẾT HÀNG';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-10deg);
            background: rgba(15, 23, 42, 0.85);
            color: #fff;
            padding: 5px 15px;
            font-size: 0.75rem;
            font-weight: 800;
            border-radius: 6px;
            z-index: 5;
            letter-spacing: 1px;
        }

        /* BOTTOM VIEW ALL ACTION */
        .view-all-sec {
            text-align: center;
            margin: 40px 0 20px;
        }
        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            border: 2px solid #0d9488;
            color: #0d9488;
            border-radius: 14px;
            padding: 12px 35px;
            font-weight: 700;
            font-size: 0.88rem;
            text-decoration: none !important;
            transition: all 0.3s;
        }
        .view-all-btn:hover {
            background: linear-gradient(135deg, #0ea5e9, #0d9488);
            color: #fff;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.25);
        }

        /* RECENT PURCHASE TOAST (FOR MOBILE) */
        .rpt-toast {
            position: fixed;
            left: 16px;
            bottom: 16px;
            width: min(340px, calc(100vw - 32px));
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border-left: 4px solid #0d9488;
            padding: 14px 16px;
            z-index: 2000;
            opacity: 0;
            transform: translateY(10px);
            pointer-events: none;
            transition: opacity 0.3s, transform 0.3s;
        }
        .rpt-toast.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
        .rpt-toast .inner {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }
        .rpt-toast .ava {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0ea5e9 0%, #0d9488 100%);
            color: #fff;
            font-weight: 800;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .rpt-toast .rn {
            font-weight: 800;
            font-size: 0.8rem;
            color: #1e293b;
        }
        .rpt-toast .rs {
            font-size: 0.72rem;
            color: #64748b;
        }
        .rpt-toast .rp {
            font-size: 0.74rem;
            font-weight: 700;
            color: #0d9488;
            display: block;
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 220px;
            text-decoration: none !important;
        }
        .rpt-toast .rp:hover {
            text-decoration: underline !important;
        }
        .rpt-toast .rc {
            position: absolute;
            top: 8px;
            right: 8px;
            background: none;
            border: none;
            font-size: 16px;
            color: #94a3b8;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    {{-- Marquee warning top --}}
    <div class="marquee-alert-bar">
        <div class="marquee-track">
            @for($i = 0; $i < 4; $i++)
            <div class="marquee-item">
                <i class="fa-solid fa-triangle-exclamation marquee-icon-warning"></i>
                <span>CẢNH BÁO: Đang có đối tượng giả danh Fanpage / Admin AiCuaToi.com. Chỉ giao dịch qua website hoặc trang liên hệ chính chủ!</span>
                <span>•</span>
                <i class="fa-solid fa-clock" style="color:#38bdf8;"></i>
                <span>Giờ làm việc hỗ trợ khách hàng: 08:00 – 23:00 hàng ngày.</span>
            </div>
            @endfor
        </div>
    </div>

    {{-- Layout Grid --}}
    <div class="homepage-grid">
        
        {{-- Left Sidebar --}}
        <aside class="homepage-sidebar">
            
            {{-- Status & Contact Widget --}}
            <div class="sidebar-widget">
                <div class="status-header">
                    <span class="widget-title mb-0">Hỗ Trợ Trực Tuyến</span>
                    <div class="status-indicator">
                        <div class="pulse-dot"></div>
                        <span>ONLINE</span>
                    </div>
                </div>
                <p class="text-muted" style="font-size: 0.7rem; line-height: 1.4; margin-bottom: 15px;">
                    <i class="fa-solid fa-clock me-1 text-primary"></i> Giờ làm việc: 08:00 - 23:00 hàng ngày. Phản hồi nhanh trong vòng 5 phút!
                </p>
                <div class="d-flex flex-column gap-2">
                    <a href="{{ \App\Models\SiteSetting::getValue('zalo_group_link', 'https://zalo.me/g/ptarfhnomeuotiyk7cot') }}" target="_blank" class="contact-card-sidebar" style="border-left: 3px solid #0068ff;">
                        <div class="contact-icon" style="background: #0068ff;">
                            <span style="font-weight:900;font-style:italic;font-size:0.85rem;">Z</span>
                        </div>
                        <div class="contact-info">
                            <div class="contact-name">Cộng Đồng Zalo</div>
                            <div class="contact-desc">Gia nhập nhóm nhận ưu đãi</div>
                        </div>
                        <div class="contact-arrow"><i class="fa-solid fa-chevron-right"></i></div>
                    </a>
                    
                    <a href="{{ \App\Models\SiteSetting::getValue('contact_zalo', 'https://zalo.me/0772698113') }}" target="_blank" class="contact-card-sidebar" style="border-left: 3px solid #0d9488;">
                        <div class="contact-icon" style="background: #0d9488;">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div class="contact-info">
                            <div class="contact-name">Hỗ Trợ Admin</div>
                            <div class="contact-desc">Chat Zalo hỗ trợ trực tiếp</div>
                        </div>
                        <div class="contact-arrow"><i class="fa-solid fa-chevron-right"></i></div>
                    </a>
                </div>
            </div>

            {{-- Verified Official Channels Widget --}}
            @php
                $fanpagesJson = \App\Models\SiteSetting::getValue('official_fanpages', '[]');
                $officialFanpages = json_decode($fanpagesJson, true) ?: [];
            @endphp
            @if(count($officialFanpages) > 0)
            <div class="sidebar-widget">
                <div class="widget-header mb-3">
                    <h4 class="widget-title mb-0"><i class="fa-solid fa-shield-halved text-success me-2"></i>Kênh Đã Xác Minh</h4>
                    <small class="text-muted" style="font-size: 0.65rem;">Tránh các tài khoản lừa đảo giả mạo</small>
                </div>
                <div class="d-flex flex-column gap-2">
                    @foreach($officialFanpages as $fp)
                        @php
                            $platform = strtolower($fp['platform'] ?? 'facebook');
                            $iconClass = 'fa-solid fa-globe'; $brandColor = '#10b981';
                            if ($platform === 'facebook') { $iconClass = 'fa-brands fa-facebook-f'; $brandColor = '#1877f2'; }
                            elseif ($platform === 'zalo') { $iconClass = 'fa-solid fa-comment-dots'; $brandColor = '#0068ff'; }
                            elseif ($platform === 'telegram') { $iconClass = 'fa-brands fa-telegram'; $brandColor = '#0088cc'; }
                            elseif ($platform === 'youtube') { $iconClass = 'fa-brands fa-youtube'; $brandColor = '#f00'; }
                            elseif ($platform === 'tiktok') { $iconClass = 'fa-brands fa-tiktok'; $brandColor = '#010101'; }
                        @endphp
                        <a href="{{ $fp['url'] }}" target="_blank" class="contact-card-sidebar" style="border-left: 3px solid {{ $brandColor }};">
                            <div class="contact-icon" style="background: {{ $brandColor }};">
                                @if($platform === 'zalo')<span style="font-weight:900;font-style:italic;font-size:0.85rem;">Z</span>@else<i class="{{ $iconClass }}"></i>@endif
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">{{ $fp['name'] }}</div>
                                <div class="contact-desc">{{ !empty($fp['desc']) ? $fp['desc'] : 'Kênh hỗ trợ chính thức' }}</div>
                            </div>
                            <div class="contact-arrow"><i class="fa-solid fa-chevron-right"></i></div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Recent Activity / Purchase Widget (Desktop Live Feed) --}}
            @if(!empty($recentPurchases) && count($recentPurchases) > 0)
            <div class="sidebar-widget d-none d-lg-block">
                <div class="widget-header d-flex justify-content-between align-items-center mb-3">
                    <h4 class="widget-title mb-0"><i class="fa-solid fa-clock-rotate-left text-primary me-2"></i>Đơn Hàng Gần Đây</h4>
                    <span class="badge bg-success-subtle text-success" style="font-size: 0.65rem; font-weight: 700; padding: 3px 8px; border-radius: 6px;">LIVE</span>
                </div>
                <div class="live-purchases-container">
                    <div id="live-purchases-list" class="live-activity-list">
                        @foreach($recentPurchases as $purchase)
                        <div class="live-activity-item">
                            <div class="activity-avatar">{{ mb_substr($purchase['customer_name'] ?? 'K', 0, 1) }}</div>
                            <div class="activity-details">
                                <div class="activity-user">
                                    <strong>{{ $purchase['customer_name'] }}</strong>
                                    <span class="activity-action">vừa {{ $purchase['verb'] }}</span>
                                </div>
                                <a href="{{ $purchase['product_url'] }}" class="activity-product">{{ $purchase['product_name'] }}</a>
                                @if($purchase['extra_items'] > 0)
                                <span class="activity-extra">và +{{ $purchase['extra_items'] }} dịch vụ khác</span>
                                @endif
                                <div class="activity-time"><i class="fa-solid fa-clock"></i> {{ $purchase['time_ago'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            {{-- Latest Articles/Blog Widget --}}
            @if(isset($latestBlogs) && $latestBlogs->count() > 0)
            <div class="sidebar-widget">
                <div class="widget-header mb-3">
                    <h4 class="widget-title mb-0"><i class="fa-solid fa-newspaper text-info me-2"></i>Tin Tức & Hướng Dẫn</h4>
                    <small class="text-muted" style="font-size: 0.65rem;">Cẩm nang sử dụng AI hiệu quả</small>
                </div>
                <div class="d-flex flex-column gap-3">
                    @foreach($latestBlogs->take(3) as $b)
                        <a href="{{ route('blog.show', $b->slug) }}" class="sidebar-blog-item d-flex gap-2 text-decoration-none">
                            <img src="{{ $b->image ?? 'https://via.placeholder.com/150' }}" alt="{{ $b->title }}" class="blog-thumb" loading="lazy">
                            <div class="blog-info">
                                <h5 class="blog-title-text">{{ $b->title }}</h5>
                                <span class="blog-date"><i class="fa-solid fa-calendar-days"></i> {{ optional($b->published_at)->format('d/m/Y') ?? $b->created_at->format('d/m/Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Guarantees Trust Widget --}}
            <div class="sidebar-widget">
                <div class="widget-header mb-3">
                    <h4 class="widget-title mb-0"><i class="fa-solid fa-award text-warning me-2"></i>Cam Kết Chất Lượng</h4>
                    <small class="text-muted" style="font-size: 0.65rem;">AiCuaToi.com đồng hành cùng bạn</small>
                </div>
                <div class="guarantees-list">
                    <div class="guarantee-item-compact">
                        <div class="guarantee-icon-wrap gi-shield"><i class="fa-solid fa-shield-halved"></i></div>
                        <div>
                            <div class="guarantee-title">Bảo Hành Lâu Dài</div>
                            <div class="guarantee-desc">Lỗi 1 đổi 1 hoặc hoàn tiền nhanh</div>
                        </div>
                    </div>
                    <div class="guarantee-item-compact">
                        <div class="guarantee-icon-wrap gi-flash"><i class="fa-solid fa-bolt"></i></div>
                        <div>
                            <div class="guarantee-title">Kích Hoạt Siêu Tốc</div>
                            <div class="guarantee-desc">Nhận tài khoản trong 1-5 phút</div>
                        </div>
                    </div>
                    <div class="guarantee-item-compact">
                        <div class="guarantee-icon-wrap gi-headset"><i class="fa-solid fa-headset"></i></div>
                        <div>
                            <div class="guarantee-title">Hỗ Trợ Tận Tâm</div>
                            <div class="guarantee-desc">Tư vấn, fix lỗi đến 23h hàng ngày</div>
                        </div>
                    </div>
                    <div class="guarantee-item-compact">
                        <div class="guarantee-icon-wrap gi-rotate"><i class="fa-solid fa-rotate-left"></i></div>
                        <div>
                            <div class="guarantee-title">Đổi Trả An Tâm</div>
                            <div class="guarantee-desc">Hoàn tiền 100% nếu sản phẩm lỗi</div>
                        </div>
                    </div>
                </div>
            </div>

        </aside>

        {{-- Right Main Catalog Content --}}
        <main class="homepage-main">
            
            {{-- Dashboard Search Hero --}}
            <div class="dashboard-hero mb-4">
                <div class="hero-inner">
                    <span class="hero-tag"><i class="fa-solid fa-bolt text-warning"></i> AiCuaToi.com AI Hub</span>
                    <h2 class="hero-title-main">Khám Phá Sức Mạnh AI — Tối Ưu Năng Suất Làm Việc</h2>
                    <p class="hero-subtitle">Cung cấp tài khoản premium chính hãng giá rẻ, công cụ thiết kế, viết code và tự động hóa công việc tốt nhất.</p>
                    
                    <div class="hero-search-wrapper">
                        <form action="{{ route('shop') }}" method="GET" class="hero-search-form">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            <input type="text" name="search" placeholder="Nhập tên tài khoản (ví dụ: ChatGPT, Claude, Cursor...)" class="search-input" required autocomplete="off">
                            <button type="submit" class="search-submit-btn">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Bento Categories Highlights --}}
            @if(\App\Models\SiteSetting::getValue('home_show_bento_highlights', '1') === '1')
            <div class="bento-grid mb-4">
                <div class="bento-item bento-gpt" onclick="window.location.href='{{ route('product.keyword', 'gpt') }}'">
                    <div class="bento-icon"><i class="fa-solid fa-message"></i></div>
                    <div class="bento-info">
                        <h3>ChatGPT Plus</h3>
                        <p>Trợ lý AI đa năng hỗ trợ đắc lực cho mọi ngành nghề</p>
                        <span class="bento-price">Giá từ 60K</span>
                    </div>
                </div>
                <div class="bento-item bento-claude" onclick="window.location.href='{{ route('product.keyword', 'claude') }}'">
                    <div class="bento-icon"><i class="fa-solid fa-brain"></i></div>
                    <div class="bento-info">
                        <h3>Claude Pro</h3>
                        <p>Thông minh vượt trội, hỗ trợ đọc file code dữ liệu cực lớn</p>
                        <span class="bento-price">Giá từ 89K</span>
                    </div>
                </div>
                <div class="bento-item bento-cursor" onclick="window.location.href='{{ route('product.keyword', 'cursor') }}'">
                    <div class="bento-icon"><i class="fa-solid fa-code"></i></div>
                    <div class="bento-info">
                        <h3>Cursor Pro</h3>
                        <p>Công cụ lập trình AI thế hệ mới được lập trình viên săn đón</p>
                        <span class="bento-price">Giá từ 150K</span>
                    </div>
                </div>
            </div>
            @endif

            {{-- Store Catalog Tab Switcher --}}
            <div class="store-tabs-container">
                <div class="store-tabs">
                    @if(\App\Models\SiteSetting::getValue('home_show_flash_sale', '1') === '1' && isset($saleProducts) && $saleProducts->count() > 0)
                    <button class="tab-btn active" data-target="#tab-flash">
                        <i class="fa-solid fa-bolt text-warning"></i> Flash Sale
                    </button>
                    @endif
                    
                    @if(\App\Models\SiteSetting::getValue('home_show_featured', '1') === '1' && isset($featuredProducts) && $featuredProducts->count() > 0)
                    <button class="tab-btn {{ (\App\Models\SiteSetting::getValue('home_show_flash_sale', '1') === '0' || !isset($saleProducts) || $saleProducts->count() == 0) ? 'active' : '' }}" data-target="#tab-featured">
                        <i class="fa-solid fa-star text-danger"></i> Sản Phẩm Nổi Bật
                    </button>
                    @endif
                    
                    @if(\App\Models\SiteSetting::getValue('home_show_exclusive', '1') === '1' && isset($highlightProducts) && $highlightProducts->count() > 0)
                    <button class="tab-btn" data-target="#tab-exclusive">
                        <i class="fa-solid fa-gem text-primary"></i> Độc Quyền / VIP
                    </button>
                    @endif
                    
                    @if(\App\Models\SiteSetting::getValue('home_show_combo_ai', '1') === '1' && isset($latestProducts) && $latestProducts->count() > 0)
                    <button class="tab-btn" data-target="#tab-combo">
                        <i class="fa-solid fa-box-open text-success"></i> Combo AI Tiết Kiệm
                    </button>
                    @endif
                </div>
            </div>

            {{-- Tab Content Panes --}}
            <div class="store-tab-content">
                
                {{-- Flash Sale Tab Pane --}}
                @if(\App\Models\SiteSetting::getValue('home_show_flash_sale', '1') === '1' && isset($saleProducts) && $saleProducts->count() > 0)
                <div class="tab-panel active" id="tab-flash">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                        <div>
                            <h3 class="panel-title mb-1" id="flash-sale-title">{{ $isExpired ? 'Sản phẩm gợi ý cho bạn' : '⚡ Flash Sale — Giảm Giá Giới Hạn' }}</h3>
                            <p class="panel-desc text-muted mb-0">Nhanh tay mua ngay tài khoản giá rẻ với số lượng giới hạn!</p>
                        </div>
                        <div class="flash-timer" id="flash-sale"
                             data-countdown-end="{{ $saleEndsAt?->getTimestamp() * 1000 }}"
                             data-is-expired="{{ $isExpired ? '1' : '0' }}">
                            <span class="timer-label">Kết thúc sau</span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="timer-value" data-unit="hours">00</span>:
                                <span class="timer-value" data-unit="minutes">00</span>:
                                <span class="timer-value" data-unit="seconds">00</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pgrid" id="flash-sale-products-row">
                        @foreach($saleProducts->take(12) as $sp)
                        <a href="{{ route('product.show', $sp->slug) }}" class="pcard {{ $sp->stock <= 0 ? 'oos' : '' }}">
                            <div class="pc-img">
                                <img src="{{ $sp->image ?? 'https://via.placeholder.com/300' }}" alt="{{ $sp->name }}" loading="lazy">
                                <span class="badge-l sale">Flash</span>
                                @if($sp->stock <= 0)<span class="badge-out">HẾT HÀNG</span>@endif
                            </div>
                            <div class="pc-body">
                                <div class="pc-name">{{ $sp->name }}</div>
                                <div class="pc-stock">Còn: <span class="{{ $sp->stock <= 0 ? 'text-danger' : 'text-success' }}">{{ $sp->stock }}</span></div>
                                <div class="pc-price"><span class="pr-cur">{{ $sp->formatted_price }}</span></div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Featured Tab Pane --}}
                @if(\App\Models\SiteSetting::getValue('home_show_featured', '1') === '1' && isset($featuredProducts) && $featuredProducts->count() > 0)
                <div class="tab-panel {{ (\App\Models\SiteSetting::getValue('home_show_flash_sale', '1') === '0' || !isset($saleProducts) || $saleProducts->count() == 0) ? 'active' : '' }}" id="tab-featured">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <div>
                            <h3 class="panel-title mb-1">⭐ Sản Phẩm Nổi Bật</h3>
                            <p class="panel-desc text-muted mb-0">Các tài khoản chất lượng được nhiều lập trình viên và doanh nghiệp tin dùng.</p>
                        </div>
                        <a href="{{ route('shop') }}" class="sec-link">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    
                    <div class="pgrid">
                        @foreach($featuredProducts->take(12) as $fp)
                        <a href="{{ route('product.show', $fp->slug) }}" class="pcard {{ $fp->stock <= 0 ? 'oos' : '' }}">
                            <div class="pc-img">
                                <img src="{{ $fp->image ?? 'https://via.placeholder.com/300' }}" alt="{{ $fp->name }}" loading="lazy">
                                <span class="badge-l hot">Hot</span>
                                @if($fp->is_on_sale)<span class="badge-d">-{{ $fp->discount_percent }}%</span>@endif
                            </div>
                            <div class="pc-body">
                                <div class="pc-name">{{ $fp->name }}</div>
                                <div class="pc-stock">Còn: <span class="{{ $fp->stock <= 0 ? 'text-danger' : 'text-success' }}">{{ $fp->stock }}</span></div>
                                <div class="pc-price">
                                    <span class="pr-cur">{{ $fp->formatted_price }}</span>
                                    @if($fp->is_on_sale)<span class="pr-old">{{ $fp->formatted_original_price }}</span>@endif
                                </div>
                                <form action="{{ route('cart.add', $fp->id) }}" method="POST" onclick="event.stopPropagation();event.preventDefault();this.submit();">
                                    @csrf
                                    <button type="submit" class="btn-cart c-hot"><i class="fa-solid fa-cart-plus"></i> {{ $fp->stock > 0 ? 'Thêm vào giỏ' : 'Đặt trước' }}</button>
                                </form>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Exclusive Tab Pane --}}
                @if(\App\Models\SiteSetting::getValue('home_show_exclusive', '1') === '1' && isset($highlightProducts) && $highlightProducts->count() > 0)
                <div class="tab-panel" id="tab-exclusive">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <div>
                            <h3 class="panel-title mb-1">💎 Sản Phẩm Độc Quyền & VIP</h3>
                            <p class="panel-desc text-muted mb-0">Các gói tài khoản VIP đặc quyền với chính sách hỗ trợ cao cấp chỉ có tại AiCuaToi.com.</p>
                        </div>
                        <a href="{{ route('shop') }}" class="sec-link">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    
                    <div class="pgrid">
                        @foreach($highlightProducts->take(12) as $hp)
                        <a href="{{ route('product.show', $hp->slug) }}" class="pcard {{ $hp->stock <= 0 ? 'oos' : '' }}">
                            <div class="pc-img">
                                <img src="{{ $hp->image ?? 'https://via.placeholder.com/300' }}" alt="{{ $hp->name }}" loading="lazy">
                                <span class="badge-l vip">Vip</span>
                                @if($hp->is_on_sale)<span class="badge-d">-{{ $hp->discount_percent }}%</span>@endif
                            </div>
                            <div class="pc-body">
                                <div class="pc-name">{{ $hp->name }}</div>
                                <div class="pc-stock">Còn: <span class="{{ $hp->stock <= 0 ? 'text-danger' : 'text-success' }}">{{ $hp->stock }}</span></div>
                                <div class="pc-price">
                                    <span class="pr-cur">{{ $hp->formatted_price }}</span>
                                    @if($hp->is_on_sale)<span class="pr-old">{{ $hp->formatted_original_price }}</span>@endif
                                </div>
                                <form action="{{ route('cart.add', $hp->id) }}" method="POST" onclick="event.stopPropagation();event.preventDefault();this.submit();">
                                    @csrf
                                    <button type="submit" class="btn-cart c-vip"><i class="fa-solid fa-cart-plus"></i> {{ $hp->stock > 0 ? 'Thêm vào giỏ' : 'Đặt trước' }}</button>
                                </form>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Combo AI Tab Pane --}}
                @if(\App\Models\SiteSetting::getValue('home_show_combo_ai', '1') === '1' && isset($latestProducts) && $latestProducts->count() > 0)
                <div class="tab-panel" id="tab-combo">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <div>
                            <h3 class="panel-title mb-1">📦 Combo AI Tiết Kiệm</h3>
                            <p class="panel-desc text-muted mb-0">Tiết kiệm lên tới 50% chi phí khi đăng ký các gói combo tài khoản AI dùng chung.</p>
                        </div>
                        <a href="{{ route('shop') }}" class="sec-link">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    
                    <div class="pgrid">
                        @foreach($latestProducts->take(12) as $cp)
                        <a href="{{ route('product.show', $cp->slug) }}" class="pcard {{ $cp->stock <= 0 ? 'oos' : '' }}">
                            <div class="pc-img">
                                <img src="{{ $cp->image ?? 'https://via.placeholder.com/300' }}" alt="{{ $cp->name }}" loading="lazy">
                                @if($cp->is_on_sale)<span class="badge-d">-{{ $cp->discount_percent }}%</span>@endif
                            </div>
                            <div class="pc-body">
                                <div class="pc-name">{{ $cp->name }}</div>
                                <div class="pc-stock">Còn: <span class="{{ $cp->stock <= 0 ? 'text-danger' : 'text-success' }}">{{ $cp->stock }}</span></div>
                                <div class="pc-price">
                                    <span class="pr-cur">{{ $cp->formatted_price }}</span>
                                    @if($cp->is_on_sale)<span class="pr-old">{{ $cp->formatted_original_price }}</span>@endif
                                </div>
                                <form action="{{ route('cart.add', $cp->id) }}" method="POST" onclick="event.stopPropagation();event.preventDefault();this.submit();">
                                    @csrf
                                    <button type="submit" class="btn-cart c-def"><i class="fa-solid fa-cart-plus"></i> {{ $cp->stock > 0 ? 'Thêm vào giỏ' : 'Đặt trước' }}</button>
                                </form>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
                
            </div>

            {{-- Explore Shop Action Button --}}
            <div class="view-all-sec">
                <a href="{{ route('shop') }}" class="view-all-btn">
                    <i class="fa-solid fa-store"></i> Xem Cửa Hàng & Tất Cả Sản Phẩm <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </main>
    </div>

    {{-- Recent Purchase Toast (Floating Toast - Visible mainly on mobile) --}}
    @if(!empty($recentPurchases) && count($recentPurchases) > 0)
        <script type="application/json" id="rptData">@json($recentPurchases)</script>
        <div id="rptToast" class="rpt-toast" role="status" aria-live="polite">
            <button class="rc" id="rptClose">&times;</button>
            <div class="inner">
                <div class="ava" id="rptAva">K</div>
                <div>
                    <div class="rn" id="rptName">Khách hàng</div>
                    <div class="rs" id="rptSub">vừa mua thành công</div>
                    <a href="#" class="rp" id="rptProd">Sản phẩm</a>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // TAB SWITCHING LOGIC
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabPanes = document.querySelectorAll('.tab-panel');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    tabBtns.forEach(b => b.classList.remove('active'));
                    tabPanes.forEach(p => p.classList.remove('active'));

                    btn.classList.add('active');
                    const target = btn.getAttribute('data-target');
                    const panel = document.querySelector(target);
                    if (panel) {
                        panel.classList.add('active');
                    }
                });
            });

            // COUNTDOWN TIMER LOGIC
            const timerContainer = document.getElementById('flash-sale');
            if (timerContainer) {
                const end = parseInt(timerContainer.dataset.countdownEnd || '0');
                const isExpired = timerContainer.dataset.isExpired === '1';
                const pad = n => String(n).padStart(2, '0');
                
                const updateTimerDisplay = (H, M, S) => {
                    const hEl = timerContainer.querySelector('[data-unit="hours"]');
                    const mEl = timerContainer.querySelector('[data-unit="minutes"]');
                    const sEl = timerContainer.querySelector('[data-unit="seconds"]');
                    if (hEl) hEl.textContent = pad(H);
                    if (mEl) mEl.textContent = pad(M);
                    if (sEl) sEl.textContent = pad(S);
                };

                if (isExpired) {
                    updateTimerDisplay(0, 0, 0);
                } else {
                    const timerInterval = setInterval(() => {
                        let d = end - Date.now();
                        if (d <= 0) {
                            clearInterval(timerInterval);
                            updateTimerDisplay(0, 0, 0);
                            const titleEl = document.getElementById('flash-sale-title');
                            if (titleEl) titleEl.textContent = 'Sản phẩm gợi ý cho bạn';
                            timerContainer.style.opacity = '0.6';

                            fetch('{{ route("products.random") }}')
                                .then(res => res.json())
                                .then(products => {
                                    const mainRow = document.getElementById('flash-sale-products-row');
                                    if (mainRow && products) {
                                        mainRow.innerHTML = products.map(sp => {
                                            const oosB = sp.stock <= 0 ? '<span class="badge-out">HẾT HÀNG</span>' : '';
                                            const oosC = sp.stock <= 0 ? 'oos' : '';
                                            const stC = sp.stock <= 0 ? 'text-danger' : 'text-success';
                                            return `<a href="${sp.show_url}" class="pcard ${oosC}"><div class="pc-img"><img src="${sp.image}" alt="${sp.name}"><span class="badge-l sale">Flash</span>${oosB}</div><div class="pc-body"><div class="pc-name">${sp.name}</div><div class="pc-stock">Còn: <span class="${stC}">${sp.stock}</span></div><div class="pc-price"><span class="pr-cur">${sp.formatted_price}</span></div></div></a>`;
                                        }).join('');
                                    }
                                }).catch(err => console.error('Error fetching random products:', err));
                        } else {
                            const H = Math.floor(d / 3600000); d %= 3600000;
                            const M = Math.floor(d / 60000);
                            const S = Math.floor((d % 60000) / 1000);
                            updateTimerDisplay(H, M, S);
                        }
                    }, 1000);
                }
            }

            // VERTICAL TICKER FOR SIDEBAR LIVE PURCHASES
            const list = document.getElementById('live-purchases-list');
            if (list && list.children.length > 2) {
                setInterval(() => {
                    const firstChild = list.children[0];
                    firstChild.style.transition = 'margin-top 0.5s ease-in-out, opacity 0.5s ease-in-out';
                    firstChild.style.marginTop = `-${firstChild.offsetHeight + 10}px`;
                    firstChild.style.opacity = '0';
                    
                    setTimeout(() => {
                        firstChild.style.transition = '';
                        firstChild.style.marginTop = '';
                        firstChild.style.opacity = '';
                        list.appendChild(firstChild);
                    }, 500);
                }, 4000);
            }

            // FLOATING TOAST LOGIC (FOR MOBILE SCREEN SIZES ONLY)
            const rptDataEl = document.getElementById('rptData');
            if (rptDataEl && window.innerWidth < 992) {
                let purchases = [];
                try {
                    purchases = JSON.parse(rptDataEl.textContent);
                } catch (e) {
                    console.error('Error parsing purchase data:', e);
                }

                if (purchases && purchases.length > 0) {
                    const toast = document.getElementById('rptToast');
                    const tAva = document.getElementById('rptAva');
                    const tName = document.getElementById('rptName');
                    const tSub = document.getElementById('rptSub');
                    const tProd = document.getElementById('rptProd');
                    const tClose = document.getElementById('rptClose');
                    
                    let idx = 0;
                    
                    const showNext = () => {
                        const p = purchases[idx];
                        if (!p) return;
                        
                        tAva.textContent = (p.customer_name || 'K').charAt(0);
                        tName.textContent = p.customer_name || 'Khách hàng';
                        tSub.textContent = `vừa ${p.verb || 'mua'} thành công`;
                        
                        tProd.textContent = p.product_name || 'Sản phẩm';
                        tProd.href = p.product_url || '#';
                        
                        toast.classList.add('show');
                        idx = (idx + 1) % purchases.length;
                        
                        setTimeout(() => {
                            toast.classList.remove('show');
                        }, 5000);
                    };

                    if (tClose) {
                        tClose.addEventListener('click', () => toast.classList.remove('show'));
                    }

                    // Loop toast notification on mobile
                    setTimeout(showNext, 2000);
                    setInterval(showNext, 12000);
                }
            }
        });
    </script>
@endpush
