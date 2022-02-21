<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    @include('layouts.main_includes.head')
    @yield('customCSS')
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full" class="mini-sidebar show -sidebar">
    <header class="topbar" data-navbarbg="skin6">
        @include('layouts.main_includes.navbar')
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin6">
        @include('layouts.main_includes.sidebar')
    </aside>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            @yield('header')
        </div>
        @yield('content')
        @include('layouts.main_includes.footer')
    </div>
</div>
@include('layouts.main_includes.foot')
@include('layouts.includes.scripts')
@yield('customJs')
</body>
</html>
