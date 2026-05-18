var e={g:e=>{try{let t=localStorage.getItem(`azq3_`+e);return t?JSON.parse(t):null}catch(e){return console.error(`Failed to read from localStorage`,e),null}},s:(e,t)=>{try{localStorage.setItem(`azq3_`+e,JSON.stringify(t))}catch(e){console.error(`Failed to write to localStorage`,e)}},push:(t,n)=>{let r=e.g(t)||[],i={...n,id:Date.now()};return r.push(i),e.s(t,r),i},upd:(t,n,r)=>{let i=e.g(t)||[],a=i.findIndex(e=>e.id==n);a>-1&&(i[a]={...i[a],...r},e.s(t,i))},del:(t,n)=>{let r=e.g(t)||[];e.s(t,r.filter(e=>e.id!=n))}},t={menu:[{id:1,name:`الرئيسية`,page:`home`,v:!0},{id:2,name:`من نحن`,page:`about`,v:!0},{id:3,name:`خدماتنا`,page:`services`,v:!0},{id:4,name:`مناطق الخدمة`,page:`areas`,v:!0},{id:5,name:`معرض الأعمال`,page:`gallery`,v:!0},{id:6,name:`المقالات`,page:`blog`,v:!0},{id:7,name:`تواصل معنا`,page:`contact`,v:!0}],services:[{id:1,name:`عزل الأسطح المائي`,icon:`fa-tint`,short:`حماية شاملة من تسربات المياه`,desc:`نقدم أفضل حلول العزل المائي للأسطح باستخدام أحدث المواد العالمية. نضمن حماية سطحك من التسربات لمدة تصل إلى 10 سنوات. نستخدم مواد إسفلتية وأغشية بيتومينية معدنية عالية الجودة.`,feats:`ضمان 10 سنوات موثق
مواد عالمية معتمدة
مهندسون متخصصون
معاينة مجانية
تنفيذ خلال يومين`,img:``,status:`active`},{id:2,name:`عزل الأسطح الحراري`,icon:`fa-thermometer-half`,short:`وفر 40% من فاتورة الكهرباء`,desc:`العزل الحراري الاحترافي يقلل الحرارة الداخلية بنسبة تصل إلى 40%. يستخدم مواد عاكسة للأشعة فوق البنفسجية مع ضمان يصل إلى 10 سنوات.`,feats:`توفير 40% في فاتورة الكهرباء
مواد عاكسة للحرارة
ضمان 10 سنوات
صديق للبيئة`,img:``,status:`active`},{id:3,name:`عزل الفوم البولي يوريثان`,icon:`fa-spray-can`,short:`أحدث تقنيات العزل العالمية`,desc:`عزل الفوم البولي يوريثان الأفضل عالمياً في العزل الحراري والمائي معاً. يُرش مباشرة على السطح ليشكل طبقة عازلة متصلة بلا فواصل.`,feats:`عزل مائي وحراري معاً
لا فواصل أو نقاط ضعف
خفيف الوزن
ضمان 10 سنوات`,img:``,status:`active`},{id:4,name:`عزل خزانات المياه`,icon:`fa-water`,short:`حماية خزانك من التسرب`,desc:`عزل خزانات المياه بمواد آمنة وغير سامة معتمدة صحياً، تحمي من التسربات وتمنع التلوث.`,feats:`مواد آمنة ومعتمدة صحياً
غير سامة
ضمان 5 سنوات
تنظيف مجاني قبل العزل`,img:``,status:`active`},{id:5,name:`عزل الحمامات والمطابخ`,icon:`fa-bath`,short:`إيقاف تسربات الحمامات`,desc:`حلول لعزل الحمامات والمطابخ من التسربات باستخدام مواد مقاومة للرطوبة والبخار.`,feats:`مقاومة كاملة للرطوبة
مواد خاصة بالمناطق المبللة
ضمان 5 سنوات
تنفيذ خلال 24 ساعة`,img:``,status:`active`},{id:6,name:`كشف التسربات بالأجهزة`,icon:`fa-search`,short:`تحديد مصدر التسرب بدقة 100%`,desc:`بأجهزة الكشف الحرارية والموجات فوق الصوتية نحدد مصدر التسرب بدقة دون هدم أو تكسير.`,feats:`أجهزة حرارية متطورة
بدون هدم أو تكسير
تقرير مفصل
خدمة طوارئ 24/7`,img:``,status:`active`},{id:7,name:`عزل الأساسات والجدران`,icon:`fa-building`,short:`حماية البنية من الرطوبة`,desc:`عزل الأساسات والجدران من الرطوبة الصاعدة لحماية المبنى على المدى البعيد.`,feats:`حماية إنشائية طويلة الأمد
منع الرطوبة الصاعدة
ضمان 10 سنوات`,img:``,status:`active`},{id:8,name:`عزل ما تحت البلاط`,icon:`fa-layer-group`,short:`عزل شامل من الأساس`,desc:`العزل تحت البلاط للأسطح والأرضيات لحماية المبنى من الرطوبة قبل تركيب البلاط.`,feats:`حماية من الرطوبة الصاعدة
مواد عالية الجودة
ضمان 7 سنوات`,img:``,status:`active`}],offers:[{id:1,name:`باقة السطح الأساسية`,oldP:`1500`,newP:`999`,feats:`عزل مائي للسطح
حتى 100م²
مواد عالية الجودة
ضمان 5 سنوات
معاينة مجانية`,status:`active`,feat:!1},{id:2,name:`باقة السطح الشاملة ⭐`,oldP:`3500`,newP:`2299`,feats:`عزل مائي وحراري
حتى 200م²
فوم بولي يوريثان
ضمان 10 سنوات
متابعة مجانية`,status:`active`,feat:!0},{id:3,name:`باقة الفيلا الكاملة 💎`,oldP:`7000`,newP:`4999`,feats:`عزل شامل للمبنى
مساحة غير محدودة
عزل خزانات وحمامات
كشف تسربات مجاني
ضمان 10 سنوات
خدمة VIP`,status:`active`,feat:!1}],testimonials:[{id:1,name:`عبدالرحمن المطيري`,city:`بريدة`,rating:5,svc:`عزل سطح فيلا`,text:`خدمة ممتازة جداً، حلوا مشكلة التسربات التي عانيت منها لسنوات في يوم واحد. الفريق محترف والنتيجة رائعة. أنصح بهم بشدة.`,status:`active`},{id:2,name:`سعود العنزي`,city:`عنيزة`,rating:5,svc:`عزل فوم`,text:`قلت فاتورة الكهرباء أكثر من 35% بعد العزل الحراري. الفريق سريع ومحترف في التنفيذ. أنصح كل أهل القصيم بعزل القصيم.`,status:`active`},{id:3,name:`فهد الرشيد`,city:`حائل`,rating:5,svc:`كشف تسربات`,text:`كشفوا التسرب بدقة بدون هدم. تعاملت مع شركات أخرى لم تحل المشكلة لكن عزل القصيم حلوها من أول مرة وبضمان.`,status:`active`}],gallery:[{id:1,title:`عزل سطح فيلا - بريدة`,cat:`روف`,type:`after`,icon:`fa-home`,img:``,color:`#0f2441`},{id:2,title:`عزل فوم - عنيزة`,cat:`فوم`,type:`after`,icon:`fa-spray-can`,img:``,color:`#1b3d72`},{id:3,title:`عزل خزان مياه`,cat:`خزان`,type:`after`,icon:`fa-water`,img:``,color:`#1a7a45`},{id:4,title:`عزل حمام - بريدة`,cat:`حمام`,type:`after`,icon:`fa-bath`,img:``,color:`#7c3aed`},{id:5,title:`سطح قبل العزل`,cat:`روف`,type:`before`,icon:`fa-exclamation-triangle`,img:``,color:`#dc2626`},{id:6,title:`سطح بعد العزل`,cat:`روف`,type:`after`,icon:`fa-check-circle`,img:``,color:`#1a7a45`},{id:7,title:`عزل فوم حراري - حائل`,cat:`فوم`,type:`after`,icon:`fa-thermometer-half`,img:``,color:`#e07b0f`},{id:8,title:`كشف تسرب بالأجهزة`,cat:`روف`,type:`before`,icon:`fa-search`,img:``,color:`#1d4ed8`}],faqs:[{id:1,q:`كم تستغرق عملية عزل السطح؟`,a:`من يوم إلى ثلاثة أيام حسب المساحة ونوع العزل. عزل الفوم أسرع في التطبيق.`},{id:2,q:`ما هي مدة الضمان على أعمال العزل؟`,a:`نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال الفترة.`},{id:3,q:`هل يمكن العزل على السطح القديم؟`,a:`نعم، نعالج السطح وإصلاح الشقوق قبل تطبيق طبقة العزل.`},{id:4,q:`ما الفرق بين العزل المائي والحراري؟`,a:`المائي يحمي من تسربات المياه. الحراري يقلل الحرارة ويوفر في فاتورة الكهرباء. نوصي بالجمع بينهما.`},{id:5,q:`هل تقدمون معاينة مجانية؟`,a:`نعم، معاينة مجانية وعرض سعر شفاف بدون أي التزام.`},{id:6,q:`ما مناطق تغطية الخدمة؟`,a:`القصيم كاملة (بريدة، عنيزة، الرس، البكيرية، المذنب، رياض الخبراء، البدائع) وحائل ومناطق مجاورة.`}],whyItems:[{id:1,icon:`fa-certificate`,title:`مرخصون ومعتمدون رسمياً`,desc:`شركة مرخصة من وزارة الشؤون البلدية والقروية`},{id:2,icon:`fa-shield-alt`,title:`ضمان 10 سنوات حقيقي`,desc:`ضمان موثق رسمي مع متابعة مجانية دورية`},{id:3,icon:`fa-tools`,title:`مهندسون وفنيون متخصصون`,desc:`فريق مدرب على أحدث تقنيات العزل العالمية`},{id:4,icon:`fa-leaf`,title:`مواد عالمية معتمدة`,desc:`نستخدم أفضل مواد العزل العالمية عالية الجودة`},{id:5,icon:`fa-clock`,title:`خدمة طوارئ 24 ساعة`,desc:`متاحون على مدار الساعة لخدمتك في الطوارئ`}],steps:[{id:1,num:`١`,icon:`fa-phone-alt`,title:`تواصل معنا`,desc:`اتصل أو أرسل واتساب`},{id:2,num:`٢`,icon:`fa-search`,title:`معاينة مجانية`,desc:`يزورك فريقنا لتقييم السطح`},{id:3,num:`٣`,icon:`fa-file-invoice`,title:`عرض سعر شفاف`,desc:`عرض تفصيلي بلا رسوم خفية`},{id:4,num:`٤`,icon:`fa-layer-group`,title:`تنفيذ احترافي`,desc:`ننفذ بأعلى معايير الجودة`},{id:5,num:`٥`,icon:`fa-certificate`,title:`ضمان موثق`,desc:`شهادة ضمان رسمية 10 سنوات`}],areas:[{id:1,name:`بريدة`,emoji:`🏙️`,desc:`نغطي جميع أحياء مدينة بريدة عاصمة القصيم. نفذنا مئات المشاريع في أحياء الملك فهد والنخيل والورود وغيرها.`,kws:`افضل شركة عزل اسطح ببريدة, أفضل شركة عزل أسطح ببريدة, افضل شركة عزل الأسطح ببريدة, افضل شركة عزل فوم ببريدة, افضل شركة عزل مائي وحراري ببريدة`},{id:2,name:`عنيزة`,emoji:`🌆`,desc:`نخدم مدينة عنيزة وكل أحيائها. فريقنا يصل في الموعد المحدد.`,kws:`عزل اسطح بعنيزة, عزل مائي بعنيزة, عزل فوم بعنيزة`},{id:3,name:`الرس`,emoji:`🏘️`,desc:`خدمات عزل احترافية لأهالي مدينة الرس وما حولها.`,kws:`عزل اسطح بالرس, عزل مائي بالرس`},{id:4,name:`حائل`,emoji:`🏔️`,desc:`نقدم خدماتنا لمدينة حائل ومحافظاتها بخبرة موسعة.`,kws:`افضل شركة عزل اسطح بحائل, أفضل شركة عزل أسطح بحائل, أفضل شركة عزل أسطح بحايل, افضل شركة عزل الأسطح بحائل, افضل شركة عزل فوم بحائل, افضل شركة عزل مائي وحراري بحائل`},{id:5,name:`البكيرية`,emoji:`🌿`,desc:`نغطي البكيرية وضواحيها.`,kws:`عزل اسطح بالبكيرية`},{id:6,name:`المذنب`,emoji:`🏡`,desc:`فريقنا يصل إلى المذنب لتقديم أفضل خدمات العزل.`,kws:`عزل اسطح بالمذنب`},{id:7,name:`رياض الخبراء`,emoji:`🌄`,desc:`خدمات عزل متكاملة لأهالي رياض الخبراء.`,kws:`عزل اسطح برياض الخبراء`},{id:8,name:`البدائع`,emoji:`🏗️`,desc:`نغطي البدائع ومجمعاتها السكنية.`,kws:`عزل اسطح بالبدائع`}],blogs:[{id:1,title:`أسباب تسرب المياه من السطح وكيفية إيقافه نهائياً`,cat:`عزل مائي`,summary:`تعرف على الأسباب الحقيقية لتسرب المياه وكيف يحلها عزل القصيم بضمان 10 سنوات`,content:``,img:``,status:`published`,date:`2025-01-20`},{id:2,title:`الفرق بين عزل الفوم والعزل الإسفلتي: أيهما أفضل لسطحك؟`,cat:`أنواع العزل`,summary:`مقارنة شاملة بين أنواع العزل لمساعدتك في الاختيار الأنسب`,content:``,img:``,status:`published`,date:`2025-01-15`},{id:3,title:`كيف يوفر العزل الحراري 40% من فاتورة الكهرباء في الصيف`,cat:`توفير الطاقة`,summary:`دراسة عملية عن أثر العزل الحراري على استهلاك الكهرباء في القصيم`,content:``,img:``,status:`published`,date:`2025-01-10`}],contact:{ph:`0550000000`,ph2:``,wa:`966550000000`,wm:`السلام عليكم، أود الاستفسار عن خدمات عزل القصيم`,em:`info@azlalqassim.com`,hr:`السبت - الخميس: 7ص - 10م`,ad:`بريدة، منطقة القصيم، المملكة العربية السعودية`,mp:``,sn:``,ig:``,tw:``,yt:``,fb:``,tt:``},hero:{kw:`القصيم • بريدة • عنيزة • الرس • حائل`,h1:`أفضل شركة`,sp:`عزل أسطح بالقصيم`,why_img:``,d:`متخصصون في عزل الأسطح مائياً وحرارياً باستخدام أحدث تقنيات الفوم البولي يوريثان. نحمي منزلك من التسربات والحرارة بضمان حقيقي يصل إلى 10 سنوات.`,c1:`احصل على عرض مجاني`,c2:`تواصل الآن`,s1:`+800`,s1l:`مشروع منجز`,s2:`10`,s2l:`سنوات ضمان`,s3:`+10`,s3l:`سنوات خبرة`,ct:`هل تعاني من تسربات المياه أو الحرارة الشديدة؟`,cd:`تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر غير ملزم`},hdr:{nm:`عزل القصيم`,sb:`أفضل شركة عزل أسطح بالقصيم`,wa:`واتساب`,cta:`احصل على عرض`},ftr:{d:`شركة متخصصة في عزل الأسطح مائياً وحرارياً في القصيم وبريدة وحائل. ضمان حقيقي حتى 10 سنوات.`,c:`© 2025 عزل القصيم. جميع الحقوق محفوظة.`}};function n(){Object.keys(t).forEach(n=>{e.g(n)===null&&e.s(n,t[n])})}var r=e=>document.getElementById(e),i=(e,t)=>{let n=r(e);n&&(n.textContent=t||``)},a=(e,t)=>{let n=r(e);n&&(n.href=t||`#`)},o={ms:{t:`الخدمة`,ic:`fa-tools`,f:[{id:`nm`,l:`الاسم *`,t:`text`,p:`عزل الأسطح المائي`},{id:`ic`,l:`الأيقونة (fa-tint...)`,t:`text`,p:`fa-tint`},{id:`sh`,l:`وصف مختصر`,t:`text`,p:`وصف البطاقة`},{id:`ds`,l:`وصف تفصيلي`,t:`textarea`,p:`وصف شامل...`},{id:`ft`,l:`المميزات (كل سطر ميزة)`,t:`textarea`,p:`ضمان 10 سنوات
مواد عالمية`},{id:`im`,l:`صورة الخدمة (رفع من الجهاز)`,t:`image`},{id:`st`,l:`الحالة`,t:`sel`,o:[[`active`,`✅ نشط`],[`hidden`,`🚫 مخفي`]]}],sv:`sSvc`,k:`services`,km:{nm:`name`,ic:`icon`,sh:`short`,ds:`desc`,ft:`feats`,im:`img`,st:`status`}},mo:{t:`العرض`,ic:`fa-percent`,f:[{id:`nm`,l:`اسم الباقة *`,t:`text`,p:`باقة شاملة`},{id:`op`,l:`السعر القديم`,t:`number`,p:`3500`},{id:`np`,l:`السعر الجديد *`,t:`number`,p:`2299`},{id:`ft`,l:`المميزات (كل سطر)`,t:`textarea`,p:`عزل مائي
ضمان 10 سنوات`},{id:`fe`,l:`تمييز الباقة`,t:`sel`,o:[[`false`,`لا`],[`true`,`نعم`]]},{id:`st`,l:`الحالة`,t:`sel`,o:[[`active`,`✅ نشط`],[`hidden`,`🚫 مخفي`]]}],sv:`sOff`,k:`offers`,km:{nm:`name`,op:`oldP`,np:`newP`,ft:`feats`,fe:`feat`,st:`status`}},mw:{t:`ميزة لماذا نحن`,ic:`fa-award`,f:[{id:`im`,l:`صورة الميزة من جهازك (اختياري)`,t:`image`},{id:`ic`,l:`الأيقونة (إذا لم توجد صورة)`,t:`text`,p:`fa-shield-alt`},{id:`ti`,l:`العنوان *`,t:`text`,p:`ضمان 10 سنوات`},{id:`ds`,l:`الوصف`,t:`text`,p:`ضمان موثق رسمي`}],sv:`sWhy`,k:`whyItems`,km:{ic:`icon`,ti:`title`,ds:`desc`,im:`img`}},mst:{t:`خطوة العمل`,ic:`fa-list-ol`,f:[{id:`nu`,l:`الرقم`,t:`text`,p:`١`},{id:`im`,l:`صورة الخطوة من جهازك (اختياري)`,t:`image`},{id:`ic`,l:`الأيقونة (إذا لم توجد صورة)`,t:`text`,p:`fa-phone`},{id:`ti`,l:`العنوان *`,t:`text`,p:`تواصل معنا`},{id:`ds`,l:`الوصف`,t:`text`,p:`اتصل أو واتساب`}],sv:`sStep`,k:`steps`,km:{nu:`num`,ic:`icon`,ti:`title`,ds:`desc`,im:`img`}},ma:{t:`منطقة الخدمة`,ic:`fa-map-marker-alt`,f:[{id:`nm`,l:`الاسم *`,t:`text`,p:`بريدة`},{id:`em`,l:`الإيموجي`,t:`text`,p:`🏙️`},{id:`ds`,l:`الوصف`,t:`textarea`,p:`وصف الخدمة...`},{id:`kw`,l:`الكلمات المفتاحية`,t:`textarea`,p:`عزل اسطح ببريدة...`}],sv:`sArea`,k:`areas`,km:{nm:`name`,em:`emoji`,ds:`desc`,kw:`kws`}},mt:{t:`رأي العميل`,ic:`fa-star`,f:[{id:`nm`,l:`الاسم *`,t:`text`,p:`عبدالرحمن المطيري`},{id:`ci`,l:`المدينة`,t:`text`,p:`بريدة`},{id:`rt`,l:`التقييم`,t:`sel`,o:[[`5`,`⭐⭐⭐⭐⭐`],[`4`,`⭐⭐⭐⭐`],[`3`,`⭐⭐⭐`]]},{id:`sv`,l:`الخدمة`,t:`text`,p:`عزل سطح فيلا`},{id:`tx`,l:`نص الرأي *`,t:`textarea`,p:`رأي العميل...`},{id:`st`,l:`الحالة`,t:`sel`,o:[[`active`,`✅ ظاهر`],[`hidden`,`🚫 مخفي`]]}],sv:`sTest`,k:`testimonials`,km:{nm:`name`,ci:`city`,rt:`rating`,sv:`svc`,tx:`text`,st:`status`}},mf:{t:`السؤال الشائع`,ic:`fa-question`,f:[{id:`q`,l:`السؤال *`,t:`text`,p:`كم تستغرق عملية العزل؟`},{id:`a`,l:`الإجابة *`,t:`textarea`,p:`الإجابة...`}],sv:`sFaq`,k:`faqs`,km:{q:`q`,a:`a`}},mg:{t:`صورة في المعرض`,ic:`fa-image`,f:[{id:`ti`,l:`العنوان *`,t:`text`,p:`عزل سطح - بريدة`},{id:`ca`,l:`التصنيف`,t:`text`,p:`روف`},{id:`im`,l:`صورة المعرض من جهازك`,t:`image`},{id:`ic`,l:`أيقونة (إذا لم توجد صورة)`,t:`text`,p:`fa-home`},{id:`cl`,l:`لون الخلفية`,t:`text`,p:`#0f2441`},{id:`ty`,l:`النوع`,t:`sel`,o:[[`after`,`بعد العزل`],[`before`,`قبل العزل`]]}],sv:`sGal`,k:`gallery`,km:{ti:`title`,ca:`cat`,im:`img`,ic:`icon`,cl:`color`,ty:`type`}},mb:{t:`المقال`,ic:`fa-blog`,f:[{id:`ti`,l:`العنوان *`,t:`text`,p:`عنوان المقال`},{id:`ca`,l:`التصنيف`,t:`text`,p:`عزل مائي`},{id:`su`,l:`الملخص`,t:`text`,p:`ملخص قصير`},{id:`im`,l:`صورة الغلاف من جهازك`,t:`image`},{id:`co`,l:`المحتوى`,t:`textarea`,p:`محتوى المقال...`,r:5},{id:`st`,l:`الحالة`,t:`sel`,o:[[`published`,`✅ منشور`],[`draft`,`📝 مسودة`]]}],sv:`sBlog`,k:`blogs`,km:{ti:`title`,ca:`cat`,su:`summary`,im:`img`,co:`content`,st:`status`}},mm:{t:`عنصر المنيو`,ic:`fa-bars`,f:[{id:`nm`,l:`الاسم *`,t:`text`,p:`الرئيسية`},{id:`pg`,l:`الصفحة`,t:`sel`,o:[[`home`,`الرئيسية`],[`about`,`من نحن`],[`services`,`خدماتنا`],[`areas`,`مناطق الخدمة`],[`gallery`,`معرض الأعمال`],[`blog`,`المقالات`],[`contact`,`تواصل معنا`]]},{id:`vi`,l:`الظهور`,t:`sel`,o:[[`true`,`✅ مرئي`],[`false`,`🚫 مخفي`]]}],sv:`sMenu`,k:`menu`,km:{nm:`name`,pg:`page`,vi:`v`}}},s=null;function c(t,n=null){s=n;let i=o[t];if(!i)return;let a=n!==null,c=i.f.map(e=>{let t=e.r||3,n=e.t===`sel`?`<select id="mf_${e.id}">${e.o.map(e=>`<option value="${e[0]}">${e[1]}</option>`).join(``)}</select>`:e.t===`textarea`?`<textarea id="mf_${e.id}" placeholder="${e.p||``}" rows="${t}"></textarea>`:e.t===`image`?`
                    <div class="afg-upload-box" id="upbox_${e.id}" style="border:2px dashed var(--sl2);padding:14px;border-radius:8px;text-align:center;background:rgba(0,0,0,0.02);position:relative">
                        <input type="hidden" id="mf_${e.id}" value="">
                        <input type="file" id="file_${e.id}" accept="image/*" style="display:none" onchange="uploadFileAction('${e.id}')">
                        <div id="prev_${e.id}" style="display:none;margin-bottom:10px">
                            <img id="img_${e.id}" src="" style="max-height:100px;border-radius:6px;box-shadow:0 2px 8px rgba(0,0,0,0.1)">
                            <button type="button" class="ab nb" style="background:#dc2626;color:#fff;padding:4px 8px;font-size:11px;margin-top:6px;border-radius:4px" onclick="clearUploadField('${e.id}')"><i class="fas fa-trash-alt"></i> حذف</button>
                        </div>
                        <div id="prompt_${e.id}">
                            <i class="fas fa-cloud-upload-alt" style="font-size:28px;color:var(--cc);margin-bottom:8px"></i>
                            <div style="font-size:12px;font-weight:700;color:var(--nv)">اسحب أو اختر صورة من جهازك</div>
                            <div style="font-size:10px;color:#888;margin-top:4px">PNG, JPG, WEBP (بحد أقصى 10MB)</div>
                            <button type="button" class="ab nb" style="background:var(--cc);color:#fff;margin-top:8px;padding:6px 12px;font-size:11px" onclick="$('file_${e.id}').click()"><i class="fas fa-folder-open"></i> تصفح الجهاز</button>
                        </div>
                        <div id="loader_${e.id}" style="display:none;padding:10px">
                            <i class="fas fa-spinner fa-spin" style="font-size:24px;color:var(--cc)"></i>
                            <div style="font-size:11px;margin-top:6px;color:#666">جاري رفع الصورة...</div>
                        </div>
                    </div>`:`<input type="${e.t}" id="mf_${e.id}" placeholder="${e.p||``}">`;return`<div class="afg"><label>${e.l}</label>${n}</div>`}).join(``),l=r(`MC`);if(l&&(l.innerHTML=`
            <div class="amo open" id="AM" onclick="if(event.target===this)cM()">
                <div class="ambox">
                    <div class="amhd">
                        <h3><span class="ammic"><i class="fas ${i.ic}"></i></span>${a?`تعديل`:`إضافة`} ${i.t}</h3>
                        <button class="amcl" onclick="cM()"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="ambd">${c}</div>
                    <div class="amft">
                        <button class="ab sc" onclick="cM()">إلغاء</button>
                        <button class="ab am" onclick="${i.sv}()"><i class="fas fa-save"></i>${a?`حفظ التعديل`:`إضافة`}</button>
                    </div>
                </div>
            </div>`),a){let t=i.k,a=(e.g(t)||[]).find(e=>e.id==n);a&&i.km&&i.f.forEach(e=>{let t=r(`mf_`+e.id);if(!t)return;let n=i.km[e.id];if(n&&a[n]!==void 0&&(t.value=String(a[n]),e.t===`image`&&t.value&&t.value.trim())){let n=r(`prev_${e.id}`),i=r(`prompt_${e.id}`),a=r(`img_${e.id}`);n&&i&&a&&(i.style.display=`none`,n.style.display=`block`,a.src=t.value)}})}}function l(){let e=r(`MC`);e&&(e.innerHTML=``)}async function u(e){let t=r(`file_`+e);if(!t||!t.files.length)return;let n=t.files[0];r(`prompt_${e}`).style.display=`none`,r(`loader_${e}`).style.display=`block`;let i=new FormData;i.append(`image`,n);try{let t=await fetch(`/admin/upload`,{method:`POST`,headers:{"X-CSRF-TOKEN":$()},body:i});if(t.ok){let n=await t.json();r(`mf_`+e).value=n.url,r(`loader_${e}`).style.display=`none`,r(`prev_${e}`).style.display=`block`,r(`img_${e}`).src=n.url,Q(`✅ تم رفع الصورة من جهازك بنجاح`)}else Q(`❌ فشل رفع الصورة، يرجى التحقق من الامتداد والحجم`,`err`),d(e)}catch(t){console.error(t),Q(`❌ خطأ في الاتصال بالخادم`,`err`),d(e)}}function d(e){r(`mf_`+e).value=``;let t=r(`file_`+e);t&&(t.value=``),r(`prev_${e}`).style.display=`none`,r(`loader_${e}`).style.display=`none`,r(`prompt_${e}`).style.display=`block`}async function f(){let e=r(`file_why`);if(!e||!e.files.length)return;let t=e.files[0];r(`prompt_why`).style.display=`none`,r(`loader_why`).style.display=`block`;let n=new FormData;n.append(`image`,t);try{let e=await fetch(`/admin/upload`,{method:`POST`,headers:{"X-CSRF-TOKEN":$()},body:n});if(e.ok){let t=await e.json();r(`hpwhyimg`).value=t.url,r(`loader_why`).style.display=`none`,r(`prev_why`).style.display=`block`,r(`img_why`).src=t.url,Q(`✅ تم رفع صورة لماذا تختارنا بنجاح`)}else Q(`❌ فشل رفع الصورة، يرجى التحقق من الامتداد والحجم`,`err`),p()}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`),p()}}function p(){r(`hpwhyimg`).value=``;let e=r(`file_why`);e&&(e.value=``),r(`prev_why`).style.display=`none`,r(`loader_why`).style.display=`none`,r(`prompt_why`).style.display=`block`}async function ee(){let e=r(`file_abt`);if(!e||!e.files.length)return;let t=e.files[0];r(`prompt_abt`).style.display=`none`,r(`loader_abt`).style.display=`block`;let n=new FormData;n.append(`image`,t);try{let e=await fetch(`/admin/upload`,{method:`POST`,headers:{"X-CSRF-TOKEN":$()},body:n});if(e.ok){let t=await e.json();r(`abtimg`).value=t.url,r(`loader_abt`).style.display=`none`,r(`prev_abt`).style.display=`block`,r(`img_abt`).src=t.url,Q(`✅ تم رفع صورة من نحن بنجاح`)}else Q(`❌ فشل رفع الصورة، يرجى التحقق من الامتداد والحجم`,`err`),m()}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`),m()}}function m(){r(`abtimg`).value=``;let e=r(`file_abt`);e&&(e.value=``),r(`prev_abt`).style.display=`none`,r(`loader_abt`).style.display=`none`,r(`prompt_abt`).style.display=`block`}function h(e){let t=r(`mf_`+e);return t?t.value.trim():``}async function g(t,n){let r=s?{id:s,...n}:n;try{let n=await fetch(`/admin/content/`+t,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(r)});if(n.ok){let r=await n.json(),i=e.g(t)||[];if(s){let e=i.findIndex(e=>e.id==s);e>-1&&(i[e]=r.item)}else i.push(r.item);e.s(t,i),l(),G(),Swal.fire({title:s?`تم التحديث بنجاح!`:`تمت الإضافة بنجاح!`,text:`تم حفظ كافة التعديلات ومزامنتها في قاعدة البيانات فوراً.`,icon:`success`,timer:2200,showConfirmButton:!1,direction:`rtl`})}else Q(`❌ فشل حفظ التعديلات في قاعدة البيانات`,`err`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`)}}function _(){let e={name:h(`nm`),icon:h(`ic`)||`fa-tools`,short:h(`sh`),desc:h(`ds`),feats:h(`ft`),img:h(`im`),status:h(`st`)};if(!e.name){Q(`يرجى إدخال الاسم`,`err`);return}g(`services`,e)}function v(){let e={name:h(`nm`),oldP:h(`op`),newP:h(`np`),feats:h(`ft`),feat:h(`fe`)===`true`,status:h(`st`)};if(!e.name){Q(`يرجى إدخال الاسم`,`err`);return}g(`offers`,e)}function y(){let e={img:h(`im`),icon:h(`ic`)||`fa-check`,title:h(`ti`),desc:h(`ds`)};if(!e.title){Q(`يرجى إدخال العنوان`,`err`);return}g(`whyItems`,e)}function te(){let e={num:h(`nu`),img:h(`im`),icon:h(`ic`)||`fa-star`,title:h(`ti`),desc:h(`ds`)};if(!e.title){Q(`يرجى إدخال العنوان`,`err`);return}g(`steps`,e)}function ne(){let e={name:h(`nm`),emoji:h(`em`)||`📍`,desc:h(`ds`),kws:h(`kw`)};if(!e.name){Q(`يرجى إدخال الاسم`,`err`);return}g(`areas`,e)}function re(){let e={name:h(`nm`),city:h(`ci`),rating:parseInt(h(`rt`))||5,svc:h(`sv`),text:h(`tx`),status:h(`st`)};if(!e.name){Q(`يرجى إدخال الاسم`,`err`);return}g(`testimonials`,e)}function ie(){let e={q:h(`q`),a:h(`a`)};if(!e.q){Q(`يرجى إدخال السؤال`,`err`);return}g(`faqs`,e)}function ae(){let e={title:h(`ti`),cat:h(`ca`),img:h(`im`),icon:h(`ic`)||`fa-image`,color:h(`cl`)||`#0f2441`,type:h(`ty`)};if(!e.title){Q(`يرجى إدخال العنوان`,`err`);return}g(`gallery`,e)}function oe(){let e={title:h(`ti`),cat:h(`ca`),summary:h(`su`),img:h(`im`),content:h(`co`),status:h(`st`),date:new Date().toLocaleDateString(`ar-SA`)};if(!e.title){Q(`يرجى إدخال العنوان`,`err`);return}g(`blogs`,e)}function se(){let e={name:h(`nm`),page:h(`pg`),v:h(`vi`)===`true`};if(!e.name){Q(`يرجى إدخال الاسم`,`err`);return}g(`menu`,e)}function ce(t,n,r){Swal.fire({title:`هل أنت متأكد من الحذف؟`,text:`سيتم حذف "${r}" نهائياً من النظام.`,icon:`warning`,showCancelButton:!0,confirmButtonColor:`#dc2626`,cancelButtonColor:`#6b7a99`,confirmButtonText:`نعم، احذف الآن`,cancelButtonText:`إلغاء`,direction:`rtl`}).then(async i=>{if(i.isConfirmed)try{(await fetch(`/admin/content/${t}/${n}`,{method:`DELETE`,headers:{"X-CSRF-TOKEN":$()}})).ok?(e.del(t,n),G(),Swal.fire({title:`تم الحذف!`,text:`تم حذف "${r}" بنجاح.`,icon:`success`,timer:2e3,showConfirmButton:!1,direction:`rtl`})):Q(`❌ فشل الحذف من قاعدة البيانات`,`err`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`)}})}async function le(t,n){let r=e.g(`menu`)||[],i=r.findIndex(e=>e.id==t),a=i+n;if(!(a<0||a>=r.length)){[r[i],r[a]]=[r[a],r[i]],e.s(`menu`,r),G();try{await fetch(`/admin/menu/reorder`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify({ids:r.map(e=>e.id)})})}catch(e){console.error(e)}}}async function ue(){let t={kw:r(`hpkw`).value,h1:r(`hph1`).value,sp:r(`hpsp`).value,why_img:r(`hpwhyimg`).value,d:r(`hpd`).value,c1:r(`hpc1`).value,c2:r(`hpc2`).value,s1:r(`hps1`).value,s1l:r(`hps1l`).value,s2:r(`hps2`).value,s2l:r(`hps2l`).value,s3:r(`hps3`).value,s3l:r(`hps3l`).value,ct:r(`hpct`).value,cd:r(`hpcd`).value};e.s(`hero`,t),de(t);try{await fetch(`/admin/settings/hero`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(t)}),Q(`✅ تم تطبيق وحفظ البانر على الموقع`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`)}}function de(e){if(!e)return;i(`hKW`,e.kw),i(`hH1`,e.h1),i(`hSpn`,e.sp),i(`hDsc`,e.d),i(`hC1`,e.c1),i(`hC2`,e.c2),i(`hs1`,e.s1),i(`hs1l`,e.s1l),i(`hs2`,e.s2),i(`hs2l`,e.s2l),i(`hs3`,e.s3),i(`hs3l`,e.s3l),i(`ctaT`,e.ct),i(`ctaD`,e.cd);let t=r(`whyImg`);t&&(e.why_img&&e.why_img.trim()?t.innerHTML=`<img src="${e.why_img.trim()}" style="width:100%;height:100%;object-fit:cover">`:t.innerHTML=`<i class="fas fa-layer-group"></i><span>عزل الأسطح الاحترافي</span>`)}function fe(){let n=e.g(`hero`)||t.hero;if(Object.entries({kw:`hpkw`,h1:`hph1`,sp:`hpsp`,why_img:`hpwhyimg`,d:`hpd`,c1:`hpc1`,c2:`hpc2`,s1:`hps1`,s1l:`hps1l`,s2:`hps2`,s2l:`hps2l`,s3:`hps3`,s3l:`hps3l`,ct:`hpct`,cd:`hpcd`}).forEach(([e,t])=>{let i=r(t);i&&n[e]!==void 0&&(i.value=n[e])}),n.why_img&&n.why_img.trim()){let e=r(`prev_why`),t=r(`prompt_why`),i=r(`img_why`);e&&t&&i&&(t.style.display=`none`,e.style.display=`block`,i.src=n.why_img)}else p()}function b(){let t=e.g(`about`)||{img:``,icon:`fa-building`,title:`فريق عزل القصيم`,text1:`تأسست شركة عزل القصيم لتكون الشريك الأمين لأصحاب المنازل في منطقة القصيم وبريدة وحائل في مجال العزل المائي والحراري للأسطح والخزانات الحمامات.`,text2:`نستخدم أحدث تقنيات العزل العالمية: الفوم البولي يوريثان، العزل الإسفلتي، السيليكون المائي، وأغشية البيتومين المعدنية. فريقنا مدرب ومعتمد.`,text3:`نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال فترة الضمان.`};if(Object.entries({title:`abttitle`,icon:`abticon`,img:`abtimg`,text1:`abtt1`,text2:`abtt2`,text3:`abtt3`}).forEach(([e,n])=>{let i=r(n);i&&t[e]!==void 0&&(i.value=t[e])}),t.img&&t.img.trim()){let e=r(`prev_abt`),n=r(`prompt_abt`),i=r(`img_abt`);e&&n&&i&&(n.style.display=`none`,e.style.display=`block`,i.src=t.img)}else m()}async function pe(){let t={title:r(`abttitle`).value,icon:r(`abticon`).value,img:r(`abtimg`).value,text1:r(`abtt1`).value,text2:r(`abtt2`).value,text3:r(`abtt3`).value};e.s(`about`,t);let n=r(`abtImg`);n&&(t.img&&t.img.trim()?(n.style.background=`none`,n.style.border=`none`,n.style.padding=`0`,n.style.width=`100%`,n.style.height=`100%`,n.style.minHeight=`350px`,n.innerHTML=`<img src="${t.img.trim()}" style="width:100%;height:100%;object-fit:cover;border-radius:var(--r);box-shadow:0 8px 32px rgba(15,36,65,0.15)">`):(n.style.background=``,n.style.border=``,n.style.padding=``,n.style.width=``,n.style.height=``,n.style.minHeight=``,n.innerHTML=`<i class="fas ${t.icon||`fa-building`}"></i><span>${t.title||`فريق عزل القصيم`}</span>`));try{(await fetch(`/admin/settings/about`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify({value:t})})).ok?Q(`✅ تم حفظ وتطبيق إعدادات من نحن بنجاح`):Q(`❌ فشل حفظ الإعدادات في خادم قاعدة البيانات`,`err`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم عند الحفظ`,`err`)}}async function me(){let t={nm:r(`hnm`).value,sb:r(`hsb`).value,wa:r(`hwa`).value,cta:r(`hct`).value};e.s(`hdr`,t),x(t);try{await fetch(`/admin/settings/hdr`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(t)}),Q(`✅ تم حفظ الهيدر في قاعدة البيانات`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`)}}function x(e){e&&(i(`sNm`,e.nm),i(`sSb`,e.sb),i(`hWaT`,e.wa),i(`hCTA`,e.cta),i(`ftNm`,e.nm))}function S(){let n=e.g(`hdr`)||t.hdr;Object.entries({nm:`hnm`,sb:`hsb`,wa:`hwa`,cta:`hct`}).forEach(([e,t])=>{let i=r(t);i&&n[e]&&(i.value=n[e])})}async function C(){let t={d:r(`ftd`).value,c:r(`ftc`).value};e.s(`ftr`,t),w(t);try{await fetch(`/admin/settings/ftr`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(t)}),Q(`✅ تم حفظ الفوتر في قاعدة البيانات`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`)}}function w(e){e&&(i(`ftDs`,e.d),i(`ftCp`,e.c))}function T(){let n=e.g(`ftr`)||t.ftr,i=r(`ftd`);i&&(i.value=n.d||``);let a=r(`ftc`);a&&(a.value=n.c||``)}async function E(){let t={ph:r(`cs-p`).value,ph2:r(`cs-p2`).value,wa:r(`cs-wa`).value,wm:r(`cs-wm`).value,em:r(`cs-em`).value,hr:r(`cs-hr`).value,ad:r(`cs-ad`).value,mp:r(`cs-mp`).value,sn:r(`cs-sn`).value,ig:r(`cs-ig`).value,tw:r(`cs-tw`).value,yt:r(`cs-yt`).value,fb:r(`cs-fb`).value,tt:r(`cs-tt`).value};e.s(`contact`,t),D(t);try{await fetch(`/admin/settings/contact`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(t)}),Q(`✅ تم تطبيق وحفظ بيانات التواصل`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`)}}function D(e){if(!e)return;let t=`https://wa.me/${e.wa||`966550000000`}?text=${encodeURIComponent(e.wm||``)}`,n=`tel:${e.ph||``}`;i(`tPhT`,e.ph||``),i(`ftPhT`,` `+(e.ph||``)),i(`ftEmT`,` `+(e.em||``)),i(`ftAdT`,` `+(e.ad||``)),i(`ftHrT`,` `+(e.hr||``)),i(`tHr`,e.hr||``),i(`ctP`,e.ph||``),i(`ctWa2`,e.ph||``),i(`ctEm`,e.em||``),i(`ctAd`,e.ad||``),i(`ctHr`,e.hr||``),[`hWa`,`hWaB`,`ctaWa`,`flWa`,`abtWa`,`svcWa`,`ftWa`,`tWa`].forEach(e=>a(e,t)),[`flPh`,`ctaPh`,`svcPh`,`ftPh`,`tPh`].forEach(e=>a(e,n)),a(`ctP`,n),a(`ctWa2`,t),a(`ctEm`,`mailto:`+(e.em||``)),Object.entries({tSn:`sn`,tIg:`ig`,tTw:`tw`,ftSn:`sn`,ftIg:`ig`,ftTw:`tw`,ftYt:`yt`,ftFb:`fb`,ftTt:`tt`}).forEach(([t,n])=>a(t,e[n]||`#`));let o=r(`mapWr`);o&&e.mp&&e.mp.includes(`maps`)&&(o.innerHTML=`<iframe src="${e.mp}" width="100%" height="170" frameborder="0" style="border-radius:var(--r)" allowfullscreen></iframe>`)}function O(){let n=e.g(`contact`)||t.contact;Object.entries({ph:`cs-p`,ph2:`cs-p2`,wa:`cs-wa`,wm:`cs-wm`,em:`cs-em`,hr:`cs-hr`,ad:`cs-ad`,mp:`cs-mp`,sn:`cs-sn`,ig:`cs-ig`,tw:`cs-tw`,yt:`cs-yt`,fb:`cs-fb`,tt:`cs-tt`}).forEach(([e,t])=>{let i=r(t);i&&n[e]!==void 0&&(i.value=n[e]||``)})}function k(){let e=r(`seo-t`).value;e&&(document.title=e),Q(`✅ تم حفظ SEO`)}function A(e,t){document.documentElement.style.setProperty(e,t)}async function j(){let t={nv:r(`cl-nv`).value,am:r(`cl-am`).value,gr:r(`cl-gr`).value};e.s(`colors`,t);try{await fetch(`/admin/settings/colors`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(t)}),Q(`✅ تم حفظ الألوان في قاعدة البيانات`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالخادم`,`err`)}}var M=`all`,N=`home`;function P(){let t=(e.g(`menu`)||[]).filter(e=>e.v),n=t.map(e=>`<a onclick="nTo('${e.page}')" class="${N===e.page?`act`:``}">${e.name}</a>`).join(``),i=r(`MN`);i&&(i.innerHTML=n);let a=r(`MbN`);a&&(a.innerHTML=t.map(e=>`<a onclick="nTo('${e.page}');togMob(false)">${e.name}</a>`).join(``));let o=r(`ftPgs`);o&&(o.innerHTML=t.map(e=>`<li><a onclick="nTo('${e.page}')">${e.name}</a></li>`).join(``))}function F(t){let n=(e.g(`services`)||[]).find(e=>e.id==t);if(!n)return;i(`svcBr`,n.name),i(`svcTt`,n.name),i(`svcSh`,n.short||``),i(`svcDs`,n.desc||n.short||``);let a=r(`svcIW`);a&&(a.innerHTML=n.img&&n.img.startsWith(`http`)?`<img src="${n.img}" style="width:100%;height:100%;object-fit:cover" onerror="this.parentNode.innerHTML='<i class=\'fas fa-layer-group\' style=\'font-size:60px\'></i>'">`:`<i class="fas ${n.icon||`fa-tools`}"></i>`);let o=r(`svcFt`);o&&(o.innerHTML=(n.feats||``).split(`
`).filter(e=>e.trim()).map(e=>`<div class="sf"><i class="fas fa-check-circle"></i>${e}</div>`).join(``));let s=r(`svcFq`);s&&(s.innerHTML=(e.g(`faqs`)||[]).slice(0,3).map(e=>`
            <div class="fqi" id="sfq${e.id}">
                <div class="fqq" onclick="tFq('sfq${e.id}')">
                    <span>${e.q}</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="fqa"><p>${e.a}</p></div>
            </div>
        `).join(``));let c=r(`relS`);c&&(c.innerHTML=(e.g(`services`)||[]).filter(e=>e.id!=t&&e.status===`active`).slice(0,5).map(e=>`<div class="rs" onclick="openSvc(${e.id})"><i class="fas ${e.icon||`fa-tools`}"></i>${e.name}</div>`).join(``)),K(`svc`)}function I(e){r(e)?.classList.toggle(`open`)}function L(e){let t=e.img&&e.img.startsWith(`http`);return`
        <div class="gi" style="${t?``:`background:${e.color||`#0f2441`}`}">
            ${t?`<img src="${e.img}" onerror="this.style.display='none'">`:``}
            ${t?``:`<div class="gi-ph"><i class="fas ${e.icon||`fa-image`}"></i><span>${e.title}</span></div>`}
            <span class="gtype ${e.type===`before`?`bf`:`af`}">${e.type===`before`?`قبل`:`بعد`}</span>
            <div class="gi-ov">
                <i class="fas fa-search-plus"></i>
                <div class="gi-lb">${e.title}</div>
            </div>
        </div>
    `}function R(){let t=e.g(`gallery`)||[],n=M===`all`?t:t.filter(e=>e.cat===M),i=r(`galEl`);i&&(i.innerHTML=n.map(e=>L(e)).join(``));let a=r(`galPg`);a&&(a.innerHTML=n.map(e=>L(e)).join(``))}function z(e,t){M=e,document.querySelectorAll(`.gal-f .gf`).forEach(e=>e.classList.remove(`act`)),t&&t.classList.add(`act`),R()}function he(e,t){M=e,document.querySelectorAll(`#galF2 .gf`).forEach(e=>e.classList.remove(`act`)),t&&t.classList.add(`act`),R()}function ge(){U(`scTb`,e.g(`services`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td><i class="fas ${e.icon||`fa-tools`}" style="color:var(--am);margin-left:4px"></i>${e.name}</td>
            <td style="max-width:140px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:12px">${e.short||``}</td>
            <td>${e.img&&e.img.startsWith(`http`)?`<img src="${e.img}" style="width:40px;height:30px;object-fit:cover;border-radius:4px">`:`<span style="font-size:11px;color:var(--cc)">لا توجد</span>`}</td>
            <td>${H(e.status===`active`)}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('ms',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('services',${e.id},'${e.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`ofTb`,e.g(`offers`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.name}${e.feat?`<span class="stbg st-new" style="margin-right:5px">مميزة</span>`:``}</td>
            <td style="text-decoration:line-through;color:var(--cc)">${e.oldP||`-`}</td>
            <td style="color:var(--gr);font-weight:700">${e.newP} ر.س</td>
            <td>${H(e.status===`active`)}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mo',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('offers',${e.id},'${e.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`wyTb`,e.g(`whyItems`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>
                ${e.img&&e.img.trim()?`<img src="${e.img}" style="width:40px;height:30px;object-fit:cover;border-radius:4px">`:`<i class="fas ${e.icon||`fa-check`}" style="color:var(--am)"></i>`}
            </td>
            <td>${e.title}</td>
            <td style="font-size:12px;color:var(--cc)">${e.desc||``}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mw',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('whyItems',${e.id},'${e.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`stTb`,e.g(`steps`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.num||``}</td>
            <td>
                ${e.img&&e.img.trim()?`<img src="${e.img}" style="width:40px;height:30px;object-fit:cover;border-radius:4px">`:`<i class="fas ${e.icon||`fa-star`}" style="color:var(--am)"></i>`}
            </td>
            <td>${e.title}</td>
            <td style="font-size:12px;color:var(--cc)">${e.desc||``}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mst',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('steps',${e.id},'${e.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`arTb`,e.g(`areas`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.emoji||`📍`} ${e.name}</td>
            <td style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:12px">${(e.desc||``).slice(0,50)}</td>
            <td style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:11px;color:var(--cc)">${(e.kws||``).slice(0,50)}...</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('ma',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('areas',${e.id},'${e.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`tsTb`,e.g(`testimonials`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.name}</td>
            <td>${`⭐`.repeat(e.rating||5)}</td>
            <td>${e.city||``}</td>
            <td style="font-size:12px">${e.svc||``}</td>
            <td>${H(e.status===`active`)}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mt',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('testimonials',${e.id},'${e.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`fqTb`,e.g(`faqs`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.q}</td>
            <td style="font-size:12px;color:var(--cc);max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${(e.a||``).slice(0,60)}...</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mf',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('faqs',${e.id},'السؤال')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`glTb`,e.g(`gallery`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.img&&e.img.startsWith(`http`)?`<img src="${e.img}" style="width:50px;height:36px;object-fit:cover;border-radius:4px">`:`<div style="width:50px;height:36px;background:${e.color||`#0f2441`};border-radius:4px;display:flex;align-items:center;justify-content:center"><i class="fas ${e.icon||`fa-image`}" style="color:#fff;font-size:14px"></i></div>`}</td>
            <td>${e.title}</td>
            <td>${e.cat||``}</td>
            <td><span class="stbg ${e.type===`after`?`st-ok`:`st-pr`}">${e.type===`after`?`بعد`:`قبل`}</span></td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mg',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('gallery',${e.id},'${e.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`blTb`,e.g(`blogs`)||[],(e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.title}</td>
            <td>${e.cat||``}</td>
            <td>${e.img&&e.img.startsWith(`http`)?`<img src="${e.img}" style="width:50px;height:34px;object-fit:cover;border-radius:4px">`:`<span style="font-size:11px;color:var(--cc)">لا توجد</span>`}</td>
            <td>${e.status===`published`?`<span class="stbg st-ok">منشور</span>`:`<span class="stbg st-pr">مسودة</span>`}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mb',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('blogs',${e.id},'${e.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),U(`mnTb`,e.g(`menu`)||[],(e,t,n)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.name}</td>
            <td>${e.page}</td>
            <td>${H(e.v)}</td>
            <td>
                <div class="axb">
                    ${t>0?`<button class="axbtn v" onclick="mvMn(${e.id},-1)"><i class="fas fa-chevron-up"></i></button>`:``}
                    ${t<n.length-1?`<button class="axbtn v" onclick="mvMn(${e.id},1)"><i class="fas fa-chevron-down"></i></button>`:``}
                </div>
            </td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mm',${e.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('menu',${e.id},'${e.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`),B(),V()}async function _e(t,n){try{(await fetch(`/admin/requests/${t}/status`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify({status:n})})).ok&&(e.upd(`requests`,t,{status:n}),Q(`✅ تم تحديث حالة الطلب`),W())}catch(e){console.error(e)}}async function ve(t){if(confirm(`حذف هذا الطلب؟`))try{(await fetch(`/admin/requests/${t}`,{method:`DELETE`,headers:{"X-CSRF-TOKEN":$()}})).ok&&(e.del(`requests`,t),B(),W(),Q(`✅ تم حذف الطلب بنجاح`))}catch(e){console.error(e)}}async function ye(t,n){try{(await fetch(`/admin/messages/${t}/reply`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify({replied:n})})).ok&&(e.upd(`messages`,t,{replied:n}),V(),W(),Q(`✅ تم تحديث حالة الرسالة`))}catch(e){console.error(e)}}async function be(t){if(confirm(`حذف هذه الرسالة؟`))try{(await fetch(`/admin/messages/${t}`,{method:`DELETE`,headers:{"X-CSRF-TOKEN":$()}})).ok&&(e.del(`messages`,t),V(),W(),Q(`✅ تم حذف الرسالة بنجاح`))}catch(e){console.error(e)}}function B(){let t=e.g(`requests`)||[],n=r(`fltSt`)?.value||``,i=r(`fltCt`)?.value||``,a=t.filter(e=>!(n&&e.status!==n||i&&e.city!==i)),o=r(`rqTb`);o&&(o.innerHTML=a.length?a.slice().reverse().map((e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td><strong>${e.name}</strong></td>
            <td><a href="tel:${e.phone}" style="color:var(--am);font-weight:600">${e.phone}</a></td>
            <td>${e.city||``}</td>
            <td style="font-size:12.5px">${e.service||``}</td>
            <td style="font-size:12px">${e.btype||``}</td>
            <td style="font-size:12px">${e.area||``}</td>
            <td style="font-size:11.5px;color:var(--cc)">${e.date||``}</td>
            <td>
                <select onchange="updateRqStatus(${e.id}, this.value)" style="padding:4px 8px;border-radius:6px;border:1.5px solid var(--sl2);font-family:var(--f);font-size:11.5px">
                    <option value="new" ${e.status===`new`?`selected`:``}>🆕 جديد</option>
                    <option value="progress" ${e.status===`progress`?`selected`:``}>🔄 قيد المعالجة</option>
                    <option value="done" ${e.status===`done`?`selected`:``}>✅ مكتمل</option>
                </select>
            </td>
            <td>
                <div class="axb">
                    <button class="axbtn v" onclick="viewRq(${e.id})"><i class="fas fa-eye"></i></button>
                    <button class="axbtn d" onclick="deleteRq(${e.id})"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
    `).join(``):`<tr><td colspan="10" style="text-align:center;padding:24px;color:var(--cc)"><i class="fas fa-inbox"></i> لا توجد طلبات بعد</td></tr>`)}function xe(t){let n=(e.g(`requests`)||[]).find(e=>e.id==t);n&&alert(`الاسم: `+n.name+`
الجوال: `+n.phone+`
المدينة: `+n.city+` - `+(n.district||``)+`
الخدمة: `+n.service+`
نوع المبنى: `+(n.btype||``)+`
المساحة: `+(n.area||``)+`
التاريخ: `+(n.reqDate||``)+`
الوقت: `+(n.reqTime||``)+`
ملاحظات: `+(n.notes||`لا توجد`))}function V(){let t=e.g(`messages`)||[],n=r(`msgTb`);n&&(n.innerHTML=t.length?t.slice().reverse().map((e,t)=>`
        <tr>
            <td>${t+1}</td>
            <td>${e.name}</td>
            <td><a href="tel:${e.phone}" style="color:var(--am);font-weight:600">${e.phone}</a></td>
            <td>${e.city||``}</td>
            <td style="font-size:12.5px">${e.subject||``}</td>
            <td style="font-size:11.5px;color:var(--cc)">${e.date||``}</td>
            <td><span class="stbg ${e.replied?`st-ok`:`st-new`}">${e.replied?`تم الرد`:`جديدة`}</span></td>
            <td>
                <div class="axb">
                    <button class="axbtn v" onclick="toggleMsgReplied(${e.id}, true)"><i class="fas fa-check"></i></button>
                    <button class="axbtn d" onclick="deleteMsg(${e.id})"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
    `).join(``):`<tr><td colspan="8" style="text-align:center;padding:24px;color:var(--cc)"><i class="fas fa-inbox"></i> لا توجد رسائل بعد</td></tr>`)}function H(e){return e?`<span class="stbg st-ok">✅ نشط</span>`:`<span class="stbg st-no">🚫 مخفي</span>`}function U(e,t,n){let i=r(e);i&&(i.innerHTML=t.length?t.map((e,t,r)=>n(e,t,r)).join(``):`<tr><td colspan="10" style="text-align:center;padding:22px;color:var(--cc)"><i class="fas fa-database"></i> لا توجد بيانات</td></tr>`)}function W(){let t=e.g(`requests`)||[],n=e.g(`messages`)||[],a=e.g(`clicks`)||[],o=a.filter(e=>e.type===`whatsapp`).length,s=a.filter(e=>e.type===`phone`).length,c=t.filter(e=>e.status===`new`).length;[`dR`,`bcR`].forEach(e=>i(e,c.toString())),[`dM`,`bcM`].forEach(e=>i(e,n.filter(e=>!e.replied).length.toString())),i(`dS`,(e.g(`services`)||[]).filter(e=>e.status===`active`).length.toString()),i(`dC`,a.length.toString()),i(`an-wa`,o.toString()),i(`an-ph`,s.toString()),i(`an-rq`,t.length.toString());let l=r(`dshR`);l&&(l.innerHTML=t.length?`
            <table class="at">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الخدمة</th>
                        <th>المدينة</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    ${t.slice(-5).reverse().map(e=>`
                        <tr>
                            <td>${e.name}</td>
                            <td style="font-size:12px">${e.service}</td>
                            <td>${e.city}</td>
                            <td>${H(e.status===`done`)}</td>
                        </tr>
                    `).join(``)}
                </tbody>
            </table>`:`<div style="text-align:center;padding:16px;color:var(--cc)"><i class="fas fa-inbox"></i> لا توجد طلبات</div>`);let u=r(`clkLog`);u&&(u.innerHTML=a.length?a.slice(-20).reverse().map(e=>`
            <tr>
                <td><span class="stbg ${e.type===`whatsapp`?`st-ok`:`st-new`}">${e.type===`whatsapp`?`واتساب`:`هاتف`}</span></td>
                <td style="font-size:12px">${e.page||``}</td>
                <td style="font-size:11.5px;color:var(--cc)">${e.time||``}</td>
            </tr>
        `).join(``):`<tr><td colspan="3" style="text-align:center;padding:16px;color:var(--cc)">لا توجد نقرات</td></tr>`)}function Se(){let t=e.g(`requests`)||[];if(!t.length){Q(`لا توجد طلبات`,`info`);return}let n=[`الاسم,الجوال,المدينة,الحي,الخدمة,نوع المبنى,المساحة,التاريخ,الحالة,الملاحظات`,...t.map(e=>`"${e.name}","${e.phone}","${e.city||``}","${e.district||``}","${e.service||``}","${e.btype||``}","${e.area||``}","${e.date||``}","${e.status||``}","${e.notes||``}"`)].join(`
`),r=document.createElement(`a`);r.href=URL.createObjectURL(new Blob([`﻿`+n],{type:`text/csv;charset=utf-8`})),r.download=`طلبات_عزل_القصيم.csv`,r.click(),Q(`✅ تم تصدير ملف Excel`)}function G(){window.location.pathname.startsWith(`/admin`)&&(ge(),W())}function K(e){document.querySelectorAll(`.page`).forEach(e=>e.classList.remove(`active`));let t=r(`page-`+e);t&&(t.classList.add(`active`),N=e,window.scrollTo({top:0,behavior:`smooth`})),P()}var q=1;function Ce(){q=1,Y(),r(`RQM`).classList.add(`open`)}function J(){r(`RQM`).classList.remove(`open`),q=1,Y()}document.addEventListener(`click`,e=>{let t=r(`RQM`);t&&e.target===t&&J()});function Y(){[1,2,3].forEach(e=>{r(`rs`+e)?.classList.toggle(`act`,e===q),r(`sp`+e)?.classList.toggle(`act`,e===q)});let e=r(`pvB`),t=r(`nxB`);e&&(e.style.display=q>1?``:`none`),t&&(t.innerHTML=q<3?`التالي<i class="fas fa-arrow-left" style="margin-right:6px"></i>`:`<i class="fas fa-paper-plane" style="margin-left:6px"></i>إرسال الطلب`)}function we(){if(q===1){if(!r(`r1`).value.trim()){Q(`يرجى إدخال اسمك الكريم`,`err`);return}if(!r(`r2`).value.trim()||r(`r2`).value.trim().length<10){Q(`يرجى إدخال رقم جوال صحيح`,`err`);return}if(!r(`r3`).value){Q(`يرجى اختيار المدينة`,`err`);return}q=2,Y()}else if(q===2){if(!r(`r5`).value){Q(`يرجى اختيار الخدمة المطلوبة`,`err`);return}q=3,Y()}else Ee()}function Te(){q>1&&(q--,Y())}async function Ee(){let t={name:r(`r1`).value.trim(),phone:r(`r2`).value.trim(),city:r(`r3`).value,district:r(`r4`).value.trim(),service:r(`r5`).value,btype:r(`r6`).value,area:r(`r7`).value,notes:r(`r8`).value.trim(),reqDate:r(`r9`).value,reqTime:r(`r10`).value,status:`new`,date:new Date().toLocaleDateString(`ar-SA`)};try{let n=await fetch(`/requests`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(t)});if(n.ok){let t=await n.json();e.push(`requests`,t.item),X(`request`,`modal`),J(),Q(`✅ تم إرسال طلبك! سنتواصل معك خلال ساعة لتحديد موعد المعاينة المجانية`),W()}else Q(`❌ فشل إرسال الطلب، يرجى المحاولة لاحقاً`,`err`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالشبكة`,`err`)}[`r1`,`r2`,`r4`,`r8`,`r9`].forEach(e=>{let t=r(e);t&&(t.value=``)}),[`r3`,`r5`,`r6`].forEach(e=>{let t=r(e);t&&(t.selectedIndex=0)})}async function De(){let t=r(`cfN`).value.trim(),n=r(`cfP`).value.trim();if(!t||!n){Q(`يرجى إدخال الاسم والجوال`,`err`);return}let i={name:t,phone:n,city:r(`cfC`).value,subject:r(`cfS`).value,msg:r(`cfM`).value,date:new Date().toLocaleDateString(`ar-SA`),replied:!1};try{let t=await fetch(`/messages`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(i)});if(t.ok){let n=await t.json();e.push(`messages`,n.item),Q(`✅ تم إرسال رسالتك! سنرد عليك قريباً`),[`cfN`,`cfP`,`cfS`,`cfM`].forEach(e=>{let t=r(e);t&&(t.value=``)}),W()}else Q(`❌ فشل إرسال الرسالة، يرجى المحاولة لاحقاً`,`err`)}catch(e){console.error(e),Q(`❌ خطأ في الاتصال بالشبكة`,`err`)}}async function X(t,n){let r={type:t,page:n,time:new Date().toLocaleString(`ar-SA`)};try{let t=await fetch(`/clicks`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify(r)});if(t.ok){let n=await t.json();e.push(`clicks`,n.item),W()}}catch(e){console.error(e)}}function Oe(){let e=r(`LU`).value.trim(),t=r(`LP`).value.trim();if(!e||!t){r(`LE`).classList.add(`show`);return}fetch(`/admin/login`,{method:`POST`,headers:{"Content-Type":`application/json`,"X-CSRF-TOKEN":$()},body:JSON.stringify({username:e,password:t})}).then(e=>e.json()).then(e=>{e.success?(sessionStorage.setItem(`azq3_auth`,`1`),r(`LE`).classList.remove(`show`),Q(`✅ تم تسجيل الدخول بنجاح`),setTimeout(()=>{window.location.href=`/admin`},600)):(r(`LE`).classList.add(`show`),r(`LP`).focus())}).catch(e=>{console.error(e),r(`LE`).classList.add(`show`)})}function ke(){sessionStorage.removeItem(`azq3_auth`),Q(`تم تسجيل الخروج`),setTimeout(()=>{window.location.href=`/admin/logout`},600)}function Z(e){e&&e.preventDefault(),window.location.href=`/`}function Ae(e){e&&e.preventDefault(),window.location.href=`/admin`}function je(e,t){document.querySelectorAll(`.apnl`).forEach(e=>e.classList.remove(`active`));let n=r(e);n&&n.classList.add(`active`),document.querySelectorAll(`.anv a`).forEach(e=>e.classList.remove(`act`)),t&&t.classList.add(`act`),i(`aT`,{pd:`لوحة التحكم`,ph:`البانر الرئيسي`,phd:`الهيدر والهوية`,pft:`الفوتر`,pmn:`إدارة المنيو`,ps:`إدارة الخدمات`,po:`العروض والباقات`,pw:`لماذا نحن`,pst:`خطوات العمل`,par:`مناطق الخدمة`,pts:`آراء العملاء`,pfq:`الأسئلة الشائعة`,pg:`معرض الصور`,pbl:`المقالات`,prq:`طلبات الخدمة`,pms:`رسائل التواصل`,pcs:`بيانات التواصل`,pseo:`إعدادات SEO`,pcl:`ألوان الموقع`,pan:`الإحصائيات`}[e]||`لوحة التحكم`),e===`prq`&&B(),e===`pms`&&V()}function Me(){fe(),b(),S(),T(),O()}function Ne(e){let t=r(`MbN`);t&&(e===!1?t.classList.remove(`open`):t.classList.toggle(`open`))}function Q(e,t=``){let n=`success`;t===`err`||e.includes(`❌`)||e.includes(`فشل`)||e.includes(`خطأ`)?n=`error`:t===`info`||e.includes(`معلومات`)||e.includes(`تنبيه`)?n=`info`:e.includes(`تحذير`)&&(n=`warning`);let r=e.replace(/[✅❌⚠️ℹ️]/g,``).trim();Swal.fire({toast:!0,position:`top-end`,icon:n,title:r,showConfirmButton:!1,timer:3e3,timerProgressBar:!0,direction:`rtl`})}window.DB=e,window.INIT=t,window.initDB=n,window.nTo=K,window.openReq=Ce,window.closeReq=J,window.togMob=Ne,window.doLogin=Oe,window.doLogout=ke,window.goSite=Z,window.showAdm=Ae,window.sP=je,window.openSvc=F,window.fGal=z,window.fGal2=he,window.tFq=I,window.rqPv=Te,window.rqNx=we,window.subCt=De,window.oM=c,window.cM=l,window.sSvc=_,window.sOff=v,window.sWhy=y,window.sStep=te,window.sArea=ne,window.sTest=re,window.sFaq=ie,window.sGal=ae,window.sBlog=oe,window.sMenu=se,window.dI=ce,window.mvMn=le,window.saveHero=ue,window.saveHdr=me,window.saveFtr=C,window.saveCS=E,window.saveSEO=k,window.saveCls=j,window.apC=A,window.viewRq=xe,window.expCSV=Se,window.rRqs=B,window.rMsgs=V,window.tC=X,window.updateRqStatus=_e,window.deleteRq=ve,window.toggleMsgReplied=ye,window.deleteMsg=be,window.uploadFileAction=u,window.clearUploadField=d,window.uploadWhyImage=f,window.clearWhyImage=p,window.uploadAboutImage=ee,window.clearAboutImage=m,window.ldAbout=b,window.saveAbout=pe;var $=()=>{let e=document.querySelector(`meta[name="csrf-token"]`);return e?e.getAttribute(`content`):``};async function Pe(){try{let t=await fetch(`/admin/logs`);if(t.ok){let n=await t.json();e.s(`requests`,n.requests),e.s(`messages`,n.messages),e.s(`clicks`,n.clicks),W()}}catch(e){console.error(e)}}window.addEventListener(`DOMContentLoaded`,()=>{n();let e=window.location.pathname,t=e===`/admin`||e===`/admin/`||e.startsWith(`/admin/`),i=sessionStorage.getItem(`azq3_auth`)===`1`;G(),(i||t)&&fetch(`/admin/state`).then(e=>{if(e.ok)return e.json();throw Error(`Unauthenticated`)}).then(e=>{Object.keys(e).forEach(t=>{localStorage.setItem(`azq3_`+t,JSON.stringify(e[t]))}),G(),t&&i&&Pe().then(()=>{Me()})}).catch(n=>{console.warn(`State synchronization bypassed:`,n.message),n.message===`Unauthenticated`&&(sessionStorage.removeItem(`azq3_auth`),t&&e!==`/admin/login`&&(window.location.href=`/admin/login`))}),window.addEventListener(`scroll`,()=>{let e=r(`HDR`);e&&(e.style.boxShadow=window.scrollY>40?`0 4px 28px rgba(15, 36, 65, 0.15)`:`0 2px 20px rgba(15, 36, 65, 0.08)`)})});