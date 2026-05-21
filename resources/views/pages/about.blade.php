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
            <div style="font-weight: 800; color: #fff; font-size: clamp(13px, 3.5vw, 16px); margin-top: 10px; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.1); padding: 6px 12px; border-radius: var(--r);">
                <i class="fas fa-layer-group" style="color: var(--am); font-size: 15px;"></i>
                <span>عزل فوم أمريكي أصلي من مصنع هانتسمان الأمريكي بضمان معتمد 15 عام</span>
            </div>
        </div>
    </div>
    
    <!-- Introduction Section -->
    <section class="sec" style="background: #ffffff; padding: 60px 0;">
        <div class="con">
            <div style="max-width: 1000px; margin: 0 auto; text-align: center;">
                
                <h2 style="font-size: clamp(24px, 5.5vw, 38px); font-weight: 900; color: #0f2441; margin-bottom: 24px; display: inline-flex; align-items: center; gap: 12px; justify-content: center; width: 100%;">
                    <i class="fas fa-layer-group" style="color: var(--am);"></i>
                    {{ $about['title'] ?? 'أفضل شركة عزل أسطح بالقصيم' }}
                </h2>
                
                <div style="background: #ffffff; border: 2px solid rgba(15, 36, 65, 0.1); border-radius: var(--r2); padding: clamp(24px, 5vw, 42px); box-shadow: 0 15px 40px rgba(15,36,65,0.05); text-align: justify; line-height: 2.2; direction: rtl;">
                    
                    <p style="font-size: clamp(16.5px, 3.8vw, 21.5px); font-weight: 800; color: #0f2441; margin-bottom: 24px; text-indent: 20px;">
                        {{ $about['text1'] ?? 'نحن لا نقدم مجرد عزل بل نقدم حماية تدوم لأجيال عديدة وذلك باستخدام أحدث تقنيات العزل الأمريكي المزدوج المائي والحراري وذلك بتنفيذ احترافي بفريق عمل متخصص ومدرب علي تنفيذ العزل الأمريكي لضمان دقة الرش والكثافة وضمان التغطية الشاملة لسطح المبني بلا فراغات والوصول لأدق الزوايا والشقوق ليخلق طبقة واحدة متصلة تمنع تماما دخول الحرارة وتوفر ٤٠٪ من فاتورة الكهرباء وتمنع تسرب المياة والأمطار وتمنع دخول الحشرات وتطيل العمر الافتراضي للمبني.' }}
                    </p>
                    
                    <p style="font-size: clamp(16.5px, 3.8vw, 21.5px); font-weight: 800; color: #0f2441; margin-bottom: 28px; padding-right: 14px; border-right: 4px solid var(--am);">
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
    
    <!-- Vision, Mission and Experience Section -->
    <section class="sec" style="background: #f8f9fa; padding: 60px 0; border-top: 1px solid rgba(15,36,65,0.06); border-bottom: 1px solid rgba(15,36,65,0.06);">
        <div class="con">
            <div class="why-g" style="margin-bottom: 52px;">
                <div>
                    <h2 style="font-size: clamp(20px, 3.5vw, 33px); font-weight: 900; color: var(--nv); margin-bottom: 18px; line-height: 1.4;">
                        {!! str_replace('عزل القصيم', '<em style="color: var(--am); font-style: normal;">عزل القصيم</em>', e($about['exp_t1'] ?? 'شركة عزل القصيم')) !!}<br>{{ $about['exp_t2'] ?? 'أكثر من 10 سنوات خبرة' }}
                    </h2>
                    <p style="color: var(--cc); font-size: 15px; line-height: 2; margin-bottom: 14px;">
                        {{ $about['text3'] ?? 'نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال فترة الضمان.' }}
                    </p>
                    <p style="color: var(--cc); font-size: 15px; line-height: 2; margin-bottom: 14px;">
                        {{ $about['p1'] ?? 'نستخدم أحدث تقنيات العزل العالمية: الفوم البولي يوريثان، العزل الإسفلتي، السيليكون المائي، وأغشية البيتومين المعدنية. فريقنا مدرب ومعتمد.' }}
                    </p>
                    <p style="color: var(--cc); font-size: 15px; line-height: 2;">
                        {{ $about['p2'] ?? 'تأسست شركة عزل القصيم لتكون الشريك الأمين لأصحاب المنازل في منطقة القصيم وبريدة وحائل في مجال العزل المائي والحراري للأسطح والخزانات والحمامات.' }}
                    </p>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); gap: 14px; margin-top: 26px;">
                        @if(!empty($about['stats']))
                            @foreach($about['stats'] as $stat)
                                <div style="text-align: center; background: #ffffff; border: 1.5px solid rgba(15,36,65,0.08); border-radius: var(--r); padding: 16px 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.02);">
                                    <div style="font-size: 26px; font-weight: 900; color: {{ $stat['color'] ?? 'var(--nv)' }};">{{ $stat['num'] }}</div>
                                    <div style="font-size: 12px; color: var(--cc); font-weight: 700;">{{ $stat['lbl'] }}</div>
                                </div>
                            @endforeach
                        @else
                            <div style="text-align: center; background: #ffffff; border: 1.5px solid rgba(15,36,65,0.08); border-radius: var(--r); padding: 16px 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.02);">
                                <div style="font-size: 26px; font-weight: 900; color: var(--nv);">{{ $about['st1_n'] ?? '+800' }}</div>
                                <div style="font-size: 12px; color: var(--cc); font-weight: 700;">{{ $about['st1_t'] ?? 'مشروع منجز' }}</div>
                            </div>
                            <div style="text-align: center; background: #ffffff; border: 1.5px solid rgba(15,36,65,0.08); border-radius: var(--r); padding: 16px 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.02);">
                                <div style="font-size: 26px; font-weight: 900; color: var(--am);">{{ $about['st2_n'] ?? '10' }}</div>
                                <div style="font-size: 12px; color: var(--cc); font-weight: 700;">{{ $about['st2_t'] ?? 'سنوات ضمان' }}</div>
                            </div>
                            <div style="text-align: center; background: #ffffff; border: 1.5px solid rgba(15,36,65,0.08); border-radius: var(--r); padding: 16px 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.02);">
                                <div style="font-size: 26px; font-weight: 900; color: var(--gr);">{{ $about['st3_n'] ?? '3' }}</div>
                                <div style="font-size: 12px; color: var(--cc); font-weight: 700;">{{ $about['st3_t'] ?? 'مناطق خدمة' }}</div>
                            </div>
                        @endif
                    </div>
                </div>
                <div style="display:block">
                    <div class="why-img" id="abtImg" style="{{ !empty($about['img']) ? 'background:none;border:none;padding:0;width:100%;height:100%;min-height:350px;' : '' }}">
                        @if(!empty($about['img']))
                            <img src="{{ $about['img'] }}" style="width:100%;height:100%;object-fit:cover;border-radius:var(--r);box-shadow:0 8px 32px rgba(15,36,65,0.15)">
                        @else
                            <i class="fas {{ $about['icon'] ?? 'fa-building' }}"></i>
                            <span>فريق عزل القصيم</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="vg">
                <div class="vc" style="background: #ffffff; border: 1.5px solid rgba(15,36,65,0.08); border-radius: var(--r2); padding: 24px; box-shadow: 0 6px 20px rgba(0,0,0,0.02);">
                    <h3 style="font-size: 19px; font-weight: 900; color: var(--nv); margin-bottom: 10px; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-eye" style="color: var(--am);"></i>رؤيتنا</h3>
                    <p style="color: var(--cc); font-size: 14px; line-height: 1.8;">أن نكون الشركة الرائدة في خدمات العزل بمنطقة القصيم وبريدة وحائل، ونموذجاً يُحتذى به في الجودة والاحترافية.</p>
                </div>
                <div class="vc gr" style="background: #ffffff; border: 1.5px solid rgba(15,36,65,0.08); border-radius: var(--r2); padding: 24px; box-shadow: 0 6px 20px rgba(0,0,0,0.02);">
                    <h3 style="font-size: 19px; font-weight: 900; color: var(--nv); margin-bottom: 10px; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-bullseye" style="color: var(--gr);"></i>رسالتنا</h3>
                    <p style="color: var(--cc); font-size: 14px; line-height: 1.8;">تقديم خدمات عزل احترافية تتجاوز توقعات العملاء، باستخدام أحدث التقنيات ومواد معتمدة عالمياً، مع بناء علاقات ثقة طويلة الأمد.</p>
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
            <div class="cg" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                <div class="cc2">
                    <div class="cc2-ic"><i class="fas fa-certificate" style="color: #52b788;"></i></div>
                    <h4>رخصة بلدية معتمدة</h4>
                    <p style="font-weight: 700; color: var(--nv);">رقم: {{ $hdr['lic_no'] ?? '441212615580' }}</p>
                </div>
                <div class="cc2">
                    <div class="cc2-ic"><i class="fas fa-id-card" style="color: #4ea8de;"></i></div>
                    <h4>هيئة المقاولين السعودية</h4>
                    <p style="font-weight: 700; color: var(--nv);">عضوية رقم: {{ $hdr['sca_no'] ?? '31109580340003' }}</p>
                </div>
                <div class="cc2">
                    <div class="cc2-ic"><i class="fas fa-award" style="color: #e63946;"></i></div>
                    <h4>شهادة تصنيف معتمدة</h4>
                    <p style="font-weight: 700; color: var(--nv);">رقم: {{ $hdr['cls_no'] ?? '2024005835' }} (فئة ممتازة)</p>
                </div>
                <div class="cc2">
                    <div class="cc2-ic"><i class="fas fa-shield-alt" style="color: #ffd700;"></i></div>
                    <h4>ضمان ذهبي معتمد</h4>
                    <p style="font-weight: 700; color: var(--nv);">ضمان حقيقي موثق لمدة 15 سنة</p>
                </div>
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
