/**
 * عزل القصيم - Main Application JavaScript
 * Highly structured and well-commented JS file.
 */

// --- Database Helper (LocalStorage Wrapper) ---
const DB = {
    // Get item from local storage
    g: (key) => {
        try {
            const val = localStorage.getItem('azq3_' + key);
            return val ? JSON.parse(val) : null;
        } catch (e) {
            console.error("Failed to read from localStorage", e);
            return null;
        }
    },
    // Set item in local storage
    s: (key, val) => {
        try {
            localStorage.setItem('azq3_' + key, JSON.stringify(val));
        } catch (e) {
            console.error("Failed to write to localStorage", e);
        }
    },
    // Add a new item with unique ID
    push: (key, val) => {
        let list = DB.g(key) || [];
        const item = { ...val, id: Date.now() };
        list.push(item);
        DB.s(key, list);
        return item;
    },
    // Update existing item by ID
    upd: (key, id, data) => {
        let list = DB.g(key) || [];
        const index = list.findIndex(x => x.id == id);
        if (index > -1) {
            list[index] = { ...list[index], ...data };
            DB.s(key, list);
        }
    },
    // Delete item by ID
    del: (key, id) => {
        let list = DB.g(key) || [];
        DB.s(key, list.filter(x => x.id != id));
    }
};

