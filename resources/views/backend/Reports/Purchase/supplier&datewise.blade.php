@extends('layouts.master')
@section('title')
    Supplier & Date Wise Purchase Report
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header form-inline">

                        <h3 class="card-title col-lg-3.5 pr-5">
                            Purchase Report
                            <small style="color: blue;">( Supplier & Date Wise )</small>
                        </h3>

                        <form class="col-lg-7" action="{{ route('purchase.report.datewise') }}"
                            method="GET" name="filter_form">
                            @csrf
                            <div class="form-group row">
                                <select class="col-lg-5 select2bs4 form-control" name="supplier"
                                    title="Select Supplier" data-placeholder="Select Supplier">
                                    <option value="">Select Supplier</option>
                                    <option value="Cash">Cash</option>
                                    @foreach ($suppliers as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                <div class="col-lg-5 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="reservation" name="fromToDate"
                                        class="Date form-control float-right" value="">
                                </div>
                                <input name="startDate" id="startDate" type="hidden">
                                <input name="endDate" id="endDate" type="hidden">
                                <button class="btn btn-success Filter" type="submit">
                                    <b>Filter</b>
                                </button>
                            </div>
                        </form>

                        <div class="input-group">
                            <a href="{{ route('purchase.report.datewise') }}"
                                class="btn btn-warning mr-2" title="Reset">
                                Reset
                            </a>
                            <form action="{{ route('purchase.report.datewise.print') }}" method="GET"
                                target="_blank">
                                @csrf
                                <input name="startDate" value="{{ $startDate }}" type="hidden">
                                <input name="endDate" value="{{ $endDate }}" type="hidden">
                                <input name="supplier" value="{{ $supplier }}" type="hidden">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-print"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>Purchase No.</th>
                                    <th>Supplier</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">SubTotal (Tk.)</th>
                                    <th class="text-right">Discount</th>
                                    <th class="text-right">Payable (Tk.)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($purchases as $data)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ \Carbon\Carbon::parse($data->date)->isoFormat('D/MM/YYYY') }}</td>
{{--                                    <td>{{ $data->date->format('j F, Y') }}</td>--}}
                                    <td>{{ $data->purchase_no }}</td>
                                    <td>{{ !empty($data->supplier) ? $data->supplier : 'Cash Purchase' }}</td>
                                    <td class="text-center">{{ $data->total_qty }}</td>
                                    <td class="text-right">{{ $data->sub_total }}</td>
                                    <td class="text-right">{{ $data->discount }} {{ $data->disc_type == 1 ? '%' : '৳' }}</td>
                                    <td class="text-right">{{ $data->payable }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('purchase.report.big.invoice',
                                            ['id'=>$data->purchase_no]) }}" target="_blank"
                                            class="btn btn-info btn-xs" title="Purchase Invoice">
                                            <i class="far fa-file"></i>
                                        </a>
                                        <a href="{{ route('purchase.report.mini.invoice',
                                            ['id'=>$data->purchase_no]) }}" target="_blank"
                                            class="btn btn-primary btn-xs" title="Purchase Invoice">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                             <tfoot>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Total : </b></td>
                                    <td class="text-center"><b>{{ $tQty }}</b></td>
                                    <td class="text-right"><b>{{ $tSub }}</b></td>
                                    <td class="text-right"><b>{{ $tDis }}</b></td>
                                    <td class="text-right"><b>{{ $tPay }}</b></td>
                                    <td class="text-right"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@section('customJs')
    <script>
        $(document).ready(function () {
            // $('.Date').on('change', function () {
            $('.Filter').on('click', function () {
                var startDate = $('.Date').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('.Date').data('daterangepicker').endDate.format('YYYY-MM-DD');
                document.getElementById("startDate").value = startDate;
                document.getElementById("endDate").value = endDate;
            });
        });

        document.forms['filter_form'].elements['supplier'].value = '{{ $supplier }}';
        document.forms['filter_form'].elements['fromToDate'].value = '{{ $fromToDate }}';
        // document.forms['updateProfile'].elements['business_name'].value = '';
        // document.forms['updateProfile'].elements['address'].value = '';
    </script>

   <!--  <script>
        $(document).ready(function () {
            $('.Load').on('click', function () {
                // var value = $('input[name="from_to_date"]').val();
                var fromdate = $('.Date').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var todate = $('.Date').data('daterangepicker').endDate.format('YYYY-MM-DD');
                // alert(fromdate + ' to ' + todate);
                // e.preventDefault();
                // $.ajax({
                //     type: "GET",
                //     url: "{{ route('purchase.report.datewise') }}",
                //     data: { fromdate : fromdate, todate : todate },
                //     success: function (response) {
                //         // window.open('{{ route('purchase.report.datewise') }}','_blank');
                //         location.reload();
                //         // ajax.DataTable.reload();
                //         // $('#example1').DataTable().ajax.reload();
                //         // $(".Report").load(location + " .Report");
                //     },
                //     error: function (error) {
                //         console.log(error);
                //         alert('Data Not Found');
                //     }
                // });
            });
        });
    </script>   -->

@endsection
