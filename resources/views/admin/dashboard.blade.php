@extends('admin.layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="apnl active" id="pd">
    <!-- Stat Cards Grid -->
    <div class="sr" style="margin-bottom: 24px;">
        <div class="sb3">
            <div class="si nb"><i class="fas fa-clipboard-list"></i></div>
            <div>
                <div class="sn">{{ $requestsCount }}</div>
                <div class="sl">طلبات جديدة</div>
            </div>
        </div>
        <div class="sb3">
            <div class="si am"><i class="fas fa-envelope"></i></div>
            <div>
                <div class="sn">{{ $messagesCount }}</div>
                <div class="sl">رسائل معلقة</div>
            </div>
        </div>
        <div class="sb3">
            <div class="si gn"><i class="fas fa-tools"></i></div>
            <div>
                <div class="sn">{{ $servicesCount }}</div>
                <div class="sl">خدمات نشطة</div>
            </div>
        </div>
        <div class="sb3">
            <div class="si rd"><i class="fas fa-mouse-pointer"></i></div>
            <div>
                <div class="sn">{{ $clicksCount }}</div>
                <div class="sl">نقرات التواصل</div>
            </div>
        </div>
    </div>
    
    <!-- Recent Logs Grid -->
    <div class="admin-grid-cols" style="display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:24px">
        <div class="ac2">
            <div class="ach">
                <h3><i class="fas fa-bell" style="color:var(--am)"></i>آخر الطلبات</h3>
                <a href="/admin/requests" class="ab sc" style="text-decoration:none">عرض الكل</a>
            </div>
            <div class="acd" id="dshR">
                @if($recentRequests->isEmpty())
                    <div style="font-size:13px;color:var(--cc);text-align:center;padding:18px">لا توجد طلبات بعد</div>
                @else
                    <div style="padding:10px">
                        @foreach($recentRequests as $req)
                            <div style="padding:10px;border-bottom:1px solid #f1f3f5;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
                                <div>
                                    <strong>{{ $req->name }}</strong> ({{ $req->city }})
                                    <div style="font-size:11px;color:var(--cc)">{{ $req->service }}</div>
                                </div>
                                <span class="atag" style="font-size:11px;background:var(--sl)">{{ $req->status === 'new' ? 'جديد' : ($req->status === 'done' ? 'منجز' : 'ملغي') }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="ac2">
            <div class="ach">
                <h3><i class="fas fa-envelope" style="color:var(--am)"></i>آخر الرسائل</h3>
                <a href="/admin/messages" class="ab sc" style="text-decoration:none">عرض الكل</a>
            </div>
            <div class="acd" id="dshM">
                @if($recentMessages->isEmpty())
                    <div style="font-size:13px;color:var(--cc);text-align:center;padding:18px">لا توجد رسائل بعد</div>
                @else
                    <div style="padding:10px">
                        @foreach($recentMessages as $msg)
                            <div style="padding:10px;border-bottom:1px solid #f1f3f5;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
                                <div>
                                    <strong>{{ $msg->name }}</strong> ({{ $msg->city }})
                                    <div style="font-size:11px;color:var(--cc);max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $msg->message }}</div>
                                </div>
                                <span class="atag" style="font-size:11px;background:{{ $msg->replied ? 'rgba(74,222,128,.15);color:var(--gr)' : 'rgba(239,144,144,.15);color:#ef9090' }}">{{ $msg->replied ? 'تم الرد' : 'معلق' }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Clicks Report -->
    <div class="ac2">
        <div class="ach">
            <h3><i class="fas fa-chart-bar" style="color:var(--am)"></i>إحصائيات نقرات العملاء للتواصل</h3>
        </div>
        <div class="acd" style="padding:20px">
            <div class="admin-grid-cols" style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px">
                <div style="background:var(--sl);border-radius:var(--r);padding:16px;text-align:center">
                    <i class="fab fa-whatsapp" style="font-size:26px;color:#25d366;display:block;margin-bottom:5px"></i>
                    <div style="font-size:24px;font-weight:900" id="an-wa">{{ $whatsappClicks }}</div>
                    <div style="font-size:11px;color:var(--cc)">نقرات واتساب</div>
                </div>
                <div style="background:var(--sl);border-radius:var(--r);padding:16px;text-align:center">
                    <i class="fas fa-phone" style="font-size:26px;color:var(--am);display:block;margin-bottom:5px"></i>
                    <div style="font-size:24px;font-weight:900" id="an-ph">{{ $phoneClicks }}</div>
                    <div style="font-size:11px;color:var(--cc)">نقرات الاتصال الهاتفي</div>
                </div>
                <div style="background:var(--sl);border-radius:var(--r);padding:16px;text-align:center">
                    <i class="fas fa-calendar-check" style="font-size:26px;color:var(--nv);display:block;margin-bottom:5px"></i>
                    <div style="font-size:24px;font-weight:900" id="an-rq">{{ $requestClicks }}</div>
                    <div style="font-size:11px;color:var(--cc)">نقرات حجز عرض السعر</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
