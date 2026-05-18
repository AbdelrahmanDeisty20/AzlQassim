@extends('layouts.app')

@section('title', 'أعمالنا | عزل القصيم')

@section('content')
<div class="page active" id="page-gallery">
    <!-- Breadcrumbs -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <span>أعمالنا</span>
            </div>
            <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: rgba(255,255,255,0.85); margin-bottom: 8px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
            <h2>أعمالنا</h2>
            <p>صور حقيقية من مشاريعنا المنجزة</p>
        </div>
    </div>
    
    <!-- Filter category buttons & Dynamic grid -->
    <section class="sec">
        <div class="con">
            <div class="gal-f" id="galF2">
                <button class="gf act" onclick="fGal2('photos', this)" style="background: rgba(224, 123, 15, 0.06); color: var(--am); border-color: var(--am);">معرض الصور</button>
                <button class="gf" onclick="fGal2('videos', this)">فيديوهات</button>
            </div>
            <div class="gal-g" id="galPg">
                @foreach($gallery as $gal)
                    @php
                        $isVideo = $gal->cat === 'فيديو' || $gal->cat === 'video' || (!empty($gal->img) && (Str::endsWith($gal->img, '.mp4') || Str::contains($gal->img, 'youtube.com') || Str::contains($gal->img, 'youtu.be')));
                    @endphp
                    @if(!$isVideo)
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
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
