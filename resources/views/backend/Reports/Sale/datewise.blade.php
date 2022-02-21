@extends('layouts.master')
@section('title')
    Datewise Sales Report
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header form-inline">
                        <h3 class="card-title col-lg-5">
                            Sales Report
                            <small style="color: blue;">( Datewise )</small>
                        </h3>

                        <!-- <div class="col-lg-4"></div> -->

                        <form class="col-lg-6" action="{{ route('sales.report.datewise') }}" method="GET">
                            @csrf
                            <div class="form-group float-right">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="reservation" name="fromToDate"
                                        class="Date form-control float-right"
                                        value="{{ $fromToDate }}">
                                </div>
                                <input name="startDate" id="startDate" type="hidden">
                                <input name="endDate" id="endDate" type="hidden">
                                <button class="btn btn-success Load" type="submit">
                                    <b>Load</b>
                                </button>
                            </div>
                        </form>

                        <form action="{{ route('sales.report.datewise.print') }}" method="GET"
                            target="_blank" class="col-lg-1">
                            @csrf
                            <input name="startDate" value="{{ $startDate }}" type="hidden">
                            <input name="endDate" value="{{ $endDate }}" type="hidden">
                            <button class="btn btn-primary float-right" type="submit">
                                <i class="fas fa-print"></i>
                            </button>
                        </form>

                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped Report">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Customer</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">SubTotal (Tk.)</th>
                                    <th class="text-right">Discount</th>
                                    <th class="text-right">Vat ({{ $vat }}%) (Tk.)</th>
                                    <th class="text-right">Payable (Tk.)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($sales as $data)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ \Carbon\Carbon::parse($data->date)->isoFormat('D/MM/YYYY') }}</td>
                                    <td>{{ $data->sale_no }}</td>
                                    <td>{{ !empty($data->customer) ? $data->customer : 'Guest Sale' }}</td>
                                    <td class="text-center">{{ $data->total_qty }}</td>
                                    <td class="text-right">{{ $data->sub_total }}</td>
                                    <td class="text-right">{{ $data->discount }} {{ $data->disc_type == 1 ? '%' : '৳' }}</td>
                                    <td class="text-right">{{ $data->vat }}</td>
                                    <td class="text-right">{{ $data->payable }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('sales.report.big.invoice',
                                            ['id'=>$data->sale_no]) }}" target="_blank"
                                            class="btn btn-info btn-xs" title="Sales Invoice">
                                            <i class="far fa-file"></i>
                                        </a>
                                        <a href="{{ route('sales.report.mini.invoice',
                                            ['id'=>$data->sale_no]) }}" target="_blank"
                                            class="btn btn-primary btn-xs" title="Sales Invoice">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                             <tfoot>
                                <tr>
                                    <th class="text-right" colspan="4">Total : </th>
                                    <th class="text-center">{{ $tQty }}</th>
                                    <th class="text-right">{{ $tSub }}</th>
                                    <th class="text-right">{{ $tDis }}</th>
                                    <th class="text-right">{{ $tVat }}</th>
                                    <th class="text-right">{{ $tPay }}</th>
                                    <th class="text-right"></th>
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
            $('.Load').on('click', function () {
                var startDate = $('.Date').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('.Date').data('daterangepicker').endDate.format('YYYY-MM-DD');
                document.getElementById("startDate").value = startDate;
                document.getElementById("endDate").value = endDate;
            });
        });
    </script>

@endsection
