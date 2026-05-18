<header id="HDR">
    <div class="hdr">
        <a class="logo" href="/" style="text-decoration:none;color:inherit;cursor:pointer;display:flex;align-items:center;gap:12px">
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
        </nav>
        <div class="hdr-cta" style="display: flex; gap: 8px; align-items: center;">
            <a class="btn" id="hWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','header')" style="background: #10b981; color: #fff; padding: 7px 16px; border-radius: 50px; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-comment" style="font-size: 14px;"></i>
                <span id="hWaT">{{ $hdr['wa'] ?? 'واتساب' }}</span>
            </a>
            <a class="btn" id="hCta" onclick="openReq()" style="background: #e07b0f; color: #fff; padding: 7px 16px; border-radius: 50px; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-calendar-alt" style="font-size: 13px;"></i>
                <span>{{ $hdr['cta'] ?? 'احصل على عرض' }}</span>
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
    </div>
</header>
