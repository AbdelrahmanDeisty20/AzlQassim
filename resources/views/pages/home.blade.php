@extends('layouts.app')

@section('title', 'عزل القصيم | أفضل شركة عزل أسطح بالقصيم وبريدة وحائل')

@section('content')
<div class="page active" id="page-home">
    <!-- Hero Section -->
    <section class="hero" style="{{ !empty($hero['bg']) ? 'background-image: linear-gradient(rgba(15, 36, 65, 0.85), rgba(15, 36, 65, 0.95)), url(' . $hero['bg'] . ') !important;' : '' }}">
        <div class="con hw">
            <div class="hg">
                <div>
                    <!-- Hidden placeholder for JS compatibility -->
                    <span id="hKW" style="display: none;">القصيم وكل مدن المملكة</span>
                    
                    <!-- Main Title -->
                    <h1 style="font-size: clamp(26px, 5.5vw, 44px); font-weight: 900; line-height: 1.25; color: #fff; margin-bottom: 8px;">
                        أفضل شركة عزل فوم أسطح بالقصيم
                    </h1>
                    
                    <!-- Subtitle -->
                    <h2 style="font-size: clamp(18px, 4vw, 28px); font-weight: 800; color: var(--am); margin-bottom: 18px;">
                        رونق قلب الخليج للعزل الأمريكي
                    </h2>

                    <!-- Organized Bullet List (filling page layout) -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin-bottom: 24px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); padding: 18px; border-radius: var(--r); backdrop-filter: blur(8px);">
                        
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: rgba(255, 255, 255, 0.08); color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px;">
                                <i class="fas fa-flag-usa" style="color: #e63946;"></i>
                            </div>
                            <span style="color: #fff; font-weight: 700; font-size: clamp(13px, 3.5vw, 15px);">عزل فوم أمريكي أصلي من مصنع هانتسمان الأمريكي</span>
                        </div>
                        
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: rgba(255, 255, 255, 0.08); color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px; border: 1px solid #ffd700;">
                                <i class="fas fa-shield-alt" style="color: #ffd700;"></i>
                            </div>
                            <span style="color: #ffd700; font-weight: 800; font-size: clamp(13px, 3.5vw, 15px);">ضمان ذهبي معتمد موثق لمدة ١٥ عام</span>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: rgba(255, 255, 255, 0.08); color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px;">
                                <i class="fas fa-globe" style="color: #4ea8de;"></i>
                            </div>
                            <span style="color: #fff; font-weight: 700; font-size: clamp(13px, 3.5vw, 15px);">عزل مائي وحراري مزدوج متكامل طبقا للمواصفات العالمية والمواصفات القياسية السعودية</span>
                        </div>
                        
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: rgba(255, 255, 255, 0.08); color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px;">
                                <i class="fas fa-building" style="color: #52b788;"></i>
                            </div>
                            <span style="color: #fff; font-weight: 700; font-size: clamp(13px, 3.5vw, 15px);">اعتمادات شركات الكهرباء والمياة الوطنية والغاز</span>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: rgba(255, 255, 255, 0.08); color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px;">
                                <i class="fas fa-users-cog" style="color: #e07b0f;"></i>
                            </div>
                            <span style="color: #fff; font-weight: 700; font-size: clamp(13px, 3.5vw, 15px);">فريق عمل احترافي متخصص ومدرب علي تنفيذ العزل الأمريكي</span>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: rgba(255, 255, 255, 0.08); color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px;">
                                <i class="fas fa-headset" style="color: #ffd166;"></i>
                            </div>
                            <span style="color: #fff; font-weight: 700; font-size: clamp(13px, 3.5vw, 15px);">خدمة عملاء ٢٤ ساعة والمعاينة مجانية وفورية</span>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: rgba(255, 255, 255, 0.08); color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px;">
                                <i class="fas fa-percent" style="color: #ff4d6d;"></i>
                            </div>
                            <span style="color: #fff; font-weight: 700; font-size: clamp(13px, 3.5vw, 15px);">خصومات لكل مدن القصيم تصل ل ٢٥ ٪</span>
                        </div>
                        
                        <div style="display: flex; gap: 12px; align-items: center; grid-column: 1 / -1;">
                            <div style="background: #e63946; color: #fff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 16px; box-shadow: 0 0 12px rgba(230, 57, 70, 0.5);">
                                <i class="fas fa-star" style="color: #fff;"></i>
                            </div>
                            <span style="color: #fff; font-weight: 800; font-size: clamp(13.5px, 3.8vw, 15.5px);">اطلب الخبير للمعاينة المجانية علي مدار اليوم</span>
                        </div>
                        
                    </div>

                    <!-- Licensing and Classification Badge -->
                    <div style="margin-bottom: 24px; display: flex; flex-wrap: wrap; gap: 12px; align-items: center;">
                        <span style="background: rgba(82, 183, 136, 0.22); border: 1.5px solid rgba(82, 183, 136, 0.6); color: #ffffff; padding: 8px 18px; border-radius: var(--r); font-weight: 800; font-size: clamp(12px, 3.5vw, 14px); display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(82, 183, 136, 0.1);">
                            <i class="fas fa-check-circle" style="color: #74c69d; font-size: 15px;"></i>
                            رخصة بلدية رقم: <strong style="font-size: 15.5px; color: #ffd700; font-weight: 900; letter-spacing: 0.5px; margin-right: 4px; direction: ltr; display: inline-block;">{{ $hdr['lic_no'] ?? '441212615580' }}</strong>
                        </span>
                        <span style="background: rgba(78, 168, 222, 0.22); border: 1.5px solid rgba(78, 168, 222, 0.6); color: #ffffff; padding: 8px 18px; border-radius: var(--r); font-weight: 800; font-size: clamp(12px, 3.5vw, 14px); display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(78, 168, 222, 0.1);">
                            <i class="fas fa-id-card" style="color: #70d6ff; font-size: 15px;"></i>
                            عضوية هيئة المقاولين رقم: <strong style="font-size: 15.5px; color: #70d6ff; font-weight: 900; letter-spacing: 0.5px; margin-right: 4px; direction: ltr; display: inline-block;">{{ $hdr['sca_no'] ?? '31109580340003' }}</strong>
                        </span>
                        <span style="background: rgba(230, 57, 70, 0.22); border: 1.5px solid rgba(230, 57, 70, 0.6); color: #ffffff; padding: 8px 18px; border-radius: var(--r); font-weight: 800; font-size: clamp(12px, 3.5vw, 14px); display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(230, 57, 70, 0.1);">
                            <i class="fas fa-award" style="color: #ff4d6d; font-size: 15px;"></i>
                            شهادة تصنيف رقم: <strong style="font-size: 15.5px; color: #ffccd5; font-weight: 900; letter-spacing: 0.5px; margin-right: 4px; direction: ltr; display: inline-block;">{{ $hdr['cls_no'] ?? '2024005835' }}</strong> فئة ممتازة
                        </span>
                    </div>

                    <!-- Call & WhatsApp Action Buttons -->
                    <div class="hacts" style="margin-bottom: 24px; display: flex; flex-wrap: wrap; gap: 12px;">
                        <a class="btn" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','hero')" style="background: #10b981; color: #fff; padding: 12px 28px; border-radius: 50px; font-weight: 700; font-size: 15px; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; box-shadow: 0 4px 15px rgba(16,185,129,0.25); transition: all 0.3s ease;">
                            <i class="fas fa-comment" style="font-size: 18px;"></i>
                            <span>واتساب</span>
                        </a>
                        <a class="btn" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','hero')" style="background: #1d3557; color: #fff; padding: 12px 28px; border-radius: 50px; font-weight: 700; font-size: 15px; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; box-shadow: 0 4px 15px rgba(29,53,87,0.25); transition: all 0.3s ease;">
                            <i class="fas fa-phone-alt" style="font-size: 14px;"></i>
                            <span>اتصل الآن</span>
                        </a>
                    </div>
                </div>
                
                <div class="h-card">
                    <div class="h-stat-n">
                        <div class="num" id="hS1">1200+</div>
                        <div class="lbl" id="hS1L">مشروع عزل ناجح بالقصيم</div>
                    </div>
                    <div class="h-stat-n">
                        <div class="num" id="hS2">9000+</div>
                        <div class="lbl" id="hS2L">مشروع عزل ناجح بكل مدن المملكة</div>
                    </div>
                    <div class="h-stat-n">
                        <div class="num" id="hS3">15</div>
                        <div class="lbl" id="hS3L">سنة ضمان ذهبي معتمد</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Dedicated SEO & Feature Rich Text Section -->
    <section class="sec" style="background: #ffffff; padding: 60px 0; border-bottom: 1px solid rgba(15,36,65,0.06);">
        <div class="con">
            <div style="max-width: 1000px; margin: 0 auto; text-align: center;">
                
                <h2 style="font-size: clamp(22px, 5.5vw, 36px); font-weight: 900; color: #0f2441; margin-bottom: 24px; display: inline-flex; align-items: center; gap: 12px; justify-content: center; width: 100%;">
                    <i class="fas fa-layer-group" style="color: var(--am);"></i>
                    {{ $about['title'] ?? 'أفضل شركة عزل أسطح بالقصيم' }}
                </h2>
                
                <div style="background: #ffffff; border: 2px solid rgba(15, 36, 65, 0.1); border-radius: var(--r2); padding: clamp(20px, 5vw, 36px); box-shadow: 0 15px 40px rgba(15,36,65,0.05); text-align: justify; line-height: 2.1; direction: rtl;">
                    
                    <p style="font-size: clamp(15.5px, 3.8vw, 19.5px); font-weight: 800; color: #0f2441; margin-bottom: 24px; text-indent: 20px;">
                        {{ $about['text1'] ?? 'نحن لا نقدم مجرد عزل بل نقدم حماية تدوم لأجيال عديدة وذلك باستخدام أحدث تقنيات العزل الأمريكي المزدوج المائي والحراري وذلك بتنفيذ احترافي بفريق عمل متخصص ومدرب علي تنفيذ العزل الأمريكي لضمان دقة الرش والكثافة وضمان التغطية الشاملة لسطح المبني بلا فراغات والوصول لأدق الزوايا والشقوق ليخلق طبقة واحدة متصلة تمنع تماما دخول الحرارة وتوفر ٤٠٪ من فاتورة الكهرباء وتمنع تسرب المياة والأمطار وتمنع دخول الحشرات وتطيل العمر الافتراضي للمبني.' }}
                    </p>
                    
                    <p style="font-size: clamp(15.5px, 3.8vw, 19.5px); font-weight: 800; color: #0f2441; margin-bottom: 28px; padding-right: 14px; border-right: 4px solid var(--am);">
                        {{ $about['text2'] ?? 'وشركتنا مرخصة ومعتمدة لدي شركة الكهرباء والمياة الوطنية مما يضمن لك مطابقة العمل للمواصفات القياسية السعودية بأعلى معايير الجودة وطبقاً للمواصفات العالمية ونمنحك شهادة ضمان موثقة ومعتمدة لدي شركات الكهرباء والمياة الوطنية لمدة ١٥ عام.' }}
                    </p>
                    
                    <!-- Government & SCA Official Badges Grid -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin-top: 30px;">
                        
                        <div style="background: rgba(82, 183, 136, 0.08); border: 2px solid rgba(82, 183, 136, 0.3); border-radius: var(--r); padding: 18px; display: flex; align-items: center; gap: 14px; text-align: right;">
                            <div style="background: #52b788; color: #fff; width: 46px; height: 46px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; box-shadow: 0 4px 10px rgba(82, 183, 136, 0.2);">
                                <i class="fas fa-file-signature"></i>
                            </div>
                            <div>
                                <div style="font-size: 13.5px; color: #52b788; font-weight: 800; margin-bottom: 4px;">رخصة البلدية الرسمية</div>
                                <div style="font-size: 17.5px; color: #0f2441; font-weight: 900; letter-spacing: 0.5px;">{{ $hdr['lic_no'] ?? '٤٤١٢١٢٦١٥٥٨٠' }}</div>
                            </div>
                        </div>
                        
                        <div style="background: rgba(78, 168, 222, 0.08); border: 2px solid rgba(78, 168, 222, 0.3); border-radius: var(--r); padding: 18px; display: flex; align-items: center; gap: 14px; text-align: right;">
                            <div style="background: #4ea8de; color: #fff; width: 46px; height: 46px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; box-shadow: 0 4px 10px rgba(78, 168, 222, 0.2);">
                                <i class="fas fa-id-badge"></i>
                            </div>
                            <div>
                                <div style="font-size: 13.5px; color: #4ea8de; font-weight: 800; margin-bottom: 4px;">عضوية الهيئة السعودية للمقاولين</div>
                                <div style="font-size: 17.5px; color: #0f2441; font-weight: 900; letter-spacing: 0.5px;">{{ $hdr['sca_no'] ?? '٣١١٠٩٥٨٠٣٤٠٠٠٠٣' }}</div>
                            </div>
                        </div>
                        
                        <div style="background: rgba(230, 57, 70, 0.08); border: 2px solid rgba(230, 57, 70, 0.3); border-radius: var(--r); padding: 18px; display: flex; align-items: center; gap: 14px; text-align: right;">
                            <div style="background: #e63946; color: #fff; width: 46px; height: 46px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; box-shadow: 0 4px 10px rgba(230, 57, 70, 0.2);">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div>
                                <div style="font-size: 13.5px; color: #e63946; font-weight: 800; margin-bottom: 4px;">شهادة تصنيف المقاولين</div>
                                <div style="font-size: 17.5px; color: #0f2441; font-weight: 900; letter-spacing: 0.5px;">فئة ممتازة - {{ $hdr['cls_no'] ?? '٢٠٢٤٠٠٥٨٣٥' }}</div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Video Testimonials Section -->
    <section class="sec" style="background: #f8f9fa; padding: 60px 0; border-bottom: 1px solid rgba(15,36,65,0.06);">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-video"></i>آراء مصورة</div>
                <h2>ماذا يقول <em>عملائنا</em></h2>
                <p>شاهد تجارب عملائنا الحقيقية وصوتهم في تقييم خدماتنا بالقصيم والمملكة</p>
            </div>
            
            <div class="tests-g" style="margin-top: 30px; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">
                @foreach($testimonials as $tst)
                    @php
                        $isVideo = !empty($tst->video) || $tst->svc === 'video' || $tst->svc === 'فيديو';
                    @endphp
                    @if($isVideo)
                        @php
                            $videoUrl = $tst->video;
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
                            // Encode path segments for Apache compatibility
                            $encodedVideoUrl = $ytId ? $videoUrl : '/' . implode('/', array_map('rawurlencode', explode('/', ltrim($videoUrl, '/'))));
                        @endphp
                        {{-- Video card --}}
                        <div class="tc home-test-video-item-el" onclick="openVid('{{ $videoUrl }}')" style="cursor:pointer; display:block; padding:0; overflow:hidden; position:relative; min-height:260px; max-width:480px; margin: 0 auto; width: 100%; background:#080f1e; border-radius:var(--r2); box-shadow:var(--sh);">
                            @if($ytId)
                                <img src="{{ $thumb }}" style="width:100%; height:100%; object-fit:cover; position:absolute; inset:0;">
                            @else
                                <video src="{{ $encodedVideoUrl }}#t=0.5" preload="metadata" muted playsinline style="width:100%; height:100%; object-fit:cover; position:absolute; inset:0; pointer-events:none;"></video>
                            @endif
                            <div style="position:absolute; inset:0; background:rgba(8,15,30,0.25); display:flex; align-items:center; justify-content:center;">
                                <div style="width:64px; height:64px; border-radius:50%; background:var(--am); display:flex; align-items:center; justify-content:center; color:#fff; font-size:26px; box-shadow:0 0 30px rgba(224,123,15,0.7); transition:transform 0.2s;" onmouseover="this.style.transform='scale(1.12)'" onmouseout="this.style.transform='scale(1)'">
                                    <i class="fas fa-play" style="margin-left:-3px;"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="sec">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-tools"></i>خدماتنا</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
                <h2>خدمات <em>العزل الاحترافية</em></h2>
                <p>أشمل حلول العزل للمنازل والفلل والمباني في القصيم وبريدة وحائل</p>
            </div>
            <div class="svcs-g" id="svcsG">
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
    
    <!-- Why Choose Us Section -->
    <section class="sec sec-alt">
        <div class="con">
            <div class="why-g">
                <div class="why-txt">
                    <div class="tag"><i class="fas fa-award"></i>لماذا نحن</div>
                    <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">أفضل شركة عزل فوم بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
                    <h2>{!! $why_us['title'] ?? 'لماذا تختار <em>عزل القصيم؟</em>' !!}</h2>
                    <p id="whyDsc">{{ $why_us['desc'] ?? 'نحن الخيار الأول لأهالي القصيم وبريدة وحائل. نجمع بين الخبرة الطويلة والتقنيات الحديثة لنضمن لك منزلاً محمياً من التسربات والحرارة.' }}</p>
                    <div class="why-list" id="whyL">
                        @foreach($whyItems as $wi)
                            <div class="wi" style="display: flex; align-items: {{ empty($wi->desc) ? 'center' : 'flex-start' }}; gap: 14px; margin-bottom: 20px;">
                                <div class="ic" style="display:flex;align-items:center;justify-content:center;width:48px;height:48px;border-radius:50%;background:rgba(197,168,128,0.1);color:var(--am);font-size:20px;flex-shrink:0">
                                    @if(!empty($wi->img))
                                        <img src="{{ $wi->img }}" style="width:28px;height:28px;object-fit:contain;border-radius:4px" onerror="this.outerHTML='<i class=\'fas {{ $wi->icon ?? "fa-check" }}\'></i>'">
                                    @else
                                        <i class="fas {{ $wi->icon ?? 'fa-check' }}"></i>
                                    @endif
                                </div>
                                <div style="display: flex; flex-direction: column; justify-content: center;">
                                    @if(empty($wi->desc))
                                        <h4 style="margin: 0; font-size: 16px; font-weight: 700; color: var(--nv); line-height: 1.4;">{{ $wi->title }}</h4>
                                    @else
                                        <h4 style="margin: 0 0 4px 0; font-size: 16px; font-weight: 700; color: var(--nv); line-height: 1.4;">{{ $wi->title }}</h4>
                                        <p style="margin: 0; font-size: 14px; color: var(--cc); line-height: 1.5;">{{ $wi->desc }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="why-vis">
                    <div class="why-img" id="whyImg" style="{{ !empty($about['img']) ? 'background:none;border:none;padding:0;width:100%;height:100%;min-height:350px;' : '' }}">
                        @if(!empty($about['img']))
                            <img src="{{ $about['img'] }}" style="width:100%;height:100%;object-fit:cover;border-radius:var(--r);box-shadow:0 8px 32px rgba(15,36,65,0.15)">
                        @else
                            <i class="fas fa-layer-group"></i>
                            <span>عزل الأسطح الاحترافي</span>
                        @endif
                    </div>
                    <div class="wcert">
                        <span class="n">{{ $hero['s2'] ?? '10' }}</span>
                        <span class="l">{{ $hero['s2l'] ?? 'سنوات ضمان' }}</span>
                    </div>
                    <div class="wcert2">
                        <div class="ic"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <strong>معتمدون رسمياً</strong>
                            <span>وزارة الشؤون البلدية</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Work Steps Section -->
    <section class="sec">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-list-ol"></i>{{ $how_we_work['tag'] ?? 'آلية العمل' }}</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">{{ $how_we_work['subtitle'] ?? 'أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام' }}</h3>
                <h2>{!! $how_we_work['title'] ?? 'كيف <em>نعمل؟</em>' !!}</h2>
                <p>{{ $how_we_work['desc'] ?? 'خطوات واضحة وشفافة للحصول على خدمة عزل احترافية' }}</p>
            </div>
            <div class="steps-g" id="stpsEl">
                @foreach($steps as $stp)
                    <div class="stc">
                        <div class="stn" style="display:flex;align-items:center;justify-content:center;overflow:hidden;border-radius:50%;width:60px;height:60px;background:rgba(197,168,128,0.1);border:2px solid var(--am);color:var(--am);font-weight:800;font-size:20px;margin:0 auto 20px">
                            @if(!empty($stp->img))
                                <img src="{{ $stp->img }}" style="width:100%;height:100%;object-fit:cover" onerror="this.outerHTML='{{ str_replace(['0','1','2','3','4','5','6','7','8','9'], ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'], $stp->num) }}'">
                            @else
                                {{ str_replace(['0','1','2','3','4','5','6','7','8','9'], ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'], $stp->num) }}
                            @endif
                        </div>
                        <h3>{{ $stp->title }}</h3>
                        <p>{{ $stp->desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Portfolio (سابقة أعمالنا) Section -->
    <section class="sec sec-alt" id="portfolio">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-history"></i>سابقة أعمالنا</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">مشاريع كبرى تم تنفيذها بأعلى جودة مطابقة لكود البناء السعودي</h3>
                <h2>سابقة <em>أعمال متميزة</em></h2>
                <p>نفخر بثقة عملائنا في تنفيذ كبرى مشاريع العزل المائي والحراري بمنطقة القصيم</p>
            </div>
            
            <div class="portfolio-grid-wrapper" style="display: grid; grid-template-columns: 1fr 270px; gap: 30px; margin-top: 40px; align-items: stretch;">
                
                <!-- Right Column: Portfolio Container -->
                <div class="portfolio-container" style="display: flex; flex-direction: column;">
                    <!-- Header (Hidden on Mobile) -->
                    <div class="portfolio-header-row" style="display: grid; grid-template-columns: 1fr 1.8fr 1fr; gap: 20px; background: var(--nv); color: #fff; padding: 18px 24px; border-radius: var(--r) var(--r) 0 0; font-weight: 700; text-align: right; box-shadow: var(--sh);">
                        <div style="font-size: 16px;"><i class="fas fa-building" style="margin-left: 8px; color: var(--am);"></i> اسم المشروع والجهة المستفيدة</div>
                        <div style="font-size: 16px;"><i class="fas fa-cogs" style="margin-left: 8px; color: var(--am);"></i> التوصيف التقني الدقيق وطريقة التنفيذ الحديثة بمواد العزل الأمريكية</div>
                        <div style="font-size: 16px;"><i class="fas fa-clipboard-check" style="margin-left: 8px; color: var(--am);"></i> حالة المشروع والاعتماد</div>
                    </div>

                    <!-- Portfolio Item Rows -->
                    @foreach($offers as $index => $proj)
                    <div class="portfolio-item-row" style="display: grid; grid-template-columns: 1fr 1.8fr 1fr; gap: 20px; background: #fff; padding: 24px; border: 1px solid rgba(15,36,65,0.08); border-top: none; @if($index === count($offers) - 1) border-radius: 0 0 var(--r) var(--r); @endif box-shadow: var(--sh); transition: transform 0.3s, box-shadow 0.3s; align-items: center; margin-bottom: 0;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 12px 30px rgba(15,36,65,0.1)';" onmouseout="this.style.transform='none'; this.style.boxShadow='var(--sh)';">
                        
                        <!-- Column 1: Project & Beneficiary -->
                        <div class="portfolio-col col-1" style="display: flex; align-items: center; gap: 14px;">
                            <div style="width: 42px; height: 42px; border-radius: 50%; background: rgba(197,168,128,0.1); color: var(--am); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; box-shadow: 0 4px 10px rgba(197,168,128,0.15);">
                                <i class="fas fa-building"></i>
                            </div>
                            <div>
                                <div style="font-size: 11px; color: var(--cc); font-weight: 800; margin-bottom: 3px; text-transform: uppercase; letter-spacing: 0.5px;">المشروع المعتمد</div>
                                <h4 style="font-size: 16px; font-weight: 800; color: var(--nv); margin: 0; line-height: 1.4;">{{ $proj->name }}</h4>
                            </div>
                        </div>

                        <!-- Column 2: Technical Specs -->
                        <div class="portfolio-col col-2" style="background: rgba(197,168,128,0.04); padding: 16px 20px; border-radius: var(--r); border-right: 4px solid var(--am); display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-shield-alt" style="color: var(--am); font-size: 18px; margin-top: 3px; flex-shrink: 0;"></i>
                            <p style="font-size: 14.5px; color: #333; line-height: 1.6; margin: 0; font-weight: 600;">{{ $proj->feats }}</p>
                        </div>

                        <!-- Column 3: Status & Accreditation -->
                        <div class="portfolio-col col-3" style="text-align: center; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                            <div style="background: rgba(26, 122, 69, 0.08); color: var(--gr); padding: 8px 16px; border-radius: 50px; font-weight: 800; font-size: 14px; display: inline-flex; align-items: center; gap: 8px; border: 1px solid rgba(26, 122, 69, 0.15);">
                                <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--gr); display: inline-block; animation: pulse-green 1.5s infinite;"></span>
                                {{ $proj->newP ?: 'تم التنفيذ والتسليم بنجاح' }}
                            </div>
                            <div style="font-size: 11.5px; color: var(--cc); font-weight: 700; display: flex; align-items: center; gap: 6px;">
                                <i class="fas fa-award" style="color: var(--am);"></i> مطابق لكود البناء السعودي (SBC)
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>

                <!-- Left Column: Creative Royal Seal (Accreditation Card) -->
                <div class="accreditation-seal-card" style="background: @if(!empty($hdr['accreditation_logo'])) #fff @else linear-gradient(135deg, var(--nv) 0%, #173257 100%) @endif; border-radius: var(--r); padding: @if(!empty($hdr['accreditation_logo'])) 12px @else 35px 24px @endif; text-align: center; border: @if(!empty($hdr['accreditation_logo'])) 1px solid rgba(15,36,65,0.08) @else 2px solid var(--am) @endif; box-shadow: 0 15px 45px rgba(15,36,65,0.15); position: relative; overflow: hidden; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                    
                    @if(!empty($hdr['accreditation_logo']))
                        <!-- Custom Uploaded Full Image (Takes full space beautifully!) -->
                        <img src="{{ $hdr['accreditation_logo'] }}" style="width: 100%; height: auto; max-height: 100%; object-fit: contain; border-radius: calc(var(--r) - 4px); filter: drop-shadow(0 4px 10px rgba(0,0,0,0.06));" alt="شعار وثيقة الاعتماد">
                    @else
                        <!-- Royal Saudi Crest fallback if empty -->
                        <!-- Glowing background light effect -->
                        <div style="position: absolute; top: -50px; left: -50px; width: 150px; height: 150px; background: rgba(197, 168, 128, 0.18); filter: blur(50px); border-radius: 50%;"></div>
                        
                        <div style="background: rgba(255,255,255,0.03); padding: 10px; border-radius: 50%; border: 1.5px dashed rgba(197,168,128,0.4); display: inline-flex; align-items: center; justify-content: center; width: 130px; height: 130px; box-shadow: inset 0 0 20px rgba(0,0,0,0.3); overflow: hidden;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" style="width: 100px; height: 100px; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.35));">
                                <!-- Palm Tree -->
                                <path d="M50,40 C50,22 35,18 25,28 C35,32 45,32 50,40 Z" fill="#e07b0f"/>
                                <path d="M50,40 C50,22 65,18 75,28 C65,32 55,32 50,40 Z" fill="#e07b0f"/>
                                <path d="M50,43 C50,28 30,22 20,36 C32,38 45,38 50,43 Z" fill="#c5a880"/>
                                <path d="M50,43 C50,28 70,22 80,36 C68,38 55,38 50,43 Z" fill="#c5a880"/>
                                <path d="M50,35 C50,20 40,15 30,25 C40,28 47,28 50,35 Z" fill="#ffb85c"/>
                                <path d="M50,35 C50,20 60,15 70,25 C60,28 53,28 50,35 Z" fill="#ffb85c"/>
                                <!-- Trunk -->
                                <path d="M48,40 L52,40 L53,70 L47,70 Z" fill="#8c6d45"/>
                                <path d="M45,70 L55,70 L56,74 L44,74 Z" fill="#705330"/>
                                <!-- Crossed Swords -->
                                <path d="M22,73 L78,73" stroke="#ffb85c" stroke-width="3" stroke-linecap="round" fill="none" transform="rotate(-30 50 73)"/>
                                <path d="M22,73 L78,73" stroke="#ffb85c" stroke-width="3" stroke-linecap="round" fill="none" transform="rotate(30 50 73)"/>
                                <circle cx="36.5" cy="65" r="3" fill="#ffb85c"/>
                                <circle cx="63.5" cy="65" r="3" fill="#ffb85c"/>
                            </svg>
                        </div>

                        <div>
                            <h4 style="color: #fff; font-size: 21px; font-weight: 800; margin: 0 0 6px 0; letter-spacing: 0.5px; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">اعتماد رسمي معتمد</h4>
                            <span style="color: var(--am); font-size: 13.5px; font-weight: 800; background: rgba(197,168,128,0.12); padding: 5px 14px; border-radius: 50px; display: inline-block; border: 1px solid rgba(197,168,128,0.25);">إمارة منطقة القصيم</span>
                        </div>
                        
                        <p style="color: rgba(255,255,255,0.8); font-size: 14.5px; line-height: 1.6; margin: 0; font-weight: 500;">فخورون بثقة إمارة القصيم والجهات الحكومية في اعتماد خدماتنا المتميزة لعزل الأسطح والمباني.</p>
                        
                        <div style="width: 100%; border-top: 1px dashed rgba(255,255,255,0.15); padding-top: 18px; display: flex; justify-content: center; gap: 18px; color: #fff; font-size: 12.5px; font-weight: 700;">
                            <span><i class="fas fa-shield-alt" style="color: var(--am); margin-left: 5px;"></i> ضمان 15 عام</span>
                            <span><i class="fas fa-certificate" style="color: var(--am); margin-left: 5px;"></i> كود البناء السعودي</span>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    <!-- Custom CSS Styles and Media Queries -->
    <style>
        @keyframes pulse-green {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(26, 122, 69, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(26, 122, 69, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(26, 122, 69, 0); }
        }
        @media (max-width: 991px) {
            .portfolio-grid-wrapper {
                grid-template-columns: 1fr !important;
                gap: 24px !important;
            }
            .accreditation-seal-card {
                padding: 30px 20px !important;
            }
            .portfolio-header-row {
                display: none !important;
            }
            .portfolio-item-row {
                grid-template-columns: 1fr !important;
                gap: 16px !important;
                padding: 20px !important;
                border: 1px solid rgba(15,36,65,0.1) !important;
                border-radius: var(--r) !important;
            }
            .portfolio-col {
                text-align: right !important;
                align-items: flex-start !important;
            }
            .portfolio-col.col-3 {
                align-items: flex-start !important;
                text-align: right !important;
                padding-top: 10px;
                border-top: 1px dashed rgba(0,0,0,0.1);
                width: 100%;
            }
        }
    </style>
    
    <!-- Gallery Section -->
    <section class="sec">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-images"></i>أعمالنا</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
                <h2>أعمالنا <em>تتحدث عنا</em></h2>
                <p>صور حقيقية من مشاريع نفذناها في القصيم وبريدة وحائل</p>
            </div>
            <div class="gal-f">
                <button class="gf act" onclick="filterHomeGallery('photos', this)" style="background: rgba(224, 123, 15, 0.06); color: var(--am); border-color: var(--am);">معرض الصور</button>
                <button class="gf" onclick="filterHomeGallery('videos', this)">فيديوهات</button>
            </div>
            <div class="gal-g" id="galEl">
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
                            // Encode path segments to handle spaces in filenames (Apache compatibility)
                            $encodedVideoUrl = $ytId ? $videoUrl : '/' . implode('/', array_map('rawurlencode', explode('/', ltrim($videoUrl, '/'))));
                        @endphp
                        <div class="gi video-card home-video-item-el" onclick="openVid('{{ $videoUrl }}')" style="cursor:pointer; display:none;">
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
                        <div class="gi home-photo-item-el" style="display:block;">
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

    <script>
    function filterHomeGallery(type, btn) {
        document.querySelectorAll('.gal-f .gf').forEach(b => {
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
            document.querySelectorAll('.home-photo-item-el').forEach(el => el.style.display = 'block');
            document.querySelectorAll('.home-video-item-el').forEach(el => el.style.display = 'none');
        } else {
            document.querySelectorAll('.home-photo-item-el').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.home-video-item-el').forEach(el => el.style.display = 'block');
        }
    }
    </script>
    
    <!-- Service Locations Grid -->
    <section class="sec sec-alt">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-map-marker-alt"></i>مناطق الخدمة</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">أفضل شركة عزل فوم بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
                <h2>نخدم <em>كل المنطقة</em></h2>
                <p>نغطي القصيم وبريدة وحائل وكل المناطق المجاورة</p>
            </div>
            <div class="areas-g" id="arHm">
                @foreach($areas as $ar)
                    <a href="/areas" class="arc" style="text-decoration:none;color:inherit;cursor:pointer">
                        <span class="em">{{ $ar->emoji ?? '📍' }}</span>
                        <h3>{{ $ar->name }}</h3>
                        <p>{{ Str::limit($ar->desc, 45) }}</p>
                        <span class="bdg">خدمة عزل كاملة</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Testimonials Grid -->
    <section class="sec">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-comments"></i>آراء العملاء</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
                <h2>ما هي آراء <em>عملائنا</em></h2>
                <p>أكثر من 800 عميل راضٍ في القصيم وبريدة وحائل</p>
            </div>
            <div class="tests-g" id="tstEl">
                @foreach($testimonials as $tst)
                    @php
                        $isVideo = !empty($tst->video) || $tst->svc === 'video' || $tst->svc === 'فيديو';
                    @endphp
                    @if(!$isVideo)
                        <div class="tc home-test-text-item-el" style="display:block;">
                            <div class="tc-st">{{ str_repeat('⭐', $tst->rating ?? 5) }}</div>
                            <p>{{ $tst->text }}</p>
                            <div class="tc-auth">
                                <div class="tc-av">{{ mb_substr($tst->name ?? '?', 0, 1) }}</div>
                                <div class="tc-info">
                                    <strong>{{ $tst->name }}</strong>
                                    <span>{{ $tst->city }} · {{ $tst->svc }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <script>
    function filterHomeTestimonials(type, btn) {
        document.querySelectorAll('.test-f .gf').forEach(b => {
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

        if (type === 'text') {
            document.querySelectorAll('.home-test-text-item-el').forEach(el => el.style.display = 'block');
            document.querySelectorAll('.home-test-video-item-el').forEach(el => el.style.display = 'none');
        } else {
            document.querySelectorAll('.home-test-text-item-el').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.home-test-video-item-el').forEach(el => el.style.display = 'block');
        }
    }
    </script>
    
    <!-- FAQs Wrapper -->
    <section class="sec sec-alt">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-question-circle"></i>الأسئلة الشائعة</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">أفضل شركة عزل فوم بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
                <h2>أسئلة <em>يسألها عملاؤنا</em></h2>
            </div>
            <div class="faq-w" id="faqEl">
                @foreach($faqs as $fq)
                    <div class="fqi" id="fq{{ $fq->id }}">
                        <div class="fqq" onclick="tFq('fq{{ $fq->id }}')">
                            <span>{{ $fq->q }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="fqa"><p>{{ $fq->a }}</p></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Blog Section -->
    <section class="sec">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-blog"></i>المقالات</div>
                <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: var(--nv); margin-bottom: 6px; letter-spacing: 0.3px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
                <h2>نصائح ومعلومات <em>مفيدة</em></h2>
            </div>
            <div class="blog-g" id="blEl">
                @foreach($blogs->slice(0, 3) as $bl)
                    <a href="/blog" class="blc" style="text-decoration:none;color:inherit;cursor:pointer">
                        <div class="blth">
                            @if(!empty($bl->img))
                                <img src="{{ $bl->img }}" onerror="this.style.display='none'">
                            @endif
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="blbd">
                            <span class="bl-tag">{{ $bl->cat ?? 'عزل' }}</span>
                            <h3>{{ $bl->title }}</h3>
                            <p>{{ $bl->summary }}</p>
                            <div class="bl-meta">
                                <span><i class="fas fa-calendar"></i>{{ $bl->date }}</span>
                                <span><i class="fas fa-clock"></i>5 دقائق</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Call To Action Bottom Banner -->
    <div class="cta-ban">
        <div class="con cta-in">
            <div class="gar"><i class="fas fa-shield-alt" style="color:var(--am2)"></i>ضمان حقيقي يصل إلى {{ $hero['s2'] ?? '10' }} {{ $hero['s2l'] ?? 'سنوات' }}</div>
            <h2 id="ctaT">{{ $hero['ct'] ?? 'هل تعاني من تسربات المياه أو الحرارة الشديدة؟' }}</h2>
            <p id="ctaD">{{ $hero['cd'] ?? 'تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر غير ملزم' }}</p>
            <div class="cta-acts">
                <a class="btn btn-am" onclick="openReq()"><i class="fas fa-calendar-check"></i>احصل على عرض</a>
                <a class="btn btn-wa" id="ctaWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','cta')"><i class="fab fa-whatsapp"></i>واتساب</a>
                <a class="btn btn-wh" id="ctaPh" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','cta')"><i class="fas fa-phone"></i>اتصل الآن</a>
            </div>
        </div>
    </div>
</div>
@endsection
