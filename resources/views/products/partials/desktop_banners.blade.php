<style>
    .related-products-container {
        margin-top: 25px;
    }
    .related-product-card {
        background: var(--banner-card-bg, #ffffff);
        border: 1px solid var(--banner-card-border, rgba(0, 0, 0, 0.08));
        border-radius: 14px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        text-decoration: none !important;
        color: inherit !important;
    }
    .related-product-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--banner-card-hover-shadow, 0 10px 20px rgba(0, 0, 0, 0.06));
        border-color: var(--banner-card-hover-border, #0d9488);
    }
    .related-img-wrap {
        aspect-ratio: 16/11;
        width: 100%;
        overflow: hidden;
        position: relative;
        background: #f8fafc;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    .related-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }
    .related-product-card:hover .related-img-wrap img {
        transform: scale(1.05);
    }
    .related-badge-sale {
        position: absolute;
        top: 6px;
        right: 6px;
        background: #ef4444;
        color: #fff;
        font-size: 9px;
        font-weight: 800;
        padding: 2px 6px;
        border-radius: 6px;
        z-index: 2;
    }
    .related-body {
        padding: 10px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .related-title {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--banner-card-title, #1e293b);
        line-height: 1.4;
        margin-bottom: 6px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.8em;
    }
    .related-price-box {
        margin-top: auto;
        display: flex;
        align-items: baseline;
        gap: 4px;
        flex-wrap: wrap;
    }
    .related-price-cur {
        font-size: 12px;
        font-weight: 800;
        color: #ef4444;
    }
    .related-price-old {
        font-size: 10px;
        color: #94a3b8;
        text-decoration: line-through;
    }
</style>

@if(isset($relatedProducts) && $relatedProducts->count() > 0)
<div class="related-products-container d-none d-lg-block">
    <div class="mb-2 text-muted fw-bold" style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">
        <i class="fa-solid fa-layer-group me-1 text-primary"></i> Sản phẩm liên quan
    </div>
    <div class="row g-3">
        @foreach($relatedProducts->take(3) as $rp)
        <div class="col-4">
            <a href="{{ route('product.show', $rp->slug) }}" class="related-product-card">
                <div class="related-img-wrap">
                    <img src="{{ $rp->image ?? 'https://via.placeholder.com/300' }}" alt="{{ $rp->name }}" loading="lazy">
                    @if($rp->is_on_sale)
                        <span class="related-badge-sale">-{{ $rp->discount_percent }}%</span>
                    @endif
                </div>
                <div class="related-body">
                    <div class="related-title">{{ $rp->name }}</div>
                    <div class="related-price-box">
                        <span class="related-price-cur">{{ $rp->formatted_price }}</span>
                        @if($rp->is_on_sale)
                            <span class="related-price-old">{{ $rp->formatted_original_price }}</span>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif
