<!-- Toast Notifications -->
<div class="nt" id="NT">
    <i class="fas fa-check-circle"></i>
    <span id="NTxt">تم</span>
</div>

<!-- Main Multi-step Request Modal -->
<div class="mo" id="RQM">
    <div class="mb">
        <div class="mhd">
            <h3><i class="fas fa-calendar-check"></i>طلب عرض سعر مجاني</h3>
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
                    <span>سنتواصل معك خلال ساعة لتحديد موعد المعاينة المجانية</span>
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
                            <option>بريدة</option>
                            <option>عنيزة</option>
                            <option>الرس</option>
                            <option>البكيرية</option>
                            <option>المذنب</option>
                            <option>رياض الخبراء</option>
                            <option>حائل</option>
                            <option>البدائع</option>
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
