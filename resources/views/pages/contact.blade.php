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
                    
                    <!-- National Address Official Card -->
                    <div style="margin-top:20px; border-radius:var(--r); overflow:hidden; border:2px solid #1a3a6b; box-shadow:0 4px 18px rgba(26,58,107,0.13);">
                        <!-- Header -->
                        <div style="background:linear-gradient(135deg,#1a3a6b,#2356a0); padding:12px 16px;">
                            <div style="display:flex; align-items:center; justify-content:space-between; gap:10px; margin-bottom:10px;">
                                <div style="color:#fff;">
                                    <div style="font-size:11px; opacity:.8; margin-bottom:2px;">Address Proof · إثبات عنوان</div>
                                    <div style="font-weight:800; font-size:13px;">العنوان الوطني الرسمي</div>
                                </div>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <svg width="36" height="36" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="50" r="48" stroke="#c5a880" stroke-width="4"/>
                                        <path d="M50 20 C35 20 24 32 24 46 C24 62 50 80 50 80 C50 80 76 62 76 46 C76 32 65 20 50 20Z" fill="#c5a880"/>
                                        <circle cx="50" cy="46" r="10" fill="#1a3a6b"/>
                                    </svg>
                                    <div style="color:#fff; font-size:10px; text-align:center; line-height:1.4;">
                                        <div style="font-weight:700">NATIONAL</div>
                                        <div style="font-weight:700">ADDRESS</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Proof meta row -->
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:6px;">
                                <div style="background:rgba(255,255,255,0.1); border-radius:5px; padding:5px 8px;">
                                    <div style="color:rgba(255,255,255,0.6); font-size:9px;">رقم الإثبات · Proof No.</div>
                                    <div style="color:#c5a880; font-weight:700; font-size:10px; font-family:monospace;">{{ $contact['na_proof_no'] ?? '1036369457' }}</div>
                                </div>
                                <div style="background:rgba(255,255,255,0.1); border-radius:5px; padding:5px 8px;">
                                    <div style="color:rgba(255,255,255,0.6); font-size:9px;">تاريخ الإصدار · Issued</div>
                                    <div style="color:#fff; font-weight:700; font-size:10px; font-family:monospace;">{{ $contact['na_issued_date'] ?? '12/7/2023' }}</div>
                                </div>
                                <div style="background:rgba(255,255,255,0.1); border-radius:5px; padding:5px 8px;">
                                    <div style="color:rgba(255,255,255,0.6); font-size:9px;">تاريخ الانتهاء · Expires</div>
                                    <div style="color:#fff; font-weight:700; font-size:10px; font-family:monospace;">{{ $contact['na_expired_date'] ?? '1/8/2024' }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div style="background:#fff; padding:14px 16px;">
                            <!-- Company Name + Account -->
                            <div style="padding-bottom:10px; border-bottom:1px dashed #ddd; margin-bottom:12px;">
                                <div style="text-align:center; margin-bottom:8px;">
                                    <div style="font-size:10px; color:#888; margin-bottom:2px;">الاسم · Name</div>
                                    <div style="font-weight:800; color:#1a3a6b; font-size:13px;">{{ $contact['na_company_name'] ?? 'مؤسسة رونق قلب الخليج للمقاولات العامة' }}</div>
                                </div>
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:6px;">
                                    <div style="background:#f4f7fb; border-radius:5px; padding:6px 8px;">
                                        <div style="color:#888; font-size:9px; margin-bottom:1px;">رقم الحساب · Customer Acc.</div>
                                        <div style="font-weight:700; color:#1a3a6b; font-family:monospace; font-size:10px; letter-spacing:1px;">{{ $contact['na_customer_acc'] ?? '3132637196 2' }}</div>
                                    </div>
                                    <div style="background:#f4f7fb; border-radius:5px; padding:6px 8px;">
                                        <div style="color:#888; font-size:9px; margin-bottom:1px;">تاريخ التسجيل · Reg. Date</div>
                                        <div style="font-weight:700; color:#1a3a6b; font-family:monospace; font-size:10px;">{{ $contact['na_reg_date'] ?? '12/7/2023' }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Short Address Badge -->
                            <div style="text-align:center; margin-bottom:12px;">
                                <span style="background:#1a3a6b; color:#c5a880; font-size:15px; font-weight:900; letter-spacing:2px; padding:5px 20px; border-radius:6px; font-family:monospace;">{{ $contact['na_short_address'] ?? 'QBPA3764' }}</span>
                                <div style="font-size:10px; color:#888; margin-top:4px;">العنوان المختصر · Short Address</div>
                            </div>

                            <!-- Address Details Grid -->
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:8px; font-size:11.5px;">
                                <div style="background:#f4f7fb; border-radius:6px; padding:8px 10px;">
                                    <div style="color:#888; font-size:10px; margin-bottom:2px;">رقم المبنى · Building No.</div>
                                    <div style="font-weight:700; color:#1a3a6b; font-family:monospace; letter-spacing:1px;">{{ $contact['na_building_no'] ?? '3764' }}</div>
                                </div>
                                <div style="background:#f4f7fb; border-radius:6px; padding:8px 10px;">
                                    <div style="color:#888; font-size:10px; margin-bottom:2px;">الشارع · Street</div>
                                    <div style="font-weight:700; color:#1a3a6b;">{{ $contact['na_street'] ?? 'التغيرة' }}</div>
                                </div>
                                <div style="background:#f4f7fb; border-radius:6px; padding:8px 10px;">
                                    <div style="color:#888; font-size:10px; margin-bottom:2px;">الحي · District</div>
                                    <div style="font-weight:700; color:#1a3a6b;">{{ $contact['na_district'] ?? 'التخصصي' }}</div>
                                </div>
                                <div style="background:#f4f7fb; border-radius:6px; padding:8px 10px;">
                                    <div style="color:#888; font-size:10px; margin-bottom:2px;">الرمز البريدي · Postal Code</div>
                                    <div style="font-weight:700; color:#1a3a6b; font-family:monospace; letter-spacing:1px;">{{ $contact['na_postal_code'] ?? '52366' }}</div>
                                </div>
                                <div style="background:#f4f7fb; border-radius:6px; padding:8px 10px;">
                                    <div style="color:#888; font-size:10px; margin-bottom:2px;">الرقم الفرعي · Secondary No.</div>
                                    <div style="font-weight:700; color:#1a3a6b; font-family:monospace; letter-spacing:1px;">{{ $contact['na_secondary_no'] ?? '7027' }}</div>
                                </div>
                                <div style="background:#1a3a6b; border-radius:6px; padding:8px 10px;">
                                    <div style="color:rgba(255,255,255,.7); font-size:10px; margin-bottom:2px;">المدينة · City</div>
                                    <div style="font-weight:800; color:#c5a880; font-size:13px;">{{ $contact['na_city'] ?? 'بريدة · BURAIDAH' }}</div>
                                </div>
                            </div>

                            <!-- Document Image Preview (Direct Original Image) -->
                            <div style="margin-top:14px; border-radius:8px; overflow:hidden; border:1px solid #e2e8f0; position:relative; cursor:pointer;" onclick="document.getElementById('naDocModal').style.display='flex'">
                                <img src="{{ !empty($contact['na_image']) ? $contact['na_image'] : '/images/national-address.jpeg' }}" alt="وثيقة العنوان الوطني" style="width:100%; display:block; object-fit:contain;">
                                <div style="position:absolute; bottom:0; left:0; right:0; background:rgba(26,58,107,0.35); padding:8px; display:flex; align-items:center; justify-content:center; gap:6px; color:#fff; font-size:12px; font-weight:700;">
                                    <i class="fas fa-search-plus"></i> اضغط لعرض الوثيقة كاملة
                                </div>
                            </div>

                            <!-- Footer verification link -->
                            <div style="margin-top:12px; padding-top:10px; border-top:1px dashed #ddd; display:flex; align-items:center; justify-content:space-between; gap:8px; flex-wrap:wrap;">
                                <div style="font-size:10px; color:#aaa;">
                                    <i class="fas fa-certificate" style="color:#c5a880"></i>
                                    المملكة العربية السعودية · Kingdom of Saudi Arabia
                                </div>
                                <a href="{{ $contact['na_verify_link'] ?? 'https://proof.address.gov.sa/VerifyProofNA.aspx' }}" target="_blank"
                                   style="display:inline-flex; align-items:center; gap:6px; background:#1a3a6b; color:#c5a880; font-size:11px; font-weight:700; padding:6px 14px; border-radius:20px; text-decoration:none; transition:background .2s;"
                                   onmouseover="this.style.background='#2356a0'" onmouseout="this.style.background='#1a3a6b'">
                                    <i class="fas fa-shield-check"></i> التحقق من العنوان الوطني
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Google Maps wrapper (Moved Below Card) -->
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
    <!-- Document Full View Modal -->
    <div id="naDocModal" onclick="if(event.target===this)this.style.display='none'" style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(0,0,0,0.88); align-items:flex-start; justify-content:center; padding:70px 20px 20px; flex-direction:column; gap:0; overflow-y:auto;">
        <button onclick="document.getElementById('naDocModal').style.display='none'" style="position:fixed; top:18px; left:18px; width:44px; height:44px; border-radius:50%; background:rgba(255,255,255,0.15); border:none; color:#fff; font-size:20px; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:1;">
            <i class="fas fa-times"></i>
        </button>
        <div style="width:100%; max-width:700px; margin:0 auto; display:flex; flex-direction:column; gap:8px; align-items:center;">
            <img src="{{ !empty($contact['na_image']) ? $contact['na_image'] : '/images/national-address.jpeg' }}" alt="وثيقة العنوان الوطني" style="width:100%; border-radius:10px; box-shadow:0 10px 40px rgba(0,0,0,0.5);">
            <a href="{{ $contact['na_verify_link'] ?? 'https://proof.address.gov.sa/VerifyProofNA.aspx' }}" target="_blank"
               style="display:inline-flex; align-items:center; gap:8px; background:#c5a880; color:#1a3a6b; font-size:13px; font-weight:800; padding:10px 24px; border-radius:25px; text-decoration:none; margin-top:8px;">
                <i class="fas fa-external-link-alt"></i> التحقق من صحة العنوان الوطني
            </a>
        </div>
    </div>
</div>
@endsection
