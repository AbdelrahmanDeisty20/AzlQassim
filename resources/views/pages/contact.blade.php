@extends('layouts.app')

@section('title', 'تواصل معنا | عزل القصيم')

@section('content')
<div class="page active" id="page-contact">
    <!-- Breadcrumbs -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <span>تواصل معنا</span>
            </div>
            <h3 style="font-size: clamp(14px, 3.5vw, 17px); font-weight: 700; color: rgba(255,255,255,0.85); margin-bottom: 8px;">أفضل شركة عزل أسطح بالقصيم رونق قلب الخليج للعزل الأمريكي بضمان موثق معتمد ١٥ عام</h3>
            <h2>تواصل معنا</h2>
            <p>نحن هنا لخدمتك على مدار الساعة</p>
        </div>
    </div>
    
    <!-- Contact Info Cards & Feedback Form -->
    <section class="sec">
        <div class="con">
            <div class="ct-g">
                <!-- Contact info coordinates -->
                <div class="ct-info">
                    <h3>بيانات التواصل</h3>
                    
                    <div class="cti">
                        <div class="cti-ic" style="background:linear-gradient(135deg,var(--nv),var(--nv2))">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info">
                            <strong>الهاتف</strong>
                            <a href="tel:{{ $contact['ph'] ?? '966500000000' }}" id="ctP">{{ $contact['ph'] ?? '0550000000' }}</a>
                        </div>
                    </div>
                    
                    <div class="cti">
                        <div class="cti-ic" style="background:linear-gradient(135deg,#25d366,#128c7e)">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="info">
                            <strong>واتساب</strong>
                            <a href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" id="ctWa2">{{ $contact['wa'] ?? '0550000000' }}</a>
                        </div>
                    </div>
                    
                    <div class="cti">
                        <div class="cti-ic" style="background:linear-gradient(135deg,var(--am),var(--am2))">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info">
                            <strong>البريد</strong>
                            <a href="mailto:{{ $contact['em'] ?? 'info@azlalqassim.com' }}" id="ctEm">{{ $contact['em'] ?? 'info@azlalqassim.com' }}</a>
                        </div>
                    </div>
                    
                    <div class="cti">
                        <div class="cti-ic" style="background:linear-gradient(135deg,var(--gr),var(--gr2))">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info">
                            <strong>العنوان</strong>
                            <p id="ctAd">{{ $contact['ad'] ?? 'بريدة، منطقة القصيم' }}</p>
                        </div>
                    </div>
                    
                    <div class="cti">
                        <div class="cti-ic" style="background:linear-gradient(135deg,#7c3aed,#a78bfa)">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info">
                            <strong>ساعات العمل</strong>
                            <p id="ctHr">{{ $contact['hr'] ?? 'السبت - الخميس: 7ص - 10م' }}</p>
                        </div>
                    </div>
                    
                    <!-- Google Maps wrapper -->
                    <div id="mapWr" style="height:170px;background:var(--sl);border-radius:var(--r);display:flex;align-items:center;justify-content:center;color:var(--cc);flex-direction:column;gap:7px;margin-top:16px;overflow:hidden">
                        @if(!empty($contact['map']))
                            {!! $contact['map'] !!}
                        @else
                            <i class="fas fa-map" style="font-size:26px"></i>
                            <span style="font-size:12.5px">خريطة Google Maps</span>
                        @endif
                    </div>
                </div>
                
                <!-- Feedback input form -->
                <div class="ct-form">
                    <h3>أرسل رسالة</h3>
                    <div class="fg-2">
                        <div class="fg">
                            <label>الاسم *</label>
                            <input type="text" id="cfN" placeholder="اسمك الكريم">
                        </div>
                        <div class="fg">
                            <label>الجوال *</label>
                            <input type="tel" id="cfP" placeholder="05XXXXXXXX">
                        </div>
                    </div>
                    <div class="fg">
                        <label>المدينة</label>
                        <select id="cfC">
                            <option>بريدة</option>
                            <option>عنيزة</option>
                            <option>الرس</option>
                            <option>حائل</option>
                            <option>غيرها</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label>الموضوع</label>
                        <input type="text" id="cfS" placeholder="موضوع رسالتك">
                    </div>
                    <div class="fg">
                        <label>الرسالة</label>
                        <textarea id="cfM" placeholder="اكتب استفسارك..."></textarea>
                    </div>
                    <button class="btn btn-am" onclick="subCt()">
                        <i class="fas fa-paper-plane"></i>إرسال الرسالة
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
