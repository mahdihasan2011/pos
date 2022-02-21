<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.includes.head')
    @yield('customCSS')
</head>
<body class="hold-transition layout-footer-fixed layout-fixed layout-navbar-fixed text-sm {{ !empty
($settings->menu_position) ? $settings->menu_position : "" }}">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.includes.navbar')
        <!-- Main Sidebar Container -->
        @include('layouts.includes.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- Control Sidebar -->
        <aside class="control-sidebar">
            <!-- Control sidebar content goes here -->
            @include('layouts.includes.aside')
        </aside>
        <!-- Main Footer -->
        @include('layouts.includes.footer')
    </div>
    <!-- REQUIRED SCRIPTS -->
    @include('layouts.includes.scriptLinks')
    @include('layouts.includes.scripts')
    @yield('customJs')
</body>
</html>
