<!-- Toast Notifications -->
<div class="nt" id="NT">
    <i class="fas fa-check-circle"></i>
    <span id="NTxt">تم</span>
</div>

<!-- Main Multi-step Request Modal -->
<div class="mo" id="RQM">
    <div class="mb">
        <div class="mhd">
            <h3><i class="fas fa-calendar-check"></i>طلب عرض سعر</h3>
            <button class="mcl" onclick="closeReq()"><i class="fas fa-times"></i></button>
        </div>
        <div class="mbd">
            <!-- Steps Progress Bar -->
            <div class="rqs">
                <div class="rqs-s act" id="rs1">١ - بياناتك</div>
                <div class="rqs-s" id="rs2">٢ - الخدمة</div>
                <div class="rqs-s" id="rs3">٣ - التفاصيل</div>
            </div>
            
            <!-- Step 1: Customer Details -->
            <div class="sp act" id="sp1">
                <div class="rnote">
                    <i class="fas fa-info-circle"></i>
                    <span>سنتواصل معك قريبا  </span>
                </div>
                <div class="fg-2">
                    <div class="fg">
                        <label>الاسم الكريم *</label>
                        <input type="text" id="r1" placeholder="مثال: عبدالرحمن المطيري">
                    </div>
                    <div class="fg">
                        <label>رقم الجوال *</label>
                        <input type="tel" id="r2" placeholder="05XXXXXXXX" maxlength="10">
                    </div>
                </div>
                <div class="fg-2">
                    <div class="fg">
                        <label>المدينة *</label>
                        <select id="r3">
                            <option value="">اختر المدينة</option>
                            @if(isset($globalAreas))
                                @foreach($globalAreas as $area)
                                    <option value="{{ $area->name }}">{{ $area->name }}</option>
                                @endforeach
                            @endif
                            <option>غيرها</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label>الحي / المنطقة</label>
                        <input type="text" id="r4" placeholder="الحي أو المنطقة">
                    </div>
                </div>
            </div>
            
            <!-- Step 2: Service Selection -->
            <div class="sp" id="sp2">
                <div class="fg">
                    <label>نوع الخدمة المطلوبة *</label>
                    <select id="r5">
                        <option value="">اختر الخدمة</option>
                        @if(isset($globalServices))
                            @foreach($globalServices as $svc)
                                <option value="{{ $svc->name }}">{{ $svc->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="fg-2">
                    <div class="fg">
                        <label>نوع المبنى</label>
                        <select id="r6">
                            <option>منزل / فيلا</option>
                            <option>شقة</option>
                            <option>مستودع</option>
                            <option>مبنى تجاري</option>
                            <option>غيره</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label>مساحة السطح التقريبية</label>
                        <select id="r7">
                            <option>أقل من 100م²</option>
                            <option>100-200م²</option>
                            <option>200-400م²</option>
                            <option>400-600م²</option>
                            <option>أكثر من 600م²</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Step 3: Booking & Details -->
            <div class="sp" id="sp3">
                <div class="fg">
                    <label>وصف المشكلة</label>
                    <textarea id="r8" placeholder="مثال: يوجد تسرب من الجهة الشمالية عند الأمطار..."></textarea>
                </div>
                <div class="fg-2">
                    <div class="fg">
                        <label>التاريخ المناسب للمعاينة</label>
                        <input type="date" id="r9">
                    </div>
                    <div class="fg">
                        <label>الوقت المناسب</label>
                        <select id="r10">
                            <option>الصباح (8ص-12م)</option>
                            <option>الظهر (12م-4م)</option>
                            <option>المساء (4م-8م)</option>
                        </select>
                    </div>
                </div>
                <div class="rgr">
                    <i class="fas fa-shield-alt"></i>جميع معلوماتك سرية ولن تُشارك مع أي طرف ثالث
                </div>
            </div>
        </div>
        
        <!-- Modal Footer Controls -->
        <div class="mft">
            <button class="btn btn-am" id="pvB" onclick="rqPv()" style="display:none;flex:0;padding:13px 18px">
                <i class="fas fa-arrow-right"></i>السابق
            </button>
            <button class="btn btn-nv" id="nxB" onclick="rqNx()">
                التالي<i class="fas fa-arrow-left"></i>
            </button>
        </div>
    </div>
</div>

<!-- Global Video Lightbox Modal -->
<div id="vidModal" style="display:none; position:fixed; inset:0; background:rgba(8,15,30,0.92); z-index:99999; align-items:center; justify-content:center; padding:15px; backdrop-filter:blur(10px); transition: opacity 0.3s ease;" onclick="if(event.target===this)closeVid()">
    <div class="vmod-in" style="position:relative; width:100%; max-width:850px; aspect-ratio:16/9; background:#000; border-radius:16px; overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.7); border:1px solid rgba(255,255,255,0.1);" onclick="event.stopPropagation()">
        <button onclick="closeVid()" style="position:absolute; top:12px; right:12px; background:rgba(255,255,255,0.15); border:none; color:#fff; font-size:18px; width:38px; height:38px; border-radius:50%; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:100; transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.3)'; this.style.transform='scale(1.1)';" onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='scale(1)';">
            <i class="fas fa-times"></i>
        </button>
        <div id="vidBody" style="width:100%; height:100%;" onclick="event.stopPropagation()"></div>
    </div>
</div>
