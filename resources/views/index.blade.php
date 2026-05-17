@extends('layouts.app')

@section('title', 'عزل القصيم | أفضل شركة عزل أسطح بالقصيم وبريدة وحائل')

@section('content')
<!-- Site Wrapper -->
<div id="SW">
    <!-- Topbar Partial -->
    @include('partials.topbar')

    <!-- Header Partial -->
    @include('partials.header')

    <!-- Dynamic SPA Pages Wrapper -->
    <div id="PW">
        @include('pages.home')
        @include('pages.about')
        @include('pages.services')
        @include('pages.service_detail')
        @include('pages.areas')
        @include('pages.gallery')
        @include('pages.blog')
        @include('pages.contact')
    </div>

    <!-- Footer Partial -->
    @include('partials.footer')

    <!-- Floating Buttons Partial -->
    @include('partials.float_buttons')

    <!-- Quotation Wizard Modals Partial -->
    @include('partials.modals')
</div>
@endsection
