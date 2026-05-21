@extends('admin.layouts.app')

@section('title', 'إدارة سابقة الأعمال والمشاريع')

@section('content')
<div class="admin-grid-cols">
    
    <!-- Left Column: Portfolio list table -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-history" style="color:var(--am)"></i> المشاريع المضافة</h3>
        
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:10px; border:1px solid #ddd">اسم المشروع / الجهة المستفيدة</th>
                        <th style="padding:10px; border:1px solid #ddd">التوصيف التقني للمشروع</th>
                        <th style="padding:10px; border:1px solid #ddd">حالة المشروع والاعتماد</th>
                        <th style="padding:10px; border:1px solid #ddd; width:120px">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offers as $off)
                        <tr style="border-bottom:1px solid #eee">
                            <td data-label="اسم المشروع" style="padding:10px"><strong>{{ $off->name }}</strong></td>
                            <td data-label="التوصيف التقني" style="padding:10px; font-size:12px; color:var(--cc); max-width:250px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap">{{ $off->feats }}</td>
                            <td data-label="حالة المشروع" style="padding:10px">
                                <span class="atag" style="background:rgba(26, 122, 69, 0.1); color:var(--gr); font-weight:700">
                                    {{ $off->newP ?: 'تم التنفيذ بنجاح' }}
                                </span>
                            </td>
                            <td data-label="العمليات" style="padding:10px; text-align:center">
                                <button class="ab gn" onclick="editOffer({{ json_encode($off) }})" title="تعديل"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteOffer({{ $off->id }})" title="حذف"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Add/Edit Offer form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة مشروع جديد</h3>
        
        <form id="form-off" onsubmit="saveOfferForm(event)">
            <input type="hidden" name="id" id="off-id">
            
            <div class="afg">
                <label>اسم المشروع والجهة المستفيدة *</label>
                <input type="text" name="t" id="off-t" required placeholder="مثال: مبنى إمارة منطقة القصيم">
            </div>
            
            <div class="afg">
                <label>التوصيف التقني الدقيق وطريقة التنفيذ الحديثة بمواد العزل الأمريكية *</label>
                <textarea name="feats" id="off-feats" rows="5" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" placeholder="مثال: تجديد نظام العزل المائي والحراري الشامل للأسطح الخرسانية، وتطبيق تقنية الأغشية السائلة..."></textarea>
            </div>

            <div class="afg">
                <label>حالة المشروع والاعتماد *</label>
                <input type="text" name="pr" id="off-pr" required placeholder="مثال: تم التنفيذ والتسليم بنجاح" value="تم التنفيذ والتسليم بنجاح">
            </div>

            <div style="display:flex; gap:10px; margin-top:16px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center; height:41px"><i class="fas fa-save"></i> حفظ المشروع</button>
                <button type="button" id="btn-cancel" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd; height:41px" onclick="resetOffForm()"><i class="fas fa-times"></i> إلغاء التعديل</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Handle Save / Edit Form Submit via AJAX
    function saveOfferForm(e) {
        e.preventDefault();
        const id = $('#off-id').val();
        
        const data = {
            name: $('#off-t').val(),
            feats: $('#off-feats').val(),
            newP: $('#off-pr').val(),
            feat: true,
            status: 'active'
        };

        if (id) {
            data.id = id;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/offers',
            type: 'POST',
            data: data,
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم حفظ المشروع بنجاح!',
                        icon: 'success',
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: 'var(--nv)'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('خطأ!', 'فشل حفظ بيانات المشروع.', 'error');
            }
        });
    }

    // Load Offer data into form for editing
    function editOffer(off) {
        $('#form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل المشروع: ' + off.name);
        $('#off-id').val(off.id);
        $('#off-t').val(off.name);
        $('#off-feats').val(off.feats);
        $('#off-pr').val(off.newP);
        
        $('#btn-cancel').show();
        // scroll up
        $('#form-off')[0].scrollIntoView({ behavior: 'smooth' });
    }

    // Reset editing state back to creation state
    function resetOffForm() {
        $('#form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة مشروع جديد');
        $('#off-id').val('');
        $('#off-t').val('');
        $('#off-feats').val('');
        $('#off-pr').val('تم التنفيذ والتسليم بنجاح');
        
        $('#btn-cancel').hide();
    }

    // Delete Offer via AJAX
    function deleteOffer(id) {
        Swal.fire({
            title: 'هل تريد حذف هذا المشروع نهائياً؟',
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
                    url: '/admin/content/offers/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم مسح المشروع بنجاح.', 'success').then(() => {
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
