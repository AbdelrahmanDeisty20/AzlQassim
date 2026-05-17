@extends('admin.layouts.app')

@section('title', 'مناطق التغطية والخدمة')

@section('content')
<div class="admin-grid-cols" style="display:grid; grid-template-columns: 1fr 340px; gap:20px; align-items: flex-start">
    
    <!-- Left Column: Areas list table -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-map-marker-alt" style="color:var(--am)"></i> المدن والمناطق الحالية</h3>
        
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:10px; border:1px solid #ddd">المنطقة / المدينة</th>
                        <th style="padding:10px; border:1px solid #ddd">حالة التغطية</th>
                        <th style="padding:10px; border:1px solid #ddd">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $ar)
                        <tr style="border-bottom:1px solid #eee">
                            <td style="padding:10px"><strong>{{ $ar->name }}</strong></td>
                            <td style="padding:10px">
                                <span class="atag" style="background:rgba(74,222,128,.15);color:var(--gr)">مغطاة بالكامل</span>
                            </td>
                            <td style="padding:10px; text-align:center">
                                <button class="ab gn" onclick="editArea({{ json_encode($ar) }})"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteArea({{ $ar->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Add Area form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة مدينة تغطية</h3>
        
        <form id="form-ar" onsubmit="saveAreaForm(event)">
            <input type="hidden" name="id" id="ar-id">
            
            <div class="afg">
                <label>اسم المدينة / المحافظة</label>
                <input type="text" name="n" id="ar-n" required placeholder="مثال: بريدة، عنيزة، الرس، حائل">
            </div>

            <div style="display:flex; gap:10px; margin-top:12px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center"><i class="fas fa-save"></i> حفظ المدينة</button>
                <button type="button" id="btn-cancel" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd" onclick="resetArForm()"><i class="fas fa-times"></i> إلغاء</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Handle Save / Edit Form Submit via AJAX
    function saveAreaForm(e) {
        e.preventDefault();
        const id = $('#ar-id').val();
        
        const data = {
            name: $('#ar-n').val()
        };

        if (id) {
            data.id = id;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/areas',
            type: 'POST',
            data: data,
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم حفظ التعديلات!',
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

    // Load Area data into form for editing
    function editArea(ar) {
        $('#form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل مدينة: ' + ar.name);
        $('#ar-id').val(ar.id);
        $('#ar-n').val(ar.name);
        
        $('#btn-cancel').show();
    }

    // Reset editing state back to creation state
    function resetArForm() {
        $('#form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة مدينة تغطية');
        $('#ar-id').val('');
        $('#ar-n').val('');
        
        $('#btn-cancel').hide();
    }

    // Delete Area via AJAX
    function deleteArea(id) {
        Swal.fire({
            title: 'هل تريد حذف هذه المدينة من قائمة التغطية؟',
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
                    url: '/admin/content/areas/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تمت إزالة المدينة بنجاح.', 'success').then(() => {
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