// --- Initial Static Database Seed (Fallback/Initial State) ---
const INIT = {
    menu: [
        { id: 1, name: 'الرئيسية', page: 'home', v: true },
        { id: 2, name: 'من نحن', page: 'about', v: true },
        { id: 3, name: 'خدماتنا', page: 'services', v: true },
        { id: 4, name: 'مناطق الخدمة', page: 'areas', v: true },
        { id: 5, name: 'معرض الأعمال', page: 'gallery', v: true },
        { id: 6, name: 'المقالات', page: 'blog', v: true },
        { id: 7, name: 'تواصل معنا', page: 'contact', v: true }
    ],
    services: [
        {
            id: 1,
            name: 'عزل الأسطح المائي',
            icon: 'fa-tint',
            short: 'حماية شاملة من تسربات المياه',
            desc: 'نقدم أفضل حلول العزل المائي للأسطح باستخدام أحدث المواد العالمية. نضمن حماية سطحك من التسربات لمدة تصل إلى 10 سنوات. نستخدم مواد إسفلتية وأغشية بيتومينية معدنية عالية الجودة.',
            feats: 'ضمان 10 سنوات موثق\nمواد عالمية معتمدة\nمهندسون متخصصون\nمعاينة مجانية\nتنفيذ خلال يومين',
            img: '',
            status: 'active'
        },
        {
            id: 2,
            name: 'عزل الأسطح الحراري',
            icon: 'fa-thermometer-half',
            short: 'وفر 40% من فاتورة الكهرباء',
            desc: 'العزل الحراري الاحترافي يقلل الحرارة الداخلية بنسبة تصل إلى 40%. يستخدم مواد عاكسة للأشعة فوق البنفسجية مع ضمان يصل إلى 10 سنوات.',
            feats: 'توفير 40% في فاتورة الكهرباء\nمواد عاكسة للحرارة\nضمان 10 سنوات\nصديق للبيئة',
            img: '',
            status: 'active'
        },
        {
            id: 3,
            name: 'عزل الفوم البولي يوريثان',
            icon: 'fa-spray-can',
            short: 'أحدث تقنيات العزل العالمية',
            desc: 'عزل الفوم البولي يوريثان الأفضل عالمياً في العزل الحراري والمائي معاً. يُرش مباشرة على السطح ليشكل طبقة عازلة متصلة بلا فواصل.',
            feats: 'عزل مائي وحراري معاً\nلا فواصل أو نقاط ضعف\nخفيف الوزن\nضمان 10 سنوات',
            img: '',
            status: 'active'
        },
        {
            id: 4,
            name: 'عزل خزانات المياه',
            icon: 'fa-water',
            short: 'حماية خزانك من التسرب',
            desc: 'عزل خزانات المياه بمواد آمنة وغير سامة معتمدة صحياً، تحمي من التسربات وتمنع التلوث.',
            feats: 'مواد آمنة ومعتمدة صحياً\nغير سامة\nضمان 5 سنوات\nتنظيف مجاني قبل العزل',
            img: '',
            status: 'active'
        },
        {
            id: 5,
            name: 'عزل الحمامات والمطابخ',
            icon: 'fa-bath',
            short: 'إيقاف تسربات الحمامات',
            desc: 'حلول لعزل الحمامات والمطابخ من التسربات باستخدام مواد مقاومة للرطوبة والبخار.',
            feats: 'مقاومة كاملة للرطوبة\nمواد خاصة بالمناطق المبللة\nضمان 5 سنوات\nتنفيذ خلال 24 ساعة',
            img: '',
            status: 'active'
        },
        {
            id: 6,
            name: 'كشف التسربات بالأجهزة',
            icon: 'fa-search',
            short: 'تحديد مصدر التسرب بدقة 100%',
            desc: 'بأجهزة الكشف الحرارية والموجات فوق الصوتية نحدد مصدر التسرب بدقة دون هدم أو تكسير.',
            feats: 'أجهزة حرارية متطورة\nبدون هدم أو تكسير\nتقرير مفصل\nخدمة طوارئ 24/7',
            img: '',
            status: 'active'
        },
        {
            id: 7,
            name: 'عزل الأساسات والجدران',
            icon: 'fa-building',
            short: 'حماية البنية من الرطوبة',
            desc: 'عزل الأساسات والجدران من الرطوبة الصاعدة لحماية المبنى على المدى البعيد.',
            feats: 'حماية إنشائية طويلة الأمد\nمنع الرطوبة الصاعدة\nضمان 10 سنوات',
            img: '',
            status: 'active'
        },
        {
            id: 8,
            name: 'عزل ما تحت البلاط',
            icon: 'fa-layer-group',
            short: 'عزل شامل من الأساس',
            desc: 'العزل تحت البلاط للأسطح والأرضيات لحماية المبنى من الرطوبة قبل تركيب البلاط.',
            feats: 'حماية من الرطوبة الصاعدة\nمواد عالية الجودة\nضمان 7 سنوات',
            img: '',
            status: 'active'
        }
    ],
    offers: [
        {
            id: 1,
            name: 'باقة السطح الأساسية',
            oldP: '1500',
            newP: '999',
            feats: 'عزل مائي للسطح\nحتى 100م²\nمواد عالية الجودة\nضمان 5 سنوات\nمعاينة مجانية',
            status: 'active',
            feat: false
        },
        {
            id: 2,
            name: 'باقة السطح الشاملة ⭐',
            oldP: '3500',
            newP: '2299',
            feats: 'عزل مائي وحراري\nحتى 200م²\nفوم بولي يوريثان\nضمان 10 سنوات\nمتابعة مجانية',
            status: 'active',
            feat: true
        },
        {
            id: 3,
            name: 'باقة الفيلا الكاملة 💎',
            oldP: '7000',
            newP: '4999',
            feats: 'عزل شامل للمبنى\nمساحة غير محدودة\nعزل خزانات وحمامات\nكشف تسربات مجاني\nضمان 10 سنوات\nخدمة VIP',
            status: 'active',
            feat: false
        }
    ],
    testimonials: [
        {
            id: 1,
            name: 'عبدالرحمن المطيري',
            city: 'بريدة',
            rating: 5,
            svc: 'عزل سطح فيلا',
            text: 'خدمة ممتازة جداً، حلوا مشكلة التسربات التي عانيت منها لسنوات في يوم واحد. الفريق محترف والنتيجة رائعة. أنصح بهم بشدة.',
            status: 'active'
        },
        {
            id: 2,
            name: 'سعود العنزي',
            city: 'عنيزة',
            rating: 5,
            svc: 'عزل فوم',
            text: 'قلت فاتورة الكهرباء أكثر من 35% بعد العزل الحراري. الفريق سريع ومحترف في التنفيذ. أنصح كل أهل القصيم بعزل القصيم.',
            status: 'active'
        },
        {
            id: 3,
            name: 'فهد الرشيد',
            city: 'حائل',
            rating: 5,
            svc: 'كشف تسربات',
            text: 'كشفوا التسرب بدقة بدون هدم. تعاملت مع شركات أخرى لم تحل المشكلة لكن عزل القصيم حلوها من أول مرة وبضمان.',
            status: 'active'
        },
        {
            id: 4,
            name: 'محمد الحربي',
            city: 'الرس',
            rating: 5,
            svc: 'video',
            text: '/assets/WhatsApp Video 2026-05-18 at 1.53.40 PM.mp4',
            status: 'active'
        },
        {
            id: 5,
            name: 'خالد اليوسف',
            city: 'بريدة',
            rating: 5,
            svc: 'video',
            text: '/assets/WhatsApp Video 2026-05-18 at 1.53.41 PM (1).mp4',
            status: 'active'
        }
    ],
    gallery: [
        { id: 1, title: 'عزل سطح فيلا - بريدة', cat: 'روف', type: 'after', icon: 'fa-home', img: '', color: '#0f2441' },
        { id: 2, title: 'عزل فوم - عنيزة', cat: 'فوم', type: 'after', icon: 'fa-spray-can', img: '', color: '#1b3d72' },
        { id: 3, title: 'عزل خزان مياه', cat: 'خزان', type: 'after', icon: 'fa-water', img: '', color: '#1a7a45' },
        { id: 4, title: 'عزل حمام - بريدة', cat: 'حمام', type: 'after', icon: 'fa-bath', img: '', color: '#7c3aed' },
        { id: 5, title: 'سطح قبل العزل', cat: 'روف', type: 'before', icon: 'fa-exclamation-triangle', img: '', color: '#dc2626' },
        { id: 6, title: 'سطح بعد العزل', cat: 'روف', type: 'after', icon: 'fa-check-circle', img: '', color: '#1a7a45' },
        { id: 7, title: 'عزل فوم حراري - حائل', cat: 'فوم', type: 'after', icon: 'fa-thermometer-half', img: '', color: '#e07b0f' },
        { id: 8, title: 'كشف تسرب بالأجهزة', cat: 'روف', type: 'before', icon: 'fa-search', img: '', color: '#1d4ed8' },
        { id: 9, title: 'فيديو عملية الرش بالفوم الأمريكي - حي الريان', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.41 PM.mp4', color: '#0f2441' },
        { id: 10, title: 'فيديو اختبار عزل المياه للسطح - حي الصفراء', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.42 PM (1).mp4', color: '#0f2441' },
        { id: 11, title: 'فيديو عزل خزان مياه أرضي خرساني', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.42 PM (2).mp4', color: '#0f2441' },
        { id: 12, title: 'فيديو كشف تسربات المياه بجهاز الذبذبات', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.42 PM.mp4', color: '#0f2441' },
        { id: 13, title: 'خطوات تطبيق عزل الفوم الحراري والمائي', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.43 PM (1).mp4', color: '#0f2441' },
        { id: 14, title: 'فيديو عزل فوم لأسطح هناجر ومستودعات', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.43 PM (2).mp4', color: '#0f2441' },
        { id: 15, title: 'عزل مائي شينكو فوم أمريكي ببريدة', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.43 PM.mp4', color: '#0f2441' },
        { id: 16, title: 'فيديو معالجة تشققات الأسطح قبل العزل', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.44 PM.mp4', color: '#0f2441' },
        { id: 17, title: 'فيديو اختبار ضغط شبكة المياه وكشف التسرب', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.45 PM.mp4', color: '#0f2441' },
        { id: 18, title: 'تطبيق العازل الأسمنتي للخزانات والحمامات', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.46 PM (1).mp4', color: '#0f2441' },
        { id: 19, title: 'فيديو عزل أسطح شينكو فوم مائي حراري', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.46 PM (2).mp4', color: '#0f2441' },
        { id: 20, title: 'رش البولي يوريثان فوم لحماية السطح', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.46 PM.mp4', color: '#0f2441' },
        { id: 21, title: 'فيديو اختبار عزل الأسطح بعد سقوط الأمطار', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.47 PM (1).mp4', color: '#0f2441' },
        { id: 22, title: 'فيديو كشف تسربات وعزل حمامات الفلل', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.47 PM (2).mp4', color: '#0f2441' },
        { id: 23, title: 'عزل فوم حراري للأسطح الخرسانية بعنيزة', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.47 PM.mp4', color: '#0f2441' },
        { id: 24, title: 'كشف تسربات المياه بأحدث أجهزة الصوت', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.48 PM (1).mp4', color: '#0f2441' },
        { id: 25, title: 'عزل مائي متكامل لأسطح الفلل السكنية بالرس', cat: 'فيديو', type: 'after', icon: 'fa-video', img: '/assets/WhatsApp Video 2026-05-18 at 1.53.48 PM.mp4', color: '#0f2441' }
    ],
    faqs: [
        { id: 1, q: 'كم تستغرق عملية عزل السطح؟', a: 'من يوم إلى ثلاثة أيام حسب المساحة ونوع العزل. عزل الفوم أسرع في التطبيق.' },
        { id: 2, q: 'ما هي مدة الضمان على أعمال العزل؟', a: 'نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال الفترة.' },
        { id: 3, q: 'هل يمكن العزل على السطح القديم؟', a: 'نعم، نعالج السطح وإصلاح الشقوق قبل تطبيق طبقة العزل.' },
        { id: 4, q: 'ما الفرق بين العزل المائي والحراري؟', a: 'المائي يحمي من تسربات المياه. الحراري يقلل الحرارة ويوفر في فاتورة الكهرباء. نوصي بالجمع بينهما.' },
        { id: 5, q: 'هل تقدمون معاينة مجانية؟', a: 'نعم، معاينة مجانية وعرض سعر شفاف بدون أي التزام.' },
        { id: 6, q: 'ما مناطق تغطية الخدمة؟', a: 'القصيم كاملة (بريدة، عنيزة، الرس، البكيرية، المذنب، رياض الخبراء، البدائع) وحائل ومناطق مجاورة.' }
    ],
    whyItems: [
        { id: 1, icon: 'fa-certificate', title: 'مرخصون ومعتمدون رسمياً', desc: 'شركة مرخصة من وزارة الشؤون البلدية والقروية' },
        { id: 2, icon: 'fa-shield-alt', title: 'ضمان 10 سنوات حقيقي', desc: 'ضمان موثق رسمي مع متابعة مجانية دورية' },
        { id: 3, icon: 'fa-tools', title: 'مهندسون وفنيون متخصصون', desc: 'فريق مدرب على أحدث تقنيات العزل العالمية' },
        { id: 4, icon: 'fa-leaf', title: 'مواد عالمية معتمدة', desc: 'نستخدم أفضل مواد العزل العالمية عالية الجودة' },
        { id: 5, icon: 'fa-clock', title: 'خدمة طوارئ 24 ساعة', desc: 'متاحون على مدار الساعة لخدمتك في الطوارئ' }
    ],
    steps: [
        { id: 1, num: '١', icon: 'fa-phone-alt', title: 'تواصل معنا', desc: 'اتصل أو أرسل واتساب' },
        { id: 2, num: '٢', icon: 'fa-search', title: 'معاينة مجانية', desc: 'يزورك فريقنا لتقييم السطح' },
        { id: 3, num: '٣', icon: 'fa-file-invoice', title: 'عرض سعر شفاف', desc: 'عرض تفصيلي بلا رسوم خفية' },
        { id: 4, num: '٤', icon: 'fa-layer-group', title: 'تنفيذ احترافي', desc: 'ننفذ بأعلى معايير الجودة' },
        { id: 5, num: '٥', icon: 'fa-certificate', title: 'ضمان موثق', desc: 'شهادة ضمان رسمية 10 سنوات' }
    ],
    areas: [
        {
            id: 1,
            name: 'بريدة',
            emoji: '🏙️',
            desc: 'نغطي جميع أحياء مدينة بريدة عاصمة القصيم. نفذنا مئات المشاريع في أحياء الملك فهد والنخيل والورود وغيرها.',
            kws: 'افضل شركة عزل اسطح ببريدة, أفضل شركة عزل أسطح ببريدة, افضل شركة عزل الأسطح ببريدة, افضل شركة عزل فوم ببريدة, افضل شركة عزل مائي وحراري ببريدة'
        },
        {
            id: 2,
            name: 'عنيزة',
            emoji: '🌆',
            desc: 'نخدم مدينة عنيزة وكل أحيائها. فريقنا يصل في الموعد المحدد.',
            kws: 'عزل اسطح بعنيزة, عزل مائي بعنيزة, عزل فوم بعنيزة'
        },
        {
            id: 3,
            name: 'الرس',
            emoji: '🏘️',
            desc: 'خدمات عزل احترافية لأهالي مدينة الرس وما حولها.',
            kws: 'عزل اسطح بالرس, عزل مائي بالرس'
        },
        {
            id: 4,
            name: 'حائل',
            emoji: '🏔️',
            desc: 'نقدم خدماتنا لمدينة حائل ومحافظاتها بخبرة موسعة.',
            kws: 'افضل شركة عزل اسطح بحائل, أفضل شركة عزل أسطح بحائل, أفضل شركة عزل أسطح بحايل, افضل شركة عزل الأسطح بحائل, افضل شركة عزل فوم بحائل, افضل شركة عزل مائي وحراري بحائل'
        },
        {
            id: 5,
            name: 'البكيرية',
            emoji: '🌿',
            desc: 'نغطي البكيرية وضواحيها.',
            kws: 'عزل اسطح بالبكيرية'
        },
        {
            id: 6,
            name: 'المذنب',
            emoji: '🏡',
            desc: 'فريقنا يصل إلى المذنب لتقديم أفضل خدمات العزل.',
            kws: 'عزل اسطح بالمذنب'
        },
        {
            id: 7,
            name: 'رياض الخبراء',
            emoji: '🌄',
            desc: 'خدمات عزل متكاملة لأهالي رياض الخبراء.',
            kws: 'عزل اسطح برياض الخبراء'
        },
        {
            id: 8,
            name: 'البدائع',
            emoji: '🏗️',
            desc: 'نغطي البدائع ومجمعاتها السكنية.',
            kws: 'عزل اسطح بالبدائع'
        }
    ],
    blogs: [
        {
            id: 1,
            title: 'أسباب تسرب المياه من السطح وكيفية إيقافه نهائياً',
            cat: 'عزل مائي',
            summary: 'تعرف على الأسباب الحقيقية لتسرب المياه وكيف يحلها عزل القصيم بضمان 10 سنوات',
            content: '',
            img: '',
            status: 'published',
            date: '2025-01-20'
        },
        {
            id: 2,
            title: 'الفرق بين عزل الفوم والعزل الإسفلتي: أيهما أفضل لسطحك؟',
            cat: 'أنواع العزل',
            summary: 'مقارنة شاملة بين أنواع العزل لمساعدتك في الاختيار الأنسب',
            content: '',
            img: '',
            status: 'published',
            date: '2025-01-15'
        },
        {
            id: 3,
            title: 'كيف يوفر العزل الحراري 40% من فاتورة الكهرباء في الصيف',
            cat: 'توفير الطاقة',
            summary: 'دراسة عملية عن أثر العزل الحراري على استهلاك الكهرباء في القصيم',
            content: '',
            img: '',
            status: 'published',
            date: '2025-01-10'
        }
    ],
    contact: {
        ph: '0550000000',
        ph2: '',
        wa: '966550000000',
        wm: 'السلام عليكم، أود الاستفسار عن خدمات عزل القصيم',
        em: 'info@azlalqassim.com',
        hr: 'السبت - الخميس: 7ص - 10م',
        ad: 'بريدة، منطقة القصيم، المملكة العربية السعودية',
        mp: '',
        sn: '',
        ig: '',
        tw: '',
        yt: '',
        fb: '',
        tt: ''
    },
    hero: {
        kw: 'القصيم • بريدة • عنيزة • الرس • حائل',
        h1: 'أفضل شركة',
        sp: 'عزل أسطح بالقصيم',
        why_img: '',
        d: 'متخصصون في عزل الأسطح مائياً وحرارياً باستخدام أحدث تقنيات الفوم البولي يوريثان. نحمي منزلك من التسربات والحرارة بضمان حقيقي يصل إلى 10 سنوات.',
        c1: 'احصل على عرض مجاني',
        c2: 'تواصل الآن',
        s1: '+800',
        s1l: 'مشروع منجز',
        s2: '10',
        s2l: 'سنوات ضمان',
        s3: '+10',
        s3l: 'سنوات خبرة',
        ct: 'هل تعاني من تسربات المياه أو الحرارة الشديدة؟',
        cd: 'تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر غير ملزم'
    },
    hdr: {
        nm: 'عزل القصيم',
        sb: 'أفضل شركة عزل أسطح بالقصيم',
        wa: 'واتساب',
        cta: 'احصل على عرض'
    },
    ftr: {
        d: 'شركة متخصصة في عزل الأسطح مائياً وحرارياً في القصيم وبريدة وحائل. ضمان حقيقي حتى 10 سنوات.',
        c: '© 2025 عزل القصيم. جميع الحقوق محفوظة.'
    }
};

// Initialize local storage database with seed values if empty
function initDB() {
    // Force clear older cached tables to load the new video seed entries
    if (DB.g('db_ver_v7') === null) {
        localStorage.removeItem('azq3_gallery');
        localStorage.removeItem('azq3_testimonials');
        DB.s('db_ver_v7', true);
    }
    
    Object.keys(INIT).forEach(key => {
        if (DB.g(key) === null) {
            DB.s(key, INIT[key]);
        }
    });
}

// Utility selectors
const $ = (id) => document.getElementById(id);
const sT = (id, val) => { const el = $(id); if (el) el.textContent = val || ''; };
const sH = (id, href) => { const el = $(id); if (el) el.href = href || '#'; };

// --- Edit Modals Meta Configuration ---
const MD = {
    ms: {
        t: 'الخدمة',
        ic: 'fa-tools',
        f: [
            { id: 'nm', l: 'الاسم *', t: 'text', p: 'عزل الأسطح المائي' },
            { id: 'ic', l: 'الأيقونة (fa-tint...)', t: 'text', p: 'fa-tint' },
            { id: 'sh', l: 'وصف مختصر', t: 'text', p: 'وصف البطاقة' },
            { id: 'ds', l: 'وصف تفصيلي', t: 'textarea', p: 'وصف شامل...' },
            { id: 'ft', l: 'المميزات (كل سطر ميزة)', t: 'textarea', p: 'ضمان 10 سنوات\nمواد عالمية' },
            { id: 'im', l: 'صورة الخدمة (رفع من الجهاز)', t: 'image' },
            { id: 'st', l: 'الحالة', t: 'sel', o: [['active', '✅ نشط'], ['hidden', '🚫 مخفي']] }
        ],
        sv: 'sSvc',
        k: 'services',
        km: { nm: 'name', ic: 'icon', sh: 'short', ds: 'desc', ft: 'feats', im: 'img', st: 'status' }
    },
    mo: {
        t: 'العرض',
        ic: 'fa-percent',
        f: [
            { id: 'nm', l: 'اسم الباقة *', t: 'text', p: 'باقة شاملة' },
            { id: 'op', l: 'السعر القديم', t: 'number', p: '3500' },
            { id: 'np', l: 'السعر الجديد *', t: 'number', p: '2299' },
            { id: 'ft', l: 'المميزات (كل سطر)', t: 'textarea', p: 'عزل مائي\nضمان 10 سنوات' },
            { id: 'fe', l: 'تمييز الباقة', t: 'sel', o: [['false', 'لا'], ['true', 'نعم']] },
            { id: 'st', l: 'الحالة', t: 'sel', o: [['active', '✅ نشط'], ['hidden', '🚫 مخفي']] }
        ],
        sv: 'sOff',
        k: 'offers',
        km: { nm: 'name', op: 'oldP', np: 'newP', ft: 'feats', fe: 'feat', st: 'status' }
    },
    mw: {
        t: 'ميزة لماذا نحن',
        ic: 'fa-award',
        f: [
            { id: 'im', l: 'صورة الميزة من جهازك (اختياري)', t: 'image' },
            { id: 'ic', l: 'الأيقونة (إذا لم توجد صورة)', t: 'text', p: 'fa-shield-alt' },
            { id: 'ti', l: 'العنوان *', t: 'text', p: 'ضمان 10 سنوات' },
            { id: 'ds', l: 'الوصف', t: 'text', p: 'ضمان موثق رسمي' }
        ],
        sv: 'sWhy',
        k: 'whyItems',
        km: { ic: 'icon', ti: 'title', ds: 'desc', im: 'img' }
    },
    mst: {
        t: 'خطوة العمل',
        ic: 'fa-list-ol',
        f: [
            { id: 'nu', l: 'الرقم', t: 'text', p: '١' },
            { id: 'im', l: 'صورة الخطوة من جهازك (اختياري)', t: 'image' },
            { id: 'ic', l: 'الأيقونة (إذا لم توجد صورة)', t: 'text', p: 'fa-phone' },
            { id: 'ti', l: 'العنوان *', t: 'text', p: 'تواصل معنا' },
            { id: 'ds', l: 'الوصف', t: 'text', p: 'اتصل أو واتساب' }
        ],
        sv: 'sStep',
        k: 'steps',
        km: { nu: 'num', ic: 'icon', ti: 'title', ds: 'desc', im: 'img' }
    },
    ma: {
        t: 'منطقة الخدمة',
        ic: 'fa-map-marker-alt',
        f: [
            { id: 'nm', l: 'الاسم *', t: 'text', p: 'بريدة' },
            { id: 'em', l: 'الإيموجي', t: 'text', p: '🏙️' },
            { id: 'ds', l: 'الوصف', t: 'textarea', p: 'وصف الخدمة...' },
            { id: 'kw', l: 'الكلمات المفتاحية', t: 'textarea', p: 'عزل اسطح ببريدة...' }
        ],
        sv: 'sArea',
        k: 'areas',
        km: { nm: 'name', em: 'emoji', ds: 'desc', kw: 'kws' }
    },
    mt: {
        t: 'رأي العميل',
        ic: 'fa-star',
        f: [
            { id: 'nm', l: 'الاسم *', t: 'text', p: 'عبدالرحمن المطيري' },
            { id: 'ci', l: 'المدينة', t: 'text', p: 'بريدة' },
            { id: 'rt', l: 'التقييم', t: 'sel', o: [['5', '⭐⭐⭐⭐⭐'], ['4', '⭐⭐⭐⭐'], ['3', '⭐⭐⭐']] },
            { id: 'sv', l: 'الخدمة', t: 'text', p: 'عزل سطح فيلا' },
            { id: 'tx', l: 'نص الرأي *', t: 'textarea', p: 'رأي العميل...' },
            { id: 'st', l: 'الحالة', t: 'sel', o: [['active', '✅ ظاهر'], ['hidden', '🚫 مخفي']] }
        ],
        sv: 'sTest',
        k: 'testimonials',
        km: { nm: 'name', ci: 'city', rt: 'rating', sv: 'svc', tx: 'text', st: 'status' }
    },
    mf: {
        t: 'السؤال الشائع',
        ic: 'fa-question',
        f: [
            { id: 'q', l: 'السؤال *', t: 'text', p: 'كم تستغرق عملية العزل؟' },
            { id: 'a', l: 'الإجابة *', t: 'textarea', p: 'الإجابة...' }
        ],
        sv: 'sFaq',
        k: 'faqs',
        km: { q: 'q', a: 'a' }
    },
    mg: {
        t: 'صورة في المعرض',
        ic: 'fa-image',
        f: [
            { id: 'ti', l: 'العنوان *', t: 'text', p: 'عزل سطح - بريدة' },
            { id: 'ca', l: 'التصنيف', t: 'text', p: 'روف' },
            { id: 'im', l: 'صورة المعرض من جهازك', t: 'image' },
            { id: 'ic', l: 'أيقونة (إذا لم توجد صورة)', t: 'text', p: 'fa-home' },
            { id: 'cl', l: 'لون الخلفية', t: 'text', p: '#0f2441' },
            { id: 'ty', l: 'النوع', t: 'sel', o: [['after', 'بعد العزل'], ['before', 'قبل العزل']] }
        ],
        sv: 'sGal',
        k: 'gallery',
        km: { ti: 'title', ca: 'cat', im: 'img', ic: 'icon', cl: 'color', ty: 'type' }
    },
    mb: {
        t: 'المقال',
        ic: 'fa-blog',
        f: [
            { id: 'ti', l: 'العنوان *', t: 'text', p: 'عنوان المقال' },
            { id: 'ca', l: 'التصنيف', t: 'text', p: 'عزل مائي' },
            { id: 'su', l: 'الملخص', t: 'text', p: 'ملخص قصير' },
            { id: 'im', l: 'صورة الغلاف من جهازك', t: 'image' },
            { id: 'co', l: 'المحتوى', t: 'textarea', p: 'محتوى المقال...', r: 5 },
            { id: 'st', l: 'الحالة', t: 'sel', o: [['published', '✅ منشور'], ['draft', '📝 مسودة']] }
        ],
        sv: 'sBlog',
        k: 'blogs',
        km: { ti: 'title', ca: 'cat', su: 'summary', im: 'img', co: 'content', st: 'status' }
    },
    mm: {
        t: 'عنصر المنيو',
        ic: 'fa-bars',
        f: [
            { id: 'nm', l: 'الاسم *', t: 'text', p: 'الرئيسية' },
            {
                id: 'pg', l: 'الصفحة', t: 'sel', o: [
                    ['home', 'الرئيسية'],
                    ['about', 'من نحن'],
                    ['services', 'خدماتنا'],
                    ['areas', 'مناطق الخدمة'],
                    ['gallery', 'معرض الأعمال'],
                    ['blog', 'المقالات'],
                    ['contact', 'تواصل معنا']
                ]
            },
            { id: 'vi', l: 'الظهور', t: 'sel', o: [['true', '✅ مرئي'], ['false', '🚫 مخفي']] }
        ],
        sv: 'sMenu',
        k: 'menu',
        km: { nm: 'name', pg: 'page', vi: 'v' }
    }
};

let CM = null;
let CEI = null;

// Open dynamic admin creation/editing modal
function oM(mid, eid = null) {
    CM = mid;
    CEI = eid;
    const d = MD[mid];
    if (!d) return;
    const isE = eid !== null;
    const fh = d.f.map(f => {
        const r = f.r || 3;
        let inp = f.t === 'sel'
            ? `<select id="mf_${f.id}">${f.o.map(o => `<option value="${o[0]}">${o[1]}</option>`).join('')}</select>`
            : f.t === 'textarea'
                ? `<textarea id="mf_${f.id}" placeholder="${f.p || ''}" rows="${r}"></textarea>`
                : f.t === 'image'
                    ? `
                    <div class="afg-upload-box" id="upbox_${f.id}" style="border:2px dashed var(--sl2);padding:14px;border-radius:8px;text-align:center;background:rgba(0,0,0,0.02);position:relative">
                        <input type="hidden" id="mf_${f.id}" value="">
                        <input type="file" id="file_${f.id}" accept="image/*" style="display:none" onchange="uploadFileAction('${f.id}')">
                        <div id="prev_${f.id}" style="display:none;margin-bottom:10px">
                            <img id="img_${f.id}" src="" style="max-height:100px;border-radius:6px;box-shadow:0 2px 8px rgba(0,0,0,0.1)">
                            <button type="button" class="ab nb" style="background:#dc2626;color:#fff;padding:4px 8px;font-size:11px;margin-top:6px;border-radius:4px" onclick="clearUploadField('${f.id}')"><i class="fas fa-trash-alt"></i> حذف</button>
                        </div>
                        <div id="prompt_${f.id}">
                            <i class="fas fa-cloud-upload-alt" style="font-size:28px;color:var(--cc);margin-bottom:8px"></i>
                            <div style="font-size:12px;font-weight:700;color:var(--nv)">اسحب أو اختر صورة من جهازك</div>
                            <div style="font-size:10px;color:#888;margin-top:4px">PNG, JPG, WEBP (بحد أقصى 10MB)</div>
                            <button type="button" class="ab nb" style="background:var(--cc);color:#fff;margin-top:8px;padding:6px 12px;font-size:11px" onclick="$('file_${f.id}').click()"><i class="fas fa-folder-open"></i> تصفح الجهاز</button>
                        </div>
                        <div id="loader_${f.id}" style="display:none;padding:10px">
                            <i class="fas fa-spinner fa-spin" style="font-size:24px;color:var(--cc)"></i>
                            <div style="font-size:11px;margin-top:6px;color:#666">جاري رفع الصورة...</div>
                        </div>
                    </div>`
                    : `<input type="${f.t}" id="mf_${f.id}" placeholder="${f.p || ''}">`;
        return `<div class="afg"><label>${f.l}</label>${inp}</div>`;
    }).join('');

    const modalContainer = $('MC');
    if (modalContainer) {
        modalContainer.innerHTML = `
            <div class="amo open" id="AM" onclick="if(event.target===this)cM()">
                <div class="ambox">
                    <div class="amhd">
                        <h3><span class="ammic"><i class="fas ${d.ic}"></i></span>${isE ? 'تعديل' : 'إضافة'} ${d.t}</h3>
                        <button class="amcl" onclick="cM()"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="ambd">${fh}</div>
                    <div class="amft">
                        <button class="ab sc" onclick="cM()">إلغاء</button>
                        <button class="ab am" onclick="${d.sv}()"><i class="fas fa-save"></i>${isE ? 'حفظ التعديل' : 'إضافة'}</button>
                    </div>
                </div>
            </div>`;
    }

    if (isE) {
        const tbl = d.k;
        const item = (DB.g(tbl) || []).find(x => x.id == eid);
        if (item && d.km) {
            d.f.forEach(f => {
                const el = $('mf_' + f.id);
                if (!el) return;
                const k = d.km[f.id];
                if (k && item[k] !== undefined) {
                    el.value = String(item[k]);
                    if (f.t === 'image' && el.value && el.value.trim()) {
                        const prevEl = $(`prev_${f.id}`);
                        const promptEl = $(`prompt_${f.id}`);
                        const imgEl = $(`img_${f.id}`);
                        if (prevEl && promptEl && imgEl) {
                            promptEl.style.display = 'none';
                            prevEl.style.display = 'block';
                            imgEl.src = el.value;
                        }
                    }
                }
            });
        }
    }
}

// Close dynamic admin modal
function cM() {
    const modalContainer = $('MC');
    if (modalContainer) modalContainer.innerHTML = '';
}

// AJAX Upload Actions for dynamic CRUD fields
async function uploadFileAction(fieldId) {
    const fileInput = $('file_' + fieldId);
    if (!fileInput || !fileInput.files.length) return;
    
    const file = fileInput.files[0];
    
    // UI states
    $(`prompt_${fieldId}`).style.display = 'none';
    $(`loader_${fieldId}`).style.display = 'block';
    
    const formData = new FormData();
    formData.append('image', file);
    
    try {
        const res = await fetch('/admin/upload', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': getCsrfToken() },
            body: formData
        });
        if (res.ok) {
            const result = await res.json();
            
            // Set value to hidden input
            $('mf_' + fieldId).value = result.url;
            
            // Show preview
            $(`loader_${fieldId}`).style.display = 'none';
            $(`prev_${fieldId}`).style.display = 'block';
            $(`img_${fieldId}`).src = result.url;
            sN('✅ تم رفع الصورة من جهازك بنجاح');
        } else {
            sN('❌ فشل رفع الصورة، يرجى التحقق من الامتداد والحجم', 'err');
            clearUploadField(fieldId);
        }
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
        clearUploadField(fieldId);
    }
}

function clearUploadField(fieldId) {
    $('mf_' + fieldId).value = '';
    const fileInput = $('file_' + fieldId);
    if (fileInput) fileInput.value = '';
    
    $(`prev_${fieldId}`).style.display = 'none';
    $(`loader_${fieldId}`).style.display = 'none';
    $(`prompt_${fieldId}`).style.display = 'block';
}

// AJAX Upload Actions specifically for Why Choose Us main image in Hero Panel
async function uploadWhyImage() {
    const fileInput = $('file_why');
    if (!fileInput || !fileInput.files.length) return;
    
    const file = fileInput.files[0];
    
    $('prompt_why').style.display = 'none';
    $('loader_why').style.display = 'block';
    
    const formData = new FormData();
    formData.append('image', file);
    
    try {
        const res = await fetch('/admin/upload', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': getCsrfToken() },
            body: formData
        });
        if (res.ok) {
            const result = await res.json();
            $('hpwhyimg').value = result.url;
            
            $('loader_why').style.display = 'none';
            $('prev_why').style.display = 'block';
            $('img_why').src = result.url;
            sN('✅ تم رفع صورة لماذا تختارنا بنجاح');
        } else {
            sN('❌ فشل رفع الصورة، يرجى التحقق من الامتداد والحجم', 'err');
            clearWhyImage();
        }
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
        clearWhyImage();
    }
}

function clearWhyImage() {
    $('hpwhyimg').value = '';
    const fileInput = $('file_why');
    if (fileInput) fileInput.value = '';
    
    $('prev_why').style.display = 'none';
    $('loader_why').style.display = 'none';
    $('prompt_why').style.display = 'block';
}

async function uploadAboutImage() {
    const fileInput = $('file_abt');
    if (!fileInput || !fileInput.files.length) return;
    
    const file = fileInput.files[0];
    
    $('prompt_abt').style.display = 'none';
    $('loader_abt').style.display = 'block';
    
    const formData = new FormData();
    formData.append('image', file);
    
    try {
        const res = await fetch('/admin/upload', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': getCsrfToken() },
            body: formData
        });
        if (res.ok) {
            const result = await res.json();
            $('abtimg').value = result.url;
            
            $('loader_abt').style.display = 'none';
            $('prev_abt').style.display = 'block';
            $('img_abt').src = result.url;
            sN('✅ تم رفع صورة من نحن بنجاح');
        } else {
            sN('❌ فشل رفع الصورة، يرجى التحقق من الامتداد والحجم', 'err');
            clearAboutImage();
        }
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
        clearAboutImage();
    }
}

function clearAboutImage() {
    $('abtimg').value = '';
    const fileInput = $('file_abt');
    if (fileInput) fileInput.value = '';
    
    $('prev_abt').style.display = 'none';
    $('loader_abt').style.display = 'none';
    $('prompt_abt').style.display = 'block';
}

// Get value from input fields inside the dynamic modal
function gv(id) {
    const el = $('mf_' + id);
    return el ? el.value.trim() : '';
}

// Global CRUD save helper
async function saveItem(tbl, data) {
    const payload = CEI ? { id: CEI, ...data } : data;
    try {
        const res = await fetch('/admin/content/' + tbl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(payload)
        });
        if (res.ok) {
            const result = await res.json();
            let list = DB.g(tbl) || [];
            if (CEI) {
                const idx = list.findIndex(x => x.id == CEI);
                if (idx > -1) list[idx] = result.item;
            } else {
                list.push(result.item);
            }
            DB.s(tbl, list);
            cM();
            rAll();
            
            // Premium SweetAlert2 Dialog
            Swal.fire({
                title: CEI ? 'تم التحديث بنجاح!' : 'تمت الإضافة بنجاح!',
                text: 'تم حفظ كافة التعديلات ومزامنتها في قاعدة البيانات فوراً.',
                icon: 'success',
                timer: 2200,
                showConfirmButton: false,
                direction: 'rtl'
            });
        } else {
            sN('❌ فشل حفظ التعديلات في قاعدة البيانات', 'err');
        }
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
    }
}

// CRUD actions
function sSvc() {
    const d = {
        name: gv('nm'),
        icon: gv('ic') || 'fa-tools',
        short: gv('sh'),
        desc: gv('ds'),
        feats: gv('ft'),
        img: gv('im'),
        status: gv('st')
    };
    if (!d.name) { sN('يرجى إدخال الاسم', 'err'); return; }
    saveItem('services', d);
}

function sOff() {
    const d = {
        name: gv('nm'),
        oldP: gv('op'),
        newP: gv('np'),
        feats: gv('ft'),
        feat: gv('fe') === 'true',
        status: gv('st')
    };
    if (!d.name) { sN('يرجى إدخال الاسم', 'err'); return; }
    saveItem('offers', d);
}

function sWhy() {
    const d = {
        img: gv('im'),
        icon: gv('ic') || 'fa-check',
        title: gv('ti'),
        desc: gv('ds')
    };
    if (!d.title) { sN('يرجى إدخال العنوان', 'err'); return; }
    saveItem('whyItems', d);
}

function sStep() {
    const d = {
        num: gv('nu'),
        img: gv('im'),
        icon: gv('ic') || 'fa-star',
        title: gv('ti'),
        desc: gv('ds')
    };
    if (!d.title) { sN('يرجى إدخال العنوان', 'err'); return; }
    saveItem('steps', d);
}

function sArea() {
    const d = {
        name: gv('nm'),
        emoji: gv('em') || '📍',
        desc: gv('ds'),
        kws: gv('kw')
    };
    if (!d.name) { sN('يرجى إدخال الاسم', 'err'); return; }
    saveItem('areas', d);
}

function sTest() {
    const d = {
        name: gv('nm'),
        city: gv('ci'),
        rating: parseInt(gv('rt')) || 5,
        svc: gv('sv'),
        text: gv('tx'),
        status: gv('st')
    };
    if (!d.name) { sN('يرجى إدخال الاسم', 'err'); return; }
    saveItem('testimonials', d);
}

function sFaq() {
    const d = {
        q: gv('q'),
        a: gv('a')
    };
    if (!d.q) { sN('يرجى إدخال السؤال', 'err'); return; }
    saveItem('faqs', d);
}

function sGal() {
    const d = {
        title: gv('ti'),
        cat: gv('ca'),
        img: gv('im'),
        icon: gv('ic') || 'fa-image',
        color: gv('cl') || '#0f2441',
        type: gv('ty')
    };
    if (!d.title) { sN('يرجى إدخال العنوان', 'err'); return; }
    saveItem('gallery', d);
}

function sBlog() {
    const d = {
        title: gv('ti'),
        cat: gv('ca'),
        summary: gv('su'),
        img: gv('im'),
        content: gv('co'),
        status: gv('st'),
        date: new Date().toLocaleDateString('ar-SA')
    };
    if (!d.title) { sN('يرجى إدخال العنوان', 'err'); return; }
    saveItem('blogs', d);
}

function sMenu() {
    const d = {
        name: gv('nm'),
        page: gv('pg'),
        v: gv('vi') === 'true'
    };
    if (!d.name) { sN('يرجى إدخال الاسم', 'err'); return; }
    saveItem('menu', d);
}

// Delete item
// Delete item with premium SweetAlert2 confirmation
function dI(tbl, id, label) {
    Swal.fire({
        title: 'هل أنت متأكد من الحذف؟',
        text: `سيتم حذف "${label}" نهائياً من النظام.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7a99',
        confirmButtonText: 'نعم، احذف الآن',
        cancelButtonText: 'إلغاء',
        direction: 'rtl'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const res = await fetch(`/admin/content/${tbl}/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': getCsrfToken() }
                });
                if (res.ok) {
                    DB.del(tbl, id);
                    rAll();
                    Swal.fire({
                        title: 'تم الحذف!',
                        text: `تم حذف "${label}" بنجاح.`,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                        direction: 'rtl'
                    });
                } else {
                    sN('❌ فشل الحذف من قاعدة البيانات', 'err');
                }
            } catch (e) {
                console.error(e);
                sN('❌ خطأ في الاتصال بالخادم', 'err');
            }
        }
    });
}

// Re-arrange menu items order
async function mvMn(id, dir) {
    const list = DB.g('menu') || [];
    const i = list.findIndex(x => x.id == id);
    const j = i + dir;
    if (j < 0 || j >= list.length) return;
    [list[i], list[j]] = [list[j], list[i]];
    DB.s('menu', list);
    rAll();

    try {
        await fetch('/admin/menu/reorder', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify({ ids: list.map(x => x.id) })
        });
    } catch (e) {
        console.error(e);
    }
}

// --- Dynamic Site Customization (Admin Save Actions) ---
async function saveHero() {
    const d = {
        kw: $('hpkw').value,
        h1: $('hph1').value,
        sp: $('hpsp').value,
        why_img: $('hpwhyimg').value,
        d: $('hpd').value,
        c1: $('hpc1').value,
        c2: $('hpc2').value,
        s1: $('hps1').value,
        s1l: $('hps1l').value,
        s2: $('hps2').value,
        s2l: $('hps2l').value,
        s3: $('hps3').value,
        s3l: $('hps3l').value,
        ct: $('hpct').value,
        cd: $('hpcd').value
    };
    DB.s('hero', d);
    apHero(d);
    
    try {
        await fetch('/admin/settings/hero', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(d)
        });
        sN('✅ تم تطبيق وحفظ البانر على الموقع');
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
    }
}

function apHero(d) {
    if (!d) return;
    sT('hKW', d.kw);
    sT('hH1', d.h1);
    sT('hSpn', d.sp);
    sT('hDsc', d.d);
    sT('hC1', d.c1);
    sT('hC2', d.c2);
    sT('hs1', d.s1);
    sT('hs1l', d.s1l);
    sT('hs2', d.s2);
    sT('hs2l', d.s2l);
    sT('hs3', d.s3);
    sT('hs3l', d.s3l);
    sT('ctaT', d.ct);
    sT('ctaD', d.cd);

    const whyImgEl = $('whyImg');
    if (whyImgEl) {
        if (d.why_img && d.why_img.trim()) {
            whyImgEl.innerHTML = `<img src="${d.why_img.trim()}" style="width:100%;height:100%;object-fit:cover">`;
        } else {
            whyImgEl.innerHTML = `<i class="fas fa-layer-group"></i><span>عزل الأسطح الاحترافي</span>`;
        }
    }
}

function ldHero() {
    const d = DB.g('hero') || INIT.hero;
    const fields = {
        kw: 'hpkw', h1: 'hph1', sp: 'hpsp', why_img: 'hpwhyimg', d: 'hpd', c1: 'hpc1', c2: 'hpc2',
        s1: 'hps1', s1l: 'hps1l', s2: 'hps2', s2l: 'hps2l', s3: 'hps3', s3l: 'hps3l',
        ct: 'hpct', cd: 'hpcd'
    };
    Object.entries(fields).forEach(([k, eid]) => {
        const el = $(eid);
        if (el && d[k] !== undefined) el.value = d[k];
    });

    if (d.why_img && d.why_img.trim()) {
        const prevEl = $('prev_why');
        const promptEl = $('prompt_why');
        const imgEl = $('img_why');
        if (prevEl && promptEl && imgEl) {
            promptEl.style.display = 'none';
            prevEl.style.display = 'block';
            imgEl.src = d.why_img;
        }
    } else {
        clearWhyImage();
    }
}

function ldAbout() {
    const d = DB.g('about') || {
        img: '',
        icon: 'fa-building',
        title: 'فريق عزل القصيم',
        text1: 'تأسست شركة عزل القصيم لتكون الشريك الأمين لأصحاب المنازل في منطقة القصيم وبريدة وحائل في مجال العزل المائي والحراري للأسطح والخزانات الحمامات.',
        text2: 'نستخدم أحدث تقنيات العزل العالمية: الفوم البولي يوريثان، العزل الإسفلتي، السيليكون المائي، وأغشية البيتومين المعدنية. فريقنا مدرب ومعتمد.',
        text3: 'نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال فترة الضمان.'
    };
    
    const fields = {
        title: 'abttitle', icon: 'abticon', img: 'abtimg',
        text1: 'abtt1', text2: 'abtt2', text3: 'abtt3'
    };
    Object.entries(fields).forEach(([k, eid]) => {
        const el = $(eid);
        if (el && d[k] !== undefined) el.value = d[k];
    });

    if (d.img && d.img.trim()) {
        const prevEl = $('prev_abt');
        const promptEl = $('prompt_abt');
        const imgEl = $('img_abt');
        if (prevEl && promptEl && imgEl) {
            promptEl.style.display = 'none';
            prevEl.style.display = 'block';
            imgEl.src = d.img;
        }
    } else {
        clearAboutImage();
    }
}

async function saveAbout() {
    const d = {
        title: $('abttitle').value,
        icon: $('abticon').value,
        img: $('abtimg').value,
        text1: $('abtt1').value,
        text2: $('abtt2').value,
        text3: $('abtt3').value
    };
    DB.s('about', d);

    // Apply immediately to frontend view
    const abtImgEl = $('abtImg');
    if (abtImgEl) {
        if (d.img && d.img.trim()) {
            abtImgEl.style.background = 'none';
            abtImgEl.style.border = 'none';
            abtImgEl.style.padding = '0';
            abtImgEl.style.width = '100%';
            abtImgEl.style.height = '100%';
            abtImgEl.style.minHeight = '350px';
            abtImgEl.innerHTML = `<img src="${d.img.trim()}" style="width:100%;height:100%;object-fit:cover;border-radius:var(--r);box-shadow:0 8px 32px rgba(15,36,65,0.15)">`;
        } else {
            abtImgEl.style.background = '';
            abtImgEl.style.border = '';
            abtImgEl.style.padding = '';
            abtImgEl.style.width = '';
            abtImgEl.style.height = '';
            abtImgEl.style.minHeight = '';
            abtImgEl.innerHTML = `<i class="fas ${d.icon || 'fa-building'}"></i><span>${d.title || 'فريق عزل القصيم'}</span>`;
        }
    }

    try {
        const res = await fetch('/admin/settings/about', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken()
            },
            body: JSON.stringify({ value: d })
        });
        if (res.ok) {
            sN('✅ تم حفظ وتطبيق إعدادات من نحن بنجاح');
        } else {
            sN('❌ فشل حفظ الإعدادات في خادم قاعدة البيانات', 'err');
        }
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم عند الحفظ', 'err');
    }
}

async function saveHdr() {
    const d = {
        nm: $('hnm').value,
        sb: $('hsb').value,
        wa: $('hwa').value,
        cta: $('hct').value
    };
    DB.s('hdr', d);
    apHdr(d);
    
    try {
        await fetch('/admin/settings/hdr', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(d)
        });
        sN('✅ تم حفظ الهيدر في قاعدة البيانات');
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
    }
}

function apHdr(d) {
    if (!d) return;
    sT('sNm', d.nm);
    sT('sSb', d.sb);
    sT('hWaT', d.wa);
    sT('hCTA', d.cta);
    sT('ftNm', d.nm);
}

function ldHdr() {
    const d = DB.g('hdr') || INIT.hdr;
    const fields = { nm: 'hnm', sb: 'hsb', wa: 'hwa', cta: 'hct' };
    Object.entries(fields).forEach(([k, eid]) => {
        const el = $(eid);
        if (el && d[k]) el.value = d[k];
    });
}

async function saveFtr() {
    const d = {
        d: $('ftd').value,
        c: $('ftc').value
    };
    DB.s('ftr', d);
    apFtr(d);
    
    try {
        await fetch('/admin/settings/ftr', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(d)
        });
        sN('✅ تم حفظ الفوتر في قاعدة البيانات');
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
    }
}

function apFtr(d) {
    if (!d) return;
    sT('ftDs', d.d);
    sT('ftCp', d.c);
}

function ldFtr() {
    const d = DB.g('ftr') || INIT.ftr;
    const e1 = $('ftd'); if (e1) e1.value = d.d || '';
    const e2 = $('ftc'); if (e2) e2.value = d.c || '';
}

async function saveCS() {
    const d = {
        ph: $('cs-p').value,
        ph2: $('cs-p2').value,
        wa: $('cs-wa').value,
        wm: $('cs-wm').value,
        em: $('cs-em').value,
        hr: $('cs-hr').value,
        ad: $('cs-ad').value,
        mp: $('cs-mp').value,
        sn: $('cs-sn').value,
        ig: $('cs-ig').value,
        tw: $('cs-tw').value,
        yt: $('cs-yt').value,
        fb: $('cs-fb').value,
        tt: $('cs-tt').value
    };
    DB.s('contact', d);
    apCS(d);
    
    try {
        await fetch('/admin/settings/contact', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(d)
        });
        sN('✅ تم تطبيق وحفظ بيانات التواصل');
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
    }
}

function apCS(cs) {
    if (!cs) return;
    const wa = `https://wa.me/${cs.wa || '966550000000'}?text=${encodeURIComponent(cs.wm || '')}`;
    const ph = `tel:${cs.ph || ''}`;

    sT('tPhT', cs.ph || '');
    sT('ftPhT', ' ' + (cs.ph || ''));
    sT('ftEmT', ' ' + (cs.em || ''));
    sT('ftAdT', ' ' + (cs.ad || ''));
    sT('ftHrT', ' ' + (cs.hr || ''));
    sT('tHr', cs.hr || '');

    sT('ctP', cs.ph || '');
    sT('ctWa2', cs.ph || '');
    sT('ctEm', cs.em || '');
    sT('ctAd', cs.ad || '');
    sT('ctHr', cs.hr || '');

    ['hWa', 'hWaB', 'ctaWa', 'flWa', 'abtWa', 'svcWa', 'ftWa', 'tWa'].forEach(id => sH(id, wa));
    ['flPh', 'ctaPh', 'svcPh', 'ftPh', 'tPh'].forEach(id => sH(id, ph));

    sH('ctP', ph);
    sH('ctWa2', wa);
    sH('ctEm', 'mailto:' + (cs.em || ''));

    const socialPlatforms = {
        tSn: 'sn', tIg: 'ig', tTw: 'tw',
        ftSn: 'sn', ftIg: 'ig', ftTw: 'tw', ftYt: 'yt', ftFb: 'fb', ftTt: 'tt'
    };
    Object.entries(socialPlatforms).forEach(([id, key]) => sH(id, cs[key] || '#'));

    const mapWrapper = $('mapWr');
    if (mapWrapper && cs.mp && cs.mp.includes('maps')) {
        mapWrapper.innerHTML = `<iframe src="${cs.mp}" width="100%" height="170" frameborder="0" style="border-radius:var(--r)" allowfullscreen></iframe>`;
    }
}

function ldCS() {
    const d = DB.g('contact') || INIT.contact;
    const fields = {
        ph: 'cs-p', ph2: 'cs-p2', wa: 'cs-wa', wm: 'cs-wm', em: 'cs-em', hr: 'cs-hr', ad: 'cs-ad',
        mp: 'cs-mp', sn: 'cs-sn', ig: 'cs-ig', tw: 'cs-tw', yt: 'cs-yt', fb: 'cs-fb', tt: 'cs-tt'
    };
    Object.entries(fields).forEach(([k, eid]) => {
        const el = $(eid);
        if (el && d[k] !== undefined) el.value = d[k] || '';
    });
}

function saveSEO() {
    const title = $('seo-t').value;
    if (title) document.title = title;
    sN('✅ تم حفظ SEO');
}

function apC(v, c) {
    document.documentElement.style.setProperty(v, c);
}

async function saveCls() {
    const d = {
        nv: $('cl-nv').value,
        am: $('cl-am').value,
        gr: $('cl-gr').value
    };
    DB.s('colors', d);
    
    try {
        await fetch('/admin/settings/colors', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(d)
        });
        sN('✅ تم حفظ الألوان في قاعدة البيانات');
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالخادم', 'err');
    }
}

function ldCls() {
    const d = DB.g('colors');
    if (!d) return;
    if (d.nv) {
        apC('--nv', d.nv);
        const e = $('cl-nv'); if (e) { e.value = d.nv; sT('cl-nv-v', d.nv); }
    }
    if (d.am) {
        apC('--am', d.am);
        const e = $('cl-am'); if (e) { e.value = d.am; sT('cl-am-v', d.am); }
    }
    if (d.gr) {
        apC('--gr', d.gr);
        const e = $('cl-gr'); if (e) { e.value = d.gr; sT('cl-gr-v', d.gr); }
    }
}

// --- Front-end Page Renders ---
let CF = 'photos';
let CP = 'home';

function renderNav() {
    const list = (DB.g('menu') || []).filter(x => x.v);
    const navHtml = list.map(x => `<a onclick="nTo('${x.page}')" class="${CP === x.page ? 'act' : ''}">${x.name}</a>`).join('');

    const mainMenu = $('MN');
    if (mainMenu) mainMenu.innerHTML = navHtml;

    const mobMenu = $('MbN');
    if (mobMenu) mobMenu.innerHTML = list.map(x => `<a onclick="nTo('${x.page}');togMob(false)">${x.name}</a>`).join('');

    const footMenu = $('ftPgs');
    if (footMenu) footMenu.innerHTML = list.map(x => `<li><a onclick="nTo('${x.page}')">${x.name}</a></li>`).join('');
}

