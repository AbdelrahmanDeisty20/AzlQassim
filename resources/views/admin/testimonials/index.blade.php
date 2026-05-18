@extends('admin.layouts.app')

@section('title', 'آراء وتقييمات العملاء')

@section('content')
<div class="admin-grid-cols">
    
    <!-- Left Column: Testimonials list table -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-star" style="color:var(--am)"></i> التقييمات المعروضة بالموقع</h3>
        
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:10px; border:1px solid #ddd">الصورة</th>
                        <th style="padding:10px; border:1px solid #ddd">اسم العميل</th>
                        <th style="padding:10px; border:1px solid #ddd">المدينة</th>
                        <th style="padding:10px; border:1px solid #ddd">التقييم</th>
                        <th style="padding:10px; border:1px solid #ddd">التعليق</th>
                        <th style="padding:10px; border:1px solid #ddd">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $tst)
                        <tr style="border-bottom:1px solid #eee">
                            <td data-label="الصورة" style="padding:10px; text-align:center">
                                @if($tst->img)
                                    <img src="{{ $tst->img }}" style="width:40px; height:40px; object-fit:cover; border-radius:50%">
                                @else
                                    <div style="width:40px; height:40px; background:var(--sl); border-radius:50%; display:inline-flex; align-items:center; justify-content:center; color:var(--am); border:1px solid rgba(197,168,128,0.3)">
                                        <i class="fas fa-user" style="font-size:16px"></i>
                                    </div>
                                @endif
                            </td>
                            <td data-label="اسم العميل" style="padding:10px"><strong>{{ $tst->name }}</strong></td>
                            <td data-label="المدينة" style="padding:10px">{{ $tst->city }}</td>
                            <td data-label="التقييم" style="padding:10px; color:#ffc107; font-weight:700">
                                @for($i = 0; $i < ($tst->rating ?: 5); $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </td>
                            <td data-label="التعليق" style="padding:10px; font-size:12px; color:#555; max-width:200px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap">{{ $tst->text }}</td>
                            <td data-label="العمليات" style="padding:10px; text-align:center">
                                <button class="ab gn" onclick="editTestimonial({{ json_encode($tst) }})"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteTestimonial({{ $tst->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Add/Edit Testimonial form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة تقييم عميل</h3>
        
        <form id="form-tst" onsubmit="saveTestimonialForm(event)">
            <input type="hidden" name="id" id="tst-id">
            
            <div class="afg">
                <label>اسم العميل الكريم</label>
                <input type="text" name="n" id="tst-n" required placeholder="مثال: أبو فهد التميمي">
            </div>
            
            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:12px">
                <div class="afg">
                    <label>المدينة</label>
                    <input type="text" name="c" id="tst-c" required placeholder="مثال: بريدة">
                </div>
                <div class="afg">
                    <label>النجوم (التقييم)</label>
                    <select name="r" id="tst-r" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
                        <option value="5">⭐⭐⭐⭐⭐ (5 نجوم)</option>
                        <option value="4">⭐⭐⭐⭐ (4 نجوم)</option>
                        <option value="3">⭐⭐⭐ (3 نجوم)</option>
                    </select>
                </div>
            </div>

            <div class="afg">
                <label>رأي وتقييم العميل بالخدمة</label>
                <textarea name="t" id="tst-t" rows="4" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" placeholder="اكتب رأي العميل هنا..."></textarea>
            </div>

            <div class="afg">
                <label>صورة العميل (اختياري)</label>
                <div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap">
                    <input type="hidden" name="img" id="tst-img-val">
                    <div style="width:60px; height:60px; border-radius:50%; border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="tst-img-preview" src="" style="width:100%; height:100%; object-fit:cover; display:none">
                        <div id="tst-img-placeholder" style="font-size:24px; color:var(--cc)"><i class="fas fa-user"></i></div>
                    </div>
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#tst-img-val').val(url); $('#tst-img-preview').attr('src', url).show(); $('#tst-img-placeholder').hide(); })">
                    </div>
                </div>
            </div>

            <div style="display:flex; gap:10px; margin-top:12px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center"><i class="fas fa-save"></i> حفظ التقييم</button>
                <button type="button" id="btn-cancel" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd" onclick="resetTstForm()"><i class="fas fa-times"></i> إلغاء</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Handle Save / Edit Form Submit via AJAX
    function saveTestimonialForm(e) {
        e.preventDefault();
        const id = $('#tst-id').val();
        
        const data = {
            name: $('#tst-n').val(),
            city: $('#tst-c').val(),
            rating: $('#tst-r').val(),
            text: $('#tst-t').val(),
            img: $('#tst-img-val').val(),
            status: 'active'
        };

        if (id) {
            data.id = id;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/testimonials',
            type: 'POST',
            data: data,
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم حفظ التقييم!',
                        icon: 'success',
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: 'var(--nv)'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            }
        });
    }

    // Load Testimonial data into form for editing
    function editTestimonial(tst) {
        $('#form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل تقييم: ' + tst.name);
        $('#tst-id').val(tst.id);
        $('#tst-n').val(tst.name);
        $('#tst-c').val(tst.city);
        $('#tst-r').val(tst.rating || 5);
        $('#tst-t').val(tst.text);
        $('#tst-img-val').val(tst.img || '');
        if (tst.img) {
            $('#tst-img-preview').attr('src', tst.img).show();
            $('#tst-img-placeholder').hide();
        } else {
            $('#tst-img-preview').hide();
            $('#tst-img-placeholder').show();
        }
        
        $('#btn-cancel').show();
    }

    // Reset editing state back to creation state
    function resetTstForm() {
        $('#form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة تقييم عميل');
        $('#tst-id').val('');
        $('#tst-n').val('');
        $('#tst-c').val('');
        $('#tst-r').val('5');
        $('#tst-t').val('');
        $('#tst-img-val').val('');
        $('#tst-img-preview').hide().attr('src', '');
        $('#tst-img-placeholder').show();
        
        $('#btn-cancel').hide();
    }

    // Delete Testimonial via AJAX
    function deleteTestimonial(id) {
        Swal.fire({
            title: 'هل تريد حذف هذا التقييم نهائياً؟',
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
                    url: '/admin/content/testimonials/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم مسح التقييم بنجاح.', 'success').then(() => {
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
    .tbl th, .tbl td {
        border: 1px solid #e1e3e5;
    }
</style>
@endsection
