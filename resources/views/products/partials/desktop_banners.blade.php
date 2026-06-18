<style>
    .desktop-banners-container {
        margin-top: 25px;
    }
    .desktop-banner-card {
        background: var(--banner-card-bg, #ffffff);
        border-radius: 16px;
        padding: 20px 10px;
        text-align: center;
        box-shadow: var(--banner-card-shadow, 0 10px 25px rgba(0, 0, 0, 0.05));
        border: 1px solid var(--banner-card-border, rgba(0, 0, 0, 0.05));
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .desktop-banner-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--banner-card-hover-shadow, 0 15px 30px rgba(0, 0, 0, 0.1));
        border-color: var(--banner-card-hover-border, rgba(0, 104, 255, 0.2));
    }
    .banner-icon-circle {
        width: 54px;
        height: 54px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        transition: all 0.3s ease;
    }
    .desktop-banner-card:hover .banner-icon-circle {
        transform: scale(1.1);
    }
    /* Group Zalo Colors */
    .zalo-group-card .banner-icon-circle {
        background-color: var(--banner-icon-bg-zalo, #e6f0ff);
    }
    .zalo-group-card .banner-icon-circle i {
        color: var(--banner-icon-color-zalo, #0068ff);
        font-size: 22px;
    }
    /* Fanpage Colors */
    .fanpage-card .banner-icon-circle {
        background-color: var(--banner-icon-bg-fb, #e7f3ff);
    }
    .fanpage-card .banner-icon-circle i {
        color: var(--banner-icon-color-fb, #1877f2);
        font-size: 22px;
    }
    /* Admin Zalo Colors */
    .zalo-admin-card .banner-icon-circle {
        background-color: var(--banner-icon-bg-admin, #e8f8f5);
    }
    .zalo-admin-card .banner-icon-circle i {
        color: var(--banner-icon-color-admin, #07be9e);
        font-size: 22px;
    }
    .banner-title {
        font-weight: 700;
        font-size: 14px;
        color: var(--banner-card-title, #2d3748);
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .banner-subtitle {
        font-size: 12px;
        color: var(--banner-card-subtitle, #718096);
        line-height: 1.4;
    }
</style>

<div class="desktop-banners-container d-none d-lg-block">
    <div class="row g-3">
        <div class="col-4">
            <a href="{{ \App\Models\SiteSetting::getValue('zalo_group_link', 'https://zalo.me/g/ptarfhnomeuotiyk7cot') }}" 
               target="_blank" 
               class="desktop-banner-card zalo-group-card text-decoration-none">
                <div class="banner-icon-circle">
                    <i class="fas fa-users"></i>
                </div>
                <div class="banner-title">GROUP ZALO</div>
                <div class="banner-subtitle">Tham gia nhóm hỗ trợ thành viên</div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ \App\Models\SiteSetting::getValue('contact_facebook', 'https://www.facebook.com/profile.php?id=61589359706008') }}" 
               target="_blank" 
               class="desktop-banner-card fanpage-card text-decoration-none">
                <div class="banner-icon-circle">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="banner-title">Fanpage</div>
                <div class="banner-subtitle">Theo dõi Fanpage chính thức</div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ \App\Models\SiteSetting::getValue('contact_zalo', 'https://zalo.me/0772698113') }}" 
               target="_blank" 
               class="desktop-banner-card zalo-admin-card text-decoration-none">
                <div class="banner-icon-circle">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="banner-title">Inbox Admin</div>
                <div class="banner-subtitle">Liên hệ Zalo: {{ str_replace('https://zalo.me/', '', \App\Models\SiteSetting::getValue('contact_zalo', '0772698113')) }}</div>
            </a>
        </div>
    </div>
</div>
