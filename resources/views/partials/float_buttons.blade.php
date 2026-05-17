<div class="flt">
    <a class="fl fl-wa" id="flWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','float')">
        <i class="fab fa-whatsapp"></i>
        <span class="tip">واتساب</span>
    </a>
    <a class="fl fl-ph" id="flPh" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','float')">
        <i class="fas fa-phone"></i>
        <span class="tip">اتصل الآن</span>
    </a>
</div>
