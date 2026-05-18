@extends('layouts.app')

@section('title', 'مناطق الخدمة | عزل القصيم')

@section('content')
<div class="page active" id="page-areas">
    <!-- Breadcrumbs -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <span>مناطق الخدمة</span>
            </div>
            <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: rgba(255,255,255,0.85); margin-bottom: 8px;">أفضل شركة عزل فوم بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
            <h2>مناطق الخدمة</h2>
            <p>نصل إليك في كل أنحاء القصيم وبريدة وحائل</p>
        </div>
    </div>
    
    <!-- Dynamic Area list rendered by PHP -->
    <section class="sec">
        <div class="con">
            <div id="arPg">
                @foreach($areas as $ar)
                    <div class="adet">
                        <h3>{{ $ar->emoji ?? '📍' }} عزل الأسطح في {{ $ar->name }}</h3>
                        <p>{{ $ar->desc }}</p>
                        <div class="atags">
                            @foreach($services->slice(0, 5) as $sv)
                                <span class="atag">{{ $sv->name }}</span>
                            @endforeach
                        </div>
                        @if(!empty($ar->kws))
                            <div class="akws"><strong>الكلمات المفتاحية:</strong> {{ $ar->kws }}</div>
                        @endif
                        <div style="margin-top:14px;display:flex;gap:10px;flex-wrap:wrap">
                            <a class="btn btn-am" onclick="openReq()" style="font-size:13px;padding:10px 18px;cursor:pointer">
                                <i class="fas fa-calendar-check"></i>احصل على عرض في {{ $ar->name }}
                            </a>
                            <a class="btn btn-wa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" style="font-size:13px;padding:10px 18px;display:inline-flex" target="_blank">
                                <i class="fab fa-whatsapp"></i>واتساب
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