function renderSvcs(id) {
    const list = (DB.g('services') || []).filter(x => x.status === 'active');
    const el = $(id);
    if (!el) return;

    el.innerHTML = list.map(x => `
        <div class="svc-c" onclick="openSvc(${x.id})">
            ${x.img && x.img.startsWith('http') ? `<img src="${x.img}" class="svc-img" onerror="this.style.display='none'">` : ''} 
            <div class="svc-ic"><i class="fas ${x.icon || 'fa-tools'}"></i></div>
            <h3>${x.name}</h3>
            <p>${x.short || ''}</p>
            <span class="svc-more">تفاصيل <i class="fas fa-arrow-left"></i></span>
        </div>
    `).join('');
}

function openSvc(id) {
    const s = (DB.g('services') || []).find(x => x.id == id);
    if (!s) return;

    sT('svcBr', s.name);
    sT('svcTt', s.name);
    sT('svcSh', s.short || '');
    sT('svcDs', s.desc || s.short || '');

    const imgWrapper = $('svcIW');
    if (imgWrapper) {
        imgWrapper.innerHTML = s.img && s.img.startsWith('http')
            ? `<img src="${s.img}" style="width:100%;height:100%;object-fit:cover" onerror="this.parentNode.innerHTML='<i class=\'fas fa-layer-group\' style=\'font-size:60px\'></i>'">`
            : `<i class="fas ${s.icon || 'fa-tools'}"></i>`;
    }

    const featuresWrapper = $('svcFt');
    if (featuresWrapper) {
        featuresWrapper.innerHTML = (s.feats || '')
            .split('\n')
            .filter(f => f.trim())
            .map(f => `<div class="sf"><i class="fas fa-check-circle"></i>${f}</div>`)
            .join('');
    }

    const faqWrapper = $('svcFq');
    if (faqWrapper) {
        const faqs = DB.g('faqs') || [];
        faqWrapper.innerHTML = faqs.slice(0, 3).map(f => `
            <div class="fqi" id="sfq${f.id}">
                <div class="fqq" onclick="tFq('sfq${f.id}')">
                    <span>${f.q}</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="fqa"><p>${f.a}</p></div>
            </div>
        `).join('');
    }

    const relatedWrapper = $('relS');
    if (relatedWrapper) {
        relatedWrapper.innerHTML = (DB.g('services') || [])
            .filter(x => x.id != id && x.status === 'active')
            .slice(0, 5)
            .map(o => `<div class="rs" onclick="openSvc(${o.id})"><i class="fas ${o.icon || 'fa-tools'}"></i>${o.name}</div>`)
            .join('');
    }

    nTo('svc');
}

