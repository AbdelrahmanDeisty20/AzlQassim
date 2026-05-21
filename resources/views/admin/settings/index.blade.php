@extends('admin.layouts.app')

@section('title', 'إعدادات الموقع العام')

@section('content')
<div style="background:#fff; border-radius:var(--r2); padding: 24px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
    <!-- Settings Tab Buttons -->
    <div style="display:flex; gap:10px; border-bottom: 2px solid #f1f3f5; padding-bottom: 12px; margin-bottom: 24px; overflow-x:auto;">
        <button class="tab-btn active" onclick="showTab('tab-hdr', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--nv); cursor:pointer; border-radius:var(--r); transition:all .3s">الهيدر والهوية</button>
        <button class="tab-btn" onclick="showTab('tab-hero', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">البانر الرئيسي (Hero)</button>
        <button class="tab-btn" onclick="showTab('tab-about', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">من نحن (About)</button>
        <button class="tab-btn" onclick="showTab('tab-why', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">لماذا تختارنا (Why Us)</button>
        <button class="tab-btn" onclick="showTab('tab-how-we-work', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">آلية العمل (Steps)</button>
        <button class="tab-btn" onclick="showTab('tab-contact', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">بيانات التواصل</button>
        <button class="tab-btn" onclick="showTab('tab-colors', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">ألوان الموقع</button>
        <button class="tab-btn" onclick="showTab('tab-menu', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">قوائم المنيو</button>
        <button class="tab-btn" onclick="showTab('tab-svc', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">نصوص الخدمة</button>
        <button class="tab-btn" onclick="showTab('tab-gallery-info', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">معرض أعمالنا (Gallery)</button>
        <button class="tab-btn" onclick="showTab('tab-testimonials-info', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">آراء العملاء (Testimonials)</button>
        <button class="tab-btn" onclick="showTab('tab-areas-info', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">مناطق الخدمة (Areas)</button>
    </div>

    <!-- Tab 1: Header Settings -->
    <div id="tab-hdr" class="tab-content" style="display:block">
        <form id="form-hdr" onsubmit="saveSetting(event, 'hdr')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-window-maximize" style="color:var(--am)"></i> إعدادات الهيدر والهوية</h3>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>الاسم الرئيسي (شعار النص)</label>
                    <input type="text" name="nm" value="{{ $hdr['nm'] ?? 'عزل القصيم' }}" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>النص الفرعي (شعار النص)</label>
                    <input type="text" name="sb" value="{{ $hdr['sb'] ?? 'أفضل شركة عزل أسطح بالقصيم' }}" required>
                </div>
            </div>
            
            <div class="afg" style="margin-bottom:22px">
                <label style="font-weight:700">شعار الموقع المصور (Logo Image) - اختياري (سيحل محل الشعار النصي بالأعلى والأسفل عند رفعه)</label>
                <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap; margin-top:8px">
                    <input type="hidden" name="logo" id="hdr-logo-val" value="{{ $hdr['logo'] ?? '' }}">
                    <div style="width:120px; height:80px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="hdr-logo-preview" src="{{ !empty($hdr['logo']) ? $hdr['logo'] : '' }}" style="width:100%; height:100%; object-fit:contain; {{ empty($hdr['logo']) ? 'display:none' : '' }}">
                        <div id="hdr-logo-placeholder" style="font-size:28px; color:var(--cc); {{ !empty($hdr['logo']) ? 'display:none' : '' }}"><i class="fas fa-layer-group"></i></div>
                    </div>
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#hdr-logo-val').val(url); $('#hdr-logo-preview').attr('src', url).show(); $('#hdr-logo-placeholder').hide(); Swal.fire('تم رفع الشعار!', 'تم رفع وتحديد الشعار المصور بنجاح. تذكر النقر على حفظ في الأسفل لتأكيد الحفظ.', 'success'); })">
                        <div style="font-size:11px; color:var(--cc); margin-top:4px">صيغ مدعومة: PNG, JPG, WebP, SVG. الحجم الأقصى: 5MB</div>
                    </div>
                </div>
            </div>

            <div class="afg" style="margin-bottom:22px">
                <label style="font-weight:700">شعار أو ختم وثيقة الاعتماد (سابقة الأعمال) - اختياري (سيظهر في كارت الاعتماد بالصفحة الرئيسية بدلاً من ختم المملكة الافتراضي)</label>
                <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap; margin-top:8px">
                    <input type="hidden" name="accreditation_logo" id="hdr-accreditation_logo-val" value="{{ $hdr['accreditation_logo'] ?? '' }}">
                    <div style="width:120px; height:120px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="hdr-accreditation_logo-preview" src="{{ !empty($hdr['accreditation_logo']) ? $hdr['accreditation_logo'] : '' }}" style="max-width:100%; max-height:100%; object-fit:contain; {{ empty($hdr['accreditation_logo']) ? 'display:none' : '' }}">
                        <div id="hdr-accreditation_logo-placeholder" style="font-size:36px; color:var(--cc); {{ !empty($hdr['accreditation_logo']) ? 'display:none' : '' }}"><i class="fas fa-award" style="color:var(--am)"></i></div>
                    </div>
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#hdr-accreditation_logo-val').val(url); $('#hdr-accreditation_logo-preview').attr('src', url).show(); $('#hdr-accreditation_logo-placeholder').hide(); Swal.fire('تم رفع شعار الاعتماد!', 'تم رفع وتحديد شعار وثيقة الاعتماد بنجاح. تذكر النقر على حفظ في الأسفل لتأكيد الحفظ.', 'success'); })">
                        <div style="font-size:11px; color:var(--cc); margin-top:4px">صيغ مدعومة: PNG, JPG, WebP, SVG. الحجم الأقصى: 5MB</div>
                    </div>
                </div>
            </div>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>نص زر الاتصال بالهيدر (cta)</label>
                    <input type="text" name="cta" value="{{ $hdr['cta'] ?? 'اتصل الان' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>نص زر الواتساب بالهيدر (wa)</label>
                    <input type="text" name="wa" value="{{ $hdr['wa'] ?? 'واتساب' }}">
                </div>
            </div>
            
            <h4 style="margin:22px 0 12px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:6px; font-weight:700;"><i class="fas fa-certificate" style="color:var(--am)"></i> التراخيص والشهادات المعتمدة</h4>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>رقم رخصة البلدية</label>
                    <input type="text" name="lic_no" value="{{ $hdr['lic_no'] ?? '441212615580' }}" placeholder="441212615580">
                </div>
                <div class="afg" style="margin:0">
                    <label>عضوية الهيئة السعودية للمقاولين</label>
                    <input type="text" name="sca_no" value="{{ $hdr['sca_no'] ?? '31109580340003' }}" placeholder="31109580340003">
                </div>
                <div class="afg" style="margin:0">
                    <label>رقم شهادة التصنيف (فئة ممتازة)</label>
                    <input type="text" name="cls_no" value="{{ $hdr['cls_no'] ?? '2024005835' }}" placeholder="2024005835">
                </div>
            </div>
            
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ إعدادات الهوية والتراخيص</button>
        </form>
    </div>

    <!-- Tab 2: Hero Slider Settings -->
    <div id="tab-hero" class="tab-content" style="display:none">
        <form id="form-hero" onsubmit="saveSetting(event, 'hero')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-home" style="color:var(--am)"></i> البانر الرئيسي (Hero)</h3>
            
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>الكلمات الدلالية العلوية (kw)</label>
                    <input type="text" name="kw" value="{{ $hero['kw'] ?? 'القصيم • بريدة • عنيزة • الرس • حائل' }}" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>العنوان الأول (h1)</label>
                    <input type="text" name="h1" value="{{ $hero['h1'] ?? 'أفضل شركة' }}" required>
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>النص الملون التابع للعنوان (sp)</label>
                    <input type="text" name="sp" value="{{ $hero['sp'] ?? 'عزل أسطح بالقصيم' }}" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>الوصف التعريفي للبانر (d)</label>
                    <input type="text" name="d" value="{{ $hero['d'] ?? '' }}" required>
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>نص زر طلب الخدمة (c1)</label>
                    <input type="text" name="c1" value="{{ $hero['c1'] ?? 'احصل على عرض مجاني' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>نص زر الاتصال/واتساب (c2)</label>
                    <input type="text" name="c2" value="{{ $hero['c2'] ?? 'تواصل الآن' }}">
                </div>
            </div>

            <h4 style="margin:18px 0 10px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:6px">إحصائيات البانر</h4>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:12px">
                <div class="afg" style="margin:0">
                    <label>الإحصائية الأولى (قيمة + اسم)</label>
                    <div style="display:flex; gap:8px">
                        <input type="text" name="s1" value="{{ $hero['s1'] ?? '1200+' }}" placeholder="القيمة" style="width:100px">
                        <input type="text" name="s1l" value="{{ $hero['s1l'] ?? 'مشروع عزل ناجح بالقصيم' }}" placeholder="الاسم" style="flex:1">
                    </div>
                </div>
                <div class="afg" style="margin:0">
                    <label>الإحصائية الثانية (قيمة + اسم)</label>
                    <div style="display:flex; gap:8px">
                        <input type="text" name="s2" value="{{ $hero['s2'] ?? '9000+' }}" placeholder="القيمة" style="width:100px">
                        <input type="text" name="s2l" value="{{ $hero['s2l'] ?? 'مشروع عزل ناجح بكل مدن المملكة' }}" placeholder="الاسم" style="flex:1">
                    </div>
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>الإحصائية الثالثة (قيمة + اسم)</label>
                    <div style="display:flex; gap:8px">
                        <input type="text" name="s3" value="{{ $hero['s3'] ?? '15' }}" placeholder="القيمة" style="width:100px">
                        <input type="text" name="s3l" value="{{ $hero['s3l'] ?? 'سنة ضمان ذهبي معتمد' }}" placeholder="الاسم" style="flex:1">
                    </div>
                </div>
            </div>

            <h4 style="margin:18px 0 10px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:6px">قسم العروض والتواصل السريع</h4>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>عنوان العرض الرئيسي (ct)</label>
                    <input type="text" name="ct" value="{{ $hero['ct'] ?? 'هل تعاني من تسربات المياه أو الحرارة الشديدة؟' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>تفاصيل العرض (cd)</label>
                    <input type="text" name="cd" value="{{ $hero['cd'] ?? 'تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر غير ملزم' }}">
                </div>
            </div>

            <h4 style="margin:18px 0 10px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:6px">الصور والوسائط</h4>
            <div class="afg">
                <label>صورة الخلفية للبانر الرئيسي (bg)</label>
                <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap">
                    <input type="hidden" name="bg" id="hero-bg-val" value="{{ $hero['bg'] ?? '' }}">
                    <div style="width:120px; height:80px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="hero-bg-preview" src="{{ !empty($hero['bg']) ? $hero['bg'] : '' }}" style="width:100%; height:100%; object-fit:cover; {{ empty($hero['bg']) ? 'display:none' : '' }}">
                        <div id="hero-bg-placeholder" style="font-size:28px; color:var(--cc); {{ !empty($hero['bg']) ? 'display:none' : '' }}"><i class="fas fa-image"></i></div>
                    </div>
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#hero-bg-val').val(url); $('#hero-bg-preview').attr('src', url).show(); $('#hero-bg-placeholder').hide(); Swal.fire('تم الرفع!', 'تم رفع صورة الخلفية بنجاح.', 'success'); })">
                        <div style="font-size:11px; color:var(--cc); margin-top:4px">صيغ مدعومة: PNG, JPG, WebP. الحجم الأقصى: 10MB</div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ البانر الرئيسي</button>
        </form>
    </div>

    <!-- Tab 3: About Us Settings -->
    <div id="tab-about" class="tab-content" style="display:none">
        <form id="form-about" onsubmit="saveSetting(event, 'about')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-info-circle" style="color:var(--am)"></i> من نحن (About)</h3>
            <div class="afg">
                <label>العنوان الرئيسي لقسم من نحن</label>
                <input type="text" id="abttitle" name="title" value="{{ $about['title'] ?? 'عزل القصيم .. خبرة 15 عاماً' }}" required>
            </div>
            <div class="afg">
                <label>المحتوى النصي الأول (text1)</label>
                <textarea name="text1" id="abtt1" rows="3" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['text1'] ?? '' }}</textarea>
            </div>
            <div class="afg">
                <label>المحتوى النصي الثاني (text2)</label>
                <textarea name="text2" id="abtt2" rows="3" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['text2'] ?? '' }}</textarea>
            </div>
            <div class="afg">
                <label>المحتوى النصي الثالث (text3)</label>
                <textarea name="text3" id="abtt3" rows="3" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['text3'] ?? '' }}</textarea>
            </div>
            
            <h4 style="margin:24px 0 10px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:6px">قسم الخبرة والإحصائيات</h4>
            
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>عنوان قسم الخبرة (السطر الأول)</label>
                    <input type="text" name="exp_t1" id="abtexpt1" value="{{ $about['exp_t1'] ?? 'شركة عزل القصيم' }}" placeholder="مثال: شركة عزل القصيم">
                </div>
                <div class="afg" style="margin:0">
                    <label>عنوان قسم الخبرة (السطر الثاني)</label>
                    <input type="text" name="exp_t2" id="abtexpt2" value="{{ $about['exp_t2'] ?? 'أكثر من 10 سنوات خبرة' }}" placeholder="مثال: أكثر من 10 سنوات خبرة">
                </div>
            </div>

            <div class="afg">
                <label>فقرة إضافية (1) في قسم الخبرة</label>
                <textarea name="p1" id="abtp1" rows="2" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['p1'] ?? 'نستخدم أحدث تقنيات العزل العالمية: الفوم البولي يوريثان، العزل الإسفلتي، السيليكون المائي، وأغشية البيتومين المعدنية. فريقنا مدرب ومعتمد.' }}</textarea>
            </div>
            <div class="afg">
                <label>فقرة إضافية (2) في قسم الخبرة</label>
                <textarea name="p2" id="abtp2" rows="2" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['p2'] ?? 'تأسست شركة عزل القصيم لتكون الشريك الأمين لأصحاب المنازل في منطقة القصيم وبريدة وحائل في مجال العزل المائي والحراري للأسطح والخزانات والحمامات.' }}</textarea>
            </div>

            <h4 style="margin:24px 0 10px; color:var(--nv); padding-bottom:6px">إحصائيات الشركة العدادية</h4>
            <div id="stats-container" style="display:flex; flex-direction:column; gap:12px; margin-bottom:18px">
                @php
                    $aboutStats = $about['stats'] ?? [
                        ['num' => '+800', 'lbl' => 'مشروع منجز', 'color' => 'var(--nv)'],
                        ['num' => '15', 'lbl' => 'سنوات ضمان', 'color' => 'var(--am)'],
                        ['num' => '3', 'lbl' => 'مناطق خدمة', 'color' => 'var(--gr)']
                    ];
                @endphp
                @foreach($aboutStats as $index => $stat)
                    <div class="stat-row" style="display:flex; gap:10px; align-items:center; background:#f8f9fa; padding:10px; border-radius:var(--r); border:1px solid #e2e8f0">
                        <div style="flex:1">
                            <label style="font-size:11px; color:#666">الرقم / القيمة (مثال: +800)</label>
                            <input type="text" name="stats[{{ $index }}][num]" value="{{ $stat['num'] }}" required style="width:100%; padding:6px; border:1px solid #ddd; border-radius:4px">
                        </div>
                        <div style="flex:2">
                            <label style="font-size:11px; color:#666">العلامة / الوصف (مثال: مشروع منجز)</label>
                            <input type="text" name="stats[{{ $index }}][lbl]" value="{{ $stat['lbl'] }}" required style="width:100%; padding:6px; border:1px solid #ddd; border-radius:4px">
                        </div>
                        <div style="width:140px">
                            <label style="font-size:11px; color:#666">لون النص</label>
                            <select name="stats[{{ $index }}][color]" style="width:100%; padding:6px; border:1px solid #ddd; border-radius:4px; font-family:inherit">
                                <option value="var(--nv)" {{ ($stat['color'] ?? '') === 'var(--nv)' ? 'selected' : '' }}>أزرق غامق</option>
                                <option value="var(--am)" {{ ($stat['color'] ?? '') === 'var(--am)' ? 'selected' : '' }}>ذهبي</option>
                                <option value="var(--gr)" {{ ($stat['color'] ?? '') === 'var(--gr)' ? 'selected' : '' }}>أخضر</option>
                            </select>
                        </div>
                        <button type="button" class="btn rd" onclick="$(this).parent().remove(); reindexStats();" style="margin-top:16px; padding:6px 10px; height:34px"><i class="fas fa-trash"></i></button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-am" onclick="addStatRow()" style="margin-bottom:24px"><i class="fas fa-plus"></i> إضافة إحصائية جديدة</button>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>أيقونة القسم (في حال عدم اختيار صورة)</label>
                    <input type="text" name="icon" value="{{ $about['icon'] ?? 'fa-building' }}">
                </div>
            </div>

            <!-- Image Selection / Upload for About section -->
            <div class="afg">
                <label>صورة الشركة الموحدة (تظهر في قسم لماذا تختارنا بالرئيسية وفي صفحة من نحن)</label>
                <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap">
                    <input type="hidden" name="img" id="about-img-val" value="{{ $about['img'] ?? '' }}">
                    <div style="width:120px; height:120px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="about-img-preview" src="{{ !empty($about['img']) ? $about['img'] : '' }}" style="width:100%; height:100%; object-fit:cover; {{ empty($about['img']) ? 'display:none' : '' }}">
                        <div id="about-img-placeholder" style="font-size:36px; color:var(--cc); {{ !empty($about['img']) ? 'display:none' : '' }}"><i class="fas fa-building"></i></div>
                    </div>
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#about-img-val').val(url); $('#about-img-preview').attr('src', url).show(); $('#about-img-placeholder').hide(); Swal.fire('تم رفع الصورة!', 'تم اختيار وتحديث الصورة بنجاح.', 'success'); })">
                        <div style="font-size:11px; color:var(--cc); margin-top:4px">اختر صورة حقيقية لعزل الأسطح ليتم استخدامها بدلاً من الأيقونة الافتراضية.</div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ قسم من نحن</button>
        </form>
    </div>
    
    <!-- Tab: Service Page Texts -->
    <div id="tab-svc" class="tab-content" style="display:none">
        <form id="form-svc" onsubmit="saveSetting(event, 'svc_page')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-tools" style="color:var(--am)"></i> نصوص صفحة تفاصيل الخدمة</h3>
            <p style="font-size:12px; color:var(--cc); margin-bottom:18px">تغيير العناوين الثابتة التي تظهر داخل صفحة أي خدمة (مثل: عن هذه الخدمة، مميزات الخدمة، خدمات أخرى).</p>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>عنوان قسم الوصف</label>
                    <input type="text" name="about_title" value="{{ $svc_page['about_title'] ?? 'عن هذه الخدمة' }}" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>عنوان قسم المميزات</label>
                    <input type="text" name="feats_title" value="{{ $svc_page['feats_title'] ?? 'مميزات الخدمة' }}" required>
                </div>
            </div>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>عنوان قسم الخدمات الأخرى (بالقائمة الجانبية)</label>
                    <input type="text" name="other_title" value="{{ $svc_page['other_title'] ?? 'خدمات أخرى' }}" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>وصف تحت زر احصل على عرض</label>
                    <input type="text" name="offer_desc" value="{{ $svc_page['offer_desc'] ?? 'معاينة مجانية لسطحك وعرض سعر شفاف' }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ النصوص</button>
        </form>
    </div>
    
    <!-- Tab 10: Gallery Section Title & Subtitles -->
    <div id="tab-gallery-info" class="tab-content" style="display:none">
        <form id="form-gallery-info" onsubmit="saveSetting(event, 'gallery_info')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-images" style="color:var(--am)"></i> نصوص معرض الأعمال (Gallery)</h3>
            <div class="afg" style="margin-bottom:18px">
                <label>الوسم الصغير بالذهبي (Tag)</label>
                <input type="text" name="tag" value="{{ $gallery_info['tag'] ?? 'أعمالنا' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>العنوان الفرعي الطويل (h3)</label>
                <input type="text" name="h3" value="{{ $gallery_info['h3'] ?? 'أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>العنوان الرئيسي الملون (h2)</label>
                <input type="text" name="h2" value="{{ $gallery_info['h2'] ?? 'أعمالنا تتحدث عنا' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>الوصف السفلي (p)</label>
                <input type="text" name="p" value="{{ $gallery_info['p'] ?? 'صور حقيقية من مشاريع نفذناها في القصيم وبريدة وحائل' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ نصوص معرض الأعمال</button>
        </form>
    </div>
    
    <!-- Tab 11: Testimonials Section Title & Subtitles -->
    <div id="tab-testimonials-info" class="tab-content" style="display:none">
        <form id="form-testimonials-info" onsubmit="saveSetting(event, 'testimonials_info')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-comments" style="color:var(--am)"></i> نصوص آراء العملاء (Testimonials)</h3>
            <div class="afg" style="margin-bottom:18px">
                <label>الوسم الصغير بالذهبي (Tag)</label>
                <input type="text" name="tag" value="{{ $testimonials_info['tag'] ?? 'آراء العملاء' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>العنوان الفرعي الطويل (h3)</label>
                <input type="text" name="h3" value="{{ $testimonials_info['h3'] ?? 'أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>العنوان الرئيسي الملون (h2)</label>
                <input type="text" name="h2" value="{{ $testimonials_info['h2'] ?? 'ما هي آراء عملائنا' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>الوصف السفلي (p)</label>
                <input type="text" name="p" value="{{ $testimonials_info['p'] ?? 'أكثر من 800 عميل راضٍ في القصيم وبريدة وحائل' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ نصوص آراء العملاء</button>
        </form>
    </div>
    
    <!-- Tab 12: Service Areas Section Title & Subtitles -->
    <div id="tab-areas-info" class="tab-content" style="display:none">
        <form id="form-areas-info" onsubmit="saveSetting(event, 'areas_info')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-map-marker-alt" style="color:var(--am)"></i> نصوص مناطق الخدمة (Areas)</h3>
            <div class="afg" style="margin-bottom:18px">
                <label>الوسم الصغير بالذهبي (Tag)</label>
                <input type="text" name="tag" value="{{ $areas_info['tag'] ?? 'مناطق الخدمة' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>العنوان الفرعي الطويل (h3)</label>
                <input type="text" name="h3" value="{{ $areas_info['h3'] ?? 'أفضل شركة عزل فوم بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>العنوان الرئيسي الملون (h2)</label>
                <input type="text" name="h2" value="{{ $areas_info['h2'] ?? 'نخدم كل المنطقة' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <div class="afg" style="margin-bottom:18px">
                <label>الوصف السفلي (p)</label>
                <input type="text" name="p" value="{{ $areas_info['p'] ?? 'نغطي القصيم وبريدة وحائل وكل المناطق المجاورة' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ نصوص مناطق الخدمة</button>
        </form>
    </div>
    
    <!-- Tab Why Choose Us: whyItems -->
    <div id="tab-why" class="tab-content" style="display:none">
        <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-award" style="color:var(--am)"></i> مميزات لماذا تختارنا (Why Choose Us)</h3>

        <!-- General Why Us settings form -->
        <form id="form-why-us" onsubmit="saveSetting(event, 'why_us')" style="background:var(--sl); border-radius:var(--r); padding:20px; margin-bottom:24px; border:1px solid #e1e3e5">
            <h4 style="margin-bottom:14px; color:var(--nv)"><i class="fas fa-edit" style="color:var(--am)"></i> العناوين الرئيسية لقسم "لماذا تختارنا"</h4>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr; gap:16px; margin-bottom:16px">
                <div class="afg" style="margin:0">
                    <label>العنوان الرئيسي لقسم لماذا تختارنا (يمكنك استخدام وسم &lt;em&gt; للنص الملون بالذهبي)</label>
                    <input type="text" name="title" value="{{ $why_us['title'] ?? 'لماذا تختار <em>عزل القصيم؟</em>' }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:var(--r); font-family:inherit">
                </div>
                <div class="afg" style="margin:0">
                    <label>الوصف / التفاصيل</label>
                    <textarea name="desc" rows="2" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" required>{{ $why_us['desc'] ?? 'نحن الخيار الأول لأهالي القصيم وبريدة وحائل. نجمع بين الخبرة الطويلة والتقنيات الحديثة لنضمن لك منزلاً محمياً من التسربات والحرارة.' }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ العناوين الرئيسية</button>
        </form>
        
        <h4 style="margin:18px 0 10px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:6px"><i class="fas fa-list" style="color:var(--am)"></i> قائمة المميزات المضافة</h4>
        <!-- Add/Edit form -->
        <form id="form-why-item" onsubmit="saveWhyItem(event)" style="background:var(--sl); border-radius:var(--r); padding:16px; margin-bottom:20px; border:1px solid #e1e3e5">
            <h4 id="why-form-title" style="margin-bottom:12px; color:var(--nv)">إضافة ميزة جديدة</h4>
            <input type="hidden" name="id" id="why-item-id" value="">
            
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:12px">
                <div class="afg" style="margin:0">
                    <label>العنوان *</label>
                    <input type="text" name="title" id="why-item-title" placeholder="مثال: ضمان 10 سنوات حقيقي" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>الوصف / التفاصيل</label>
                    <input type="text" name="desc" id="why-item-desc" placeholder="مثال: ضمان موثق رسمي مع متابعة مجانية دورية">
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px">
                <div class="afg" style="margin:0">
                    <label>الأيقونة (اسم كلاس FontAwesome) - سيتم استخدامها في حال عدم رفع صورة</label>
                    <input type="text" name="icon" id="why-item-icon" placeholder="مثال: fa-shield-alt, fa-certificate, fa-tools, fa-leaf, fa-clock" value="fa-check">
                </div>
                <div class="afg" style="margin:0">
                    <label>أو ارفع صورة (اختياري - سيحل محل الأيقونة إذا تم رفعه)</label>
                    <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap">
                        <input type="hidden" name="img" id="why-item-img-val" value="">
                        <div style="width:40px; height:40px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                            <img id="why-item-img-preview" src="" style="width:100%; height:100%; object-fit:contain; display:none">
                            <div id="why-item-img-placeholder" style="font-size:18px; color:var(--cc)"><i class="fas fa-image"></i></div>
                        </div>
                        <div style="display:flex; gap:8px; align-items:center">
                            <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#why-item-img-val').val(url); $('#why-item-img-preview').attr('src', url).show(); $('#why-item-img-placeholder').hide(); })" style="font-size:11px; max-width:180px">
                            <button type="button" onclick="clearWhyImage()" style="background:#ef9090; color:#fff; border:none; padding:4px 8px; border-radius:4px; font-size:10px; cursor:pointer"><i class="fas fa-times"></i> حذف الصورة</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display:flex; gap:10px">
                <button type="submit" class="btn btn-nv" style="height:41px; justify-content:center; padding:0 24px"><i class="fas fa-save"></i> حفظ الميزة</button>
                <button type="button" id="why-btn-cancel" onclick="resetWhyForm()" class="btn" style="height:41px; justify-content:center; background:#eee; color:#666; display:none">إلغاء التعديل</button>
            </div>
        </form>

        <!-- Why items table -->
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:12px; border-bottom:2px solid #ddd; width:60px">#</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd; width:100px">الأيقونة / الصورة</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">العنوان</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">الوصف</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd; width:120px">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($whyItems as $wi)
                        <tr style="border-bottom:1px solid #eee" id="why-row-{{ $wi->id }}">
                            <td style="padding:12px">{{ $loop->iteration }}</td>
                            <td style="padding:12px">
                                @if(!empty($wi->img))
                                    <img src="{{ $wi->img }}" style="width:30px; height:30px; object-fit:contain; border-radius:4px">
                                @else
                                    <i class="fas {{ $wi->icon ?? 'fa-check' }}" style="font-size:20px; color:var(--am)"></i>
                                @endif
                            </td>
                            <td style="padding:12px"><strong>{{ $wi->title }}</strong></td>
                            <td style="padding:12px; font-size:12px; color:var(--cc)">{{ $wi->desc }}</td>
                            <td style="padding:12px">
                                <button class="ab gn" onclick="editWhyItem({{ json_encode($wi) }})" title="تعديل"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteWhyItem({{ $wi->id }})" title="حذف"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tab How We Work: how_we_work -->
    <div id="tab-how-we-work" class="tab-content" style="display:none">
        <form id="form-how-we-work" onsubmit="saveSetting(event, 'how_we_work')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-list-ol" style="color:var(--am)"></i> إعدادات آلية العمل (كيف نعمل)</h3>
            
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>الوسم الصغير بالذهبي (Tag)</label>
                    <input type="text" name="tag" value="{{ $how_we_work['tag'] ?? 'آلية العمل' }}" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>العنوان الرئيسي (يمكنك استخدام وسم &lt;em&gt; للنص الملون بالذهبي)</label>
                    <input type="text" name="title" value="{{ $how_we_work['title'] ?? 'كيف <em>نعمل؟</em>' }}" required>
                </div>
            </div>

            <div class="afg" style="margin-bottom:18px">
                <label>العنوان الفرعي الطويل (H3)</label>
                <input type="text" name="subtitle" value="{{ $how_we_work['subtitle'] ?? 'أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام' }}" required>
            </div>

            <div class="afg" style="margin-bottom:18px">
                <label>الوصف / التفاصيل الفرعية (Description)</label>
                <textarea name="desc" rows="3" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $how_we_work['desc'] ?? 'خطوات واضحة وشفافة للحصول على خدمة عزل احترافية' }}</textarea>
            </div>

            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ إعدادات نصوص آلية العمل</button>
        </form>

        <h4 style="margin:26px 0 10px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:6px"><i class="fas fa-list-ol" style="color:var(--am)"></i> قائمة خطوات العمل المضافة</h4>
        
        <!-- Add/Edit Step form -->
        <form id="form-step" onsubmit="saveStep(event)" style="background:var(--sl); border-radius:var(--r); padding:16px; margin-bottom:20px; border:1px solid #e1e3e5">
            <h4 id="step-form-title" style="margin-bottom:12px; color:var(--nv)">إضافة خطوة عمل جديدة</h4>
            <input type="hidden" name="id" id="step-id" value="">
            
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:100px 1fr 1fr; gap:16px; margin-bottom:12px">
                <div class="afg" style="margin:0">
                    <label>رقم الخطوة *</label>
                    <input type="number" name="num" id="step-num" placeholder="مثال: 1" required min="1">
                </div>
                <div class="afg" style="margin:0">
                    <label>عنوان الخطوة *</label>
                    <input type="text" name="title" id="step-title" placeholder="مثال: تواصل معنا" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>الوصف / التفاصيل *</label>
                    <input type="text" name="desc" id="step-desc" placeholder="مثال: اتصل أو أرسل واتساب" required>
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px">
                <div class="afg" style="margin:0">
                    <label>الأيقونة (FontAwesome) - اختياري</label>
                    <input type="text" name="icon" id="step-icon" placeholder="مثال: fa-phone, fa-calendar-check" value="">
                </div>
                <div class="afg" style="margin:0">
                    <label>أو ارفع صورة (اختياري - سيحل محل رقم الخطوة إذا تم رفعه)</label>
                    <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap">
                        <input type="hidden" name="img" id="step-img-val" value="">
                        <div style="width:40px; height:40px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                            <img id="step-img-preview" src="" style="width:100%; height:100%; object-fit:contain; display:none">
                            <div id="step-img-placeholder" style="font-size:18px; color:var(--cc)"><i class="fas fa-image"></i></div>
                        </div>
                        <div style="display:flex; gap:8px; align-items:center">
                            <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#step-img-val').val(url); $('#step-img-preview').attr('src', url).show(); $('#step-img-placeholder').hide(); })" style="font-size:11px; max-width:180px">
                            <button type="button" onclick="clearStepImage()" style="background:#ef9090; color:#fff; border:none; padding:4px 8px; border-radius:4px; font-size:10px; cursor:pointer"><i class="fas fa-times"></i> حذف الصورة</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display:flex; gap:10px">
                <button type="submit" class="btn btn-nv" style="height:41px; justify-content:center; padding:0 24px"><i class="fas fa-save"></i> حفظ الخطوة</button>
                <button type="button" id="step-btn-cancel" onclick="resetStepForm()" class="btn" style="height:41px; justify-content:center; background:#eee; color:#666; display:none">إلغاء التعديل</button>
            </div>
        </form>

        <!-- Steps table -->
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:12px; border-bottom:2px solid #ddd; width:100px">رقم الخطوة</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd; width:100px">صورة / أيقونة</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">عنوان الخطوة</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">الوصف</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd; width:120px">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($steps as $stp)
                        <tr style="border-bottom:1px solid #eee" id="step-row-{{ $stp->id }}">
                            <td style="padding:12px"><strong>{{ str_replace(['0','1','2','3','4','5','6','7','8','9'], ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'], $stp->num) }}</strong></td>
                            <td style="padding:12px">
                                @if(!empty($stp->img))
                                    <img src="{{ $stp->img }}" style="width:30px; height:30px; object-fit:contain; border-radius:4px">
                                @elseif(!empty($stp->icon))
                                    <i class="fas {{ $stp->icon }}" style="font-size:20px; color:var(--am)"></i>
                                @else
                                    <span style="color:var(--cc); font-size:12px">لا يوجد (رقم فقط)</span>
                                @endif
                            </td>
                            <td style="padding:12px"><strong>{{ $stp->title }}</strong></td>
                            <td style="padding:12px; font-size:12px; color:var(--cc)">{{ $stp->desc }}</td>
                            <td style="padding:12px">
                                <button class="ab gn" onclick="editStep({{ json_encode($stp) }})" title="تعديل"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteStep({{ $stp->id }})" title="حذف"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tab 4: Contact Information -->
    <div id="tab-contact" class="tab-content" style="display:none">
        <form id="form-contact" onsubmit="saveSetting(event, 'contact')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-address-book" style="color:var(--am)"></i> بيانات التواصل</h3>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>رقم الهاتف للاتصال</label>
                    <input type="text" name="ph" value="{{ $contact['ph'] ?? '' }}" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>رقم الواتساب</label>
                    <input type="text" name="wa" value="{{ $contact['wa'] ?? '' }}" required>
                </div>
            </div>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="em" value="{{ $contact['em'] ?? '' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>العنوان بالكامل</label>
                    <input type="text" name="ad" value="{{ $contact['ad'] ?? '' }}" required>
                </div>
            </div>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>أوقات العمل</label>
                    <input type="text" name="hr" value="{{ $contact['hr'] ?? 'السبت - الخميس: 7ص - 10م' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>رابط جوجل ماب (Google Map Embed URL)</label>
                    <input type="text" name="map" value="{{ $contact['map'] ?? '' }}">
                </div>
            </div>

            <!-- National Address Customizer -->
            <h4 style="margin:28px 0 16px; color:var(--nv); border-bottom:1px solid #eee; padding-bottom:8px; font-weight:700;"><i class="fas fa-file-invoice" style="color:var(--am)"></i> بيانات وثيقة العنوان الوطني الرسمية</h4>
            
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>الاسم بالكامل للمؤسسة (العنوان الوطني)</label>
                    <input type="text" name="na_company_name" value="{{ $contact['na_company_name'] ?? 'مؤسسة رونق قلب الخليج للمقاولات العامة' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>العنوان المختصر (Short Address)</label>
                    <input type="text" name="na_short_address" value="{{ $contact['na_short_address'] ?? 'QBPA3764' }}">
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>رقم الإثبات (Proof No.)</label>
                    <input type="text" name="na_proof_no" value="{{ $contact['na_proof_no'] ?? '1036369457' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>رقم الحساب (Customer Acc.)</label>
                    <input type="text" name="na_customer_acc" value="{{ $contact['na_customer_acc'] ?? '3132637196 2' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>تاريخ التسجيل (Reg. Date)</label>
                    <input type="text" name="na_reg_date" value="{{ $contact['na_reg_date'] ?? '12/7/2023' }}">
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>تاريخ الإصدار (Issued)</label>
                    <input type="text" name="na_issued_date" value="{{ $contact['na_issued_date'] ?? '12/7/2023' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>تاريخ الانتهاء (Expires)</label>
                    <input type="text" name="na_expired_date" value="{{ $contact['na_expired_date'] ?? '1/8/2024' }}">
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>رقم المبنى (Building No.)</label>
                    <input type="text" name="na_building_no" value="{{ $contact['na_building_no'] ?? '3764' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>الشارع (Street)</label>
                    <input type="text" name="na_street" value="{{ $contact['na_street'] ?? 'التغيرة' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>الحي (District)</label>
                    <input type="text" name="na_district" value="{{ $contact['na_district'] ?? 'التخصصي' }}">
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>الرمز البريدي (Postal Code)</label>
                    <input type="text" name="na_postal_code" value="{{ $contact['na_postal_code'] ?? '52366' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>الرقم الفرعي (Secondary No.)</label>
                    <input type="text" name="na_secondary_no" value="{{ $contact['na_secondary_no'] ?? '7027' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>المدينة (City)</label>
                    <input type="text" name="na_city" value="{{ $contact['na_city'] ?? 'بريدة · BURAIDAH' }}">
                </div>
            </div>

            <div class="afg" style="margin-bottom:18px">
                <label>رابط التحقق من العنوان الوطني (Verification Link)</label>
                <input type="text" name="na_verify_link" value="{{ $contact['na_verify_link'] ?? 'https://proof.address.gov.sa/VerifyProofNA.aspx' }}" style="width:100%">
            </div>

            <div class="afg" style="margin-bottom:24px">
                <label style="font-weight:700">صورة وثيقة العنوان الوطني (مستند الإثبات الرسمي)</label>
                <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap; margin-top:8px">
                    <input type="hidden" name="na_image" id="contact-na_image-val" value="{{ $contact['na_image'] ?? '' }}">
                    <div style="width:140px; height:90px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="contact-na_image-preview" src="{{ !empty($contact['na_image']) ? $contact['na_image'] : '/images/national-address.jpeg' }}" style="width:100%; height:100%; object-fit:contain;">
                    </div>
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#contact-na_image-val').val(url); $('#contact-na_image-preview').attr('src', url); Swal.fire('تم رفع الوثيقة بنجاح!', 'تم رفع الصورة وحفظ رابط المسار، يرجى الضغط على حفظ في الأسفل لتأكيد الحفظ الدائم.', 'success'); })">
                        <div style="font-size:11px; color:var(--cc); margin-top:4px">صيغ مدعومة: PNG, JPG, JPEG, WebP. الحجم الأقصى: 10MB</div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ بيانات التواصل</button>
        </form>
    </div>

    <!-- Tab 5: Site Colors Settings -->
    <div id="tab-colors" class="tab-content" style="display:none">
        <form id="form-colors" onsubmit="saveSetting(event, 'colors')">
            <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-palette" style="color:var(--am)"></i> هويّة الألوان للموقع</h3>
            <p style="font-size:12px; color:var(--cc); margin-bottom:18px">اختر درجات الألوان المناسبة التي تود تطبيقها فوراً على موقع الويب بالكامل لتطابق هويتك البصرية:</p>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:18px; margin-bottom:24px">
                <div style="background:var(--sl); border-radius:var(--r); padding:16px; border:1px solid #e1e3e5; text-align:center">
                    <label style="display:block; font-weight:700; margin-bottom:8px">اللون الداكن الأساسي (Navy)</label>
                    <input type="color" name="nv" value="{{ $colors['nv'] ?? '#0f2441' }}" style="width:70px; height:40px; border:none; cursor:pointer; background:none">
                    <div style="font-size:11px; margin-top:5px; color:var(--cc)">اللون الافتراضي: #0f2441</div>
                </div>
                <div style="background:var(--sl); border-radius:var(--r); padding:16px; border:1px solid #e1e3e5; text-align:center">
                    <label style="display:block; font-weight:700; margin-bottom:8px">اللون الذهبي الفرعي (Amber)</label>
                    <input type="color" name="am" value="{{ $colors['am'] ?? '#c5a880' }}" style="width:70px; height:40px; border:none; cursor:pointer; background:none">
                    <div style="font-size:11px; margin-top:5px; color:var(--cc)">اللون الافتراضي: #c5a880</div>
                </div>
                <div style="background:var(--sl); border-radius:var(--r); padding:16px; border:1px solid #e1e3e5; text-align:center">
                    <label style="display:block; font-weight:700; margin-bottom:8px">اللون الأخضر / التمييز (Highlight)</label>
                    <input type="color" name="gr" value="{{ $colors['gr'] ?? '#4ade80' }}" style="width:70px; height:40px; border:none; cursor:pointer; background:none">
                    <div style="font-size:11px; margin-top:5px; color:var(--cc)">اللون الافتراضي: #4ade80</div>
                </div>
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ وتطبيق الألوان فوراً</button>
        </form>
    </div>

    <!-- Tab 6: Navigation Menu Settings -->
    <div id="tab-menu" class="tab-content" style="display:none">
        <h3 style="margin-bottom:18px; color:var(--nv)"><i class="fas fa-bars" style="color:var(--am)"></i> روابط قائمة المنيو (Navigation Menus)</h3>
        
        <!-- Add Menu Form -->
        <form id="form-menu-add" onsubmit="addMenuItem(event)" style="background:var(--sl); border-radius:var(--r); padding:16px; margin-bottom:20px; border:1px solid #e1e3e5">
            <h4 style="margin-bottom:12px; color:var(--nv)">إضافة رابط جديد للمنيو</h4>
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr 100px; gap:12px; align-items:flex-end">
                <div class="afg" style="margin:0">
                    <label>اسم الرابط (مثال: من نحن)</label>
                    <input type="text" name="n" placeholder="من نحن" required>
                </div>
                <div class="afg" style="margin:0">
                    <label>الرابط (مثال: /about)</label>
                    <input type="text" name="u" placeholder="/about" required>
                </div>
                <button type="submit" class="btn btn-nv" style="height:41px; justify-content:center; width:100%"><i class="fas fa-plus"></i> إضافة</button>
            </div>
        </form>

        <!-- Menu items table -->
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:12px; border-bottom:2px solid #ddd">الترتيب</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">الاسم</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">الرابط</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">الحالة</th>
                        <th style="padding:12px; border-bottom:2px solid #ddd">العمليات</th>
                    </tr>
                </thead>
                <tbody id="menu-tbody">
                    @foreach($menus as $menu)
                        <tr style="border-bottom:1px solid #eee" data-id="{{ $menu->id }}">
                            <td style="padding:12px"><i class="fas fa-grip-vertical" style="color:var(--cc); cursor:grab"></i> {{ $loop->iteration }}</td>
                            <td style="padding:12px"><strong>{{ $menu->n }}</strong></td>
                            <td style="padding:12px"><code>{{ $menu->u }}</code></td>
                            <td style="padding:12px">
                                <span class="atag" style="background:{{ $menu->v ? 'rgba(74,222,128,.15);color:var(--gr)' : 'rgba(239,144,144,.15);color:#ef9090' }}">
                                    {{ $menu->v ? 'نشط' : 'مخفي' }}
                                </span>
                            </td>
                            <td style="padding:12px">
                                <button class="ab gn" onclick="toggleMenuVis({{ $menu->id }}, {{ $menu->v ? 'false' : 'true' }})"><i class="fas fa-eye-slash"></i></button>
                                <button class="ab rd" onclick="deleteMenuItem({{ $menu->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Tab toggler
    function showTab(tabId, btn) {
        $('.tab-content').hide();
        $('#' + tabId).show();
        $('.tab-btn').removeClass('active').css('color', 'var(--cc)');
        $(btn).addClass('active').css('color', 'var(--nv)');
    }

    // Save general settings via AJAX
    function saveSetting(e, key) {
        e.preventDefault();
        const form = $(e.target);
        
        // Serialize form to object with nested array parsing
        const data = {};
        form.serializeArray().forEach(item => {
            const match = item.name.match(/^(.+)\[(\d+)\]\[(.+)\]$/);
            if (match) {
                const arrayName = match[1];
                const index = parseInt(match[2]);
                const fieldName = match[3];
                
                if (!data[arrayName]) {
                    data[arrayName] = [];
                }
                if (!data[arrayName][index]) {
                    data[arrayName][index] = {};
                }
                data[arrayName][index][fieldName] = item.value;
            } else {
                data[item.name] = item.value;
            }
        });

        Swal.showLoading();
        $.ajax({
            url: '/admin/settings/' + key,
            type: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم الحفظ بنجاح!',
                        text: 'تم تحديث الإعدادات وحفظها في قاعدة البيانات.',
                        icon: 'success',
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: 'var(--nv)'
                    });
                } else {
                    Swal.fire('خطأ!', 'فشل حفظ الإعدادات، حاول مرة أخرى.', 'error');
                }
            },
            error: function(err) {
                Swal.close();
                Swal.fire('خطأ!', 'حدث خطأ في الخادم أثناء الحفظ.', 'error');
            }
        });
    }

    // Add new menu item via AJAX
    function addMenuItem(e) {
        e.preventDefault();
        const form = $(e.target);
        const name = form.find('input[name="n"]').val();
        const url = form.find('input[name="u"]').val();

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/menu',
            type: 'POST',
            data: {
                n: name,
                u: url,
                v: true,
                order: $('#menu-tbody tr').length + 1
            },
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire('تمت الإضافة!', 'تمت إضافة رابط القائمة الجديد بنجاح.', 'success').then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('خطأ!', 'فشل إرسال البيانات.', 'error');
            }
        });
    }

    // Toggle menu item visibility
    function toggleMenuVis(id, state) {
        Swal.showLoading();
        $.ajax({
            url: '/admin/content/menu',
            type: 'POST',
            data: {
                id: id,
                v: state
            },
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire('تم التعديل!', 'تم تعديل حالة ظهور رابط القائمة بنجاح.', 'success').then(() => {
                        window.location.reload();
                    });
                }
            }
        });
    }

    // Delete menu item via AJAX
    function deleteMenuItem(id) {
        Swal.fire({
            title: 'هل أنت متأكد من حذف هذا الرابط؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم، احذف',
            cancelButtonText: 'إلغاء',
            confirmButtonColor: '#ef9090',
            cancelButtonColor: 'var(--nv)'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                $.ajax({
                    url: '/admin/content/menu/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم حذف الرابط بنجاح.', 'success').then(() => {
                                window.location.reload();
                            });
                        }
                    }
                });
            }
        });
    }

    // --- Why Choose Us (whyItems) management functions ---
    function editWhyItem(item) {
        $('#why-item-id').val(item.id);
        $('#why-item-title').val(item.title);
        $('#why-item-desc').val(item.desc || '');
        $('#why-item-icon').val(item.icon || 'fa-check');
        $('#why-item-img-val').val(item.img || '');
        
        if (item.img) {
            $('#why-item-img-preview').attr('src', item.img).show();
            $('#why-item-img-placeholder').hide();
        } else {
            $('#why-item-img-preview').hide().attr('src', '');
            $('#why-item-img-placeholder').show();
        }

        $('#why-form-title').text('تعديل ميزة: ' + item.title);
        $('#why-btn-cancel').show();
        // scroll up to form
        $('#form-why-item')[0].scrollIntoView({ behavior: 'smooth' });
    }

    function resetWhyForm() {
        $('#why-item-id').val('');
        $('#why-item-title').val('');
        $('#why-item-desc').val('');
        $('#why-item-icon').val('fa-check');
        $('#why-item-img-val').val('');
        $('#why-item-img-preview').hide().attr('src', '');
        $('#why-item-img-placeholder').show();

        $('#why-form-title').text('إضافة ميزة جديدة');
        $('#why-btn-cancel').hide();
    }

    function clearWhyImage() {
        $('#why-item-img-val').val('');
        $('#why-item-img-preview').hide().attr('src', '');
        $('#why-item-img-placeholder').show();
    }

    function saveWhyItem(e) {
        e.preventDefault();
        const id = $('#why-item-id').val();
        const title = $('#why-item-title').val();
        const desc = $('#why-item-desc').val();
        const icon = $('#why-item-icon').val();
        const img = $('#why-item-img-val').val();

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/whyItems',
            type: 'POST',
            data: {
                id: id,
                title: title,
                desc: desc,
                icon: icon,
                img: img
            },
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire('تم الحفظ!', 'تم حفظ الميزة بنجاح.', 'success').then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('خطأ!', 'حدث خطأ أثناء الحفظ.', 'error');
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('خطأ!', 'فشل الاتصال بالخادم.', 'error');
            }
        });
    }

    function deleteWhyItem(id) {
        Swal.fire({
            title: 'هل أنت متأكد من حذف هذه الميزة؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم، احذف',
            cancelButtonText: 'إلغاء',
            confirmButtonColor: '#ef9090',
            cancelButtonColor: 'var(--nv)'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                $.ajax({
                    url: '/admin/content/whyItems/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم حذف الميزة بنجاح.', 'success').then(() => {
                                window.location.reload();
                            });
                        }
                    }
                });
            }
        });
    }

    // --- Work Steps (steps) management functions ---
    function editStep(item) {
        $('#step-id').val(item.id);
        $('#step-num').val(item.num);
        $('#step-title').val(item.title);
        $('#step-desc').val(item.desc || '');
        $('#step-icon').val(item.icon || '');
        $('#step-img-val').val(item.img || '');
        
        if (item.img) {
            $('#step-img-preview').attr('src', item.img).show();
            $('#step-img-placeholder').hide();
        } else {
            $('#step-img-preview').hide().attr('src', '');
            $('#step-img-placeholder').show();
        }

        $('#step-form-title').text('تعديل خطوة العمل رقم: ' + item.num);
        $('#step-btn-cancel').show();
        // scroll up to form
        $('#form-step')[0].scrollIntoView({ behavior: 'smooth' });
    }

    function resetStepForm() {
        $('#step-id').val('');
        $('#step-num').val('');
        $('#step-title').val('');
        $('#step-desc').val('');
        $('#step-icon').val('');
        $('#step-img-val').val('');
        $('#step-img-preview').hide().attr('src', '');
        $('#step-img-placeholder').show();

        $('#step-form-title').text('إضافة خطوة عمل جديدة');
        $('#step-btn-cancel').hide();
    }

    function clearStepImage() {
        $('#step-img-val').val('');
        $('#step-img-preview').hide().attr('src', '');
        $('#step-img-placeholder').show();
    }

    function saveStep(e) {
        e.preventDefault();
        const id = $('#step-id').val();
        const num = $('#step-num').val();
        const title = $('#step-title').val();
        const desc = $('#step-desc').val();
        const icon = $('#step-icon').val();
        const img = $('#step-img-val').val();

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/steps',
            type: 'POST',
            data: {
                id: id,
                num: num,
                title: title,
                desc: desc,
                icon: icon,
                img: img
            },
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire('تم الحفظ!', 'تم حفظ خطوة العمل بنجاح.', 'success').then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('خطأ!', 'حدث خطأ أثناء الحفظ.', 'error');
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('خطأ!', 'فشل الاتصال بالخادم.', 'error');
            }
        });
    }

    function deleteStep(id) {
        Swal.fire({
            title: 'هل أنت متأكد من حذف هذه الخطوة؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم، احذف',
            cancelButtonText: 'إلغاء',
            confirmButtonColor: '#ef9090',
            cancelButtonColor: 'var(--nv)'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                $.ajax({
                    url: '/admin/content/steps/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم حذف خطوة العمل بنجاح.', 'success').then(() => {
                                window.location.reload();
                            });
                        }
                    }
                });
            }
        });
    }

    // --- Dynamic Stats management inside About Us ---
    function addStatRow() {
        const container = $('#stats-container');
        const index = container.find('.stat-row').length;
        const rowHtml = `
            <div class="stat-row" style="display:flex; gap:10px; align-items:center; background:#f8f9fa; padding:10px; border-radius:var(--r); border:1px solid #e2e8f0">
                <div style="flex:1">
                    <label style="font-size:11px; color:#666">الرقم / القيمة (مثال: +800)</label>
                    <input type="text" name="stats[\${index}][num]" value="" required style="width:100%; padding:6px; border:1px solid #ddd; border-radius:4px">
                </div>
                <div style="flex:2">
                    <label style="font-size:11px; color:#666">العلامة / الوصف (مثال: مشروع منجز)</label>
                    <input type="text" name="stats[\${index}][lbl]" value="" required style="width:100%; padding:6px; border:1px solid #ddd; border-radius:4px">
                </div>
                <div style="width:140px">
                    <label style="font-size:11px; color:#666">لون النص</label>
                    <select name="stats[\${index}][color]" style="width:100%; padding:6px; border:1px solid #ddd; border-radius:4px; font-family:inherit">
                        <option value="var(--nv)">أزرق غامق</option>
                        <option value="var(--am)">ذهبي</option>
                        <option value="var(--gr)">أخضر</option>
                    </select>
                </div>
                <button type="button" class="btn rd" onclick="$(this).parent().remove(); reindexStats();" style="margin-top:16px; padding:6px 10px; height:34px"><i class="fas fa-trash"></i></button>
            </div>
        `;
        container.append(rowHtml);
    }

    function reindexStats() {
        $('#stats-container .stat-row').each(function(index) {
            $(this).find('input, select').each(function() {
                const name = $(this).attr('name');
                if (name) {
                    const newName = name.replace(/stats\\[\\d+\\]/, `stats[\${index}]`);
                    $(this).attr('name', newName);
                }
            });
        });
    }
</script>
<style>
    .tab-btn.active {
        border-bottom: 3px solid var(--am) !important;
    }
    .tbl th, .tbl td {
        border: 1px solid #e1e3e5;
    }
</style>
@endsection
