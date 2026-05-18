@extends('layouts.app')

@section('title', 'خدماتنا | عزل القصيم')

@section('content')
<div class="page active" id="page-services">
    <!-- Page Breadcrumbs -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <span>خدماتنا</span>
            </div>
            <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: rgba(255,255,255,0.85); margin-bottom: 8px;">أفضل شركة عزل فوم بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
            <h2>خدماتنا المتكاملة</h2>
            <p>أشمل حلول العزل في القصيم وبريدة وحائل</p>
        </div>
    </div>
    
    <!-- Services List -->
    <section class="sec">
        <div class="con">
            <div class="svcs-g" id="svcsP">
                @foreach($services as $svc)
                    <a href="/services/{{ $svc->id }}" class="svc-c" style="text-decoration:none;color:inherit;cursor:pointer">
                        @if(!empty($svc->img))
                            <img src="{{ $svc->img }}" class="svc-img" onerror="this.style.display='none'">
                        @endif
                        <div class="svc-ic"><i class="fas {{ $svc->icon ?? 'fa-tools' }}"></i></div>
                        <h3>{{ $svc->name }}</h3>
                        <p>{{ $svc->short }}</p>
                        <span class="svc-more">تفاصيل <i class="fas fa-arrow-left"></i></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
