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
                <button class="gf act" onclick="filterGalleryBlade('photos', this)" style="background: rgba(224, 123, 15, 0.06); color: var(--am); border-color: var(--am);">معرض الصور</button>
                <button class="gf" onclick="filterGalleryBlade('videos', this)">فيديوهات</button>
            </div>
            <div class="gal-g" id="galPg">
                @foreach($gallery as $gal)
                    @php
                        $isVideo = !empty($gal->video) || $gal->cat === 'فيديو' || $gal->cat === 'video';
                    @endphp
                    @if($isVideo)
                        @php
                            $videoUrl = $gal->video;
                            $ytId = '';
                            if (Str::contains($videoUrl, 'youtube.com') || Str::contains($videoUrl, 'youtu.be')) {
                                if (Str::contains($videoUrl, 'embed/')) {
                                    $ytId = explode('?', explode('embed/', $videoUrl)[1])[0];
                                } elseif (Str::contains($videoUrl, 'watch?v=')) {
                                    $ytId = explode('&', explode('watch?v=', $videoUrl)[1])[0];
                                } elseif (Str::contains($videoUrl, 'youtu.be/')) {
                                    $ytId = explode('?', explode('youtu.be/', $videoUrl)[1])[0];
                                }
                            }
                            $thumb = $ytId ? "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg" : "";
                            // Encode path segments for Apache compatibility (spaces in filenames)
                            $encodedVideoUrl = $ytId ? $videoUrl : '/' . implode('/', array_map('rawurlencode', explode('/', ltrim($videoUrl, '/'))));
                        @endphp
                        <div class="gi video-card video-item-el" onclick="openVid('{{ $videoUrl }}')" style="cursor:pointer; display:none;">
                            <div class="gi-img-wrap" style="background:#080f1e; display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden;">
                                @if($ytId)
                                    <img src="{{ $thumb }}" style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <video src="{{ $encodedVideoUrl }}#t=0.5" preload="metadata" muted playsinline style="width:100%; height:100%; object-fit:cover; pointer-events:none;"></video>
                                @endif
                                <div style="position:absolute; inset:0; background:rgba(15,36,65,0.4); display:flex; align-items:center; justify-content:center;">
                                    <div class="play-btn-pulse" style="width:60px; height:60px; border-radius:50%; background:var(--am); display:flex; align-items:center; justify-content:center; color:#fff; font-size:22px; box-shadow:0 0 20px var(--am); transition:all 0.3s;">
                                        <i class="fas fa-play" style="margin-left:-3px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-title">{{ $gal->title }}</h3>
                            </div>
                        </div>
                    @else
                        @php
                            $hasImg = !empty($gal->img);
                        @endphp
                        <div class="gi photo-item-el" style="display:block;">
                            <div class="gi-img-wrap" style="{{ $hasImg ? '' : 'background:' . ($gal->color ?? '#0f2441') }}">
                                @if($hasImg)
                                    <img src="{{ $gal->img }}" onerror="this.style.display='none'">
                                @else
                                    <div class="gi-ph">
                                        <i class="fas {{ $gal->icon ?? 'fa-image' }}"></i>
                                    </div>
                                @endif
                                <div class="gi-ov">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</div>

<script>
function filterGalleryBlade(type, btn) {
    document.querySelectorAll('#galF2 .gf').forEach(b => {
        b.classList.remove('act');
        b.style.background = '#fff';
        b.style.color = 'var(--cc)';
        b.style.borderColor = 'var(--sl2)';
    });
    if (btn) {
        btn.classList.add('act');
        btn.style.background = 'rgba(224, 123, 15, 0.06)';
        btn.style.color = 'var(--am)';
        btn.style.borderColor = 'var(--am)';
    }

    if (type === 'photos') {
        document.querySelectorAll('.photo-item-el').forEach(el => el.style.display = 'block');
        document.querySelectorAll('.video-item-el').forEach(el => el.style.display = 'none');
    } else {
        document.querySelectorAll('.photo-item-el').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.video-item-el').forEach(el => el.style.display = 'block');
    }
}
</script>
@endsection
