@extends('admin.layouts.app')

@section('title', 'رسائل اتصل بنا')

@section('content')
<div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
    <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-envelope" style="color:var(--am)"></i> رسائل واستفسارات العملاء الواردة</h3>
    
    <div style="overflow-x:auto">
        <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:850px">
            <thead>
                <tr style="background:var(--sl)">
                    <th style="padding:12px; border:1px solid #ddd">الاسم</th>
                    <th style="padding:12px; border:1px solid #ddd">رقم الجوال</th>
                    <th style="padding:12px; border:1px solid #ddd">البريد الإلكتروني</th>
                    <th style="padding:12px; border:1px solid #ddd">المدينة</th>
                    <th style="padding:12px; border:1px solid #ddd">الرسالة</th>
                    <th style="padding:12px; border:1px solid #ddd">الحالة</th>
                    <th style="padding:12px; border:1px solid #ddd">تاريخ الرسالة</th>
                    <th style="padding:12px; border:1px solid #ddd">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @if($messages->isEmpty())
                    <tr>
                        <td colspan="8" style="padding:20px; text-align:center; color:var(--cc)">لا توجد أي رسائل واردة بعد.</td>
                    </tr>
                @else
                    @foreach($messages as $msg)
                        <tr style="border-bottom:1px solid #eee">
                            <td style="padding:12px"><strong>{{ $msg->name }}</strong></td>
                            <td style="padding:12px">
                                <a href="tel:{{ $msg->phone }}" style="color:var(--nv); text-decoration:none; font-weight:700"><i class="fas fa-phone-alt"></i> {{ $msg->phone }}</a>
                            </td>
                            <td style="padding:12px"><code>{{ $msg->email ?: '-' }}</code></td>
                            <td style="padding:12px">{{ $msg->city }}</td>
                            <td style="padding:12px; font-size:12px; max-width:250px; line-height:1.5; color:#555">{{ $msg->message }}</td>
                            <td style="padding:12px">
                                <span class="atag" style="background:{{ $msg->replied ? 'rgba(74,222,128,.15);color:var(--gr)' : 'rgba(239,144,144,.15);color:#ef9090' }}">
                                    {{ $msg->replied ? 'تم الرد والمتابعة' : 'معلق لم يتم الرد' }}
                                </span>
                            </td>
                            <td style="padding:12px; font-size:11px; color:var(--cc)">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                            <td style="padding:12px; text-align:center">
                                <div style="display:flex; gap:6px; justify-content:center; align-items:center">
                                    @if(!$msg->replied)
                                        <button class="ab gn" onclick="toggleMessageReply({{ $msg->id }}, true)" title="تحديد كتم الرد" style="padding:6px 12px; font-size:11px"><i class="fas fa-check"></i> تم الرد</button>
                                    @else
                                        <button class="ab" onclick="toggleMessageReply({{ $msg->id }}, false)" style="background:#f1f3f5; color:#555; border:1px solid #ddd; padding:6px 12px; font-size:11px" title="تحديد كمعلق"><i class="fas fa-undo"></i> إعادة تعليق</button>
                                    @endif
                                    <button class="ab rd" onclick="deleteMessage({{ $msg->id }})" style="padding:6px 12px; font-size:11px"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Toggle Message Replied status via AJAX
    function toggleMessageReply(id, replied) {
        Swal.showLoading();
        $.ajax({
            url: '/admin/messages/' + id + '/reply',
            type: 'POST',
            data: {
                replied: replied
            },
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم تحديث الحالة!',
                        text: 'تم تعديل حالة الرد بنجاح.',
                        icon: 'success',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.reload();
                    });
                }
            }
        });
    }

    // Delete contact message log
    function deleteMessage(id) {
        Swal.fire({
            title: 'هل تريد حذف هذه الرسالة نهائياً؟',
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
                    url: '/admin/messages/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم مسح الرسالة بنجاح.', 'success').then(() => {
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
