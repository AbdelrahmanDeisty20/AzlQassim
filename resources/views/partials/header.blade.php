<style>
    /* Force header and navigation to stay on a single line */
    .hdr {
        display: flex !important;
        flex-wrap: nowrap !important;
        justify-content: space-between !important;
        align-items: center !important;
        gap: 10px !important;
        max-width: 1420px !important;
        padding-right: 10px !important;
        padding-left: 10px !important;
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
        padding: 8px 10px !important;
    }
    
    /* Make the SEO links look like normal navigation links */
    .seo-nav-link {
        font-size: 11px !important;
        padding: 8px 6px !important;
        white-space: nowrap !important;
    }

    /* Tablet and small desktop optimizations (769px to 1300px) */
    @media (max-width: 1300px) and (min-width: 769px) {
        .logo-sb {
            display: none !important;
        }
        .logo-nm {
            font-size: 14.5px !important;
        }
        nav a {
            font-size: 11.5px !important;
            padding: 6px 5px !important;
        }
        .seo-nav-link {
            font-size: 10px !important;
            padding: 6px 3px !important;
        }
        .hdr-cta .btn span {
            display: none !important;
        }
        .hdr-cta .btn {
            padding: 8px 10px !important;
        }
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
            <a href="/" class="seo-nav-link">أفضل شركة عزل فوم أسطح بالقصيم</a>
            <a href="/" class="seo-nav-link">foam-roof-insulation-qassim</a>
        </nav>
        <div class="hdr-cta" style="display: flex; gap: 8px; align-items: center;">
            <a class="btn" id="hCta" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','header')" style="background: #e07b0f; color: #fff; padding: 7px 16px; border-radius: 50px; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-phone-alt" style="font-size: 13px;"></i>
                <span id="hCTA">اتصل الان</span>
            </a>
            <a class="btn" id="hWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','header')" style="background: #10b981; color: #fff; padding: 7px 16px; border-radius: 50px; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-comment" style="font-size: 14px;"></i>
                <span id="hWaT">{{ $hdr['wa'] ?? 'واتساب' }}</span>
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
    </div>
</header>
