<style>
    /* Desktop Layout Styles */
    .topbar-final-wrapper {
        background: var(--nv);
        border-bottom: 2px solid #e07b0f;
        padding: 8px 16px;
        position: relative;
        z-index: 1001;
    }
    .topbar-container {
        max-width: 1220px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    .topbar-right-group {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
    }
    .topbar-brand {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #fff;
        font-weight: 800;
        font-size: 13.5px;
    }
    .topbar-location-group {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }
    .topbar-location {
        background: rgba(255, 255, 255, 0.08);
        border: 1.5px solid rgba(255, 255, 255, 0.15);
        padding: 5px 14px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 700;
        color: #fff;
        font-size: 12.5px;
    }
    .topbar-btn {
        padding: 5px 12px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        direction: ltr;
    }
    .topbar-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    .topbar-btn-wa {
        background: #25d366;
        color: #fff;
    }
    .topbar-btn-ph {
        background: #e07b0f;
        color: #fff;
    }
    
    .topbar-left-text {
        color: #fff;
        font-weight: 800;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Mobile Layout Wrapper (Hidden by default on Desktop) */
    .tb-mobile-wrapper {
        display: none;
        background: #0f2441; /* Premium Dark Navy */
        border-bottom: 2px solid #e07b0f;
        padding: 8px 6px;
        color: #fff;
        text-align: center;
        font-family: 'Tajawal', sans-serif;
    }

    @media (max-width: 992px) {
        .topbar-left-text {
            font-size: 12px;
        }
    }

    /* Mobile view triggering <= 768px */
    @media (max-width: 768px) {
        .topbar-final-wrapper {
            display: none !important; /* Hide desktop topbar totally */
        }
        
        .tb-mobile-wrapper {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 6px !important;
            text-align: center !important;
            width: 100% !important;
        }

        .tb-mobile-title {
            font-size: 13.5px !important;
            font-weight: 800 !important;
            color: #fff !important;
            display: flex !important;
            align-items: center !important;
            gap: 6px !important;
        }

        .tb-mobile-location-row {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important; /* Force all 3 elements side-by-side */
            gap: 4px !important;
            flex-wrap: nowrap !important; /* Strictly prevent wrapping to a new line */
            width: 100% !important;
            padding: 0 2px !important;
            box-sizing: border-box !important;
        }

        .tb-mobile-location {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1.2px solid rgba(255, 255, 255, 0.18) !important;
            padding: 4px 6px !important;
            border-radius: 50px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 3px !important;
            font-weight: 700 !important;
            color: #fff !important;
            font-size: 10px !important;
            flex-shrink: 1 !important;
            white-space: nowrap !important;
        }

        .tb-mobile-btn {
            font-size: 10px !important;
            padding: 4px 7px !important;
            border-radius: 50px !important;
            font-weight: 700 !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 3px !important;
            text-decoration: none !important;
            flex-shrink: 0 !important;
            white-space: nowrap !important;
        }

        .tb-mobile-btn-wa {
            background: #25d366 !important;
            color: #fff !important;
            direction: rtl !important;
        }

        .tb-mobile-btn-ph {
            background: #e07b0f !important;
            color: #fff !important;
            direction: ltr !important; /* Keep number format correct */
        }
    }
</style>

<!-- Desktop Topbar Layout -->
<div class="topbar-final-wrapper">
    <div class="topbar-container">
        <!-- Right side: Brand & Location Pill & Phone/WA direct numbers -->
        <div class="topbar-right-group">
            <div class="topbar-brand">
                <i class="fas fa-layer-group" style="color: #e07b0f; font-size: 15px;"></i>
                <span style="letter-spacing: 0.3px;">رونق قلب الخليج لعزل الفوم الأمريكي</span>
            </div>
            
            <div class="topbar-location-group">
                <div class="topbar-location">
                    <i class="fas fa-map-marker-alt" style="color: #e07b0f; font-size: 14px;"></i>
                    <span>القصيم وكل مدن المملكة</span>
                </div>
                
                @if(!empty($contact['wa']))
                    <a href="https://wa.me/{{ $contact['wa'] }}" target="_blank" class="topbar-btn topbar-btn-wa" onclick="tC('whatsapp','topbar')">
                        <i class="fab fa-whatsapp" style="font-size: 14px;"></i>
                        <span>واتساب مباشر</span>
                    </a>
                @endif
                @if(!empty($contact['ph']))
                    <a href="tel:{{ $contact['ph'] }}" class="topbar-btn topbar-btn-ph" onclick="tC('phone','topbar')">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{ $contact['ph'] }}</span>
                    </a>
                @endif
            </div>
        </div>

        <!-- Left side: 24 Hours Service text -->
        <div class="topbar-left-text">
            <span>☀️ خدمة 24 ساعة - 7 أيام في الأسبوع - نصلك في كل مكان بالقصيم وكل مدن المملكة</span>
        </div>
    </div>
</div>

<!-- Mobile Layout -->
<div class="tb-mobile-wrapper">
    <!-- Brand + 24h Text (Bigger) -->
    <div class="tb-mobile-title">
        <span>رونق قلب الخليج ☀️ خدمة 24 ساعة</span>
    </div>
    
    <!-- Location & Phone/WA direct numbers in a beautiful single row -->
    <div class="tb-mobile-location-row">
        <!-- Location Pill -->
        <div class="tb-mobile-location">
            <i class="fas fa-map-marker-alt" style="color: #e07b0f; font-size: 11px;"></i>
            <span>القصيم وكل مدن المملكة</span>
        </div>
        
        <!-- WhatsApp Pill -->
        @if(!empty($contact['wa']))
            <a href="https://wa.me/{{ $contact['wa'] }}" target="_blank" class="tb-mobile-btn tb-mobile-btn-wa" onclick="tC('whatsapp','topbar')">
                <i class="fab fa-whatsapp" style="font-size: 11px;"></i>
                <span>واتساب</span>
            </a>
        @endif
        
        <!-- Phone Pill -->
        @if(!empty($contact['ph']))
            <a href="tel:{{ $contact['ph'] }}" class="tb-mobile-btn tb-mobile-btn-ph" onclick="tC('phone','topbar')">
                <i class="fas fa-phone-alt" style="font-size: 10px;"></i>
                <span>{{ $contact['ph'] }}</span>
            </a>
        @endif
    </div>
</div>
