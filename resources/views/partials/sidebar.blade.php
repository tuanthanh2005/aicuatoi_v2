<aside class="homepage-sidebar">
    
    {{-- Desktop Navigation (Logo, Search, Links, Actions, Profile) --}}
    <div class="sidebar-desktop-nav d-none d-lg-block mb-4" style="border-bottom: 1px solid #e2e8f0; padding-bottom: 24px;">
        <!-- Branding/Logo -->
        <div class="sidebar-brand mb-4 d-flex align-items-center justify-content-between">
            <a class="d-flex align-items-center gap-2 text-decoration-none text-dark sidebar-logo-link" href="{{ route('home') }}">
                <img src="{{ asset('images/aicuatoi.png') }}" alt="Logo" style="height: 36px; width: auto; object-fit: contain;">
                <span class="fw-bold logo-text" style="font-size: 1.35rem; color: var(--text-main);">AiCuaToi<span style="color: var(--text-muted); font-weight: 500;">.com</span></span>
            </a>
            <button class="btn btn-link p-0 text-dark sidebar-toggle-btn d-none d-lg-block" id="sidebarToggle" style="border: none; outline: none; box-shadow: none; text-decoration: none;">
                <i class="fa-solid fa-bars" style="font-size: 20px;"></i>
            </button>
        </div>

        <!-- Search Bar -->
        <div class="sidebar-search mb-4">
            <form action="{{ route('shop') }}" method="GET" class="w-100">
                <div class="position-relative">
                    <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 14px; top: 50%; transform: translateY(-50%); font-size: 14px;"></i>
                    <input type="text" name="search" class="form-control" placeholder="Tìm sản phẩm..." 
                           style="border-radius: 12px; padding: 10px 12px 10px 38px; font-size: 13.5px; border: 1.5px solid #e2e8f0; outline: none; background-color: #f8fafc;"
                           value="{{ request('search') }}">
                </div>
            </form>
        </div>

        <!-- Navigation Menu Links -->
        <div class="sidebar-nav-menu mb-4">
            <ul class="nav flex-column gap-1" style="font-size: 14.5px;">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link d-flex align-items-center gap-3 px-3 py-2.5 rounded-3 {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fa-solid fa-house" style="width: 20px; font-size: 16px;"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shop') }}" class="nav-link d-flex align-items-center gap-3 px-3 py-2.5 rounded-3 {{ request()->routeIs('shop') ? 'active' : '' }}">
                        <i class="fa-solid fa-store" style="width: 20px; font-size: 16px;"></i>
                        <span>Cửa hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.index') }}" class="nav-link d-flex align-items-center gap-3 px-3 py-2.5 rounded-3 {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-newspaper" style="width: 20px; font-size: 16px;"></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ \App\Models\SiteSetting::getValue('zalo_group_link', 'https://zalo.me/g/ptarfhnomeuotiyk7cot') }}" target="_blank" class="nav-link d-flex align-items-center gap-3 px-3 py-2.5 rounded-3" style="color: #0068ff !important; font-weight: 700;">
                        <i class="fa-solid fa-users" style="width: 20px; font-size: 16px; color: #0068ff;"></i>
                        <span>Nhóm Zalo</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center gap-3 px-3 py-2.5 rounded-3" data-bs-toggle="modal" data-bs-target="#quickContactModal">
                        <i class="fa-solid fa-headset" style="width: 20px; font-size: 16px;"></i>
                        <span>Liên hệ</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Actions Row (Cart and Language) -->
        <div class="sidebar-actions-row d-flex align-items-center gap-2 mb-4">
            <!-- Cart -->
            <a href="{{ route('cart.index') }}" class="btn btn-light border d-flex align-items-center justify-content-center gap-2 flex-grow-1" style="border-radius: 12px; font-size: 13.5px; font-weight: 600; padding: 10px 12px; background: #fff; border-color: #cbd5e1;">
                <i class="fa-solid fa-cart-shopping text-muted"></i>
                <span>Giỏ hàng</span>
                @php $cartCount = count(session('cart', [])); @endphp
                @if($cartCount > 0)
                    <span class="badge bg-danger rounded-pill">{{ $cartCount }}</span>
                @endif
            </a>

            <!-- Language Switcher -->
            <div class="dropdown">
                <button class="btn btn-light border d-flex align-items-center justify-content-center gap-1.5" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 12px; font-size: 13.5px; font-weight: 600; padding: 10px 15px; background: #fff; border-color: #cbd5e1;">
                    @if(app()->getLocale() === 'en')
                        🇺🇸 <span style="font-size: 11px;">EN</span>
                    @else
                        🇻🇳 <span style="font-size: 11px;">VI</span>
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 12px;">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 {{ app()->getLocale() === 'vi' ? 'active' : '' }}" href="{{ route('change-language', 'vi') }}" style="font-size: 13px;">
                            <span>🇻🇳</span> Tiếng Việt
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ route('change-language', 'en') }}" style="font-size: 13px;">
                            <span>🇺🇸</span> English
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- User Profile Card -->
        <div class="sidebar-user-section">
            @auth
                <div class="p-3 rounded-4 border bg-white shadow-sm d-flex align-items-center gap-3">
                    <div class="user-avatar-circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold" style="width: 42px; height: 42px; border-radius: 50%; background: linear-gradient(135deg, var(--brand) 0%, var(--primary) 100%) !important;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0 flex-grow-1">
                        <div class="fw-bold text-dark text-truncate" style="font-size: 14px; line-height: 1.2;">{{ Auth::user()->name }}</div>
                        <div class="text-muted text-truncate" style="font-size: 11.5px; margin-top: 2px;">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical" style="font-size: 16px;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 12px; font-size: 13.5px;">
                            @if(Auth::user()->role === 'admin')
                                <li><a class="dropdown-item d-flex align-items-center gap-2" href="/admin"><i class="fas fa-tachometer-alt text-primary"></i><span>Dashboard Admin</span></a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('admin.menu-settings') }}"><i class="fas fa-sliders-h text-warning"></i><span>Quản lý Menu</span></a></li>
                            @endif
                            @if(Auth::guard('affiliate')->check())
                                <li><a class="dropdown-item fw-bold text-primary d-flex align-items-center gap-2" href="{{ route('affiliate.dashboard') }}"><i class="fas fa-handshake"></i><span>Dashboard CTV</span></a></li>
                            @else
                                <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('affiliate.login') }}"><i class="fas fa-handshake"></i><span>Đăng ký CTV</span></a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('user.account') }}"><i class="fas fa-user"></i><span>Tài khoản</span></a></li>
                            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('user.orders') }}"><i class="fas fa-box"></i><span>Đơn hàng</span></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2 border-0 bg-transparent w-100 text-start"><i class="fas fa-sign-out-alt"></i><span>Đăng xuất</span></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2 py-2.5" style="border-radius: 12px; font-weight: 700; background: var(--brand); border: none; font-size: 14.5px; color: #fff !important;">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Đăng nhập tài khoản</span>
                </a>
            @endauth
        </div>
    </div>
    
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
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
    });
</script>
