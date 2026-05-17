@extends('layouts.app')

@section('content')
<!-- Admin Login overlay modal page -->
<div class="adl" id="ADL" style="display: flex;">
    <div class="lbox">
        <div class="lic"><i class="fas fa-layer-group"></i></div>
        <h2>لوحة التحكم</h2>
        <p>عزل القصيم - Admin Dashboard</p>
        <div class="lerr" id="LE">
            <i class="fas fa-exclamation-triangle"></i> بيانات خاطئة
        </div>
        <div style="text-align:right;margin-bottom:12px">
            <div class="afg" style="margin:0">
                <label>اسم المستخدم</label>
                <input type="text" id="LU" placeholder="اسم المستخدم">
            </div>
        </div>
        <div style="text-align:right;margin-bottom:18px">
            <div class="afg" style="margin:0">
                <label>كلمة المرور</label>
                <input type="password" id="LP" placeholder="كلمة المرور">
            </div>
        </div>
        <button class="btn btn-nv" style="width:100%;justify-content:center" onclick="doLogin()">
            <i class="fas fa-sign-in-alt"></i> دخول
        </button>
        <div style="margin-top:14px">
            <a href="#" onclick="goSite(event)" style="color:var(--cc);font-size:12px;text-decoration:none">
                <i class="fas fa-arrow-right"></i> العودة للموقع
            </a>
        </div>
    </div>
</div>
@endsection
