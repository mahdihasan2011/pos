<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public') }}/logo/inf.png">
<title>{{ config('app.name') }} | @yield('title')</title>
<!-- Custom CSS -->
<link href="{{ asset('public/main') }}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
<link href="{{ asset('public/main') }}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
<link href="{{ asset('public/main') }}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
<!-- Custom CSS -->
<link href="{{ asset('public/main') }}/dist/css/style.min.css" rel="stylesheet">
<!-- Data Table plugin CSS -->
<link href="{{ asset('public/main') }}/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