function renderOffers() {
    const list = (DB.g('offers') || []).filter(x => x.status === 'active');
    const el = $('offEl');
    if (!el) return;

    el.innerHTML = list.map(x => `
        <div class="ofc ${x.feat ? 'hot' : ''}">
            ${x.feat ? '<span class="ofbg">الأكثر طلباً</span>' : ''}
            <div class="ofhd">
                <h3>${x.name}</h3>
                <div class="sub">ضمان حتى 10 سنوات</div>
                <div class="ofpr">
                    ${x.newP ? `
                        ${x.oldP ? `<span class="old">${x.oldP} ر.س</span>` : ''}
                        <span class="nw">${x.newP}</span>
                        <span class="u">ر.س</span>
                    ` : `
                        <span class="nw" style="font-size:15px; color:var(--am3); background:rgba(255,255,255,0.08); padding:4px 10px; border-radius:50px; display:inline-block; font-weight:700;"><i class="fas fa-tags" style="font-size:11px; margin-left:4px;"></i> سعر خاص عند التواصل</span>
                    `}
                </div>
            </div>
            <div class="ofbd">
                <ul class="offl">
                    ${(x.feats || '').split('\n').filter(f => f.trim()).map(f => `<li><i class="fas fa-check-circle"></i>${f}</li>`).join('')}
                </ul>
                <a class="btn btn-am" onclick="openReq()" style="display:flex;justify-content:center">
                    <i class="fas fa-calendar-check"></i>اطلب الباقة
                </a>
            </div>
        </div>
    `).join('');
}

let CT = 'text'; // Default testimonial filter: 'text' (written) or 'video'

function renderTests() {
    const list = (DB.g('testimonials') || []).filter(x => x.status === 'active');
    const el = $('tstEl');
    if (!el) return;

    const filtered = list.filter(x => {
        const isVideo = x.svc === 'video' || x.svc === 'فيديو' || (x.text && (x.text.includes('youtube.com') || x.text.includes('youtu.be') || x.text.endsWith('.mp4')));
        if (CT === 'video') {
            return isVideo;
        } else {
            return !isVideo;
        }
    });

    if (filtered.length === 0) {
        el.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 50px 20px; background: rgba(15, 36, 65, 0.02); border: 2px dashed rgba(15, 36, 65, 0.1); border-radius: var(--r2); color: var(--nv); font-weight: 700; margin-top: 10px;">
                <i class="fas fa-comments-slash" style="font-size: 38px; color: var(--am); margin-bottom: 15px; display: block; filter: drop-shadow(0 4px 6px rgba(224,123,15,0.2));"></i>
                <span style="font-size: 15px; display: block; margin-bottom: 6px;">لا توجد تقييمات فيديو حالياً.</span>
                <span style="font-size: 13px; color: var(--cc); font-weight: 500;">نقوم حالياً بتوثيق آراء عملائنا الكرام بالفيديو وسنقوم بنشرها قريباً!</span>
            </div>
        `;
    } else {
        el.innerHTML = filtered.map(x => {
            const isVideo = x.svc === 'video' || x.svc === 'فيديو' || (x.text && (x.text.includes('youtube.com') || x.text.includes('youtu.be') || x.text.endsWith('.mp4')));
            if (isVideo) {
                let thumb = '';
                let ytId = '';
                if (x.text.includes('youtube.com') || x.text.includes('youtu.be')) {
                    if (x.text.includes('youtube.com/embed/')) {
                        ytId = x.text.split('embed/')[1].split('?')[0];
                    } else if (x.text.includes('youtube.com/watch?v=')) {
                        ytId = x.text.split('watch?v=')[1].split('&')[0];
                    } else if (x.text.includes('youtu.be/')) {
                        ytId = x.text.split('youtu.be/')[1].split('?')[0];
                    }
                    if (ytId) {
                        thumb = `https://img.youtube.com/vi/${ytId}/hqdefault.jpg`;
                    }
                }
                return `
                    <div class="tc video-test-card" onclick="openVid('${x.text}')" style="cursor:pointer; background:#080f1e; border: 2px solid rgba(15, 36, 65, 0.1); border-radius: var(--r2); padding: 12px; position: relative; overflow: hidden; height: 100%; display: flex; flex-direction: column; justify-content: space-between; border-bottom: 3px solid var(--am);">
                        <div class="video-container" style="border-radius: var(--r); overflow: hidden; position: relative; height: 200px; background:#000; display:flex; align-items:center; justify-content:center;">
                            ${ytId ? `<img src="${thumb}" style="width:100%; height:100%; object-fit:cover;">` : `<video src="${x.text}#t=0.5" preload="metadata" muted playsinline style="width:100%; height:100%; object-fit:cover; pointer-events:none;"></video>`}
                            <div style="position:absolute; inset:0; background:rgba(15,36,65,0.4); display:flex; align-items:center; justify-content:center;">
                                <div class="play-btn-pulse" style="width:50px; height:50px; border-radius:50%; background:var(--am); display:flex; align-items:center; justify-content:center; color:#fff; font-size:18px; box-shadow:0 0 15px var(--am); transition:all 0.3s;">
                                    <i class="fas fa-play" style="margin-left:-3px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="tc-auth" style="margin-top: 12px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 12px;">
                            <div class="tc-av" style="background: var(--am); color: #fff;">${(x.name || '?').charAt(0)}</div>
                            <div class="tc-info">
                                <strong style="color: #fff; display:block; font-size:13px; font-weight:700;">${x.name}</strong>
                                <span style="color: rgba(255,255,255,0.7); font-size:11px;">${x.city || ''} · رأي بالفيديو</span>
                            </div>
                        </div>
                    </div>
                `;
            }
            
            return `
                <div class="tc">
                    <div class="tc-st">${'⭐'.repeat(x.rating || 5)}</div>
                    <p>${x.text}</p>
                    <div class="tc-auth">
                        <div class="tc-av">${(x.name || '?').charAt(0)}</div>
                        <div class="tc-info">
                            <strong>${x.name}</strong>
                            <span>${x.city || ''} · ${x.svc || ''}</span>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }
}

function openVid(url) {
    console.log(`%c[Video Player] openVid triggered for URL: "${url}"`, "color: #e07b0f; font-weight: bold; font-size: 13px;");
    
    const modal = $('vidModal');
    const body = $('vidBody');
    
    if (!modal) {
        console.error("%c[Video Player] ERROR: HTML element with ID 'vidModal' was not found in the DOM!", "color: red; font-weight: bold;");
        return;
    }
    
    if (!body) {
        console.error("%c[Video Player] ERROR: HTML element with ID 'vidBody' was not found in the DOM!", "color: red; font-weight: bold;");
        return;
    }
    
    console.log("[Video Player] vidModal and vidBody successfully located.");
    
    let ytId = '';
    if (url.includes('youtube.com') || url.includes('youtu.be')) {
        if (url.includes('youtube.com/embed/')) {
            ytId = url.split('embed/')[1].split('?')[0];
        } else if (url.includes('youtube.com/watch?v=')) {
            ytId = url.split('watch?v=')[1].split('&')[0];
        } else if (url.includes('youtu.be/')) {
            ytId = url.split('youtu.be/')[1].split('?')[0];
        }
    }
    
    if (ytId) {
        console.log(`%c[Video Player] YouTube Video detected. ID: ${ytId}`, "color: #ff0000; font-weight: bold;");
        body.innerHTML = `<iframe src="https://www.youtube.com/embed/${ytId}?autoplay=1&mute=0&controls=1&rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="width:100%; height:100%; border:none;"></iframe>`;
        
        // Listen to iframe load
        const iframe = body.querySelector('iframe');
        iframe.onload = function() {
            console.log("%c[Video Player] YouTube IFrame loaded successfully.", "color: green; font-weight: bold;");
        };
    } else {
        console.log("[Video Player] Native MP4/WebM video detected.");
        let finalUrl = url;
        // Encode path segments to handle spaces and special chars in filenames
        if (!url.startsWith('http')) {
            finalUrl = url.split('/').map(function(seg) {
                return seg ? encodeURIComponent(seg) : seg;
            }).join('/');
            console.log(`[Video Player] Encoded native video path to: "${finalUrl}"`);
        }
        
        // On local dev, route through /video-stream for HTTP range (seek) support
        const isLocalDev = window.location.hostname === 'localhost'
                        || window.location.hostname === '127.0.0.1'
                        || window.location.hostname.startsWith('192.168.');
        if (isLocalDev && !url.startsWith('http')) {
            let path = url.replace(/^\/+/, '');
            finalUrl = `/video-stream?path=${encodeURIComponent(path)}`;
            console.log(`[Video Player] Local dev detected. Streaming video via: "${finalUrl}"`);
        }
        
        body.innerHTML = `<video src="${finalUrl}" controls playsinline style="width:100%; height:100%; object-fit:contain;" onclick="event.stopPropagation()"></video>`;
        const videoEl = body.querySelector('video');
        if (videoEl) {
            console.log("[Video Player] Created native <video> element. Setting up diagnostics event listeners...");
            
            videoEl.addEventListener('loadstart', () => {
                console.log(`%c[Video Player] [Event: loadstart] Video is beginning to load: "${finalUrl}"`, "color: #3182ce;");
            });
            
            videoEl.addEventListener('loadedmetadata', () => {
                console.log(`%c[Video Player] [Event: loadedmetadata] Video metadata successfully loaded. Duration: ${videoEl.duration.toFixed(2)}s, Dimensions: ${videoEl.videoWidth}x${videoEl.videoHeight}`, "color: #2b6cb0; font-weight: bold;");
            });
            
            videoEl.addEventListener('canplay', () => {
                console.log("%c[Video Player] [Event: canplay] Enough data is buffered. Video is ready to start playing.", "color: #2f855a; font-weight: bold;");
            });
            
            videoEl.addEventListener('playing', () => {
                console.log("%c[Video Player] [Event: playing] Video playback has started or resumed successfully.", "color: green; font-weight: bold;");
            });
            
            videoEl.addEventListener('waiting', () => {
                console.warn("[Video Player] [Event: waiting] Video playback stopped due to buffering...");
            });
            
            videoEl.addEventListener('error', (e) => {
                const err = videoEl.error;
                let errMsg = 'Unknown Media Error';
                if (err) {
                    switch (err.code) {
                        case err.MEDIA_ERR_ABORTED:
                            errMsg = 'Fetching process aborted by user.';
                            break;
                        case err.MEDIA_ERR_NETWORK:
                            errMsg = 'A network error occurred while fetching the video. Please check your internet connection.';
                            break;
                        case err.MEDIA_ERR_DECODE:
                            errMsg = 'An error occurred while decoding the video (corrupted file or unsupported codec format).';
                            break;
                        case err.MEDIA_ERR_SRC_NOT_SUPPORTED:
                            errMsg = 'The video file could not be loaded. Either the path/file is not found (404 Not Found), or your browser doesn\'t support this specific format/codec.';
                            break;
                    }
                }
                console.error(`%c[Video Player] [Event: error] FAILED to play video: ${errMsg}`, "color: red; font-weight: bold; font-size: 12px;", err);
            });

            console.log("[Video Player] Requesting browser to play video...");
            videoEl.play().then(() => {
                console.log("%c[Video Player] Video play request accepted by browser.", "color: green;");
            }).catch(err => {
                console.warn("%c[Video Player] Autoplay with sound blocked or interrupted. The user can press play manually.", "color: orange;", err.message);
            });
        }
    }
    modal.style.display = 'flex';
    console.log("[Video Player] Modal display style changed to 'flex'.");
}

