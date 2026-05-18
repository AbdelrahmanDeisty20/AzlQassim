<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | لوحة تحكم عزل القصيم</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Google Fonts: Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Laravel Vite Styles and Scripts -->
    @vite(['resources/css/app.css'])

    @if(isset($colors))
    <style>
        :root {
            @if(!empty($colors['nv'])) --nv: {{ $colors['nv'] }}; @endif
            @if(!empty($colors['am'])) --am: {{ $colors['am'] }}; @endif
            @if(!empty($colors['gr'])) --gr: {{ $colors['gr'] }}; @endif
        }
    </style>
    @endif

    <style>
        /* Sidebar Styling */
        .asb {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 260px;
            z-index: 1000;
            overflow-y: auto;
            background: #0f2441;
            transition: right 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Main Content Area */
        .amn {
            margin-right: 260px;
            padding: 24px;
            min-height: 100vh;
            transition: margin-right 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Sidebar Backdrop overlay on mobile */
        .asb-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 36, 65, 0.5);
            backdrop-filter: blur(4px);
            z-index: 999;
        }

        /* Toggle Menu button (for mobile) */
        .a-toggle-btn {
            display: none;
            background: #fff;
            border: 1px solid rgba(197, 168, 128, 0.25);
            color: var(--nv);
            width: 42px;
            height: 42px;
            border-radius: 8px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(15,36,65,0.05);
        }
        .a-toggle-btn:hover {
            background: var(--sl);
            color: var(--am);
        }
        
        .a-close-btn {
            display: none;
        }

        /* Responsive Rules for Tablet/Mobile */
        @media (max-width: 992px) {
            .asb {
                right: -260px !important;
                transform: none !important;
                transition: right 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            }
            .asb.open {
                right: 0 !important;
            }
            .asb-backdrop.open {
                display: block;
            }
            .amn {
                margin-right: 0 !important;
                padding: 16px;
                width: 100vw;
                overflow-x: hidden;
                box-sizing: border-box;
            }
            .a-toggle-btn {
                display: flex;
            }
            .a-close-btn {
                display: block !important;
            }
            /* Collapse two-column grids */
            .admin-grid-cols {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</head>
<body style="background:var(--sl); overflow-x: hidden; margin: 0; padding: 0;">
    <div class="asb-backdrop" id="ASB-Backdrop" onclick="toggleSidebar()"></div>
    <div class="adw active" id="AW">
        <!-- Admin Sidebar -->
        <div class="asb" id="ASB">
            <div class="alogo" style="display:flex; justify-content:space-between; align-items:center; border-bottom: 1px solid rgba(255, 255, 255, 0.07); padding: 18px 16px">
                <div>
                    <h2 style="margin:0; font-size: 15px; font-weight: 900"><i class="fas fa-layer-group" style="color:var(--am)"></i> عزل القصيم</h2>
                    <span style="font-size: 11px; color: var(--am2)">لوحة التحكم</span>
                </div>
                <button class="a-close-btn" onclick="toggleSidebar()" style="background:none; border:none; color:#fff; font-size:20px; cursor:pointer"><i class="fas fa-times"></i></button>
            </div>
            <div class="anv">
                <div class="ans">الرئيسية</div>
                <a href="/admin" class="{{ Request::is('admin') ? 'act' : '' }}"><i class="fas fa-chart-line"></i>لوحة التحكم</a>
                
                <div class="ans">الإعدادات العامة</div>
                <a href="/admin/settings" class="{{ Request::is('admin/settings') ? 'act' : '' }}"><i class="fas fa-sliders-h"></i>إعدادات الموقع</a>
                
                <div class="ans">إدارة المحتوى</div>
                <a href="/admin/services" class="{{ Request::is('admin/services') ? 'act' : '' }}"><i class="fas fa-tools"></i>الخدمات</a>
                <a href="/admin/offers" class="{{ Request::is('admin/offers') ? 'act' : '' }}"><i class="fas fa-percent"></i>العروض</a>
                <a href="/admin/areas" class="{{ Request::is('admin/areas') ? 'act' : '' }}"><i class="fas fa-map-marker-alt"></i>مناطق الخدمة</a>
                <a href="/admin/testimonials" class="{{ Request::is('admin/testimonials') ? 'act' : '' }}"><i class="fas fa-star"></i>آراء العملاء</a>
                <a href="/admin/faqs" class="{{ Request::is('admin/faqs') ? 'act' : '' }}"><i class="fas fa-question-circle"></i>الأسئلة الشائعة</a>
                <a href="/admin/gallery" class="{{ Request::is('admin/gallery') ? 'act' : '' }}"><i class="fas fa-images"></i>معرض الصور</a>
                <a href="/admin/blogs" class="{{ Request::is('admin/blogs') ? 'act' : '' }}"><i class="fas fa-blog"></i>المقالات</a>
                
                <div class="ans">الطلبات والمراسلات</div>
                <a href="/admin/requests" class="{{ Request::is('admin/requests') ? 'act' : '' }}"><i class="fas fa-clipboard-list"></i>طلبات الخدمة</a>
                <a href="/admin/messages" class="{{ Request::is('admin/messages') ? 'act' : '' }}"><i class="fas fa-envelope"></i>رسائل التواصل</a>
                
                <div class="ans">الحساب</div>
                <a href="/" target="_blank" style="color:rgba(255,255,255,.42)"><i class="fas fa-eye"></i>عرض الموقع</a>
                <a href="#" id="logoutBtn" style="color:#ef9090"><i class="fas fa-sign-out-alt"></i>تسجيل خروج</a>
            </div>
        </div>
        
        <!-- Admin Content Area -->
        <div class="amn">
            <div class="ahdr" style="margin-bottom:24px;display:flex;justify-content:space-between;align-items:center">
                <div style="display:flex;align-items:center;gap:12px">
                    <button class="a-toggle-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
                    <h1 id="aT" style="margin:0;font-size:clamp(18px, 4vw, 24px)">@yield('title', 'لوحة التحكم')</h1>
                </div>
                <span style="font-size:12px;color:var(--cc)"><i class="fas fa-user-circle"></i> admin</span>
            </div>
            
            <div class="acnt">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts Section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Sidebar Toggle function
        function toggleSidebar() {
            $('#ASB').toggleClass('open');
            $('#ASB-Backdrop').toggleClass('open');
        }



        // Set CSRF token for all jQuery AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle logout
        $('#logoutBtn').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'هل تريد تسجيل الخروج؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'var(--nv)',
                cancelButtonColor: '#ef9090',
                confirmButtonText: 'نعم، خروج',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    sessionStorage.removeItem('azq3_auth');
                    window.location.href = '/admin/login';
                }
            });
        });

        // Helper function to upload an image from file input
        function uploadImageInput(inputEl, successCallback) {
            const file = inputEl.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('image', file);

            Swal.showLoading();
            $.ajax({
                url: '/admin/upload',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    Swal.close();
                    if (res.success) {
                        successCallback(res.url);
                    } else {
                        Swal.fire('خطأ!', res.message || 'فشل رفع الملف', 'error');
                    }
                },
                error: function(err) {
                    Swal.close();
                    Swal.fire('خطأ!', 'فشل رفع الملف، تأكد من حجم الملف والصيغة', 'error');
                }
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
