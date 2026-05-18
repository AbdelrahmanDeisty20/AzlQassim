@extends('admin.layouts.app')

@section('title', 'إعدادات الموقع العام')

@section('content')
<div style="background:#fff; border-radius:var(--r2); padding: 24px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
    <!-- Settings Tab Buttons -->
    <div style="display:flex; gap:10px; border-bottom: 2px solid #f1f3f5; padding-bottom: 12px; margin-bottom: 24px; overflow-x:auto;">
        <button class="tab-btn active" onclick="showTab('tab-hdr', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--nv); cursor:pointer; border-radius:var(--r); transition:all .3s">الهيدر والهوية</button>
        <button class="tab-btn" onclick="showTab('tab-hero', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">البانر الرئيسي (Hero)</button>
        <button class="tab-btn" onclick="showTab('tab-about', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">من نحن (About)</button>
        <button class="tab-btn" onclick="showTab('tab-contact', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">بيانات التواصل</button>
        <button class="tab-btn" onclick="showTab('tab-colors', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">ألوان الموقع</button>
        <button class="tab-btn" onclick="showTab('tab-menu', this)" style="background:none; border:none; padding:8px 16px; font-weight:700; font-family:inherit; color:var(--cc); cursor:pointer; border-radius:var(--r); transition:all .3s">قوائم المنيو</button>
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
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>نص زر طلب الخدمة (cta)</label>
                    <input type="text" name="cta" value="{{ $hdr['cta'] ?? 'احصل على عرض' }}">
                </div>
                <div class="afg" style="margin:0">
                    <label>نص زر الواتساب بالهيدر (wa)</label>
                    <input type="text" name="wa" value="{{ $hdr['wa'] ?? 'واتساب' }}">
                </div>
            </div>
            <button type="submit" class="btn btn-nv"><i class="fas fa-save"></i> حفظ إعدادات الهوية</button>
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
                        <input type="text" name="s1" value="{{ $hero['s1'] ?? '+800' }}" placeholder="القيمة" style="width:100px">
                        <input type="text" name="s1l" value="{{ $hero['s1l'] ?? 'مشروع ناجح' }}" placeholder="الاسم" style="flex:1">
                    </div>
                </div>
                <div class="afg" style="margin:0">
                    <label>الإحصائية الثانية (قيمة + اسم)</label>
                    <div style="display:flex; gap:8px">
                        <input type="text" name="s2" value="{{ $hero['s2'] ?? '10' }}" placeholder="القيمة" style="width:100px">
                        <input type="text" name="s2l" value="{{ $hero['s2l'] ?? 'سنوات ضمان' }}" placeholder="الاسم" style="flex:1">
                    </div>
                </div>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px">
                <div class="afg" style="margin:0">
                    <label>الإحصائية الثالثة (قيمة + اسم)</label>
                    <div style="display:flex; gap:8px">
                        <input type="text" name="s3" value="{{ $hero['s3'] ?? '100%' }}" placeholder="القيمة" style="width:100px">
                        <input type="text" name="s3l" value="{{ $hero['s3l'] ?? 'رضا العملاء' }}" placeholder="الاسم" style="flex:1">
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
                <input type="text" name="title" value="{{ $about['title'] ?? 'عزل القصيم .. خبرة 15 عاماً' }}" required>
            </div>
            <div class="afg">
                <label>المحتوى النصي الأول (text1)</label>
                <textarea name="text1" rows="3" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['text1'] ?? '' }}</textarea>
            </div>
            <div class="afg">
                <label>المحتوى النصي الثاني (text2)</label>
                <textarea name="text2" rows="3" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['text2'] ?? '' }}</textarea>
            </div>
            <div class="afg">
                <label>المحتوى النصي الثالث (text3)</label>
                <textarea name="text3" rows="3" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">{{ $about['text3'] ?? '' }}</textarea>
            </div>
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
        
        // Serialize form to object
        const data = {};
        form.serializeArray().forEach(item => {
            data[item.name] = item.value;
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
