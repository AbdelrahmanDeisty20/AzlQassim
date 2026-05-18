@extends('admin.layouts.app')

@section('title', 'إدارة العروض والخصومات')

@section('content')
<div class="admin-grid-cols">
    
    <!-- Left Column: Offers list table -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-percent" style="color:var(--am)"></i> العروض النشطة</h3>
        
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:10px; border:1px solid #ddd">باقة العرض</th>
                        <th style="padding:10px; border:1px solid #ddd">السعر القديم</th>
                        <th style="padding:10px; border:1px solid #ddd">السعر الحالي</th>
                        <th style="padding:10px; border:1px solid #ddd">حالة التميز</th>
                        <th style="padding:10px; border:1px solid #ddd">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offers as $off)
                        <tr style="border-bottom:1px solid #eee">
                            <td data-label="باقة العرض" style="padding:10px"><strong>{{ $off->name }}</strong></td>
                            <td data-label="السعر القديم" style="padding:10px; color:#ef9090; font-weight:700; text-decoration:line-through">{{ $off->oldP }} ر.س</td>
                            <td data-label="السعر الحالي" style="padding:10px; color:var(--gr); font-weight:700">{{ $off->newP }} ر.س</td>
                            <td data-label="حالة التميز" style="padding:10px">
                                <span class="atag" style="background:{{ $off->feat ? 'rgba(197,168,128,.15);color:var(--am)' : 'rgba(0,0,0,.05);color:#777' }}">
                                    {{ $off->feat ? 'رئيسي المميز' : 'عادي' }}
                                </span>
                            </td>
                            <td data-label="العمليات" style="padding:10px; text-align:center">
                                <button class="ab gn" onclick="editOffer({{ json_encode($off) }})"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteOffer({{ $off->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Add/Edit Offer form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة عرض جديد</h3>
        
        <form id="form-off" onsubmit="saveOfferForm(event)">
            <input type="hidden" name="id" id="off-id">
            
            <div class="afg">
                <label>اسم باقة العرض</label>
                <input type="text" name="t" id="off-t" required placeholder="مثال: باقة السطح الشاملة ⭐">
            </div>
            
            <div class="afg">
                <label>مميزات العرض (كل ميزة في سطر منفصل)</label>
                <textarea name="feats" id="off-feats" rows="5" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" placeholder="عزل مائي وحراري&#10;فوم بولي يوريثان&#10;ضمان 10 سنوات"></textarea>
            </div>

            <div class="admin-grid-cols" style="display:grid; grid-template-columns:1fr 1fr; gap:12px">
                <div class="afg">
                    <label>السعر الجديد بعد الخصم (ر.س)</label>
                    <input type="number" name="pr" id="off-pr" required placeholder="مثال: 2299">
                </div>
                <div class="afg">
                    <label>السعر القديم قبل الخصم (ر.س)</label>
                    <input type="number" name="off" id="off-off" placeholder="مثال: 3500">
                </div>
            </div>

            <div class="afg">
                <label>نوع التميز</label>
                <select name="feat" id="off-feat" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
                    <option value="false">عرض عادي</option>
                    <option value="true">عرض رئيسي مميز (الأكثر طلباً)</option>
                </select>
            </div>

            <div style="display:flex; gap:10px; margin-top:12px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center"><i class="fas fa-save"></i> حفظ العرض</button>
                <button type="button" id="btn-cancel" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd" onclick="resetOffForm()"><i class="fas fa-times"></i> إلغاء</button>
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
            oldP: $('#off-off').val(),
            feat: $('#off-feat').val(),
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
                        title: 'تم حفظ العرض!',
                        text: 'تمت إضافة أو تعديل العرض بنجاح في قاعدة البيانات.',
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
                Swal.fire('خطأ!', 'فشل حفظ بيانات العرض.', 'error');
            }
        });
    }

    // Load Offer data into form for editing
    function editOffer(off) {
        $('#form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل العرض: ' + off.name);
        $('#off-id').val(off.id);
        $('#off-t').val(off.name);
        $('#off-feats').val(off.feats);
        $('#off-pr').val(off.newP);
        $('#off-off').val(off.oldP);
        $('#off-feat').val(off.feat ? 'true' : 'false');
        
        $('#btn-cancel').show();
    }

    // Reset editing state back to creation state
    function resetOffForm() {
        $('#form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة عرض جديد');
        $('#off-id').val('');
        $('#off-t').val('');
        $('#off-feats').val('');
        $('#off-pr').val('');
        $('#off-off').val('');
        $('#off-feat').val('false');
        
        $('#btn-cancel').hide();
    }

    // Delete Offer via AJAX
    function deleteOffer(id) {
        Swal.fire({
            title: 'هل تريد حذف هذا العرض نهائياً؟',
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
                            Swal.fire('تم الحذف!', 'تم مسح العرض بنجاح.', 'success').then(() => {
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
