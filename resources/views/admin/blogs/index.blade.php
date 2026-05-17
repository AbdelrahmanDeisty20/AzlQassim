@extends('admin.layouts.app')

@section('title', 'إدارة مقالات المدونة')

@section('content')
<div class="admin-grid-cols" style="display:grid; grid-template-columns: 1fr 340px; gap:20px; align-items: flex-start">
    
    <!-- Left Column: Blogs list table -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-blog" style="color:var(--am)"></i> مقالاتك المنشورة</h3>
        
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:600px">
                <thead>
                    <tr style="background:var(--sl)">
                        <th style="padding:10px; border:1px solid #ddd">الصورة</th>
                        <th style="padding:10px; border:1px solid #ddd">عنوان المقال</th>
                        <th style="padding:10px; border:1px solid #ddd">الحالة</th>
                        <th style="padding:10px; border:1px solid #ddd">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blg)
                        <tr style="border-bottom:1px solid #eee">
                            <td style="padding:10px; text-align:center">
                                <img src="{{ $blg->img ?: '/img/serv1.jpg' }}" style="width:60px; height:40px; object-fit:cover; border-radius:var(--r)">
                            </td>
                            <td style="padding:10px"><strong>{{ $blg->title }}</strong></td>
                            <td style="padding:10px">
                                <span class="atag" style="background:{{ $blg->status === 'published' ? 'rgba(74,222,128,.15);color:var(--gr)' : 'rgba(239,144,144,.15);color:#ef9090' }}">
                                    {{ $blg->status === 'published' ? 'منشور' : 'مسودة معلقة' }}
                                </span>
                            </td>
                            <td style="padding:10px; text-align:center">
                                <button class="ab gn" onclick="editBlog({{ json_encode($blg) }})"><i class="fas fa-edit"></i></button>
                                <button class="ab rd" onclick="deleteBlog({{ $blg->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Add/Edit Blog form -->
    <div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
        <h3 id="form-title" style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة مقالة جديدة</h3>
        
        <form id="form-blg" onsubmit="saveBlogForm(event)">
            <input type="hidden" name="id" id="blg-id">
            
            <div class="afg">
                <label>عنوان المقال</label>
                <input type="text" name="t" id="blg-t" required placeholder="مثال: أهمية العزل المائي للأسطح">
            </div>
            
            <div class="afg">
                <label>الوصف البسيط (يظهر في الكارت الرئيسي)</label>
                <input type="text" name="sb" id="blg-sb" required placeholder="ملخص بسيط للمقالة... ">
            </div>

            <div class="afg">
                <label>نص ومحتوى المقال الكامل</label>
                <textarea name="d" id="blg-d" rows="8" required style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit" placeholder="اكتب موضوع المقال التفصيلي هنا بالكامل..."></textarea>
            </div>

            <div class="afg">
                <label>حالة المقال</label>
                <select name="status" id="blg-status" style="width:100%; border:1px solid #ddd; border-radius:var(--r); padding:10px; font-family:inherit">
                    <option value="published">منشور بالموقع</option>
                    <option value="draft">مسودة / مخفي</option>
                </select>
            </div>

            <div class="afg">
                <label>صورة المقال</label>
                <div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap">
                    <input type="hidden" name="img" id="blg-img-val">
                    <img id="blg-img-preview" src="/img/serv1.jpg" style="width:100px; height:65px; object-fit:cover; border-radius:var(--r); border:1px solid #ddd">
                    <div>
                        <input type="file" accept="image/*" onchange="uploadImageInput(this, url => { $('#blg-img-val').val(url); $('#blg-img-preview').attr('src', url); })">
                    </div>
                </div>
            </div>

            <div style="display:flex; gap:10px; margin-top:12px">
                <button type="submit" class="btn btn-nv" style="flex:1; justify-content:center"><i class="fas fa-save"></i> حفظ المقال</button>
                <button type="button" id="btn-cancel" class="btn" style="display:none; background:#f1f3f5; color:#555; border:1px solid #ddd" onclick="resetBlgForm()"><i class="fas fa-times"></i> إلغاء</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Handle Save / Edit Form Submit via AJAX
    function saveBlogForm(e) {
        e.preventDefault();
        const id = $('#blg-id').val();
        
        const data = {
            title: $('#blg-t').val(),
            summary: $('#blg-sb').val(),
            content: $('#blg-d').val(),
            status: $('#blg-status').val(),
            img: $('#blg-img-val').val()
        };

        if (id) {
            data.id = id;
        }

        Swal.showLoading();
        $.ajax({
            url: '/admin/content/blogs',
            type: 'POST',
            data: data,
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم حفظ المقال!',
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

    // Load Blog data into form for editing
    function editBlog(blg) {
        $('#form-title').html('<i class="fas fa-edit" style="color:var(--am)"></i> تعديل المقال');
        $('#blg-id').val(blg.id);
        $('#blg-t').val(blg.title);
        $('#blg-sb').val(blg.summary);
        $('#blg-d').val(blg.content);
        $('#blg-status').val(blg.status || 'published');
        $('#blg-img-val').val(blg.img);
        $('#blg-img-preview').attr('src', blg.img || '/img/serv1.jpg');
        
        $('#btn-cancel').show();
    }

    // Reset editing state back to creation state
    function resetBlgForm() {
        $('#form-title').html('<i class="fas fa-plus-circle" style="color:var(--am)"></i> إضافة مقالة جديدة');
        $('#blg-id').val('');
        $('#blg-t').val('');
        $('#blg-sb').val('');
        $('#blg-d').val('');
        $('#blg-status').val('published');
        $('#blg-img-val').val('');
        $('#blg-img-preview').attr('src', '/img/serv1.jpg');
        
        $('#btn-cancel').hide();
    }

    // Delete Blog via AJAX
    function deleteBlog(id) {
        Swal.fire({
            title: 'هل تريد حذف هذا المقال نهائياً؟',
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
                    url: '/admin/content/blogs/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تمت إزالة المقال بنجاح.', 'success').then(() => {
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
