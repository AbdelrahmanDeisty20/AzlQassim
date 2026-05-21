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
                        <div class="gi photo-item-el" style="display:block;" onclick="{{ $hasImg ? 'openLightbox(this)' : '' }}"
                             data-img="{{ $gal->img ?? '' }}" data-title="{{ $gal->title ?? '' }}" style="cursor:{{ $hasImg ? 'zoom-in' : 'default' }}">
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

<!-- Lightbox Modal -->
<div id="lbModal" onclick="closeLightboxOutside(event)" style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(0,0,0,0.92); align-items:center; justify-content:center; flex-direction:column; padding:20px;">
    <style>
        #lbModal { transition: opacity .3s; }
        #lbModal.lb-open { display:flex !important; opacity:1; }
        #lbImg { max-width:92vw; max-height:82vh; border-radius:10px; object-fit:contain; box-shadow:0 20px 60px rgba(0,0,0,0.7); transition:transform .25s; }
        #lbModal .lb-close { position:fixed; top:18px; left:18px; width:44px; height:44px; border-radius:50%; background:rgba(255,255,255,0.12); border:none; color:#fff; font-size:20px; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:background .2s; }
        #lbModal .lb-close:hover { background:rgba(255,255,255,0.25); }
        #lbModal .lb-nav { position:fixed; top:50%; transform:translateY(-50%); width:46px; height:46px; border-radius:50%; background:rgba(255,255,255,0.12); border:none; color:#fff; font-size:18px; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:background .2s; }
        #lbModal .lb-nav:hover { background:rgba(197,168,128,0.5); }
        #lbModal .lb-prev { right:18px; }
        #lbModal .lb-next { left:18px; }
        #lbTitle { color:rgba(255,255,255,0.8); font-size:13px; margin-top:12px; text-align:center; }
        #lbCounter { color:rgba(255,255,255,0.4); font-size:11px; margin-top:4px; }
    </style>
    <button class="lb-close" onclick="closeLightbox()"><i class="fas fa-times"></i></button>
    <button class="lb-nav lb-prev" onclick="lbPrev(event)"><i class="fas fa-chevron-right"></i></button>
    <button class="lb-nav lb-next" onclick="lbNext(event)"><i class="fas fa-chevron-left"></i></button>
    <img id="lbImg" src="" alt="">
</div>

<script>
let lbItems = [], lbIdx = 0;

function buildLbItems() {
    lbItems = [];
    document.querySelectorAll('.photo-item-el[data-img]').forEach(el => {
        const img = el.getAttribute('data-img');
        const title = el.getAttribute('data-title');
        if (img) lbItems.push({ img, title });
    });
}

function openLightbox(el) {
    buildLbItems();
    const img = el.getAttribute('data-img');
    lbIdx = lbItems.findIndex(i => i.img === img);
    if (lbIdx < 0) lbIdx = 0;
    showLbItem();
    document.getElementById('lbModal').classList.add('lb-open');
    document.body.style.overflow = 'hidden';
}

function showLbItem() {
    const item = lbItems[lbIdx];
    if (!item) return;
    const lbImg = document.getElementById('lbImg');
    lbImg.style.transform = 'scale(0.92)';
    setTimeout(() => {
        lbImg.src = item.img;
        lbImg.style.transform = 'scale(1)';
    }, 80);
}

function lbPrev(e) { e.stopPropagation(); lbIdx = (lbIdx - 1 + lbItems.length) % lbItems.length; showLbItem(); }
function lbNext(e) { e.stopPropagation(); lbIdx = (lbIdx + 1) % lbItems.length; showLbItem(); }

function closeLightbox() {
    document.getElementById('lbModal').classList.remove('lb-open');
    document.getElementById('lbModal').style.display = 'none';
    document.body.style.overflow = '';
}

function closeLightboxOutside(e) {
    if (e.target === document.getElementById('lbModal')) closeLightbox();
}

document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('lbModal');
    if (!modal.classList.contains('lb-open')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight' || e.key === 'ArrowUp') lbPrev(e);
    if (e.key === 'ArrowLeft' || e.key === 'ArrowDown') lbNext(e);
});

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
