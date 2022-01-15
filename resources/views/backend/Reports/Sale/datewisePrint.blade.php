@extends('layouts.master')
@section('title')
    Datewise Sales Report Print
@endsection
@section('customCSS')

    <style type="text/css">
      @media print {
        @page {
          size: auto;
        }
        .header {
          display: none;
        }
        .main-footer {
          display: none;
        }
        .content {
          margin: 0px;
          padding: 0px;
        }
        .content-wrapper {
          margin: 0px;
          padding: 0px;
        }
      }
    </style>
@endsection
@section('content')
<div class="content-wrapper p-0 m-0">

    <section class="content p-0 m-0">
        <div class="row">
            <div class="col-lg-12 m-0">
                <div class="card m-0">
                    <div class="col-lg-12">
                        <div class="row">
                            <h3 class="col-lg-6">Datewise Sales Report</h3>
                            <div class="col-lg-6">
                            @foreach ($company as $data)
                                <img class="" src="{{ asset($data->logo) }}" alt="Company Logo"
                                    style="height: 50px; float: left;">
                                <address class="col-lg-10" style="float: right;">
                                    <strong>{{ $data->title }}</strong><br>
                                    @if ($data->address != null) {{ $data->address }} @endif<br>
                                    @if ($data->phone != null) Phone : {{ $data->phone }} @endif<br>
                                    @if ($data->email != null) Email : {{ $data->email }} @endif<br>
                                    @if ($data->website != null) Website : {{ $data->website }} @endif
                                </address>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">SubTotal (Tk.)</th>
                                <th class="text-right">Discount (Tk.)</th>
                                <th class="text-right">Payable (Tk.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($sales as $data)
                            <tr>
                                <td>{{ $i++ }}.</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->sale_no }}</td>
                                <td>
                                    @if ($data->customer != null) {{ $data->customer }}
                                    @else Cash
                                    @endif
                                </td>
                                <td class="text-center">{{ $data->total_qty }}</td>
                                <td class="text-right">{{ $data->sub_total }}</td>
                                <td class="text-right">{{ $data->sub_total - $data->payable }}</td>
                                <td class="text-right">{{ $data->payable }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                         <tfoot>
                            <tr>
                                <td class="text-right" colspan="4"><b>Total : </b></td>
                                <td class="text-center"><b>{{ $tQty }}</b></td>
                                <td class="text-right"><b>{{ $tSub }}</b></td>
                                <td class="text-right"><b>{{ $tPay }}</b></td>
                                <td class="text-right"><b>{{ $tDis }}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="navbar-fixed-bottom">
                          <div style="float: left;">
                                Develop By {{ config('app.url') }}
                          </div>
                          <div style="float: right;">
                                <?php echo "Printing Time: " . date("D, d M Y h:i:s a"); ?>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@section('customJs')
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>

@endsection
