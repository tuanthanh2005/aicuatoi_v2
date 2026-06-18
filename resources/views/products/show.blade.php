@extends('layouts.app')

@section('title', $product->name . ' - AiCuaToi.com')
@section('meta_description', Str::limit(strip_tags($product->description), 160))
@section('og_image', asset($product->image))
@section('canonical', route('product.show', $product->slug))

@push('head')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->name,
            'description' => Str::limit(strip_tags($product->description), 300),
            'image' => asset($product->image),
            'url' => route('product.show', $product->slug),
            'brand' => [
                '@type' => 'Brand',
                'name' => 'AiCuaToi.com',
            ],
            'offers' => [
                '@type' => 'Offer',
                'url' => route('product.show', $product->slug),
                'priceCurrency' => 'VND',
                'price' => (float) $product->effective_price,
                'availability' => $product->isInStock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        :root {
            --emerald-primary: #10b981;
            --emerald-primary-glow: rgba(16, 185, 129, 0.2);
            --emerald-secondary: #059669;
            --emerald-bg: #0b1329;
            --emerald-card-bg: #1e293b;
            --emerald-text-main: #f8fafc;
            --emerald-text-muted: #94a3b8;
            --emerald-border: #334155;
        }

        .emerald-wrapper {
            background-color: var(--emerald-bg);
            background-image: radial-gradient(rgba(16, 185, 129, 0.04) 1px, transparent 0), radial-gradient(rgba(148, 163, 184, 0.04) 1px, transparent 0);
            background-size: 24px 24px;
            background-position: 0 0, 12px 12px;
            padding: 50px 0;
            min-height: 100vh;
            color: var(--emerald-text-main);

            /* Desktop Banner Variables */
            --banner-card-bg: var(--emerald-card-bg);
            --banner-card-border: var(--emerald-border);
            --banner-card-title: var(--emerald-text-main);
            --banner-card-subtitle: var(--emerald-text-muted);
            --banner-card-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            --banner-card-hover-shadow: 0 20px 50px rgba(16, 185, 129, 0.06);
            --banner-card-hover-border: var(--emerald-primary);
            --banner-icon-bg-zalo: rgba(16, 185, 129, 0.15);
            --banner-icon-color-zalo: #10b981;
            --banner-icon-bg-fb: rgba(24, 119, 242, 0.15);
            --banner-icon-color-fb: #10b981;
            --banner-icon-bg-admin: rgba(6, 182, 212, 0.15);
            --banner-icon-color-admin: #06b6d4;
        }

        .emerald-card {
            background: var(--emerald-card-bg);
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--emerald-border);
            transition: all 0.3s ease;
        }

        .emerald-card:hover {
            box-shadow: 0 20px 50px rgba(16, 185, 129, 0.06);
            border-color: rgba(16, 185, 129, 0.25);
        }

        .product-detail-image {
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--emerald-border);
        }

        .product-detail-image:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 45px rgba(16, 185, 129, 0.15);
        }

        .info-badge {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid var(--emerald-border);
            color: var(--emerald-text-main);
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            cursor: default;
            transition: all 0.2s ease;
        }

        .info-badge:hover {
            background: rgba(30, 41, 59, 0.8);
            transform: translateY(-2px);
        }

        .info-badge i {
            font-size: 1.8rem;
            color: var(--emerald-primary);
            margin-right: 18px;
            flex-shrink: 0;
        }

        .btn-buy-primary {
            background: linear-gradient(135deg, var(--emerald-primary) 0%, #059669 100%);
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            padding: 14px 30px;
            box-shadow: 0 8px 20px var(--emerald-primary-glow);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(16, 185, 129, 0.3);
            color: white;
        }

        .btn-buy-secondary {
            background: #facc15;
            color: #0f172a;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            padding: 14px 28px;
            box-shadow: 0 8px 20px rgba(250, 204, 21, 0.25);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(250, 204, 21, 0.4);
            color: #0f172a;
        }

        .btn-buy-outline {
            background: transparent;
            color: var(--emerald-text-muted);
            border: 1px solid var(--emerald-border);
            font-weight: 600;
            border-radius: 50px;
            padding: 14px 28px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-outline:hover {
            transform: translateY(-2px);
            background: #334155;
            color: var(--emerald-text-main);
            border-color: var(--emerald-text-muted);
        }

        .emerald-tab.nav-link {
            border: 1px solid var(--emerald-border) !important;
            background: var(--emerald-card-bg) !important;
            color: var(--emerald-text-muted) !important;
            border-radius: 16px;
            padding: 15px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.01);
        }

        .emerald-tab.nav-link i {
            font-size: 18px;
            color: var(--emerald-text-muted) !important;
            margin: 0 !important;
        }

        .emerald-tab.nav-link:hover {
            transform: translateY(-2px);
            background: #334155 !important;
            color: var(--emerald-primary) !important;
            border-color: rgba(16, 185, 129, 0.2) !important;
        }

        .emerald-tab.nav-link.active {
            background: linear-gradient(135deg, var(--emerald-primary) 0%, #059669 100%) !important;
            color: white !important;
            border-color: transparent !important;
            box-shadow: 0 8px 20px var(--emerald-primary-glow) !important;
        }

        .emerald-tab.nav-link.active i {
            color: white !important;
        }

        .spec-item-box {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid var(--emerald-border);
            border-radius: 16px;
            padding: 18px 20px;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s ease;
        }
        .spec-item-box:hover {
            background: var(--emerald-card-bg);
            border-color: rgba(16, 185, 129, 0.25);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.05);
        }

        .rating-input {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
        }
        .rating-input input {
            display: none;
        }
        .rating-input label {
            cursor: pointer;
            font-size: 28px;
            color: #4b5563;
            transition: color 0.2s;
        }
        .rating-input label:hover,
        .rating-input label:hover ~ label,
        .rating-input input:checked ~ label {
            color: #ffc107;
        }

        /* --- DARK THEME OVERRIDES FOR GENERAL DOM ELEMENTS IN CONTAINER --- */
        .emerald-wrapper .card {
            background: var(--emerald-card-bg) !important;
            border: 1px solid var(--emerald-border) !important;
            color: var(--emerald-text-main) !important;
        }
        .emerald-wrapper .bg-light, 
        .emerald-wrapper .card.bg-light {
            background: rgba(30, 41, 59, 0.5) !important;
            border: 1px solid var(--emerald-border) !important;
            color: var(--emerald-text-main) !important;
        }
        .emerald-wrapper .text-muted {
            color: var(--emerald-text-muted) !important;
        }
        .emerald-wrapper h1, 
        .emerald-wrapper h2, 
        .emerald-wrapper h3, 
        .emerald-wrapper h4, 
        .emerald-wrapper h5, 
        .emerald-wrapper h6, 
        .emerald-wrapper strong {
            color: var(--emerald-text-main) !important;
        }
        .emerald-wrapper .text-dark {
            color: var(--emerald-text-main) !important;
        }
        .emerald-wrapper .text-primary {
            color: var(--emerald-primary) !important;
        }
        .emerald-wrapper .breadcrumb-item a {
            color: var(--emerald-primary) !important;
        }
        .emerald-wrapper .breadcrumb-item a:hover {
            color: #ffffff !important;
            text-decoration: underline !important;
        }
        .emerald-wrapper .breadcrumb-item.active {
            color: var(--emerald-text-muted) !important;
        }
        .emerald-wrapper .breadcrumb-item::before {
            color: var(--emerald-text-muted) !important;
        }
        .emerald-wrapper .form-control {
            background-color: rgba(15, 23, 42, 0.8) !important;
            border: 1px solid var(--emerald-border) !important;
            color: var(--emerald-text-main) !important;
        }
        .emerald-wrapper .form-control::placeholder {
            color: #64748b !important;
        }
        .emerald-wrapper .form-control:focus {
            background-color: var(--emerald-card-bg) !important;
            border-color: var(--emerald-primary) !important;
            box-shadow: 0 0 0 3px var(--emerald-primary-glow) !important;
        }
        .emerald-wrapper .border-bottom {
            border-color: var(--emerald-border) !important;
        }
        .emerald-wrapper .border-top {
            border-color: var(--emerald-border) !important;
        }
        .emerald-wrapper .alert-success {
            background: rgba(16, 185, 129, 0.1) !important;
            color: #34d399 !important;
            border: none !important;
        }
        .emerald-wrapper .alert-danger {
            background: rgba(239, 68, 68, 0.1) !important;
            color: #f87171 !important;
            border: none !important;
        }
        .emerald-wrapper .alert-info {
            background: rgba(59, 130, 246, 0.1) !important;
            color: #60a5fa !important;
            border: none !important;
        }
        .emerald-wrapper .alert-warning {
            background: rgba(245, 158, 11, 0.1) !important;
            color: #fbbf24 !important;
            border: none !important;
        }

        @media (max-width: 768px) {
            .emerald-wrapper {
                padding: 20px 0;
            }
            .emerald-card {
                padding: 20px;
                border-radius: 18px;
            }
            .product-detail-image {
                border-radius: 14px;
            }
            h1.fw-bold {
                font-size: 1.5rem;
            }
            .lead.text-muted {
                font-size: 0.92rem;
            }
            .d-flex.gap-3.mb-3 {
                gap: 12px !important;
                flex-direction: column;
            }
            .btn-buy-primary, .btn-buy-secondary, .btn-buy-outline {
                width: 100%;
                padding: 12px 20px;
                font-size: 0.95rem;
                border-radius: 30px;
            }
            .nav-tabs.nav-fill {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 8px;
                -webkit-overflow-scrolling: touch;
            }
            .nav-tabs.nav-fill::-webkit-scrollbar {
                display: none;
            }
            .emerald-tab.nav-link {
                padding: 12px 16px;
                min-width: 110px;
                border-radius: 12px;
            }
            .info-badge {
                padding: 14px 16px;
                border-radius: 12px;
                gap: 12px;
            }
            .info-badge i {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
<div class="emerald-wrapper">
    <div class="container py-2" style="margin-top: 50px;">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-down">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--emerald-primary); font-weight: 600; text-decoration: none;">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" style="color: var(--emerald-primary); font-weight: 600; text-decoration: none;">Cửa hàng</a></li>
                <li class="breadcrumb-item active" style="color: var(--emerald-text-main); font-weight: 700;">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="emerald-card">
                    <img src="{{ $product->image ?? 'https://via.placeholder.com/600' }}" 
                         class="img-fluid product-detail-image w-100" 
                         alt="{{ $product->name }}">
                    @include('products.partials.desktop_banners')
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="emerald-card">
                    <span class="badge mb-3" style="font-size: 13px; font-weight: 700; background: rgba(16, 185, 129, 0.08); color: var(--emerald-primary); border-radius: 30px; padding: 6px 16px; border: 1px solid rgba(16, 185, 129, 0.12);">
                        <i class="fas fa-cube me-1"></i> {{ strtoupper($product->category) }}
                    </span>
                    <h1 class="fw-bold mb-3" style="color: var(--emerald-text-main); font-size: 2rem;">{{ $product->name }}</h1>
                    <p class="lead text-muted mb-4" style="font-size: 1rem; line-height: 1.6;">{{ Str::limit($product->description, 150, '......') }}</p>
                    
                    <div class="mb-4 p-4 rounded-4" style="background: rgba(16, 185, 129, 0.05); border: 1px solid rgba(16, 185, 129, 0.1);">
                        <div class="d-flex align-items-end gap-3 flex-wrap">
                            <h2 class="fw-bold mb-0" style="color: var(--emerald-primary); font-size: 2.2rem;">{{ $product->formatted_price }}</h2>
                            @if($product->is_on_sale)
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="text-muted text-decoration-line-through" style="font-size: 1.1rem;">{{ $product->formatted_original_price }}</span>
                                    <span class="badge bg-danger rounded-pill px-2.5 py-1" style="font-size: 0.8rem; font-weight: 700;">-{{ $product->discount_percent }}%</span>
                                </div>
                            @endif
                        </div>
                        <div class="mt-2 text-muted" style="font-size: 0.82rem;"><i class="fas fa-info-circle me-1"></i>Giá đã bao gồm VAT</div>
                    </div>
                    
                    @if($product->stock > 0)
                        <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                            <div class="alert alert-success d-inline-flex align-items-center mb-0 py-2 px-3 border-0" style="background: rgba(16, 185, 129, 0.08); color: #10b981; border-radius: 12px; font-weight: 600;">
                                <i class="fas fa-check-circle me-2"></i> Còn hàng ({{ $product->stock }} sản phẩm)
                            </div>
                            <small class="text-muted"><i class="far fa-clock me-1"></i>Giao hàng nhanh chóng</small>
                        </div>
                    @else
                        <div class="alert alert-danger d-inline-flex align-items-center mb-4 py-2 px-3 border-0" style="background: rgba(239, 68, 68, 0.08); color: #ef4444; border-radius: 12px; font-weight: 600;">
                            <i class="fas fa-times-circle me-2"></i> Hết hàng
                        </div>
                    @endif
                    
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="d-flex gap-3 mb-3 flex-wrap">
                            <button type="submit" class="btn btn-buy-primary shadow">
                                <i class="fas fa-shopping-cart"></i> Thêm vào giỏ
                            </button>
                            @if($product->delivery_type === 'digital')
                            <button type="submit" formaction="{{ route('cart.buy-now', $product->id) }}" class="btn btn-buy-secondary shadow">
                                <i class="fas fa-bolt"></i> Mua ngay
                            </button>
                            @endif
                            <a href="{{ route('shop') }}" class="btn btn-buy-outline">
                                <i class="fas fa-arrow-left"></i> Tiếp tục mua
                            </a>
                        </div>
                    </form>

                    <div class="mt-5">
                        <h5 class="fw-bold mb-3"><i class="fas fa-star text-warning me-1"></i> Ưu điểm nổi bật</h5>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="info-badge">
                                    <i class="fas fa-shield-alt"></i>
                                    <div>
                                        <strong>Chính hãng 100%</strong><br>
                                        <small class="text-muted">Cam kết chất lượng</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-badge">
                                    <i class="fas fa-tools"></i>
                                    <div>
                                        <strong>Bảo hành 12 tháng</strong><br>
                                        <small class="text-muted">Lỗi đổi mới hoàn toàn</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-badge">
                                    <i class="fas fa-shipping-fast"></i>
                                    <div>
                                        <strong>Giao hàng siêu tốc</strong><br>
                                        <small class="text-muted">Toàn quốc nhanh chóng</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-badge">
                                    <i class="fas fa-headset"></i>
                                    <div>
                                        <strong>Hỗ trợ tận tâm</strong><br>
                                        <small class="text-muted">Tư vấn, setup 24/7</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs nav-fill border-0 mb-4 gap-2" id="productTabs" role="tablist" data-aos="fade-up">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link emerald-tab active" id="features-tab" data-bs-toggle="tab" 
                                data-bs-target="#features" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-star"></i>
                            <span>Tính Năng</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link emerald-tab" id="description-tab" data-bs-toggle="tab" 
                                data-bs-target="#description" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-list-alt"></i>
                            <span>Mô Tả</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link emerald-tab" id="reviews-tab" data-bs-toggle="tab" 
                                data-bs-target="#reviews" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-comments"></i>
                            <span>Đánh Giá</span>
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="productTabsContent">
                    <!-- Features Tab -->
                    <div class="tab-pane fade show active" id="features" role="tabpanel" data-aos="fade-up">
                        <div class="emerald-card">
                            <h4 class="fw-bold mb-4" style="color: var(--emerald-text-main);">
                                <i class="fas fa-star text-warning me-2"></i>Tính Năng Nổi Bật
                            </h4>
                            @if($product->features && $product->features->count() > 0)
                                <div class="row g-3">
                                    @foreach($product->features as $feature)
                                        <div class="col-md-6">
                                            <div class="info-badge" style="border-left: 4px solid {{ $feature->color ?? 'var(--emerald-primary)' }};">
                                                <i class="{{ $feature->icon }}" style="color: {{ $feature->color ?? 'var(--emerald-primary)' }};"></i>
                                                <div>
                                                    <strong style="color: var(--emerald-text-main);">{{ $feature->name }}</strong><br>
                                                    @if($feature->description)
                                                        <small class="text-muted" style="font-size: 0.82rem;">{{ $feature->description }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info border-0" style="background: rgba(16, 185, 129, 0.08); color: var(--emerald-primary); border-radius: 12px;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Chưa có thông tin tính năng nổi bật cho sản phẩm này.
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Description Tab -->
                    <div class="tab-pane fade" id="description" role="tabpanel" data-aos="fade-up">
                        <div class="emerald-card">
                            <h4 class="fw-bold mb-4" style="color: var(--emerald-text-main);">
                                <i class="fas fa-align-left text-primary me-2"></i>Mô Tả Chi Tiết
                            </h4>
                            <div class="description-content mb-4" style="line-height: 1.8; color: var(--emerald-text-muted);">{!! nl2br(e($product->description)) !!}</div>
                            
                            <div class="border-top pt-4 mt-4" style="border-color: var(--emerald-border);">
                                <h5 class="fw-bold mb-4" style="color: var(--emerald-text-main);">
                                    <i class="fas fa-cube me-2 text-primary"></i>Thông Số Kỹ Thuật
                                </h5>
                                <div class="row g-3">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="spec-item-box">
                                            <span class="text-muted" style="font-weight: 500;"><i class="fas fa-list-ul me-1"></i> Danh mục:</span>
                                            <strong class="text-dark">{{ strtoupper($product->category) }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="spec-item-box">
                                            <span class="text-muted" style="font-weight: 500;"><i class="fas fa-barcode me-1"></i> SKU:</span>
                                            <strong class="text-dark">#{{ $product->id }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="spec-item-box">
                                            <span class="text-muted" style="font-weight: 500;"><i class="fas fa-check-circle me-1"></i> Tình trạng:</span>
                                            <strong class="text-dark">{{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}</strong>
                                        </div>
                                    </div>
                                </div>

                                @if($product->specs)
                                    <div class="row g-3 mt-1">
                                        @foreach($product->specs as $key => $value)
                                            <div class="col-md-6 col-lg-4">
                                                <div class="spec-item-box">
                                                    <span class="text-muted" style="font-weight: 500;"><i class="fas fa-info-circle me-1"></i> {{ ucfirst(str_replace('_', ' ', $key)) }}:</span>
                                                    <strong class="text-dark">{{ is_array($value) ? implode(', ', $value) : $value }}</strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="border-top pt-4 mt-4" style="border-color: var(--emerald-border);">
                                <h5 class="fw-bold mb-4" style="color: var(--emerald-text-main);">
                                    <i class="fas fa-box-open me-2 text-primary"></i>Thông Tin Thêm
                                </h5>
                                <div class="row g-3">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="spec-item-box">
                                            <span class="text-muted" style="font-weight: 500;">Bảo hành:</span>
                                            <strong class="text-dark">12 tháng</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="spec-item-box">
                                            <span class="text-muted" style="font-weight: 500;">Thanh toán:</span>
                                            <strong class="text-dark">Banking, MoMo</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="spec-item-box">
                                            <span class="text-muted" style="font-weight: 500;">Giao hàng:</span>
                                            <strong class="text-dark">Toàn quốc / 24h</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="spec-item-box">
                                            <span class="text-muted" style="font-weight: 500;">Đổi trả:</span>
                                            <strong class="text-dark">7 ngày</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-info mt-4 border-0 rounded-4" style="background: rgba(59, 130, 246, 0.08); color: #3b82f6; border-radius: 16px; font-weight: 600;">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Lưu ý:</strong> Sản phẩm được hỗ trợ cài đặt và setup đầy đủ. Quý khách vui lòng liên hệ admin nếu cần hỗ trợ thêm thông tin chi tiết.
                            </div>
                        </div>
                    </div>

                    @include('products.partials.reviews', ['product' => $product, 'averageRating' => $averageRating, 'totalReviews' => $totalReviews])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
@endpush
