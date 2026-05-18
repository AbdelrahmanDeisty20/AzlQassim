@extends('layouts.app')

@section('title', 'معرض الأعمال | عزل القصيم')

@section('content')
<div class="page active" id="page-gallery">
    <!-- Breadcrumbs -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <span>معرض الأعمال</span>
            </div>
            <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: rgba(255,255,255,0.85); margin-bottom: 8px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
            <h2>معرض الأعمال</h2>
            <p>صور حقيقية من مشاريعنا المنجزة</p>
        </div>
    </div>
    
    <!-- Filter category buttons & Dynamic grid -->
    <section class="sec">
        <div class="con">
            <div class="gal-f" id="galF2">
                <button class="gf act" onclick="fGal2('all', this)">الكل</button>
                <button class="gf" onclick="fGal2('روف', this)">عزل أسطح</button>
                <button class="gf" onclick="fGal2('فوم', this)">عزل فوم</button>
                <button class="gf" onclick="fGal2('خزان', this)">خزانات</button>
                <button class="gf" onclick="fGal2('حمام', this)">حمامات</button>
            </div>
            <div class="gal-g" id="galPg">
                @foreach($gallery as $gal)
                    @php
                        $hasImg = !empty($gal->img);
                    @endphp
                    <div class="gi">
                        <div class="gi-img-wrap" style="{{ $hasImg ? '' : 'background:' . ($gal->color ?? '#0f2441') }}">
                            @if($hasImg)
                                <img src="{{ $gal->img }}" onerror="this.style.display='none'">
                            @else
                                <div class="gi-ph">
                                    <i class="fas {{ $gal->icon ?? 'fa-image' }}"></i>
                                </div>
                            @endif
                            <span class="gtype {{ $gal->type === 'before' ? 'bf' : 'af' }}">{{ $gal->type === 'before' ? 'قبل' : 'بعد' }}</span>
                            <div class="gi-ov">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gi-content">
                            <h3 class="gi-title">{{ $gal->title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
