@extends('admin.layouts.app')

@section('title', 'إدارة الخدمات')

@section('content')
<div class="admin-grid-cols">
    
    <!-- Left Column: Services list table -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-tools" style="color:var(--am)"></i> الخدمات المسجلة</h3>
        
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:10px; border:1px solid #ddd">الصورة</th>
                        <th style="padding:10px; border:1px solid #ddd">الاسم</th>
                        <th style="padding:10px; border:1px solid #ddd">الوصف الفرعي</th>
                        <th style="padding:10px; border:1px solid #ddd">الحالة</th>
                        <th style="padding:10px; border:1px solid #ddd">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $svc)
                        <tr style="border-bottom:1px solid #eee">
                            <td data-label="الصورة" style="padding:10px; text-align:center">
                                @if($svc->img)
                                    <img src="{{ $svc->img }}" style="width:60px; height:40px; object-fit:cover; border-radius:var(--r)">
                                @else
                                    <div style="width:60px; height:40px; background:var(--sl); border-radius:var(--r); display:inline-flex; align-items:center; justify-content:center; color:var(--am); border:1px solid rgba(197,168,128,0.3)">
                                        <i class="fas {{ $svc->icon ?: 'fa-tools' }}" style="font-size:18px"></i>
                                    </div>
                                @endif
                            </td>
                            <td data-label="الاسم" style="padding:10px"><strong>{{ $svc->name }}</strong></td>
                            <td data-label="الوصف المختصر" style="padding:10px; font-size:12px; color:var(--cc)">{{ Str::limit($svc->short, 60) }}</td>
                            <td data-label="حالة النشر" style="padding:10px">
                                <span class="atag" style="background:{{ $svc->status === 'active' ? 'rgba(74,222,128,.15);color:var(--gr)' : 'rgba(239,144,144,.15);color:#ef9090' }}">
                                    {{ $svc->status === 'active' ? 'نشط' : 'مسودة' }}
                                </span>
                            </td>
                            <td data-label="العمليات" style="padding:10px; text-align:center">
                                <button class="ab gn" onclick="editService({{ json_encode($svc) }})"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteService({{ $svc->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Add Service form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة خدمة جديدة</h3>
        
        <form id="form-svc" onsubmit="saveServiceForm(event)">
            <input type="hidden" name="id" id="svc-id">
            
            <div class="afg">
                <label>اسم الخدمة</label>
                <input type="text" name="n" id="svc-n" required placeholder="مثال: عزل أسطح فوم">
            </div>
            
            <div class="afg">
                <label>الوصف الفرعي القصير</label>
                <input type="text" name="sb" id="svc-sb" required placeholder="وصف موجز يظهر في الكارت الرئيسي">
            </div>

            <div class="afg">
                <label>الوصف الكامل والتفصيلي</label>
                <textarea name="d" id="svc-d" rows="5" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" placeholder="اكتب تفاصيل الخدمة والضمان ومميزاتها بالتفصيل..."></textarea>
            </div>

            <div class="afg">
                <label>المميزات (اكتب ميزة في كل سطر)</label>
                <textarea name="feats" id="svc-feats" rows="4" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" placeholder="توفير 40% في فاتورة الكهرباء&#10;مواد عاكسة للحرارة&#10;ضمان 15 سنوات"></textarea>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:12px">
                <div class="afg">
                    <label>الأيقونة</label>
                    <input type="text" name="icon" id="svc-icon" value="fa-shield-alt">
                </div>
                <div class="afg">
                    <label>الحالة</label>
                    <select name="status" id="svc-status" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
                        <option value="active">نشط</option>
                        <option value="draft">مسودة</option>
                    </select>
                </div>
            </div>

            <div class="afg">
                <label>صورة الخدمة</label>
                <div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap">
                    <input type="hidden" name="img" id="svc-img-val">
                    <div style="width:100px; height:65px; border-radius:var(--r); border:1px solid #ddd; background:#f8f9fa; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative">
                        <img id="svc-img-preview" src="" style="width:100%; height:100%; object-fit:cover; display:none">
                        <div id="svc-img-placeholder" style="font-size:24px; color:var(--cc)"><i class="fas fa-image"></i></div>
                    </div>
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#svc-img-val').val(url); $('#svc-img-preview').attr('src', url).show(); $('#svc-img-placeholder').hide(); })">
                    </div>
                </div>
            </div>

            <div style="display:flex; gap:10px; margin-top:12px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center"><i class="fas fa-save"></i> حفظ الخدمة</button>
                <button type="button" id="btn-cancel" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd" onclick="resetSvcForm()"><i class="fas fa-times"></i> إلغاء</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Handle Save / Edit Form Submit via AJAX
    function saveServiceForm(e) {
        e.preventDefault();
        const id = $('#svc-id').val();
        
        const data = {
            name: $('#svc-n').val(),
            short: $('#svc-sb').val(),
            desc: $('#svc-d').val(),
            feats: $('#svc-feats').val(),
            icon: $('#svc-icon').val(),
            status: $('#svc-status').val(),
            img: $('#svc-img-val').val()
        };

        if (id) {
            data.id = id;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/services',
            type: 'POST',
            data: data,
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم الحفظ بنجاح!',
                        text: 'تم تحديث بيانات الخدمة في قاعدة البيانات بنجاح.',
                        icon: 'success',
                        confirmButtonText: 'ممتاز',
                        confirmButtonColor: 'var(--nv)'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('خطأ!', 'حدث خطأ في الخادم أثناء محاولة الحفظ.', 'error');
            }
        });
    }

    // Load Service data into form for editing
    function editService(svc) {
        $('#form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل الخدمة: ' + svc.name);
        $('#svc-id').val(svc.id);
        $('#svc-n').val(svc.name);
        $('#svc-sb').val(svc.short);
        $('#svc-d').val(svc.desc);
        $('#svc-feats').val(svc.feats || '');
        $('#svc-icon').val(svc.icon || 'fa-shield-alt');
        $('#svc-status').val(svc.status || 'active');
        $('#svc-img-val').val(svc.img || '');
        if (svc.img) {
            $('#svc-img-preview').attr('src', svc.img).show();
            $('#svc-img-placeholder').hide();
        } else {
            $('#svc-img-preview').hide();
            $('#svc-img-placeholder').show();
        }
        
        $('#btn-cancel').show();
    }

    // Reset editing state back to creation state
    function resetSvcForm() {
        $('#form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة خدمة جديدة');
        $('#svc-id').val('');
        $('#svc-n').val('');
        $('#svc-sb').val('');
        $('#svc-d').val('');
        $('#svc-feats').val('');
        $('#svc-icon').val('fa-shield-alt');
        $('#svc-status').val('active');
        $('#svc-img-val').val('');
        $('#svc-img-preview').hide().attr('src', '');
        $('#svc-img-placeholder').show();
        
        $('#btn-cancel').hide();
    }

    // Delete Service via AJAX
    function deleteService(id) {
        Swal.fire({
            title: 'هل تريد حذف هذه الخدمة نهائياً؟',
            text: 'تحذير: لا يمكنك التراجع عن هذا الإجراء بعد تنفيذه!',
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
                    url: '/admin/content/services/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم مسح الخدمة من قاعدة البيانات بنجاح.', 'success').then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire('خطأ!', 'لم نتمكن من حذف الخدمة، قد تكون مرتبطة ببيانات أخرى.', 'error');
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('خطأ!', 'فشل مسح الخدمة بسبب خطأ داخلي.', 'error');
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
