@extends('layouts.app')

@section('title', $product->name . ' - AiCuaToi.com')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        :root {
            --tech-primary: #4f46e5;
            --tech-primary-glow: rgba(79, 70, 229, 0.15);
            --tech-secondary: #0d9488;
            --tech-bg: #f8fafc;
            --tech-card-bg: #ffffff;
            --tech-text-main: #0f172a;
            --tech-text-muted: #64748b;
            --tech-border: #e2e8f0;
        }

        .tech-wrapper {
            background-color: var(--tech-bg);
            background-image: radial-gradient(rgba(79, 70, 229, 0.03) 1px, transparent 0), radial-gradient(rgba(13, 148, 136, 0.03) 1px, transparent 0);
            background-size: 24px 24px;
            background-position: 0 0, 12px 12px;
            padding: 50px 0;
            min-height: 100vh;
        }

        .tech-card {
            background: var(--tech-card-bg);
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02), 0 1px 3px rgba(0, 0, 0, 0.01);
            border: 1px solid var(--tech-border);
            transition: all 0.3s ease;
        }

        .tech-card:hover {
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.04);
            border-color: rgba(79, 70, 229, 0.2);
        }

        .product-detail-image {
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.04);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--tech-border);
        }

        .product-detail-image:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.1);
        }

        .tech-badge {
            background: rgba(79, 70, 229, 0.03);
            border: 1px solid rgba(79, 70, 229, 0.08);
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
            background: rgba(79, 70, 229, 0.06);
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
            box-shadow: 0 8px 20px var(--tech-primary-glow);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(79, 70, 229, 0.3);
            color: white;
        }

        .btn-buy-secondary {
            background: #facc15;
            color: #0f172a;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            padding: 14px 28px;
            box-shadow: 0 8px 20px rgba(250, 204, 21, 0.2);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(250, 204, 21, 0.35);
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
            background: #f1f5f9;
            color: var(--tech-text-main);
            border-color: var(--tech-text-muted);
        }

        .tech-tab.nav-link {
            border: 1px solid var(--tech-border);
            background: #ffffff;
            color: var(--tech-text-muted);
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
            color: var(--tech-text-muted);
            margin: 0 !important;
        }

        .tech-tab.nav-link:hover {
            transform: translateY(-2px);
            background: #f8fafc;
            color: var(--tech-primary);
            border-color: rgba(79, 70, 229, 0.2);
        }

        .tech-tab.nav-link.active {
            background: linear-gradient(135deg, var(--tech-primary) 0%, #3b82f6 100%);
            color: white;
            border-color: transparent;
            box-shadow: 0 8px 20px var(--tech-primary-glow);
        }

        .tech-tab.nav-link.active i {
            color: white;
        }

        .spec-item-box {
            background: #f8fafc;
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
            background: #ffffff;
            border-color: rgba(79, 70, 229, 0.25);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.03);
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
            color: #ddd;
            transition: color 0.2s;
        }
        .rating-input label:hover,
        .rating-input label:hover ~ label,
        .rating-input input:checked ~ label {
            color: #ffc107;
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
                    <span class="badge mb-3" style="font-size: 13px; font-weight: 700; background: rgba(79, 70, 229, 0.08); color: var(--tech-primary); border-radius: 30px; padding: 6px 16px; border: 1px solid rgba(79, 70, 229, 0.12);">
                        <i class="fas fa-microchip me-1"></i> {{ strtoupper($product->category) }}
                    </span>
                    <h1 class="fw-bold mb-3" style="color: var(--tech-text-main); font-size: 2rem;">{{ $product->name }}</h1>
                    <p class="lead text-muted mb-4" style="font-size: 1rem; line-height: 1.6;">{{ Str::limit($product->description, 150, '......') }}</p>
                    
                    <div class="mb-4 p-4 rounded-4" style="background: rgba(79, 70, 229, 0.03); border: 1px solid rgba(79, 70, 229, 0.06);">
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
                            <div class="alert alert-success d-inline-flex align-items-center mb-0 py-2 px-3 border-0" style="background: rgba(16, 185, 129, 0.08); color: #10b981; border-radius: 12px; font-weight: 600;">
                                <i class="fas fa-check-circle me-2"></i> Còn hàng ({{ $product->stock }} sản phẩm)
                            </div>
                            <small class="text-muted"><i class="far fa-clock me-1"></i>Giao hàng / Kích hoạt nhanh chóng</small>
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
                                        <strong class="text-dark text-end" style="font-weight: 700;">{{ is_array($value) ? implode(', ', $value) : $value }}</strong>
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
                                    '#4f46e5', // Indigo
                                    '#0d9488', // Teal
                                    '#3b82f6', // Blue
                                    '#10b981', // Emerald
                                    '#f59e0b', // Amber
                                    '#ec4899', // Pink
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
                            <div class="alert alert-info border-0" style="background: rgba(59, 130, 246, 0.08); color: #3b82f6; border-radius: 12px;">
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
                            <div class="description-content" style="line-height: 1.8; color: #334155;">{!! nl2br(e($product->description)) !!}</div>
                            <hr class="my-4" style="border-color: var(--tech-border);">
                            <div class="alert alert-info border-0 rounded-4" style="background: rgba(59, 130, 246, 0.08); color: #3b82f6; border-radius: 16px;">
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
