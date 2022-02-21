<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }} | @yield('title')</title>
<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public') }}/logo/icon.jpeg">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('public/master') }}/dist/css/adminlte.min.css">
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/ekko-lightbox/ekko-lightbox.css">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/daterangepicker/daterangepicker.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('public/master') }}/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/toastr/toastr.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('public/master') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- FilePond with JavaScript -->
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="{{ asset('public/master') }}/plugins/filepond/filepond@4.30.3/.css"> --}}
