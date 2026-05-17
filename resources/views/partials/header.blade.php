<header id="HDR">
    <div class="hdr">
        <a class="logo" href="/" style="text-decoration:none;color:inherit;cursor:pointer">
            <div class="logo-ic"><i class="fas fa-layer-group"></i></div>
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
        <div class="hdr-cta">
            <a class="btn btn-wa" id="hWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','header')">
                <i class="fab fa-whatsapp"></i>
                <span id="hWaT">{{ $hdr['wa'] ?? 'واتساب' }}</span>
            </a>
            <a class="btn btn-am" onclick="openReq()">
                <i class="fas fa-calendar-check"></i>
                <span id="hCTA">{{ $hdr['cta'] ?? 'احصل على عرض' }}</span>
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
