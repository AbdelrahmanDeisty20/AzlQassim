<style>
    /* Desktop only header styling (769px and above) */
    @media (min-width: 769px) {
        .hdr {
            display: flex !important;
            flex-wrap: nowrap !important;
            justify-content: space-between !important;
            align-items: center !important;
            gap: 15px !important;
            max-width: 100% !important;
            padding-right: 24px !important;
            padding-left: 24px !important;
            margin: 0 auto !important;
        }
        nav {
            display: flex !important;
            flex-wrap: nowrap !important;
            align-items: center !important;
            gap: 4px !important;
        }
        nav a {
            white-space: nowrap !important;
            font-size: 13px !important;
            padding: 8px 7px !important;
        }
    }

    /* Tablet and small desktop optimizations (769px to 1300px) */
    @media (max-width: 1300px) and (min-width: 769px) {
        .logo-sb {
            display: none !important;
        }
        .logo-nm {
            font-size: 13px !important;
        }
        nav a {
            font-size: 11px !important;
            padding: 6px 4px !important;
        }
        nav {
            gap: 2px !important;
        }
        .hdr-cta .btn span {
            display: none !important;
        }
        .hdr-cta .btn {
            padding: 6px 8px !important;
        }
    }

    /* Hide SEO links on smaller screens to prevent overflow/wrap */
    @media (max-width: 1250px) {
        .seo-link {
            display: none !important;
        }
    }

    /* External Link Styling */
    .ext-link {
        color: #e07b0f !important;
        font-weight: 800 !important;
        border-bottom: 2px dashed #e07b0f;
        padding-bottom: 2px;
        transition: all 0.3s ease !important;
    }
    .ext-link:hover {
        color: #0f2441 !important;
        border-bottom-color: #0f2441 !important;
        transform: translateY(-1px);
    }
</style>

<header id="HDR">
    <div class="hdr">
        <a class="logo" href="/" style="text-decoration:none;color:inherit;cursor:pointer;display:flex;align-items:center;gap:8px">
            @if(!empty($hdr['logo']))
                <img src="{{ $hdr['logo'] }}" alt="{{ $hdr['nm'] ?? 'عزل القصيم' }}" class="logo-img" style="max-height: 48px; max-width: 180px; object-fit: contain; display: block;">
            @else
                <div class="logo-ic"><i class="fas fa-layer-group"></i></div>
            @endif
            <div>
                <div class="logo-nm" id="sNm">{{ $hdr['nm'] ?? 'عزل القصيم' }}</div>
                <div class="logo-sb" id="sSb">{{ $hdr['sb'] ?? 'أفضل شركة عزل أسطح بالقصيم' }}</div>
            </div>
        </a>
        <nav id="MN">
            @foreach($menus as $m)
                @php
                    $url = $m->page == 'home' ? '/' : '/' . $m->page;
                    $isAct = ($m->page == 'home' && Request::is('/')) || Request::is($m->page);
                @endphp
                <a href="{{ $url }}" class="{{ $isAct ? 'act' : '' }}">{{ $m->name }}</a>
            @endforeach
            <a href="/" class="seo-link">أفضل شركة عزل فوم أسطح بالقصيم</a>
            <a href="/" class="seo-link">foam-roof-insulation-qassim</a>
            <a href="https://rawnkelkhaleeg.com/" target="_blank" class="ext-link">مؤسسة رونق قلب الخليج</a>
        </nav>
        <div class="hdr-cta" style="display: flex; gap: 8px; align-items: center;">
            <a class="btn" id="hCta" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','header')" style="background: #e07b0f; color: #fff; padding: 6px 12px; border-radius: 50px; font-size: 12px; font-weight: 700; display: inline-flex; align-items: center; gap: 5px; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-phone-alt" style="font-size: 11px;"></i>
                <span id="hCTA">تواصل</span>
            </a>
            <a class="btn" id="hWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','header')" style="background: #10b981; color: #fff; padding: 6px 12px; border-radius: 50px; font-size: 12px; font-weight: 700; display: inline-flex; align-items: center; gap: 5px; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease;">
                <i class="fab fa-whatsapp" style="font-size: 13px;"></i>
                <span id="hWaT">واتساب</span>
            </a>
        </div>
        <button class="mob-tog" onclick="togMob()"><i class="fas fa-bars"></i></button>
    </div>
    <div class="mob-nav" id="MbN">
        @foreach($menus as $m)
            @php
                $url = $m->page == 'home' ? '/' : '/' . $m->page;
                $isAct = ($m->page == 'home' && Request::is('/')) || Request::is($m->page);
            @endphp
            <a href="{{ $url }}" onclick="togMob(false)" class="{{ $isAct ? 'act' : '' }}">{{ $m->name }}</a>
        @endforeach
        <a href="/" onclick="togMob(false)">أفضل شركة عزل فوم أسطح بالقصيم</a>
        <a href="/" onclick="togMob(false)">foam-roof-insulation-qassim</a>
        <a href="https://rawnkelkhaleeg.com/" target="_blank" onclick="togMob(false)" style="color: #e07b0f !important; font-weight: 800 !important;">مؤسسة رونق قلب الخليج</a>
    </div>
</header>