function closeVid() {
    const modal = $('vidModal');
    const body = $('vidBody');
    if (modal) modal.style.display = 'none';
    if (body) body.innerHTML = '';
}

window.openVid = openVid;
window.closeVid = closeVid;
// Signal that the real implementations are ready
document.dispatchEvent(new Event('app:ready'));


function fTest(type, btn) {
    CT = type;
    document.querySelectorAll('.test-f .tf').forEach(b => {
        b.classList.remove('act');
        b.style.background = 'transparent';
        b.style.color = 'var(--nv)';
        b.style.borderColor = 'var(--sl2)';
    });
    if (btn) {
        btn.classList.add('act');
        btn.style.background = 'rgba(224, 123, 15, 0.06)';
        btn.style.color = 'var(--am)';
        btn.style.borderColor = 'var(--am)';
    }
    renderTests();
}

window.fTest = fTest;

function renderFaqs(id = 'faqEl') {
    const list = DB.g('faqs') || [];
    const el = $(id);
    if (!el) return;

    el.innerHTML = list.map(x => `
        <div class="fqi" id="fq${x.id}">
            <div class="fqq" onclick="tFq('fq${x.id}')">
                <span>${x.q}</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="fqa"><p>${x.a}</p></div>
        </div>
    `).join('');
}

function tFq(id) {
    $(id)?.classList.toggle('open');
}

function renderBlog() {
    const list = (DB.g('blogs') || []).filter(x => x.status === 'published');
    ['blEl', 'blPg'].forEach(id => {
        const el = $(id);
        if (!el) return;

        el.innerHTML = list.slice(0, id === 'blEl' ? 3 : 99).map(x => `
            <div class="blc">
                <div class="blth">
                    ${x.img && x.img.startsWith('http') ? `<img src="${x.img}" onerror="this.style.display='none'">` : ''}
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="blbd">
                    <span class="bl-tag">${x.cat || 'عزل'}</span>
                    <h3>${x.title}</h3>
                    <p>${x.summary || ''}</p>
                    <div class="bl-meta">
                        <span><i class="fas fa-calendar"></i>${x.date || ''}</span>
                        <span><i class="fas fa-clock"></i>5 دقائق</span>
                    </div>
                </div>
            </div>
        `).join('');
    });
}

// default gallery filter is initialized globally above

function galItem(g) {
    const hasImg = g.img && g.img.startsWith('http');
    const isVideo = g.cat === 'فيديو' || g.cat === 'video' || (g.img && (g.img.endsWith('.mp4') || g.img.includes('youtube.com') || g.img.includes('youtu.be')));
    
    if (isVideo) {
        let thumb = g.img;
        let ytId = '';
        if (g.img && (g.img.includes('youtube.com') || g.img.includes('youtu.be'))) {
            if (g.img.includes('youtube.com/embed/')) {
                ytId = g.img.split('embed/')[1].split('?')[0];
            } else if (g.img.includes('youtube.com/watch?v=')) {
                ytId = g.img.split('watch?v=')[1].split('&')[0];
            } else if (g.img.includes('youtu.be/')) {
                ytId = g.img.split('youtu.be/')[1].split('?')[0];
            }
            if (ytId) {
                thumb = `https://img.youtube.com/vi/${ytId}/hqdefault.jpg`;
            }
        }
        
        return `
            <div class="gi video-card" onclick="openVid('${g.img}')" style="cursor:pointer;">
                <div class="gi-img-wrap" style="background:#080f1e; display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden;">
                    ${ytId ? `<img src="${thumb}" style="width:100%; height:100%; object-fit:cover;">` : `<video src="${g.img}#t=0.5" preload="metadata" muted playsinline style="width:100%; height:100%; object-fit:cover; pointer-events:none;"></video>`}
                    <div style="position:absolute; inset:0; background:rgba(15,36,65,0.4); display:flex; align-items:center; justify-content:center;">
                        <div class="play-btn-pulse" style="width:60px; height:60px; border-radius:50%; background:var(--am); display:flex; align-items:center; justify-content:center; color:#fff; font-size:22px; box-shadow:0 0 20px var(--am); transition:all 0.3s;">
                            <i class="fas fa-play" style="margin-left:-3px;"></i>
                        </div>
                    </div>
                </div>
                <div class="gi-content">
                    <h3 class="gi-title">${g.title}</h3>
                </div>
            </div>
        `;
    }
    
    return `
        <div class="gi">
            <div class="gi-img-wrap" style="${hasImg ? '' : `background:${g.color || '#0f2441'}`}">
                ${hasImg ? `<img src="${g.img}" onerror="this.style.display='none'">` : ''}
                ${!hasImg ? `<div class="gi-ph"><i class="fas ${g.icon || 'fa-image'}"></i></div>` : ''}
                <span class="gtype ${g.type === 'before' ? 'bf' : 'af'}">${g.type === 'before' ? 'قبل' : 'بعد'}</span>
                <div class="gi-ov">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gi-content">
                <h3 class="gi-title">${g.title}</h3>
            </div>
        </div>
    `;
}

