@extends('layouts.app')

@section('title', $product->name . ' - AiCuaToi.com')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        :root {
            --fashion-primary: #fb7185;
            --fashion-primary-glow: rgba(251, 113, 133, 0.2);
            --fashion-secondary: #fb923c;
            --fashion-bg: #120e0e;
            --fashion-card-bg: #1c1917;
            --fashion-text-main: #f5f5f4;
            --fashion-text-muted: #a8a29e;
            --fashion-border: #292524;
        }

        .fashion-wrapper {
            background-color: var(--fashion-bg);
            background-image: radial-gradient(rgba(251, 113, 133, 0.04) 1px, transparent 0), radial-gradient(rgba(251, 146, 60, 0.04) 1px, transparent 0);
            background-size: 24px 24px;
            background-position: 0 0, 12px 12px;
            padding: 50px 0;
            min-height: 100vh;
            color: var(--fashion-text-main);

            /* Desktop Banner Variables */
            --banner-card-bg: var(--fashion-card-bg);
            --banner-card-border: var(--fashion-border);
            --banner-card-title: var(--fashion-text-main);
            --banner-card-subtitle: var(--fashion-text-muted);
            --banner-card-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            --banner-card-hover-shadow: 0 20px 50px rgba(251, 113, 133, 0.06);
            --banner-card-hover-border: var(--fashion-primary);
            --banner-icon-bg-zalo: rgba(251, 113, 133, 0.15);
            --banner-icon-color-zalo: #fb7185;
            --banner-icon-bg-fb: rgba(24, 119, 242, 0.15);
            --banner-icon-color-fb: #fb7185;
            --banner-icon-bg-admin: rgba(251, 146, 60, 0.15);
            --banner-icon-color-admin: #fb923c;
        }

        .fashion-card {
            background: var(--fashion-card-bg);
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--fashion-border);
            transition: all 0.3s ease;
        }

        .fashion-card:hover {
            box-shadow: 0 20px 50px rgba(251, 113, 133, 0.06);
            border-color: rgba(251, 113, 133, 0.25);
        }

        .product-detail-image {
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--fashion-border);
        }

        .product-detail-image:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 45px rgba(251, 113, 133, 0.12);
        }

        .size-selector {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .size-btn {
            width: 48px;
            height: 48px;
            border: 1.5px solid var(--fashion-border);
            background: #292524;
            border-radius: 12px;
            font-weight: 700;
            color: var(--fashion-text-main);
            transition: all 0.25s ease;
        }

        .size-btn:hover {
            border-color: var(--fashion-primary);
            color: var(--fashion-primary);
            background: rgba(251, 113, 133, 0.04);
        }

        .size-btn.active {
            background: var(--fashion-primary);
            color: #ffffff;
            border-color: var(--fashion-primary);
            box-shadow: 0 4px 12px var(--fashion-primary-glow);
            transform: translateY(-2px);
        }

        .color-selector {
            display: flex;
            gap: 15px;
        }

        .color-option {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 3px solid transparent;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.3);
        }

        .color-option:hover {
            transform: scale(1.1);
        }

        .color-option.active {
            border-color: var(--fashion-primary);
            transform: scale(1.15);
            box-shadow: 0 4px 12px rgba(251, 113, 133, 0.25);
        }

        .fashion-badge {
            background: rgba(251, 113, 133, 0.04);
            border: 1px solid rgba(251, 113, 133, 0.12);
            color: var(--fashion-text-main);
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            cursor: default;
            transition: all 0.2s ease;
        }

        .fashion-badge:hover {
            background: rgba(251, 113, 133, 0.08);
            transform: translateY(-2px);
        }

        .fashion-badge i {
            font-size: 1.8rem;
            color: var(--fashion-primary);
            margin-right: 18px;
            flex-shrink: 0;
        }

        .btn-buy-primary {
            background: linear-gradient(135deg, var(--fashion-primary) 0%, var(--fashion-secondary) 100%);
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            padding: 14px 30px;
            box-shadow: 0 8px 20px var(--fashion-primary-glow);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(251, 113, 133, 0.4);
            color: white;
        }

        .btn-buy-secondary {
            background: #f5f5f4;
            color: #1c1917;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            padding: 14px 28px;
            box-shadow: 0 8px 20px rgba(245, 245, 244, 0.15);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(245, 245, 244, 0.25);
            color: #1c1917;
        }

        .btn-buy-outline {
            background: transparent;
            color: var(--fashion-text-muted);
            border: 1px solid var(--fashion-border);
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
            background: #292524;
            color: #ffffff;
            border-color: var(--fashion-text-muted);
        }

        .fashion-tab.nav-link {
            border: 1px solid var(--fashion-border) !important;
            background: var(--fashion-card-bg) !important;
            color: var(--fashion-text-muted) !important;
            border-radius: 16px;
            padding: 15px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.01);
        }

        .fashion-tab.nav-link i {
            font-size: 18px;
            color: var(--fashion-text-muted) !important;
        }

        .fashion-tab.nav-link:hover {
            transform: translateY(-2px);
            background: #292524 !important;
            color: var(--fashion-primary) !important;
            border-color: rgba(251, 113, 133, 0.3) !important;
        }

        .fashion-tab.nav-link.active {
            background: linear-gradient(135deg, var(--fashion-primary) 0%, var(--fashion-secondary) 100%) !important;
            color: white !important;
            border-color: transparent !important;
            box-shadow: 0 8px 20px var(--fashion-primary-glow) !important;
        }

        .fashion-tab.nav-link.active i {
            color: white !important;
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
        .fashion-wrapper .card {
            background: var(--fashion-card-bg) !important;
            border: 1px solid var(--fashion-border) !important;
            color: var(--fashion-text-main) !important;
        }
        .fashion-wrapper .bg-light, 
        .fashion-wrapper .card.bg-light {
            background: #292524 !important;
            border: 1px solid var(--fashion-border) !important;
            color: var(--fashion-text-main) !important;
        }
        .fashion-wrapper .text-muted {
            color: var(--fashion-text-muted) !important;
        }
        .fashion-wrapper h1, 
        .fashion-wrapper h2, 
        .fashion-wrapper h3, 
        .fashion-wrapper h4, 
        .fashion-wrapper h5, 
        .fashion-wrapper h6, 
        .fashion-wrapper strong {
            color: var(--fashion-text-main) !important;
        }
        .fashion-wrapper .text-dark {
            color: var(--fashion-text-main) !important;
        }
        .fashion-wrapper .text-primary {
            color: var(--fashion-primary) !important;
        }
        .fashion-wrapper .breadcrumb-item a {
            color: var(--fashion-primary) !important;
        }
        .fashion-wrapper .breadcrumb-item a:hover {
            color: #ffffff !important;
            text-decoration: underline !important;
        }
        .fashion-wrapper .breadcrumb-item.active {
            color: var(--fashion-text-muted) !important;
        }
        .fashion-wrapper .breadcrumb-item::before {
            color: var(--fashion-text-muted) !important;
        }
        .fashion-wrapper .form-control {
            background-color: rgba(28, 25, 23, 0.8) !important;
            border: 1px solid var(--fashion-border) !important;
            color: var(--fashion-text-main) !important;
        }
        .fashion-wrapper .form-control::placeholder {
            color: #78716c !important;
        }
        .fashion-wrapper .form-control:focus {
            background-color: var(--fashion-card-bg) !important;
            border-color: var(--fashion-primary) !important;
            box-shadow: 0 0 0 3px var(--fashion-primary-glow) !important;
        }
        .fashion-wrapper .border-bottom {
            border-color: var(--fashion-border) !important;
        }
        .fashion-wrapper .alert-success {
            background: rgba(16, 185, 129, 0.1) !important;
            color: #34d399 !important;
            border: none !important;
        }
        .fashion-wrapper .alert-danger {
            background: rgba(239, 68, 68, 0.1) !important;
            color: #f87171 !important;
            border: none !important;
        }
        .fashion-wrapper .alert-info {
            background: rgba(59, 130, 246, 0.1) !important;
            color: #60a5fa !important;
            border: none !important;
        }
        .fashion-wrapper .alert-warning {
            background: rgba(245, 158, 11, 0.1) !important;
            color: #fbbf24 !important;
            border: none !important;
        }

        @media (max-width: 768px) {
            .fashion-wrapper {
                padding: 20px 0;
            }
            .fashion-card {
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
            .fashion-tab.nav-link {
                padding: 12px 16px;
                min-width: 110px;
                border-radius: 12px;
            }
            .fashion-badge {
                padding: 14px 16px;
                border-radius: 12px;
                gap: 12px;
            }
            .fashion-badge i {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
<div class="fashion-wrapper">
    <div class="container py-2" style="margin-top: 50px;">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-down">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--fashion-primary); font-weight: 600; text-decoration: none;">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" style="color: var(--fashion-primary); font-weight: 600; text-decoration: none;">Cửa hàng</a></li>
                <li class="breadcrumb-item active" style="color: var(--fashion-text-main); font-weight: 700;">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="fashion-card">
                    <img src="{{ $product->image ?? 'https://via.placeholder.com/600' }}" 
                         class="img-fluid product-detail-image w-100" 
                         alt="{{ $product->name }}">
                    @include('products.partials.desktop_banners')
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="fashion-card">
                    <span class="badge mb-3" style="font-size: 13px; font-weight: 700; background: rgba(251, 113, 133, 0.12); color: var(--fashion-primary); border-radius: 30px; padding: 6px 16px; border: 1px solid rgba(251, 113, 133, 0.2);">
                        <i class="fas fa-tshirt me-1"></i> {{ strtoupper($product->category) }}
                    </span>
                    <h1 class="fw-bold mb-3" style="color: var(--fashion-text-main); font-size: 2rem;">{{ $product->name }}</h1>
                    <p class="lead text-muted mb-4" style="font-size: 1rem; line-height: 1.6;">{{ Str::limit($product->description, 150, '......') }}</p>
                    
                    <div class="mb-4 p-4 rounded-4" style="background: rgba(251, 113, 133, 0.05); border: 1px solid rgba(251, 113, 133, 0.1);">
                        <div class="d-flex align-items-end gap-3 flex-wrap">
                            <h2 class="fw-bold mb-0" style="color: var(--fashion-primary); font-size: 2.2rem;">{{ $product->formatted_price }}</h2>
                            @if($product->is_on_sale)
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="text-muted text-decoration-line-through" style="font-size: 1.1rem;">{{ $product->formatted_original_price }}</span>
                                    <span class="badge bg-danger rounded-pill px-2.5 py-1" style="font-size: 0.8rem; font-weight: 700;">-{{ $product->discount_percent }}%</span>
                                </div>
                            @endif
                        </div>
                        <div class="mt-2 text-muted" style="font-size: 0.82rem;"><i class="fas fa-info-circle me-1"></i>Miễn phí vận chuyển toàn quốc</div>
                    </div>

                    <!-- Size Selector -->
                    <div class="mb-4">
                        <label class="fw-bold mb-2" style="color: var(--fashion-text-main);">
                            <i class="fas fa-ruler me-1"></i> Chọn kích thước:
                        </label>
                        <div class="size-selector">
                            <button class="size-btn">S</button>
                            <button class="size-btn active">M</button>
                            <button class="size-btn">L</button>
                            <button class="size-btn">XL</button>
                            <button class="size-btn">XXL</button>
                        </div>
                    </div>

                    <!-- Color Selector -->
                    <div class="mb-4">
                        <label class="fw-bold mb-2" style="color: var(--fashion-text-main);">
                            <i class="fas fa-palette me-1"></i> Chọn màu sắc:
                        </label>
                        <div class="color-selector">
                            <div class="color-option active" style="background: #1c1917;" title="Đen"></div>
                            <div class="color-option" style="background: #ffffff; border: 1.5px solid #d6d3d1;" title="Trắng"></div>
                            <div class="color-option" style="background: #ef4444;" title="Đỏ"></div>
                            <div class="color-option" style="background: #3b82f6;" title="Xanh dương"></div>
                            <div class="color-option" style="background: #f59e0b;" title="Vàng"></div>
                        </div>
                    </div>
                    
                    @if($product->stock > 0)
                        <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                            <div class="alert alert-success d-inline-flex align-items-center mb-0 py-2 px-3 border-0" style="font-weight: 600;">
                                <i class="fas fa-check-circle me-2"></i> Còn hàng ({{ $product->stock }} sản phẩm)
                            </div>
                            <small class="text-muted"><i class="far fa-clock me-1"></i>Chuẩn bị hàng nhanh chóng</small>
                        </div>
                    @else
                        <div class="alert alert-danger d-inline-flex align-items-center mb-4 py-2 px-3 border-0" style="font-weight: 600;">
                            <i class="fas fa-times-circle me-2"></i> Hết hàng
                        </div>
                    @endif
                    
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="d-flex gap-3 mb-3 flex-wrap">
                            <button type="submit" class="btn btn-buy-primary shadow">
                                <i class="fas fa-shopping-bag"></i> Thêm vào giỏ
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

                    <!-- Fashion Features -->
                    <div class="mt-4">
                        <div class="fashion-badge">
                            <i class="fas fa-gem"></i>
                            <div>
                                <strong style="color: var(--fashion-text-main);">Chất liệu cao cấp</strong><br>
                                <small class="text-muted">100% Cotton tự nhiên, cực kỳ thoáng mát</small>
                            </div>
                        </div>
                        <div class="fashion-badge" style="border-left: 4px solid var(--fashion-secondary);">
                            <i class="fas fa-star" style="color: var(--fashion-secondary);"></i>
                            <div>
                                <strong style="color: var(--fashion-text-main);">Thiết kế độc quyền</strong><br>
                                <small class="text-muted">Đón đầu xu hướng thời trang mới nhất</small>
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
                        <button class="nav-link fashion-tab active" id="features-tab" data-bs-toggle="tab" 
                                data-bs-target="#features" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-heart"></i>
                            <span>Đặc Điểm</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fashion-tab" id="description-tab" data-bs-toggle="tab" 
                                data-bs-target="#description" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-info-circle"></i>
                            <span>Hướng Dẫn</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fashion-tab" id="reviews-tab" data-bs-toggle="tab" 
                                data-bs-target="#reviews" type="button" role="tab" style="width: 100%;">
                            <i class="fas fa-comments"></i>
                            <span>Đánh Giá</span>
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="productTabsContent">
                    <!-- Features Tab -->
                    <div class="tab-pane fade show active" id="features" role="tabpanel" data-aos="fade-up">
                        <div class="fashion-card">
                            <h4 class="fw-bold mb-4" style="color: var(--fashion-text-main);">
                                <i class="fas fa-star text-warning me-2"></i>Đặc Điểm Nổi Bật
                            </h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                        <div>
                                            <h6 class="fw-bold" style="color: var(--fashion-text-main);">Vải cotton tự nhiên</h6>
                                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Thân thiện với làn da, thấm hút mồ hôi hiệu quả và bền bỉ qua nhiều lần giặt.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                        <div>
                                            <h6 class="fw-bold" style="color: var(--fashion-text-main);">Form dáng hiện đại</h6>
                                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Từng đường kim mũi chỉ được may đo cẩn thận tạo form tôn dáng tối đa.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                        <div>
                                            <h6 class="fw-bold" style="color: var(--fashion-text-main);">Công nghệ nhuộm chuẩn màu</h6>
                                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Giữ màu sắc nguyên bản, không phai, bạc màu dưới ánh nắng mặt trời.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                        <div>
                                            <h6 class="fw-bold" style="color: var(--fashion-text-main);">Phong cách tối giản</h6>
                                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Thiết kế basic tinh tế dễ dàng kết hợp với nhiều phụ kiện và trang phục khác.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description Tab -->
                    <div class="tab-pane fade" id="description" role="tabpanel" data-aos="fade-up">
                        <div class="fashion-card">
                            <h4 class="fw-bold mb-4" style="color: var(--fashion-text-main);">
                                <i class="fas fa-book text-danger me-2"></i>Hướng Dẫn Sử Dụng & Bảo Quản
                            </h4>
                            <div class="description-content mb-4" style="line-height: 1.8; color: #d1d5db;">{!! nl2br(e($product->description)) !!}</div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h6 class="fw-bold" style="color: var(--fashion-primary);">
                                        <i class="fas fa-hand-sparkles me-2"></i>Hướng dẫn giặt:
                                    </h6>
                                    <ul class="text-muted" style="font-size: 0.9rem; line-height: 1.6;">
                                        <li>Giặt máy ở chế độ nhẹ nhàng (tối đa 30°C)</li>
                                        <li>Tránh sử dụng chất tẩy mạnh, chất tẩy clo</li>
                                        <li>Nên giặt chung với các sản phẩm cùng tone màu</li>
                                        <li>Lộn ngược mặt vải trước khi cho vào máy giặt</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold" style="color: var(--fashion-primary);">
                                        <i class="fas fa-wind me-2"></i>Hướng dẫn phơi & ủi:
                                    </h6>
                                    <ul class="text-muted" style="font-size: 0.9rem; line-height: 1.6;">
                                        <li>Phơi bóng râm mát, tránh tiếp xúc nắng gắt trực tiếp</li>
                                        <li>Ủi ở nhiệt độ cotton/trung bình (dưới 150°C)</li>
                                        <li>Không vắt xoắn mạnh làm hỏng cấu trúc sợi vải</li>
                                        <li>Treo phẳng phiu trong tủ quần áo thoáng mát</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="alert rounded-4 mt-4 border-0" style="font-weight: 600;">
                                <i class="fas fa-exchange-alt me-2"></i>
                                <strong>Chính sách đổi trả:</strong> Đổi size miễn phí trong vòng 7 ngày kể từ lúc nhận hàng nếu sản phẩm còn nguyên tem mác.
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
        
        // Size selector
        document.querySelectorAll('.size-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Color selector
        document.querySelectorAll('.color-option').forEach(opt => {
            opt.addEventListener('click', function() {
                document.querySelectorAll('.color-option').forEach(o => o.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
@endpush
