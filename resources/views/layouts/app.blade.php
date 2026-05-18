<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('title', 'عزل القصيم | أفضل شركة عزل أسطح بالقصيم وبريدة وحائل')</title>
    <meta name="description" content="@yield('description', 'عزل القصيم - أفضل شركة عزل أسطح بالقصيم وبريدة وحائل. عزل مائي وحراري وفوم. ضمان 10 سنوات.')">
    <meta name="keywords" content="@yield('keywords', 'افضل شركة عزل اسطح بالقصيم,عزل مائي بالقصيم,عزل فوم بالقصيم,عزل اسطح ببريدة,عزل فوم ببريدة,عزل اسطح بحائل,عزل مائي وحراري بالقصيم,افضل شركة عزل اسطح ببريدة,افضل شركة عزل اسطح بحائل')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Google Fonts: Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Pre-define openVid/closeVid stubs so inline onclick never throws ReferenceError -->
    <script>
        window.openVid = function(url) {
            document.addEventListener('app:ready', function() { window.openVid(url); }, { once: true });
        };
        window.closeVid = function() {};
    </script>

    <!-- Laravel Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if(isset($colors))
    <style>
        :root {
            @if(!empty($colors['nv'])) --nv: {{ $colors['nv'] }}; @endif
            @if(!empty($colors['am'])) --am: {{ $colors['am'] }}; @endif
            @if(!empty($colors['gr'])) --gr: {{ $colors['gr'] }}; @endif
        }
    </style>
    @endif
</head>
<body>
    <!-- Site Wrapper -->
    <div id="SW">
        @if(!Request::is('admin') && !Request::is('admin/*'))
            <!-- Topbar Partial -->
            @include('partials.topbar')

            <!-- Header Partial -->
            @include('partials.header')
        @endif

        <!-- Main Content Area -->
        <main id="PW">
            @yield('content')
        </main>

        @if(!Request::is('admin') && !Request::is('admin/*'))
            <!-- Footer Partial -->
            @include('partials.footer')

            <!-- Floating Buttons Partial -->
            @include('partials.float_buttons')

            <!-- Quotation Wizard Modals Partial -->
            @include('partials.modals')
        @endif
    </div>

    <!-- Dynamic Modal Editor Container injected by Javascript -->
    <div id="MC"></div>
</body>
</html>
