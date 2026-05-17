@extends('layouts.app')

@section('title', 'الصفحة غير موجودة | عزل القصيم')

@section('content')
<div class="page active" id="page-404" style="padding: 120px 0; background: var(--sl); display: flex; align-items: center; justify-content: center; min-height: 70vh;">
    <div class="con" style="text-align: center; max-width: 600px;">
        <div style="background: #fff; border-radius: var(--r2); padding: 50px 30px; box-shadow: 0 10px 40px rgba(15,36,65,0.06); border: 1px solid rgba(197,168,128,0.15);">
            <div style="font-size: 90px; font-weight: 900; color: var(--am); line-height: 1; margin-bottom: 20px;">404</div>
            <h2 style="font-size: 26px; font-weight: 800; color: var(--nv); margin-bottom: 14px;">عذراً، هذه الصفحة غير موجودة!</h2>
            <p style="color: var(--cc); line-height: 1.8; font-size: 15px; margin-bottom: 30px;">
                ربما تم نقل الصفحة أو لم تعد متوفرة. سيتم إعادتك تلقائياً إلى الصفحة الرئيسية خلال <span id="countdown" style="font-weight: 800; color: var(--am); font-size: 18px;">5</span> ثوانٍ.
            </p>
            <div style="display: flex; gap: 14px; justify-content: center;">
                <a href="/" class="btn btn-nv" style="display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fas fa-home"></i> الصفحة الرئيسية
                </a>
                <a href="/contact" class="btn btn-am" style="display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fas fa-envelope"></i> اتصل بنا
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let count = 5;
        const display = document.getElementById('countdown');
        const interval = setInterval(() => {
            count--;
            if (display) display.textContent = count;
            if (count <= 0) {
                clearInterval(interval);
                window.location.href = '/';
            }
        }, 1000);
    });
</script>
@endsection
