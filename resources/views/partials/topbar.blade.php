<div class="topbar">
    <div class="con">
        <div style="display:flex;gap:16px;align-items:center">
            <a href="tel:{{ $contact['ph'] ?? '966500000000' }}" id="tPh" onclick="tC('phone','topbar')" style="text-decoration:none;color:inherit">
                <i class="fas fa-phone"></i>
                <span id="tPhT">{{ $contact['ph'] ?? '0550000000' }}</span>
            </a>
            <a href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" id="tWa" target="_blank" onclick="tC('whatsapp','topbar')" style="text-decoration:none;color:inherit">
                <i class="fab fa-whatsapp"></i> واتساب
            </a>
            <span style="color:rgba(255,255,255,.35)">|</span>
            <span style="font-size:11px;color:rgba(255,255,255,.55)">
                <i class="fas fa-clock"></i> 
                <span id="tHr">{{ $contact['hr'] ?? 'السبت-الخميس: 7ص-10م' }}</span>
            </span>
        </div>
        <div class="tb-r">
            @if(!empty($ftr['sn'])) <a href="{{ $ftr['sn'] }}" id="tSn" target="_blank"><i class="fab fa-snapchat"></i></a> @endif
            @if(!empty($ftr['ig'])) <a href="{{ $ftr['ig'] }}" id="tIg" target="_blank"><i class="fab fa-instagram"></i></a> @endif
            @if(!empty($ftr['tw'])) <a href="{{ $ftr['tw'] }}" id="tTw" target="_blank"><i class="fab fa-twitter"></i></a> @endif
            @if(!empty($ftr['yt'])) <a href="{{ $ftr['yt'] }}" id="tYt" target="_blank"><i class="fab fa-youtube"></i></a> @endif
            <span style="color:rgba(255,255,255,.3)">|</span>
            <a href="/admin" style="font-size:11px;opacity:.5"><i class="fas fa-lock"></i></a>
        </div>
    </div>
</div>
