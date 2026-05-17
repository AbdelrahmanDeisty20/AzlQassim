@extends('layouts.app')

@section('title', 'من نحن | عزل القصيم')

@section('content')
<div class="page active" id="page-about">
    <!-- Page Breadcrumbs -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <span>من نحن</span>
            </div>
            <h2>من نحن</h2>
            <p>شركة عزل القصيم - الرائدة في حلول العزل المائي والحراري</p>
        </div>
    </div>
    
    <!-- Introduction Section -->
    <section class="sec">
        <div class="con">
            <div class="why-g" style="margin-bottom:52px">
                <div>
                    <h2 style="font-size:clamp(20px,3vw,33px);font-weight:900;color:var(--nv);margin-bottom:14px">
                        شركة <em style="color:var(--am);font-style:normal">عزل القصيم</em>
                        <br>أكثر من 10 سنوات خبرة
                    </h2>
                    <p style="color:var(--cc);font-size:14px;line-height:2;margin-bottom:12px">{{ $about['text1'] ?? 'تأسست شركة عزل القصيم لتكون الشريك الأمين لأصحاب المنازل في منطقة القصيم وبريدة وحائل في مجال العزل المائي والحراري للأسطح والخزانات والحمامات.' }}</p>
                    <p style="color:var(--cc);font-size:14px;line-height:2;margin-bottom:12px">{{ $about['text2'] ?? 'نستخدم أحدث تقنيات العزل العالمية: الفوم البولي يوريثان، العزل الإسفلتي، السيليكون المائي، وأغشية البيتومين المعدنية. فريقنا مدرب ومعتمد.' }}</p>
                    <p style="color:var(--cc);font-size:14px;line-height:2">{{ $about['text3'] ?? 'نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال فترة الضمان.' }}</p>
                    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:26px">
                        <div style="text-align:center;background:var(--sl);border-radius:var(--r);padding:16px 10px">
                            <div style="font-size:26px;font-weight:900;color:var(--nv)">+800</div>
                            <div style="font-size:12px;color:var(--cc)">مشروع منجز</div>
                        </div>
                        <div style="text-align:center;background:var(--sl);border-radius:var(--r);padding:16px 10px">
                            <div style="font-size:26px;font-weight:900;color:var(--am)">10</div>
                            <div style="font-size:12px;color:var(--cc)">سنوات ضمان</div>
                        </div>
                        <div style="text-align:center;background:var(--sl);border-radius:var(--r);padding:16px 10px">
                            <div style="font-size:26px;font-weight:900;color:var(--gr)">3</div>
                            <div style="font-size:12px;color:var(--cc)">مناطق خدمة</div>
                        </div>
                    </div>
                </div>
                <div style="display:block">
                    <div class="why-img" id="abtImg" style="{{ !empty($about['img']) ? 'background:none;border:none;padding:0;width:100%;height:100%;min-height:350px;' : '' }}">
                        @if(!empty($about['img']))
                            <img src="{{ $about['img'] }}" style="width:100%;height:100%;object-fit:cover;border-radius:var(--r);box-shadow:0 8px 32px rgba(15,36,65,0.15)">
                        @else
                            <i class="fas {{ $about['icon'] ?? 'fa-building' }}"></i>
                            <span>{{ $about['title'] ?? 'فريق عزل القصيم' }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Vision & Mission -->
            <div class="vg">
                <div class="vc">
                    <h3><i class="fas fa-eye"></i>رؤيتنا</h3>
                    <p>أن نكون الشركة الرائدة في خدمات العزل بمنطقة القصيم وبريدة وحائل، ونموذجاً يُحتذى به في الجودة والاحترافية.</p>
                </div>
                <div class="vc gr">
                    <h3><i class="fas fa-bullseye"></i>رسالتنا</h3>
                    <p>تقديم خدمات عزل احترافية تتجاوز توقعات العملاء، باستخدام أحدث التقنيات ومواد معتمدة عالمياً، مع بناء علاقات ثقة طويلة الأمد.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Badges / Certifications Grid -->
    <section class="sec sec-alt">
        <div class="con">
            <div class="st">
                <div class="tag">شهاداتنا وضماناتنا</div>
                <h2>لماذا نحن <em>الأفضل؟</em></h2>
            </div>
            <div class="cg">
                <div class="cc2"><div class="cc2-ic"><i class="fas fa-certificate"></i></div><h4>ترخيص رسمي</h4><p>معتمدون من وزارة الشؤون البلدية والقروية</p></div>
                <div class="cc2"><div class="cc2-ic"><i class="fas fa-shield-alt"></i></div><h4>ضمان 10 سنوات</h4><p>ضمان حقيقي موثق على جميع أعمال العزل</p></div>
                <div class="cc2"><div class="cc2-ic"><i class="fas fa-tools"></i></div><h4>فريق متخصص</h4><p>مهندسون وفنيون مدربون بأعلى المعايير</p></div>
                <div class="cc2"><div class="cc2-ic"><i class="fas fa-leaf"></i></div><h4>مواد عالمية</h4><p>نستخدم مواد عزل عالمية آمنة ومعتمدة</p></div>
            </div>
        </div>
    </section>
    
    <!-- CTA Middle Banner -->
    <div class="cta-ban">
        <div class="con cta-in">
            <h2>هل تحتاج إلى <em>حل عزل احترافي؟</em></h2>
            <p>تواصل معنا الآن للحصول على معاينة مجانية بدون أي التزام</p>
            <div class="cta-acts">
                <a class="btn btn-am" onclick="openReq()"><i class="fas fa-calendar-check"></i>طلب معاينة مجانية</a>
                <a class="btn btn-wa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','about')"><i class="fab fa-whatsapp"></i>واتساب</a>
            </div>
        </div>
    </div>
</div>
@endsection
