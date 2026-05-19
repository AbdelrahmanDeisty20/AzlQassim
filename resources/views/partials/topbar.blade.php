<style>
    /* Default desktop layout */
    .topbar-con-final {
        max-width: 1220px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .tb-desktop-brand {
        display: flex;
        gap: 8px;
        align-items: center;
        color: #fff;
    }
    
    .tb-location {
        background: rgba(255, 255, 255, 0.08);
        border: 1.5px solid rgba(255, 255, 255, 0.15);
        padding: 5px 14px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        color: #fff;
        font-size: 13px;
    }
    
    .tb-info-text {
        color: #fff;
        font-weight: 800;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .tb-mobile-wrapper {
        display: none;
    }

    /* Mobile layout (<= 768px) */
    @media (max-width: 768px) {
        .topbar-con-final {
            display: none !important; /* Hide desktop layout on mobile */
        }
        
        .tb-mobile-wrapper {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            text-align: center !important;
            width: 100% !important;
        }
        
        .tb-mobile-title {
            font-size: 14.5px !important; /* Bigger size as requested */
            font-weight: 800 !important;
            color: #fff !important;
            display: flex !important;
            align-items: center !important;
            gap: 6px !important;
            letter-spacing: 0.2px !important;
        }
        
        .tb-mobile-location {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1.2px solid rgba(255, 255, 255, 0.18) !important;
            padding: 5px 14px !important;
            border-radius: 50px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
            font-weight: 700 !important;
            color: #fff !important;
            font-size: 12.5px !important;
        }
    }
</style>

<div class="topbar" style="background: var(--nv); border-bottom: 2px solid #e07b0f; padding: 8px 16px; position: relative; z-index: 1001;">
    <!-- Desktop Layout (hidden on mobile <= 768px) -->
    <div class="topbar-con-final">
        <!-- Desktop Brand Name (Right side) -->
        <div class="tb-desktop-brand" style="display: flex; gap: 8px; align-items: center; color: #fff;">
            <i class="fas fa-layer-group" style="color: #e07b0f; font-size: 15px;"></i>
            <span style="font-size: 13.5px; font-weight: 800; color: #fff; letter-spacing: 0.3px;">رونق قلب الخليج للعزل الفوم الأمريكي</span>
        </div>

        <!-- Location Pill (Middle) -->
        <div class="tb-location">
            <i class="fas fa-map-marker-alt" style="color: #e07b0f; font-size: 14px;"></i>
            <span id="tbKW">القصيم وكل مدن المملكة</span>
        </div>

        <!-- Info / 24 Hours Banner (Left side) -->
        <div class="tb-info-text">
            <span class="tb-desktop-text">☀️ خدمة 24 ساعة - 7 أيام في الأسبوع - نصلك في كل مكان بالقصيم وكل مدن المملكة</span>
        </div>
    </div>
    
    <!-- Mobile Layout (visible only on mobile <= 768px) -->
    <div class="tb-mobile-wrapper">
        <!-- Brand + 24h Text (Bigger) -->
        <div class="tb-mobile-title">
            <span>رونق قلب الخليج ☀️ خدمة 24 ساعة</span>
        </div>
        <!-- Location Pill (Visible on Mobile) -->
        <div class="tb-mobile-location">
            <i class="fas fa-map-marker-alt" style="color: #e07b0f;"></i>
            <span>القصيم وكل مدن المملكة</span>
        </div>
    </div>
</div>
