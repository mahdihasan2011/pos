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

        //Initialize Select2 Elements
        $('.select2').select2()
        $('.select2_new').select2({
            allowClear: false,
            width: '100%',
        })
        $('.select2_new2').select2({
            theme: "classic",
            allowClear: false,
            width: '30%',
        })
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
            defaultDate: new Date(),
            useCurrent: false
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

        // Timepicker
        // $('#timepicker').datetimepicker({
        //   format: 'LT'
        // })

        //Bootstrap Tooltip
        $('[data-toggle="tooltip"]').tooltip()

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

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[name="profile_image"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        // let id = '{{ Auth::user()->id }}';
        // let url = '{{ route("profile.image", ":id") }}';
        FilePond.setOptions({
            server: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // url = url.replace(':id',id);
                url:  "{{ route('profile.image') }}",
                // url:  '{{ route("profile.image", ":id") }}',
                // url: "{{ url('profile/image') }}" + '/' + id,
                // url: "{{ route('profile.image', ['user_id' => "user_id"]) }}",
                type: "POST",
                timeout: 7000,
                onload: (response) => {
                    alert(response);
                    location.reload();
                },
                // data: { user_id : user_id },
                // success: function (data) {
                //     location.reload();
                // }
            }
        });
    });
</script>