function renderGal() {
    const list = DB.g('gallery') || [];
    const filtered = list.filter(x => {
        const isVideo = x.cat === 'فيديو' || x.cat === 'video' || (x.img && (x.img.endsWith('.mp4') || x.img.includes('youtube.com') || x.img.includes('youtu.be')));
        if (CF === 'videos') {
            return isVideo;
        } else {
            return !isVideo;
        }
    });

    const el = $('galEl');
    const ep = $('galPg');
    
    if (filtered.length === 0) {
        const placeholderHtml = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 50px 20px; background: rgba(15, 36, 65, 0.02); border: 2px dashed rgba(15, 36, 65, 0.1); border-radius: var(--r2); color: var(--nv); font-weight: 700; margin-top: 10px; width: 100%;">
                <i class="fas fa-video-slash" style="font-size: 38px; color: var(--am); margin-bottom: 15px; display: block; filter: drop-shadow(0 4px 6px rgba(224,123,15,0.2));"></i>
                <span style="font-size: 15px; display: block; margin-bottom: 6px;">لا توجد فيديوهات حالياً في هذا القسم.</span>
                <span style="font-size: 13px; color: var(--cc); font-weight: 500;">نعمل حالياً على تصوير وتجهيز مشاريع جديدة وسنعرضها هنا قريباً!</span>
            </div>
        `;
        if (el) el.innerHTML = placeholderHtml;
        if (ep) ep.innerHTML = placeholderHtml;
    } else {
        if (el) el.innerHTML = filtered.map(x => galItem(x)).join('');
        if (ep) ep.innerHTML = filtered.map(x => galItem(x)).join('');
    }
}

function fGal(cat, btn) {
    CF = cat;
    document.querySelectorAll('.gal-f .gf').forEach(b => {
        b.classList.remove('act');
        b.style.background = '#fff';
        b.style.color = 'var(--cc)';
        b.style.borderColor = 'var(--sl2)';
    });
    if (btn) {
        btn.classList.add('act');
        btn.style.background = 'rgba(224, 123, 15, 0.06)';
        btn.style.color = 'var(--am)';
        btn.style.borderColor = 'var(--am)';
    }
    renderGal();
}

function fGal2(cat, btn) {
    CF = cat;
    document.querySelectorAll('#galF2 .gf').forEach(b => {
        b.classList.remove('act');
        b.style.background = '#fff';
        b.style.color = 'var(--cc)';
        b.style.borderColor = 'var(--sl2)';
    });
    if (btn) {
        btn.classList.add('act');
        btn.style.background = 'rgba(224, 123, 15, 0.06)';
        btn.style.color = 'var(--am)';
        btn.style.borderColor = 'var(--am)';
    }
    renderGal();
}

function renderWhyList() {
    const list = DB.g('whyItems') || [];
    const el = $('whyL');
    if (!el) return;

    el.innerHTML = list.map(x => `
        <div class="wi">
            <div class="ic" style="display:flex;align-items:center;justify-content:center;width:48px;height:48px;border-radius:50%;background:rgba(197,168,128,0.1);color:var(--am);font-size:20px;flex-shrink:0">
                ${x.img && x.img.trim()
                    ? `<img src="${x.img}" style="width:28px;height:28px;object-fit:contain;border-radius:4px" onerror="this.outerHTML='<i class=\'fas ${x.icon || "fa-check"}\'></i>'">`
                    : `<i class="fas ${x.icon || 'fa-check'}"></i>`}
            </div>
            <div>
                <h4>${x.title}</h4>
                <p>${x.desc || ''}</p>
            </div>
        </div>
    `).join('');
}

// Render work steps
function renderSteps() {
    const list = DB.g('steps') || [];
    const el = $('stpsEl');
    if (!el) return;

    el.innerHTML = list.map(x => `
        <div class="stc">
            <div class="stn" style="display:flex;align-items:center;justify-content:center;overflow:hidden;border-radius:50%;width:60px;height:60px;background:rgba(197,168,128,0.1);border:2px solid var(--am);color:var(--am);font-weight:800;font-size:20px;margin:0 auto 20px">
                ${x.img && x.img.trim()
                    ? `<img src="${x.img}" style="width:100%;height:100%;object-fit:cover" onerror="this.outerHTML='${x.num || "•"}'">`
                    : x.num || '•'}
            </div>
            <h3>${x.title}</h3>
            <p>${x.desc || ''}</p>
        </div>
    `).join('');
}

// Render service areas home & page
function renderArHm() {
    const list = DB.g('areas') || [];
    const el = $('arHm');
    if (!el) return;

    el.innerHTML = list.map(x => `
        <div class="arc" onclick="nTo('areas')">
            <span class="em">${x.emoji || '📍'}</span>
            <h3>${x.name}</h3>
            <p>${(x.desc || '').slice(0, 45)}...</p>
            <span class="bdg">خدمة عزل كاملة</span>
        </div>
    `).join('');
}

function renderArPg() {
    const list = DB.g('areas') || [];
    const services = (DB.g('services') || []).filter(x => x.status === 'active');
    const el = $('arPg');
    if (!el) return;

    const cs = DB.g('contact') || INIT.contact;
    const wa = `https://wa.me/${cs.wa}?text=${encodeURIComponent(cs.wm || '')}`;

    el.innerHTML = list.map(x => `
        <div class="adet">
            <h3>${x.emoji || '📍'} عزل الأسطح في ${x.name}</h3>
            <p>${x.desc || ''}</p>
            <div class="atags">
                ${services.slice(0, 5).map(sv => `<span class="atag">${sv.name}</span>`).join('')}
            </div>
            ${x.kws ? `<div class="akws"><strong>الكلمات المفتاحية:</strong> ${x.kws}</div>` : ''}
            <div style="margin-top:14px;display:flex;gap:10px;flex-wrap:wrap">
                <a class="btn btn-am" onclick="openReq()" style="font-size:13px;padding:10px 18px">
                    <i class="fas fa-calendar-check"></i>احصل على عرض في ${x.name}
                </a>
                <a class="btn btn-wa" href="${wa}" style="font-size:13px;padding:10px 18px;display:inline-flex" target="_blank">
                    <i class="fab fa-whatsapp"></i>واتساب
                </a>
            </div>
        </div>
    `).join('');
}

// Render footer services
function renderFtSvcs() {
    const list = (DB.g('services') || []).filter(x => x.status === 'active').slice(0, 6);
    const el = $('ftSvcs');
    if (el) el.innerHTML = list.map(x => `<li><a onclick="openSvc(${x.id})">${x.name}</a></li>`).join('');
}

// Render service request dropdown
function renderRqSvc() {
    const list = (DB.g('services') || []).filter(x => x.status === 'active');
    const el = $('r5');
    if (!el) return;
    el.innerHTML = '<option value="">اختر الخدمة</option>' + list.map(x => `<option>${x.name}</option>`).join('');
}

// --- Admin Panel rendering ---
function rAdm() {
    rTb('scTb', DB.g('services') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td><i class="fas ${x.icon || 'fa-tools'}" style="color:var(--am);margin-left:4px"></i>${x.name}</td>
            <td style="max-width:140px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:12px">${x.short || ''}</td>
            <td>${x.img && x.img.startsWith('http') ? `<img src="${x.img}" style="width:40px;height:30px;object-fit:cover;border-radius:4px">` : '<span style="font-size:11px;color:var(--cc)">لا توجد</span>'}</td>
            <td>${stB(x.status === 'active')}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('ms',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('services',${x.id},'${x.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('ofTb', DB.g('offers') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.name}${x.feat ? '<span class="stbg st-new" style="margin-right:5px">مميزة</span>' : ''}</td>
            <td style="text-decoration:line-through;color:var(--cc)">${x.oldP || '-'}</td>
            <td style="color:var(--gr);font-weight:700">${x.newP} ر.س</td>
            <td>${stB(x.status === 'active')}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mo',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('offers',${x.id},'${x.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('wyTb', DB.g('whyItems') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>
                ${x.img && x.img.trim()
                    ? `<img src="${x.img}" style="width:40px;height:30px;object-fit:cover;border-radius:4px">`
                    : `<i class="fas ${x.icon || 'fa-check'}" style="color:var(--am)"></i>`}
            </td>
            <td>${x.title}</td>
            <td style="font-size:12px;color:var(--cc)">${x.desc || ''}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mw',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('whyItems',${x.id},'${x.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('stTb', DB.g('steps') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.num || ''}</td>
            <td>
                ${x.img && x.img.trim()
                    ? `<img src="${x.img}" style="width:40px;height:30px;object-fit:cover;border-radius:4px">`
                    : `<i class="fas ${x.icon || 'fa-star'}" style="color:var(--am)"></i>`}
            </td>
            <td>${x.title}</td>
            <td style="font-size:12px;color:var(--cc)">${x.desc || ''}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mst',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('steps',${x.id},'${x.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('arTb', DB.g('areas') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.emoji || '📍'} ${x.name}</td>
            <td style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:12px">${(x.desc || '').slice(0, 50)}</td>
            <td style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:11px;color:var(--cc)">${(x.kws || '').slice(0, 50)}...</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('ma',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('areas',${x.id},'${x.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('tsTb', DB.g('testimonials') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.name}</td>
            <td>${'⭐'.repeat(x.rating || 5)}</td>
            <td>${x.city || ''}</td>
            <td style="font-size:12px">${x.svc || ''}</td>
            <td>${stB(x.status === 'active')}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mt',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('testimonials',${x.id},'${x.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('fqTb', DB.g('faqs') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.q}</td>
            <td style="font-size:12px;color:var(--cc);max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${(x.a || '').slice(0, 60)}...</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mf',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('faqs',${x.id},'السؤال')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('glTb', DB.g('gallery') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.img && x.img.startsWith('http')
                ? `<img src="${x.img}" style="width:50px;height:36px;object-fit:cover;border-radius:4px">`
                : `<div style="width:50px;height:36px;background:${x.color || '#0f2441'};border-radius:4px;display:flex;align-items:center;justify-content:center"><i class="fas ${x.icon || 'fa-image'}" style="color:#fff;font-size:14px"></i></div>`}</td>
            <td>${x.title}</td>
            <td>${x.cat || ''}</td>
            <td><span class="stbg ${x.type === 'after' ? 'st-ok' : 'st-pr'}">${x.type === 'after' ? 'بعد' : 'قبل'}</span></td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mg',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('gallery',${x.id},'${x.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('blTb', DB.g('blogs') || [], (x, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.title}</td>
            <td>${x.cat || ''}</td>
            <td>${x.img && x.img.startsWith('http') ? `<img src="${x.img}" style="width:50px;height:34px;object-fit:cover;border-radius:4px">` : '<span style="font-size:11px;color:var(--cc)">لا توجد</span>'}</td>
            <td>${x.status === 'published' ? '<span class="stbg st-ok">منشور</span>' : '<span class="stbg st-pr">مسودة</span>'}</td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mb',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('blogs',${x.id},'${x.title}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rTb('mnTb', DB.g('menu') || [], (x, i, arr) => `
        <tr>
            <td>${i + 1}</td>
            <td>${x.name}</td>
            <td>${x.page}</td>
            <td>${stB(x.v)}</td>
            <td>
                <div class="axb">
                    ${i > 0 ? `<button class="axbtn v" onclick="mvMn(${x.id},-1)"><i class="fas fa-chevron-up"></i></button>` : ''}
                    ${i < arr.length - 1 ? `<button class="axbtn v" onclick="mvMn(${x.id},1)"><i class="fas fa-chevron-down"></i></button>` : ''}
                </div>
            </td>
            <td>
                <div class="axb">
                    <button class="axbtn e" onclick="oM('mm',${x.id})"><i class="fas fa-edit"></i></button>
                    <button class="axbtn d" onclick="dI('menu',${x.id},'${x.name}')"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>`);

    rRqs();
    rMsgs();
}

async function updateRqStatus(id, val) {
    try {
        const res = await fetch(`/admin/requests/${id}/status`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify({ status: val })
        });
        if (res.ok) {
            DB.upd('requests', id, { status: val });
            sN('✅ تم تحديث حالة الطلب');
            updDash();
        }
    } catch (e) {
        console.error(e);
    }
}

async function deleteRq(id) {
    if (confirm('حذف هذا الطلب؟')) {
        try {
            const res = await fetch(`/admin/requests/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': getCsrfToken() }
            });
            if (res.ok) {
                DB.del('requests', id);
                rRqs();
                updDash();
                sN('✅ تم حذف الطلب بنجاح');
            }
        } catch (e) {
            console.error(e);
        }
    }
}

async function toggleMsgReplied(id, status) {
    try {
        const res = await fetch(`/admin/messages/${id}/reply`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify({ replied: status })
        });
        if (res.ok) {
            DB.upd('messages', id, { replied: status });
            rMsgs();
            updDash();
            sN('✅ تم تحديث حالة الرسالة');
        }
    } catch (e) {
        console.error(e);
    }
}

async function deleteMsg(id) {
    if (confirm('حذف هذه الرسالة؟')) {
        try {
            const res = await fetch(`/admin/messages/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': getCsrfToken() }
            });
            if (res.ok) {
                DB.del('messages', id);
                rMsgs();
                updDash();
                sN('✅ تم حذف الرسالة بنجاح');
            }
        } catch (e) {
            console.error(e);
        }
    }
}

function rRqs() {
    const all = DB.g('requests') || [];
    const filterStatus = $('fltSt')?.value || '';
    const filterCity = $('fltCt')?.value || '';
    const filteredRequests = all.filter(r => {
        if (filterStatus && r.status !== filterStatus) return false;
        if (filterCity && r.city !== filterCity) return false;
        return true;
    });

    const tableBody = $('rqTb');
    if (!tableBody) return;

    tableBody.innerHTML = filteredRequests.length ? filteredRequests.slice().reverse().map((r, i) => `
        <tr>
            <td>${i + 1}</td>
            <td><strong>${r.name}</strong></td>
            <td><a href="tel:${r.phone}" style="color:var(--am);font-weight:600">${r.phone}</a></td>
            <td>${r.city || ''}</td>
            <td style="font-size:12.5px">${r.service || ''}</td>
            <td style="font-size:12px">${r.btype || ''}</td>
            <td style="font-size:12px">${r.area || ''}</td>
            <td style="font-size:11.5px;color:var(--cc)">${r.date || ''}</td>
            <td>
                <select onchange="updateRqStatus(${r.id}, this.value)" style="padding:4px 8px;border-radius:6px;border:1.5px solid var(--sl2);font-family:var(--f);font-size:11.5px">
                    <option value="new" ${r.status === 'new' ? 'selected' : ''}>🆕 جديد</option>
                    <option value="progress" ${r.status === 'progress' ? 'selected' : ''}>🔄 قيد المعالجة</option>
                    <option value="done" ${r.status === 'done' ? 'selected' : ''}>✅ مكتمل</option>
                </select>
            </td>
            <td>
                <div class="axb">
                    <button class="axbtn v" onclick="viewRq(${r.id})"><i class="fas fa-eye"></i></button>
                    <button class="axbtn d" onclick="deleteRq(${r.id})"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
    `).join('') : '<tr><td colspan="10" style="text-align:center;padding:24px;color:var(--cc)"><i class="fas fa-inbox"></i> لا توجد طلبات بعد</td></tr>';
}

function viewRq(id) {
    const r = (DB.g('requests') || []).find(x => x.id == id);
    if (!r) return;
    alert('الاسم: ' + r.name +
        '\nالجوال: ' + r.phone +
        '\nالمدينة: ' + r.city + ' - ' + (r.district || '') +
        '\nالخدمة: ' + r.service +
        '\nنوع المبنى: ' + (r.btype || '') +
        '\nالمساحة: ' + (r.area || '') +
        '\nالتاريخ: ' + (r.reqDate || '') +
        '\nالوقت: ' + (r.reqTime || '') +
        '\nملاحظات: ' + (r.notes || 'لا توجد')
    );
}

function rMsgs() {
    const msgs = DB.g('messages') || [];
    const tableBody = $('msgTb');
    if (!tableBody) return;

    tableBody.innerHTML = msgs.length ? msgs.slice().reverse().map((m, i) => `
        <tr>
            <td>${i + 1}</td>
            <td>${m.name}</td>
            <td><a href="tel:${m.phone}" style="color:var(--am);font-weight:600">${m.phone}</a></td>
            <td>${m.city || ''}</td>
            <td style="font-size:12.5px">${m.subject || ''}</td>
            <td style="font-size:11.5px;color:var(--cc)">${m.date || ''}</td>
            <td><span class="stbg ${m.replied ? 'st-ok' : 'st-new'}">${m.replied ? 'تم الرد' : 'جديدة'}</span></td>
            <td>
                <div class="axb">
                    <button class="axbtn v" onclick="toggleMsgReplied(${m.id}, true)"><i class="fas fa-check"></i></button>
                    <button class="axbtn d" onclick="deleteMsg(${m.id})"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
    `).join('') : '<tr><td colspan="8" style="text-align:center;padding:24px;color:var(--cc)"><i class="fas fa-inbox"></i> لا توجد رسائل بعد</td></tr>';
}

function stB(ok) {
    return ok ? '<span class="stbg st-ok">✅ نشط</span>' : '<span class="stbg st-no">🚫 مخفي</span>';
}

function rTb(id, data, fn) {
    const tableBody = $(id);
    if (!tableBody) return;
    tableBody.innerHTML = data.length
        ? data.map((x, i, arr) => fn(x, i, arr)).join('')
        : '<tr><td colspan="10" style="text-align:center;padding:22px;color:var(--cc)"><i class="fas fa-database"></i> لا توجد بيانات</td></tr>';
}

function updDash() {
    const requests = DB.g('requests') || [];
    const messages = DB.g('messages') || [];
    const clicks = DB.g('clicks') || [];

    const wa = clicks.filter(c => c.type === 'whatsapp').length;
    const ph = clicks.filter(c => c.type === 'phone').length;
    const newRequests = requests.filter(r => r.status === 'new').length;

    ['dR', 'bcR'].forEach(id => sT(id, newRequests.toString()));
    ['dM', 'bcM'].forEach(id => sT(id, messages.filter(m => !m.replied).length.toString()));
    sT('dS', ((DB.g('services') || []).filter(s => s.status === 'active').length).toString());
    sT('dC', clicks.length.toString());

    sT('an-wa', wa.toString());
    sT('an-ph', ph.toString());
    sT('an-rq', requests.length.toString());

    const dashRequests = $('dshR');
    if (dashRequests) {
        dashRequests.innerHTML = requests.length ? `
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
                    ${requests.slice(-5).reverse().map(r => `
                        <tr>
                            <td>${r.name}</td>
                            <td style="font-size:12px">${r.service}</td>
                            <td>${r.city}</td>
                            <td>${stB(r.status === 'done')}</td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>` : '<div style="text-align:center;padding:16px;color:var(--cc)"><i class="fas fa-inbox"></i> لا توجد طلبات</div>';
    }

    const clickLogs = $('clkLog');
    if (clickLogs) {
        clickLogs.innerHTML = clicks.length ? clicks.slice(-20).reverse().map(c => `
            <tr>
                <td><span class="stbg ${c.type === 'whatsapp' ? 'st-ok' : 'st-new'}">${c.type === 'whatsapp' ? 'واتساب' : 'هاتف'}</span></td>
                <td style="font-size:12px">${c.page || ''}</td>
                <td style="font-size:11.5px;color:var(--cc)">${c.time || ''}</td>
            </tr>
        `).join('') : '<tr><td colspan="3" style="text-align:center;padding:16px;color:var(--cc)">لا توجد نقرات</td></tr>';
    }
}

// Export requests as CSV
function expCSV() {
    const list = DB.g('requests') || [];
    if (!list.length) { sN('لا توجد طلبات', 'info'); return; }

    const csv = [
        'الاسم,الجوال,المدينة,الحي,الخدمة,نوع المبنى,المساحة,التاريخ,الحالة,الملاحظات',
        ...list.map(r => `"${r.name}","${r.phone}","${r.city || ''}","${r.district || ''}","${r.service || ''}","${r.btype || ''}","${r.area || ''}","${r.date || ''}","${r.status || ''}","${r.notes || ''}"`)
    ].join('\n');

    const anchor = document.createElement('a');
    anchor.href = URL.createObjectURL(new Blob(['\ufeff' + csv], { type: 'text/csv;charset=utf-8' }));
    anchor.download = 'طلبات_عزل_القصيم.csv';
    anchor.click();
    sN('✅ تم تصدير ملف Excel');
}

// Render everything on database change
function rAll() {
    if (window.location.pathname.startsWith('/admin')) {
        rAdm();
        updDash();
    }
}

// Site page navigation
function nTo(page) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    const pg = $('page-' + page);
    if (pg) {
        pg.classList.add('active');
        CP = page;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    renderNav();
}

// --- Request Modal Flow logic ---
let RQS = 1;

function openReq() {
    RQS = 1;
    updRQ();
    $('RQM').classList.add('open');
}

function closeReq() {
    $('RQM').classList.remove('open');
    RQS = 1;
    updRQ();
}

// Modal closing click event
document.addEventListener('click', (e) => {
    const modal = $('RQM');
    if (modal && e.target === modal) {
        closeReq();
    }
});

function updRQ() {
    [1, 2, 3].forEach(i => {
        $('rs' + i)?.classList.toggle('act', i === RQS);
        $('sp' + i)?.classList.toggle('act', i === RQS);
    });

    const pb = $('pvB');
    const nb = $('nxB');

    if (pb) pb.style.display = RQS > 1 ? '' : 'none';
    if (nb) nb.innerHTML = RQS < 3 ? 'التالي<i class="fas fa-arrow-left" style="margin-right:6px"></i>' : '<i class="fas fa-paper-plane" style="margin-left:6px"></i>إرسال الطلب';
}

function rqNx() {
    if (RQS === 1) {
        if (!$('r1').value.trim()) { sN('يرجى إدخال اسمك الكريم', 'err'); return; }
        if (!$('r2').value.trim() || $('r2').value.trim().length < 10) { sN('يرجى إدخال رقم جوال صحيح', 'err'); return; }
        if (!$('r3').value) { sN('يرجى اختيار المدينة', 'err'); return; }
        RQS = 2;
        updRQ();
    } else if (RQS === 2) {
        if (!$('r5').value) { sN('يرجى اختيار الخدمة المطلوبة', 'err'); return; }
        RQS = 3;
        updRQ();
    } else {
        subRQ();
    }
}

function rqPv() {
    if (RQS > 1) {
        RQS--;
        updRQ();
    }
}

async function subRQ() {
    const data = {
        name: $('r1').value.trim(),
        phone: $('r2').value.trim(),
        city: $('r3').value,
        district: $('r4').value.trim(),
        service: $('r5').value,
        btype: $('r6').value,
        area: $('r7').value,
        notes: $('r8').value.trim(),
        reqDate: $('r9').value,
        reqTime: $('r10').value,
        status: 'new',
        date: new Date().toLocaleDateString('ar-SA')
    };

    try {
        const res = await fetch('/requests', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(data)
        });
        if (res.ok) {
            const result = await res.json();
            DB.push('requests', result.item);
            tC('request', 'modal');
            closeReq();
            sN('✅ تم إرسال طلبك! سنتواصل معك خلال ساعة لتحديد موعد المعاينة المجانية');
            updDash();
        } else {
            sN('❌ فشل إرسال الطلب، يرجى المحاولة لاحقاً', 'err');
        }
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالشبكة', 'err');
    }

    // Clean inputs
    ['r1', 'r2', 'r4', 'r8', 'r9'].forEach(id => {
        const el = $(id); if (el) el.value = '';
    });
    ['r3', 'r5', 'r6'].forEach(id => {
        const el = $(id); if (el) el.selectedIndex = 0;
    });
}

// Contact form submission
async function subCt() {
    const name = $('cfN').value.trim();
    const phone = $('cfP').value.trim();
    if (!name || !phone) {
        sN('يرجى إدخال الاسم والجوال', 'err');
        return;
    }

    const data = {
        name,
        phone,
        city: $('cfC').value,
        subject: $('cfS').value,
        msg: $('cfM').value,
        date: new Date().toLocaleDateString('ar-SA'),
        replied: false
    };

    try {
        const res = await fetch('/messages', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(data)
        });
        if (res.ok) {
            const result = await res.json();
            DB.push('messages', result.item);
            sN('✅ تم إرسال رسالتك! سنرد عليك قريباً');
            ['cfN', 'cfP', 'cfS', 'cfM'].forEach(id => {
                const el = $(id); if (el) el.value = '';
            });
            updDash();
        } else {
            sN('❌ فشل إرسال الرسالة، يرجى المحاولة لاحقاً', 'err');
        }
    } catch (e) {
        console.error(e);
        sN('❌ خطأ في الاتصال بالشبكة', 'err');
    }
}

// Log click event
async function tC(type, page) {
    const data = {
        type,
        page,
        time: new Date().toLocaleString('ar-SA')
    };
    try {
        const res = await fetch('/clicks', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
            body: JSON.stringify(data)
        });
        if (res.ok) {
            const result = await res.json();
            DB.push('clicks', result.item);
            updDash();
        }
    } catch (e) {
        console.error(e);
    }
}

// --- Admin Authentication & Access Logic ---
function doLogin() {
    const username = $('LU').value.trim();
    const password = $('LP').value.trim();

    if (!username || !password) {
        $('LE').classList.add('show');
        return;
    }

    fetch('/admin/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': getCsrfToken()
        },
        body: JSON.stringify({ username, password })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            sessionStorage.setItem('azq3_auth', '1');
            $('LE').classList.remove('show');
            sN('✅ تم تسجيل الدخول بنجاح');
            setTimeout(() => {
                window.location.href = '/admin';
            }, 600);
        } else {
            $('LE').classList.add('show');
            $('LP').focus();
        }
    })
    .catch(err => {
        console.error(err);
        $('LE').classList.add('show');
    });
}

function doLogout() {
    sessionStorage.removeItem('azq3_auth');
    sN('تم تسجيل الخروج');
    setTimeout(() => {
        window.location.href = '/admin/logout';
    }, 600);
}

function goSite(e) {
    if (e) e.preventDefault();
    window.location.href = '/';
}

function showAdm(e) {
    if (e) e.preventDefault();
    window.location.href = '/admin';
}

// Admin Navigation
function sP(id, el) {
    document.querySelectorAll('.apnl').forEach(p => p.classList.remove('active'));
    const p = $(id);
    if (p) p.classList.add('active');

    document.querySelectorAll('.anv a').forEach(a => a.classList.remove('act'));
    if (el) el.classList.add('act');

    const panelTitles = {
        pd: 'لوحة التحكم', ph: 'البانر الرئيسي', phd: 'الهيدر والهوية', pft: 'الفوتر',
        pmn: 'إدارة المنيو', ps: 'إدارة الخدمات', po: 'العروض والباقات', pw: 'لماذا نحن',
        pst: 'خطوات العمل', par: 'مناطق الخدمة', pts: 'آراء العملاء', pfq: 'الأسئلة الشائعة',
        pg: 'معرض الصور', pbl: 'المقالات', prq: 'طلبات الخدمة', pms: 'رسائل التواصل',
        pcs: 'بيانات التواصل', pseo: 'إعدادات SEO', pcl: 'ألوان الموقع', pan: 'الإحصائيات'
    };
    sT('aT', panelTitles[id] || 'لوحة التحكم');

    if (id === 'prq') rRqs();
    if (id === 'pms') rMsgs();
}

function ldAdm() {
    ldHero();
    ldAbout();
    ldHdr();
    ldFtr();
    ldCS();
}

function togMob(f) {
    const menu = $('MbN');
    if (!menu) return;
    if (f === false) {
        menu.classList.remove('open');
    } else {
        menu.classList.toggle('open');
    }
}

function sN(msg, type = '') {
    let icon = 'success';
    if (type === 'err' || msg.includes('❌') || msg.includes('فشل') || msg.includes('خطأ')) {
        icon = 'error';
    } else if (type === 'info' || msg.includes('معلومات') || msg.includes('تنبيه')) {
        icon = 'info';
    } else if (msg.includes('تحذير')) {
        icon = 'warning';
    }
    const cleanMsg = msg.replace(/[✅❌⚠️ℹ️]/g, '').trim();

    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,
        title: cleanMsg,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        direction: 'rtl'
    });
}

// --- Bind all core dynamic handlers to window for HTML inline invocation compatibility ---
window.DB = DB;
window.INIT = INIT;
window.initDB = initDB;
window.nTo = nTo;
window.openReq = openReq;
window.closeReq = closeReq;
window.togMob = togMob;
window.doLogin = doLogin;
window.doLogout = doLogout;
window.goSite = goSite;
window.showAdm = showAdm;
window.sP = sP;
window.openSvc = openSvc;
window.fGal = fGal;
window.fGal2 = fGal2;
window.tFq = tFq;
window.rqPv = rqPv;
window.rqNx = rqNx;
window.subCt = subCt;
window.oM = oM;
window.cM = cM;
window.sSvc = sSvc;
window.sOff = sOff;
window.sWhy = sWhy;
window.sStep = sStep;
window.sArea = sArea;
window.sTest = sTest;
window.sFaq = sFaq;
window.sGal = sGal;
window.sBlog = sBlog;
window.sMenu = sMenu;
window.dI = dI;
window.mvMn = mvMn;
window.saveHero = saveHero;
window.saveHdr = saveHdr;
window.saveFtr = saveFtr;
window.saveCS = saveCS;
window.saveSEO = saveSEO;
window.saveCls = saveCls;
window.apC = apC;
window.viewRq = viewRq;
window.expCSV = expCSV;
window.rRqs = rRqs;
window.rMsgs = rMsgs;
window.tC = tC;
window.updateRqStatus = updateRqStatus;
window.deleteRq = deleteRq;
window.toggleMsgReplied = toggleMsgReplied;
window.deleteMsg = deleteMsg;
window.uploadFileAction = uploadFileAction;
window.clearUploadField = clearUploadField;
window.uploadWhyImage = uploadWhyImage;
window.clearWhyImage = clearWhyImage;
window.uploadAboutImage = uploadAboutImage;
window.clearAboutImage = clearAboutImage;
window.ldAbout = ldAbout;
window.saveAbout = saveAbout;

// --- DOM Event Listeners ---
const getCsrfToken = () => {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
};

async function loadLogs() {
    try {
        const res = await fetch('/admin/logs');
        if (res.ok) {
            const logs = await res.json();
            DB.s('requests', logs.requests);
            DB.s('messages', logs.messages);
            DB.s('clicks', logs.clicks);
            updDash();
        }
    } catch (e) {
        console.error(e);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    initDB();

    const path = window.location.pathname;
    const isAdmin = path === '/admin' || path === '/admin/' || path.startsWith('/admin/');
    const isAuth = sessionStorage.getItem('azq3_auth') === '1';

    // 1. Immediately render UI from cached localStorage for zero-latency load times
    rAll();



    // 3. Asynchronously fetch and synchronize database state in the background
    // Only perform the fetch if the user is authenticated or visiting the admin dashboard
    if (isAuth || isAdmin) {
        fetch('/admin/state')
            .then(res => {
                if (res.ok) return res.json();
                throw new Error('Unauthenticated');
            })
            .then(state => {
                // Sync settings and dynamic items quietly in localStorage
                Object.keys(state).forEach(key => {
                    localStorage.setItem('azq3_' + key, JSON.stringify(state[key]));
                });
                
                // Re-render UI panels seamlessly in the background with updated data
                rAll();

                // Hydrate dashboard and logs if logged in as admin
                if (isAdmin && isAuth) {
                    loadLogs().then(() => {
                        ldAdm();
                    });
                }
            })
            .catch(e => {
                console.warn("State synchronization bypassed:", e.message);
                if (e.message === 'Unauthenticated') {
                    sessionStorage.removeItem('azq3_auth');
                    if (isAdmin && path !== '/admin/login') {
                        window.location.href = '/admin/login';
                    }
                }
            });
    }

    window.addEventListener('scroll', () => {
        const header = $('HDR');
        if (header) {
            header.style.boxShadow = window.scrollY > 40
                ? '0 4px 28px rgba(15, 36, 65, 0.15)'
                : '0 2px 20px rgba(15, 36, 65, 0.08)';
        }
    });
});
