@extends('layouts.app')

@section('title', $product->name . ' - AiCuaToi.com')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        :root {
            --tech-primary: #818cf8;
            --tech-primary-glow: rgba(129, 140, 248, 0.2);
            --tech-secondary: #2dd4bf;
            --tech-bg: #0b0f19;
            --tech-card-bg: #111827;
            --tech-text-main: #f3f4f6;
            --tech-text-muted: #9ca3af;
            --tech-border: #1f2937;
        }

        .tech-wrapper {
            background-color: var(--tech-bg);
            background-image: radial-gradient(rgba(129, 140, 248, 0.04) 1px, transparent 0), radial-gradient(rgba(45, 212, 191, 0.04) 1px, transparent 0);
            background-size: 24px 24px;
            background-position: 0 0, 12px 12px;
            padding: 50px 0;
            min-height: 100vh;
            color: var(--tech-text-main);

            /* Desktop Banner Variables */
            --banner-card-bg: var(--tech-card-bg);
            --banner-card-border: var(--tech-border);
            --banner-card-title: var(--tech-text-main);
            --banner-card-subtitle: var(--tech-text-muted);
            --banner-card-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            --banner-card-hover-shadow: 0 20px 50px rgba(129, 140, 248, 0.06);
            --banner-card-hover-border: var(--tech-primary);
            --banner-icon-bg-zalo: rgba(59, 130, 246, 0.15);
            --banner-icon-color-zalo: #818cf8;
            --banner-icon-bg-fb: rgba(24, 119, 242, 0.15);
            --banner-icon-color-fb: #818cf8;
            --banner-icon-bg-admin: rgba(45, 212, 191, 0.15);
            --banner-icon-color-admin: #2dd4bf;
        }

        .tech-card {
            background: var(--tech-card-bg);
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            border: 1px solid var(--tech-border);
            transition: all 0.3s ease;
        }

        .tech-card:hover {
            box-shadow: 0 20px 50px rgba(129, 140, 248, 0.06);
            border-color: rgba(129, 140, 248, 0.25);
        }

        .product-detail-image {
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--tech-border);
        }

        .product-detail-image:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 45px rgba(129, 140, 248, 0.15);
        }

        .tech-badge {
            background: rgba(129, 140, 248, 0.04);
            border: 1px solid rgba(129, 140, 248, 0.12);
            color: var(--tech-text-main);
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            cursor: default;
            transition: all 0.2s ease;
        }

        .tech-badge:hover {
            background: rgba(129, 140, 248, 0.08);
            transform: translateY(-2px);
        }

        .tech-badge i {
            font-size: 1.8rem;
            color: var(--tech-primary);
            margin-right: 18px;
            flex-shrink: 0;
        }

        .btn-buy-primary {
            background: linear-gradient(135deg, var(--tech-primary) 0%, #3b82f6 100%);
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            padding: 14px 30px;
            box-shadow: 0 8px 20px rgba(129, 140, 248, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(129, 140, 248, 0.45);
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
            color: var(--tech-text-muted);
            border: 1px solid var(--tech-border);
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
            background: #1f2937;
            color: #ffffff;
            border-color: var(--tech-text-muted);
        }

        .tech-tab.nav-link {
            border: 1px solid var(--tech-border) !important;
            background: var(--tech-card-bg) !important;
            color: var(--tech-text-muted) !important;
            border-radius: 16px;
            padding: 15px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.01);
        }

        .tech-tab.nav-link i {
            font-size: 18px;
            color: var(--tech-text-muted) !important;
            margin: 0 !important;
        }

        .tech-tab.nav-link:hover {
            transform: translateY(-2px);
            background: #1f2937 !important;
            color: var(--tech-primary) !important;
            border-color: rgba(129, 140, 248, 0.3) !important;
        }

        .tech-tab.nav-link.active {
            background: linear-gradient(135deg, var(--tech-primary) 0%, #3b82f6 100%) !important;
            color: white !important;
            border-color: transparent !important;
            box-shadow: 0 8px 20px var(--tech-primary-glow) !important;
        }

        .tech-tab.nav-link.active i {
            color: white !important;
        }

        .spec-item-box {
            background: rgba(31, 41, 55, 0.4);
            border: 1px solid var(--tech-border);
            border-radius: 16px;
            padding: 18px 20px;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s ease;
        }
        .spec-item-box:hover {
            background: var(--tech-card-bg);
            border-color: rgba(129, 140, 248, 0.3);
            box-shadow: 0 4px 12px rgba(129, 140, 248, 0.05);
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
        .tech-wrapper .card {
            background: var(--tech-card-bg) !important;
            border: 1px solid var(--tech-border) !important;
            color: var(--tech-text-main) !important;
        }
        .tech-wrapper .bg-light, 
        .tech-wrapper .card.bg-light {
            background: rgba(31, 41, 55, 0.5) !important;
            border: 1px solid var(--tech-border) !important;
            color: var(--tech-text-main) !important;
        }
        .tech-wrapper .text-muted {
            color: var(--tech-text-muted) !important;
        }
        .tech-wrapper h1, 
        .tech-wrapper h2, 
        .tech-wrapper h3, 
        .tech-wrapper h4, 
        .tech-wrapper h5, 
        .tech-wrapper h6, 
        .tech-wrapper strong {
            color: var(--tech-text-main) !important;
        }
        .tech-wrapper .text-dark {
            color: var(--tech-text-main) !important;
        }
        .tech-wrapper .text-primary {
            color: var(--tech-primary) !important;
        }
        .tech-wrapper .breadcrumb-item a {
            color: var(--tech-primary) !important;
        }
        .tech-wrapper .breadcrumb-item a:hover {
            color: #ffffff !important;
            text-decoration: underline !important;
        }
        .tech-wrapper .breadcrumb-item.active {
            color: var(--tech-text-muted) !important;
        }
        .tech-wrapper .breadcrumb-item::before {
            color: var(--tech-text-muted) !important;
        }
        .tech-wrapper .form-control {
            background-color: rgba(17, 24, 39, 0.8) !important;
            border: 1px solid var(--tech-border) !important;
            color: var(--tech-text-main) !important;
        }
        .tech-wrapper .form-control::placeholder {
            color: #6b7280 !important;
        }
        .tech-wrapper .form-control:focus {
            background-color: var(--tech-card-bg) !important;
            border-color: var(--tech-primary) !important;
            box-shadow: 0 0 0 3px var(--tech-primary-glow) !important;
        }
        .tech-wrapper .border-bottom {
            border-color: var(--tech-border) !important;
        }
        .tech-wrapper .alert-success {
            background: rgba(16, 185, 129, 0.1) !important;
            color: #34d399 !important;
            border: none !important;
        }
        .tech-wrapper .alert-danger {
            background: rgba(239, 68, 68, 0.1) !important;
            color: #f87171 !important;
            border: none !important;
        }
        .tech-wrapper .alert-info {
            background: rgba(59, 130, 246, 0.1) !important;
            color: #60a5fa !important;
            border: none !important;
        }
        .tech-wrapper .alert-warning {
            background: rgba(245, 158, 11, 0.1) !important;
            color: #fbbf24 !important;
            border: none !important;
        }

        @media (max-width: 768px) {
            .tech-wrapper {
                padding: 20px 0;
            }
            .tech-card {
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
            .tech-tab.nav-link {
                padding: 12px 16px;
                min-width: 110px;
                border-radius: 12px;
            }
            .tech-badge {
                padding: 14px 16px;
                border-radius: 12px;
                gap: 12px;
            }
            .tech-badge i {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
<div class="tech-wrapper">
    <div class="container py-2" style="margin-top: 50px;">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-down">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--tech-primary); font-weight: 600; text-decoration: none;">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" style="color: var(--tech-primary); font-weight: 600; text-decoration: none;">Cửa hàng</a></li>
                <li class="breadcrumb-item active" style="color: var(--tech-text-main); font-weight: 700;">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="tech-card">
                    <img src="{{ $product->image ?? 'https://via.placeholder.com/600' }}" 
                         class="img-fluid product-detail-image w-100" 
                         alt="{{ $product->name }}">
                    @include('products.partials.desktop_banners')
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="tech-card">
                    <span class="badge mb-3" style="font-size: 13px; font-weight: 700; background: rgba(129, 140, 248, 0.12); color: var(--tech-primary); border-radius: 30px; padding: 6px 16px; border: 1px solid rgba(129, 140, 248, 0.2);">
                        <i class="fas fa-microchip me-1"></i> {{ strtoupper($product->category) }}
                    </span>
                    <h1 class="fw-bold mb-3" style="color: var(--tech-text-main); font-size: 2rem;">{{ $product->name }}</h1>
                    <p class="lead text-muted mb-4" style="font-size: 1rem; line-height: 1.6;">{{ Str::limit($product->description, 150, '......') }}</p>
                    
                    <div class="mb-4 p-4 rounded-4" style="background: rgba(129, 140, 248, 0.05); border: 1px solid rgba(129, 140, 248, 0.1);">
                        <div class="d-flex align-items-end gap-3 flex-wrap">
                            <h2 class="fw-bold mb-0" style="color: var(--tech-primary); font-size: 2.2rem;">{{ $product->formatted_price }}</h2>
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
                            <div class="alert alert-success d-inline-flex align-items-center mb-0 py-2 px-3 border-0" style="font-weight: 600;">
                                <i class="fas fa-check-circle me-2"></i> Còn hàng ({{ $product->stock }} sản phẩm)
                            </div>
                            <small class="text-muted"><i class="far fa-clock me-1"></i>Giao hàng / Kích hoạt nhanh chóng</small>
                        </div>
                    @else
                        <div class="alert alert-danger d-inline-flex align-items-center mb-4 py-2 px-3 border-0" style="font-weight: 600;">
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

                </div>
            </div>
        </div>

        <!-- Tech Specs Block -->
        <div class="row mt-4" data-aos="fade-up">
            <div class="col-12">
                <div class="tech-card">
                    <h5 class="fw-bold mb-4" style="color: var(--tech-text-main);"><i class="fas fa-cogs me-2 text-primary"></i>Thông Số Kỹ Thuật</h5>
                    @if($product->specs && count(array_filter($product->specs)) > 0)
                        <div class="row g-3">
                            @foreach($product->specs as $key => $value)
                                @if(!empty($value))
                                <div class="col-md-6 col-lg-4">
                                    <div class="spec-item-box">
                                        <span class="text-muted me-2" style="font-weight: 500;">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span>
                                        <strong class="text-light text-end" style="font-weight: 700; color: var(--tech-text-main) !important;">{{ is_array($value) ? implode(', ', $value) : $value }}</strong>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-warning mb-0" style="background: rgba(245, 158, 11, 0.08); color: #d97706; border: none; border-radius: 12px;">
                            <i class="fas fa-info-circle me-2"></i>
                            Chưa có thông tin thông số kỹ thuật cho sản phẩm này.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs nav-fill border-0 mb-4 gap-2" id="productTabs" role="tablist" data-aos="fade-up">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link tech-tab active" id="features-tab" data-bs-toggle="tab" 
                                data-bs-target="#features" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-microchip"></i>
                            <span>Tính Năng</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link tech-tab" id="description-tab" data-bs-toggle="tab" 
                                data-bs-target="#description" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-list-alt"></i>
                            <span>Mô Tả</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link tech-tab" id="reviews-tab" data-bs-toggle="tab" 
                                data-bs-target="#reviews" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-comments"></i>
                            <span>Đánh Giá</span>
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="productTabsContent">
                    <!-- Features Tab -->
                    <div class="tab-pane fade show active" id="features" role="tabpanel" data-aos="fade-up">
                        <div class="tech-card">
                            <h4 class="fw-bold mb-4" style="color: var(--tech-text-main);">
                                <i class="fas fa-star text-warning me-2"></i>Tính Năng Nổi Bật
                            </h4>
                            @if($product->features && $product->features->count() > 0)
                            <div class="row g-3">
                                @php
                                $defaultColors = [
                                    '#818cf8', // Indigo
                                    '#2dd4bf', // Teal
                                    '#60a5fa', // Blue
                                    '#34d399', // Emerald
                                    '#fbbf24', // Amber
                                    '#f472b6', // Pink
                                ];
                                @endphp
                                @foreach($product->features as $index => $feature)
                                @php
                                $color = $feature->color ?? $defaultColors[$index % count($defaultColors)];
                                @endphp
                                <div class="col-md-6">
                                    <div class="tech-badge" style="border-left: 4px solid {{ $color }};">
                                        <i class="{{ $feature->icon }}" style="color: {{ $color }};"></i>
                                        <div>
                                            <strong style="color: var(--tech-text-main);">{{ $feature->name }}</strong><br>
                                            @if($feature->description)
                                            <small class="text-muted" style="font-size: 0.8rem;">{{ $feature->description }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="alert alert-info border-0" style="font-weight: 600;">
                                <i class="fas fa-info-circle me-2"></i>
                                Chưa có thông tin tính năng nổi bật cho sản phẩm này.
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Description Tab -->
                    <div class="tab-pane fade" id="description" role="tabpanel" data-aos="fade-up">
                        <div class="tech-card">
                            <h4 class="fw-bold mb-4" style="color: var(--tech-text-main);">
                                <i class="fas fa-align-left text-info me-2"></i>Mô Tả Chi Tiết
                            </h4>
                            <div class="description-content" style="line-height: 1.8; color: #d1d5db;">{!! nl2br(e($product->description)) !!}</div>
                            <hr class="my-4" style="border-color: var(--tech-border);">
                            <div class="alert alert-info border-0 rounded-4" style="font-weight: 600;">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Lưu ý:</strong> Sản phẩm công nghệ được kiểm tra kỹ lưỡng trước khi giao hàng. 
                                Hỗ trợ nhanh chóng qua nhóm hỗ trợ hoặc box chat trực tiếp của chúng tôi.
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
