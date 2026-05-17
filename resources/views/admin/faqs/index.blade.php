@extends('admin.layouts.app')

@section('title', 'الأسئلة الشائعة')

@section('content')
<div class="admin-grid-cols" style="display:grid; grid-template-columns: 1fr 340px; gap:20px; align-items: flex-start">
    
    <!-- Left Column: FAQs list table -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-question-circle" style="color:var(--am)"></i> الأسئلة والأجوبة الحالية</h3>
        
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:10px; border:1px solid #ddd">السؤال</th>
                        <th style="padding:10px; border:1px solid #ddd">الإجابة النموذجية</th>
                        <th style="padding:10px; border:1px solid #ddd">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                        <tr style="border-bottom:1px solid #eee">
                            <td style="padding:10px; font-weight:700; color:var(--nv); max-width:200px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap">{{ $faq->q }}</td>
                            <td style="padding:10px; font-size:12px; color:#555; max-width:250px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap">{{ $faq->a }}</td>
                            <td style="padding:10px; text-align:center">
                                <button class="ab gn" onclick="editFaq({{ json_encode($faq) }})"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteFaq({{ $faq->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Add/Edit FAQ form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة سؤال شائع</h3>
        
        <form id="form-faq" onsubmit="saveFaqForm(event)">
            <input type="hidden" name="id" id="faq-id">
            
            <div class="afg">
                <label>نص السؤال</label>
                <input type="text" name="q" id="faq-q" required placeholder="مثال: كم مدة الضمان المعتمد لعزل الأسطح؟">
            </div>

            <div class="afg">
                <label>نص الإجابة</label>
                <textarea name="a" id="faq-a" rows="6" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" placeholder="اكتب الإجابة الكاملة والتفصيلية هنا..."></textarea>
            </div>

            <div style="display:flex; gap:10px; margin-top:12px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center"><i class="fas fa-save"></i> حفظ السؤال والرد</button>
                <button type="button" id="btn-cancel" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd" onclick="resetFaqForm()"><i class="fas fa-times"></i> إلغاء</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Handle Save / Edit Form Submit via AJAX
    function saveFaqForm(e) {
        e.preventDefault();
        const id = $('#faq-id').val();
        
        const data = {
            q: $('#faq-q').val(),
            a: $('#faq-a').val()
        };

        if (id) {
            data.id = id;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/faqs',
            type: 'POST',
            data: data,
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم حفظ السؤال والجواب بنجاح!',
                        icon: 'success',
                        confirmButtonText: 'ممتاز',
                        confirmButtonColor: 'var(--nv)'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            }
        });
    }

    // Load FAQ data into form for editing
    function editFaq(faq) {
        $('#form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل السؤال الشائع');
        $('#faq-id').val(faq.id);
        $('#faq-q').val(faq.q);
        $('#faq-a').val(faq.a);
        
        $('#btn-cancel').show();
    }

    // Reset editing state back to creation state
    function resetFaqForm() {
        $('#form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة سؤال شاسع');
        $('#faq-id').val('');
        $('#faq-q').val('');
        $('#faq-a').val('');
        
        $('#btn-cancel').hide();
    }

    // Delete FAQ via AJAX
    function deleteFaq(id) {
        Swal.fire({
            title: 'هل تريد حذف هذا السؤال نهائياً؟',
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
                    url: '/admin/content/faqs/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تمت إزالة السؤال بنجاح.', 'success').then(() => {
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
