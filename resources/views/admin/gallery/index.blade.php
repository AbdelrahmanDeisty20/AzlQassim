@extends('admin.layouts.app')

@section('title', 'معرض الصور والفيديوهات')

@section('content')
<div class="admin-grid-cols">
    
    <!-- Left Column: Gallery items grid -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-images" style="color:var(--am)"></i> الصور الحالية بالمعرض</h3>
        
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(130px, 1fr)); gap:14px">
            @foreach($gallery as $gal)
                <div style="background:var(--sl); padding:8px; border-radius:var(--r); border:1px solid #e1e3e5; position:relative; text-align:center">
                    @if($gal->img)
                        <img src="{{ $gal->img }}" style="width:100%; height:90px; object-fit:cover; border-radius:var(--r); margin-bottom:5px">
                    @else
                        <div style="width:100%; height:90px; background:#fff; border-radius:var(--r); margin-bottom:5px; display:flex; align-items:center; justify-content:center; color:var(--am); border:1px solid rgba(197,168,128,0.2)">
                            <i class="fas {{ $gal->icon ?: 'fa-image' }}" style="font-size:24px"></i>
                        </div>
                    @endif
                    <span style="font-size:11px; background:#fff; border:1px solid #ddd; padding:2px 8px; border-radius:10px; font-weight:700">{{ $gal->cat }}</span>
                    
                    <!-- Delete button -->
                    <button onclick="deleteGalleryItem({{ $gal->id }})" style="position:absolute; top:12px; left:12px; background:#ef9090; color:#fff; border:none; border-radius:50%; width:24px; height:24px; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 5px rgba(0,0,0,0.15)">
                        <i class="fas fa-times" style="font-size:10px"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Right Column: Add Gallery Item form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة صورة للمعرض</h3>
        
        <form id="form-gal" onsubmit="saveGalleryForm(event)">
            <div class="afg">
                <label>عنوان الصورة (يظهر كتسمية في المعرض)</label>
                <input type="text" id="gal-title" required placeholder="مثال: عزل مائي لأسطح خرسانية" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
            </div>

            <div class="afg">
                <label>القسم / التصنيف</label>
                <select name="cat" id="gal-cat" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
                    <option value="عزل مائي">عزل مائي</option>
                    <option value="عزل حراري">عزل حراري</option>
                    <option value="عزل فوم">عزل فوم</option>
                    <option value="عزل خزانات">عزل خزانات</option>
                    <option value="أخرى">أخرى</option>
                </select>
            </div>

            <div class="afg">
                <label>رفع الصورة من جهازك</label>
                <div style="display:flex; gap:12px; align-items:center; flex-direction:column; width:100%">
                    <input type="hidden" name="img" id="gal-img-val" required>
                    <div style="width:100%; height:140px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="gal-img-preview" src="" style="width:100%; height:100%; object-fit:cover; display:none">
                        <div id="gal-img-placeholder" style="font-size:36px; color:var(--cc)"><i class="fas fa-image"></i></div>
                    </div>
                    
                    <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#gal-img-val').val(url); $('#gal-img-preview').attr('src', url).show(); $('#gal-img-placeholder').hide(); Swal.fire('تم رفع الصورة!', 'يمكنك الآن حفظ الملف إلى المعرض.', 'success'); })">
                </div>
            </div>

            <button type="submit" class="btn btn-nv" style="width:100%; justify-content:center; margin-top:12px"><i class="fas fa-save"></i> حفظ في المعرض</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Handle Save via AJAX
    function saveGalleryForm(e) {
        e.preventDefault();
        const img = $('#gal-img-val').val();
        const title = $('#gal-title').val().trim();
        if (!title) {
            Swal.fire('تنبيه!', 'يرجى إدخال عنوان للصورة أولاً', 'warning');
            return;
        }
        if (!img) {
            Swal.fire('تنبيه!', 'يرجى اختيار ورفع الصورة أولاً', 'warning');
            return;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/gallery',
            type: 'POST',
            data: {
                title: title,
                cat: $('#gal-cat').val(),
                img: img
            },
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire('تمت الإضافة!', 'تمت إضافة الصورة الجديدة لمعرض أعمالك بنجاح.', 'success').then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('خطأ!', 'فشل إضافة الصورة، حاول مرة أخرى.', 'error');
                }
            },
            error: function(err) {
                Swal.close();
                Swal.fire('خطأ!', 'حدث خطأ في الخادم أثناء حفظ الصورة. يرجى التأكد من الحقول والمحاولة لاحقاً.', 'error');
            }
        });
    }

    // Delete gallery item
    function deleteGalleryItem(id) {
        Swal.fire({
            title: 'هل تريد حذف هذه الصورة من المعرض؟',
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
                            Swal.fire('تم الحذف!', 'تمت إزالة الصورة بنجاح.', 'success').then(() => {
                                  window.location.reload();
                            });
                        } else {
                            Swal.fire('خطأ!', 'فشل حذف الصورة.', 'error');
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
