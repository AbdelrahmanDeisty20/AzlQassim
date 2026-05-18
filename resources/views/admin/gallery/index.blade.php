@extends('admin.layouts.app')

@section('title', 'معرض الصور والفيديوهات')

@section('content')
<div class="admin-grid-cols" style="display:grid; grid-template-columns: 1.2fr 0.8fr; gap:20px; align-items: start;">
    
    <!-- Left Column: Gallery items grid -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-images" style="color:var(--am)"></i> معرض الأعمال الحالي (الصور والفيديوهات)</h3>
        
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(140px, 1fr)); gap:14px">
            @foreach($gallery as $gal)
                @php
                    $isVideo = !empty($gal->video) || $gal->cat === 'فيديو' || $gal->cat === 'video';
                    $videoUrl = $gal->video ?? $gal->img;
                    $ytId = '';
                    if ($isVideo && $videoUrl) {
                        if (Str::contains($videoUrl, 'youtube.com') || Str::contains($videoUrl, 'youtu.be')) {
                            if (Str::contains($videoUrl, 'embed/')) {
                                $ytId = explode('?', explode('embed/', $videoUrl)[1])[0];
                            } elseif (Str::contains($videoUrl, 'watch?v=')) {
                                $ytId = explode('&', explode('watch?v=', $videoUrl)[1])[0];
                            } elseif (Str::contains($videoUrl, 'youtu.be/')) {
                                $ytId = explode('?', explode('youtu.be/', $videoUrl)[1])[0];
                            }
                        }
                    }
                @endphp
                <div style="background:var(--sl); padding:8px; border-radius:var(--r); border:1px solid #e1e3e5; position:relative; text-align:center; display:flex; flex-direction:column; justify-content:space-between; min-height:165px;">
                    
                    <!-- Thumbnail area -->
                    <div style="position:relative; width:100%; height:90px; border-radius:var(--r); overflow:hidden; background:#080f1e; display:flex; align-items:center; justify-content:center;">
                        @if($isVideo)
                            @if($ytId)
                                <img src="https://img.youtube.com/vi/{{ $ytId }}/hqdefault.jpg" style="width:100%; height:100%; object-fit:cover;">
                            @elseif($gal->img && !Str::contains($gal->img, 'youtube.com'))
                                <img src="{{ $gal->img }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <div style="color:rgba(255,255,255,0.4); font-size:24px;"><i class="fas fa-play-circle"></i></div>
                            @endif
                            <!-- Play button overlay -->
                            <div style="position:absolute; inset:0; background:rgba(0,0,0,0.25); display:flex; align-items:center; justify-content:center;">
                                <div style="width:28px; height:28px; border-radius:50%; background:var(--am); color:#fff; display:flex; align-items:center; justify-content:center; font-size:11px;">
                                    <i class="fas fa-play" style="margin-left:-1px;"></i>
                                </div>
                            </div>
                        @else
                            @if($gal->img)
                                <img src="{{ $gal->img }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <div style="color:var(--am); font-size:24px;"><i class="fas {{ $gal->icon ?: 'fa-image' }}"></i></div>
                            @endif
                        @endif
                    </div>

                    <!-- Details & category -->
                    <div style="margin-top:6px; flex-grow:1; display:flex; flex-direction:column; justify-content:space-between;">
                        <div style="font-size:11px; font-weight:700; color:var(--nv); text-overflow:ellipsis; overflow:hidden; white-space:nowrap;" title="{{ $gal->title }}">{{ $gal->title }}</div>
                        <div style="margin-top:4px;">
                            <span style="font-size:10px; background:#fff; border:1px solid {{ $isVideo ? '#ef9090' : '#ddd' }}; padding:2px 8px; border-radius:10px; font-weight:700; color:{{ $isVideo ? '#d93838' : 'var(--cc)' }}">
                                @if($isVideo)
                                    <i class="fas fa-video" style="font-size:8px;"></i> فيديو
                                @else
                                    {{ $gal->cat }}
                                @endif
                            </span>
                        </div>
                    </div>
                    
                    <!-- Action buttons -->
                    <div style="position:absolute; top:8px; left:8px; display:flex; gap:4px;">
                        <!-- Edit Button -->
                        <button onclick='editGalleryItem({{ json_encode($gal) }})' style="background:#90c5ef; color:#fff; border:none; border-radius:50%; width:22px; height:22px; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 4px rgba(0,0,0,0.15)" title="تعديل">
                            <i class="fas fa-pencil-alt" style="font-size:9px"></i>
                        </button>
                        <!-- Delete button -->
                        <button onclick="deleteGalleryItem({{ $gal->id }})" style="background:#ef9090; color:#fff; border:none; border-radius:50%; width:22px; height:22px; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 4px rgba(0,0,0,0.15)" title="حذف">
                            <i class="fas fa-times" style="font-size:9px"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Right Column: Add/Edit Gallery Item form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="gal-form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة عنصر جديد للمعرض</h3>
        
        <form id="form-gal" onsubmit="saveGalleryForm(event)">
            <input type="hidden" id="gal-id">
            
            <div class="afg">
                <label>نوع العنصر بالمعرض</label>
                <select id="gal-type" onchange="toggleTypeFields()" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
                    <option value="image">صورة (عمل منجز)</option>
                    <option value="video">فيديو (مقطع مرئي / يوتيوب أو محلي)</option>
                </select>
            </div>

            <div class="afg">
                <label>عنوان العنصر (يظهر كتسمية توضيحية)</label>
                <input type="text" id="gal-title" required placeholder="مثال: فيديو عملية الرش بالفوم الأمريكي" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
            </div>

            <div class="afg">
                <label>القسم / التصنيف</label>
                <select name="cat" id="gal-cat" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
                    <option value="عزل مائي">عزل مائي</option>
                    <option value="عزل حراري">عزل حراري</option>
                    <option value="عزل فوم">عزل فوم</option>
                    <option value="عزل خزانات">عزل خزانات</option>
                    <option value="روف">روف</option>
                    <option value="فوم">فوم</option>
                    <option value="خزان">خزان</option>
                    <option value="حمام">حمام</option>
                    <option value="فيديو">فيديو</option>
                    <option value="أخرى">أخرى</option>
                </select>
            </div>

            <!-- Video URL Group (Only visible if video selected) -->
            <div class="afg" id="video-group" style="display:none; border:1px dashed rgba(197,168,128,0.35); padding:14px; border-radius:var(--r); background:#fcfbfa; margin-bottom:18px">
                <label style="font-weight:700">رابط الفيديو (يوتيوب)</label>
                <input type="text" id="gal-video" placeholder="مثال: https://www.youtube.com/watch?v=..." style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit; margin-bottom:10px">
                
                <div style="text-align:center; font-size:11px; font-weight:700; color:var(--cc); margin:10px 0; position:relative;">
                    <span style="background:#fcfbfa; padding:0 8px; position:relative; z-index:2">أو قم برفع ملف فيديو محلي</span>
                    <hr style="border:none; border-top:1px solid #eee; position:absolute; top:50%; left:0; right:0; margin:0; z-index:1">
                </div>
                
                <label style="font-weight:700">رفع ملف فيديو محلي (.mp4, .webm)</label>
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <input type="file" id="video-file-input" accept="video/mp4,video/webm,video/quicktime" onchange="uploadVideoInput(this)">
                    <div id="video-upload-status" style="font-size:11px; color:var(--cc)">صيغ مدعومة: MP4, WebM. الحد الأقصى للحجم: 50MB</div>
                </div>
            </div>

            <div class="afg">
                <label>صورة الغلاف / صورة المعرض</label>
                <div style="display:flex; gap:12px; align-items:center; flex-direction:column; width:100%">
                    <input type="hidden" name="img" id="gal-img-val">
                    <div style="width:100%; height:130px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="gal-img-preview" src="" style="width:100%; height:100%; object-fit:cover; display:none">
                        <div id="gal-img-placeholder" style="font-size:36px; color:var(--cc)"><i class="fas fa-image"></i></div>
                    </div>
                    
                    <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#gal-img-val').val(url); $('#gal-img-preview').attr('src', url).show(); $('#gal-img-placeholder').hide(); Swal.fire('تم رفع الصورة!', 'يمكنك الآن حفظ الملف إلى المعرض.', 'success'); })">
                    <span style="font-size:11px; color:var(--cc); text-align:center;">في حال إضافة فيديو، رفع الصورة يكون اختيارياً كخلفية للمقطع (Poster)</span>
                </div>
            </div>

            <div style="display:flex; gap:10px; margin-top:12px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center"><i class="fas fa-save"></i> حفظ العنصر</button>
                <button type="button" id="btn-cancel-gal" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd" onclick="resetGalForm()"><i class="fas fa-times"></i> إلغاء</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Upload local video helper
    function uploadVideoInput(inputEl) {
        const file = inputEl.files[0];
        if (!file) return;

        // Display a nice progress status
        $('#video-upload-status').html('<i class="fas fa-spinner fa-spin" style="color:var(--am)"></i> جاري رفع وتجهيز مقطع الفيديو... يرجى الانتظار');

        const formData = new FormData();
        formData.append('video', file);

        $.ajax({
            url: '/admin/upload-video',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.success) {
                    $('#gal-video').val(res.url);
                    $('#video-upload-status').html('<span style="color:var(--gr); font-weight:700;"><i class="fas fa-check-circle"></i> تم رفع الفيديو بنجاح: ' + res.url + '</span>');
                    Swal.fire('تم رفع الفيديو!', 'تم رفع ملف الفيديو بنجاح وتعبئة الرابط تلقائياً.', 'success');
                } else {
                    $('#video-upload-status').html('<span style="color:#ef9090; font-weight:700;"><i class="fas fa-exclamation-circle"></i> فشل الرفع: ' + (res.message || 'خطأ غير معروف') + '</span>');
                    Swal.fire('خطأ!', res.message || 'فشل رفع الفيديو', 'error');
                }
            },
            error: function(err) {
                $('#video-upload-status').html('<span style="color:#ef9090; font-weight:700;"><i class="fas fa-exclamation-circle"></i> حدث خطأ أثناء الرفع</span>');
                Swal.fire('خطأ!', 'فشل رفع الفيديو، تأكد من أن الحجم أقل من 50 ميجابايت والصيغة مدعومة.', 'error');
            }
        });
    }

    // Toggle video fields depending on selection
    function toggleTypeFields() {
        const type = $('#gal-type').val();
        if (type === 'video') {
            $('#video-group').show();
            $('#gal-cat').val('فيديو');
        } else {
            $('#video-group').hide();
            if ($('#gal-cat').val() === 'فيديو') {
                $('#gal-cat').val('عزل مائي');
            }
        }
    }

    // Hydrate form with item data for editing
    function editGalleryItem(item) {
        $('#gal-form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل عنصر بالمعرض');
        $('#gal-id').val(item.id);
        $('#gal-title').val(item.title);

        // Bulletproof: If the category does not exist in the dropdown, dynamically append it!
        if (item.cat) {
            if ($('#gal-cat option[value="' + item.cat + '"]').length === 0) {
                $('#gal-cat').append(new Option(item.cat, item.cat));
            }
            $('#gal-cat').val(item.cat);
        }

        $('#gal-img-val').val(item.img || '');
        $('#gal-video').val(item.video || '');

        if (item.img) {
            $('#gal-img-preview').attr('src', item.img).show();
            $('#gal-img-placeholder').hide();
        } else {
            $('#gal-img-preview').hide();
            $('#gal-img-placeholder').show();
        }

        if (item.video || item.cat === 'فيديو' || item.cat === 'video') {
            $('#gal-type').val('video');
            $('#video-group').show();
        } else {
            $('#gal-type').val('image');
            $('#video-group').hide();
        }

        $('#video-file-input').val('');
        if (item.video && !item.video.includes('youtube.com') && !item.video.includes('youtu.be')) {
            $('#video-upload-status').html('<span style="color:var(--gr); font-weight:700;"><i class="fas fa-check-circle"></i> فيديو محلي مرفوع: ' + item.video + '</span>');
        } else {
            $('#video-upload-status').html('صيغ مدعومة: MP4, WebM. الحد الأقصى للحجم: 50MB');
        }

        $('#btn-cancel-gal').show();
        
        // Scroll form into view gently
        document.getElementById('gal-form-title').scrollIntoView({ behavior: 'smooth' });
    }

    // Reset form back to Add state
    function resetGalForm() {
        $('#gal-form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة عنصر جديد للمعرض');
        $('#gal-id').val('');
        $('#gal-title').val('');
        $('#gal-cat').val('عزل مائي');
        $('#gal-img-val').val('');
        $('#gal-img-preview').hide();
        $('#gal-img-placeholder').show();
        $('#gal-type').val('image');
        $('#gal-video').val('');
        $('#video-group').hide();

        $('#video-file-input').val('');
        $('#video-upload-status').html('صيغ مدعومة: MP4, WebM. الحد الأقصى للحجم: 50MB');

        $('#btn-cancel-gal').hide();
    }

    // Handle AJAX Save & Update
    function saveGalleryForm(e) {
        e.preventDefault();
        const id = $('#gal-id').val();
        const title = $('#gal-title').val().trim();
        const cat = $('#gal-cat').val();
        const img = $('#gal-img-val').val();
        const video = $('#gal-video').val().trim();
        const type = $('#gal-type').val();

        if (!title) {
            Swal.fire('تنبيه!', 'يرجى إدخال عنوان للعنصر أولاً', 'warning');
            return;
        }

        if (type === 'image' && !img) {
            Swal.fire('تنبيه!', 'يرجى رفع صورة أولاً', 'warning');
            return;
        }

        if (type === 'video' && !video) {
            Swal.fire('تنبيه!', 'يرجى إدخال رابط الفيديو (يوتيوب أو محلي) أولاً', 'warning');
            return;
        }

        const data = {
            title: title,
            cat: cat,
            img: img,
            video: video || null,
            type: 'after',
            icon: type === 'video' ? 'fa-video' : 'fa-image',
            color: '#0f2441'
        };

        if (id) {
            data.id = id;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/gallery',
            type: 'POST',
            data: data,
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم الحفظ بنجاح!',
                        text: 'تمت إضافة أو تحديث عنصر المعرض بنجاح.',
                        icon: 'success',
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: 'var(--nv)'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('خطأ!', 'فشل الحفظ، حاول مرة أخرى.', 'error');
                }
            },
            error: function(err) {
                Swal.close();
                Swal.fire('خطأ!', 'حدث خطأ في الخادم أثناء محاولة الحفظ.', 'error');
            }
        });
    }

    // Delete gallery item
    function deleteGalleryItem(id) {
        Swal.fire({
            title: 'هل تريد حذف هذا العنصر نهائياً؟',
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
                    url: '/admin/content/gallery/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم حذف العنصر بنجاح.', 'success').then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire('خطأ!', 'فشل حذف العنصر.', 'error');
                        }
                    },
                    error: function(err) {
                        Swal.close();
                        Swal.fire('خطأ!', 'حدث خطأ في الخادم أثناء محاولة الحذف.', 'error');
                    }
                });
            }
        });
    }
</script>
@endsection
