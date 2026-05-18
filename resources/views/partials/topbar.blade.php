<div class="topbar" style="background: var(--nv); border-bottom: 2px solid var(--am); padding: 10px 0;">
    <div class="con" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
        <!-- Right side: Logo & Brand Name -->
        <div class="tb-brand" style="display: flex; gap: 8px; align-items: center; color: #fff;">
            <i class="fas fa-layer-group" style="color: var(--am); font-size: 16px;"></i>
            <span style="font-size: clamp(12.5px, 3.8vw, 15px); font-weight: 800; color: #fff; letter-spacing: 0.5px;">رونق قلب الخليج للعزل الفوم الأمريكي</span>
        </div>

        <!-- Left side: Phone Number, WhatsApp, Working Hours, & Lock Link -->
        <div style="display: flex; gap: 14px; align-items: center; flex-wrap: wrap;">
            <!-- Phone -->
            <a href="tel:{{ $contact['ph'] ?? '0550000000' }}" id="tPh" class="tb-phone" onclick="tC('phone','topbar')" style="text-decoration: none; color: #fff !important; font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 6px; transition: var(--tr);">
                <i class="fas fa-phone" style="color: var(--am); font-size: 12px;"></i>
                <span id="tPhT" style="color: #fff !important; font-weight: 700;">{{ $contact['ph'] ?? '0550000000' }}</span>
            </a>
            
            <!-- WhatsApp -->
            <a href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" id="tWa" class="tb-wa" target="_blank" onclick="tC('whatsapp','topbar')" style="text-decoration: none; color: #fff !important; font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 6px; transition: var(--tr);">
                <i class="fab fa-whatsapp" style="color: #25d366; font-size: 14px;"></i> 
                <span style="color: #fff !important; font-weight: 700;">واتساب</span>
            </a>
            
            <span class="tb-sep" style="color: rgba(255,255,255,.2)">|</span>
            
            <!-- Working Hours -->
            <span class="tb-hours" style="font-size: 12px; color: #fff; display: inline-flex; align-items: center; gap: 6px;">
                <i class="fas fa-clock" style="color: var(--am); font-size: 12px;"></i> 
                <span id="tHr" style="font-weight: 700; color: #fff;">{{ $contact['hr'] ?? 'كل أيام الأسبوع 24 ساعة اتصل في أي وقت' }}</span>
            </span>
            
            <span class="tb-sep" style="color: rgba(255,255,255,.2)">|</span>
            
            <!-- Lock Icon -->
            <a href="/admin" style="font-size: 11px; opacity: .5; color: #fff !important; display: inline-flex; align-items: center; transition: var(--tr);"><i class="fas fa-lock"></i></a>
        </div>
    </div>
</div>

