<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} || @yield('title')</title>
  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public') }}/logo/icon.jpeg">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('public/master') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/master') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/master') }}/dist/css/adminlte.min.css">
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
    @yield('customCSS')

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.includes.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    {{-- <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside> --}}
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('layouts.includes.footer')
  </div>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('public/master') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('public/master') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('public/master') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('public/master') }}/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{ asset('public/master') }}/dist/js/demo.js"></script>

  <!-- InputMask -->
  <script src="{{ asset('public/master') }}/plugins/moment/moment.min.js"></script>
  <script src="{{ asset('public/master') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- date-range-picker -->
  <script src="{{ asset('public/master') }}/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="{{ asset('public/master') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ asset('public/master') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="{{ asset('public/master') }}/plugins/raphael/raphael.min.js"></script>
  <script src="{{ asset('public/master') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="{{ asset('public/master') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('public/master') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- ChartJS -->
  <script src="{{ asset('public/master') }}/plugins/chart.js/Chart.min.js"></script>
  <!-- PAGE SCRIPTS -->
  <script src="{{ asset('public/master') }}/dist/js/pages/dashboard2.js"></script>
  <!-- DataTables -->
  <script src="{{ asset('public/master') }}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('public/master') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('public/master') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('public/master') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- Toastr -->
  <script src="{{ asset('public/master') }}/plugins/toastr/toastr.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('public/master') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Select2 -->
  <script src="{{ asset('public/master') }}/plugins/select2/js/select2.full.min.js"></script>
  <!-- jQuery Validate -->
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      // $('#timepicker').datetimepicker({
      //   format: 'LT'
      // })

      //Bootstrap Duallistbox
      // $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });

      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });

    })
    $(function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },buttonsStyling: false
        })
        $('.CLEAR').click(function() {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure ?',
                text: "You Want to Clear this Cart ??",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: ' Yes, clear it ! ',
                cancelButtonText: ' No, cancel ! ',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url: "{{ route('sale.cart.clear') }}",
                    type: 'GET',
                    success: function (){
                      location.reload();
                      const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                      });
                      $(function() {
                          Toast.fire({
                          type: 'warning',
                          title: '&nbsp; Cart Cleared Successfully. '
                          })
                      });
                    }
                });

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) { swalWithBootstrapButtons.fire(
                    ' Canceled ',
                    ' Cart not Cleared. ',
                    'error'
                )};
            });
        });
    });
  </script>
  @yield('customJs')
</body>
</html>
