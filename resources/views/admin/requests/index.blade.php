@extends('admin.layouts.app')

@section('title', 'طلبات تسعير الخدمات')

@section('content')
<div style="background:#fff; border-radius:var(--r2); padding: 20px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15)">
    <h3 style="margin-bottom:16px; color:var(--nv)"><i class="fas fa-clipboard-list" style="color:var(--am)"></i> طلبات معاينة الأسعار الواردة</h3>
    
    <div style="overflow-x:auto">
        <table class="tbl" style="width:100%; border-collapse:collapse; text-align:right; min-width:850px">
            <thead>
                <tr style="background:var(--sl)">
                    <th style="padding:12px; border:1px solid #ddd">الاسم</th>
                    <th style="padding:12px; border:1px solid #ddd">رقم الجوال</th>
                    <th style="padding:12px; border:1px solid #ddd">المدينة</th>
                    <th style="padding:12px; border:1px solid #ddd">الخدمة المطلوبة</th>
                    <th style="padding:12px; border:1px solid #ddd">المساحة المقدرة</th>
                    <th style="padding:12px; border:1px solid #ddd">الحالة</th>
                    <th style="padding:12px; border:1px solid #ddd">تاريخ الطلب</th>
                    <th style="padding:12px; border:1px solid #ddd">التحكم بالطلب</th>
                </tr>
            </thead>
            <tbody>
                @if($requests->isEmpty())
                    <tr>
                        <td colspan="8" style="padding:20px; text-align:center; color:var(--cc)">لا توجد أي طلبات واردة بعد.</td>
                    </tr>
                @else
                    @foreach($requests as $req)
                        <tr style="border-bottom:1px solid #eee">
                            <td style="padding:12px"><strong>{{ $req->name }}</strong></td>
                            <td style="padding:12px">
                                <a href="tel:{{ $req->phone }}" style="color:var(--nv); text-decoration:none; font-weight:700"><i class="fas fa-phone-alt"></i> {{ $req->phone }}</a>
                            </td>
                            <td style="padding:12px">{{ $req->city }}</td>
                            <td style="padding:12px"><span style="background:var(--sl); padding:4px 8px; border-radius:4px; font-size:12px">{{ $req->service }}</span></td>
                            <td style="padding:12px; font-weight:700">{{ $req->area ?? 'غير محدد' }} م²</td>
                            <td style="padding:12px">
                                <span class="atag" style="background:{{ $req->status === 'new' ? 'rgba(59,130,246,.15);color:#3b82f6' : ($req->status === 'done' ? 'rgba(74,222,128,.15);color:var(--gr)' : 'rgba(239,144,144,.15);color:#ef9090') }}">
                                    {{ $req->status === 'new' ? 'معلق جديد' : ($req->status === 'done' ? 'مكتمل ومنجز' : 'ملغي') }}
                                </span>
                            </td>
                            <td style="padding:12px; font-size:11px; color:var(--cc)">{{ $req->created_at->format('Y-m-d H:i') }}</td>
                            <td style="padding:12px; text-align:center">
                                <select onchange="updateRequestStatus({{ $req->id }}, this.value)" style="padding:4px 8px; font-family:inherit; border-radius:var(--r); border:1px solid #ddd">
                                    <option value="new" {{ $req->status === 'new' ? 'selected' : '' }}>جديد معلق</option>
                                    <option value="done" {{ $req->status === 'done' ? 'selected' : '' }}>منجز ومكتمل</option>
                                    <option value="cancelled" {{ $req->status === 'cancelled' ? 'selected' : '' }}>ملغي</option>
                                </select>
                                <button class="ab rd" onclick="deleteRequest({{ $req->id }})" style="margin-right:8px"><i class="fas fa-trash"></i></button>
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
    // Update request status via AJAX
    function updateRequestStatus(id, status) {
        Swal.showLoading();
        $.ajax({
            url: '/admin/requests/' + id + '/status',
            type: 'POST',
            data: {
                status: status
            },
            success: function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        title: 'تم تحديث الحالة!',
                        text: 'تم تعديل حالة الطلب بنجاح.',
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

    // Delete request log via AJAX
    function deleteRequest(id) {
        Swal.fire({
            title: 'هل تريد حذف هذا الطلب نهائياً؟',
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
                    url: '/admin/requests/' + id,
                    type: 'DELETE',
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            Swal.fire('تم الحذف!', 'تم مسح سجل الطلب بنجاح.', 'success').then(() => {
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
