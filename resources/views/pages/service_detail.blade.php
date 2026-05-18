@extends('layouts.app')

@section('title', $service->name . ' | عزل القصيم')

@section('content')
<div class="page active" id="page-svc">
    <!-- Breadcrumbs & Header details dynamically populated -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <a href="/services" style="text-decoration:none;color:inherit;cursor:pointer">خدماتنا</a>
                <i class="fas fa-chevron-left"></i>
                <span id="svcBr">{{ $service->name }}</span>
            </div>
            <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: rgba(255,255,255,0.85); margin-bottom: 8px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
            <h2 id="svcTt">{{ $service->name }}</h2>
            <p id="svcSh">{{ $service->short }}</p>
        </div>
    </div>
    
    <!-- Detail grid layout -->
    <section class="sec">
        <div class="con">
            <div class="svc-lay">
                <!-- Main Body -->
                <div class="svc-body">
                    <div id="svcIW" style="width:100%;aspect-ratio:16/6;border-radius:var(--r2);overflow:hidden;margin-bottom:22px;background:linear-gradient(135deg,var(--nv),var(--nv2));display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,.3);font-size:60px">
                        @if(!empty($service->img))
                            <img src="{{ $service->img }}" style="width:100%;height:100%;object-fit:cover" onerror="this.parentNode.innerHTML='<i class=\'fas {{ $service->icon ?? "fa-tools" }}\' style=\'font-size:60px\'></i>'">
                        @else
                            <i class="fas {{ $service->icon ?? 'fa-tools' }}"></i>
                        @endif
                    </div>
                    
                    <h3>عن هذه الخدمة</h3>
                    <p id="svcDs" style="line-height:2;color:var(--cc);font-size:15px;margin-bottom:28px">{!! nl2br(e($service->desc ?? $service->short)) !!}</p>
                    
                    <h3>مميزات الخدمة</h3>
                    <div class="sf-l" id="svcFt" style="margin-bottom:28px">
                        @foreach(explode("\n", $service->feats) as $f)
                            @if(trim($f))
                                <div class="sf"><i class="fas fa-check-circle"></i>{{ trim($f) }}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <!-- Sidebar widgets -->
                <div class="svc-side">
                    <div class="scta">
                        <h4>احصل على عرض مجاني</h4>
                        <p>معاينة مجانية لسطحك وعرض سعر شفاف</p>
                        <a class="btn btn-am" onclick="openReq()" style="display:flex;cursor:pointer">
                            <i class="fas fa-calendar-check"></i>احصل على عرض
                        </a>
                        <a class="btn btn-wa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','service')" style="display:flex">
                            <i class="fab fa-whatsapp"></i>واتساب
                        </a>
                        <a class="btn" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','service')" style="background:rgba(255,255,255,.15);color:#fff;display:flex;border:1px solid rgba(255,255,255,.3)">
                            <i class="fas fa-phone"></i>اتصل الآن
                        </a>
                    </div>
                    
                    <div class="sc2">
                        <h4>خدمات أخرى</h4>
                        <div id="relS">
                            @foreach($services as $rel)
                                <a href="/services/{{ $rel->id }}" class="rs" style="text-decoration:none;color:inherit;cursor:pointer">
                                    <i class="fas {{ $rel->icon ?? 'fa-tools' }}"></i>{{ $rel->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
