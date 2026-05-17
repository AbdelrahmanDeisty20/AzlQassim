@extends('layouts.app')

@section('title', 'عزل القصيم | أفضل شركة عزل أسطح بالقصيم وبريدة وحائل')

@section('content')
<div class="page active" id="page-home">
    <!-- Hero Section -->
    <section class="hero" style="{{ !empty($hero['bg']) ? 'background-image: linear-gradient(rgba(15, 36, 65, 0.85), rgba(15, 36, 65, 0.95)), url(' . $hero['bg'] . ') !important;' : '' }}">
        <div class="con hw">
            <div class="hg">
                <div>
                    <div class="hkw">
                        <i class="fas fa-map-marker-alt"></i>
                        <span id="hKW">{{ $hero['kw'] ?? 'القصيم • بريدة • عنيزة • الرس • حائل' }}</span>
                    </div>
                    <h1>
                        <span id="hH1">{{ $hero['h1'] ?? 'أفضل شركة' }}</span>
                        <span id="hSpn">{{ $hero['sp'] ?? 'عزل أسطح بالقصيم' }}</span>
                    </h1>
                    <p class="hdesc" id="hDsc">{{ $hero['d'] ?? 'متخصصون في عزل الأسطح مائياً وحرارياً باستخدام أحدث تقنيات الفوم البولي يوريثان. نحمي منزلك من التسربات والحرارة بضمان حقيقي يصل إلى 10 سنوات.' }}</p>
                    <div class="hacts">
                        <a class="btn btn-am" onclick="openReq()">
                            <i class="fas fa-calendar-check"></i>
                            <span id="hC1">{{ $hero['c1'] ?? 'احصل على عرض مجاني' }}</span>
                        </a>
                        <a class="btn btn-wh" id="hWaB" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','hero')">
                            <i class="fab fa-whatsapp"></i>
                            <span id="hC2">{{ $hero['c2'] ?? 'تواصل الآن' }}</span>
                        </a>
                    </div>
                    <div class="hpills">
                        <span class="pill"><i class="fas fa-shield-alt"></i>ضمان 10 سنوات</span>
                        <span class="pill"><i class="fas fa-certificate"></i>مرخصون رسمياً</span>
                        <span class="pill"><i class="fas fa-clock"></i>خدمة 24 ساعة</span>
                        <span class="pill"><i class="fas fa-tools"></i>فريق متخصص</span>
                    </div>
                </div>
                
                <div class="h-card">
                    <div class="h-stat-n">
                        <div class="num" id="hS1">{{ $hero['s1'] ?? '+800' }}</div>
                        <div class="lbl" id="hS1L">{{ $hero['s1l'] ?? 'مشروع ناجح' }}</div>
                    </div>
                    <div class="h-stat-n">
                        <div class="num" id="hS2">{{ $hero['s2'] ?? '10' }}</div>
                        <div class="lbl" id="hS2L">{{ $hero['s2l'] ?? 'سنوات ضمان' }}</div>
                    </div>
                    <div class="h-stat-n">
                        <div class="num" id="hS3">{{ $hero['s3'] ?? '100%' }}</div>
                        <div class="lbl" id="hS3L">{{ $hero['s3l'] ?? 'رضا العملاء' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Services Grid -->
    <section class="sec">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-tools"></i>خدماتنا</div>
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
                    <h2>لماذا تختار <em>عزل القصيم؟</em></h2>
                    <p id="whyDsc">نحن الخيار الأول لأهالي القصيم وبريدة وحائل. نجمع بين الخبرة الطويلة والتقنيات الحديثة لنضمن لك منزلاً محمياً من التسربات والحرارة.</p>
                    <div class="why-list" id="whyL">
                        @foreach($whyItems as $wi)
                            <div class="wi">
                                <div class="ic" style="display:flex;align-items:center;justify-content:center;width:48px;height:48px;border-radius:50%;background:rgba(197,168,128,0.1);color:var(--am);font-size:20px;flex-shrink:0">
                                    @if(!empty($wi->img))
                                        <img src="{{ $wi->img }}" style="width:28px;height:28px;object-fit:contain;border-radius:4px" onerror="this.outerHTML='<i class=\'fas {{ $wi->icon ?? "fa-check" }}\'></i>'">
                                    @else
                                        <i class="fas {{ $wi->icon ?? 'fa-check' }}"></i>
                                    @endif
                                </div>
                                <div>
                                    <h4>{{ $wi->title }}</h4>
                                    <p>{{ $wi->desc }}</p>
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
                        <span class="n">10</span>
                        <span class="l">سنوات ضمان</span>
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
                <div class="tag"><i class="fas fa-list-ol"></i>آلية العمل</div>
                <h2>كيف <em>نعمل؟</em></h2>
                <p>خطوات واضحة وشفافة للحصول على خدمة عزل احترافية</p>
            </div>
            <div class="steps-g" id="stpsEl">
                @foreach($steps as $stp)
                    <div class="stc">
                        <div class="stn" style="display:flex;align-items:center;justify-content:center;overflow:hidden;border-radius:50%;width:60px;height:60px;background:rgba(197,168,128,0.1);border:2px solid var(--am);color:var(--am);font-weight:800;font-size:20px;margin:0 auto 20px">
                            @if(!empty($stp->img))
                                <img src="{{ $stp->img }}" style="width:100%;height:100%;object-fit:cover" onerror="this.outerHTML='{{ $stp->num ?? "•" }}'">
                            @else
                                {{ $stp->num ?? '•' }}
                            @endif
                        </div>
                        <h3>{{ $stp->title }}</h3>
                        <p>{{ $stp->desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Offers & Packages Section -->
    <section class="sec sec-alt">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-percent"></i>عروضنا</div>
                <h2>باقات <em>مميزة</em></h2>
                <p>اختر الباقة الأنسب واحصل على أفضل خدمة عزل بأفضل سعر</p>
            </div>
            <div class="offers-g" id="offEl">
                @foreach($offers as $off)
                    <div class="ofc {{ $off->feat ? 'hot' : '' }}">
                        @if($off->feat)
                            <span class="ofbg">الأكثر طلباً</span>
                        @endif
                        <div class="ofhd">
                            <h3>{{ $off->name }}</h3>
                            <div class="sub">ضمان حتى 10 سنوات</div>
                            <div class="ofpr">
                                @if(!empty($off->oldP))
                                    <span class="old">{{ $off->oldP }} ر.س</span>
                                @endif
                                <span class="nw">{{ $off->newP }}</span>
                                <span class="u">ر.س</span>
                            </div>
                        </div>
                        <div class="ofbd">
                            <ul class="offl">
                                @foreach(explode("\n", $off->feats) as $f)
                                    @if(trim($f))
                                        <li><i class="fas fa-check-circle"></i>{{ trim($f) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <a class="btn btn-am" onclick="openReq()" style="display:flex;justify-content:center">
                                <i class="fas fa-calendar-check"></i>اطلب الباقة
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Gallery Section -->
    <section class="sec">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-images"></i>معرض الأعمال</div>
                <h2>أعمالنا <em>تتحدث عنا</em></h2>
                <p>صور حقيقية من مشاريع نفذناها في القصيم وبريدة وحائل</p>
            </div>
            <div class="gal-f">
                <button class="gf act" onclick="fGal('all',this)">الكل</button>
                <button class="gf" onclick="fGal('روف',this)">عزل أسطح</button>
                <button class="gf" onclick="fGal('فوم',this)">عزل فوم</button>
                <button class="gf" onclick="fGal('خزان',this)">خزانات</button>
                <button class="gf" onclick="fGal('حمام',this)">حمامات</button>
            </div>
            <div class="gal-g" id="galEl">
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
    
    <!-- Service Locations Grid -->
    <section class="sec sec-alt">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-map-marker-alt"></i>مناطق الخدمة</div>
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
                <h2>ماذا يقول <em>عملاؤنا</em></h2>
                <p>أكثر من 800 عميل راضٍ في القصيم وبريدة وحائل</p>
            </div>
            <div class="tests-g" id="tstEl">
                @foreach($testimonials as $tst)
                    <div class="tc">
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
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- FAQs Wrapper -->
    <section class="sec sec-alt">
        <div class="con">
            <div class="st">
                <div class="tag"><i class="fas fa-question-circle"></i>الأسئلة الشائعة</div>
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
            <div class="gar"><i class="fas fa-shield-alt" style="color:var(--am2)"></i>ضمان حقيقي يصل إلى 10 سنوات</div>
            <h2 id="ctaT">{{ $hero['ct'] ?? 'هل تعاني من تسربات المياه أو الحرارة الشديدة؟' }}</h2>
            <p id="ctaD">{{ $hero['cd'] ?? 'تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر غير ملزم' }}</p>
            <div class="cta-acts">
                <a class="btn btn-am" onclick="openReq()"><i class="fas fa-calendar-check"></i>احصل على عرض مجاني</a>
                <a class="btn btn-wa" id="ctaWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','cta')"><i class="fab fa-whatsapp"></i>واتساب</a>
                <a class="btn btn-wh" id="ctaPh" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','cta')"><i class="fas fa-phone"></i>اتصل الآن</a>
            </div>
        </div>
    </div>
</div>
@endsection
